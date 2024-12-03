<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class SelectedSlotsTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = '';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [];
    }

  public $data = 'selected_slots';

   protected $fillable = [
        'user_id','lab_id','date','approve'
    ];


public function fields(): array
    {
        return [
            TD::set('user_id','student'),
            TD::set('created_at','Дата создания'),
            TD::set('updated_at','Дата обновления')
        ];
    }


}
