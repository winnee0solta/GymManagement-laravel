<?php

namespace App\Http\Controllers\Dashboard;

use App\Accounts;
use App\GymMembers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index()
    {
        $totalamount = 0;
        $accounts = array();
        foreach (Accounts::orderBy('created_at', 'desc')->get() as $account) {

            $member = GymMembers::find($account->member_id);
            if ($member) {

                $totalamount = $totalamount + $account->amount_paid;

                array_push($accounts, array(
                    'member_id' => $member->id,
                    'fullname' => $member->fullname,
                    'phone' => $member->phone,
                    'address' => $member->address,
                    'amount_paid' => $account->amount_paid,
                    'note' => $account->note,
                    'created_at' => $account->created_at,

                ));
            } else {
                $account->delete();
            }
        }


        return view('dashboard.accounts.index',compact('accounts', 'totalamount'));
    }

    public function addTransaction($member_id, Request $request)
    {

        $this->validate($request, [
            'amount_paid' => 'required',
        ]);

        $member = GymMembers::find($member_id);
        if ($member) {
            $user = User::find($member->user_id);
            if ($user) {

                $account = new Accounts();
                $account->member_id = $member->id;
                $account->amount_paid = $request->amount_paid;
                if ($request->has('note') &&  $request->note != '') {
                    $account->note = $request->note;
                } else {
                    $account->note = '-';
                }
                $account->save();
            } else {
                $member->delete();
            }
        }


        return redirect('/dashboard/members/' . $member_id . '/view');
    }
}
