<!DOCTYPE html>
<html lang="en">

<head>
    <title>List User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>List User</h2>
        <a class="mt-3 btn btn-primary" href="users/create">create</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Avartar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['password'] }}</td>
                        <td><img width="180px" src="../{{ $user['avartar'] }}" alt=""></td>
                        <td>
                            <a class="btn btn-warning" href="/Ontap/admin/users/{{ $user['id'] }}/update">update</a>
                            <a class="btn btn-info" href="/Ontap/admin/users/{{ $user['id'] }}/show">show</a>
                            <a onclick="return confirm('are you sure??')" class="btn btn-danger"
                                href="/Ontap/admin/users/{{ $user['id'] }}/delete">delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>
