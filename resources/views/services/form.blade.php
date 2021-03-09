{{ csrf_field() }}
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}" >
            <label for="projectinput1"> {{ trans('admin.service_name') }} </label>
            <input type="text" value="{{ old('name') ?? $service->name }}" id="name"
                   class="form-control"
                   placeholder=" {{ trans('admin.service_name') }}"
                   name="name">
                   <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
        </div>
    </div>

    {{--  Min_Time  --}}
    <div class="form-group">
        <label for="exampleFormControlSelect1">{{ trans('admin.service_type') }}</label>
        <select class="form-control" id="">
            @foreach($service->types() as $type)
          <option>{{ $type }}</option>
          @endforeach
        </select>
      </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('servicetype') ? 'has-error' : ''}}" >
            <label for="projectinput1"> {{ trans('admin.service_type') }} </label>
            <input type="text" value="" id="name"
                   class="form-control"
                   placeholder="{{ trans('admin.service_type') }}"
                   name="servicetype">
            <span class="text-danger">{{$errors->has('servicetype') ? $errors->first('servicetype') : ''}}</span>
        </div>
    </div>
</div>





</div>
