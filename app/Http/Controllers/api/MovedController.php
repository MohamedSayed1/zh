<?php


namespace App\Http\Controllers\api;


use App\Http\Traits\ApiResponse;
use App\ZH\Services\MovedServices;
use Illuminate\Http\Request;

class MovedController extends Controller
{

    use ApiResponse;
    private $moved;

    public function __construct()
    {
        $this->moved = new MovedServices();
    }

    // getBy Appointment id

   public function index($app_id = 0)
   {
       $data = $this->moved->getItem($app_id,auth()->user()->group_id);

       return $this->apiResponse(200,'Appointment Item',null,$data);
   }

   public function add(Request $request)
   {
       if($this->moved->add($request->all()))
           return $this->apiResponse(200,'added successful',null,[]);


       $errors = $this->moved->errors();
       return $this->apiResponse(201,'Have Errors',$errors,null);
   }

   public function updatedType($id=0)
   {
       if($this->moved->updatedType($id))
           return $this->apiResponse(200,'updated successful',null,[]);


       $errors = $this->moved->errors();
       return $this->apiResponse(201,'Have Errors',$errors,null);
   }

   public function updated(Request $request)
   {
       if($this->moved->updated($request->all()))
           return $this->apiResponse(200,'updated successful',null,[]);


       $errors = $this->moved->errors();
       return $this->apiResponse(201,'Have Errors',$errors,null);
   }
}