$(document).ready(function(){
    $('#hist a').click(function(){
    var href = $(this).attr('href');
    $('#tekst').load(href);
    return false;
     });
});
$(document).ready(function(){
    $('#ABC a').click(function(){
    var href = $(this).attr('href');
    $('#tekst').load(href);
    return false;
     });
});