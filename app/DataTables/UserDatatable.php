<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
        ->addColumn('edit', 'users.btn.edit')
        ->addColumn('delete', 'users.btn.delete')
        ->addColumn('checkbox', 'users.btn.checkbox')
        ->rawColumns([
            'edit',
            'delete',
            'checkbox',
        ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return User::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->setTableId('userdatatable-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        // ->addAction(['width' => '80px'])
        ->parameters([
        'dom'  => 'Blfrtip',
        // 'buttons'      => ['export', 'print', 'reset', 'reload','create admin'],
        'lengthMenu' => [[10,25,50,100],[10,25,50,trans('admin.all_records')] ],
        
        'buttons' => [
            [
                'text' => '<i class="fa fa-plus"></i>  ' . trans('admin.create_admin'),
                'className'=>'btn btn-info my-2',   
                'action' => "function(){
                    window.location.href = '".URL::current()."/create';
                }"
            ],
            
            ['extend'=>'print','className'=>'btn btn-primary my-2','text'=>'<i class="fa fa-print"></i>  '.trans('admin.ex_print')],
            ['extend'=>'csv',
            'className'=>'btn btn-info my-2',
            'text'=>'<i class="fa fa-file"></i>  '. trans('admin.ex_csv')],
            ['extend'=>'excel',
            'className'=>'btn btn-success my-2',
            'text'=>'<i class="fas fa-table"></i> '. trans('admin.ex_excel')], 
            ['extend'=>'reload',
            'className'=>'btn btn-secondary my-2',
            'text'=>'<i class="fas fa-sync-alt"></i>'],

        ],
            'initComplete' => "function () {
                this.api().columns([,2,3,4]).every(function () {
                    var column = this;
                    var input = document.createElement(\"input\");
                    $(input).appendTo($(column.footer()).empty())
                    .on('keyup', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            }",
            'language' => datatable_lang(),

]);
        
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
          
            Column::make('id','id')->title(trans('admin.admin_id')),
            Column::make('name','name')->title(trans('admin.admin_name')),
            Column::make('email','email')->title(trans('admin.admin_email')),
            Column::make('created_at','created_at')->title(trans('admin.created_at')),
            Column::make('updated_at','updated_at')->title(trans('admin.updated_at')),
         
            Column::computed('edit')
                  ->title(trans('admin.edit'))
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
        return 'User_' . date('YmdHis');
    }
}
