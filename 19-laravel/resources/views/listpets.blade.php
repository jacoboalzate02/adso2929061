<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List All Pets (View)</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-emerald-900 p-12">
  <h1 class="text-emerald-200 text-4xl text-center mb-8 pt-8">List All Pets (View)</h1>
  <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
    <table class="table bg-emerald-100">
      <thead>
        <tr class="bg-emerald-950 text-emerald-200">
          <th>Id</th>
          <th>Name</th>
          <th>Kind</th>
          <th>Breed</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pets as $pet)
        <tr class="even:bg-emerald-300">
          <th>{{ $pet->id }}</th>
          <td>{{ $pet->name }}</td>
          <td>{{ $pet->kind }}</td>
          <td>{{ $pet->breed }}</td>
          <td>  </td>
        
        
        
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>