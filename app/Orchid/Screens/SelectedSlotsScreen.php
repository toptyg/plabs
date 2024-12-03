<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Layouts;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Illuminate\Http\Request;

use Orchid\Screen\Fields\Relation;

use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\TD;
//use Orchid\Screen\Link;

use Orchid\Screen\Actions\Link;
//use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;

use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Toast;

use Orchid\Support\Facades\Alert;

use App\Models\SelectedSlots;
use App\Models\User;
//use App\SelectedSlots;
use App\Orchid\Layouts\SelectedSlotsTable;

use Illuminate\Support\Facades\Mail;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SelectedSlotsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

 public function query(): iterable
    {
        $slots = SelectedSlots::filters()->defaultSort('id')->get();//->paginate(); //::paginate();
//dd($slots);
        return [
            'slots' => $slots
        ];
    }


    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Список записей:';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {

//Button::make('Google It!')
//    ->method('goToGoogle');

    /*    return [
        Layout::rows([

    Button::make('Google It!')
    ->method('createProject'),

        ]),

    ];
//Link::make('Google It!')
//    ->href('http://google.com');

//            Link::name('Добавить проект')
//                ->method('createProject'),
        
//    Menu::make('Example')->route('route.index');

	 Link::name('Добавить проект')
                ->method('createProject'),
*/
return [

//    Button::make('Добавить')
//    ->method('createSelectedSlots')

	    ModalToggle::make('Добавить')
            ->modal('exampleModal')
            ->method('createSelectedSlots')
            ->icon('plus-circle'),


	    Button::make('Выгрузить в Excel')
            ->method('export', $_GET['filter'] ?? [])
            ->icon('cloud-download')
            ->rawClick()
            ->novalidate(),

];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */


public function layout(): iterable
{

    return [

 Layout::table('slots', [
		TD::make('id')->sort()->filter(),
                TD::make('user_id')->sort()->filter(),

		TD::make('name', 'User')->render(function (SelectedSlots $slot) {
                    return $slot->user($slot->user_id) ?? 'N/A'; // Display full name or 'N/A' if not found
                })->sort(),

		TD::make('group', 'Группа')->render(function (SelectedSlots $slot) {
                    return $slot->get_group($slot->user_id) ?? 'N/A'; // Display full name or 'N/A' if not found
                })->sort(),


		TD::make('lab_name', 'Lab')->render(function (SelectedSlots $slot) {
                    return $slot->get_lab($slot->lab_id) ?? 'N/A'; // Display full name or 'N/A' if not found
                })->sort(),


//		TD::make('lab_id')->sort()->filter(),





                TD::make('date')->sort()->filter(),
                TD::make('created_at')->sort()->filter(),
		TD::make('confirmed', 'Confirmed')
                    ->render(function (SelectedSlots $slot) {
                        return $slot->confirmed === null
                            ?  Button::make('Подтвердить')->method('confirm',['id'=>$slot->id])->class('primary')   //->route('platform.selectedslots.confirm', $slot)  //->method('confirm',)  
/* '<form name="input" action="/physlabs/admin/selectedslots/confirm" method="post">
<input  type="hidden" name="id" value="'.$slot->id.'">
<input type="submit" value="Подтвердить">
</form>'
*/
 // '<button class="btn "><a href="'.$slot->id.'">Подтвердить</a></button>'
                            : ($slot->confirmed ? 'Подтвержден' : 'Отклонен');
                    }
),

		TD::make('discard', 'Discard')
                    ->render(function (SelectedSlots $slot) {
                        return $slot->confirmed === null
                            ?  Button::make('Отклонить')->method('discard',['id'=>$slot->id])   //->route('platform.selectedslots.confirm', $slot)  //->method('confirm',)  
/* '<form name="input" action="/physlabs/admin/selectedslots/confirm" method="post">
<input  type="hidden" name="id" value="'.$slot->id.'">
<input type="submit" value="Подтвердить">
</form>'
*/
 // '<button class="btn "><a href="'.$slot->id.'">Подтвердить</a></button>'
                            : ($slot->confirmed ? '-' : '-');
                    }
),



//
/*		TD::make('confirmed', __('Подтверждение'))
	        ->renderfn(SelectedSlots $slot) 
{
  return $slot->confirmed === null
                            ? '<button class="btn btn-warning">Confirm</button>'
                            : ($slot->confirmed ? 'OK' : 'Not Confirmed');
/*=> Group::make
	    [
//        Link::make('Show')->route('platform.user.show', $user),
    		Button::make('Подтвердить')->route('home', $slot),
]
}
*/
//	    ;


//	        TD::make('confirmed')->sort()->filter(),
//		Button::make('Google It!')->method('goToGoogle'),

/*

 ->render(fn(User $user) => CheckBox::make('users[]')
        ->value($user->id)
        ->placeholder($user->name)
        ->checked(false)
    ),


	     TD::set('last_name','Last name')
                ->align('center')
                ->width('100px')
                ->render(function ($patient) {
                    return Link::make($patient->last_name)
                        ->route('welcome', $patient);
                }),
*/                       
                           
                   







            ]),



 Layout::modal('exampleModal', [
        
    Layout::rows([

Input::make('selectedslots.user_id')
                ->type('string')
                ->title('student @mail'),

Input::make('selectedslots.lab_id')
                ->type('number')
                ->title('Lab ID'),

Input::make('selectedslots.date')
                ->type('datetime')
                ->title('дата'),

]),


        ]),

//  SelectedSlotsTable::class,

/* Layout::table('slots', [
                TD::make('user_id')->sort()->filter(),
                TD::make('date')->sort()->filter(),
                TD::make('lad_id')->sort()->filter(),
            ]),
*/
// SelectedSlotsTable::class,


    /*    Layout::modals([
	     'createProjectModal' => Layout::rows([
           Input::make('selectedslots.user_id')
                ->type('string')
                ->title('student @mail')
		->modal('createProjectModal'),


    ]),
        ]),
*/
    ];
}


 public function createSelectedSlots(Request $request)
    {
    //    Project::create($request->get('project'));
 SelectedSlots::create($request->get('selectedslots'));
        Alert::success('Проект был успешно создан');








        return back();
    }


