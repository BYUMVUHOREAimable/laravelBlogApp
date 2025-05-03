<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: white;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Blog App</a>
        </div>
    </nav>

    <div class="container py-4">
        <div class="form-container">
            <h1 class="mb-4">Edit Post</h1>
            <form action="/edit-post/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                </div>
                <div class="mb-3">
                    <textarea name="body" class="form-control" rows="6" required>{{ $post->body }}</textarea>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Save Changes</button>
                    <a href="/" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
