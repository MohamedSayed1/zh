<?php


namespace App\ZH\Repository;


use App\ZH\Model\PaymentSetting;
use App\ZH\Model\Subscribe;

class PaymentSettingsRepository
{
    private $methodModel;

    public function __construct()
    {
        $this->methodModel = new PaymentSetting();
    }

    public function methods()
    {
        return $this->methodModel->all();
    }

    public function add($data)
    {


        return $this->methodModel::create([
            'name' => $data['name'],
            'prices' => $data['prices'],
        ]);

    }

    public function edit($id)
    {
        return $this->methodModel->findOrFail($id);
    }

    public function update($data)
    {
        $method = $this->methodModel->find($data['setting_id']);

        if ($method) {
            $method->update([
                'name' => $data['name'],
                'prices' => $data['prices'],

            ]);

            $subscribes = Subscribe::where('payment_id', $data['setting_id'])->get();

            if (count($subscribes) > 0) {
                foreach ($subscribes as $subscribe) {
                    $un_paid = $data['prices'] - $subscribe->paid;
                    $paid_percentage=0;
                    if ($data['prices'] >= $subscribe->paid)
                        $paid_percentage = ($subscribe->paid / $data['prices']) * 100;


                    $subscribe->update([
                        'total' => $data['prices'],
                        'unpaid' => $un_paid,
                        'paid_percentage' => round($paid_percentage,1),
                    ]);
                }
            }
            return true;
        }
        return false;

    }

    public function destroy($id)
    {
        $method = $this->methodModel->find($id);
        if ($method) {
            $method->delete();
            return true;
        }
        return false;

    }
}
