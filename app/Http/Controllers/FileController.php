<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;


class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx',
            'name' => 'required',
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

        $file->storeAs('uploads', $fileName);

        $uploadedFile = new File();
        $uploadedFile->user_id = auth()->user()->id;
        $uploadedFile->name = $request->input('name');
        $uploadedFile->file_path = $fileName;
        $uploadedFile->status = 'pending';
        $uploadedFile->save();

        return redirect()->route('file.index')->with('success', 'File uploaded successfully.');
    }

    public function index()
    {
        $files = File::where('user_id', auth()->user()->id)->get();

        return view('files.index', compact('files'));
    }
}
