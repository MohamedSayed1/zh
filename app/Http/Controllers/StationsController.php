<?php


namespace App\Http\Controllers;


use App\ZH\Services\StationsServices;
use Illuminate\Http\Request;
Use Alert;

class StationsController extends Controller
{

    private $station;

    public function __construct()
    {
        $this->station = new StationsServices();
    }

    // index ( add & get Data )

    public function index()
    {
        $stations = $this->station->get();
        return view('admin.stations.index')
            ->with('stations',$stations);
    }

    public function add(Request $request)
    {
        if($this->station->add($request->all()))
        {
            Alert::success('Done', 'Successfully added');
            return redirect('dashboard/stations');
        }
        // have Errors
        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->station->errors();
        return redirect()->back()->withInput($request->all())
            ->withErrors($errors);
    }

    // updated View -> id ( get With Check and return view )

    public function updatedView($id = 0)
    {
        if($station = $this->station->updatedView($id))
        {
            return view('admin.stations.updated')
                ->with('station',$station);
        }

        Alert::error('oops .. ! ', ' Not Found ');
        return redirect()->back();
    }

    // updated Process

    public function updatedProcess(Request $request)
    {
        if($this->station->updated($request->all()))
        {
            Alert::success('Done', 'Successfully updated');
            return redirect('dashboard/stations');
        }

        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->station->errors();
        return redirect()->back()->withInput($request->all())
            ->withErrors($errors);
    }

}