<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Pets</title>
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
                <th>ID</th><th>Name</th><th>Kind</th><th>Breed</th>
                <th>Age</th><th>Weight</th><th>Location</th><th>Adopted</th><th>Active</th><th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $pet)
            <tr>
                <td>{{ $pet->id }}</td>
                <td>{{ $pet->name }}</td>
                <td>{{ $pet->kind }}</td>
                <td>{{ $pet->breed }}</td>
                <td>{{ $pet->age }} yr(s)</td>
                <td>{{ $pet->weight }} kg</td>
                <td>{{ $pet->location }}</td>
                <td>{{ $pet->adopted == 1 ? 'Adopted' : 'Available' }}</td>
                <td>{{ $pet->active == 1 ? 'Active' : 'Inactive' }}</td>
                <td>
                    @php $ext = substr($pet->image, -4); @endphp
                    @if ($ext != 'webp' && $ext != '.svg')
                        <img src="{{ public_path('images/pets/'.$pet->image) }}" width="60px">
                    @else
                        Webp|SVG
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>