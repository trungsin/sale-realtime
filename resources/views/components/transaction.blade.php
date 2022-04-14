</br>
<div class="row">
	<div class="col-md-12 text-center">
		<h3> {{$du_an->ten}}</h3>
	</div>
</div>
<div class="row" >
    <div class="col-md-12 transaction" id="transaction"></div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modal-transaction">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Giao Dịch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-dat-cho">
			{{ csrf_field() }}
			<input name="id" type="hidden" value="" class="id"/>
			  <div class="form-group row">
			    <label for="ma_lo" class="col-sm-4 col-form-label">Ma</label>
			    <div class="col-sm-8">
			      <input type="text" readonly class="form-control-plaintext ma_lo" value="">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="thong_tin" class="col-sm-4 col-form-label">Thong tin</label>
			    <div class="col-sm-8">
			      <input type="text" readonly class="form-control-plaintext thong_tin" value="">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="dien_tich" class="col-sm-4 col-form-label">Dien tich</label>
			    <div class="col-sm-8">
			      <input type="text" readonly class="form-control-plaintext dien_tich" value="">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="gia" class="col-sm-4 col-form-label">Giá</label>
			    <div class="col-sm-8">
			      <input type="text" readonly class="form-control-plaintext gia" value="">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="ho_ten_khach_hang_dat_cho" class="col-sm-4 col-form-label">Tên Khách Hàng</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control ho_ten_khach_hang_dat_cho" name="ho_ten_khach_hang_dat_cho" value="" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="so_cmnd_khach_hang_dat_cho" class="col-sm-4 col-form-label">CMND</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control so_cmnd_khach_hang_dat_cho" name="so_cmnd_khach_hang_dat_cho" value="" required>
			    </div>
			  </div>
		</form>

		<form id="form-dat-coc" enctype="multipart/form-data" method="POST" action="{{route('blocks.dat_coc')}}">
			{{ csrf_field() }}
			<input name="id" type="hidden" value="" class="id">
		  <div class="form-group row">
		    <label for="ma_lo" class="col-sm-3 col-form-label">Mã :</label>
		    <div class="col-sm-3">
		      <input type="text" readonly class="form-control-plaintext ma_lo" value="">
		    </div>

		    <label for="thong_tin" class="col-sm-3 col-form-label">Thông Tin :</label>
		    <div class="col-sm-3">
		      <input type="text" readonly class="form-control-plaintext thong_tin" value="">
		    </div>

		  </div>

		  <div class="form-group row">
		    <label for="dien_tich" class="col-sm-3 col-form-label">Diện Tích :</label>
		    <div class="col-sm-3">
		      <input type="text" readonly class="form-control-plaintext dien_tich" value="">
		    </div>

		    <label for="gia" class="col-sm-3 col-form-label">Giá :</label>
		    <div class="col-sm-3">
		      <input type="text" readonly class="form-control-plaintext gia" value="">
		    </div>
		  </div>
		  
		  <div class="form-group row">
		    <label for="id_user_dat_cho" class="col-sm-3 col-form-label">Nhân Viên Đặt :</label>
		    <div class="col-sm-3">
		      <input type="text" readonly class="form-control-plaintext id_user_dat_cho" value="">
		    </div>

		  </div>

		  <div class="form-group row">
		    <label for="ho_ten_khach_hang_dat_coc" class="col-sm-4 col-form-label">Tên Khách Hàng</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control ho_ten_khach_hang_dat_coc" name="ho_ten_khach_hang_dat_coc" value="" required>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="so_cmnd_khach_hang_dat_coc" class="col-sm-4 col-form-label">CMND</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control so_cmnd_khach_hang_dat_coc" name="so_cmnd_khach_hang_dat_coc" value="" required>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="anh_cmnd_truoc" class="col-sm-4 col-form-label">Ảnh Cmnd Trước</label>
		    <div class="col-sm-8">
		    	<input type="file" name="anh_cmnd_truoc" required>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="anh_cmnd_sau" class="col-sm-4 col-form-label">Ảnh Cmnd Sau</label>
		    <div class="col-sm-8">
		    	<input type="file" name="anh_cmnd_sau" required>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="anh_xac_nhan" class="col-sm-4 col-form-label">Ảnh Xác Nhận</label>
		    <div class="col-sm-8">
		    	<input type="file" name="anh_xac_nhan" required>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="coc" class="col-sm-4 col-form-label">Cọc</label>
		    <div class="col-sm-8">
		      <input type="number" class="form-control coc" name="coc" value="0" required>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="ghi_chu_dat_coc" class="col-sm-4 col-form-label">Ghi chú</label>
		    <div class="col-sm-8">
		      <textarea class="form-control ghi_chu_dat_coc" name="ghi_chu_dat_coc" rows="4"></textarea>
		    </div>
		  </div>
		</form>

		<form id="form-detail">
			{{ csrf_field() }}
			<input name="id" type="hidden" value="" class="id">
		  <div class="form-group row">
		    <label for="ma_lo" class="col-sm-4 col-form-label">Mã</label>
		    <div class="col-sm-8">
		      <input type="text" readonly class="form-control-plaintext ma_lo" value="">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="thong_tin" class="col-sm-4 col-form-label">Thông Tin</label>
		    <div class="col-sm-8">
		      <input type="text" readonly class="form-control-plaintext thong_tin" value="">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="dien_tich" class="col-sm-4 col-form-label">Diện Tích</label>
		    <div class="col-sm-8">
		      <input type="text" readonly class="form-control-plaintext dien_tich" value="">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="gia" class="col-sm-4 col-form-label">Giá</label>
		    <div class="col-sm-8">
		      <input type="text" readonly class="form-control-plaintext gia" value="">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="ho_ten_khach_hang_dat_coc" class="col-sm-4 col-form-label">Tên Khách Hàng</label>
		    <div class="col-sm-8">
		      <input type="text" readonly class="form-control-plaintext ho_ten_khach_hang_dat_coc" value="">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="so_cmnd_khach_hang_dat_coc" class="col-sm-4 col-form-label">CMND</label>
		    <div class="col-sm-8">
		      <input type="text" readonly class="form-control-plaintext so_cmnd_khach_hang_dat_coc" value="">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="coc" class="col-sm-4 col-form-label">Cọc</label>
		    <div class="col-sm-8">
		      <input type="number" readonly class="form-control-plaintext coc" value="0">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-4">
		      <img src="" class="img-thumbnail img_cmnd_truoc">
		    </div>
		    <div class="col-sm-4">
		      <img src="" class="img-thumbnail img_cmnd_sau" >
		    </div>
		    <div class="col-sm-4">
		      <img src="" class="img-thumbnail img_xac_nhan">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="ghi_chu_dat_coc" class="col-sm-4 col-form-label">Ghi Chú</label>
		    <div class="col-sm-8">
		      <textarea class="form-control ghi_chu_dat_coc" name="ghi_chu_dat_coc" rows="4" readonly class="form-control-plaintext"></textarea>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="id_user_coc" class="col-sm-4 col-form-label">Nhân Viên Coc :</label>
		    <div class="col-sm-8">
		      <input type="text" readonly class="form-control-plaintext id_user_coc" value="">
		    </div>
		  </div>
		</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-coc">Đăt Cọc</button>
        <button type="button" class="btn btn-primary" id="btn-cho">Đặt Chỗ</button>
        <button type="button" class="btn btn-primary" id="btn-huy-coc">Huỷ Cọc</button>
        @if(auth()->user()->chuc_vu == 1)
        	<button type="button" class="btn btn-primary" id="btn-confirm-coc">Xác Nhận Cọc</button>
        @endif
      </div>
    	<div class="load">
	  		<div class="loader"></div>
	  	</div>
    </div>
  </div>
  
</div>
