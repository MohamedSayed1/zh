<?php


namespace App\ZH\Repository;


use App\ZH\Model\CheckinDateDaily;

class CheckDateDailyRepo
{

    private $daily;

    public function __construct()
    {
        $this->daily = new CheckinDateDaily();
    }


    public function add($data)
    {
        $add = new CheckinDateDaily();
        $add->date = $data['date'];
        $add->status = $data['status'];

        return $add->save();

    }

    public function updated($data)
    {
        $updated = $this->daily->find($data['id']);
        $updated->date = $data['date'];
        $updated->status = $data['status'];
        return $updated->save();
    }

    public function get()
    {
        return $this->daily->get();
    }
}