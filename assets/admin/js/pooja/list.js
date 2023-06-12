/* ------------------------------------------------------------------------------
*
*  # Responsive extension for Datatables
*
*  Specific JS code additions for datatable_responsive.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function () {


	// Table setup
	// ------------------------------

	// Setting datatable defaults
	if ($('.datatable-responsive').length) {
		$.extend($.fn.dataTable.defaults, {
			autoWidth: false,
			responsive: true,
			columnDefs: [{
				orderable: false,
				width: '100px',
				targets: [4]
			}],
			dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
			language: {
				search: '<span>Filter:</span> _INPUT_',
				lengthMenu: '<span>Show:</span> _MENU_',
				paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
			},
			drawCallback: function () {
				$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
			},
			preDrawCallback: function () {
				$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
			}
		});



		// Basic responsive configuration

		$status = $("#status").val();
		$param = "";
		if ($status) {
			$param += '?t_status=' + $status
		}
		$department = $("#department").val();
		if ($department) {
			$param += '&department=' + $department
		}
		$priority = $("#priority").val();
		if ($priority) {
			$param += '&priority=' + $priority
		}

		$('.datatable-responsive').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": base_url + 'admin/pooja/allpoojas/' + $param,
			"fnDrawCallback": function (oSettings) {
				$('.icon-info22').tooltip({ boundary: 'window' });
			}

		});



		// Add placeholder to the datatable filter option
		$('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');


		// Enable Select2 select for the length option
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});

		$('.icon-info22').tooltip({ boundary: 'window' })
	}

});

$(document).ready(function () {
	$(document).on("click", '.change_status', function () {
		$this = $(this);
		$id = $($this).data("id");
		$status = $($this).data("status");
		$closed_by = $($this).data("closed_by");
		$close_time = $($this).data("close_time");

		bootbox.confirm("Are you sure? You want to " + $status + " this pooja.", function (result) {


			if (result) {
				$.ajax({
					url: base_url + 'admin/pooja/update/' + $id + '/',
					type: 'POST',
					data: { 'status': $status, 'closed_by': $closed_by, 'close_time': $close_time },
					success: function (response) {

						if (response.type == 'success') {
							bootbox.alert(response.message, function () {
								window.location.href = self.location;
							});

						} else {
							bootbox.alert(response.message);
						}

					}
				});
			}

		});

	});

	$("#filter").click(function () {
		var url = base_url + 'admin/pooja/';
		$status = $("#status").val();
		if ($status) {
			url += '?status=' + $status
		}
		$department = $("#department").val();
		if ($department) {
			url += '&department=' + $department
		}
		$priority = $("#priority").val();
		if ($priority) {
			url += '&priority=' + $priority
		}

		window.location.href = url;
	});

});

