<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="/css/style.css"  rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="wrap">
        <h2>ToDo List</h2>
        <div class="content">
            <ul>
                @foreach($data as $item)
                    <li>
                        <div class="item">
                            <span {{ $item['status'] == 1 ? "class = line-through" : '' }}>{{ $item['content'] }} </span>
                            <input type="checkbox" class="checkpass"
                                   id="check{{$item["id"]}}" {{ $item['status'] == 1 ? "checked" : "" }}
                                   value="0" data-href="{{ route("home.edit",["id"=>$item["id"]]) }}">
                            <a id="deleteItem" onclick="alert('Ban co chac la muon xoa ?')" href="{{route('home.delete',["id"=>$item["id"]]) }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <form id="formAddData" class="form-inline" action="{{ route("home.create") }}">
            <input type="text" required class="form-control mb-2 mr-sm-8 col" id="txtTask"  placeholder="Nhập công việc" name="txtTask">
            @csrf
            <button type="submit" class="btn btn-primary mb-2">Thêm Ghi Chú</button>
        </form>

    </div>

</div>

</body>

<script src="/js/index.js"></script>


</html>
