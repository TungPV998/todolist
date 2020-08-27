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
                console.log(data);
                loadData();
                //$(".content ul").html(data.html);
              // alert(data.message);
               //window.location.reload();
           }
        });

    });
    loadData = function(){
        $.ajax({
            type:'get',
            url:url,
            success:function(data){
                console.log(data);
                loadData();
                //$(".content ul").html(data.html);
                // alert(data.message);
                //window.location.reload();
            }
        });
    }
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
                    window.location.reload();
                    //alert("OLK");
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
