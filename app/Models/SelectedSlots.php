<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;


class SelectedSlots extends Model
{
  use AsSource,Filterable;
 protected $fillable = [
        'user_id','date','lab_id','approved'
    ];

protected $allowedFilters = [
    'id'=> Like::class,'user_id'=> Like::class,'date'=> Like::class,'lab_id'=> Like::class,'approved' => Like::class,
];

  protected $allowedSorts = [
        'id','user_id','date','lab_id','approved',
        'created_at',
        'updated_at'
    ];

public function user($email)
    {
//$user=User
 $user = User::where('email',$email)->first();
if ($user)    return  $user->name;//$this->belongsTo(User::class);
else  return "-";

    }

public function get_group($email)

{
$user = User::where('email',$email)->first();

//$u=194710;

if(strpos($email, '@edu.spbstu.ru'))
{


$client0 = new \GuzzleHttp\Client();
$client1 = new \GuzzleHttp\Client();

$res2 = $client1->get('http://docker-svc.spbstu.ru:3007/api/v2/asu/students/'.$user->profile_id, [
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

//dd($obj_group);
return $obj_group->number;

}

else return ;
}





public function get_lab($lab_id)
    {
//$user=User
 $lab = Lab::where('id',$lab_id)->first();
if ($lab)    return  $lab->number.'/'. $lab->type;//$this->belongsTo(User::class);
else  return "-";

    }


}
