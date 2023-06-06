<?php

namespace App\Http\Controllers;

use App\Mail\UserApproved;
use App\Mail\UserRejected;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->where('active', false)->with('profile')->paginate(5);
        return view('admin.users.users', compact('users'));
    }
    public function update(User $user)
    {
        $user->update([
            'active' => true,
        ]);
        Mail::to($user->email)->send(new UserApproved($user));
        return back()->with('message', 'Approved Successfully!');
    }

    public function paginate(Request $request)
    {
        $users = User::where('is_admin', false)->where('active',false)->with('profile')->paginate(5);
        return view('admin.users.companyregistertable', compact('users'))->render();
    }

    public function destroy(User $user)
    {
        $user->delete();
        Mail::to($user->email)->send(new UserRejected($user));
        return back()->with('error', 'Rejected Successfully!');
    }
    // todo: send email error fix
}
