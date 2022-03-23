
//select2 job and level
    $("#Status,#priority,#department").select2({
        theme: 'bootstrap4',
        placeholder: "Chọn mục phù hợp",
        allowClear: true
    });
    $("#person-charge").select2({
        theme: 'bootstrap4',
        placeholder: "Người phụ trách",
        allowClear: true,
    });
    $("#department").select2({
        theme: 'bootstrap4',
        placeholder: "Phòng ban",
        allowClear: true
    });
    $("#priority").select2({
        theme: 'bootstrap4',
        placeholder: "Độ ưu tiên",
        allowClear: true
    });
    $("#Status").select2({
        theme: 'bootstrap4',
        placeholder: "Status",
        allowClear: true
    });
    $("#job").select2({
        theme: 'bootstrap4',
        placeholder: "Job",
        allowClear: true,
        tags:true,
    }).on('select2:close',function(e){
        e.preventDefault();

        var element = $(this);
        var new_job = $.trim(element.val());
        if(new_job != '' || new_job != 0)
        {
            $.ajax({
                url: "http://localhost/company-ominex/cvmanagementsystem3/add_jobs",
                type: 'get',
                data:{ 'id':new_job},
                dataType : 'json',
                success:function(response){
                    if (response.status == 200) {
                        name = response.data.name;
                        job_id = response.data.job_id;
                        if (name == 'yes') {
                            element.append('<option value = "'+job_id+'">'+new_job+'</option>').val(job_id);
                        }
                        else {
                                        
                        }
                    }
                },
            });
        }
    });
   
  
  
      $("#level").select2({
        theme: 'bootstrap4',
        placeholder: "Level",
        allowClear: true,
        tags:true,
    }).on('select2:close',function(e){
        e.preventDefault();
        var job = $("#job").val();
        var element = $(this);
        var new_level = $.trim(element.val());
        if(new_level != '')
        {
            
            $.ajax({
                url: "http://localhost/company-ominex/cvmanagementsystem3/add_levels",
                type: 'get',
                data:{ 'id':new_level, 'job':job},
                dataType : 'json',
                success:function(response){
                    if (response.status == 200) {
                        name = response.data.name;
                        level_id = response.data.level_id;
                        if (name == 'yes') {
                            element.append('<option value = "'+level_id+'">'+new_level+'</option>').val(level_id);
                        }
                    }
                },
            });
        }
    });

    $('#job').on('change', function () {
        var job = $("#job").val();
        $.ajax({
            url: "http://localhost/company-ominex/cvmanagementsystem3/show_levels",
            type: 'get',
            data:{ 'job':job},
            dataType : 'json',
            success:function(response){
                var ds = '';
                if (response.status == 200) {
                data = response.data;
                $.each(data,function(){
                    let id = $(this)[0].id;
                    let name = $(this)[0].name;
                    ds += `
                    <option value="${id}">${name}</option>
                    `;
                    $("#level").html(ds);
                });
                }
                else{
                    $('#level').html(ds);
                    }
                },
            });
        
    });

    
    $('#level').on('change', function () {
        var job = $("#job").val();
        console.log(job);
        if(job == 0 || job =='null'){
            alert('Vui lòng chọn job' );
        }
        
    });

//date-start and date-dealine
$('#date-start').on('change', function () {
    var start = document.getElementById('date-start').value;
    var deadline = document.getElementById('date-deadline').value;
    const date1 = new Date(start);
    const date2 = new Date(deadline);
    if(date1 > date2){
        document.getElementById("date-start").value = deadline;
    }
});
$('#date-deadline').on('change', function () {
    var start = document.getElementById('date-start').value;
    var deadline = document.getElementById('date-deadline').value;
    const date1 = new Date(start);
    const date2 = new Date(deadline);
    if(date2 < date1){
        document.getElementById("date-deadline").value = start;
    }
});