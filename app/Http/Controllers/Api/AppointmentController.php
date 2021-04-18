<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\AppointmentsRepository;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    use ResponseTrait;

     /** @param $usersRepository */
     private $appointmentsRepository;

     public function __construct(AppointmentsRepository $appointmentsRepository)
     {
         $this->appointmentsRepository = $appointmentsRepository;
     }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = $this->appointmentsRepository->all();

        return $this->returnData('appointments',$appointments,trans('auth.success-data'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $appointment = $this->isAppointment($id);
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
    private function isAppointment($id)
    {
        $appointment =  $this->appointmentsRepository->findById($id);
        if(!$appointment){
            return $this->returnError('E001',trans('auth.notFound'));
        } else {
            return $appointment;
        }
    }
}
