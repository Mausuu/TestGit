<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<!--Bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
    <form action="{{route('category.update')}}" method="post" autocomplete="off">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="title">Update</label>
            <input type="text" name="nameCategory" class="form-control" value="" />
            <input type="submit" value="Cập nhật" name="editCat" class="btn btn-primary mt-2" />
        </div>
    </form>
</body>

</html>