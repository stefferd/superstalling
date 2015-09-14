<?php

/*
|--------------------------------------------------------------------------
| Application helpers
|--------------------------------------------------------------------------
|
*/

if ( ! function_exists('user_photo_path'))
{
    /**
     * Get the path to the public images folder.
     *
     * @param  string  $path
     * @return string
     */
    function user_photo_path($path = '')
    {
        return base_path() .'/custom/owner_images/';
    }
}
