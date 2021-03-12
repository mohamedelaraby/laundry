@extends('layouts.master')

@section('page-header')
				@yield('page-header')
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">
				<div class="col-xl-12">
				@include('layouts.include.message')
					@yield('content')
				</div>
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection


