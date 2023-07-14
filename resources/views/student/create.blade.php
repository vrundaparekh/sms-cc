@extends('app')
@section('content')
<div class="container mt-3">
  <form autocomplete="off"  id="student-form" novalidate="novalidate"  enctype="multipart/form-data">
    @csrf
    <div class="row jumbotron box8">
      <div class="col-sm-9 mx-t3 mb-4">
        <h2 class="text-center text-info">Student Form</h2>
      </div>
      <div class="col-sm-3 mx-t3 mb-4">
        <a href="{{route('student.view')}}"><h6 class="text-center text-info">View Students</h6></a>
      </div>
      <div class="col-sm-6 form-group">
        <label for="rollno">Roll No.</label>
        <input type="text" class="form-control" name="rollno" id="rollno" placeholder="Enter Your Roll Number">
      </div>
      <div class="col-sm-6 form-group">
        <label for="name">Student Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
      </div>
      <div class="col-sm-6 form-group">
        <label for="parents_mobile_no">Parent's Mobile No.</label>
        <input type="text" class="form-control" name="parents_mobile_no" id="parents_mobile_no" placeholder="Enter Your Parent's mobile no.">
      </div>
      <div class="col-sm-6 form-group">
        <label for="class">Class</label>
        <input type="text" class="form-control" name="class" id="class" placeholder="Enter Your Class">
      </div>
     
      <div class="col-sm-6 form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="class" placeholder="Enter Your Password">
      </div>
      <div class="col-sm-6 form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email">
      </div>
      <div class="col-sm-6 form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Your Password">
      </div>
      <div class="col-sm-6 form-group">
        <label for="file">Upload Marksheet (only csv file)</label>
        <input type="file" class="form-control" name="file" id="file" placeholder="Upload Your Marksheet">
      </div>
      
      <div class="col-sm-12 form-group mb-0">
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
  jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please"); 
  $("#student-form").validate({
                rules: {
                  rollno: { required: true,digits: true },
                  name: { required: true, lettersonly: true },
                  parents_mobile_no: { required: true, digits:true },
                  class: { required: true },
                  email: { required: true },
                  password: {
                          required: true,
                          minlength: 5,
                      },
                  confirm_password: {
                          minlength: 5,
                          equalTo: '[name="password"]'
                      },
                  file: { required: true},

                },
                messages: {
                    rollno: { required: "The rollno field is required.", number: "Please enter numbers only." },
                    name: { required: "The name field is required.", lettersonly:"Please enter only string" },
                    parents_mobile_no: { required: "The parents contact no field is required.", number: "Please enter numbers only." },
                    class: { required: "The class field is required." },
                    email: { required: "The email field is required." },
                    password: {required: "The password field is required."},
                    file: { required: "The file is required." },
                },
                errorElement: 'span',
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                  var file_data = $('#file').prop('files')[0];
                  var form_data = new FormData($('#student-form')[0]);
                  form_data.append('files',file_data);
                  $.ajax({
                            type: "post",
                            url: "{{route('student.store')}}",
                            data: form_data,
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
                                                  window.location.href = "/";
                                              }, 3000);
                                  }
                              }
                          });
                }
            });




</script>
@endsection
@endsection