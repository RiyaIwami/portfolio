<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Mypage\Profile\EditRequest;

class ProfileController extends Controller
{
    public function showProfileEditForm(){
        return view('mypage.profile_edit_form')
            ->with('user', Auth::user());
    }

    public function editProfile(EditRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->save();

        $request->session()->flash('status', 'プロフィールを変更しました。');

        return view('mypage.profile_edit_form')
            ->with('user', $user);
    }
}

