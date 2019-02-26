$(function(){
	$('.container').on('click', '.row:not(:first)', function(){
		var id = $(this).children('.id').text();
		document.location.href = ("request.php?id=" + id);
	});

	$('#addManager').on('click', function(){
		$('#addManagerForm').toggleClass('displayNone');
	});
	$('body').on('click', '#addManagerForm', function(event){
		if(event.target.id == 'addManagerForm') {
			$('#addManagerForm').toggleClass('displayNone');
		}
	});
	$('#filter').on('click', function(){
		$('#filterForm').toggleClass('displayNone');
	});
	$('body').on('click', '#filterForm', function(event){
		if(event.target.id == 'filterForm') {
			$('#filterForm').toggleClass('displayNone');
		}
	});

	$('#requestForm').children('label').children('input[name = "phone"]').keypress(function(event){
		if (event.which > 57 || event.which < 48) {
			return false;
		}
	})
});