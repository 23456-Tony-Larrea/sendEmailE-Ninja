<?php

namespace App\Http\Controllers;

use App\Models\PublicacionUser;
use Illuminate\Http\Request;
use App\Http\Requests\PublicacionesRequest;

class PublicacionUserController extends Controller
{
    public function store(PublicacionUser $publicacionRequest)
    {
        $postUser=new PublicacionUser;
        $postUser->create($publicacionRequest->all());
    
    }


}
