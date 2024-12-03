<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\SelectedSlots;
 use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserWizardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
/*    public function index()
    {
        return view('home');
    }
*/

 public function stepOne()
    {
        return view('book.step-one');
    }

    public function stepTwo($labType)
    {
        return view('book.step-two', compact('labType'));
    }

    public function stepThree($labType, $lab)
    {
        return view('book.step-three', compact('labType', 'lab'));
    }

    public function finalize (Request $request)
    {
//dd($request->input('type'));
  $p =   new \stdClass(); //stdClass();
  $p->type =   $request->input('type');
  $p->user_id=User::find(Auth::user()['id'])->email;
  $p->lab_id = $request->input('lab_id');
  $p->date =  $request->input('datetime');


$slotlist = SelectedSlots::where([
    ['user_id', $p->user_id],
    ['date',    $p->date]   ]    )->get();

$slotCount = $slotlist->count();

if ($slotCount<2) { SelectedSlots::create((array)$p); echo "Вы успешно записаны!"; }
else echo "Вы уже записаны на 2 лабораторные на эту дату. Запись не прозведена.";

//        return view('home');
    }

 public function steps()
    {
        return view('book.steps');
    }

}
