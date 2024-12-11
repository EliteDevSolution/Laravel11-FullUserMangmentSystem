<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class MyAccountController extends Controller
{
     /**
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $pageTitle = trans('global.my_account');
        $user = $request->user();
        return view('pages.myaccount.index', compact('pageTitle', 'user'));
    }

    public function updatePersonal(Request $request)
    {

        $rule = [
            'nome' => ['required', 'max:50'],
            'email' => ['required', 'email', "unique:users,email,".Auth::user()->id],
            'cpf' => 'required|min:11|max:14',
        ];
        $user = $request->user();

        $this->validate($request, $rule);

        if ($request->hasFile('photo')) {
            if(!is_null($user->avatar) && !empty($user->avatar))
                Storage::delete("images/avatars/".$user->avatar);

            $image      = $request->file('photo');
            $fileName   = time() . '.' . 'png';

            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->getRealPath());
            $image->scale(width: 120);
            // save modified image in new format
            if (!Storage::exists('images/avatars')) {
                Storage::makeDirectory('images/avatars');
            }
            $image->toPng()->save(storage_path("app/public/images/avatars/$fileName"));
            $request->request->add(['avatar' => $fileName]); //add request
        }

        $user->update(
            $request->all()
        );

        return redirect()->back()->with([
            'success' => trans('global.msg.operation_success'),
            'tab' => 'personal'
        ]);
    }

    public function updatePassword(Request $request, User $user)
    {
        $rule = [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:6'],
            'new_confirm_password' => ['same:new_password'],
        ];
        $user = $request->user();

        $this->validate($request, $rule);

        $user->update([
            'password' => $request->new_password
        ]);

        return redirect()->back()->with([
            'success' => trans('global.msg.operation_success'),
            'tab' => 'password'
        ]);
    }


}
