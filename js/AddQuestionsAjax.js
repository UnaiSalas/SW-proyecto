function addQuestion(){
    $.ajax({
        url: "../php/AddQuestion.php",
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
            showQuestions();
        },
        error: function(data){
            alert("ERROR al añadir la pregunta");
        }
    });
}