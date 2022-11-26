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




<script>


$(".approveReqSeniorID").on('click',function(){
        id_item = $(this).attr('id');

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
            $("#loading").removeClass("d-none");
            $.ajax({
                type: "POST",
                url: "../Controller/AdminFunction.php",
                data: {id_item_seniorIDReq : id_item,approveSelectedSeniorID : "approveSelectedSeniorID"},
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