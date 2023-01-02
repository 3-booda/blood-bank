{{-- <div class="wrapper">
  <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
    <img class="animation__shake" src="{{ asset('dashboard/img/AdminLTELogo.png') }}" alt="AdminLTELogo" style="display: none;" width="60" height="60">
  </div>
</div> --}}
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div>

      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        {{ $slot }}
      </div>
    </div>
  </div>

</div>
