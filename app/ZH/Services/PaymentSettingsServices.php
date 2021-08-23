<?php


namespace App\ZH\Services;


use App\ZH\Repository\PaymentSettingsRepository;
use App\ZH\Services;
use Illuminate\Support\Facades\Validator;

class PaymentSettingsServices extends Services
{

    private $methodsRepositories;

    public function __construct()
    {
        $this->methodsRepositories = new PaymentSettingsRepository();
    }

    public function methods()
    {
        return $this->methodsRepositories->methods();
    }

    public function add($data)
    {

        $validation = Validator::make($data, [

            'name' => 'required|unique:payment_settings,name',
            'prices' => 'required|numeric|gt:-1',

        ]);

        if ($validation->fails()) {
            $this->setError($validation->errors());
            return false;
        }
        if ($this->methodsRepositories->add($data))
            return true;

        $this->setError(['ooh ..! Please try again']);
        return false;


    }

    public function edit($id)
    {
        return $this->methodsRepositories->edit($id);
    }

    public function update($data)
    {

        $validation = Validator::make($data, [
            'setting_id' => 'required|exists:payment_settings,setting_id',
            'name' => 'required|unique:payment_settings,name,' . $data['setting_id'] . ',setting_id',
            'prices' => 'required|numeric|gt:0',
        ]);

        if ($validation->fails()) {

            $this->setError($validation->errors());
            return false;
        }

        if ($this->methodsRepositories->update($data))
            return true;

        $this->setError(['ooh ..! Please try again']);
        return false;
    }

    public function destroy($id)
    {
        if ($this->methodsRepositories->destroy($id))
            return true;
        return false;
    }

}
