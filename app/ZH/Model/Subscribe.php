<?php

namespace App\ZH\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $table = 'subscribes';

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id', 'term_id');
    }

    public function paymentSetting()
    {
        return $this->belongsTo(PaymentSetting::class, 'payment_id', 'setting_id');
    }

    public function installments()
    {
        return $this->hasMany(Installment::class, 'subscribe_id', 'id');
    }



}
