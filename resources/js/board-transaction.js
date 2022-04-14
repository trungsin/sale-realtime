const $document = $(document);
const host = window.location.origin;
$document.ready(function() {
    loadTransaction();
    setInterval(() => {
	  loadTransaction(); 
	}, 700);

});
$document.on('click', '.lock-doing', e => {
    e.preventDefault();
    var id_block = $(`#${e.currentTarget.id}`).data('block');
	var ajaxUrl = `${host}/api/blocks/${id_block}`;
	// form
	$('#form-detail').hide();
	$('#form-dat-coc').hide();
	$("#form-dat-coc")[0].reset();
	$('#form-dat-cho').hide();
	$('#form-dat-cho')[0].reset();
	// btn
	$('#btn-coc').hide();
	$('#btn-cho').hide();
	$('#btn-huy-coc').hide();
	if(typeof $('#btn-confirm-coc') != 'undefined')
		$('#btn-confirm-coc').hide();

	$('#modal-transaction .load').show();
	$('#modal-transaction').modal('show');
	$.getJSON(ajaxUrl)
    .done(result => {
        if(result.success == true){
        	var data = result.data;
		    for (const [key, value] of Object.entries(data)) {
				if(typeof $(`#modal-transaction .${key}`) !== 'undefined' && data != null){
					if(key == "img_cmnd_truoc" || key == "img_cmnd_sau" || key == "img_xac_nhan")
						$(`#modal-transaction #form-detail .${key}`).attr('src',(`${host}/${value}`));
					else
						$(`#modal-transaction .${key}`).val(value);
				}
			}
		    switch(data.tinh_trang) {
				case "con":
					$('#form-dat-cho').show();
					$('#btn-cho').show();
				break;
				case "booking":
					$('#form-dat-coc').show();
					if(data.dat_coc)
						$('#btn-coc').show();
				break;
				case "coc":
					$('#form-detail').show();
					if(data.huy_coc)
						$('#btn-huy-coc').show();
					if(typeof $('#btn-confirm-coc') != 'undefined')
						$('#btn-confirm-coc').show();
				case "xac-nhan":
					$('#form-detail').show();
				break;
				default:
				break;
			}
			$('#modal-transaction .load').hide();
			
        }
    })
    .fail(err => {
        console.error(err);
    });
});

$('#btn-cho').click(function(e){
	e.preventDefault();
	$('#modal-transaction .load').show();
	var url = `${host}/blocks/dat-cho`;
	var form_data = $('#form-dat-cho').serialize();
	doTransaction(url,form_data);
});

$('#btn-coc').click(function(e){
	e.preventDefault();
	$('#modal-transaction .load').show();
   	$( "#form-dat-coc" ).submit();
});

$('#btn-huy-coc').click(function(e){
	e.preventDefault();
	$('#modal-transaction .load').show();
	var url = `${host}/blocks/huy-coc`;
	var form_data = $('#form-detail').serialize();
	doTransaction(url,form_data);
});

$('#btn-confirm-coc').click(function(e){
	e.preventDefault();
	$('#modal-transaction .load').show();
	var url = `${host}/blocks/xac-nhan-coc`;
	var form_data = $('#form-detail').serialize();
	doTransaction(url,form_data);
});

$("#form-dat-coc").on('submit',(function(event) {
    event.preventDefault();
    var url = `${host}/blocks/dat-coc`;
    var form_data = new FormData($(this)[0]);
   	doTransactionImg(url,form_data);
}));
function doTransaction( url_post ,form_data) {
	$.ajax({
		type: 'POST',
		url: url_post,
		data: form_data,
		success: function(result) {
			if(result.success){
				var lock =result.data;
				$('#block-'+lock.id).removeClass();
				$('#block-'+lock.id).addClass(`col-md-2 col-6 lock ${lock.tinh_trang} lock-doing`);
			}
			$('#modal-transaction').modal('hide');
		},
		error: function(xhr, textStatus, errorThrown) {
			console.error(errorThrown);
		}
	});
}
function doTransactionImg( url_post ,form_data) {
	$.ajax({
		type: 'POST',
		url: url_post,
		data: form_data,
		processData: false,
    	contentType: false,
		success: function(result) {
			if(result.success){
				var lock =result.data;
				$('#block-'+lock.id).removeClass();
				$('#block-'+lock.id).addClass(`col-md-2 col-6 lock ${lock.tinh_trang} lock-doing`);
			}
			$('#modal-transaction').modal('hide');
		},
		error: function(xhr, textStatus, errorThrown) {
			console.error(errorThrown);
		}
	});
}
/* global bootbox */
function loadTransaction() {
    var $transaction = $("#transaction");
    
    var ajaxUrl = `${host}/api/transactions/${$id_du_an}/new`;
    if($transaction.html().trim() != ''){
    	ajaxUrl = `${host}/api/transactions/${$id_du_an}/update`;
    }
    $.getJSON(ajaxUrl)
    .done(result => {
        if(result.success == true){
        	if($transaction.html().trim() == ''){
				var $content = '';
				$.each(result.data, function( index, value ) {
					$content = $content + `
					<div class="row">
				    	<div class="col-md-12">
				            <p>${value.ma} - ${value.ghi_chu}</p>
				        </div>`;
			        $.each(value.cac_lo, function( index, lock ) {
			        	$content = $content + `
				    	<div class="col-md-2 col-6 lock ${lock.tinh_trang} lock-doing" id="block-${lock.id}"
				    		data-block='${lock.id}'
				    	>
				            <div class="content">
				                <p>${lock.ma_lo}</p>
				                <p>${lock.thong_tin}</p>
				                <p>${lock.dien_tich}</p>
				                <p class="name_nhan_vien">${lock.name==null?"":`Nhân viên : ${lock.name}`}</p>
				            </div>
				        </div>`;
			        });
			        $content = $content + `</div>`;
				});

				$transaction.append($content);
			}
			else{
				$.each(result.data, function( index, value ) {
			        $.each(value.cac_lo, function( index, lock ) {
			        	$('#block-'+lock.id).removeClass();
			        	$('#block-'+lock.id).addClass(`col-md-2 col-6 lock ${lock.tinh_trang} lock-doing`);
			        	if(lock.name!=null)
			        		$('#block-'+lock.id+' .name_nhan_vien').text(`Nhân viên : ${lock.name}`);
			        	else
			        		$('#block-'+lock.id+' .name_nhan_vien').text("");
			        });
				});
			}
        }
    })
    .fail(err => {
        console.error(err);
    });
    
}