<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Loại bàn phím</th>
                <th scope="col">Quản lý</th>

            </tr>
        </thead>
        <tbody>
            @php
            $i=0;
            @endphp
            @foreach($category as $categories)
            <tr>
                @php
                $i++;
                @endphp
                <th scope="row">{{$i}}</th>
                <td>{{$categories->name_catcake}}</td>
                <td>
                    <form action="{{route('category.destroy',[$categories->id_catcake])}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" value="Delete" name="deleteCat" class="btn btn-danger btn-sm mb-2" />
                    </form>

                    <a href="{{route('category.show',[$categories->id_catcake])}}" class="btn btn-warning btn-sm mb-2">Edit</a>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>