<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show user</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Show user: {{ $user['name'] }}</h2>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>value</th>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $user['name'] }}</td>
            </tr>
            <tr>
                <td>email</td>
                <td>{{ $user['email'] }}</td>
            </tr>
            <tr>
                <td>password</td>
                <td>{{ $user['password'] }}</td>
            </tr>
            <tr>
                <td>avartar</td>
                <td><img width="260px" src="../../../{{ $user['avartar'] }}" alt=""></td>
            </tr>
        </table>
    </div>

</body>

</html>
