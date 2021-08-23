<?php


namespace App\ZH\Services;


use App\ZH\Repository\CheckDateDailyRepo;
use App\ZH\Services;
use Validator;

class DailyServices extends Services
{

    private $dailyRepo;

    public function __construct()
    {
        $this->dailyRepo = new CheckDateDailyRepo();
    }

    public function add($data)
    {
        $rules = [
            'date' => 'required|date|unique:checkin_date_daily,date',
            'status' => 'required|numeric',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors());
            return false;
        }


        if ($this->dailyRepo->add($data)) {
            // check Count if > 0
            $this->Countadd($data);
            return true;
        }

        $this->setError(['ooh ..! Please try again']);
        return false;
    }


    public function Countadd($data)
    {
        if ($data['count'] != null) {

            $date = date('Y-m-d', strtotime($data['date'] . '+ 1 days'));

            for ($i = 0; $i < $data['count']; $i++) {
                $new = $i == 0 ? $date : date('Y-m-d', strtotime($new . '+ 1 days'));
                $data['date'] = $new;
                $this->dailyRepo->add($data);

            }

            return true;
        }
        return true;
    }

    public function updated($data)
    {
        $rules = [
            'date' => 'required|date|unique:checkin_date_daily,date,'. $data['id'] . ',daily_id',
            'status' => 'required|numeric',
            'id' => 'required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors());
            return false;
        }


        if ($this->dailyRepo->updated($data)) {
            // check Count if > 0
            return true;
        }

        $this->setError(['ooh ..! Please try again']);
        return false;
    }

    public function get()
    {
        return $this->dailyRepo->get();
    }
}