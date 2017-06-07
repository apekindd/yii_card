$(document).ready(function(){
    if($('.commentAdded').length > 0){
        $('.commentAdded').addClass('hideComment');
        setTimeout(function(){
            $('.commentAdded').remove();
        },3000);
    }
});

//COMMENTS
    $(document).on('click','.show_search',function(){
        $('#compact_search').toggleClass('hidden-sm');
    });

    var _isLoading = false;
    var _commentInfo = {};
    $(document).on('click','.comment', function(){
        if(!_isLoading){
            var form = $(this).parents('form');
            if(form.find('textarea').val() != ''){
                if(_auth){
                    _commentInfo['text'] = form.find('textarea').val();
                    _commentInfo['parent_id'] = Number(form.find('input[name="parent_id"]').val());
                    _commentInfo['id'] = Number($('input[name="id"]').val());
                    _commentInfo['type'] = $('input[name="type"]').val();

                    _isLoading = true;
                    if(typeof(_commentInfo['id'])=='undefined' || typeof(_commentInfo['id'])=='undefined' || typeof(_commentInfo['type'])=='undefined' ||  _commentInfo['text'] == ''){
                        _isLoading = false;
                        console.log('check input params');
                        return false;
                    }

                    $.ajax({
                        data: {
                            text:_commentInfo['text'],
                            id: _commentInfo['id'],
                            parent_id:  _commentInfo['parent_id'],
                            type:  _commentInfo['type']
                        },
                        url: '/comment/add',
                        method: 'POST',
                        dataType: "HTML",
                        error: function(){
                            alert('err');
                        },
                        success: function(data){
                            if(data == 'success') {
                                window.location.hash = 'comments';
                                location.reload();
                            }
                        },
                        complete: function(){
                            _isLoading=false;
                            _commentInfo = {};
                        }
                    });
                }else{
                    alert('signin');
                }
            }else{
                alert('Заполните поле');
            }
        }
    });

    $(document).on('click','.reply', function(){
        if($(this).hasClass('js-with-form')){
            $(this).siblings('.js-dynamic-cf').remove();
            $(this).removeClass('js-with-form');
        }else{
            $('.js-dynamic-cf').remove();
            $('.js-with-form').removeClass('js-with-form');
            $(this).addClass('js-with-form');
            $(this).after("<div class='row js-dynamic-cf js-selected'>"+$('.comment-form').html()+"</div>");
            $('.js-selected input[name="parent_id"]').attr('value', $(this).data('id'));
        }
    });
//COMMENTS END

//MODAL MOBILE MENU
    //OPEN
    $(document).on('click','.navbar-toggle', function(){
        $('.navbar-modal').addClass('is-open');
        $('.navbar-modal-content').addClass('slideLeft');
        $('body').addClass('no-scroll');
        $('.navbar').addClass('is-focused');
        $('.fa-chevron-left').addClass('dark-icon');
        $('.navbar-header').addClass('dark-panel');
    });
    //CLOSE
    $(document).on('click','.navbar-modal-close', function(){
        closeMobileMenu();
    });

    function closeMobileMenu(){
        $('.navbar-modal-content').removeClass('slideLeft');
        $('.navbar-modal-content').addClass('slideRight');

        $('.navbar.is-focused').removeClass('is-focused');
        $('body').removeClass('no-scroll');
        $('.fa-chevron-left').removeClass('dark-icon');
        $('.navbar-header').removeClass('dark-panel');
        setTimeout(function(){
            $('.navbar-modal').removeClass('is-open');
            $('.navbar-modal-content').removeClass('slideRight');
        },200);
    }
//MODAL MOBILE MENU END

//SWIPE
    var initialPoint;
    var finalPoint;
    document.getElementById('mobileMenu').addEventListener('touchstart', function(event) {
        /*event.preventDefault();
        event.stopPropagation();*/
        initialPoint=event.changedTouches[0];
    }, false);
    document.getElementById('mobileMenu').addEventListener('touchend', function(event) {
        /*event.preventDefault();
         event.stopPropagation();*/
        finalPoint=event.changedTouches[0];
        var xAbs = Math.abs(initialPoint.pageX - finalPoint.pageX);
        var yAbs = Math.abs(initialPoint.pageY - finalPoint.pageY);
        if (xAbs > 20 || yAbs > 20) {
            if (xAbs > yAbs) {
                if (finalPoint.pageX < initialPoint.pageX){
                    /*СВАЙП ВЛЕВО*/
                }else{
                    closeMobileMenu();
                    /*СВАЙП ВПРАВО*/
                }
            } else {
                if (finalPoint.pageY < initialPoint.pageY){
                    /*СВАЙП ВВЕРХ*/
                } else{
                    /*СВАЙП ВНИЗ*/
                }
            }
        }
    }, false);
//SWIPE END

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

//SHOW CARDS
$('.focus').mousemove(function(e){
    var X = e.pageX;
    var Y = e.pageY;
    var top = Y  - 450 + 'px';
    //var top = 0 + 'px';
    var left = X  + 10 + 'px';
    var id = $(this).data('view');
    $('#view-'+id).css({
        display:"block",
        top: top,
        left: left
    });
});
$('.focus').mouseout (function(){
    var id = $(this).data('view');
    $('#view-'+id).css({
        display:"none"
    });
});
//SHOW CARDS END