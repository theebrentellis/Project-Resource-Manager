<?php

namespace App\Http\Controllers\Settings;

use App\User;
use App\UserRole;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $users = User::with('roles')->get();

        $roles = Role::all();

        return view('settings.settings', ['user' => $user, 'users' => $users, 'roles' => $roles]);
    }

    public function update(Request $request)
    {
        // dd($request);

        $user = User::findOrFail($request->user_id);

        if($request->name){
            $user->name = $request->name;
            $user->save();
        }
        if($request->email){
            if(User::where('email', '=', $request->email)->firstOrFail()){
                return redirect('settings')->withErrors("Email Already Exists!")->withInput();
            }
            else{
                $user->email = $request->email;
                $user->save();
            }
        }
        if($request->currentPassword && $request->newPassword && $request->confirmNewPassword){
            
            $currentPassword = $user->password;

            if(Hash::check($request->currentPassword, $currentPassword)){
                if($request->newPassword !== $request->confirmNewPassword){
                    return redirect('settings')->withErrors("Cannot Confirm Password")->withInput();
                }
                if($request->newPassword == $request->confirmNewPassword){
                    $confirmedUpdatedPassword = Hash::make($request->newPassword);
                    $user->password = $confirmedUpdatedPassword;
                    $user->save();
                }
            }
        }
        if($request->add_role_id){
            UserRole::insert([
                'user_id' => $user->id,
                'role_id' => $request->add_role_id
            ]);
        }
        if($request->remove_role_id){
            $user_id = json_decode($user->id);
            $role_id = json_decode($request->remove_role_id);
            $userRole = UserRole::where([
                ['user_id', '=', $user_id],
                ['role_id', '=', $role_id]
            ])->delete();
            
        }

        return redirect('settings')->with('status', 'Profile Updated!');
    }
}
