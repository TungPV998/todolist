$(window).on('load', function() {

    $("#formAddData").submit(function(event){
        event.preventDefault();
        var content = $("#txtTask").val();
        var url = $(this).attr("action");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'get',
            url:url,
            data:{task:content},
            success:function(data){
             var html = " ";
             html+= "<li><div class='item'>"
            html+= "<span "+(data.task.id == 1 ? 'class = line-through' : '' ) +">"+data.task.content+"</span>";
            html+= "<input type='checkbox' class='checkpass'"+(data.task.status == 1 ? ' checked' : '');
            html+= "value='" +data.task.id + "' data-href='http://todolist.test/edit/"+data.task.id +"'>";
            html+= "<a  onclick='confirm(Bạn có chắc là muốn xóa ?)' href='http://todolist.test/delete/"+data.task.id +"'><i class='fas fa-trash'></i></a></div></li>";
            $("div.content ul").append(html);
           }
        });

    });

    $("#deleteItem").click(function(event){
        event.preventDefault();
        var url = $(this).attr("href");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'get',
            url:url,
            success:function(data){
                if(data.code == 200){
                   alert("Xóa thành công");
                }
                else{
                    alert("Xoa That Bai");
                }

            }
        });

    });

    //thay doi trang thai checkbox
    var checkpass = document.querySelectorAll('.checkpass');
    for (i = 0;i<checkpass.length;i++){
        checkpass[i].onchange = function () {
          var status = this.value;
          var url = this.getAttribute("data-href");
           // console.log(url);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'get',
                url:url,
                success:function(data){
                    if(data.code == 200){
                        //alert("Thay doi Thanh Cong");
                        window.location.reload();
                    }
                    else{
                        alert("Thay doi That Bai");
                    }

                }
            });
        }
    }
});
