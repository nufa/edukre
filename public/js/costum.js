$(document).ready(function(){
	//confirm delete
	$(document.body).on('submit', '.js-confirm', function(){
		var $el = $(this)
		var text = $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini ?'
		var c = confirm(text);
		return c;
	});

	$('.js-selectize').selectize({
		sortField: 'text'
	});

	// delete review book
	$(document.body).on('submit', '.js-review-delete', function() {
		var $el 	= $(this);
		var text 	= $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini ?';
		var c 		= confirm(text);
		//cancel delete
		if (c === false) return c;

		//delete via ajax
		//disable behavior default dari tombol sumit
		event.preventDefault();
		// hapus data buku dengan ajax
		$.ajax({
			type	 : 'POST',
			url		 : $(this).attr('action'),
			dataType : 'json',
			data 	 : {
				_method : 'DELETE',
				//membuat csrf token dari laravel
				_token : $( this ).children( 'input[name=_token]' ).val()
			}
		}).done(function(data) {
			// cari baris yang dihapus
			baris = $('#form-'+data.id).closest('tr');
			// hilangkan baris (fadeout kemudian remove)
			baris.fadeOut(300, function() {$(this).remove()});
		});
	});
});