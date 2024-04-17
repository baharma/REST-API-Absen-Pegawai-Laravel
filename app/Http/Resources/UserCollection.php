<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $token, $user;

    public function __construct($resource)
    {
        $this->token = $resource['token'];
        $this->user = $resource['user'];
    }
    public function toArray($request)
    {
        return [
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => [
                'name'=>$this->user->name,
                'email'=>$this->user->email
            ],
            'authorisation' => [
                'token' => $this->token,
                'type' => 'bearer',
            ]
        ];
    }
}
