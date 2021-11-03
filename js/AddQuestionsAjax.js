function addQuestion(){
    $.ajax({
        url: "../php/AddQuestionWithImage.php",
        dataType: "json",
        type: "post",
        data: $("#fquestion").serialize(),
        contentType: 'application/json;charset=UTF-8',
        cache: false,
        beforeSend: function(){
            $('#content').html('<div><img src="loading.gif"/></div>');
        },
        success: function(data){
            alert("Datos enviados correctamente");
        },
        error: function(xhr, resp, text){
            alert("ERROR al añadir la pregunta");
            console.log(xhr, resp, text);
        }
    });
    ev.preventDefault();
}