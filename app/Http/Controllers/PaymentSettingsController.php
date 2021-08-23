<?php

namespace App\Http\Controllers;

use App\ZH\Services\PaymentSettingsServices;
use Illuminate\Http\Request;
use Alert;

class PaymentSettingsController extends Controller
{
    private $methodsServices;

    public function __construct()
    {
        $this->methodsServices = new PaymentSettingsServices();
    }

    public function index()
    {
        $methods = $this->methodsServices->methods();
        return view('admin.paymentmethods.index', compact('methods'));
    }

    public function add(Request $request)
    {
        if ($this->methodsServices->add($request->all())) {
            Alert::success('Done', 'Added successfully');

            return redirect('dashboard/methods');
        }

        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->methodsServices->errors();
        return redirect()->back()->withInput($request->all())->withErrors($errors);


    }

    public function edit($id = 0)
    {
        $method = $this->methodsServices->edit($id);


        return view('admin/paymentmethods/update', compact('method'));
    }

    public function update(Request $request)
    {
        if ($this->methodsServices->update($request->all())) {

            Alert::success('Done', 'updated successfully');

            return redirect('dashboard/methods');
        }

        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->methodsServices->errors();
        return redirect()->back()->withInput($request->all())->withErrors($errors);
    }

    public function destroy($id = 0)
    {
        if ($this->methodsServices->destroy($id)) {
            Alert::success('Done', 'deleted successfully');
            return redirect()->route('methods');
        }
        Alert::error('oops .. ! ', 'Have Errors Try Again');
        return redirect()->route('methods');
    }

}
