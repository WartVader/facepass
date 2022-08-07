<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }
}
