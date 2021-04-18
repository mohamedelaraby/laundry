<?php

namespace App\Repositories;

use App\Models\Car;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Support\Facades\DB;

class CarsRepository Implements BaseRepositoryInterface
{
    /**
     * Get all reocrds
     *
     * @param array
     */
    public function all(){
        return DB::table('cars')->get();
    }

  /**
     * Get Record By id
     *
     * @param $id
     */
    public function findById($id){
        return Car::find($id);
    }



    /**
     * Get Record By Name
     *
     * @param $id
     */
    public function findByName($id){

    }

    /**
     * Store new  Record
     */
    public function create(){

    }

    /**
     * Update existing Record
     */
    public function update(){

    }

    /**
     * Delete Record By ID
     *
     * @param $id
     */
    public function delete($id){

    }



}
