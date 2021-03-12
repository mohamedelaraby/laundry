<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

interface BaseDatatableInterface
{
   
    /**
     * Get Parameters.
     *
     * @return array
     */
    public function getParameters();

    /**
     * Get columns.
     *
     * @return array
     */
    public function getButtons();

    /**
     * Get columns.
     *
     * @return array
     */
    public function getColumns();

}
