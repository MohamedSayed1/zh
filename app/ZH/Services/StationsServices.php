<?php


namespace App\ZH\Services;


use App\ZH\Repository\StationsRepo;
use App\ZH\Services;
use Validator;

class StationsServices extends Services
{

    private $station;

    public function __construct()
    {
        $this->station = new StationsRepo();
    }

    public function get()
    {
        return $this->station->get();
    }

    public function getByid($id)
    {
        return $this->station->getByid($id);
    }

    public function add($data)
    {
        $rules = [
            'name'       => 'required|max:249|unique:stations,name',
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors());
            return false;
        }
        if ($this->station->add($data)) {
            return true;
        }

        $this->setError(['ooh ..! Please try again']);
        return false;
    }

    public function updated($data)
    {
        $rules = [
            'id'         =>'required',
            'name'       => 'required|max:249|unique:stations,name,' . $data['id'] . ',id',
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $this->setError($validator->errors());
            return false;
        }
        if ($this->station->updated($data)) {
            return true;
        }

        $this->setError(['ooh ..! Please try again']);
        return false;
    }

    public function updatedView($id)
    {
        $data = $this->station->getByid($id);
        if(!empty($data))
            return $data;


        return false;
    }
}
