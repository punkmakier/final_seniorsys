<div class="container p-5">
    <h3>Manage Senior Citizen</h3>


    <form action="" id="selectedUserSrCitizenForm">
        <input type="hidden" id="selectedUserSrCitizen" name="selectedUserSrCitizen">
    </form>

    <div class="panel">
       <h5 class="mb-3">Senior Citizen List</h5>
       <table class="table table-striped" id="myTable">
            <thead class="bg-dark text-white">
                <tr>
                    <td class="text-center">Complete Name</td>
                    <td class="text-center">Barangay</td>
                    <td class="text-center">Age</td>
                    <td class="text-center">Gender</td>
                    <td class="text-center">Account Status</td>
                    <td class="text-center">Birth Month</td>
                    <td class="text-center">Pensioner Status</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>

            <tbody>
             <?php $showDataSeniorRequest->showAllSeniorAccount();?>
                
            </tbody>
            
       </table>
   
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="viewSrModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="TitlePage">Basic Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      
    


      <div id="EmergencyContact"  class="d-none">
        <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>First Name</b></label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Middle Name</b></label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Last Name</b></label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>
            </div>

            <div class="row">
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Address</b></label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Cellphone Number</b></label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"><b>Last Update</b></label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Next</button>
            </div>
      </div>


    </div>
  </div>
</div>





<script>


    $(".viewSelectedSr").on('click',function(){
            id_item = $(this).attr('id');

            $.ajax({
                type: "POST",
                url: "../Controller/AdminFunction.php",
                data: {id_per_item:id_item, action: "viewSrCitizenInfo"},
                success:function(response){
                    $(".modal-body").html(response);

                    $(".toPartnerInfo").click(function(){

                        $("#TitlePage").text("Partner Information");
                        $("div#BasicInfo").css("display","none");
                        $("div#PartnerInfo").css("display","block");

                    })

                    $(".backToBasicInfo").click(function(){
                        $("#TitlePage").text("Basic Information");
                        $("div#BasicInfo").css("display","block");
                        $("div#PartnerInfo").css("display","none");
                    })

                    $(".toHealthIssue").click(function(){
                        $("#TitlePage").text("Health Issue");
                        $("div#HealthIssue").css("display","block");
                        $("div#PartnerInfo").css("display","none");

                    })

                    $(".backToPartnerInfo").click(function(){
                        $("#TitlePage").text("Partner Information");
                        $("div#HealthIssue").css("display","none");
                        $("div#PartnerInfo").css("display","block");
                    })

                    $(".toEmergency").click(function(){
                        $("#TitlePage").text("Emergency Contact");
                        $("div#HealthIssue").css("display","none");
                        $("div#EmergencyContact").css("display","block");

                    })

                    $(".backToHealthIssue").click(function(){
                        $("#TitlePage").text("Health Issue");
                        $("div#EmergencyContact").css("display","none");
                        $("div#HealthIssue").css("display","block");
                    })

                    
                }
            })

            $("#viewSrModal").modal("show");

        })


    













    $(".deleteThisSrCitizenAcct").on('click',function(){
        id_item = $(this).attr('id');

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "../Controller/AdminFunction.php",
                data: {id_item_select : id_item,deleteSrSelected : "deleteSrSelected"},
                success: function(response){
                    Swal.fire({
                    title: 'Success',
                    text: "Account has been deleted!",
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
                }
            })
        }
        })

    })
</script>


