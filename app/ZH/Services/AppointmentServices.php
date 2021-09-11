<?php


namespace App\ZH\Services;


use App\ZH\Model\Term;
use App\ZH\Repository\AppointmentRepo;
use App\ZH\Services;

use Illuminate\Validation\Rule;
use Validator;

class AppointmentServices extends Services
{

    private $appoint;

    public function __construct()
    {
        $this->appoint = new AppointmentRepo();
    }

    // index (( have Pagginged

    public function get()
    {
        return $this->appoint->get();
    }

    public function add($data)
    {
        if($trim_id = $this->checkTirm())
        {
            $data['term'] = $trim_id;
            $rules = [
                'date' => 'required|date|',
                'time' => ['required', 'date_format:H:i',
                    Rule::unique('appointment', 'time')->where('date', $data['date'])],
                'status' => 'required',
                'to_student' => 'required',

            ];
            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                $this->setError($validator->errors());
                return false;
            }


            if ($this->appoint->add($data)) {
                // check Count if > 0
                $this->Countadd($data);
                return true;
            }

            $this->setError(['ooh ..! Please try again']);
            return false;
        }

        $this->setError(['ooh ..! Please add trim first :(']);
        return false;

    }


    public function Countadd($data)
    {
        if ($data['count'] != null) {

            $date = date('Y-m-d', strtotime($data['date'] . '+ 1 days'));

            for ($i = 0; $i < $data['count']; $i++) {
                $new = $i == 0 ? $date : date('Y-m-d', strtotime($new . '+ 1 days'));
                $data['date'] = $new;
                // make valid date :)
                $rules = [
                    'date' => 'required|date|',
                    'time' => ['required', 'date_format:H:i',
                        Rule::unique('appointment', 'time')->where('date', $data['date'])],
                ];
                $validator = Validator::make($data, $rules);
                // valid
                if (!$validator->fails()) {
                    $this->appoint->add($data);
                }
            }

            return true;
        }
        return true;
    }

    public function getByid($id)
    {
        $data = $this->appoint->getByid($id);

        if (!empty($data))
            return $data;


        return false;
    }

    // updated Appointment

    /**
     *->where(function ($query)use ($date) {
     * return $query->where('date', $date);
     * })
     */

    public function updated($data)
    {
        if ($check = $this->getByid($data['id'])) {
            $date = $data['date'];
            $rules = [
                'date' => 'required|date|',
                'time' => ['required',
                    Rule::unique('appointment', 'time')
                        ->where('date', $data['date'])
                        ->ignore($data['id'], 'app_id')
                ],
                'status' => 'required',
                'to_student' => 'required',
                'id' => 'required',

            ];
            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                $this->setError($validator->errors());
                return false;
            }

            if ($this->appoint->updated($data))
                return true;


            $this->setError(['ooh ..! Not Found Please try again']);
            return false;

        }
        $this->setError(['ooh ..! Not Found Please try again']);
        return false;
    }


    public function getByDate($date, $group)
    {
        if ($group == 5)
            return $this->appoint->getByDateStatudent($date);


        return $this->appoint->getByDateAll($date);


    }

    public function checkTirm()
    {
        // get tirm

        $tr = Term::where('status','1')->first();

        if(!empty($tr))
            return $tr->term_id;


        return false;

    }
}
