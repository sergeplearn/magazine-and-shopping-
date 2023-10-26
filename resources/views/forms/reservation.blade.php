<div class="form-outline mb-3">
    <input type="text" name="first_name" value="{{ old('first_name') ?? $event->first_name }}" id="form3Example1m" class="form-control form-control-lg @error('first_name') is-invalid @enderror " />
    <label class="form-label" for="form3Example1m">First name</label>
    @error('first_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
</div>
<div class="form-outline mb-3">
    <input type="text" name="second_name" value="{{ old('second_name') ?? $event->second_name  }}" id="form3Example1m" class="form-control form-control-lg @error('second_name') is-invalid @enderror " />
    <label class="form-label" for="form3Example1m">second name</label>
    @error('second_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
</div>

<div class="form-outline mb-3">
    <input type="tel" name="tell" value="{{ old('tell') ?? $event->tell  }}" id="form3Example1m" class="form-control form-control-lg @error('tell') is-invalid @enderror " />
    <label class="form-label" for="form3Example1m">phone number</label>

    @error('tell')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
</div>
<div class="form-outline mb-3">
    <input type="date" name="date" min="{{ $min_date->format('Y-m-d') }}" max="{{ $max_date->format('Y-m-d') }} " value="{{ old('date') ?? $event->date  }}" id="form3Example1m" class="form-control form-control-lg @error('date') is-invalid @enderror " />
    <label class="form-label" for="form3Example1m">date</label>
    @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
</div>

<div class="form-group mb-3">
<!-- still to correct this error in the data base --->
    <select class="form-control" name="timeinterval_id">
        @foreach($times as $times)

            <option value="{{ $times->id }}" {{ $event->timeinterval_id == $times->id ? 'selected' : '' }}> {{ $times->period }}  </option>
        @endforeach
    </select>

</div>

<div class="form-outline mb-3">
    <textarea type="text" name="message" id="form3Example1m" class="form-control form-control-lg @error('message') is-invalid @enderror "> {{ old('message') ?? $event->message  }} </textarea>
    <label class="form-label" for="form3Example1m">message</label>
    @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
</div>

