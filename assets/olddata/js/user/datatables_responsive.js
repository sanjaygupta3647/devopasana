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

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        responsive: true,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 4 ]
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
        preDrawCallback: function() {
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
		"ajax": base_url + 'user/alltickets/' + $param			 

	}); 

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
	
	$("#filter").click(function () {
		var url = base_url + 'user/tickets/';
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
