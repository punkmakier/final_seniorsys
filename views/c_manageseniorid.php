<div class="container p-5">
    <h3>Manage Senior ID</h3>

    <div class="panel">
    <div class="float-end d-none" id="loading">
        <div class="spinner-grow text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-danger" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-warning" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-light" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-dark" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
    </div>
       <h5 class="mb-3">Senior ID Request List</h5>
       <table class="table table-striped" id="myTable">
            <thead class="bg-dark text-white">
                <tr>
                    <td class="text-center">Complete Name</td>
                    <td class="text-center">Barangay</td>
                    <td class="text-center">Age</td>
                    <td class="text-center">Gender</td>
                    <td class="text-center">Senior ID</td>
                    <td class="text-center">Signature</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>

            <tbody>
            <?php $services->showRequestSeniorID();?>

            </tbody>
            
       </table>
   
    </div>
</div>

<!-- Approve Senior ID Date Pick Modal -->
<div class="modal fade" id="dateRange" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pick a date</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="datePickerSeniorID">
        <div class="form-group mt-4">
            <label for="exampleInputEmail1" class="form-label"><b>Date Release</b>&nbsp;<span style="color: red; font-weight: 600;">*</span></label><br>
            <input type="date" class="form-control" id="datePickerInput" name="dateReleaseSeniorID" required>
            <input type="hidden" class="form-control" id="idSelected" name="id_item_seniorIDReq" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 10px; ">Close</button>
        <button id="submitDate" type="button" class="btn btn-custom-default" style="width: 20%;">Submit</button>
      </div>
    </div>
    </form>
  </div>
</div>




<script>


$(".approveReqSeniorID").on('click',function(){
        id_item = $(this).attr('id');
        $("#idSelected").val(id_item);
        $("#dateRange").modal('show');

    })
$("#submitDate").click(function(){

  if($("#datePickerInput").val()==""){
          Swal.fire(
          'Warning',
          'Please pick a date.',
          'warning'
          )
        }

      
  else{
    var formData = $("#datePickerSeniorID").serialize()+"&approveSelectedSeniorID=approveSelectedSeniorID";

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want approve this request?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $("#dateRange").modal('hide');
            $("#loading").removeClass("d-none");
            $.ajax({
                type: "POST",
                url: "../Controller/AdminFunction.php",
                data: formData,
                success: function(response){
                    $("#loading").addClass("d-none");
                    if(response == "Success"){
                        Swal.fire({
                        title: 'Success!',
                        text: "Senior ID Request was Approved!",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                        })
                    }else{
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                            )
                    }
                    
                }
            })
        }
        })

  }
})


    $(".disapproveReqSeniorID").on('click',function(){
        id_item = $(this).attr('id');

        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want disapprove this request?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, disapprove it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $("#loading").removeClass("d-none");
            $.ajax({
                type: "POST",
                url: "../Controller/AdminFunction.php",
                data: {id_item_seniorIDReq : id_item,disapproveSelectedSeniorID : "disapproveSelectedSeniorID"},
                success: function(response){
                    $("#loading").addClass("d-none");
                    if(response == "Success"){
                        Swal.fire({
                        title: 'Success!',
                        text: "Senior ID Request was Dispproved!",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Okay'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                        })
                    }else{
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                            )
                    }
                    
                }
            })
        }
        })

    })




    
$('img.zoomable').click('click', function () {
  var img = $(this);
  var bigImg = $('<img />').css({
    'max-width': '100%',
    'max-height': '100%',
    'display': 'inline'
  });
  bigImg.attr({
    src: img.attr('src'),
    alt: img.attr('alt'),
    title: img.attr('title')
  });
  var over = $('<div />').text(' ').css({
    'height': '100%',
    'width': '100%',
    'background': 'rgba(0,0,0,.82)',
    'position': 'fixed',
    'top': 0,
    'left': 0,
    'opacity': 0.0,
    'cursor': 'pointer',
    'z-index': 9999,
    'text-align': 'center'
  }).append(bigImg).bind('click', function () {
    $(this).fadeOut(300, function () {
      $(this).remove();
    });
  }).insertAfter(this).animate({
    'opacity': 1
  }, 300);
});
</script>