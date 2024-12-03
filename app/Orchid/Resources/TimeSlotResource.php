<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
    
use Orchid\Screen\Fields\DateTimer;
//use Orchid\Screen\Fields\DateTimer;


class TimeSlotResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\TimeSlot::class;


public static function perPage(): int
{
    return 100;
}

    /**
     * Get the fields displayed by the resource.
     *
     * @return array

     */
    public function fields(): array
    {
        return [



/*    Input::make('id') // assuming there's a name field
                ->title('id')
                ->placeholder('Enter id')
                ->required(),
*/
            DateTimer::make('datetime') // add your datetime field
                ->title('Date and Time')
                ->required()->allowInput(),
            //    ->format('Y-m-d H:i:s'), // define the format you need






];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {

return [

   TD::make('id'),

         TD::make('datetime')->sort()->filter(),
    //        Input::make('id') // assuming there's a name field
    //            ->title('id')
    //            ->placeholder('Enter id')
    //            ->required(),

    //        DateTimer::make('datetime') // add your datetime field
    //            ->title('Date and Time')
    //            ->required()
    //            ->format('Y-m-d H:i:s'), // define the format you need
        ];




//            TD::make('id'),

//         TD::make('datetime')->sort()->filter(),

/*    DateTimer::make('datetime')
    ->title('Дата')
    ->allowInput(),
*/

    /*        TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),*/

    /*        TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),*/
        
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [

	Sight::make('id', '_ID'),
        Sight::make('datetime', 'Дата'),


    Sight::make('created_at', 'Дата создания'),
    Sight::make('updated_at', 'Дата изменения'),


];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
