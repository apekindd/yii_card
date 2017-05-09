<!-- Навигация -->
<ul class="nav nav-tabs" role="tablist" style="margin-bottom:30px">
    <li class="active"><a href="#main" aria-controls="posts" role="tab" data-toggle="tab">Основное</a></li>
    <li><a href="#dev" aria-controls="requests" role="tab" data-toggle="tab">Для разроботчика</a></li>
</ul>
<!-- Содержимое вкладок -->
<div class="tab-content">

    <div role="tabpanel" class="tab-pane active" id="main">
        <form method="POST" action="/admin/settings/clear">
            <button class="btn btn-danger" type="submit">Удалить кеш</button>
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="dev">
        <i>Все пользовательские контроллеры в backend или же контроллеры от которых они наследуются - должны <b>обязательно</b>
        <br/>наследоваться от AppController или его наследников(<span style="color:red">Ничего не должно наследоваться от Controller!</span>)</i>
        <!-- Навигация -->
        <ul class="nav nav-tabs" role="tablist" style="margin-bottom:30px">
            <li class="active"><a href="#danger" aria-controls="posts" role="tab" data-toggle="tab">Danger</a></li>
            <li><a href="#warning" aria-controls="requests" role="tab" data-toggle="tab">Warning</a></li>
            <li><a href="#success" aria-controls="requests" role="tab" data-toggle="tab">Normal</a></li>
        </ul>
        <!-- Содержимое вкладок -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" style="color:#181b8e" id="danger">
                <?php
                if(empty($arScan['danger'])){
                    echo "<span class='text-success'>Опасных контроллеров не найдено</span>";
                }else {
                    echo "<span class='text-danger'><i>Данные контроллеры не должны наследоваться от Controller, их следует немедленно исправить</i></span><br/><br/>";
                    $i=1;
                    foreach ($arScan['danger'] as $item):
                        echo "{$i}. {$item['name']} <span style='color:#a953eb'>extends</span> <b style='color:#fc0b06'>{$item['extends']}</b><br/>";
                    $i++;
                    endforeach;
                }
                ?>
            </div>
            <div role="tabpanel" class="tab-pane" style="color:#181b8e" id="warning">
                <?php
                if(empty($arScan['warning'])){
                    echo "<span class='text-success'>Подозрительных контроллеров не найдено</span>";
                }else {
                    echo "<span class='text-danger'><i>Данные контроллеры нуждаются в ручной проверке наслудемых классов</i></span><br/><br/>";
                    $i=1;
                    foreach($arScan['warning'] as $item):
                        echo "{$i}. {$item['name']} <span style='color:#a953eb'>extends</span> <b style='color:#FF9800'>{$item['extends']}</b><br/>";
                        $i++;
                    endforeach;
                }?>
            </div>
            <div role="tabpanel" class="tab-pane" style="color:#181b8e"  id="success">
                <?php
                if(empty($arScan['normal'])){
                    echo "<span class='text-danger'>Нормальных контроллеров не найдено</span>";
                }else {
                    $i=1;
                    foreach($arScan['normal'] as $item):
                        echo "{$i}. {$item['name']} <span style='color:#a953eb'>extends</span> <b style='color:#0ed311'>{$item['extends']}</b><br/>";
                        $i++;
                    endforeach;
                }?>
            </div>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        if(window.location.hash == '#dev'){
            $('.nav-tabs li,.tab-pane').removeClass('active');
            $('a[href="#dev"], a[href="#danger"]').parent().addClass('active');
            $('#dev, #danger').addClass('active');
        }
    });
</script>
