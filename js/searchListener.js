
    window.addEventListener("load", function(event)
    {
        $("#boxListener").keyup(function()
        {
            $("#suggestions").show();
            var x = $(this).val();
            if(x=='')
            {
                $("#suggestions").hide();
            }
            $.ajax(
            {
                type:'GET',
                url:'/nasa/includes/getTitles.php',
                data:'input='+x, 

                success:function(data)
                {
                    console.log(data);
                    $("#suggestions").html(data);
                    if(!data)
                    {
                        $("#suggestions").html("No suggestions found");
                    }
                }
                ,
            });
        });
    });
