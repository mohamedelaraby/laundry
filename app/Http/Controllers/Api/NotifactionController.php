<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\NotificationsRepository;
use App\Traits\ResponseTrait;

class NotifactionController extends Controller
{
    use ResponseTrait;

     /** @param $usersRepository */
     private $notificationsRepository;

     public function __construct(NotificationsRepository $notificationsRepository)
     {
         $this->notificationsRepository = $notificationsRepository;
     }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = $this->notificationsRepository->all();

        return $this->returnData('notifications',$notifications,trans('auth.success-data'));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $notification = $this->isNotification($id);
        return $this->returnData('$notification',$notification,trans('auth.found'));
    }

    /**-----------------------------------------------------
     * Facilitators
     * ---------------------------------------------------
     */
    
    /**
     * Check foruser Exists
     *
     * @return 
     */
    private function isNotification($id)
    {
        $notification =  $this->notificationsRepository->findById($id);
        if(!$notification){
            return $this->returnError('E001',trans('auth.notFound'));
        } else {
            return $notification;
        }
    }
}
