<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Lab;
use App\Models\TimeSlot;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\UserWizardController;
use App\Http\Controllers\HomeController;

/*



|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
$app_url = config("app.url");
if (!empty($app_url))
{
    URL::forceRootUrl($app_url);
    $schema = explode(':', $app_url)[0];
    URL::forceScheme($schema);

}

Auth::routes();


Route::get('/get_labs', function () {

                $labs = Lab::all();

        return json_decode($labs);
});

Route::get('/get_times', function () {

    //            $slots = TimeSlot::all();


/*$slots =  DB::table('time_slots as ts')
	    ->select('ts.lab_id' , 'ts.datetime',  DB::raw('COUNT(ss.user_id) AS studs_count'))
            ->leftjoin('selected_slots as ss', function($join) {
    		    $join ->on ('ts.lab_id', '=', 'ss.lab_id')
			 ->on('ts.datetime', '=', 'ss.date' );
    })   ->groupBy('ts.lab_id','ts.datetime')
->orderBy('ts.lab_id')
    ->orderBy('ts.datetime')
            ->get();
*/
$slots =  DB::table('time_slots')
	    ->select('datetime')->whereRaw('date(datetime) >= CURRENT_DATE')->distinct()->orderBy('datetime')->get();


//select selected_slots.date , count(distinct user_id) as uniq_cnt_user from selected_slots group by selected_slots.date
/*$sslots= DB::table('selected_slots')
	    ->select('date','count(distinct user_id) as uniq_cnt_user')->groupBy()->orderBy('date')->get();
*/

$sslots = DB::table('selected_slots')
    ->select('date', DB::raw('count(distinct user_id) as date_studs_count'))
    ->whereRaw('date(date) >= CURRENT_DATE')
    ->groupBy('date')
    ->get();

$sslots2 = DB::table('selected_slots')
    ->select('lab_id','date', DB::raw('count(distinct user_id) as lab_studs_count'))
    ->whereRaw('date(date) >= CURRENT_DATE')
    ->groupBy('date','lab_id')
    ->get();




$result = null; //

$labs = Lab::all();
//null;



foreach ($slots as $s)
{

foreach ($labs as $l)
{ 
//$r=null;

$r= new stdClass();
$r->lab_id=$l->id;
$r->type=$l->type;
$r->datetime=$s->datetime;


$date=$r->datetime;
$lab_id=$r->lab_id;


$sslot_with_date_count=$sslots->where('date',$date)->first();
$sslot_lab_studs_count=$sslots2->where('date',$date)->where('lab_id',$lab_id)->first();

$today = \Carbon\Carbon::now();
$difference = $today->diffInHours($s->datetime, false);



//dd($sslot_with_date);
if(($difference >=364)||($difference <=4+24)) {$r->date_studs_available=0;}
elseif($sslot_with_date_count) $r->date_studs_available=15-(int)$sslot_with_date_count->date_studs_count; 
else $r->date_studs_available=15;




if($sslot_lab_studs_count) $r->lab_studs_available=2-(int)$sslot_lab_studs_count->lab_studs_count;
else $r->lab_studs_available=2;

$result[]=$r;
}


}

//dd($result);

/*
foreach ($slots as $s)
{



}
*/


/*$results = DB::table('time_slot AS ts')
    ->select('ts.lab_id', 'ts.datetime', DB::raw('COUNT(ss.user_id) AS people_count'))
    ->leftJoin('selected_slots AS ss', function($join) {
        $join->on('ts.lab_id', '=', 'ss.lab_id')
             ->on('ts.datetime', '=', 'ss.datetime'); // Note: Ensure that 'ss.date' is actually 'ss.datetime'
    })
    ->groupBy('ts.lab_id', 'ts.datetime')
    ->orderBy('ts.lab_id')
    ->orderBy('ts.datetime')
    ->get();
*/



        return json_decode( json_encode($result));
});


Route::get('/auth/callback', function () {




//dd( $spbstuUser);
  try {
    $spbstuUser = Socialite::driver('spbstu')->stateless()->user();
        $profile_id = $spbstuUser->user['wsAsu']['structure'][0]['profile_id'];
    
//dd($spbstuUser);
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


        return (!is_null(Auth::user()) && User::find(Auth::user()['id'])->is_admin)? redirect('admin') : redirect('/book');
    } catch (Exception $exception) {
        return redirect('login');
    }
    

//    try {
//        $spbstuUser = Socialite::driver('spbstu')->stateless()->user();
//dd($spbstuUser );
//        $user_id = User::select('id')->where('email', $spbstuUser->user['email'])->first();

//dd($user_id);
//        if ($user_id) Auth::login($user_id, true);
//        return redirect(route('welcome'));
//    } catch (Exception $exception) {
//        return redirect('login');
//    }
});


//Route::get('/auth/callback', [HomeController::class, 'callback']);
Route::get('/home', function()
{
    return (!is_null(Auth::user()) && User::find(Auth::user()['id'])->is_admin)? redirect('admin') : redirect('/book');
}

);


Route::get('/', function () {

    return view('welcome');


});

//Auth::routes();

/*Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('book', [App\Http\Controllers\UserWizardController::class, 'steps'])->name('book.steps');

//Route::screen('user-wizard', UserWizardScreen::class, 'stepOne')->name('user-wizard.step-one');
//Route::get('user-wizard', [App\Http\Controllers\UserWizardController::class, 'stepOne'])->name('user-wizard.step-one');
Route::get('book/step-two/{labType}', [App\Http\Controllers\UserWizardController::class, 'stepTwo'])->name('book.step-two');
Route::get('book/step-three/{labType}/{lab}', [App\Http\Controllers\UserWizardController::class, 'stepThree'])->name('book.step-three');
Route::post('book/finalize', [App\Http\Controllers\UserWizardController::class, 'finalize'])->name('book.finalize');

Route::get('/cas/login', function () {
    return redirect(env('SPBSTU_LOGIN_URL'));
})->name('user.login.cas');
