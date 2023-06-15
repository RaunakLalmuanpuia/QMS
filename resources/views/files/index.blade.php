<!DOCTYPE html>
<html>
<head>
    <title>My Files</title>
</head>
<body>
    <h1>My Files</h1>
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
