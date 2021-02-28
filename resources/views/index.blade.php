@extends('layouts.master')

@section('title')
    {{ trans('admin.users') }}
@endsection

@section('content')
    <table class="table table-bordered" id="users-table">
        {!!$dataTable->table([
            'class' => 'datatable table table-bordered table-striped table-hover'
          ],true)!!}
    </table>
@stop

@push('scripts')

 {!! $dataTable->scripts() !!}

@endpush
