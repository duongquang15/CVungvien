
    imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}


    $("#Status,#priority,#person-charge,#department").select2({
        theme: 'bootstrap4',
        placeholder: "Chọn mục phù hợp",
        allowClear: true
    });
    $("#job").select2({
        theme: 'bootstrap4',
        placeholder: "Chọn mục phù hợp",
        allowClear: true,
        tags:true,
    }).on('select2:close',function(e){
        e.preventDefault();

        var element = $(this);
        var new_job = $.trim(element.val());
        if(new_job != '')
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
        placeholder: "Chọn mục phù hợp",
        allowClear: true,
        tags:true,
    }).on('select2:close',function(e){
        e.preventDefault();

        var element = $(this);
        var new_level = $.trim(element.val());
        if(new_level != '')
        {
            
            $.ajax({
                url: "http://localhost/company-ominex/cvmanagementsystem3/add_levels",
                type: 'get',
                data:{ 'id':new_level},
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

    $("#level").select2({
        theme: 'bootstrap4',
        placeholder: "Chọn mục phù hợp",
        allowClear: true,
        tags:true,
    }).on('select2:open',function(e){
        e.preventDefault();
       var job  = $( "#job" ).val();
       var element = $(this);
       console.log(job);
        if(job != '')
        {
            $.ajax({
                url: "http://localhost/company-ominex/cvmanagementsystem3/show_levels",
                type: 'get',
                data:{ 'job':job},
                dataType : 'json',
                success:function(response){
                    let ds = '';
                    if (response.status == 200) {
                    data = response.data;
                    $.each(data,function(){
                        let id = $(this)[0].id;
                        let name = $(this)[0].name;
                       ds += `
                       <option value="${id}">${name}</option>
                        `;
                        $('#level').append(ds).val(id);
                    });
                    }
                    else{
                    //     ds += `
                    //    <option value="2">dddd</option>
                    //     `;
                        $('#level').html(ds);
                    }
                },
            });
        }
    });
  