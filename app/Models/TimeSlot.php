<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;


class TimeSlot extends Model
{

  use AsSource,Filterable;

 protected $fillable = [
        'datetime','created_at','updated_at'
    ];

}


