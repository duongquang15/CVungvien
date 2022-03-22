
$(document).ready(function() {
    $('#datatables_tickets').DataTable({
        // dom: 'lBfrtip',
        // buttons: [
        //     { extend: 'excel', className: 'btn btn-success', text: 'EXPORT CSV/EXCEL' },
        // ],
        "paging": false,
        "bInfo": false,
        "bFilter": false,
        "ordering": false,
        "language": {
            "emptyTable": "Không có dữ liệu",
            // "sLengthMenu": "<b>Hiển thị</b> _MENU_ <b>tickets</b>",
            // "search": "<b>Tìm kiếm</b>",
            // "zeroRecords": "Không tìm thấy dữ liệu trùng khớp",
            // "paginate": {
            //     "previous": "Trang trước",
            //     "next": "Trang sau"
            // }
        },
    });

    $('#datatables_users').DataTable({
        "paging": false,
        "bInfo": false,
        "bFilter": false,
        "language": {
            "emptyTable": "Không có dữ liệu",
            // "sLengthMenu": "<b>Hiển thị</b> _MENU_ <b>tickets</b>",
            // "search": "<b>Tìm kiếm</b>",
            // "zeroRecords": "Không tìm thấy dữ liệu trùng khớp",
            // "paginate": {
            //     "previous": "Trang trước",
            //     "next": "Trang sau"
            // }
        },
    });
});
