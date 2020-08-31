@foreach($data as $item)
    <li>
        <div class="item">
            <span {{ $item['status'] == 1 ? "class = line-through" : '' }}>{{ $item['content'] }} </span>
            <input type="checkbox" class="checkpass"
                   id="check{{$item["id"]}}" {{ $item['status'] == 1 ? "checked" : "" }}
                   value="{{$item["id"]}}" data-href="{{ route("home.edit",["id"=>$item["id"]]) }}">
            <a id="deleteItem" onclick="alert('Ban co chac la muon xoa ?')" href="{{route('home.delete',["id"=>$item["id"]]) }}">
                <i class="fas fa-trash"></i> </a></div></li>



@endforeach
