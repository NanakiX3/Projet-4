$(document).ready(function(){

    tinymce.init({
        selector: '.tinyMCE',
        height: 500,
        language: 'fr_FR',
        theme: 'modern',
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
          ],
        toolbar1: 'insertfile undo redo | formatselect | bold italic underline strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | image',
        image_advtab: true,
        file_picker_callback: function(callback, value, meta) {
            if (meta.filetype == 'image') {
              $('#upload').trigger('click');
              $('#upload').on('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                  callback(e.target.result, {
                    alt: ''
                  });
                };
                reader.readAsDataURL(file);
              });
            }
          }
      });

          var canvas = document.querySelector('.snow'),
          ctx = canvas.getContext('2d'),
          windowW = window.innerWidth,
          windowH = window.innerHeight,
          numFlakes = 200,
          flakes = [];

      function Flake(x, y) {
        var maxWeight = 5,
            maxSpeed = 3;
        
        this.x = x;
        this.y = y;
        this.r = randomBetween(0, 1);
        this.a = randomBetween(0, Math.PI);
        this.aStep = 0.01;

        
        this.weight = randomBetween(2, maxWeight);
        this.alpha = (this.weight / maxWeight);
        this.speed = (this.weight / maxWeight) * maxSpeed;
        
        this.update = function() {
          this.x += Math.cos(this.a) * this.r;
          this.a += this.aStep;
          
          this.y += this.speed;
        }
        
      }

      function init() {
        var i = numFlakes,
            flake,
            x,
            y;
        
        while (i--) {
          x = randomBetween(0, windowW, true);
          y = randomBetween(0, windowH, true);
          
          
          flake = new Flake(x, y);
          flakes.push(flake);
        }
        
        scaleCanvas();
        loop();  
      }

      function scaleCanvas() {
        canvas.width = windowW;
        canvas.height = windowH;
      }

      function loop() {
        var i = flakes.length,
            z,
            dist,
            flakeA,
            flakeB;
        
        // clear canvas
        ctx.save();
        ctx.setTransform(1, 0, 0, 1, 0, 0);
        ctx.clearRect(0, 0, windowW, windowH);
        ctx.restore();
        
        // loop of hell
        while (i--) {
          
          flakeA = flakes[i];
          flakeA.update();
          

          /*for (z = 0; z < flakes.length; z++) {
            flakeB = flakes[z];
            if (flakeA !== flakeB && distanceBetween(flakeA, flakeB) < 150) {          
              ctx.beginPath();
              ctx.moveTo(flakeA.x, flakeA.y);
              ctx.lineTo(flakeB.x, flakeB.y);
              ctx.strokeStyle = '#444444';
              ctx.stroke();
              ctx.closePath();
            }
          }*/

          
          ctx.beginPath();
          ctx.arc(flakeA.x, flakeA.y, flakeA.weight, 0, 2 * Math.PI, false);
          ctx.fillStyle = 'rgba(255, 255, 255, ' + flakeA.alpha + ')';
          ctx.fill();
          
          if (flakeA.y >= windowH) {
            flakeA.y = -flakeA.weight;
          }  
        }
        
        requestAnimationFrame(loop);
      }

      function randomBetween(min, max, round) {
        var num = Math.random() * (max - min + 1) + min;

        if (round) {
          return Math.floor(num);
        } else {
          return num;
        }
      }

      function distanceBetween(vector1, vector2) {
        var dx = vector2.x - vector1.x,
            dy = vector2.y - vector1.y;

        return Math.sqrt(dx*dx + dy*dy);
      }

      init();

})