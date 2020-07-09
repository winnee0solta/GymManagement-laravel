<?php

namespace App\Http\Controllers\Dashboard;

use App\Accounts;
use App\Attendances;
use App\GymMembers;
use App\Http\Controllers\Controller;
use App\Memberships;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        //total members
        $total_member_count  = GymMembers::count();
        //total earned
        $total_amount = 0;
        foreach (Accounts::all() as $account) {

            $total_amount = $total_amount + $account->amount_paid;
        }
        //attendance today
        $date = Carbon::today()->toDateString();
        $present_count = 0;
        $absent_count = 0;
        foreach (Attendances::whereDate('created_at', '=',   $date)
            ->get() as $attendance) {

            if ($attendance->status) {
                $present_count =   $present_count + 1;
            }
            if (!$attendance->status) {
                $absent_count =   $absent_count + 1;
            }
        }


        //this month Revenue
        $monthrevenue = 0;
        foreach (Accounts::whereYear('created_at', '=', Carbon::now()->year)->whereMonth(
            'created_at',
            '=',
            Carbon::now()->month
        )->get() as $account) {
            $monthrevenue = $monthrevenue + $account->amount_paid;
        }

        //membership about to expire
        $expiredMembers = array();
        $dt = Carbon::now();
        $today = $dt->toDateString();

        foreach (Memberships::all() as $membership) {
            //
            $parsedDeadline = Carbon::parse($membership->deadline);
            $subDeadline =  $parsedDeadline->subDays(10);


            if ($subDeadline->lessThanOrEqualTo($today)) {
                // if ($subDeadline <= $today  ) {
                //add member

                $member = GymMembers::find($membership->member_id);

                if ($member) {
                    array_push($expiredMembers, array(
                        'member_id' => $membership->member_id,
                        'deadline' => $membership->deadline,
                        'fullname' => $member->fullname,
                        'phone' => $member->phone,
                        'address' => $member->address,

                    ));
                } else {
                    $membership->delete();
                }
            }
        }

        return view('dashboard.home.index', compact(
            'total_member_count',
            'total_amount',
            'present_count',
            'absent_count',
            'monthrevenue',
            'expiredMembers'
        ));
    }
}
