<?php

namespace App\Http\Controllers;

use App\Mail\UserApproved;
use App\Mail\UserRejected;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function update(User $user)
    {
        $user->update([
            'active' => true,
        ]);
        Mail::to($user->email)->send(new UserApproved($user));
        return back()->with('message', 'Approved Successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Mail::to($user->email)->send(new UserRejected($user));
        return back()->with('message', 'Rejected Successfully!');
    }
    // todo: send email error fix
}
