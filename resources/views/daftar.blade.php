<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar | Celenganku</title>
</head>
<body>
  <form action="{{ route('actiondaftar') }}" method="post">
    @csrf
    <input type="text" name="name" id="name" placeholder="Name">
    <input type="email" name="email" id="email" placeholder="Email">
    <input type="password" name="password" id="password" placeholder="Password">
    <button type="submit">Daftar</button>
  </form>
</body>
</html>