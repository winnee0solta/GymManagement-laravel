<?php

namespace App\Http\Controllers\Site;

use App\Accounts;
use App\Attendances;
use App\FeedbackMessages;
use App\GymMembers;
use App\GymMemberStatus;
use App\Http\Controllers\Controller;
use App\Memberships;
use App\NutritionPlans;
use App\Profile;
use App\WorkoutPlans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $member = GymMembers::where('user_id', Auth::user()->id)->first();

        //today lplans
        $day =  Carbon::now()->dayName;

        $todayNutritionPlan = 'no plans';
        $nplan = NutritionPlans::where('member_id', $member->id)->first();
        if ($nplan) {
            switch (strtolower($day)) {
                case 'sunday':
                    $todayNutritionPlan = $nplan->sunday;
                    break;
                case 'monday':
                    $todayNutritionPlan = $nplan->monday;
                    break;
                case 'tuesday':
                    $todayNutritionPlan = $nplan->tuesday;
                    break;
                case 'wednesday':
                    $todayNutritionPlan = $nplan->wednesday;
                    break;
                case 'thursday':
                    $todayNutritionPlan = $nplan->thursday;
                    break;
                case 'friday':
                    $todayNutritionPlan = $nplan->friday;
                    break;
                case 'saturday':
                    $todayNutritionPlan = $nplan->saturday;

                default:
                    # code...
                    break;
            }
        }

        $todayWorkoutPlan = 'no plans';
        $wplan = WorkoutPlans::where('member_id', $member->id)->first();
        if ($wplan) {
            switch (strtolower($day)) {
                case 'sunday':
                    $todayWorkoutPlan = $wplan->sunday;
                    break;
                case 'monday':
                    $todayWorkoutPlan = $wplan->monday;
                    break;
                case 'tuesday':
                    $todayWorkoutPlan = $wplan->tuesday;
                    break;
                case 'wednesday':
                    $todayWorkoutPlan = $wplan->wednesday;
                    break;
                case 'thursday':
                    $todayWorkoutPlan = $wplan->thursday;
                    break;
                case 'friday':
                    $todayWorkoutPlan = $wplan->friday;
                    break;
                case 'saturday':
                    $todayWorkoutPlan = $wplan->saturday;

                default:
                    # code...
                    break;
            }
        }

        //body status
        $bodystatus = GymMemberStatus::where('member_id', $member->id)->get();

        return view('site.home', compact(
            'todayNutritionPlan',
            'todayWorkoutPlan',
            'day',
            'bodystatus'
        ));
    }

    public function contactView()
    {

        $profile = Profile::where('contact_info', 'website')->first();
        return view('site.contact', compact('profile'));
    }
    public function profileView()
    {
        $member = GymMembers::where('user_id', Auth::user()->id)->first();
        $user = Auth::user();

        $membership = Memberships::where('member_id', $member->id)->first();

        if ($membership) {
            $deadline = $membership->deadline;
        } else {
            $deadline = '-';
        }

        //account
        $accounts = Accounts::where('member_id', $member->id)->get();

          //attendance
                $attendances = Attendances::where('member_id', $member->id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('site.profile', compact('member', 'user', 'deadline', 'accounts', 'attendances'));
    }
    public function addFeedback(Request $request){

        FeedbackMessages::create([
            'user_id'=>Auth::user()->id,
            'feedback'=>$request->feedback
        ]);

        return redirect('/');
    }
}
