<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AppointmentsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentUpdateRequest;
use App\Models\Appointment;
use App\Repositories\AppointmentsRepository;
use App\Repositories\CarsRepository;
use App\Repositories\ServicesRepository;
use App\Repositories\UsersRepository;
use Exception;

class AppointmentController extends Controller
{


    /** @param $serviceRepository */
    private $appointmentsRepository;
    private $servicesRepository;
    private $carsRepository;
    private $usersRepository;

    public function __construct(AppointmentsRepository $appointmentsRepository,
    ServicesRepository $servicesRepository,CarsRepository $carsRepository,UsersRepository $usersRepository)
    {
        $this->appointmentsRepository = $appointmentsRepository;
        $this->servicesRepository = $servicesRepository;
        $this->carsRepository = $carsRepository;
        $this->usersRepository = $usersRepository;
    }

     /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(AppointmentsDataTable $dataTable)
    {

        return $dataTable->render('appointments.index',[
            'title' => trans('admin.appointments'),
            'id' => $dataTable->id,
        ]);
    }



    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $appointment =  $this->appointmentsRepository->findById($id);

            if(!$appointment){
                session()->flash('error',trans('auth.not_found'));
                return view('appointments.index');
            }

            /** @param $status */
            $status =  [
                Appointment::STATUS_PENDING,
                Appointment::STATUS_ACTIVE,
                Appointment::STATUS_CANCELED,
               ];
               
               /** @param $services */
               $services = $this->servicesRepository->all()->pluck('name');
               
               /** @param $users */
               $users = $this->usersRepository->all()->pluck('name');
               
               
               /** @param $selectedCarId */
               $selectedUserId= $appointment->user->id;

               
               
               /** @param $selectedService */
               $selectedService = $this->isService($appointment);
              
               /** @param $serviceId */
                $serviceId = $selectedService->id;

                /** @param $cars */
               $cars = $this->carsRepository->all()->pluck('type');

               /** @param $selectedCarId */
               $selectedCarId= $appointment->car->id;
                
            
            return view('appointments.edit',
            [
                'appointment' => $appointment,
                'id'=>$id,
                'status'=>$status,
                'services'=>$services,
                'cars'=>$cars,
                'users'=>$users,
                'selectedService'=>$selectedService,
                'serviceId'=>$serviceId - 1,
                'selectedCarId'=>$selectedCarId - 1,
                'selectedUserId'=>$selectedUserId - 1],
            ['title'=>trans('admin.edit')]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(AppointmentUpdateRequest $request, $id)
        {

            try{
            $service_id = '';
            $car_id = '';
            $user_id = '';
            $inputs = $request->all();
           
            $appointment =  $this->appointmentsRepository->findById($id);
            
            if(!$appointment){
                session()->flash('error',trans('admin.not_found'));
                return redirect()->route('admins.appointments.edit',$id);
            }

           // Get Service ID
           $service_id = $this->isServiceId($appointment,$inputs); 
           
           // Get Car ID
           $car_id = $this->isCarId($appointment,$inputs); 
           
           // Get User ID
           $user_id = $this->isUserId($appointment,$inputs);

            //check for status value
            $status = $this->isstatus($appointment,$inputs);
            
            //check for due at value
            $due_at = $this->isDueAt($appointment,$inputs);

          
            //Update User
            $appointmentUpdated = $this->appointmentsRepository
                ->update($appointment,$this->appointmentData($due_at,$status,$user_id,$car_id,$service_id));
            
            } catch (Exception $exception){
                session()->flash('error',trans('admin.notfound'));
                return redirect()->route('admins.appointments.index');
            }

            session()->flash('msg',trans('admin.updated'));
            return redirect()->route('admins.appointments.index');
            
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            
            try{
                // check for user
                $appointment =  $this->appointmentsRepository->findById($id);

                if(!$appointment){
                    session()->flash('error',trans('admin.notfound'));
                    return redirect()->route('admins.appointments.index');
                }
    
                //delete appointment
               $deleteappointment = $this->appointmentsRepository->delete($id);


                session()->flash('msg',trans('admin.deleted'));
                return redirect()->route('admins.appointments.index');
    
            } catch (Exception $exception){
                session()->flash('error',trans('admin.notfound'));
                return redirect()->route('admins.appointments.index');
            }
        

        }





/*
|--------------------------------------------------------------------------
| Inquiry methods
|--------------------------------------------------------------------------
*/

/**
 *  Check for service
 */
 private function isService($appointment){
     return $appointment->service ? $appointment->service :  'No service';
 }

/**
 *  Check for service
 */
private function isServiceId($appointment,$inputs){
    return $appointment->service ? $inputs['service_id'] + 1:  $appointment->service->id;
}

/**
*  Check for Car
*/
private function isCarId($appointment,$inputs){
    return $appointment->car ? $inputs['car_id'] + 1:  $appointment->car->id;
}

/**
*  Check for User
*/
private function isUserId($appointment,$inputs){
    return $appointment->user ? $inputs['user_id'] + 1:  $appointment->user->id;
}

/**
*  Check for status
*/
private function isStatus($appointment,$inputs){
    return $appointment->status ? $inputs['status']:  $appointment->getStatus();
}

/**
*  Check for due at
*/
private function isDueAt($appointment,$inputs){
    return $appointment->due_at ? $inputs['due_at']:  $appointment->due_at;
}

/*
|--------------------------------------------------------------------------
| Facilitator methods
|--------------------------------------------------------------------------
*/
/**
 *  Obtain appointment updated data
 */
private function appointmentData($due_at,$status,$user_id,$car_id,$service_id){
    return  [
        'due_at' => $due_at,
        'status' => $status,
        'user_id' => $user_id,
        'car_id' => $car_id,
        'service_id' => $service_id,
   ];
}

}
