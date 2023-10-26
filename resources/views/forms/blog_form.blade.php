

<select class="form-select mb-3" name="category_id" aria-label="Default select example">

    @foreach($categorys as $category)

        <option value="{{ $category->id }}" {{ $postproduct->category_id == $category->id ? 'selected':'' }}>{{ $category->category_name }}</option>
    @endforeach
</select>



        <div class="form-group border-1 mb-3">
            <label for="validationCustom05" class="form-label">Title</label>
            <input type="text" name="title" value="{{  old('title') ?? $postproduct->title  }}" class=" @error('title') is-invalid @enderror form-control" id="validationCustom05" required />

            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>




        <div class="form-group  mb-3">
            <label for="validationCustom05" class="form-label">message</label>
            <textarea class="@error('body') is-invalid @enderror form-control" name="body" id="summernote"  placeholder="Required example textarea" required>
                {{ old('body') ?? $postproduct->body  }}
            </textarea>

            @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">

            <input type="file" name="image"  class="form-control"  />
        </div>


        <script>

            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder:'Hello world',
                    tabsize:2,
                    height:200,

                });
            });

        </script>











