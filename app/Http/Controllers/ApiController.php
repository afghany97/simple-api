<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    const HTTP_NOT_FOUND = 404;

    private $status = 200;

    private $isSuccessful = true;

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function setIsSuccessful($isSuccessful)
    {
        $this->isSuccessful = $isSuccessful;

        return $this;
    }

    private function response(array $data,$headers = [])
    {
        return response()->json($data,$this->status,$headers);
    }

    protected function successfulResponse(array $data,$headers = [])
    {
        return $this->response([

            'successful' => $this->isSuccessful,

            'data' => $data

        ],$headers);
    }

    protected function responseWithError($message,$headers = [])
    {
        return $this->response([

            'successful' => $this->isSuccessful,

            'Error' => [
                'message' => $message
            ]

        ],$headers);
    }

}
