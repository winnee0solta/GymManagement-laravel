<?php

namespace App\Http\Controllers\Dashboard;

use App\FeedbackMessages;
use App\GymMembers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
     public function index()
     {

        $feedbacks = array();

        foreach (FeedbackMessages::orderBy('created_at', 'desc')->get() as $feedback) {

            $user = User::find($feedback->user_id);
            $member = GymMembers::where('user_id',$feedback->user_id)->first();
            if ($user && $member) {
 

                array_push($feedbacks, array(
                    'member_id' => $member->id,
                    'user_id' => $user->user_id,
                    'fullname' => $member->fullname,
                    'dob' => $member->dob,
                    'phone' => $member->phone,
                    'address' => $member->address,
                    'e_phone' => $member->e_phone,
                    'shift' => $member->shift,
                    'username' => $user->username,
                    'feedback'=>$feedback->feedback
                ));
            } else {
                $feedback->delete();
            }
        }
  
        return view('dashboard.feedback.index', compact(
            'feedbacks', 
        ));
     }
}
