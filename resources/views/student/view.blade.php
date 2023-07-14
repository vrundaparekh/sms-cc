@extends('app')
   
     


@section('content')
                <table class="table patient-table datatable" id="studentTable">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>RollNo.</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Contact No.</th>
                            <th>Percentage</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"> 
                    </tbody>
                </table>
           

@section('script')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $.ajax({
            type: "GET",
            url: url+"/api/get-all-students",
            // dataType: "dataType",
            success: function (response) {
                var html = "";
                $.each(response.data,function(k,v) {
                    html += `<tr id="student${v.id}">
                                <td>${k+1}</td>
                                <td>${v.rollno}</td>
                                <td>${v.name}</td>
                                <td>${v.parents_mobile_no}</td>
                                <td>${v.class}</td>
                                <td>${v.student_marks[0].percentage ?? "N/A"}</td>
                                <td>${v.student_marks[0].grade ?? "N/A"}</td>
                            </tr>`;
                            
                });
                
                var table = `<tbody>
                                ${html}
                            </tbody>`;
                $('#studentTable').append(html);
                $('#studentTable').DataTable({"searching":false, "paging":true, "order": [[ 0, "asc" ]], "lengthChange": false, "bDestroy": true});
            }
        });

        // $(document).on("click",".status-companies",function(e){
          
        //     e.preventDefault();
        //     var id = $(this).attr('data-id');
        //     var status = $(this).attr('data-status');
        //     var addclass = "";
        //     var removeClass = "";
        //     var text = "";
        //     var v = "";
        //     if(status == 0){
        //          addclasss = "btn-danger";
        //          removeclasss = "btn-success";
        //          text = "Deactive";
        //          v = 1;
        //     }
        //     else{
        //         addclasss ="btn-success";
        //         removeclasss ="btn-danger";
        //         text = "Active";
        //         v = 0;
        //     }
        //     $.ajax({
        //         type: "get",
        //         url: "/api/admin/insurance-companies/update-status/"+id,
        //         data: {status},
        //         dataType: "json",
        //         statusCode:{
        //             422:function(xhr){
        //                 // var error = xhr.responseJSON;
                        
        //             },
        //             200:function(xhr){
        //                 $('#company_'+id + ' .status-companies').removeClass(removeclasss).addClass(addclasss).text(text).attr("data-status",v);
        //                 $.toast({
        //                         heading: 'success',
        //                         text : xhr.message,
        //                         position: 'top-right',
        //                         icon: 'success',
        //                         position: {
        //                             right: 10,
        //                             top: 90
        //                         }
        //                     });
        //                 // window.location.href = "/leaflets";
        //             }
        //         }
        //     });
        // });
        
	var csrfToken = "{!! csrf_token() !!}";
    </script>
@endsection      
@endsection      
