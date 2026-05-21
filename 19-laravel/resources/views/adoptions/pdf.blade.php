<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Adoptions</title>
    <style>
        table { border: 2px solid #aaa; border-collapse: collapse }
        table th, table td { font-family: sans-serif; font-size: 10px; border: 2px solid #ccc; padding: 4px; }
        table tr:nth-child(odd) { background-color: #eee; }
        table th { background-color: #666; color: #fff; text-align: center; }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Pet</th>
                <th>Kind</th>
                <th>Breed</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adoptions as $adoption)
            <tr>
                <td>{{ $adoption->id }}</td>
                <td>{{ $adoption->user->fullname }}</td>
                <td>{{ $adoption->user->email }}</td>
                <td>{{ $adoption->pet->name }}</td>
                <td>{{ $adoption->pet->kind }}</td>
                <td>{{ $adoption->pet->breed }}</td>
                <td>{{ $adoption->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>