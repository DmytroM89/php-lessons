function pr (val) {
    console.log(val);
}

$('.day').click(function(){
    var selectDate = $(this).data('date');
    $('span#date').html(selectDate);
});

/* Form Submit */
$(".submit").click(function () {
    formSubmit();
});

/*------- Функция вызова модального окна Alert -----------------*/
function alert(val) {
	$('#alertModal .modal-body').html('<p>'+val+'</p>');
	$('#alertModal').modal('show');
}

function formSubmit (){
    var data = {
        name: $('#form input[name="name"]').val(),
        loc: $('#form input[name="location"]').val(),
        dscrpt: $('#form textarea[name="descript"]').val(),
        eventDate: $('span#date').html()
    };
    
    if (data.name != '' && data.loc != '' && data.dscrpt != '') {
        $.ajax({
            method: "POST",
            url: 'index.php',
            data: data,
            //beforeSend: function() {},
            success: function (res) {
                $("#modalEvent").modal('hide');
                alert(res);
            },
            error: function(e) {
                pr();
            }
        });
        $('#name').val("");
        $('#loc').val("");
        $('#descript').val("");
        
    } else {
        $("#modalEvent").modal('hide');
        alert('Не заполнено обязательное поле');
    }
       
    
}

//var now = new Date();
//var nowDateArr = $('.day');
//if(now.getDate() < 10 && now.getDate() > 0 && now.getMonth() < 10 && now.getMonth() > 0) {
//    var currentDate = '0'+now.getDate()+'.'+'0'+(now.getMonth()+1)+'.'+now.getFullYear();
//}
//for (var i=0; i<nowDateArr.length; i++) {
//    var nowDate = ($(nowDateArr[i]).data('date'));
//    pr(Number(nowDate));
//    if(currentDate == nowDate) {
//        $('.day').addClass('bgc');
//    }
//}


