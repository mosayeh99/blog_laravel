<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpadteUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findorFail($id);
        return view('user',compact('user'));
    }

    public function update(UpadteUserRequest $request, $id)
    {
        User::findorFail($id)->update($request->all());
    }
}
