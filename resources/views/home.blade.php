<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 500px;
            margin: 2rem auto;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .post-container {
            margin: 2rem 0;
            padding: 1rem;
            border-radius: 8px;
            background-color: #f8f9fa;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Blog App</a>
            @auth
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light">Log out</button>
                </form>
            @endauth
        </div>
    </nav>

    <div class="container py-4">
        @auth
            <div class="form-container bg-white">
                <h2 class="mb-4">Create a New Post</h2>
                <form action="/create-post" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Post title" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="body" class="form-control" placeholder="Body content..." rows="4" required></textarea>
                    </div>
                    <button class="btn btn-primary">Save Post</button>
                </form>
            </div>

            <div class="post-container">
                <h2 class="mb-4">All Posts</h2>
                @foreach($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $post['title'] }}</h3>
                            <h6 class="card-subtitle mb-2 text-muted">By {{ $post->user->name }}</h6>
                            <p class="card-text">{{ $post['body'] }}</p>
                            <div class="d-flex gap-2">
                                <a href="/edit-post/{{ $post->id }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="/delete-post/{{ $post->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-md-6">
                    <div class="form-container bg-white">
                        <h2 class="mb-4">Register</h2>
                        <form action="/register" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                    placeholder="Email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                    placeholder="Password" required>
                                @error('password')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-container bg-white">
                        <h2 class="mb-4">Login</h2>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input name="loginname" type="text" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="mb-3">
                                <input name="loginpassword" type="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button class="btn btn-primary w-100">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
