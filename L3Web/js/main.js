/**
 * Created by Administrator on 06.04.2015.
 */
$(window).ready(function (){
    Array.prototype.contains = function(obj) {
        var i = this.length;
        while (i--) {
            if (this[i] === obj) {
                return true;
            }
        }
        return false;
    }
    var clicked = [];

    $("input[type='submit']").click(function (){
        console.log("Submit clicked");
        if ($.inArray($(this).attr('name'), clicked) != -1){
            // Open cashed content
            $('.content').html( clicked [ clicked.indexOf($(this).attr('name')) ] );
            console.log("Cashed content");
        } else {
            // Send data
            $.ajax({
                type: 'POST',
                url: 'response.php',
                data: {name : $(this).attr('name')},
                success: function(response) {
                    $('.content').html(response);
                    clicked.push(response);
                    console.log("New server request");
                    console.log(clicked);
                }
            });
        }

    });

});
