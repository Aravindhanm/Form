$(document).ready(function(){

    $('.email').blur(function (e){

        e.preventDefault();

        var email_filter =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var email = $('.email').val();
        if($.trim(email).length == 0){
            error_email = "Please Enter Email";
            $('#error_email').text(error_email);
        }else if(!(email_filter.test(email))){
            error_email = "Please Enter Valid Email";
            $('#error_email').text(error_email);
        }else{
            error_email = "";
            $('#error_email').text(error_email);}});

    $('.name').blur(function (e){
        e.preventDefault();
        var name = $('.name').val();
        if($.trim(name).length == 0){
            error_name = "Please Enter Name";
            $('#error_name').text(error_name);
        }else{
            error_name = "";
            $('#error_name').text(error_name);
        }});


        $('.mob').blur(function (e){
            e.preventDefault();
            var mob = $('.mob').val();
            if($.trim(mob).length == 0){
                error_mob = "Please Enter Name";
                $('#error_mob').text(error_mob);
            }else{
                error_mob = "";
                $('#error_mob').text(error_mob);
            }});

            $('.dob').blur(function (e){
                e.preventDefault();
                var dob = $('.dob').val();
                if($.trim(dob).length == 0){
                    error_dob = "Please Fill Date Of Birth";
                    $('#error_dob').text(error_dob);
                }else{
                    error_dob = "";
                    $('#error_dob').text(error_dob);
                }});

        $('.image').blur(function (e){
            e.preventDefault();
            var image = $('.image').val();
            if($.trim(image).length == 0){
                error_image = "Please Select Image";
                $('#error_image').text(error_image);
            }else{
                error_image = "";
                $('#error_image').text(error_image);
            }});

    $('#email').keyup(function(){
        var email = $(this).val();
        $.ajax({
            url: "validation.php",
            method: "POST",
            data: {email:email},
            success:function(data){
                $('#error_email').html(data);
            }
        });
    });

    $('.name').keyup(function(){
        var name = $(this).val();
        $.ajax({
            url: "validation.php",
            method: "POST",
            data: {name:name},
            success:function(data){
                $('#error_name').html(data);
            }
        });
    });

 


    
        $('.mob').keyup(function(){
            var mob = $('.mob').val();
            if(mob.length == 10){
                $.ajax({
                    url: 'validation.php',
                    method: 'POST',
                    data: {mob:mob},
                    success: function(data){
                            $('#error_mob').html(data);
                         
                    }
                });
            }
        });


        $('.image').keyup(function() {
            var image = $('.image').val();
            $.ajax({
                type: 'POST',
                url: 'validation.php',
                data: { profile: image },
                success: function(data) {
                    $('#error_image').html(data);
                }
            });
        });  
     
       


});