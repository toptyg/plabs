<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;



class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

 public function callback()
    {
//2dd('aa');
/*	$spbstuUser = Socialite::driver('spbstu')->stateless()->user();
        $profile_id = $spbstuUser->user['wsAsu']['structure'][0]['profile_id'];



        try {


    

        $q = User::select('id')->where('profile_id', $profile_id);
        $exist = $q->exists();
        $user_id = $q->where('active', 1)->first();

        if ($user_id && $exist) {
            Auth::login($user_id, true);
        } elseif (is_null($user_id) && !$exist) {
            $user = new User();
            if ($user->createUser($spbstuUser->user)) {
                Auth::login($user, true);
            }
        }


        return (!is_null(Auth::user()) && User::find(Auth::user()['id'])->is_admin)? redirect('admin') : redirect('anketa');
    } catch (Exception $exception) {
        return redirect('login');
    }

*/
    }




}
