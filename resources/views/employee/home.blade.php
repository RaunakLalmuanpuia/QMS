<!DOCTYPE html>
<html>
<head>
    <title>Employee Home</title>
</head>
<body>
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <h2>Upload a File</h2>
    <form method="POST" action="{{ route('file.upload') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="file">File</label>
            <input type="file" id="file" name="file" required>
        </div>
        <div>
            <label for="name">File Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <button type="submit">Upload</button>
        </div>
    </form>
    <h2>Your Files</h2>
    @foreach ($files as $file)
        <div>
            <p>File Name: {{ $file->name }}</p>
            <p>Status: {{ $file->status }}</p>
            @if ($file->feedback)
                <p>Feedback: {{ $file->feedback }}</p>
            @endif
        </div>
    @endforeach
</body>
</html>
