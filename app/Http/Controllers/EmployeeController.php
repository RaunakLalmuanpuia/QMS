<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $files = File::where('user_id', auth()->user()->id)->get();
    
        return view('employee.home', compact('files'));
    }
}
