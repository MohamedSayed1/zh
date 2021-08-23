<?php


namespace App\ZH\Repository;


use App\User;
use App\ZH\Model\Installment;
use App\ZH\Model\Subscribe;

class SubscribesRepository
{
    private $subscribeModel, $userModel;

    public function __construct()
    {
        $this->subscribeModel = new Subscribe();
        $this->userModel = new User();

    }


    //get all Required tables based on foreign key in this model (subscription)
    //جلب الطلاب المطلوبه مع جدول subscribes

  
    public function getAllStudent($id)
    {

        $students = $this->userModel::whereHas('getGroup', function ($q) {
            return $q->where('name','!=', 'owner');
        })->when($id, function ($query) use ($id) {
            return $query->where('id', $id);

        })->get();


        if (!$students)
            return false;

        return $students;


    }

    /* */
    public function getAllSubscribes($request)
    {
     
      if(auth()->user()->group_id ==1 || $request->search){


        $subscribes = $this->subscribeModel::whereHas('user', function ($q) use ($request) {
            if ($request->search)
                return $q->where('code', '=', $request->search)
                    ->orwhere('name', 'like', '%' . $request->search . '%');

        })->with('user', 'term', 'paymentSetting')->orderBy('updated_at', 'desc')->paginate('100');

        return $subscribes;
       }else{
         
        $subscribes = $this->subscribeModel::whereHas('user', function ($q) use ($request) {
            if ($request->search)
                return $q->where('code', '=', $request->search)
                    ->orwhere('name', 'like', '%' . $request->search . '%');

        })->with('user', 'term', 'paymentSetting')->latest()->limit('30')->get();
        

        return $subscribes;

       }

//       when
//        wherehase
//        orwherehas)


    }

    public function store($data)
    {

// status paid = 0 , not paid =1 , ***=2

        if ($data['total'] <= 0)
            $status = 2;
        elseif ($data['paid'] >= $data['total'] && $data['total'] != 0)
            $status = 0;
        else
            $status = 1;


        $subscription = $this->subscribeModel::create([
            'user_id' => $data['user_id'],
            'term_id' => $data['term_id'],
            'payment_id' => $data['payment_id'],
            'total' => $data['total'],
            'paid' => $data['paid'],
            'next_payment_date' => $data['next_payment_date'],
            'unpaid' => $data['unpaid'],
            'paid_percentage' => $data['paid_percentage'],

            'created_by' => auth()->user()->id ?? 1,

            'status' => $status,
            'note' => $data['note']

        ]);
        //dd($subscription);

        //only create first once when paid >0 in first subscribe

        if ($data['paid'] != 0) {
            Installment::create([

                'subscribe_id' => $subscription->id,
                'pay_debt' => $subscription->paid,
                'created_by' => auth()->user()->id ?? 1,

            ]);
        }
        return true;


    }

    public function edit($id)
    {
        return $this->subscribeModel::findOrFail($id);
    }

    public function update($data)
    {
        if ($data['total'] <= 0)
            $status = 2;
        elseif ($data['paid'] >= $data['total'] && $data['total'] != 0)
            $status = 0;
        else
            $status = 1;

        $subscribe = $this->subscribeModel::find($data['id']);

        if (!empty($subscribe)) {


            if ($data['total'] > 0) {

                $percentage_number = ($data['paid'] / $data['total']) * 100;
                $percentage = round($percentage_number, 1);

            } else
                $percentage = $data['paid_percentage'];

            $subscribe->update([
                'user_id' => $data['user_id'],
                'term_id' => $data['term_id'],
                'payment_id' => $data['payment_id'],
                'total' => $data['total'],
                'paid' => $data['paid'],
                'next_payment_date' => $data['next_payment_date'],
                'unpaid' => $data['unpaid'],
                'paid_percentage' => $percentage,
                // 'created_by'  => auth()->user()->id,
                'created_by' => auth()->user()->id,
                'status' => $status,
                'note' => $data['note']
            ]);

            $subscribe_id = $subscribe->id;

//check if installment before if isset delete all and create new in only update main subscribe

            $installments = $subscribe->whereHas('installments', function ($q) use ($subscribe_id) {
                return $q->where('subscribe_id', $subscribe_id);
            })->with('installments')->get();

            if (!empty($installments)) {
                Installment::where('subscribe_id', $subscribe_id)->delete();
            }

            if ($data['paid'] != 0) {
                Installment::create([

                    'subscribe_id' => $subscribe_id,
                    'pay_debt' => $data['paid'],
                    'created_by' => auth()->user()->id,

                ]);
            }
            return true;
        }

        return false;


    }

    public function destroy($id)
    {
        // $this->subscribeModel->find($id)->delete();

        $subscribe = $this->subscribeModel->find($id);
        if (!empty($subscribe)) {
            $subscribe->delete();
            return true;
        }
        return false;
    }

    public function updateAndAddInstallment($data)
    {

        $subscribe = $this->subscribeModel::find($data['id']);


        if (!empty($subscribe)) {

            if ($subscribe->total > 0) {

                $total = $subscribe->total;

                $current_paid = $subscribe->paid + $data['pay_debt'];
                $current_unpaid = $total - $current_paid;

                $paid_percentage = ($current_paid / $total) * 100;
                $paid_percentage_round = round($paid_percentage, 1);

                $subscribe->update([

                    'paid' => $current_paid,
                    'next_payment_date' => $data['next_payment_date'],
                    'unpaid' => $current_unpaid,
                    'paid_percentage' => $paid_percentage_round,
                    'status' => ($current_paid >= $total) ? 0 : 1,
                    'created_by' => auth()->user()->id,
                    'note' => $data['note']
                ]);
            } else {
                $current_paid = $subscribe->paid + $data['pay_debt'];
                $subscribe->update([

                    'paid' => $current_paid,
                    'created_by' => auth()->user()->id,
                    'status' => 2,
                    'next_payment_date' => $data['next_payment_date'],
                    'note' => $data['note']
                ]);

            }

            Installment::create([
                'subscribe_id' => $subscribe->id,
                'pay_debt' => $data['pay_debt'],
                'created_by' => auth()->user()->id,
            ]);

            return true;
        }
        return false;

    }


}
