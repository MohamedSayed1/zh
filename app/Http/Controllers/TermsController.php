<?php

namespace App\Http\Controllers;

use App\ZH\Services\TermsServices;
use Illuminate\Http\Request;
use Alert;

class TermsController extends Controller
{
    private $termsServices;

    public function __construct()
    {
        $this->termsServices = new TermsServices();
    }

    public function index()
    {
        $terms = $this->termsServices->terms();
        return view('admin.terms.index', compact('terms'));
    }

    public function add(Request $request)
    {
        if ($this->termsServices->add($request->all())) {
            Alert::success('Done', 'Added successfully');

            return redirect('dashboard/terms');
        }

        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->termsServices->errors();
        return redirect()->back()->withInput($request->all())->withErrors($errors);


    }

    public function edit($id = 0)
    {
        $term = $this->termsServices->edit($id);

        return view('admin/terms/updated', compact('term'));
    }

    public function update(Request $request)
    {
        if ($this->termsServices->update($request->all())) {

            Alert::success('Done', 'updated successfully');

            return redirect('dashboard/terms');
        }

        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->termsServices->errors();
        return redirect()->back()->withInput($request->all())->withErrors($errors);
    }

    public function destroy($id = 0)
    {
        if ($this->termsServices->destroy($id)) {
            Alert::success('Done', 'deleted successfully');
            return redirect()->route('terms');
        }
        Alert::error('oops .. ! ', 'Have Errors Try Again');
        return redirect()->route('terms');
    }

    public function toActive($id = 0)
    {
        if($this->termsServices->toActive($id)){
            Alert::success('Done', 'updated To Active successfully');

            return redirect('dashboard/terms');
        }

        Alert::error('oops .. ! ', 'Have Errors');
        return redirect()->back();
    }

}
