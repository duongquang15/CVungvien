
$(document).ready(function() {
    $('#data_tables').DataTable({
        // dom: 'Bfrtip',
        // 	buttons: [
        // 	{ extend: 'excel', text: 'Xuất EXCEL' },
        // 	'pageLength'
        // ],
        "paging": true,
        "bInfo": false,
        "bFilter": true,
        "language": {
            "sLengthMenu": "<b>Hiển thị</b> _MENU_ <b>tickets</b>",
            "search": "<b>Tìm kiếm</b>",
            "paginate": {
                "previous": "Trang trước",
                "next": "Trang sau"
            }
        }
    });
    
});