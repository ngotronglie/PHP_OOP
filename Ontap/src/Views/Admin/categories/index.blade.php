<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Categories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>List Categories</h2>
        <a class="mt-3 btn btn-primary" href="categories/create">create</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $Categorie)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $Categorie['name_category'] }}</td>
                        <td>
                            <a class="btn btn-warning"
                                href="/Ontap/admin/categories/{{ $Categorie['id'] }}/update">update</a>
                            <a onclick="return confirm('are you sure??')" class="btn btn-danger"
                                href="/Ontap/admin/categories/{{ $Categorie['id'] }}/delete">delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>
