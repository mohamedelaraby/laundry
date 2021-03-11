<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NotificationDataTable;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Repositories\InvoicesRepository;
use App\Repositories\NotificationsRepository;

class NotificationController extends Controller
{


    /** @param $notificationRepository */
    private $notificationsRepository;

    public function __construct(NotificationsRepository $notificationsRepository)
    {
        $this->notificationsRepository = $notificationsRepository;
    }

     /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(NotificationDataTable $dataTable)
    {

        return $dataTable->render('invoices.index',[
            'title' => trans('admin.invoices'),
            'id' => $dataTable->id,
        ]);
    }



    /**
     *  show create form
     */
    public function create(Invoice $invoice){

        // Get all invoices
        $invoices = $this->notificationsRepository->all();

        return view('invoices.create',compact('$invoice','invoices'));

    }







}
