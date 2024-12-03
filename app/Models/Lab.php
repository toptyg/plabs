<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;


class Lab extends Model
{
 use AsSource, Filterable;

 
 protected $fillable = [
        'name','type','studs_max','place','number','created_at'
    ];

 protected $allowedSorts = [
        'id','name','type','studs_max','place','number',
        'created_at',
        'updated_at'
    ];
protected $allowedFilters = [
        'id' => Like::class ,'name' => Like::class,'type' => Like::class,'studs_max' => Like::class,'place' => Like::class,'number' => Like::class,
        'created_at' => Like::class,
        'updated_at' => Like::class,
];


}
