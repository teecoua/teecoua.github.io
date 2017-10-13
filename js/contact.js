$(function () {

    // init the validator
    // validator files are included in the download package
    // otherwise download from http://1000hz.github.io/bootstrap-validator

    //$('#contact-form').validator();


    // when the form is submitted
    $( "#telbtn" ).click(function() {

        // if the validator does not prevent form submit
        //if (!e.isDefaultPrevented()) {
            var url = "contact.php";
            var tel = $("#telephone").val();
            if(tel.length < 17) {
                $("#telephone").attr('class', 'invalid');
                return;
            }
            console.log(tel.length);
            // POST values in the background the the script URL
            $.ajax({
                type: "POST",
                url: url,
                data: "tel=" + tel,
                success: function (data)
                {
                    console.log(data.message);
                    console.log(data.type);
                    $('#centralModalSuccess').modal('show');
                },
                error: function(data){
                    console.log(data);
                }
            });
            return false;
        //}
    })
});