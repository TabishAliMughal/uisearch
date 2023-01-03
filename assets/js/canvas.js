$('body').onmousemove = function(){
    var x = event.clientX;
    var y = event.clientY;
    if (x >= screen.width-30){
        if (document.getElementById('filter-canvas-btn')){
            document.getElementById('filter-canvas-btn').style.right = '-15px';
        }
    }else{
        document.getElementById('filter-canvas-btn').style.right = '-25px';
    }
}
if (document.getElementById('filter-canvas-btn')){
    document.getElementById('filter-canvas-btn').onmouseover = function () {
        document.getElementById('filter-canvas-btn').style.right = '-15px';
    }
    document.getElementById('filter-canvas-btn').onmouseout = function () {
        document.getElementById('filter-canvas-btn').style.right = '-25px';
    }
}