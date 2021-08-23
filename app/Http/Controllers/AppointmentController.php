<?php


namespace App\Http\Controllers;


use App\ZH\Services\AppointmentServices;
use Illuminate\Http\Request;
Use Alert;

class AppointmentController extends Controller
{

    /**
     * @var AppointmentServices
     */
    private $appoint ;
    public function __construct()
    {
        $this->appoint = new AppointmentServices();
    }

    public function index()
    {
        $appointments = $this->appoint->get();

        return view('admin.appointment.index')
            ->with('appointments',$appointments);
    }

    public function add(Request $request)
    {

        if($this->appoint->add($request->all()))
        {
            Alert::success('Done', 'Successfully added');
            return redirect('dashboard/appointment');
        }


        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->appoint->errors();
        return redirect()->back()->withInput($request->all())
            ->withErrors($errors);
    }

    public function updatedView($id = 0 )
    {
        if($app = $this->appoint->getByid($id))
        {
            return view('admin.appointment.updated')
                ->with('app',$app);
        }
        Alert::error('oops .. ! ', 'Have Errors');
        return redirect()->back();
    }

    public function updatedProcess(Request $request)
    {
        if($this->appoint->updated($request->all()))
        {
            Alert::success('Done', 'Successfully updated');
            return redirect('dashboard/appointment');
        }


        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->appoint->errors();
        return redirect()->back()->withInput($request->all())
            ->withErrors($errors);
    }


    // reports Search

    public function Search()
    {
        return view('admin.appointment.reports')
            ->with('appointments',[]);
    }

    public function SearchProcess(Request $request)
    {

    }

}