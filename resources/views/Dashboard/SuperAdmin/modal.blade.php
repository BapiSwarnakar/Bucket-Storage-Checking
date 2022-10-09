<!-- FORGET TPIN  MODAL -->
<div class="modal fade" id="tpin_forget" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle-2">FORGET TPIN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="send_otp" method="POST">
            @csrf
             <div class="form-row">
                    
                <div class="col-md-12 mb-3">
                    <label for="number">New Tpin</label>
                    <input type="password" name="new_tpin" id="new_tpin" class="form-control" placeholder="Set New Tpin" required maxlength="10">
                </div>
                <div class="col-md-12 d-flex justify-content-center  mt-4"><br>
                  <button class="btn btn-info" type="submit">Send OTP</button>
                </div>
            </div>
            </form>
            <form class="d-none" id="Tpin_Forget_form" method="POST">
              @csrf
             <div class="form-row">    
                <div class="col-md-12 mb-3">
                    <label for="number">Otp</label>
                    <input type="text" name="fotp" id="fotp" class="form-control" placeholder="Enter Otp"  maxlength="10">
                </div>
                <div class="col-md-12 d-flex justify-content-center  mt-4"><br>
                  <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- FORGET TPIN MODAL END-->