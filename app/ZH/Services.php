<?php


namespace App\ZH;


class Services
{
    private $errors ,    //array of errors
     $duplicatedError;

    public function setError($error)
    {
        if (is_array($error))
            $this->errors = $error;
        else
            $this->errors = $error;
    }

    public function setDuplicatedError($error)
    {
        if (is_array($error))
            $this->errors = $error;
        else
            $this->errors = $error;
    }


    public function errors()
    {
        return $this->errors;
    }

    public function getDuplicated()
    {
        return $this->duplicatedError;
    }
}
