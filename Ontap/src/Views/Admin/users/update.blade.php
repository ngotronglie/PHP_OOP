<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update user</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Update user: {{ $user['name'] }}</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input value="{{ $user['name'] }}" type="name" class="form-control" id="name"
                    placeholder="Enter name" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input value="{{ $user['email'] }}" type="email" class="form-control" id="email"
                    placeholder="Enter email" name="email">
            </div>
            <div class="mb-3 mt-3">
                <label for="password">Password:</label>
                <input value="{{ $user['password'] }}" type="password" class="form-control" id="password"
                    placeholder="Enter password" name="password">
            </div>

            <div class="mb-3">
                <img width="180px" src="../../../{{ $user['avartar'] }}" alt=""><br>
                <label for="avartar">avartar:</label>
                <input type="file" class="form-control" id="avartar" placeholder="Enter avartar" name="avartar">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
