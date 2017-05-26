//CROP CROP START
    // Переменные
    var canvas, ctx;
    var image;
    var iMouseX, iMouseY = 1;
    var theSelection;

    // Определяем конструктор Selection
    function Selection(x, y, w, h){
        this.x = x; // Гачальное положение
        this.y = y;
        this.w = w; // и размер
        this.h = h;

        this.px = x; // Дополнительные переменные для вычисления при "перетаскивании" маркоеров
        this.py = y;

        this.csize = 6; // Размер маркеров
        this.csizeh = 10; // Размер маркеров при наведении курсора

        this.bHow = [false, false, false, false]; // Статусы наведения курсора
        this.iCSize = [this.csize, this.csize, this.csize, this.csize]; // Размеры маркеров
        this.bDrag = [false, false, false, false]; // Статусы перетаскивания
        this.bDragAll = false; // Статус пермещения всего выделения
    }

    // Метод draw
    Selection.prototype.draw = function(){

        ctx.strokeStyle = '#000';
        ctx.lineWidth = 2;
        ctx.strokeRect(this.x, this.y, this.w, this.h);

        // выводим часть оригинального изображения
        if (this.w > 0 && this.h > 0) {
            ctx.drawImage(image, this.x, this.y, this.w, this.h, this.x, this.y, this.w, this.h);
        }

        // Выводим маркеры
        ctx.fillStyle = '#fff';
        ctx.fillRect(this.x - this.iCSize[0], this.y - this.iCSize[0], this.iCSize[0] * 2, this.iCSize[0] * 2);
        ctx.fillRect(this.x + this.w - this.iCSize[1], this.y - this.iCSize[1], this.iCSize[1] * 2, this.iCSize[1] * 2);
        ctx.fillRect(this.x + this.w - this.iCSize[2], this.y + this.h - this.iCSize[2], this.iCSize[2] * 2, this.iCSize[2] * 2);
        ctx.fillRect(this.x - this.iCSize[3], this.y + this.h - this.iCSize[3], this.iCSize[3] * 2, this.iCSize[3] * 2);
    }

    function drawScene() { // Осоновная функция drawScene
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height); // cОчищаем эолемент canvas

        // Выводим оригинальное изображение
        ctx.drawImage(image, 0, 0, ctx.canvas.width, ctx.canvas.height);

        // и затеняем его
        ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
        ctx.fillRect(0, 0, ctx.canvas.width, ctx.canvas.height);

        // Выводим выделение
        theSelection.draw();
    }

    function cropMouseMove(e, isMobile){
        var canvasOffset = $(canvas).offset();
        if(isMobile){
            iMouseX = Math.floor(e.touches[0].pageX - canvasOffset.left);
            iMouseY = Math.floor(e.touches[0].pageY - canvasOffset.top);
        }else{
            iMouseX = Math.floor(e.pageX - canvasOffset.left);
            iMouseY = Math.floor(e.pageY - canvasOffset.top);
        }

        // Для случая перемещения всего селектора
        if (theSelection.bDragAll) {
            theSelection.x = iMouseX - theSelection.px;
            theSelection.y = iMouseY - theSelection.py;
        }

        for (i = 0; i < 4; i++) {
            theSelection.bHow[i] = false;
            theSelection.iCSize[i] = theSelection.csize;
        }

        //Наведение курсора мыши на маркер
        if (iMouseX > theSelection.x - theSelection.csizeh && iMouseX < theSelection.x + theSelection.csizeh &&
            iMouseY > theSelection.y - theSelection.csizeh && iMouseY < theSelection.y + theSelection.csizeh) {

            theSelection.bHow[0] = true;
            theSelection.iCSize[0] = theSelection.csizeh;
        }
        if (iMouseX > theSelection.x + theSelection.w-theSelection.csizeh && iMouseX < theSelection.x + theSelection.w + theSelection.csizeh &&
            iMouseY > theSelection.y - theSelection.csizeh && iMouseY < theSelection.y + theSelection.csizeh) {

            theSelection.bHow[1] = true;
            theSelection.iCSize[1] = theSelection.csizeh;
        }
        if (iMouseX > theSelection.x + theSelection.w-theSelection.csizeh && iMouseX < theSelection.x + theSelection.w + theSelection.csizeh &&
            iMouseY > theSelection.y + theSelection.h-theSelection.csizeh && iMouseY < theSelection.y + theSelection.h + theSelection.csizeh) {

            theSelection.bHow[2] = true;
            theSelection.iCSize[2] = theSelection.csizeh;
        }
        if (iMouseX > theSelection.x - theSelection.csizeh && iMouseX < theSelection.x + theSelection.csizeh &&
            iMouseY > theSelection.y + theSelection.h-theSelection.csizeh && iMouseY < theSelection.y + theSelection.h + theSelection.csizeh) {

            theSelection.bHow[3] = true;
            theSelection.iCSize[3] = theSelection.csizeh;
        }

        // Для случая пермешениея маркера
        var iFW, iFH;
        if (theSelection.bDrag[0]) {
            var iFX = iMouseX - theSelection.px;
            var iFY = iMouseY - theSelection.py;
            iFW = theSelection.w + theSelection.x - iFX;
            iFH = theSelection.h + theSelection.y - iFY;
        }
        if (theSelection.bDrag[1]) {
            var iFX = theSelection.x;
            var iFY = iMouseY - theSelection.py;
            iFW = iMouseX - theSelection.px - iFX;
            iFH = theSelection.h + theSelection.y - iFY;
        }
        if (theSelection.bDrag[2]) {
            var iFX = theSelection.x;
            var iFY = theSelection.y;
            iFW = iMouseX - theSelection.px - iFX;
            iFH = iMouseY - theSelection.py - iFY;
        }
        if (theSelection.bDrag[3]) {
            var iFX = iMouseX - theSelection.px;
            var iFY = theSelection.y;
            iFW = theSelection.w + theSelection.x - iFX;
            iFH = iMouseY - theSelection.py - iFY;
        }

        if (iFW > theSelection.csizeh * 2 && iFH > theSelection.csizeh * 2) {
            theSelection.w = iFW;
            theSelection.h = iFH;

            theSelection.x = iFX;
            theSelection.y = iFY;
        }

        drawScene();
    }

    function cropMouseDown(e, isMobile){
        var canvasOffset = $(canvas).offset();
        if(isMobile){
            iMouseX = Math.floor(e.touches[0].pageX - canvasOffset.left);
            iMouseY = Math.floor(e.touches[0].pageY - canvasOffset.top);
        }else{
            iMouseX = Math.floor(e.pageX - canvasOffset.left);
            iMouseY = Math.floor(e.pageY - canvasOffset.top);
        }


        theSelection.px = iMouseX - theSelection.x;
        theSelection.py = iMouseY - theSelection.y;

        if (theSelection.bHow[0]) {
            theSelection.px = iMouseX - theSelection.x;
            theSelection.py = iMouseY - theSelection.y;
        }
        if (theSelection.bHow[1]) {
            theSelection.px = iMouseX - theSelection.x - theSelection.w;
            theSelection.py = iMouseY - theSelection.y;
        }
        if (theSelection.bHow[2]) {
            theSelection.px = iMouseX - theSelection.x - theSelection.w;
            theSelection.py = iMouseY - theSelection.y - theSelection.h;
        }
        if (theSelection.bHow[3]) {
            theSelection.px = iMouseX - theSelection.x;
            theSelection.py = iMouseY - theSelection.y - theSelection.h;
        }


        if (iMouseX > theSelection.x + theSelection.csizeh && iMouseX < theSelection.x+theSelection.w - theSelection.csizeh &&
            iMouseY > theSelection.y + theSelection.csizeh && iMouseY < theSelection.y+theSelection.h - theSelection.csizeh) {

            theSelection.bDragAll = true;
        }

        for (i = 0; i < 4; i++) {
            if (theSelection.bHow[i]) {
                theSelection.bDrag[i] = true;
            }
        }
    }

    function cropMouseUp(e){
        theSelection.bDragAll = false;

        for (i = 0; i < 4; i++) {
            theSelection.bDrag[i] = false;
        }
        theSelection.px = 0;
        theSelection.py = 0;
    }

    $(function(){
        $('#panel_preview, #panel_detail').mousemove(function(e) { // Привязываем событие мыши
            cropMouseMove(e, false);
        });
        $('#panel_preview, #panel_detail').mousedown(function(e) { // Привязываем событие мыши
            cropMouseDown(e, false);
        });

        $('#panel_preview, #panel_detail').mouseup(function(e) { // Привязываем событие мыши
            cropMouseUp(e);
        });

        document.getElementById('panel_detail').addEventListener('touchstart', function(e) {
            e.preventDefault();
            e.stopPropagation();
            cropMouseDown(e, true);
        }, false);

        document.getElementById('panel_detail').addEventListener('touchmove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            cropMouseMove(e, true);
        }, false);

        document.getElementById('panel_detail').addEventListener('touchend', function(e) {
            e.preventDefault();
            e.stopPropagation();
            cropMouseUp(e, true);
        }, false);

        document.getElementById('panel_preview').addEventListener('touchstart', function(e) {
            e.preventDefault();
            e.stopPropagation();
            cropMouseDown(e, true);
        }, false);

        document.getElementById('panel_preview').addEventListener('touchmove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            cropMouseMove(e, true);
        }, false);

        document.getElementById('panel_preview').addEventListener('touchend', function(e) {
            e.preventDefault();
            e.stopPropagation();
            cropMouseUp(e, true);
        }, false);
    });


    //PREVIEW CROP
    function getPreviewResults() {
        var temp_ctx, temp_canvas;
        temp_canvas = document.createElement('canvas');
        temp_ctx = temp_canvas.getContext('2d');
        temp_canvas.width = theSelection.w;
        temp_canvas.height = theSelection.h;
        temp_ctx.drawImage(image, theSelection.x, theSelection.y, theSelection.w, theSelection.h, 0, 0, theSelection.w, theSelection.h);
        var vData = temp_canvas.toDataURL('image/jpeg');
        $('#crop_result_preview').attr('src', vData);
    }


    $(document).on('click','.crop-preview-add', function(){
        if($('#crop_result_preview').attr('src') != ''){
            $('#preview_crop').attr('src', $('#crop_result_preview').attr('src'));
            $('input[name="p_crop"]').attr('value', $('#crop_result_preview').attr('src'));
        }
    });

    $(document).on('click','.crop-preview-modal',function(){
        var img = $('#preview img').attr('src');

        // Загружаем исходное изображение
        image = new Image();
        image.onload = function () {
        }
        image.src = img;

        $('#panel_preview').attr('width',image.width).attr('height',image.height);

        // Создаем элемент canvas и объект context
        canvas = document.getElementById('panel_preview');
        ctx = canvas.getContext('2d');

        if(Number(image.width) > 256){
            var _w = 256;
        }else{
            var _w = Number(image.width);
        }

        if(Number(image.height) > 200){
            var _h = 200;
        }else{
            var _h = Number(image.height);
        }
        // Создаем исходное выделение
        theSelection = new Selection(0, 0, _w, _h);

        drawScene();
    });
    //PREVIEW CROP END
    var url = window.location.href;
    //DETAIL CROP
    function getDetailResults() {
        var temp_ctx, temp_canvas;
        temp_canvas = document.createElement('canvas');
        temp_ctx = temp_canvas.getContext('2d');
        temp_canvas.width = theSelection.w;
        temp_canvas.height = theSelection.h;
        temp_ctx.drawImage(image, theSelection.x, theSelection.y, theSelection.w, theSelection.h, 0, 0, theSelection.w, theSelection.h);
        var vData = temp_canvas.toDataURL('image/jpeg');
        $('#crop_result_detail').attr('src', vData);
    }

    $(document).on('click','.crop-detail-modal',function(){
        var img = $('#detail img').attr('src');

        // Загружаем исходное изображение
        image = new Image();
        image.onload = function () {

        }
        image.src = img;

        $('#panel_detail').attr('width',image.width).attr('height',image.height);

        // Создаем элемент canvas и объект context
        canvas = document.getElementById('panel_detail');
        ctx = canvas.getContext('2d');

        if(url.indexOf('/deck') != -1){
            box_width = 794;
            box_height = 250;
        }else{
            box_width = 1170;
            box_height = 500;
        }

        if(Number(image.width) > box_width){
            var _w = box_width;
        }else{
            var _w = Number(image.width);
        }

        if(Number(image.height) > box_height){
            var _h = box_height;
        }else{
            var _h = Number(image.height);
        }
        // Создаем исходное выделение
        theSelection = new Selection(0, 0, _w, _h);

        drawScene();
    });

    $(document).on('click','.crop-detail-add', function(){
        if($('#crop_result_detail').attr('src') != ''){
            $('#detail_crop').attr('src', $('#crop_result_detail').attr('src'));
            $('input[name="d_crop"]').attr('value', $('#crop_result_detail').attr('src'));
        }
    });
    //DETAIL CROP END
//CROP CROP END


