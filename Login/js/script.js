$(document).ready(function(){
    $('#login').click(function(){
        var user = $('#user').val();
        var password = $('#pass').val();
        var error = true;

        $.ajax({
            type:"POST",
            url: "data.json",
            dataType: "json",
            success: function(data){
                $.each(data,function(key,value){
                    if(user == value.userName && password == value.pass){
                        
                    }
                })
            }
        })
    })
})