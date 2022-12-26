<button id="filter-canvas-btn" class="btn btn-secondary btn-floating position-fixed hover-zoom canvas-btn" style="top:50%;right:-50px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterCanvas" aria-controls="filterCanvas">
<i id="canvas-icon" class="bi bi-funnel" style="padding:10px;max-height:47px;"></i>
</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="filterCanvas" aria-labelledby="filterCanvasLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">@yield('canvas-title')</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    @yield('canvas-body')
  </div>
</div>