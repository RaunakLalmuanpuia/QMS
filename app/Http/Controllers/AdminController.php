<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class AdminController extends Controller
{
    public function index()
    {
        $files = File::where('status', 'pending')->get();

        return view('admin.home', compact('files'));
    }

    public function verify(Request $request, File $file)
    {
        $request->validate([
            'status' => 'required|in:verified,unverified',
            'feedback' => 'required_if:status,unverified',
        ]);

        $file->status = $request->input('status');
        $file->feedback = $request->input('feedback');
        $file->save();

        return redirect()->back()->with('success', 'File verified successfully.');
    }
}
