document.getElementById('body').onmousemove = function(){
    var x = event.clientX;
    var y = event.clientY;
    if (x >= 1430){
        if (document.getElementById('filter-canvas-btn')){
            document.getElementById('filter-canvas-btn').style.right = '0px';
        }
    }else{
        // document.getElementById('filter-canvas-btn').style.right = '-30px';
        // document.getElementById('message-canvas-btn').style.right = '-30px';
    }
}
if (document.getElementById('filter-canvas-btn')){
    document.getElementById('filter-canvas-btn').onmouseover = function () {
        document.getElementById('filter-canvas-btn').style.right = '0px';
    }
    document.getElementById('filter-canvas-btn').onmouseout = function () {
        document.getElementById('filter-canvas-btn').style.right = '-50px';
    }
}