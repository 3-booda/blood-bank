<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">
          {{-- <h1 class="m-0">Dashboard</h1> --}}
          <h1 class="m-0">{{ $header }}</h1>
        </div>

      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        {{ $slot }}
      </div>
    </div>
  </section>

</div>
