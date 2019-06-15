   <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center shadow ftco-cs" data-toggle="modal" data-target="#mySearch">
              <div class="d-flex justify-content-center"><div class="icon"><img src="images/timmon.png" width="40%" alt="" style="padding-top: 10px"></div></div>
              <div class="media-body p-2"><hr>
                <h3 class="heading mb-3">-- Tìm món --</h3>
                <!-- <button type="button" class="btn btn-secondary heading mb-3" data-html="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="tìm kiếm nèeeeeeeeeeeeeeeeeeeeeeeeee
                eeeeeeeeeeeeeeee <br> <input type='text' class='form-control'>">
  -- Ưu đãi khủng --
</button> -->
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate" onclick="window.location.href='<?php echo SITE_URL ?>do-an-1';">
            <div class="media block-6 services d-block text-center shadow ftco-cs">
              <div class="d-flex justify-content-center"><div class="icon"><img src="images/monan.png" width="50%" alt="" style="padding-top: 10px"></div></div>
              <div class="media-body p-2"><hr>
                <h3 class="heading mb-3">-- Đồ ăn --</h3>
              </div>
            </div>      
          </div>
           <div class="col-md-3 d-flex align-self-stretch ftco-animate" onclick="window.location.href='<?php echo SITE_URL ?>do-uong-2';">
            <div class="media block-6 services d-block text-center shadow ftco-cs">
              <div class="d-flex justify-content-center"><div class="icon"><img src="images/trasua.png" width="30%" alt="" style="padding-top: 10px"></div></div>
              <div class="media-body p-2"><hr>
                <h3 class="heading mb-3"> -- Đồ uống --</h3>
              </div>
            </div>      
          </div>

          <div class="col-md-3 d-flex align-self-stretch ftco-animate" onclick="window.location.href='<?php echo SITE_URL ?>tin-tuc';">>
            <div class="media block-6 services d-block text-center shadow ftco-cs">
              <div class="d-flex justify-content-center"><div class="icon"><img src="images/uudai.png" width="50%" alt="" style="padding-top: 10px"></div></div>
              <div class="media-body p-2"><hr>
                <h3 class="heading mb-3">-- Tin tức --</h3>
              </div>
            </div>    
          </div>
         
          
        </div>
      </div>
    </section>

    <!-- The Modal -->
<div class="modal fade" id="mySearch">
<div class="modal-dialog">
  <div class="modal-content">

    <!-- Modal body -->
    <div class="modal-body">
     <form>
       <div class="form-group">
         <label>Tìm nhanh món ăn:</label>
         <input type="text" name="valueSearch" class="form-control shadow" id="valueSearch" placeholder="Nhập tên món.." style="border-radius: 10px;">
       </div>
       <div id="resultSearch"></div>
     </form>
    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
    </div>

  </div>
</div>
</div>