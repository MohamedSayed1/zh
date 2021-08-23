<?php

namespace App\ZH\Services;

use App\User;
use App\ZH\Model\Subscribe;
use App\ZH\Repository\SubscribesRepository;
use App\ZH\Services;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SubscribesServices extends Services
{
    private $subscribeRepositories;

    public function __construct()
    {
        $this->subscribeRepositories = new SubscribesRepository();
    }


    public function getAllStudent($id)
    {
        return $this->subscribeRepositories->getAllStudent($id);
    }

    public function getAllSubscribes($request)
    {
        return $this->subscribeRepositories->getAllSubscribes($request);
    }

    public function store($data)
    {

     if(isset($data['user_id'])&& isset($data['payment_id'])){

            $validator = Validator::make($data, [
                'user_id' => 'required|exists:users,id',
                'term_id' => 'required|exists:terms,term_id',
                'payment_id' => 'required|exists:payment_settings,setting_id',
                'total' => 'required|numeric|gt:-1',
                'paid' => 'required|numeric|gt:0',
                'next_payment_date' => 'nullable',
                'unpaid' => 'nullable',
                'paid_percentage' => 'nullable',
                'user_id' => [
                    Rule::unique('subscribes', 'user_id')->where(function ($query) use ($data) {
                        return $query->where('term_id', $data['term_id']);
                    }),
                ],
                'note' => 'nullable',

            ]);

            if ($validator->fails()) {
                $this->setError($validator->errors());
                return false;
            }


            $student_duplicated = Subscribe::where(
                [
                    ['user_id', $data['user_id']],
                    ['payment_id', $data['payment_id']]
                ])->first();

            if ($student_duplicated) {

                $this->setError($validator->errors()->add('duplicated', 'This person is already subscribed '));
                return false;
            }


            if ($this->subscribeRepositories->store($data))
                return true;
            $this->setError(['ooh ..! Please try again']);
            return false;
        }
     return false;
    }


    public function edit($id)
    {
        return $this->subscribeRepositories->edit($id);
    }

    public function update($data)
    {

        //  $subscribe_all = Subscribe::pluck('payment_id', 'user_id')->toArray();


        //$payment = $data['payment_id'];
        $user_id = $data['user_id'];
        //$term_id = $data['term_id'];

        $validator = Validator::make($data, [
            'id' => 'required|exists:subscribes,id',
            'term_id' => 'required|exists:terms,term_id',
            'payment_id' => 'required|exists:payment_settings,setting_id',
            'total' => 'required|numeric|gt:-1',
            'paid' => 'required|numeric|gt:0',
            'next_payment_date' => 'nullable',
            'unpaid' => 'nullable',
            'paid_percentage' => 'nullable',

            'note' => 'nullable',
            'user_id' => ['required',
                Rule::unique('subscribes', 'user_id')->where(function ($query) use ($data) {
                    return $query->where('term_id', $data['term_id'])
                        ->orWhere('payment_id', $data['payment_id']);
                })->ignore($data['id'], 'id'),
            ],
        ]);
        if ($validator->fails()) {
            //dd($validator->errors());;
            $this->setError($validator->errors());
            return false;
        }

        //   dd('not error');
        $student_exist = User::find($user_id);

        if (!$student_exist) {

            $this->setError($validator->errors()->add('invalid_student', 'invalid_student please select valid student '));
            return false;
        }


        if ($this->subscribeRepositories->update($data))
            return true;
        $this->setError(['ooh ..! Please try again']);
        return false;

    }

    public function destroy($id)
    {
        return $this->subscribeRepositories->destroy($id);
    }


    public function updateAndAddInstallment($data)
    {


        $validator = Validator::make($data, [

            'id' => 'required|exists:subscribes,id',

            'pay_debt' => 'required|numeric|gt:0',

            'next_payment_date' => 'nullable',

            'note' => 'nullable',
        ]);
        if ($validator->fails()) {

            $this->setError($validator->errors());
            return false;
        }


        if ($this->subscribeRepositories->updateAndAddInstallment($data))
            return true;
        $this->setError(['ooh ..! Please try again']);
        return false;
    }
}


