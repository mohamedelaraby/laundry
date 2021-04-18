<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CarsRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class CarController extends Controller
{
    use ResponseTrait;

     /** @param $usersRepository */
     private $carsRepository;

     public function __construct(CarsRepository $carsRepository)
     {
         $this->carsRepository = $carsRepository;
     }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = $this->carsRepository->all();

        return $this->returnData('cars',$cars,trans('auth.success-data'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $appointment = $this->isCar($id);
        return $this->returnData('appointment',$appointment,trans('auth.found'));
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
    private function isCar($id)
    {
        $car =  $this->carsRepository->findById($id);
        if(!$car){
            return $this->returnError('E001',trans('auth.notFound'));
        } else {
            return $car;
        }
    }
}
