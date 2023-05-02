<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(User $user)
    {
        $user->update([
            'active' => true,
        ]);
        return back()->with('message', 'Approved Successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('message', 'Rejected Successfully!');
    }
    // todo: send email
}
