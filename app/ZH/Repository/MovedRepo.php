<?php


namespace App\ZH\Repository;


use App\ZH\Model\Moved;

class MovedRepo
{

    private $moved;

    public function __construct()
    {
        $this->moved = new Moved();
    }
    //add
    public function add($data)
    {
        $this->moved->appoint_id = $data['app_id'];
        $this->moved->type = 'wait';
        $this->moved->date = date('Y-m-d');
        $this->moved->sper_id = isset($data['super_id'])?$data['super_id']:null;
        $this->moved->deriver_id = isset($data['deriver_id'])?$data['deriver_id']:null;
        $this->moved->count_bus = $data['count_bus'];
        $this->moved->numper_bus = $data['numper_bus'];

        return $this->moved->save();
    }
    // deflate Wait Will updated to " moved"
    public function updatedType($id)
    {
        $mov = $this->moved->find($id);
        $mov->type = 'move';
        return $mov->save();
    }
    // updated
    public function updated($data)
    {
        $updated = $this->moved->find($data['id']);
        $updated->deriver_id = isset($data['deriver_id'])?$data['deriver_id']:$updated->deriver_id;
        $updated->count_bus = $data['count_bus'];
        $updated->numper_bus = $data['numper_bus'];

        return $updated->save();
    }
    // get BY Appoint id
    public function getItem($app_id)
    {
        return $this->moved->where('appoint_id',$app_id)->get();
    }
    // get By item to this super ( mobile -> check to make add )
    public function getitemSuper($app_id,$spuer)
    {
        return $this->moved->where([
            ['appoint_id',$app_id],
            ['sper_id',$spuer]
        ])->get();
    }
    // get By item to this Driver ( mobile -> check to make add )
    public function getitemDervices($app_id,$deriver)
    {
        return $this->moved->where([
            ['appoint_id',$app_id],
            ['deriver_id',$deriver]
        ])->get();
    }
    // get BY id
    public function getBYid($id)
    {
        return $this->moved->find($id);
    }
}