public function get_group($u)

{
$u=194710;

$res2 = $client1->get('http://docker-svc.spbstu.ru:3007/api/v2/asu/students/'.$u, [
    'auth' =>  ['tolpygin_ss', '@YaR$s6Ml5Ii}JXS']
]);

$obj_stud= json_decode($res2->getBody());


$res = $client0->get('http://docker-svc.spbstu.ru:3007/api/v2/asu/cards/'.$obj_stud->card, [
    'auth' =>  ['tolpygin_ss', '@YaR$s6Ml5Ii}JXS']
]);
//echo $res->getStatusCode();           // 200
//echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
//echo $res->getBody();                 // "type":"User"...'

$obj_card= json_decode($res->getBody());



$res3 = $client1->get('http://docker-svc.spbstu.ru:3007/api/v2/asu/groups/'.$obj_stud->group, [
    'auth' =>  ['tolpygin_ss', '@YaR$s6Ml5Ii}JXS']
]);

$obj_group= json_decode($res3->getBody());

return $obj_group;
}



public function export(Request $request) //: StreamedResponse
{
    $ss =  SelectedSlots::all();//->defaultSort('id', 'desc');
/*Profile::when(Auth::user()->organizer_id, function (Builder $query) {
        return $query->where('organizer_id', Auth::user()->organizer_id);
    })->select('external_id', 'last_name', 'first_name', 'patronymic', 'phone', 'email', 'gender',
        'date_of_birth', 'status')->defaultSort('id', 'desc');
*/

    $filter = $request->all();
    unset($filter['_token']);

    if (!empty($filter)) {
        foreach ($filter as $key => $value) {
            $ss->where($key, $value);
        }
    }

    $result = $ss->toArray();

    $fileArray = array_merge([['id', 'user_id', 'lab_id', 'date' , 'confirmed', 'created_at' ]], $result);

    $spreadsheet = new Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
/*    $activeWorksheet->getStyle('A1:I' . count($fileArray))->getNumberFormat()
        ->setFormatCode(NumberFormat::FORMAT_TEXT);
*/
    $widthColumn = '20';
    $activeWorksheet->getColumnDimension('A')->setWidth($widthColumn);
    $activeWorksheet->getColumnDimension('B')->setWidth($widthColumn);
    $activeWorksheet->getColumnDimension('C')->setWidth($widthColumn);
    $activeWorksheet->getColumnDimension('D')->setWidth($widthColumn);
    $activeWorksheet->getColumnDimension('E')->setWidth($widthColumn);
    $activeWorksheet->getColumnDimension('F')->setWidth($widthColumn);
    

    $activeWorksheet->fromArray($fileArray);

    $writer = new Xlsx($spreadsheet);

    return response()->streamDownload(function () use ($writer) {
        $writer->save('php://output');
    }, 'profiles.xlsx', [
        'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'Content-Disposition: attachment;filename="labs.xlsx"',
        'Cache-Control: max-age=0',
        'Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT',
        'Cache-Control: cache, must-revalidate',
        'Pragma: public'
    ]);
}




public function confirm(Request $request)
{
//dd($request->input('id'));    
    $slot = SelectedSlots::findOrFail($request->input('id'));
    $slot->confirmed = true; // Set confirmed to true
    $slot->save();

     $arrayEmails = [$slot->user_id];
        $emailSubject = 'Запись в физ.лаб.';
        $emailBody = '';

        Mail::send('email/agree',
            ['code' => $emailBody],
            function ($message) use ($arrayEmails, $emailSubject) {
                $message->to($arrayEmails)
                    ->subject($emailSubject);
            }
        );
    Alert::success('Slot confirmed successfully');
    return  back();
//redirect()->url('/physlabs/admin/selectedslots')->with('success', 'Slot confirmed successfully.');
}
public function discard(Request $request)
{
//dd($request->input('id'));    
    $slot = SelectedSlots::findOrFail($request->input('id'));
    $slot->confirmed = false; // Set confirmed to true
    $slot->save();

     $arrayEmails = [$slot->user_id];
        $emailSubject = 'Запись в физ.лаб.';
        $emailBody = '';

        Mail::send('email/discard',
            ['code' => $emailBody],
            function ($message) use ($arrayEmails, $emailSubject) {
                $message->to($arrayEmails)
                    ->subject($emailSubject);
            }
        );
    Alert::success('Slot discarded successfully');
    return  back();
//redirect()->url('/physlabs/admin/selectedslots')->with('success', 'Slot confirmed successfully.');
}


}
