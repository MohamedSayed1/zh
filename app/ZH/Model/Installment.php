<?php

namespace App\ZH\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{

    protected $table='installments';
    protected $primaryKey='id';
    protected $guarded=[];

    public function subscribe()
    {
        return $this->belongsTo(Subscribe::class, 'subscribe_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
