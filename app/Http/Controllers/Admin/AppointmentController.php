<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AppointmentsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Repositories\AppointmentsRepository;

class AppointmentController extends Controller
{


    /** @param $serviceRepository */
    private $appointmentsRepository;

    public function __construct(AppointmentsRepository $appointmentsRepository)
    {
        $this->appointmentsRepository = $appointmentsRepository;
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
     *  show create form
     */
    public function create(Appointment $appointment){

        // Get all appointments
        $appointments = $this->appointmentsRepository->all();

        return view('appointments.create',compact('$appointment','appointments'));

    }







}
