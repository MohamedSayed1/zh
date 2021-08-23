<?php


namespace App\ZH\Services;

use Illuminate\Support\Facades\Validator;

use App\ZH\Repository\TermsRepository;
use App\ZH\Services;
use Illuminate\Validation\Rule;

class TermsServices extends Services
{

    private $termRepository;

    public function __construct()
    {
        $this->termRepository = new TermsRepository();
    }

    public function terms()
    {
        return $this->termRepository->Terms();
    }
     public function activeTerms()
    {
        return $this->termRepository->activeTerms();
    }

    public function add($data)
    {
        //status must be active = 0
        $validation = Validator::make($data, [

            'name' => 'required|unique:terms,name',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        if ($validation->fails()) {
            $this->setError($validation->errors());
            return false;
        }
        if ($this->termRepository->add($data))
            return true;

        $this->setError(['ooh ..! Please try again']);
        return false;


    }

    public function edit($id)
    {
        return $this->termRepository->edit($id);
    }

    public function update($data)
    {



        $validation = Validator::make($data, [
            'term_id' => 'required|exists:terms,term_id',
            'name' => 'required|unique:terms,name,' . $data['term_id'] . ',term_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);


        if ($validation->fails()) {
            $this->setError($validation->errors());
            return false;
        }


        if ($this->termRepository->update($data))
            return true;

        $this->setError(['ooh ..! Please try again']);
        return false;
    }

    public function destroy($id)
    {
        if ($this->termRepository->destroy($id))
            return true;
        return false;
    }

    public function toActive($id)
    {
        return $this->termRepository->toActive($id);
    }

}
