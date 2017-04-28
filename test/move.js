function move(hi) {
        var one =1;
        var zero =0;
        //var elem = document.getElementById("myBar");
        var width = 10;
        //var id = setInterval(frame, 10);
        //function frame() {
        if ((hi == 0) || (width >= 100)) {
            //clearInterval(id);
            return 1;
        } else if(hi == 1) {
            width = width + 10;
            //elem.style.width = width + '%';
            //elem.innerHTML = width * 1 + '%';
            return 0;
        }
    }
       
