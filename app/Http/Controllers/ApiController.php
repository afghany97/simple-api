<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    const HTTP_NOT_FOUND = 404;

    const HTTP_CREATED = 201;

    const HTTP_PRECONDITION_FAILED = 412;

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

    private function response(array $data, $headers = [])
    {
        return response()->json($data, $this->status, $headers);
    }

    protected function successfulResponse(array $data, $headers = [])
    {
        return $this->response([

            'successful' => $this->isSuccessful,

            'data' => $data,

            'status_code' => $this->status

        ], $headers);
    }

    protected function responseWithError($message, $headers = [])
    {
        return $this->response([

            'successful' => !$this->isSuccessful,

            'Error' => [
                'message' => $message,

                'status_code' => $this->status
            ]

        ], $headers);
    }

    protected function createdSuccessfully($message = 'created successfully.')
    {
        return $this->setStatus(static::HTTP_CREATED)->created($message);
    }

    private function created($message)
    {
        return $this->response([

            'message' => $message,

            'successful' => $this->isSuccessful

        ]);
    }

    protected function invalidPassedParams($message = 'invalid passed params')
    {
        return $this->setStatus(static::HTTP_PRECONDITION_FAILED)->responseWithError($message);
    }

}
