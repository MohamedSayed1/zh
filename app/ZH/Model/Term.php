<?php

namespace App\ZH\Model;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table='terms';

    protected $primaryKey='term_id';

    protected  $guarded=[];

    public function subscribes()
    {
        return $this->hasMany(Subscribe::class,'term_id','term_id');
    }


}
