<?php

use Illuminate\Support\Str;
//    use Image;
use Faker\Provider\Image;

/**
 * Success response method
 *
 * @param $result
 * @param $message
 * @return \Illuminate\Http\JsonResponse
 */
function sendResponse($result, $message)
{
    $response = [
        'success' => true,
        'data'    => $result,
        'message' => $message,
    ];

    return response()->json($response, 200);
}

/**
 * Return error response
 *
 * @param       $error
 * @param array $errorMessages
 * @param int   $code
 * @return \Illuminate\Http\JsonResponse
 */
function sendError($error, $errorMessages = [], $code = 404)
{
    $response = [
        'success' => false,
        'message' => $error,
    ];

    !empty($errorMessages) ? $response['data'] = $errorMessages : null;

    return response()->json($response, $code);
}

/**
 * upload any types of file instant
 * @return stringResponse
 */
function move_file($file, $path, $name = null, $delete = null)
{
    if ($file) {
        $path = 'storage/'.$path;
        if ($delete) {
            if (file_exists($delete)) {
                unlink($delete);
            }
        }
        $name = $name? Str::slug($name):'';
        $name = $name.'-'.time().'.'. $file->getClientOriginalExtension();
        (is_dir($path))?'':mkdir(asset($path));
       $file->move($path, $name);
        return $path. '/' .$name;
    }
}

/**
 * check file existince
 * @return boolean
 */
function haveFile($file)
{
    if ($file) {
        return (file_exists($file))?  true:  false;
    }
    return false;
}
