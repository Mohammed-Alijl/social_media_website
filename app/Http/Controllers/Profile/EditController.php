<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditRequest;
use App\Models\User;
use App\Traits\save_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    use save_image;
    public function edit(EditRequest $request){
        $user = User::find(Auth::id());

        if($request->profile_picture){
            if($user->profile_photo != 'profile.jpg')
                if(file_exists('img/users/profile_picture/' . $user->profile_photo))
                    unlink('img/users/profile_picture/' . $user->profile_photo);
            $photo_profile_name = $this->saveImage($request->profile_picture,'img/users/profile_picture/');
            $user->profile_photo = $photo_profile_name;
            $user->save();
        }
        if($request->cover_picture){
            if($user->cover_photo != 'Cover.jpg'){
                if(file_exists('img/users/cover_picture/' . $user->cover_photo))
                    unlink('img/users/cover_picture/' . $user->cover_photo);
            }
            $photo_cover_name = $this->saveImage($request->cover_picture,'img/users/cover_picture/');
            $user->update(['cover_photo'=>$photo_cover_name]);
            $user->cover_photo = $photo_cover_name;
            $user->save();
        }
        if($request->name){
            $user->update(['name'=>$request->name]);
        }
        if($request->email){
            $user->update(['email'=>$request->email]);
        }
        if($request->password){
            $user = Auth::user();
            $user->password = password_hash($request->password,PASSWORD_DEFAULT);
            $user->save();
        }
        return redirect()->back();
    }

}
