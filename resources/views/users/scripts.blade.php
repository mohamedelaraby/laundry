@section('js')

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


@section('js')
<script type="text/javascript">

    // Insert
    $(document).ready(function() {

        $('#update_btn').on('click', function(e) {

        alert('update');

          var name = $('#name').val();
          var user_name = $('#user_name').val();
          var email = $('#email').val();
          var password = $('#password').val();
          var confirmpassword = $('#confirmpassword').val();
          var phone = $('#phone').val();
          var img = $('#img').val();
          var code = $('#code').val();
          var notes = $('#notes').val();


/*
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
          }*/
            });
    });

</script>
@endsection
