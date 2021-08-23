<?php


namespace App\Http\Controllers;


use App\Http\Traits\SetupStatic;
use App\User;
use App\ZH\Model\userGroup;
use App\ZH\Services\StationsServices;
use App\ZH\Services\UserServices;
use Illuminate\Http\Request;
Use Alert;

class UsersController extends Controller
{

    use SetupStatic;
    private $user;
    private $station;

    public function __construct()
    {
        $this->user = new UserServices();
        $this->station = new StationsServices();
    }

    public function index()
    {
        // to add

        $faclitys =
        // to search ( group And Stations )
        $groups = userGroup::all();
        $stations= $this->station->get();
        // users
        $users = $this->user->getUsers();
        return view('admin.users.index')
            ->with('groups',$groups)
            ->with('stations',$stations)
            ->with('users',$users);
    }

    //Search
    public function search(Request $request)
    {

        // to search ( group And Stations )
        $groups = userGroup::all();
        $stations= $this->station->get();
        // users
        $users = $this->user->search($request->all());

        return view('admin.users.index')
            ->with('groups',$groups)
            ->with('stations',$stations)
            ->with('users',$users);
    }

    // add Views
    public function add()
    {
        $faclitys = $this->faculties();
        $levels = $this->returnLevel();
        $groups = userGroup::all();
        $stations= $this->station->get();
        return view('admin.users.add')
            ->with('groups',$groups)
            ->with('faclitys',$faclitys)
            ->with('levels',$levels)
            ->with('stations',$stations);
    }

    // add New Users
    public function addProcess(Request $request)
    {
        if($this->user->add($request->all()))
        {
            Alert::success('Done', 'Successfully added');
            return redirect('dashboard/users');
        }

        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->user->errors();
        return redirect()->back()->withInput($request->all())
            ->withErrors($errors);
    }

    public function updatedView($id = 0)
    {

        if($user = $this->user->getUser($id))
        {
            $faclitys = $this->faculties();
            $levels = $this->returnLevel();
            $groups = userGroup::all();
            $stations= $this->station->get();
            return view('admin.users.updated')
                ->with('user',$user)
                ->with('groups',$groups)
                ->with('faclitys',$faclitys)
                ->with('levels',$levels)
                ->with('stations',$stations);
        }


        Alert::error('oops .. ! ', 'Not Found ');
        return redirect()->back();
    }

    public function updated(Request $request)
    {
        if($this->user->updated($request->all()))
        {
            Alert::success('Done', 'Successfully updated');
            return redirect('dashboard/users');
        }

        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->user->errors();
        return redirect()->back()->withInput($request->all())
            ->withErrors($errors);
    }

    public function passView($id = 0)
    {
        if($user = $this->user->getUser($id))
        {
            return view('admin.users.pass')
                ->with('user',$user);
        }
        Alert::error('oops .. ! ', 'Not Found ');
        return redirect()->back();
    }

    public function pass(Request $request)
    {
        if($this->user->updatedPasswordAdmin($request->all()))
        {
            Alert::success('Done', 'Successfully updated');
            return redirect('dashboard/users');
        }

        Alert::error('oops .. ! ', 'Have Errors');
        $errors = $this->user->errors();
        return redirect()->back()->withInput($request->all())
            ->withErrors($errors);
    }

}