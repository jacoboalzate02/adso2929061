<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Adoptions</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Pet</th>
                <th>Kind</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Weight (kg)</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adoptions as $adoption)
            <tr>
                <td>{{ $adoption->id }}</td>
                <td>{{ $adoption->user->fullname }}</td>
                <td>{{ $adoption->user->email }}</td>
                <td>{{ $adoption->user->phone }}</td>
                <td>{{ $adoption->pet->name }}</td>
                <td>{{ $adoption->pet->kind }}</td>
                <td>{{ $adoption->pet->breed }}</td>
                <td>{{ $adoption->pet->age }}</td>
                <td>{{ $adoption->pet->weight }}</td>
                <td>{{ $adoption->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>