<?php


namespace App\ZH\Services;


use App\ZH\Repository\MovedRepo;
use App\ZH\Services;
use Validator;

class MovedServices extends Services
{
    private $movedRepo;

    public function __construct()
    {
        $this->movedRepo = new MovedRepo();
    }

    // add

    public function add($data)
    {
        $rules = [
            'app_id' => 'required|numeric',
            'super_id' => 'required|numeric',
            'deriver_id' => 'nullable|numeric',
            'count_bus' => 'required|numeric',
            'numper_bus' => 'required|max:80',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors());
            return false;
        }

        if ($this->movedRepo->add($data))
            return true;


        $this->setError(['ooh ..! Please try again']);
        return false;

    }

    public function updated($data)
    {

        if ($this->getByid($data['id'])) {


            $rules = [
                'deriver_id' => 'nullable|numeric',
                'count_bus' => 'required|numeric',
                'numper_bus' => 'required|max:80',
                'id' => 'required',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                $this->setError($validator->errors());
                return false;
            }

            if ($this->movedRepo->updated($data))
                return true;


            $this->setError(['ooh ..! Please try again']);
            return false;
        }

        $this->setError(['ooh ..! Not Found']);
        return false;
    }

    public function updatedType($id)
    {
        if ($this->getByid($id))
        {
            if($this->movedRepo->updatedType($id))
                return true;


            $this->setError(['ooh ..! Have Errors Please try again']);
            return false;
        }

        $this->setError(['ooh ..! Not Found']);
        return false;
    }

    public function getByid($id)
    {
        $item = $this->movedRepo->getBYid($id);

        if (!empty($item))
            return $item;


        return false;
    }

    public function getItem($app_id)
    {
            return $this->movedRepo->getItem($app_id);
    }
}