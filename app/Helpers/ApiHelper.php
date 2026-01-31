<?php

// Reusable API response function
function apiResponseWithStatusCode($data, $status, $message, $user, $statusCode)
{
    $response = [];
    $response['status'] = $status;
    $response['message'] = $message;
    if ($user) {
        $response['user'] = $user;
    }
    $response['data'] = $data;

    return  response()->json($response, $statusCode);
    
}
 
// for service response
function apiServiceResponse($data, $status, $message)
{
    return (object)[
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
}