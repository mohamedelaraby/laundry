<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ReportAppointmentsDatatable;
use App\DataTables\ReportInvoicesDatatable;
use App\DataTables\ReportUsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
   /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function users(ReportUsersDataTable $dataTable)
    {

        return $dataTable->render('reports.users.users',[
            'title' => trans('admin.users'),
            'id' => $dataTable->id,
        ]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function invoices(ReportInvoicesDatatable $dataTable)
    {

        return $dataTable->render('reports.invoices.invoices',[
            'title' => trans('admin.invoices'),
            'id' => $dataTable->id,
        ]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function appointments(ReportAppointmentsDatatable $dataTable)
    {

        return $dataTable->render('reports.appointments.appointments',[
            'title' => trans('admin.appointments'),
            'id' => $dataTable->id,
        ]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function services(ReportUsersDataTable $dataTable)
    {

        return $dataTable->render('reports.services.services',[
            'title' => trans('admin.services'),
            'id' => $dataTable->id,
        ]);
    }

}
