<div id="filter-canvas" style="display:none">
  <div id="filter-canvas-btn" class="hover-zoom canvas-btn" style="" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterCanvas" aria-controls="filterCanvas">
    <i id="canvas-icon" class="fa fa-filter canvas-icon"></i>
  </div>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="filterCanvas" aria-labelledby="filterCanvasLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasRightLabel">@yield('canvas-title')</h5>
      <button type="button" class="fa fa-times" data-bs-dismiss="offcanvas" aria-label="Close" style="font-size:20px;"></button>
    </div>
    <div class="offcanvas-body">
      @yield('canvas-body')
    </div>
  </div>
</div>

<script>
  $(function (){
    document.getElementById("filter-canvas").style.display = 'block';
  })
</script>