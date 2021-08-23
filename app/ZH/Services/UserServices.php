<?php


namespace App\ZH\Services;


use App\ZH\Repository\UsersRepo;
use App\ZH\Services;
use Validator;

class UserServices extends Services
{

    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UsersRepo();
    }

    public function add($data)
    {
        $rules = [
            'name'         => 'required|max:249',
            'code'         => 'required|max:249|unique:users,code',
            'password'     => 'required|max:249',
            'group'        => 'nullable|numeric',
            'station'      => 'required|numeric',
            'phone'        => 'nullable|numeric|digits:11|unique:users,phone',
            'parent_phone' => 'nullable|numeric|digits:11',
            'faculty'      => 'nullable',
            'educational_level' => 'nullable|max:249',
        ];

        // vaild
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }

        if ($this->userRepo->add($data)) {
            return true;
        }

        $this->setError(['Oh...! Please try again']);
        return false;
    }

    public function updated($data)
    {
        $rules = [
            'name'        => 'required|max:249',
            'code'        => 'required|max:249|unique:users,code,' . $data['id'] . ',id',
            'id'          => 'required|max:249',
            'group'    => 'nullable|numeric',
            'station'  => 'required|numeric',
            'phone'       => 'nullable|numeric|digits:11|unique:users,phone,'. $data['id'] . ',id',
            'parent_phone' => 'nullable|numeric|digits:11',
            'faculty'      => 'nullable',
            'educational_level' => 'nullable|max:249',
        ];

        // vaild
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }

        if ($this->userRepo->updated($data)) {
            return true;
        }

        $this->setError(['Oh...! Please try again']);
        return false;
    }

    // updated Password By Admin
    public function updatedPasswordAdmin($data)
    {
        $rules = [
            'id' => 'required',
            'password' => 'required|confirmed|min:2',
        ];

        // vaild
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }

        if ($this->userRepo->updatedPass($data)) {
            return true;
        }

        $this->setError(['هناك خطاء ..برجاء المحاوله مره اخري .. !']);
        return false;
    }


    // get All Users

    public function getUsers()
    {
        return $this->userRepo->get();
    }

    public function search($data)
    {
        return $this->userRepo->search($data);
    }

    public function getUser($id)
    {
        $user = $this->userRepo->getByid($id);

        if (!empty( $user))
            return $user;


        return false;
    }




}