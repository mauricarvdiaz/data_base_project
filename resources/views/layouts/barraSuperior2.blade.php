<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-hotel-tab" data-toggle="tab" href="#nav-hotel" role="tab" aria-controls="nav-hotel" aria-selected="true">Hotel</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-habitacion" role="tab" aria-controls="nav-habitacion" aria-selected="true">Habitacion</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="true">Vuelos</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-hotel" role="tabpanel" aria-labelledby="nav-hotel-tab">@yield('tabla_hotel')</div>
  <div class="tab-pane fade" id="nav-habitacion" role="tabpanel" aria-labelledby="nav-habitacion-tab">@yield('tabla_habitacion')</div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">chao</div>
</div>
