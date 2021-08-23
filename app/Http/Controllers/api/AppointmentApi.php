<?php


namespace App\Http\Controllers\api;


use App\Http\Traits\ApiResponse;
use App\ZH\Services\AppointmentServices;

class AppointmentApi extends Controller
{

    use ApiResponse;
    private $appoint;

    public function __construct()
    {
        $this->appoint = new AppointmentServices();
    }

    public function index()
    {
        // get user group
       $data = $this->appoint->getByDate(date('Y-m-d'),auth()->user()->group_id);

       return $this->apiResponse(200,'Appointment Day',null,$data);
    }
}