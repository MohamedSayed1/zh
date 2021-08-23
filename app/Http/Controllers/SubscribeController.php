<?php

namespace App\Http\Controllers;

use App\User;
use App\ZH\Model\Installment;
use App\ZH\Model\PaymentSetting;
use App\ZH\Model\Subscribe;
use App\ZH\Services\PaymentSettingsServices;
use App\ZH\Services\SubscribesServices;
use App\ZH\Services\TermsServices;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use  RealRashid\SweetAlert\Facades\Alert;

class SubscribeController extends Controller
{
    private $subscribeServices, $termsServices, $PaymentSettingsServices;

    public function __construct()
    {
        $this->subscribeServices = new SubscribesServices();
        $this->termsServices = new TermsServices();
        $this->PaymentSettingsServices = new PaymentSettingsServices();
    }

    public function index(Request $request ,$id =0)
    {



        $students = $this->subscribeServices->getAllStudent($id);
        $terms = $this->termsServices->activeTerms();
        $methods = $this->PaymentSettingsServices->methods();
        $subscribes = $this->subscribeServices->getAllSubscribes($request);


        return view('admin/subscribe/index', compact('students', 'terms', 'methods', 'subscribes'));

    }

    public function store(Request $request)
    {


        if ($this->subscribeServices->store($request->all())) {
            Alert::success('Done', 'Added successfully');

            return redirect()->route('subscribe');
        }


        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->subscribeServices->errors();
        return redirect()->back()->withInput($request->all())->withErrors($errors);

    }


    public function edit($id = 0)
    {
        $student=null;
        $subscribe = $this->subscribeServices->edit($id);
        $terms = $this->termsServices->activeTerms();
        $students = $this->subscribeServices->getAllStudent($student);
        $methods = $this->PaymentSettingsServices->methods();

        return view('admin/subscribe/updated', compact('subscribe', 'terms', 'students', 'methods'));

    }

    public function update(Request $request)
    {

        if ($this->subscribeServices->update($request->all())) {
            Alert::success('Done', 'updated successfully');

            return redirect()->route('subscribe');
        }


        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->subscribeServices->errors();
        return redirect()->back()->withInput($request->all())->withErrors($errors);

    }

    public function destroy($id = 0)
    {
        if ($this->subscribeServices->destroy($id)) {
            Alert::success('Done', 'deleted successfully');

            return redirect()->route('subscribe');
        }
        Alert::error('oops .. ! ', 'Have Errors Try Again');
        return redirect()->route('terms');
    }

    public function add_Installment($id = 0)
    {

        $subscribe = $this->subscribeServices->edit($id);
        return view('admin/subscribe/add_installment', compact('subscribe'));

    }


    public function store_Installment(Request $request)
    {
        if ($this->subscribeServices->updateAndAddInstallment($request->all())) {
            Alert::success('Done', 'stored successfully');

            return redirect()->route('subscribe');
        }


        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->subscribeServices->errors();
        return redirect()->back()->withInput($request->all())->withErrors($errors);

    }

    public function getCost($id)
    {

        $paymentCost = DB::table("payment_settings")->where("setting_id", $id)->pluck("prices")->first();

        return json_encode($paymentCost);

    }

    public function getInstallmentById($id)
    {
        $subscribe = Subscribe::find($id);


        if (!empty($subscribe)) {

            $subscribe_id = $subscribe->id;
            $subscribes = $subscribe->whereHas('installments', function ($q) use ($subscribe_id) {
                return $q->where('subscribe_id', $subscribe_id);
            })->get();

            $installments = Installment::where('subscribe_id', $subscribe->id)->get();
        }


        if (!empty($installments)) {
//

            return view('admin/subscribe/details_installment', compact('subscribes', 'installments'));

        }
        Alert::error('oops .. ! ', 'no details for this subscribe');
        return redirect()->route('subscribe');

    }


}
