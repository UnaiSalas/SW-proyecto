$(document).ready(function(){
    countQuestions();
    setInterval(countQuestions,5000);
});
function countQuestions(){
    $.ajax({

        url: '../json/Questions.json',
        dataType:"json",
        processData: false,
        contentType: false,
        cache: false,
        type: 'GET',
        success: function(data){
            printNumberQuestions(data);
        }
    });
}
function printNumberQuestions(data){
    var correo = $("#correo").val();
    var nQuestions = 0;
    var totalQuestions = 0;
    $(data.assessmentItems).each(function(index,value){
        totalQuestions+=1;
        console.log(value.author);
        if(value.author == correo){
            nQuestions+=1;
        }
    });
    var textQuestions  = "Has insertado " + nQuestions+" / "+totalQuestions + " preguntas";
    $("#contadorQuestions").text(textQuestions);


}