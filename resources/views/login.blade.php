@extends('app')
@section('content')
<div class="container mt-3">
  <form autocomplete="off"  id="login-form" novalidate="novalidate" >
    @csrf
    <div class="row jumbotron box8 d-block">
      <div class="col-md-6 mx-t3 mb-4">
        <h2 class="text-center text-info">Login</h2>
      </div>
      <div class="col-md-6 form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email">
      </div>
      <div class="col-md-6 form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="class" placeholder="Enter Your Password">
      </div>
      
      <div class="col-md-6 form-group mb-0">
        <button class="btn btn-primary float-right" >Submit</button>
      </div>

    </div>
  </form>
</div>
@section('script')
<script>
  var token = '{{ csrf_token() }}';
 
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $("#login-form").validate({
                rules: {
                  email: { required: true },
                  password: {
                          required: true,
                      }
                },
                messages: {
                    email: { required: "The email field is required." },
                    password: {required: "The password field is required."}
                },
                errorElement: 'span',
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                  $.ajax({
                            type: "post",
                            url: "{{route('login-attempt')}}",
                            data: $('#login-form')[0],
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            statusCode:{
                                422:function(xhr){
                                    $.each(xhr.responseJSON.error, function (k, v) { 
                                        $.toast({
                                                heading: 'error',
                                                text : v ,
                                                position: 'top-right',
                                                icon: 'error',
                                                position: {
                                                    right: 10,
                                                    top: 90
                                                }
                                            });
                                        
                                  });
                                    
                                },
                                200:function(xhr){
                                    $.toast({
                                            heading: 'success',
                                              text : xhr.message,
                                              position: 'top-right',
                                              icon: 'success',
                                              position: {
                                                  right: 10,
                                                  top: 90
                                              }
                                          });
                                          setTimeout(function(){
                                                  window.location.href = "/view";
                                              }, 3000);
                                  }
                              }
                          });
                }
            });




</script>
@endsection
@endsection