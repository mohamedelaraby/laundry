<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceDatatable;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Repositories\ServicesRepository;

class ServiceController extends Controller
{


    /** @param $serviceRepository */
    private $servicesRepository;

public function __construct(ServicesRepository $servicesRepository)
{
    $this->servicesRepository = $servicesRepository;
}

     /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ServiceDataTable $dataTable)
    {

        return $dataTable->render('services.index',[
            'title' => trans('admin.services'),
            'id' => $dataTable->id,
        ]);
    }


    /**
     *  show create form
     */
    public function create(Service $service){

        // Get all services
        $services = $this->servicesRepository->all();

        return view('services.create',compact('service','services'));

    }


    




}
