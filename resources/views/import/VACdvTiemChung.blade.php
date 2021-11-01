<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Impport for Thống kê</h1>

    <form action="{{ route('import.VACdvtiemchung') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="fileVACdvTiemChung">
        <input type="submit" value="update" name="submit">
    </form>
</body>
</html>