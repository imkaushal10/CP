$(document).ready(function () {

    //for notification
    $(".notification").slideDown(300);

    $(".notification").delay(4000).fadeOut("slow");


    $("#register_form").removeClass("d-none");
    $("#register_form").hide();
    $("#second_show").hide();

    //carousel caption animation

    $(".carousel-caption h3").hide();
    $(".carousel-caption p").hide();
    $(".carousel-caption h3").delay(1500).slideDown(2500);
    $(".carousel-caption p").delay(1500).fadeIn(2500);

    function carouselCaption(){
        $(".carousel-caption h3").hide();
        $(".carousel-caption p").hide();
        $(".carousel-caption h3").slideUp(2500).slideDown(2500);
        $(".carousel-caption p").fadeOut(2500).fadeIn(2500);
    }

    setInterval (carouselCaption, 10000);


    $("#get_started").click(function(e){
        e.preventDefault();
        $(this).hide();
        $("#register_form").delay(500).fadeIn("slow");

        setTimeout( function(){ hideRegisterForm(); }, 35000);
    });


    $("#btn_next").click(function(e){
        e.preventDefault();
        $("#first_show").hide();
        $("#second_show").fadeIn("slow");
    });


    $("#btn_back").click(function(e){
        e.preventDefault();
        $("#second_show").hide();

        $("#first_show").fadeIn("slow");
    });

    $("#form_close").click(function(e){
        e.preventDefault();
        hideRegisterForm();
    });

    $(".reg_email").keyup(function(){
        var email = $(this).val();
        $.ajax({
           url:'Admin/Middleware/frontend_mw.php',
           type:'post',
           data:{CheckEmailExist : email},
           success:function(data){
                if(data == 1){
                    $(".email_error").text("Email exists");
                }else{
                    $(".email_error").text("");
                }
           }
        });
    });


    //logout click

    $("#log_out").click(function(){
        if(confirm("Do you want to logout?")){
            $.ajax({
                url:'Admin/Middleware/frontend_mw.php',
                type:'post',
                data:{logout : true},
                success:function(){
                    location.reload();
                }
            })
        }
    });

    //delete customer booking
    $(".del_custra").click(function(){
       if(confirm("Aru you sure to cancel this training ?")){
            var id = $(this).val();
            $.ajax({
                url:'Admin/Middleware/frontend_mw.php',
                type:'post',
                data:{del_custra : id},
                success:function(){

                    location.reload();
                }
            })
        }
    });


    //booking the training
    $(".book_training").click(function(e){
        var trainingId = $(this).val();
        $.ajax({
            url:'Admin/Middleware/frontend_mw.php',
            type:'post',
            data:{booktraining : trainingId},
            cache: 'false',
            dataType:'json',
            success:function(data){
                if(data.isCustomerLogged == false && data.isSuccessful == false){
                    location.href = "Login.php";
                }else if(data.isCustomerLogged == true && data.isSuccessful == true){
                    location.href = "Booking.php";
                }else{
                    location.reload();
                }
            }
        })
    });


    //cookie
    setTimeout(function(){
        $(".cookie_notification").removeClass("d-none");
        $(".cookie_notification").fadeIn(600);
    }, 15000);

    $(".cookie_yes").click(function(){
        $.ajax({
            url:'Admin/Middleware/frontend_mw.php',
            type:'post',
            data:{cookie_true : true},
            success:function(){
                $(".cookie_notification").fadeOut("slow");
            }
        })
    });

    $(".cookie_not, #cookie_close").click(function(){
        $(".cookie_notification").fadeOut("slow");

    });


});

function hideRegisterForm(){
    $("#register_form").hide();
    $("#get_started").fadeIn("slow");
    $("#second_show").hide();
    $("#first_show").show();
}

