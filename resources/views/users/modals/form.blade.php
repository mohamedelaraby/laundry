<!-- Create modal -->
	<div class="modal" id="modaldemo8">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">{{ trans('admin.adduser') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">

                @include('layouts.include.message')

          {!! Form::open(['enctype' =>'multipart/form-data']) !!}

        
                    {{-- name --}}
                    <div class="form-group">
                    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                      {!! Form::label('name', trans('admin.user_name')) !!}
                      {!! Form::text('name',old('name'),
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
                      {!! Form::text('user_name',old('user_name'),
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
                      {!! Form::email('email',old('email'),
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
                      {!! Form::number('phone',old('name') ,
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
                      {!! Form::text('code',old('code'),
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
                      {!! Form::textarea('notes',old('notes'),
                                   [ 'class' =>'form-control',

                                    'placeholder' =>trans('admin.user_notes'),
                                    'auto-focus'=>'true',
                                    'id'=>'notes', ])
                      !!}
                    </div>
                </div>
				<div class="modal-footer">
					<button class="btn ripple btn-primary" type="submit" id="save_btn">{{ trans('admin.save') }}</button>
					<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{ trans('admin.close') }}</button>
				</div>
        {!! Form::close() !!}
			</div>
		</div>
	</div>


