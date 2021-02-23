@extends('layouts.index')
@section('title')
{{ trans('admin.users') }}
@stop
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('admin.users') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('admin.userslist') }}</span>
						</div>

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

 <!-- Main content -->
 <section class="content">
    <div class="row">
	<div class="col-xl-12">
		@include('layouts.include.message')
		<div class="card mg-b-20">
			<div class="card-header pb-0">
				<div class="d-flex justify-content-between">
					<div class="col-sm-6 col-md-4 col-xl-4">
						<a class="modal-effect btn btn-primary" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">{{ trans('admin.adduser') }}</a>
					</div>
				</div>
			</div>
			<div class="card-body">
			
						
				<table class="table table-bordered" id="users-table">
					{!!$dataTable->table([
						'class' => 'datatable table table-bordered table-striped table-hover'
					  ],true)!!}
				</table>
						

			</div>
						</div>
					</div>
					<!--/div-->

	<!-- Basic modal -->
	@include('users.form')
		<!-- End Basic modal -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->


{{--   End Datatable --}}
@endsection
@push('scripts')

{!! $dataTable->scripts() !!}

@endpush

@include('users.scripts')
