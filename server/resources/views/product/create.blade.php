</head>
<!--Bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
    <form action="{{route('product.store')}}" method="post" autocomplete="off">
        @csrf
        <div class="form-group">
            <label for="title">Product</label>
           
            <input type="text" name="nameProduct" class="form-control">
            <input type="text" name="priceProduct" class="form-control">
            <input type="text" name="avatarProduct" class="form-control">
            <input type="text" name="idCategory" class="form-control">
            <input type="submit" value="Thêm" name="addProduct" class="btn btn-primary mt-2">
        </div>
    </form>
</body>

</html>