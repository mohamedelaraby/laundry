<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ServicesRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

     /** @param $usersRepository */
     private $servicesRepository;

     public function __construct(ServicesRepository $servicesRepository)
     {
         $this->servicesRepository = $servicesRepository;
     }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $services = $this->servicesRepository->all();

        return response()->json($services);
    }
}
