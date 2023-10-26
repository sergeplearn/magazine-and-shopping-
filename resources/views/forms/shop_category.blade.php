<input type="text" name="shop_category_name" value="{{ old('shop_category_name') ?? $shop_category->shop_category_name }}" class="form-control @error('shop_category_name') is-invalid @enderror" placeholder="enter category">
@error('shop_category_name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="my-3">
    <input type="file" class="form-control"  name="image_path" />
</div>
