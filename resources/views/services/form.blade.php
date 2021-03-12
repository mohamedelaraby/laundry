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
    {{--  <div class="form-group">
        <label for="exampleFormControlSelect1">{{ trans('admin.service_type') }}</label>
        <select class="form-control" id="">
            @foreach($service->types() as $type)
          <option>{{ $type }}</option>
          @endforeach
        </select>
      </div>  --}}

    {{--  Min time  --}}
    <div class="col-md-6">
        <div class="form-group {{$errors->has('min_time') ? 'has-error' : ''}}" >
            <label for="projectinput1"> {{ trans('admin.service_min_time') }} </label>
            <input type="text" value="" id="name"
                   class="form-control"
                   placeholder="{{ trans('admin.service_min_time') }}"
                   name="min_time">
            <span class="text-danger">{{$errors->has('min_time') ? $errors->first('min_time') : ''}}</span>
        </div>
    </div>

    {{--  Services Types  --}}
    <div class="col-md-6">
        <div class="form-group {{$errors->has('servicetype') ? 'has-error' : ''}}" >
            <hr>
            <label for="projectinput1"> {{ trans('admin.service_types') }} </label>
            <div class="d-flex justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <a class="modal-effect btn btn-primary" data-effect="effect-scale" data-toggle="modal" href="#addservicetype">{{ trans('admin.addservicetype') }}</a>
                </div>
            </div>

            <span class="text-danger">{{$errors->has('servicetype') ? $errors->first('servicetype') : ''}}</span>
        </div>
    </div>

    {{--  Max time  --}}
    <div class="col-md-6">
        <div class="form-group {{$errors->has('max_time') ? 'has-error' : ''}}" >
            <label for="projectinput1"> {{ trans('admin.service_max_time') }} </label>
            <input type="text" value="" id="name"
                   class="form-control"
                   placeholder="{{ trans('admin.service_max_time') }}"
                   name="max_time">
            <span class="text-danger">{{$errors->has('max_time') ? $errors->first('max_time') : ''}}</span>
        </div>
    </div>


</div>


</div>




<!-- Create modal -->
	<div class="modal" id="addservicetype">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">{{ trans('admin.addservicetype') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">

                @include('layouts.include.message')
                <form id="addservicetype">
                    <div class="row">
                        @include('servicetypes.form')
                    </div>
                </form>
                </div>
				<div class="modal-footer">
					<button class="btn ripple btn-primary" type="submit" id="save_btn">{{ trans('admin.save') }}</button>
					<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{ trans('admin.close') }}</button>
				</div>
        {!! Form::close() !!}
			</div>
		</div>
	</div>
