<?php

namespace App\DataTables;

use App\Models\Invoice;
use Yajra\DataTables\Services\DataTable;

class InvoiceDataTable extends DataTable implements BaseDatatableInterface
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('actions', 'appointments.btn.actions')
            ->rawColumns(['actions']);
            // ->editColumn('due_at',function(Invoice $invoice){
            //     return $invoice->due_at->diffForHumans();
            // })
            // ->editColumn('updated_at',function(Invoice $invoice){
            //     return $invoice->updated_at->diffForHumans();
            // });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ServiceDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Invoice::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {

        return $this->builder()
        ->setTableId('servicedatatable-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->parameters($this->getParameters());
    }

     /**
     * Get Parameters.
     *
     * @return array
     */
    public function getParameters()
    {
        return [
            'dom'  => 'Blfrtip',
            'lengthMenu' => [[10,25,50,100],[10,25,50,100,trans('admin.all_records')] ],

            'buttons' =>$this->getButtons(),
            'initComplete' => "function () {
                this.api().columns([1,2,3,4,5]).every(function () {
                    var column = this;
                    var input = document.createElement(\"input\");
                    $(input).appendTo($(column.footer()).empty())
                    .on('keyup', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            }",

            'language' => datatable_lang(),
        ];
    }

    /**
     * Get columns.
     *
     * @return array
     */
    public function getButtons()
    {
        return  [
            ['extend'=>'reload','className'=>'btn btn-primary my-2','text'=>'<i class="fa fa-reload"></i>  '.trans('admin.ex_reload')],
            ['extend'=>'print','className'=>'btn btn-primary my-2','text'=>'<i class="fa fa-print"></i>  '.trans('admin.ex_print')],
            ['extend'=>'excel',
            'className'=>'btn btn-success my-2',
            'text'=>'<i class="fas fa-table"></i> '. trans('admin.ex_excel')
            ],
            ['extend'=>'csv',
            'className'=>'btn btn-info my-2',
            'text'=>'<i class="fa fa-file"></i>  '. trans('admin.ex_csv')
            ],
        ];
    }

    /**
     * Get columns.
     *
     * @return array
     */
    public function getColumns()
    {
        return [
            [
                'data' => 'id',
                'name' => 'id',
                'title' => trans('admin.id')
            ],
            [
                'data' => 'due_at',
                'name' => 'due_at',
                'title' => trans('admin.invocie.time')
            ],
            [
                'data' => 'due_at',
                'name' => 'due_at',
                'title' => trans('admin.invocie')
            ],
            [
                'data' => 'actions',
                'name' => 'Options',
                'title' => trans('admin.options')
            ],


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Service_' . date('YmdHis');
    }
}
