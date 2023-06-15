<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
</head>
<body>
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <h2>Pending Files</h2>
    @foreach ($files as $file)
        <div>
            <p>Uploaded by: {{ $file->user->name }}</p>
            <p>File Name: {{ $file->name }}</p>
            <p>Status: {{ $file->status }}</p>
            <a href="{{ route('admin.verify', $file) }}">Verify</a>
        </div>
    @endforeach
</body>
</html>
