<?php


namespace App\ZH\Repository;


use App\User;

class UsersRepo
{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function add($data)
    {
        $this->user->name = $data['name'];
        $this->user->code = $data['code'];
        $this->user->password = bcrypt($data['password']);
        $this->user->group_id = isset($data['group'])?$data['group']:5;
        $this->user->station_id = $data['station'];
        $this->user->faculty = $data['faculty'];
        $this->user->educational_level = $data['educational_level'];
        $this->user->phone = $data['phone'];
        $this->user->parent_phone = $data['parent_phone'];
        $this->user->notes = $data['note'];
        $this->user->is_active = 1;
        return $this->user->save();
    }

    public function updated($data)
    {
        $user = $this->user->find($data['id']);

        $user->name = $data['name'];
        $user->code = $data['code'];
        $user->group_id = isset($data['group'])?$data['group']:$user->group_id;
        $user->station_id = $data['station'];
        $user->faculty = $data['faculty'];
        $user->educational_level = $data['educational_level'];
        $user->phone = $data['phone'];
        $user->parent_phone = $data['parent_phone'];
        $user->notes = $data['note'];
        $user->is_active = $data['active'];
        return $user->save();

    }

    public function updatedPass($data)
    {
        $user = $this->user->find($data['id']);
        $user->password = bcrypt($data['password']);
        return $user->save();
    }

    public function changeStatus($id,$active)
    {
        $user = $this->user->find($id);
        $user->is_active = $active;
        return $user->save();
    }


    public function get()
    {
        return $this->user->with('getGroup','getStations')->orderBy('updated_at','desc')->get();
    }

    public function search($data)
    {
        $code = $data['code'];
        $group = $data['group'];
        $station = $data['station'];
        $name = $data['name'];
        return $this->user->when($code, function ($q) use ($code) {
            return $q->where('code',$code);
        })->when($group, function ($q) use ($group) {
            return $q->where('group_id',$group);
        })->when($name, function ($q) use ($name) {
            return $q->where('name','like', '%' .$name.'%');
        })->when($station, function ($q) use ($station) {
            return $q->where('station_id',$station);
        })->orderBy('updated_at','desc')->get();
    }


    // get user

    public function getByid($id)
    {
        return $this->user->with('getGroup','getStations')->find($id);
    }


}