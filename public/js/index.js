var canvas, ctx, birds, tot, radius;
tot=35;
birds=[];
radius=140;
function Bird(n){
    this.pos={
        x:Math.random()*canvas.width,
        y:Math.random()*canvas.height
    };
    this.acc={
        x:Math.random()*4-2,
        y:Math.random()*4-2
    };
    this.color='rgb('+((Math.random() * 127 + 128) | 0)+', '+((Math.random() * 127 + 128) | 0)+', '+((Math.random() * 127 + 128) | 0)+')';
}
Bird.prototype.connect=function(){
    for(var j=0; j<birds.length; ++j){
        var a=this.pos;
        var b = birds[j].pos;
        var dist = (b.x - a.x) * (b.x - a.x) + (b.y - a.y) * (b.y - a.y);
        if(dist <= radius*radius){
            ctx.beginPath();
            ctx.moveTo(a.x, a.y);
            ctx.lineTo(b.x, b.y);
            ctx.stroke();
            ctx.closePath();
        }
    }
};
Bird.prototype.draw=function(){
    ctx.beginPath();
    ctx.fillStyle=this.color;
    ctx.arc(this.pos.x, this.pos.y, 5, 0, Math.PI*2);
    ctx.fill();
    ctx.stroke();
    ctx.closePath();
};
Bird.prototype.checkSides=function(){
    if((this.pos.x<0&&this.acc.x<0)||(this.pos.x>canvas.width&&this.acc.x>0)) this.acc.x*=-1;
    if((this.pos.y<0&&this.acc.y<0)||(this.pos.y>canvas.height&&this.acc.y>0)) this.acc.y*=-1
};
function reset(){
    canvas=document.getElementById('animation');
    canvas.width=window.innerWidth;
    ctx=canvas.getContext('2d');
    ctx.strokeStyle='gray';
}
function createBirds(){
    for(var i=0; i<tot; ++i){
        birds.push(new Bird(i));
    }
}
function animate(){
    ctx.fillStyle='rgba(255, 255, 255, 0.03)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    for(var i=0; i<tot; ++i){
        birds[i].checkSides();
        birds[i].connect();
        birds[i].pos.x+=birds[i].acc.x;
        birds[i].pos.y+=birds[i].acc.y;
    }
    for(var i=0; i<tot; ++i){
        birds[i].draw();
    }
    requestAnimationFrame(animate);
}
function gen(){
    reset();
    createBirds();
    animate();
}
gen();
window.onresize=reset;