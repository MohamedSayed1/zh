<?php


namespace App\Http\Controllers;


use App\ZH\Services\DailyServices;
use Illuminate\Http\Request;
Use Alert;

class CheckDateDaily extends Controller
{

    private $dailySer;

    public function __construct()
    {
       $this->dailySer = new DailyServices();
    }

    public function index()
    {
        $checkDates = $this->dailySer->get();


        return view('admin/checkindate/index')
            ->with('checkDates',$checkDates);

    }


    public function store(Request $request)
    {
        if($this->dailySer->add($request->all()))
        {
            Alert::success('Done', 'Successfully added');
            return redirect('dashboard/check_in_daily');
        }


        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->dailySer->errors();
        return redirect()->back()->withInput($request->all())
            ->withErrors($errors);

    }


}
