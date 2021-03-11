@extends('layouts.index')
@section('title')
{{ trans('admin.addusers') }}
@stop
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('admin.adduser') }}</h4>
                           <a href="{{ route('admins.users.index') }}"> <span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('admin.userslist') }}</span>
                           </a>
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
                    <button class="btn btn-primary" id="save_btn">
                        <i class="la la-check-square-o"></i> {{ trans('admin.save') }}
                    </button>
                    <button type="button" class="btn btn-warning mr-1"
                            onclick="history.back();">
                        <i class="ft-x"></i> {{ trans('admin.back') }}
                    </button>
                </div>
        {!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection


@section('js')
    <script>

<script type="text/javascript">

    // Insert
    $(document).ready(function() {

        $('#save_btn').on('click', function(e) {

            e.stopPropagation();

          var name = $('#name').val();
          var user_name = $('#user_name').val();
          var email = $('#email').val();
          var password = $('#password').val();
          var confirmpassword = $('#confirmpassword').val();
          var phone = $('#phone').val();
          var img = $('#img').val();
          var code = $('#code').val();
          var notes = $('#notes').val();



          if(name!=""
            && user_name != ""
            && email != ""
            && phone != ""
            && code != ""
            && password != ""){
              $.ajax({
                  url: "{{route('admins.users.store')}}",
                  type: "POST",

                  data: {
                      _token:{{csrf_token()}},
                      name: name,
                      user_name: user_name,
                      email: email,
                      password: password,
                      confirmpassword: confirmpassword,
                      phone: phone,
                      img: img,
                      code: code,
                      notes: notes,
                  },
                  cache: false,
                   success: function(dataResult){
                      console.log(dataResult);
                      var dataResult = JSON.parse(dataResult);
                      if(dataResult.statusCode==200){
                        return dataResult;
                      }
                      else if(dataResult.statusCode==201){
                         alert("Error occured !");
                      }

                  }
              });
          }
          else{
            e.preventDefault();
              alert('Please fill all the field !');
          }
            });
    });

    </script>
@endsection
