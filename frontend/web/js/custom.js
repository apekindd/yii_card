$(document).on('click','.show_search',function(){
    $('#compact_search').toggleClass('hidden-sm');
});

$(document).on('click','.comment', function(){
    if($(this).parents('form').find('textarea').val() != ''){
        if(_auth){
            var id = $('input[name="id"]').val();
            var type = $('input[name="type"]').val();
           //alert('ajax');
            $.ajax({
                data: {
                        'text':$(this).parents('form').find('textarea').val(),

                },
                url: '/comment/add',
                method: 'POST',
                dataType: "HTML",
                error: function(){
                  alert('err');
                },
                success: function(data){
                    console.log(data);
                }
            })
        }else{
            alert('signin');
        }
    }else{
        alert('Заполните поле');
    }
});

$(document).on('click','.reply', function(){
    $(this).addClass('js-with-form');
    $(this).after("<div class='row'>"+$('.comment-form').html()+"</div>");
});
