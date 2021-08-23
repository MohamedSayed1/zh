<?php


namespace App\Http\Controllers;


use App\ZH\Services\DailyServices;

class CheckDateDaily extends Controller
{

    private $dailySer;

    public function __construct()
    {
       $this->dailySer = new DailyServices();
    }

    public function index()
    {

    }
}