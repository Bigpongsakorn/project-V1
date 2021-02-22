$(document).ready(function(){

    $('.other').attr('disabled',true)

    $('.ch1').attr('disabled',true)
    $('.ch2').attr('disabled',true)

    $('body').on('change','.chk',function(){
        if($(this).val() == '1'){
            $('.ch2').attr('disabled',true)
            $('.ch2').prop('checked',false)
            $('.ch1').removeAttr("disabled");

        }else{
            $('.ch1').attr('disabled',true)
            $('.ch1').prop('checked',false)
            $('.ch2').removeAttr("disabled");
        }
        $('[name="natural_person_text"],[name="juristic_text"]').val('')
        
    });

    $('body').on('change','.ch1 ,.ch2',function(){
        if($('[name="natural_person3"]').prop('checked')==true){
            $('[name="natural_person_text"]').attr('disabled',false)
        }else{  
            $('[name="natural_person_text"]').attr('disabled',true).val('')
        }

        if($('[name="juristic_person4"]').prop('checked')==true){
            $('[name="juristic_text"]').attr('disabled',false)
        }else{
            $('[name="juristic_text"]').attr('disabled',true).val('')
        }

    });

    $('body').on('change','.other5',function(){
        if($('[name="other"]').prop('checked')==true){
            $('[name="other_text"]').attr('disabled',false)
        }else{
            $('[name="other_text"]').attr('disabled',true).val('')
        }
    });

    $('body').on('change','.posti,.posti1 ,.posti2',function(){
        if($(this).val() == '4'){
            console.log('4');

            $('.tposti1').attr('disabled',false);
            $('.tposti2').attr('disabled',true).val('')
        }else if($(this).val() == '5'){
            console.log('5');
            $('.tposti2').attr('disabled',false);
            $('.tposti1').attr('disabled',true).val('')
        }else{
            // console.log('else');
            // $('.tposti1').attr('disabled',true).val('')
            // $('.tposti2').attr('disabled',true).val('')
        }

    });

    $('body').on('change','.titles',function(){
        // $('.staff_gender').prop("disabled", false);
        if($(this).val() == '1'){
            $('.male').prop('checked',true)
            $('.female').prop("disabled", true);
        }else{
            $('.female').prop('checked',true)
            $('.male').prop("disabled", true);
        }
    });
    
    $('.table-return2').hide()
    $('.text-return').hide()
    $('.return-btn').click(function(){
        $('.table-return').hide()
        $('.table-return2').show()
        $('.text-return').show()
        $('.text-borrow').hide()
    });
    $('.borrow-btn').click(function(){
        $('.table-return').show()
        $('.table-return2').hide()
        $('.text-return').hide()
        $('.text-borrow').show()
    });

    $('.deleteForm').click(function(evt){
        var name=$(this).data("name");
        var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title:`ต้องการลบข้อมูล ${name} หรือไม่ ?`,
            text:`ลบแล้วไม่สามารถกู้คืนได้`,
            icon:"warning",
            buttons:true,
            dangerMode:true
        }).then((willDelete)=>{
            if(willDelete){
                form.submit();
            }
        });
    });

    // var a=1
    // $('body').on('submit','#updatedata',function(e){
    //     // var name=$(this).data("name")
    //     if(a){
    //         e.preventDefault();
    //         a=0
    //     }
    //     swal({
    //         title: "Good job!",
    //         text: "You clicked the button!",
    //         icon: "success",
    //         button: "OK",
    //     }).then((value) => {
    //         $(this).submit();
    //     });
    // });

    $('.btnSuccess').click(function (e){
    e.preventDefault();
    let form = $(this).parents('form');
    swal({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success",
        buttons: "OK",
    }).then(function(value) {
        if(value){
            form.submit();
        }
    });
});

    $('.btn-return').click(function(){
        var id=$(this).data("id");
        console.log(id)
        swal("คืนอุปกรณ์", {
        content: "input",
        })
        .then((value) => {
        // swal(`You typed: ${value}`);
        $.ajax({
        method: "POST",
        url: "/savereturn",
        data: { "equip_id" : id , 'equip_amount' : value , "_token": $('meta[name="csrf-token"]').attr('content'), }
        
        })
        .done(function( msg ) {
            // alert( "Data Saved: " + msg );
            console.log(msg)
            if (msg == 1){
                swal("Good job!", "You clicked the button!", "success").then((value) => {
                    location.reload()
                })
            }
        });
        });
    });

    $('.btnSuccess').click(function (e){
    e.preventDefault();
    let form = $(this).parents('form');
    swal({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success",
        buttons: "OK",
    }).then(function(value) {
        if(value){
            form.submit();
        }
    });
});


