<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Impport for Đơn vị tiêm chủng</h1>

    <form action="{{ route('import.dvtiemchung') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="filedvTiemChung">
        <input type="submit" value="update" name="submit">
    </form>
</body>
</html>