

<div class="form-group pb-3">
    <input type="time" name="start_time" class="form-control  @error('start_time') is-invalid @enderror" placeholder="start time" value="{{ old('start_time') ?? $timeinterval->start_time }}">

    @error('start_time')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

</div>
<div class="form-group pb-3">
    <input type="time" name="end_time" class="form-control  @error('end_time') is-invalid @enderror" placeholder="end time" value="{{ old('end_time') ?? $timeinterval->end_time ?? old('end_time') }}">

    @error('end_time')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

</div>



