<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use App\Orchid\Resources\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;

class LabResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    
/* public $data = 'labs';

   protected $fillable = [
        'name','type'
    ];
*/
 public function name(): ?string
    {
        return 'Лабораторные';
    }

public static function perPage(): int
{
    return 100;
}

public static $model = \App\Models\Lab::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
//		TD::make('id')->sort()->filter(),
//                TD::make('name'), //->sort()->filter(),
//                TD::make('type'), //->sort()->filter(),
//                TD::make('number')->sort()->filter(),
//                TD::make('place')->sort()->filter(),
//                TD::make('studs_max')->sort()->filter(),

	/*	Input::make('number')
                ->title('Номер работы')
                ->placeholder('стоимость курса в рублях')
                ->required()
                ->type('number')
                ->step('1')
                ->autocomplete('off'),
*/
		Input::make('id')
                ->title('_id')
                ->placeholder('введите id')
                ->required()->disabled()
                ->autocomplete('off'),

		Input::make('number')
                ->title('Номер лабы.')
                ->placeholder('введите номер')
                ->required()
                ->autocomplete('off'),


		Input::make('type')
                ->title('Тип зала')
                ->placeholder('phys/tech')
                ->required()
                ->autocomplete('off'),

		Input::make('place')
                ->title('Зал')
                ->placeholder('')
                ->required()
                ->autocomplete('off'),

		Input::make('name')
                ->title('Название лаб. работы')
                ->placeholder('введите название')
                ->required()
                ->autocomplete('off'),

		Input::make('studs_max')
                ->title('MAX студентов')
                ->placeholder('')
                ->required()
                ->type('number')
                ->step('1')
                ->autocomplete('off'),

	
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

            //    TD::make('id')->sort()->filter(),
                TD::make('number')->sort()->filter(),
                TD::make('name')->sort()->filter(),
                TD::make('type')->sort()->filter(),

            //    TD::make('place')->sort()->filter(),
            //    TD::make('studs_max')->sort()->filter(),





];


        

/*            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
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
	Sight::make('number', 'Номер'),

	Sight::make('name', 'Название лабораторной'),
        
            Sight::make('type', 'Тип'),
    /*        Sight::make('visible', 'Опубликовано')->render(function ($model) {
                return $model->visible ? 'Да' : 'Нет';
            }),*/
            Sight::make('place', 'Зал'),
    Sight::make('studs_max', 'MAX студентов'),
/*            Sight::make('img_id', 'Изображение')->render(function ($model) {
                $attachment = Attachment::find($model->img_id);
                if ($attachment) {
                    return '<img src="' . URL::asset($model->img) . '" alt="Изображение курса" width="100">';
                }
                return 'Изображение не найдено';
            }),*/



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
