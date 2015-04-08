/**
 * Created by Administrator on 31.03.2015.
 */
$(document).ready(function(){
    $("input[type='text']").css('color', 'blue');

    $(window).keypress(function(e){
        if (e.keyCode == 0 || e.keyCode == 32) {
            $('ul').find('li:first').remove();
        }
    });

    $("#sendForm").on('submit', function(e){
        alert("Thanks for response!");
    });

    var tid = setInterval (animation, 500);
    function animation(){
        $('#block').show("slow")
            .animate({"marginLeft":"" + $(window).width() - 65 + "px"}, 8000)
            .animate({"marginLeft":"0px"}, 8000);
    }

    $('a').click(function (){
        var title = $(this).attr("title");
        $("#clickDiv").text("Text from link title: " + title);
    });
});
