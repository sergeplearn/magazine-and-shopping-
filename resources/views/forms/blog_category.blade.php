<input type="text"  name="category_name" value="{{ old('category_name') ?? $category->category_name }}" class="form-control  @error('category_name') is-invalid @enderror" placeholder="enter category">
@error('category_name')
<div  class="alert alert-danger">{{ $message }}</div>
@enderror

<input type="file"  name="image"  class="form-control my-3" >


<script>


$("#success-alert").fadeTo(5000, 200).slideUp(500, function(){
$("#success-alert").slideUp(500);
});
</script>
