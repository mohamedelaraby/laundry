@extends('layouts.index')
@section('title')
{{ trans('admin.users') }}
@stop
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('admin.edit_users') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('admin.userslist') }}</span>
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

                    
                    {{-- name --}}
                    <div class="form-group">
                    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                      {!! Form::label('name', trans('admin.user_name')) !!}
                      {!! Form::text('name',$user->name,
                                   [ 'class' =>'form-control',
                                    // 'required' =>true,
                                    'placeholder' =>trans('admin.user_name'),
                                    'auto-focus'=>'true',
                                    'id'=>'name', ])
                      !!}
                      <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>

                    </div>

                    {{-- user_name --}}
                    <div class="form-group">
                      <div class="form-group {{$errors->has('user_name') ? 'has-error' : ''}}">

                      {!! Form::label('user_name', trans('admin.user_name')) !!}
                      {!! Form::text('user_name',$user->user_name,
                                   [ 'class' =>'form-control',
                                    // 'required' =>true,
                                    'placeholder' =>trans('admin.user_name'),
                                    'auto-focus'=>'true',
                                    'id'=>'user_name', ])
                      !!}
                      <span class="text-danger">{{$errors->has('user_name') ? $errors->first('user_name') : ''}}</span>

                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                      <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                      {!! Form::label('email', trans('admin.email')) !!}
                      {!! Form::email('email',$user->email,
                                   [ 'class' =>'form-control',
                                    // 'required' =>true,
                                    'placeholder' =>trans('admin.user_email'),
                                    'auto-focus'=>'true',
                                    'id'=>'email', ])
                      !!}
                      <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>

                    </div>

                    {{-- password --}}
                    <div class="form-group">
                      <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                      {!! Form::label('password', trans('admin.user_password')) !!}
                      {!! Form::password('password',
                                   [ 'class' =>'form-control',
                                    // 'required' =>true,
                                    'placeholder' =>trans('admin.user_password'),
                                    'auto-focus'=>'true',
                                    'id'=>'password', ])
                      !!}
                    <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                    </div>

                    {{-- confirm password --}}
                    <div class="form-group">
                      {!! Form::label('confirmpassword', trans('admin.user_confirmpassword')) !!}
                      {!! Form::password('confirmpassword',
                                   [ 'class' =>'form-control',
                                    // 'required' =>true,
                                    'placeholder' =>trans('admin.user_confirmpassword'),
                                    'auto-focus'=>'true',
                                    'auto-autocomplete'=>'new-password',
                                    'id'=>'confirmpassword',
                                     ])
                      !!}
                    </div>

                    {{-- phone --}}
                    <div class="form-group">
                      <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                      {!! Form::label('phone', trans('admin.user_phone')) !!}
                      {!! Form::text('phone',$user->phone ,
                                   [ 'class' =>'form-control',
                                    // 'required' =>true,
                                    'placeholder' =>trans('admin.user_phone'),
                                    'auto-focus'=>'true',
                                    'id'=>'phone', ])
                      !!}
                        <span class="text-danger">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                        <div id="logo-output" class="mb-3"></div>
                    </div>

                    {{-- img --}}
                    <div class="form-group">
                      <div class="form-group {{$errors->has('img') ? 'has-error' : ''}}">
                      {!! Form::label('img', trans('admin.user_img')) !!}
                      {!! Form::file('img',
                                   [ 'class' =>'form-control',
                                    'auto-focus'=>'true',
                                    'id'=>'img' ])
                      !!}
                      <span class="text-danger">{{$errors->has('img') ? $errors->first('img') : ''}}</span>

                    </div>

                    {{-- code --}}
                    <div class="form-group">
                      <div class="form-group {{$errors->has('code') ? 'has-error' : ''}}">
                      {!! Form::label('code', trans('admin.user_code')) !!}
                      {!! Form::text('code',$user->code,
                                   [ 'class' =>'form-control',
                                    // 'required' =>true,
                                    'placeholder' =>trans('admin.user_code'),
                                    'auto-focus'=>'true',
                                    'id'=>'code', ])
                      !!}
                      <span class="text-danger">{{$errors->has('code') ? $errors->first('code') : ''}}</span>
                      <div id="logo-output" class="mb-3"></div>
                    </div>

                    {{-- notes --}}
                    <div class="form-group">
                      {!! Form::label('notes', trans('admin.user_notes')) !!}
                      {!! Form::textarea('notes',$user->notes,
                                   [ 'class' =>'form-control',

                                    'placeholder' =>trans('admin.user_notes'),
                                    'auto-focus'=>'true',
                                    'id'=>'notes', ])
                      !!}
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-warning mr-1"
                            onclick="history.back();">
                        <i class="ft-x"></i> {{ trans('admin.back') }}
                    </button>
                    <button class="btn btn-primary" id="update_btn">
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