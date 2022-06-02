$(document).ready(function(){
    $("#formImport").submit(function(event){
        event.preventDefault();

        var csvInputFile = document.forms["formImport"]["file"].value;

        $.ajax({
            url: "http://localhost/Saa/App/Controller/TerminaisController.php",
            type: "POST",
            data: {csvInputFile: csvInputFile, erro: 'message_error'},
            success: function(data) {
                if(data == "") {
                    console.log(data);
                }
            }
        });
    });
});