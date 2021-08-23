<?php

namespace App\ZH\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    protected $table='payment_settings';
    protected $primaryKey='setting_id';

    protected $guarded=[];

    public function subscribe()
    {
        return $this->hasMany(Subscribe::class,'payment_id','setting_id');
    }
}
