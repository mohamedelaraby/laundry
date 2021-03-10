{{--  name  --}}
<div class="col-md-6">
    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}" >
        <label for="projectinput1"> {{ trans('admin.service_type_name') }} </label>
        <input type="text" value="" id="name"
               class="form-control"
               placeholder="{{ trans('admin.service_type_name') }}"
               name="name">
        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
    </div>
</div>

{{--  description  --}}
<div class="col-md-6">
    <div class="form-group {{$errors->has('description') ? 'has-error' : ''}}" >
        <label for="projectinput1"> {{ trans('admin.service_type_description') }} </label>
        <input type="text" value="" id="description"
               class="form-control"
               placeholder="{{ trans('admin.service_type_description') }}"
               name="description">
        <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>
    </div>
</div>

{{--  points  --}}
<div class="col-md-6">
    <div class="form-group {{$errors->has('points') ? 'has-error' : ''}}" >
        <label for="projectinput1"> {{ trans('admin.service_type_points') }} </label>
        <input type="text" value="" id="points"
               class="form-control"
               placeholder="{{ trans('admin.service_type_points') }}"
               name="points">
        <span class="text-danger">{{$errors->has('points') ? $errors->first('points') : ''}}</span>
    </div>
</div>

<hr><br>
{{--  prices  --}}
<div class="col-md-12">
    <div class="form-group {{$errors->has('prices') ? 'has-error' : ''}}" >
        <label for="projectinput1"> {{ trans('admin.service_type_prices') }} </label>
        <input type="text" value="" id="prices"
               class="form-control"
               placeholder="{{ trans('admin.service_type_prices') }}"
               name="prices">
        <span class="text-danger">{{$errors->has('prices') ? $errors->first('prices') : ''}}</span>
    </div>
</div>


