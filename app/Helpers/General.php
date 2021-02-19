<?php

/*
|--------------------------------------------------------------------------
| Auth users
|--------------------------------------------------------------------------
*/

/**
 *  Get current user
 */

use Illuminate\Support\Facades\Auth;

if (!function_exists('currentUser')) {
    function currentUser()
    {
        return Auth::user();
    }
}


/**
 *  Handle admin url prefix
 *  @var string |null $url
 *  @return URL
 */
if (!function_exists('admin_url')) {
    function admin_url($url = null)
    {
        return url('admin/'  . $url);
    }
}



/**
 *  Get App locale langز
 *  @return session
 */
if (!function_exists('lang')) {
    function lang()
    {
        if(session()->has('lang')){
            return session('lang');
        } else {
            return 'ar';
        }

    }
}








//[[[[[[[[ Validate Helper Functions]]]]]]]]

/**
 *  Validate incoming Images Requests
 *  @param mixed|null $extension
 *  @return Response
 */
if(!function_exists('validate_image')){
    function validate_image($extension=null){
        // If  no extension Then match image extension
        if($extension === null){
            return  'image|required|mimes:jpeg,png,jpg,gif,svg,bmp|max:2048';
        } else {
            // Use Image extension
            return 'image|required|mimes:'.$extension;
        }
    }
}


//[[[[[[[[ Validate Helper Functions]]]]]]]]


/**
 *  Handle admin Datatable data
 *
 *  @return array | mix
 */
if (!function_exists('datatable_lang')) {
    function datatable_lang()
    {
        return[
        "sProcessing" => trans('admin.sProcessing'),
        "sLengthMenu" => trans('admin.sLengthMenu'),
        "sZeroRecords" => trans('admin.sZeroRecords'),
        "sEmptyTable" => trans('admin.sEmptyTable'),
                "sInfo" => trans('admin.sInfo'),
            "sInfoEmpty" => trans('admin.sInfoEmpty'),
        "sInfoFiltered" => trans('admin.sInfoFiltered'),
        "sInfoPostFix" => trans('admin.sInfoPostFix'),
            "sSearch" => trans('admin.sSearch'),
                "sUrl" => trans('admin.sUrl'),
        "sInfoThousands" => trans('admin.sInfoThousands'),
    "sLoadingRecords" => trans('admin.sLoadingRecords'),
            "oPaginate" => [
                "sFirst" => trans('admin.sFirst'),
                "sLast" => trans('admin.sLast'),
                "sNext" => trans('admin.sNext'),
            "sPrevious" => trans('admin.sPrevious')
            ],
            "oAria" =>[
            "sSortAscending" => trans('admin.sSortAscending'),
            "sSortDescending" => trans('admin.sSortDescending')
            ]
            ];
    }
}
?>
