<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return "<h1>UserController Index Page</h1>";
    }

    public function show($id) {
        $mock_data = [
            "id" => $id,
            "name" => "Juan Dela Cruz",
            "email" => "jdelacruz@gmail.com"
        ];

        // return "<h1>UserController Show Page $id</h1>";

        // Die and Dump
        // return view('user_profile', ['data' => $mock_data]);

        return view('user_profile', $mock_data);
    }
}

/* 
Controller Functions:
index   - get all data
show    - get single data

create  - display create form
store   - save data in mysql

edit    - display edit form
update  - update data in mysql

destroy - delete data in mysql
*/