<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDatatable extends DataTable
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
            ->addColumn('action', 'userdatatable.action')
            ->addColumn('code',function(User $user){
                if(!$user->code ){
                    return "No Code";
                } else {
                    return $user->code;
                }   
            }) 
            ->addColumn('phone',function(User $user){
                if(!$user->phone ){
                    return "Add Phone number";
                } else {
                    return $user->phone;
                }   
            })
            ->addColumn('user_name',function(User $user){
                if(!$user->user_name ){
                    return "Add User number";
                } else {
                    return $user->user_name;
                }   
            })
            ->editColumn('created_at',function(User $user){
                return $user->created_at->diffForHumans();
            })
            ->editColumn('updated_at',function(User $user){
                return $user->updated_at->diffForHumans();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\UserDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
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
                'data' => 'name', 
                'name' => 'name', 
                'title' => trans('admin.user_name')
            ],
            [
                'data' => 'email', 
                'name' => 'email', 
                'title' => trans('admin.user_email')
            ],
            [
                'data' => 'code', 
                'name' => 'code', 
                'title' => trans('admin.user_code')
            ],
            [
                'data' => 'created_at', 
                'name' => 'created_at', 
                'title' => trans('admin.created_at')
            ],
            [
                'data' => 'updated_at', 
                'name' => 'updated_at', 
                'title' => trans('admin.updated_at')
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
        return 'User_' . date('YmdHis');
    }
}
