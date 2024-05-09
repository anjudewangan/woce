//-----------Form Post Function--------------
$(document).ready(function () {

	$("body").click(function () {
		$('.Inpt').html('');
	});

	$(".TypeInt").on("keypress keyup blur change", function (event) {
		$(this).val($(this).val().replace(/[^\d].+/, ''));
		if ((event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});


	/*==============Page Form=========================*/
	$('.actionForm').on('submit', function (event) {
		$(".Inpt").html('');

		var formurl = $(".actionForm").attr('action');
		event.preventDefault();
		$.ajax({
			url: formurl,
			method: "POST",
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function () {
				$("#loadpost").show();
			},
			success: function (data) {
				if (data.error) {
					$('.' + data.class_name).html('<div class="text-danger">' + data.error + '</div>');
					$("#loadpost").hide();
					$('input[name="' + data.class_name + '"]').focus();
					$('select[name="' + data.class_name + '"]').focus();

				} else {

					var toast = new iqwerty.toast.Toast();
					toast.setText(data.msg).show();
					setTimeout(function () {
						location.reload(true);
					}, 3000);
					$("#loadpost").hide();
					$(".txtfeild").val('');
				}
			}
		})
	});
});