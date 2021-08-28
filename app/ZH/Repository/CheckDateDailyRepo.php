<?php


namespace App\ZH\Repository;


use App\ZH\Model\CheckinDateDaily;
use App\ZH\Model\CheckInSetUp;

class CheckDateDailyRepo
{

    private $daily;
    private $dailyAnswer;

    public function __construct()
    {
        $this->daily = new CheckinDateDaily();
        $this->dailyAnswer = new CheckInSetUp();
    }


    public function add($data)
    {
        $add = new CheckinDateDaily();
        $add->date = $data['date'];
        $add->status = $data['status'];
        $add->time = $data['time'];

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
        return $this->daily->orderBy('daily_id', 'desc')->paginate(10);
    }

    //**********daily date answer  ***/

    public function getAnswers()
    {
        return $this->dailyAnswer->orderBy('setup_id', 'desc')->paginate(10);
    }

    public function addAnswer($data)
    {
        $add = new CheckInSetUp();
        $add->name = $data['name'];
        $add->status = $data['status'];


        return $add->save();

    }
}
