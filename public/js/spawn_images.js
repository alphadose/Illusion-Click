var i=0;
var timer;
var inter;
var time=5;
var z=0;
var check;
var t;
var zzz;
var score;
function start(){

    var n=confirm("Do you want to start the game ?");
    if(n==true){
	var x=Math.floor(17.99*Math.random());
     var y=Math.floor(13.99*Math.random());
 	x=5.75 + 4.5*x;
 	y=8.655+6.25*y;
    z=Math.round(Math.random());
    z++;
    if(z==1)
        t=0;
    else
        t=2;

    timer=setTimeout(red,4950);
    inter=setTimeout(gameover,5010);
     $("#image").attr("src","/images/"+z+".jpg");
    $('#image').css({ position:'absolute','left': x + '%', 'top': y + '%' ,'width':1+"%" , 'height':1.6+"%"});
    changetimer(time);
    zzz=setInterval(changetimer,1000);
    }
}


$("#image").ready(function(){
             document.oncontextmenu = function() {return false;};

              $("#image").mousedown(function(e){ 
                
            if( e.button == t ) {
                time=5;
    clearInterval(zzz);        
    clearTimeout(inter);
    clearTimeout(timer);
    changetimer(time);
    var x=Math.floor(17.99*Math.random());
     var y=Math.floor(13.99*Math.random());
    x=5.75 + 4.5*x;
    y=8.655+6.25*y;
    z=Math.round(Math.random());
    z++;
   if(z==1)
        t=0;
    else
        t=2;
    zzz=setInterval(changetimer,1000);
    timer=setTimeout(red,4950);
    inter=setTimeout(gameover,5010);
     $("#image").attr("src","/images/"+z+".jpg"); 
    $('#image').css({ position:'absolute','left': x + '%', 'top': y + '%' ,'width':1+"%" , 'height':1.6+"%"});
   
    i++;
    $("#score").text(i);
    }
    else {
        red();
        setTimeout(gameover,100);
    }
        
        });
    
});


function gameover()
{   clearTimeout(timer);
      clearTimeout(inter);
    
    score=i;
    $.post("/signup", {score: score});
    alert("Your final score is "+score);
    x=confirm("Do you want to see your rank in leaderboard ?");
    if(x==true)
    window.location="/signup";
    else
    window.location="/";    

}
function red()
{     
    $("#image").attr("src","/images/"+3+".jpg");
}
function changetimer()
{   if(time>=0)
    {
    document.getElementById('time').innerHTML= time;
    time--;}
    else
     {   clearInterval(zzz);

     }

}