$('body').on('change','#province',function(){
        var id=$(this).val();
        console.log(id)
        $.ajax({
        method: "POST",
        url: "/city",
        data: { 
            "id" : id ,
            "_token": $('meta[name="csrf-token"]').attr('content') , 
        }
        
        })
        .done(function( msg ) {
            // alert( "Data Saved: " + msg );
            console.log(msg)
            var data = JSON.parse(msg);
            data = data.data;
            var distic = '<option value="">เลือกอำเภอ</option>';
            data.forEach(element => {
                distic += '<option value="'+element.district_id+'">'+element.district_name+'</option>';
            });
            $('#district').html('').append(distic)
        //     if (msg == 1){
        //         swal("Good job!", "You clicked the button!", "success").then((value) => {
        //             location.reload()
        //         })
        //     }
        });
    });

$('#district').change(function(){
        var id=$(this).val();
        console.log(id)
        $.ajax({
        method: "POST",
        url: "/subdist",
        data: { 
            "id" : id ,
            "_token": $('meta[name="csrf-token"]').attr('content') , 
        }
        
        })
        .done(function( msg ) {
            console.log(msg)
            var data = JSON.parse(msg);
            data = data.data;
            var subdistic = '<option value="">เลือกตำบล</option>';
            var zipcode = '<option value="">เลือกรหัสไปรษณีย์</option>';
            data.forEach(element => {
                subdistic += '<option value="'+element.subdistrict_id+'">'+element.subdistrict_name+'</option>';
                // zipcode += '<option value="'+element.zip_code+'">'+element.zip_code+'</option>';
            });
            var b=0;
            data.forEach(element => {
                if(!b)
                zipcode += '<option value="'+element.zip_code+'">'+element.zip_code+'</option>';
                b++;
            });
            $('#subdistrict').html('').append(subdistic)
            $('#zipcode').html('').append(zipcode)
        });
    });

    $('body').on('change','#province1',function(){
        var id=$(this).val();
        console.log(id)
        $.ajax({
        method: "POST",
        url: "/city",
        data: { 
            "id" : id ,
            "_token": $('meta[name="csrf-token"]').attr('content') , 
        }
        
        })
        .done(function( msg ) {
            // alert( "Data Saved: " + msg );
            console.log(msg)
            var data = JSON.parse(msg);
            data = data.data;
            var distic = '<option value="">เลือกอำเภอ</option>';
            data.forEach(element => {
                distic += '<option value="'+element.district_id+'">'+element.district_name+'</option>';
            });
            $('#district1').html('').append(distic)
        //     if (msg == 1){
        //         swal("Good job!", "You clicked the button!", "success").then((value) => {
        //             location.reload()
        //         })
        //     }
        });
    });

