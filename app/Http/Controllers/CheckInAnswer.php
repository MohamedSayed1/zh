<?php


namespace App\Http\Controllers;


use App\ZH\Services\DailyServices;
use Illuminate\Http\Request;
Use Alert;

class CheckInAnswer extends Controller
{

    private $dailySer;

    public function __construct()
    {
        $this->dailySer = new DailyServices();
    }

    public function index()
    {
        $checkAnswers = $this->dailySer->getAnswers();

        return view('admin/checkindate/checkindateanswer/index')
            ->with('checkAnswers',$checkAnswers);

    }


    public function store(Request $request)
    {
        if($this->dailySer->addAnswer($request->all()))
        {
            Alert::success('Done', 'Successfully added');
            return redirect('dashboard/check_in_answer');
        }


        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->dailySer->errors();
        return redirect()->back()->withInput($request->all())
            ->withErrors($errors);

    }


}
