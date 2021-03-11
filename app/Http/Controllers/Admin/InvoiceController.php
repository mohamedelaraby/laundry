<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\InvoiceDataTable;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Repositories\InvoicesRepository;

class InvoiceController extends Controller
{


    /** @param $serviceRepository */
    private $invoicesRepository;

public function __construct(InvoicesRepository $invoicesRepository)
{
    $this->invoicesRepository = $invoicesRepository;
}

     /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(InvoiceDataTable $dataTable)
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
        $invoices = $this->invoicesRepository->all();

        return view('invoices.create',compact('$invoice','invoices'));

    }







}
