<?php 
namespace App\Http\Controllers\api;

trait ApirequestTrait
{
  public function apiResponse($data = null, $message = 'success', $status = 200)
  {
      $array = [
        'data' => $data,
        'message' => $message,
        'status' => $status,
      ];
      return response($array, $status);
  }
  public function apiNotfoundResponse($data = null, $message = null, $status = null)
  {
      $array = [
        'data' => $data,
        'message' => 'not found',
        'status' => 404,
      ];
      return response($array, 404);
  }
}