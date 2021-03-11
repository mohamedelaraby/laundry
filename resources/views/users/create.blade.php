@extends('layouts.index')
@section('title')
{{ trans('admin.addusers') }}
@stop
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('admin.addusers') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('admin.userslist') }}</span>
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
		@include('layouts.include.message')
		<div class="card mg-b-20">
			<div class="card-header pb-0">

			</div>
			<div class="card-body">

            @include('layouts.include.message')

          {!! Form::open(['enctype' =>'multipart/form-data']) !!}

                @include('users.form')

                <div class="form-actions">
                    <button type="button" class="btn btn-warning mr-1"
                            onclick="history.back();">
                        <i class="ft-x"></i> {{ trans('admin.back') }}
                    </button>
                    <button class="btn btn-primary" id="save_btn">
                        <i class="la la-check-square-o"></i> {{ trans('admin.update') }}
                    </button>
                </div>
        {!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection


@section('js')
    @include('users.scripts')
@endsection
