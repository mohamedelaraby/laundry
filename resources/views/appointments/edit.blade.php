@extends('layouts.index')
@section('title')
{{ trans('admin.appointments') }}
@stop
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('admin.edit') }}</h4>
              <span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('admin.appointments') }}</span>
						</div>

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<!-- Create modal -->
<section class="content">
    <div class="row">
	<div class="col-xl-12">
		<div class="card mg-b-20">
			<div class="card-header pb-0">

			</div>
			<div class="card-body">

            @include('layouts.include.message')

          {!! Form::open(['enctype' =>'multipart/form-data','method' => 'POST', 
                          'route' => ['admins.appointments.update',$appointment->id]]) !!}
          @include('appointments.form')

        <button class="btn btn-primary">
            <i class="la la-check-square-o"></i> {{ trans('admin.save') }}
        </button>
        <button type="submit" class="btn btn-warning mr-1"
                onclick="history.back();">
            <i class="ft-x"></i> {{ trans('admin.back') }}
        </button>

        {!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

