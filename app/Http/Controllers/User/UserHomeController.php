<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        echo "<h1>HOME PRINCIPAL USER</h1>";
    }
}
