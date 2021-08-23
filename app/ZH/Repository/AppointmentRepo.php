<?php


namespace App\ZH\Repository;


use App\ZH\Model\Appointment;

class AppointmentRepo
{

    private $appoint;

    public function __construct()
    {
        $this->appoint = new Appointment();
    }

    /**
     * @param $data
     * @return bool
     */
    public function add($data)
    {
        $add = new Appointment();
        $add->date = $data['date'];
        $add->time = $data['time'];
        $add->status = $data['status'];
        $add->to_student = $data['to_student'];
        return $add->save();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function updated($data)
    {
        $appoint = $this->appoint->find($data['id']);
        $appoint->date = $data['date'];
        $appoint->time = $data['time'];
        $appoint->status = $data['status'];
        $appoint->to_student = $data['to_student'];
        return $appoint->save();
    }

    /**
     * @param $date
     * @param null $is_Studen
     * @return mixed
     *
     * is_student -> if user student send '['to_student',1 ]',
     * else ->null
     */
    public function getByDateAll($date)
    {
        return $this->appoint->where([
            ['date', $date],
            ['status', 1],
        ])->get();
    }
    public function getByDateStatudent($date)
    {
        return $this->appoint->where([
            ['date', $date],
            ['status', 1],
            ['to_student',1]
        ])->get();
    }

    // get By ID
    public function getByid($id)
    {
        return $this->appoint->find($id);
    }

    /*
     *  get paginate {{ index ))
     */

    public function get()
    {
        return $this->appoint->orderBy('app_id', 'desc')->paginate(10);
    }
}