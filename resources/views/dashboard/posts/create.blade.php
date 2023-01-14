<x-dashboard.layouts title="Home" header="Add Posts">

  <div class="col-12">
    <div class="card card-primary">

      <form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">

          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id">
              <option>select</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
            @error('category_id')
              <span class="text-danger font-weight-bold">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input
              type="text"
              name="title"
              class="form-control"
              id="exampleInputEmail1"
              placeholder="Enter email"
            >
            @error('title')
              <span class="text-danger font-weight-bold">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label>Textarea</label>
            <textarea
              name="content"
              class="form-control"
              rows="3"
              placeholder="Enter ...">
            </textarea>
            @error('content')
              <span class="text-danger font-weight-bold">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputFile">Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input
                  type="file"
                  name="image"
                  class="custom-file-input image"
                  id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>

              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>

            <div class="d-flex justify-content-center mt-1">
              <img class="image-preview mw-100">
            </div>

            @error('image')
              <span class="text-danger font-weight-bold">{{ $message }}</span>
            @enderror
          </div>

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>

    </div>
  </div>

  <x-slot:scripts>
    <script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>
    <script>
      $(function() {
        bsCustomFileInput.init();
      });

      // // image preview
      $(".image").change(function() {
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('.image-preview').attr('src', e.target.result);
          }
          reader.readAsDataURL(this.files[0]);
        }
      });
    </script>
  </x-slot:scripts>
</x-dashboard.layouts>
