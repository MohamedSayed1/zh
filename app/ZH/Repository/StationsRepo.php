<?php


namespace App\ZH\Repository;


use App\ZH\Model\Stations;

class StationsRepo
{
    // new Station
    private $station;
    public function __construct()
    {
        $this->station = new Stations();
    }

    public function add($data)
    {
        $this->station->name = $data['name'];
        return $this->station->save();
    }

    public function updated($data)
    {
        $sta = $this->station->find($data['id']);
        $sta->name = $data['name'];
        return $sta->save();
    }

    public function get()
    {
        return $this->station->get();
    }

    public function getByid($id)
    {
        return $this->station->find($id);
    }
}
