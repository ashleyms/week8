$("#step1-icon,#step2-back").click(function(){
    $("#step2-left").css({"display": "none"});
    $("#step2-right").css({"display": "none"});
    $("#ste3-left").css({"display": "none"});
    $("#step3-right").css({"display": "none"});

    $("#step1-left").css({"display": "block"});
    $("#step1-right").css({"display": "block"});

});

$("#step1-icon").click(function(){
    $("#step1-icon svg:first-child").css({"color": "black"});
    $("#step2-icon svg:first-child").css({"color": "white"});
    $("#step3-icon svg:first-child").css({"color": "white"});
});

$("#step2-back").click(function(){
    $("#step1-icon svg:first-child").css({"color": "black"});
    $("#step2-icon svg:first-child").css({"color": "white"});
});

$("#step2-icon, #step3-back, #step1-next").click(function(){
    $("#step1-left").css({"display": "none"});
    $("#step1-right").css({"display": "none"});
    $("#step3-left").css({"display": "none"});
    $("#step3-right").css({"display": "none"});

    $("#step2-left").css({"display": "block"});
    $("#step2-right").css({"display": "block"});
});

$("#step2-icon, #step1-next").click(function(){
    $("#step1-icon svg:first-child").css({"color": "white"});
    $("#step3-icon svg:first-child").css({"color": "white"});
    $("#step2-icon svg:first-child").css({"color": "black"});
});

$("#step3-back").click(function(){
    $("#step2-icon svg:first-child").css({"color": "black"});
    $("#step3-icon svg:first-child").css({"color": "white"});
});

$("#step3-icon,#step2-next").click(function(){
    $("#step1-left").css({"display": "none"});
    $("#step1-right").css({"display": "none"});
    $("#step2-left").css({"display": "none"});
    $("#step2-right").css({"display": "none"});

    $("#step3-left").css({"display": "block"});
    $("#step3-right").css({"display": "block"});
    $("#step3-icon svg:first-child").css({"color": "black"});
    $("#step1-icon svg:first-child").css({"color": "white"});
    $("#step2-icon svg:first-child").css({"color": "white"});
});