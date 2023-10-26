



<select class="form-select mb-3" name="shopcategory_id" aria-label="Default select example">
    
    @foreach($shop_category as $category)
        <option value="{{ $category->id }}" {{ $shopping->shopcategory_id == $category->id ? 'selected':'' }}>{{ $category->shop_category_name}}</option>
    @endforeach
</select>


    <div class="form-outline mb-3">
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="validationCustom05" value="{{old('title') ?? $shopping->title }}" required />
        <label for="validationCustom05" class="form-label">Title</label>
        @error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>



    <div class="form-outline mb-3">
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="validationCustom05" value="{{  old('price') ?? $shopping->price  }}" required />
        <label for="validationCustom05" class="form-label">price</label>
        @error('price')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>




    <div class="form-outline mb-3">
        <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="summernote" placeholder="Required example textarea" required>{{ old('message') ?? $shopping->message  }}</textarea>

        @error('message')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <input type="file" class="form-control"  name="image" />
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
