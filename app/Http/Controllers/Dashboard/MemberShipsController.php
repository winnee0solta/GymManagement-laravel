<?php

namespace App\Http\Controllers\Dashboard;

use App\GymMembers;
use App\Http\Controllers\Controller;
use App\Memberships;
use Illuminate\Http\Request;

class MemberShipsController extends Controller
{
    //update
    public function update($member_id, Request $request)
    {
        $this->validate($request, [
            'deadline' => 'required',
        ]);
        $member = GymMembers::find($member_id);
        if ($member) {
            $membership = Memberships::where('member_id', $member_id)->first();
            if ($membership) {
                $membership->deadline = $request->deadline;
                $membership->save();
            } else {
                Memberships::create([
                    'member_id' => $member_id,
                    'deadline' => $request->deadline,
                ]);
            }
        }


        return redirect('/dashboard/members/' . $member_id . '/view');
    }
}
