<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', isset($robot) ? $robot->name : null) }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

    <div class="col-md-6">
        <input id="weight" type="number" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight', isset($robot) ? $robot->weight : null) }}" required autofocus>

        @if ($errors->has('weight'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('weight') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="power" class="col-md-4 col-form-label text-md-right">{{ __('Power') }}</label>

    <div class="col-md-6">
        <input id="power" type="number" class="form-control{{ $errors->has('power') ? ' is-invalid' : '' }}" name="power" value="{{ old('power', isset($robot) ? $robot->power : null) }}" required autofocus>

        @if ($errors->has('power'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('power') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="speed" class="col-md-4 col-form-label text-md-right">{{ __('Speed') }}</label>

    <div class="col-md-6">
        <input id="speed" type="number" class="form-control{{ $errors->has('speed') ? ' is-invalid' : '' }}" name="speed" value="{{ old('speed', isset($robot) ? $robot->speed : null) }}" required autofocus>

        @if ($errors->has('speed'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('speed') }}</strong>
            </span>
        @endif
    </div>
</div>
