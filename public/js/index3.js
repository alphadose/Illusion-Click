function animatedBG(){
  $("i").css("font-size","35em").clone().appendTo("body,.flip,flip-b").addClass("rotate,grow").clone().appendTo(".flip-b").addClass("flip-b").addClass("scrunch");
  $(".flip").css("font-size","25em").addClass("grow").clone().appendTo("flip-b");
  $(".background").clone().appendTo("body").addClass("grow").clone().appendTo("body").addClass("shrink");
  $("i").animate({opacity:'1'},2000);
  $("h1").fadeIn(2000).animate({opacity:'1'},3000).fadeOut(300);
}

animatedBG();