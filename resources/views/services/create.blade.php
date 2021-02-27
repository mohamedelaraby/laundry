@extends('admin.index')

@section('content')

 <!-- Main content -->
 <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">

          {{-- @include('admin.layouts.message')  --}}

          <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            {!! Form::open(['route'=>'admin.store']) !!}
           @inlcude('admin.admins.form')
            {!! Form::submit(trans('admin.create_admin'), ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->


@endsection
