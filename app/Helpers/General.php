<?php

/*
|--------------------------------------------------------------------------
| Auth users
|--------------------------------------------------------------------------
*/

/**
 *  Get current user
 */
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




?>
