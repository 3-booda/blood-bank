<x-dashboard.layouts title="Posts" header="List Posts">
  <x-slot:css>
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
    <style>
      .fa-edit:hover,
      .fa-trash:hover {
        filter: brightness(150%)
      }
    </style>
  </x-slot:css>

  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width: 5%">#</th>
              <th style="width: 15%">Category</th>
              <th style="width: 20%">title</th>
              <th>content</th>
              <th style="width:15%">image</th>
              <th style="width: 10%">Actions</th>
            </tr>
          </thead>
          <tbody>
            @php
              $lastNumber = ($posts->currentPage() - 1) * $posts->perPage();
            @endphp
            @foreach ($posts as $index => $post)
              <tr>
                <td class="text-center">{{ $loop->iteration + $lastNumber }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td class="d-flex justify-content-center">
                  <img class="img-thumbnail" id="image"
                    style="height: 100px"
                    src="{{ $post->image_url }}"
                    alt=""
                  >
                </td>
                <td class="text-center align-middle">

                  <a href="{{ route('dashboard.posts.edit', $post->id) }}">
                    <i class="fas fa-edit text-blue fa-lg">
                    </i>
                  </a>

                  &emsp;

                  <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="post" onclick="submit()"
                    role="button" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <i class="fas fa-trash text-red fa-lg">
                    </i>
                  </form>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div style="margin-top: 1rem">
          {{ $posts->links() }}
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>

  <x-slot:scripts>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/datatables/buttons.bootstrap4.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "info": false, // hide info
          "paginate": false, //hide pagination
          buttons: [{
            text: 'Add Post',
            attr: {
              style: 'background: #335476; border-color: #304e6d'
            },
            action: function() {
              window.location.href = '/dashboard/posts/create'
            }
          }]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
    </script>
  </x-slot:scripts>
</x-dashboard.layouts>
