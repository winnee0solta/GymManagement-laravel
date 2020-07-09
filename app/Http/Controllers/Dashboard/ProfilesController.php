<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        $profile = Profile::where('contact_info', 'website')->first();
        return view('dashboard.profiles.index',compact('profile'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $profile = Profile::where('contact_info', 'website')->first();

        if ($profile) {

            $profile->email = $request->email;
            $profile->address = $request->address;
            $profile->phone = $request->phone;
            $profile->save();
        } else {
            Profile::create([
                'contact_info' => 'website',
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);
        }

        return redirect('/dashboard/profile');
    }
}
