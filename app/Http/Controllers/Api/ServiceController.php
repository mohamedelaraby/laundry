<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ServicesRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    use ResponseTrait;

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

        return $this->returnData('services',$services,trans('auth.success-data'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $service = $this->isService($id);
        return $this->returnData('service',$service,trans('auth.found'));
    }

    /**-----------------------------------------------------
     * Facilitators
     * ------------------------------------------------
     */
    
    /**
     * Check foruser Exists
     *
     * @return 
     */
    private function isService($id)
    {
        $services =  $this->servicesRepository->findById($id);
        if(!$services){
            return $this->returnError('E001',trans('auth.notFound'));
        } else {
            return $services;
        }
    }
}
