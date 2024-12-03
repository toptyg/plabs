<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\TimeSlot;
use App\Models\Lab;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Layouts;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Modal;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Toast;
//use App\Orchid\Screens\Lab;

use App\Orchid\Layouts\TimeSlotTable;

use Orchid\Screen\Actions\ModalToggle;
use Illuminate\Http\Request;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Support\Facades\Alert;

//use App\Orchid\Layouts\TimeSlotTable;

class TimeSlotScreen extends Screen
{
    public $name = 'Расписание Лаб.';
    public $description = 'Manage your Time Slots';

    public function query(): iterable
    {
        return [
            'timeslots' => TimeSlot::all(),
        ];
    }

    public function commandBar(): array
    {
        return [

   ModalToggle::make('Добавить')
            ->modal('createTimeSlotModal')
            ->method('createTimeSlot')
            ->icon('plus-circle'),

        /*    Button::make('Create Time Slot')
                ->icon('plus')
                ->modal('createTimeSlotModal'),
    */    ];
    }

    public function layout(): iterable
    {
        return [


 Layout::table('timeslots', [
                TD::make('id')->sort()->filter(),
//                TD::make('type')->sort()->filter(),
//                TD::make('lab_id')->sort()->filter(),
                TD::make('datetime')->sort()->filter(),
                TD::make('created_at')->sort()->filter(),
            ]),



 Layout::modal('createTimeSlotModal', [

    Layout::rows([

/*Input::make('time_slots.type')
                ->type('string')
                ->title('Type'),

Input::make('time_slots.lab_id')
                ->type('number')
                ->title('Lab ID'),
*/
/*CheckBox::make('enabled')
    ->value(1)
    ->title('Лабораторные')
    ->placeholder('Lab 1'),
*/

/*CheckBox::make('enabled')    ->value(1)
    ->title('Лабораторные')
    ->placeholder('Lab 1'),

     ->render(function (Lab $lab) {
                        return $lab->enabled === null
                            ?  Button::make('Подтвердить')->method('confirm',['id'=>$slot->id]) //->route('platform.selectedslots.confirm', $slot)  //->method('confirm',)
                            : ($slot->confirmed ? 'ОК' : 'Not Confirmed');
                    }

*/

/* Select::make('lab_id')
                    ->fromModel(Lab::class, 'name') // Assuming 'name' is the display field
                    ->title('Select Lab')
                    ->multiple(),
*/

/*Input::make('time_slots.datetime')
                ->type('datetime')
                ->title('datetime'),
*/

DateTimer::make('time_slots.datetime')
    ->title('datetime')
    ->allowInput(),



]),


        ]),





/*            Layout::modal('createTimeSlotModal', [
                Layout::rows([
                    Select::make('type')
                        ->title('Type')
                        ->options([
                            'phys' => 'Physics',
                            'tech' => 'Tech',
                        ])
                        ->required(),

                    Select::make('lab_id')
                        ->title('Lab')
                        ->options($this->getLabs()) // Connect to labs model or logic here
                        ->required(),

                    DateTimer::make('datetime')
                        ->title('Date & Time')
                        ->required(),
                ]),
            ])
            ->title('Create Time Slot')
            ->applyButton('Create'),

            Layout::table('timeSlots', [
                // Define the columns that you want to display
                // For example:
                'Type',
                'Lab',
                'Date & Time',
            ]),*/
        ];
    }

    // Handle creation logic
    public function createTimeSlot(Request $request)
    {
//$request->get('time_slots')['lab_id']);

$new_slot =array(); //new \stdClass;
$new_slot['datetime']=$request->get('time_slots')['datetime'];
//$new_slot['type']=$request->get('time_slots')['type'];
//$new_slot['lab_id']=$request->get('time_slots')['lab_id'];
/*	if($new_slot['lab_id']===null)
{  
$labs=Lab::all();

foreach ($labs as $lab) {

$new_slot['lab_id']= $lab->id; TimeSlot::create($new_slot);  

}


}*/

	  TimeSlot::create($new_slot );

    //    Toast::success('Time Slot created successfully!');
	Alert::success('Time Slot был успешно создан');
    }

    private function getLabs()
    {
        // Assuming you have a Lab model
        return array();//Lab::pluck('name', 'id')->toArray(); 
    }
}