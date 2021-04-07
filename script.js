(function(){
    
    var canvas = document.createElement('canvas'),
    context = canvas.getContext('2d'),
    w = canvas.width = innerWidth,
    h = canvas.height = innerHeight,
    particles = [],
    properties = {
      bgColor: 'rgba(17, 17, 18, 1)',
      particleColor: 'rgba(229, 36, 255, 1)',
      particleRad: 3,
      particleCount: 60,
      particleMaxVelocity: 0.5,
      lineLen: 150,
      particleLife: 6
    };
    
    document.querySelector('body').appendChild(canvas)

    window.onresize = function(){
        w = canvas.width = innerWidth,
        h = canvas.height = innerHeight;
    }

    class Particle{
        constructor(){
            this.x = Math.random()*w;
            this.y = Math.random()*h;
            this.velocityX = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
            this.velocityy = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
            this.life = Math.random()*properties.particleLife*60;
        }
        position(){
            this.x += this.velocityX;
            this.Y += this.velocityY;
            this.x + this.velocityX > w && this.velocityX > 0 || this.x + this.velocityX > w && this.velocityX < 0? this.velocityX *= -1 : this.velocityX;
            this.y + this.velocityY > h && this.velocityY > 0 || this.y + this.velocityY > h && this.velocityY < 0? this.velocityY *= -1 : this.velocityY;
        }
        reDraw(){
            context.beginPath();
            context.arc(this.x, this.y, properties.particleRad, 0, Math.PI*2)
            context.closePath();
            context.fillStyle = properties.particleColor;
            context.fill();
        }
        reCalculateLife(){
            if(this.life < 1){
                this.x = Math.random()*w;
                this.y = Math.random()*h;
                this.velocityX = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
                this.velocityy = Math.random()*(properties.particleMaxVelocity*2)-properties.particleMaxVelocity;
                this.life = Math.random()*properties.particleLife*60;
            }
            this.life--;
        }
    }

    function reDrawBackground(){
        context.fillStyle = properties.bgColor;
        context.fillRect(0,0,w,h);
    };

    function drawLines(){
        var x1, y1, x2, y2, length, opacity;
        for(var i in particles){
            for(var j in particles){
                x1 = particles[i].x;
                y1 = particles[i].y;
                x2 = particles[j].x;
                y2 = particles[j].y;
                length = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
                if (length < properties.lineLen){
                    opacity = 1 - length/properties.lineLen;
                    context.lineWidth = '0,5';
                    context.strokeStyle = 'rgba(229, 36, 255, '+opacity+')';
                    context.beginPath();
                    context.moveTo(x1,y1);
                    context.lineTo(x2,y2);
                    context.closePath;
                    context.stroke();
                }
            }
        }
    }

    function reDrawParticles(){
        for(var i in particles){
            particles[i].reCalculateLife();
            particles[i].position();
            particles[i].reDraw();
        }
    }

    function loop(){
        reDrawBackground();
        reDrawParticles();
        drawLines();
        requestAnimationFrame(loop);
    };

    function init(){
        for(var i=0; i < properties.particleCount; i++){
            particles.push(new Particle);
        }
        loop();
    };

    init();
}())
