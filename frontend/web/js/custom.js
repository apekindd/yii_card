$(document).on('click','.show_search',function(){
    $('#compact_search').toggleClass('hidden-sm');
});

$(document).on('click','.comment', function(){
    if($(this).parents('form').find('textarea').val() != ''){
        if(_auth){
           // alert('ajax');
            $.ajax({
                data: {'text':$(this).parents('form').find('textarea').val()},
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


//MODAL MOBILE MENU
    //OPEN
    $(document).on('click','.navbar-toggle', function(){
        $('.navbar-modal').addClass('is-open');
        $('.navbar-modal-content').addClass('slideLeft');
        $('body').addClass('no-scroll');
        $('.navbar').addClass('is-focused');
    });
    //CLOSE
    $(document).on('click','.navbar-modal-close', function(){
        $('.navbar-modal-content').removeClass('slideLeft');
        $('.navbar-modal-content').addClass('slideRight');

        $('.navbar.is-focused').removeClass('is-focused');
        $('body').removeClass('no-scroll');
        setTimeout(function(){
            $('.navbar-modal').removeClass('is-open');
            $('.navbar-modal-content').removeClass('slideRight');
        },200);
    });
//MODAL MOBILE MENU END

//NAV MOVING LINE
    $(function () {

        var movingLine = {
            init: function init() {
                this.el = $('.js-nav');
                this.el.find('> li').on('mouseover', this._move.bind(this));
                this.el.on('mouseleave', this._destroy.bind(this));

                this._goToActive();
            },
            _move: function _move(e) {
                var target = $(e.currentTarget);
                var $line = target.siblings('.js-moving-line');
                var width = target.width();
                var offsetLeft = target.position().left;
                var gutterLeft = parseInt(getComputedStyle(target[0]).paddingLeft);

                $line.css({
                    width: width + 'px',
                    //"background-color": target.data('color'),
                    transform: 'translate3d(' + (gutterLeft + offsetLeft) + 'px,0,0)'
                });
            },
            _destroy: function _destroy() {
                var $line = this.el.find('.js-moving-line');

                // $line.attr('style', '');

                this._goToActive();
            },
            _goToActive: function _goToActive() {
                var line = this.el.find('.js-moving-line');
                var active = this.el.find('li.is-active');
                var gutterLeft = parseInt(getComputedStyle(active[0]).paddingLeft);

                var activeProp = {
                    width: active.width(),
                    offsetLeft: active.position().left
                };

                line.css({
                    width: activeProp.width + 'px',
                    transform: 'translate3d(' + (activeProp.offsetLeft + gutterLeft) + 'px,0,0)'
                });

                setTimeout(function () {
                    line.addClass('is-init');
                }, 200);
            }
        };

        movingLine.init();
    });
//NAV MOVING LINE END
