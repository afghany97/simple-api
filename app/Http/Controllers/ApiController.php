<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    private $status = 200;

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    protected function response(array $data,$headers = [])
    {
        return response()->json($data,$this->status,$headers);
    }

}
