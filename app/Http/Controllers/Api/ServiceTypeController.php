<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ServicesTypesRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    use ResponseTrait;

     /** @param $usersRepository */
     private $servicesTypesRepository;

     public function __construct(ServicesTypesRepository $servicesTypesRepository)
     {
         $this->servicesTypesRepository = $servicesTypesRepository;
     }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicesTypes = $this->servicesTypesRepository->all();

        return $this->returnData('servicesTypes',$servicesTypes,trans('auth.success-data'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $serviceType = $this->isServiceType($id);
        return $this->returnData('serviceType',$serviceType,trans('auth.found'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
    private function isServiceType($id)
    {
        $servicesTypes =  $this->servicesTypesRepository->findById($id);
        if(!$servicesTypes){
            return $this->returnError('E001',trans('auth.notFound'));
        } else {
            return $servicesTypes;
        }
    }
}
