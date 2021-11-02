$(document).ready(function() {
    $('#mostrarPreguntas').click(function() {
        var json=new XmlHttpRequest();
        json.open("GET", "../php/ShowJsonQuestionsWithImage.php", true);
        json.send();
    });
});