$('#district1').change(function(){
        var id=$(this).val();
        console.log(id)
        $.ajax({
        method: "POST",
        url: "/subdist",
        data: { 
            "id" : id ,
            "_token": $('meta[name="csrf-token"]').attr('content') , 
        }
        
        })
        .done(function( msg ) {
            console.log(msg)
            var data = JSON.parse(msg);
            data = data.data;
            var subdistic = '<option value="">เลือกตำบล</option>';
            var zipcode = '<option value="">เลือกรหัสไปรษณีย์</option>';
            data.forEach(element => {
                subdistic += '<option value="'+element.subdistrict_id+'">'+element.subdistrict_name+'</option>';
                // zipcode += '<option value="'+element.zip_code+'">'+element.zip_code+'</option>';
            });
            var b=0;
            data.forEach(element => {
                if(!b)
                zipcode += '<option value="'+element.zip_code+'">'+element.zip_code+'</option>';
                b++;
            });
            $('#subdistrict1').html('').append(subdistic)
            $('#zipcode1').html('').append(zipcode)
        });
    });


    setInterval(function() { 
        
        // console.log("Help")
        $.ajax({
        method: "POST",
        url: "/notify",
        data: { "_token": $('meta[name="csrf-token"]').attr('content'), }
        
        })
        .done(function( msg ) {
            // alert( "Data Saved: " + msg );
            // console.log(msg)
            var data_ = JSON.parse(msg);
            var data = data_.bell;
            var data2 = data_.bell2;
            var bell ='';
            var i = 0;
            data.forEach(element => {
                var d = new Date(element.created_at);
                d = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
                bell += '\ <a href="/notification/detail/'+element.ems_id+'">\
                        <div class="media">\
                            <div class="media-body">\
                                <h5 class="notification-user">'+element.general_name+'</h5>\
                                <p class="notification-msg">'+element.ems_detail+'\
                                </p>\
                                <span class="notification-time">'+d+'</span>\
                            </div>\
                        </div>\
                            </a><hr>'
                        ;
            i++
            });
            data2.forEach(element => {
                var d = new Date(element.created_at);
                d = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
                bell += '\ <a href="/notification/detail/'+element.ems_id+'">\
                        <div class="media">\
                            <div class="media-body">\
                                <h5 class="notification-user">'+element.general_name+'</h5>\
                                <p class="notification-msg">'+element.ems_detail+'\
                                </p>\
                                <span class="notification-time">'+d+'</span>\
                            </div>\
                        </div>\
                            </a><hr>'
                        ;
            i++
            });
            if(i){
                $('#notify').html('').append(bell)
                // $('#bg-c-red').html('').append(i)
                $('#show').addClass( "bg-c-red" );
                $('#show').html('').append(i)
            }else{
                $('#bg-c-red').html('').append(0)
            }
            //   console.log(i)
        });
    
    }, 5000);

    // $('body').on('click','#notify',function(){
    //     $.ajax({
    //     method: "POST",
    //     url: "/unotify",
    //     data: { 
    //         "_token": $('meta[name="csrf-token"]').attr('content') ,
    //     }
        
    //     })
    //     .done(function( msg ) {
    //         console.log(msg)
    //         var data = JSON.parse(msg);
    //     }).fail(function( msg ) {
    //         console.log(msg)});
    // });
    
    // ------------------------------------------------------------------------------
    // setInterval(function() { 
        
    //     // console.log("Help")
    //     $.ajax({
    //     method: "POST",
    //     url: "/noyifynext",
    //     data: { "_token": $('meta[name="csrf-token"]').attr('content'), }
        
    //     })
    //     .done(function( msg ) {
    //         // alert( "Data Saved: " + msg );
    //         // console.log(msg)
    //         var data = JSON.parse(msg);
    //         data = data.bell;
    //         var bell ='';
    //         var i = 0;
    //         data.forEach(element => {
    //             bell += '<a href="/notification/detail/'+element.ems_id+'" style="background-color:#ffffff">\
    //             <div class="media">\
    //                         <div class="media-body">\
    //                             <h5 class="notification-user">'+element.general_name+'</h5>\
    //                             <p class="notification-msg">'+element.ems_detail+'\
    //                             </p>\
    //                             <span class="notification-time">'+element.created_at+'</span>\
    //                         </div>\
    //                     </div>\
    //                      </a>';
    //         i++
    //         });
    //         if(i){
    //             $('#notify').html('').append(bell)
    //             // $('#bg-c-red2').html('').append(i)
    //             $('#show').addClass( "bg-c-red" );
    //             $('#show').html('').append(i)
    //         }else{
    //             $('#bg-c-red').html('').append(0)
    //         }
    //         //   console.log(i)
    //     });
    
    // }, 5000);

    // $('body').on('click','#notify',function(){
    //     $.ajax({
    //     method: "POST",
    //     url: "/unoyifynext",
    //     data: { 
    //         "_token": $('meta[name="csrf-token"]').attr('content') , 
    //     }
        
    //     })
    //     .done(function( msg ) {
    //         console.log(msg)
    //         var data = JSON.parse(msg);
    //     }).fail(function( msg ) {
    //         console.log(msg)});
    // });

});

// function myFunction() {
//     swal("Are you sure you want to do this?", {
//   buttons: ["Oh noez!", "Aww yiss!"],
// });
// }

