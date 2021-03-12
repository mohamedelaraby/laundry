<?php

namespace App\DataTables;

use App\Models\Appointment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AppointmentsDatatable extends DataTable
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
        ->rawColumns(['actions'])
        
        ->editColumn('due_at',function(Appointment $appointment){
            return $appointment->due_at;
        })
        ->editColumn('status',function(Appointment $appointment){
            return $appointment->getStatus();
        })->editColumn('created_at',function(Appointment $appointment){
            return $appointment->created_at->diffForHumans();
        })
        ->editColumn('updated_at',function(Appointment $appointment){
            return $appointment->updated_at->diffForHumans();
        })
        ->addColumn('car',function(Appointment $appointment){
            return $appointment->car->type;
        })
        ->addColumn('service',function(Appointment $appointment){
            return $this->isService($appointment);
        })->addColumn('user',function(Appointment $appointment){
            return $this->isUser($appointment);
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AppointmentsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AppointmentsDatatable $model)
    {
        return Appointment::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('appointmentsdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->getParameters());
                    
    }

    /**
     * Get Parameters.
     *
     * @return array
     */
    protected function getParameters()
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
    protected function getButtons()
    {
        return  [
            ['extend'=>'reload','className'=>'btn btn-primary my-2','text'=>'<i class="fa fa-print"></i>  '.trans('admin.ex_reload')],
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
    protected function getColumns()
    {
        return [
            [
                'data' => 'id',
                'name' => 'id',
                'title' => trans('admin.user_id')
            ],
            [
                'data' => 'due_at',
                'name' => 'due_at',
                'title' => trans('admin.due_at')
            ],
            [
                'data' => 'status',
                'name' => 'status',
                'title' => trans('admin.status')
            ],
            [
                'data' => 'service',
                'name' => 'service',
                'title' => trans('admin.service')
            ],
            [
                'data' => 'car',
                'name' => 'car',
                'title' => trans('admin.car')
            ],
            [
                'data' => 'user',
                'name' => 'user',
                'title' => trans('admin.user')
            ],
          
            Column::computed('actions')
            ->title(trans('admin.options'))
            ->exportable(false)
            ->printable(false)
            ->orderable(false)
            ->width(20)
            ->addClass('text-center'),


        ];
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Appointments_' . date('YmdHis');
    }


    /**
     *  Find the right services
     * 
     * @return bool
     */
    private function isService($appointment){
      return  $appointment->service ? $appointment->service->name : 'Add service';
    }
    
    /**
     *  Find the right User
     * 
     * @return bool
     */
    private function isUser($appointment){
      return  $appointment->user ? $appointment->user->name : 'Add user';
    }


    
}
