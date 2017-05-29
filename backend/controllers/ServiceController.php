<?php
namespace backend\controllers;

use backend\models\Card;

class ServiceController extends AppController
{
    const RESULTS_DIR = '/results/';
    const DATA_DIR = '/data/';

    public function actionExecute(){
        //echo $this->getHtmlDownloadCards('',false);
        
        /*$result = $this->checkImagesSize(307, 465, \Yii::getAlias("@backend").'/web/data/cards/ru/');
        echo '<pre>';print_r($result); echo '</pre>';*/

        //$this->resizeImages(\Yii::getAlias("@backend").'/web/data/cards/ru/', \Yii::getAlias("@backend").'/web/data/cards/rute/');

        //$this->cropPng(\Yii::getAlias('@backend')."/web/data/cards/en/AT_001.png", \Yii::getAlias('@backend')."/web/data/cards/AT_001test.png", 55, 150, 140, 40, 200, 40, 0);

        //$this->cropDeck(\Yii::getAlias('@backend')."/web/data/cards/en/", \Yii::getAlias('@backend')."/web/data/cards/crop/");

        $dirWithRuCards = \Yii::getAlias('@backend')."/web/data/cards/ru/";
        $dirWithEnCards = \Yii::getAlias('@backend')."/web/data/cards/en/";
        $tempDir = \Yii::getAlias('@backend')."/web/data/cards/temp1/";
        $dirWithResults = \Yii::getAlias('@backend')."/web/data/cards/result1/";

        $card['type'] = 'dd';

       /* //FIRST PART
        $right = 52;
        $top = 285;
        $width = 210;
        $height = 70;
        $this->cropPng($dirWithRuCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
        //include one ru crop to en card
        $this->includeOnPng($tempDir.$file, $dirWithEnCards.$file, $width, $height, $dirWithResults.$file, 307, 345, $top, $right);
        //THIRD PART
        $right = 42;
        $top = 232;
        $width = 230;
        $height = 3;
        $this->cropPng($dirWithRuCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
        //include one ru crop to en card
        $this->includeOnPng($tempDir.$file,   $dirWithEnCards.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top+13, $right-5);
        //OLD CARDS END
        die();
        if($card['type'] == 'Заклинание' || $card['type'] == ''){
            //SECOND PART
            $right = 55;
            $top = 355;
            $width = 200;
            $height = 50;
            $this->cropPng($dirWithRuCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
            //include one ru crop to en card
            $this->includeOnPng($tempDir.$file,   $dirWithResults.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top, $right);
        }elseif($card['type'] == 'Оружие'){
            //SECOND PART
            $right = 65;
            $top = 355;
            $width = 180;
            $height = 50;
            $this->cropPng($dirWithRuCards.$file,$tempDir.$file,65,353,180,$height, $width, $height,0);
            //include one ru crop to en card
            $this->includeOnPng($tempDir.$file,   $dirWithResults.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top, $right);
        }else{
            //SECOND PART/1
            $right = 66;
            $top = 365;
            $width = 176;
            $height = 18;
            $this->cropPng($dirWithRuCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
            //include one ru crop to en card
            $this->includeOnPng($tempDir.$file,   $dirWithResults.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top, $right);


            //SECOND PART/2
            $right = 80;
            $top = 350;
            $width = 146;
            $height = 50;
            $this->cropPng($dirWithRuCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
            //include one ru crop to en card
            $this->includeOnPng($tempDir.$file,   $dirWithResults.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top, $right);
        }*/

        $file = "UNG_037.png";
        //SECOND PART/1
        $right = 70;
        $top = 393;
        $width = 158;
        $height = 39;
        /*$right = 65;
        $top = 399;
        $width = 158;
        $height = 50;*/
        $this->cropPng($dirWithEnCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
        //include one ru crop to en card
        $this->includeOnPng($tempDir.$file,   $dirWithRuCards.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top-11, $right+7);

        //OLD CARDS
        //$this->translateUngoroCards(\Yii::getAlias('@backend')."/web/data/cards/ru/", \Yii::getAlias('@backend')."/web/data/cards/en/", \Yii::getAlias('@backend')."/web/data/cards/result/", \Yii::getAlias('@backend')."/web/data/cards/temp/");


    }

    public function translateUngoroCards($dirWithRuCards, $dirWithEnCards, $dirWithResults, $tempDir){
        $arCards = Card::find()->where(['=','pack',"Экспедиция в Ун'Горо"])->all();

        foreach ($arCards as $card){
            $file = $card['png'];

            $right = 84;
            $top = 395;
            $width = 147;
            $height = 50;
            $this->cropPng($dirWithEnCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
            //include one ru crop to en card
            $this->includeOnPng($tempDir.$file,   $dirWithRuCards.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top-9, $right);

        }

    }

    public function translateOldCards($dirWithRuCards, $dirWithEnCards, $dirWithResults, $tempDir){
        $arCards = Card::find()->where(['!=','pack',"Экспедиция в Ун'Горо"])->all();

        //$arFiles = scandir($dirWithRuCards);
        $i=0;
        foreach ($arCards as $card){
            $file = $card['png'];

            //FIRST PART
            $right = 50;
            $top = 305;
            $width = 206;
            $height = 70;
            $this->cropPng($dirWithRuCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
            //include one ru crop to en card
            $this->includeOnPng($tempDir.$file, $dirWithEnCards.$file, $width, $height, $dirWithResults.$file, 307, 345, $top, $right);

            //THIRD PART
            $right = 42;
            $top = 235;
            $width = 225;
            $height = 50;
            $this->cropPng($dirWithRuCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
            //include one ru crop to en card
            $this->includeOnPng($tempDir.$file,   $dirWithResults.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top, $right);
            //OLD CARDS END

            if($card['type'] == 'Заклинание' || $card['type'] == ''){
                //SECOND PART
                $right = 55;
                $top = 355;
                $width = 200;
                $height = 50;
                $this->cropPng($dirWithRuCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);//54,353,201
                //include one ru crop to en card
                $this->includeOnPng($tempDir.$file,   $dirWithResults.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top, $right);
            }elseif($card['type'] == 'Оружие'){
                //SECOND PART
                $right = 65;
                $top = 355;
                $width = 180;
                $height = 50;
                $this->cropPng($dirWithRuCards.$file,$tempDir.$file,65,353,180,$height, $width, $height,0);
                //include one ru crop to en card
                $this->includeOnPng($tempDir.$file,   $dirWithResults.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top, $right);
            }else{
                //SECOND PART/1
                $right = 66;
                $top = 365;
                $width = 176;
                $height = 18;
                $this->cropPng($dirWithRuCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
                //include one ru crop to en card
                $this->includeOnPng($tempDir.$file,   $dirWithResults.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top, $right);


                //SECOND PART/2
                $right = 80;
                $top = 350;
                $width = 146;
                $height = 50;
                $this->cropPng($dirWithRuCards.$file,$tempDir.$file,$right,$top,$width,$height, $width, $height,0);
                //include one ru crop to en card
                $this->includeOnPng($tempDir.$file,   $dirWithResults.$file, $width, $height,  $dirWithResults.$file, 307, 345, $top, $right);
            }
            $i++;
        }
    }

    /**
     * Check files in dir by width and height
     * @param int $w
     * @param int $h
     * @param string $dir
     * @return array
     *
     */
    public function checkImagesSize($w, $h, $dir){
        $greyDucks = [];
        $arFiles = scandir($dir);
        $i=0;
        foreach ($arFiles as $file){
            if($file == '.' || $file == '..') continue;

            $size = getimagesize($dir.$file);
            if($size[0] == $w && $size[1]==$h){
                continue;
            }
            $greyDucks[$i]['file'] = $file;
            $greyDucks[$i]['width'] = $size[0];
            $greyDucks[$i]['height'] = $size[1];
            $i++;
        }

        return $greyDucks;
    }

    /**
     * Parse info to serialized array and save to file from allmmorpg with help
     * of saved .html file with card list
     * @param string $resultFileName
     * @param string $savedCardsPage
     * @return int
     */
    public function parseFromAllMmoRpg($resultFileName, $savedCardsPage){
        if(file_exists($resultFileName)){
            die('Файл с результатом уже существует.');
        }

        $allCardsPage = $_SERVER['DOCUMENT_ROOT'].self::DATA_DIR.$savedCardsPage;
        $allCardsPageContent = file_get_contents($allCardsPage);
        preg_match_all("/http\:\/\/www\.allmmorpg\.ru\/card\/\?id\=(.*?)\"/",$allCardsPageContent,$out);
        //$out[0] - links | $out[1] - ids
        $arCards = [];
        $i=0;
        foreach ($out[0] as $k=>$link){
            $id = $out[1][$k];
            $l = str_replace('"','',$link);
            $content = file_get_contents($l);
            preg_match_all('#<b class="q">(.+?)</b>#is',$content,$name);
            preg_match_all('#<div>Класс:(.+?)</div>#is',$content,$class);
            preg_match_all('#<div>Тип:(.+?)</div>#is',$content,$type);
            preg_match_all('#<div>Набор:(.+?)</div>#is',$content,$pack);
            preg_match_all('#<div>Качество:(.+?)</div>#is',$content,$quality);
            preg_match_all('#<span class="hearthstone-cost" title="Цена">(.+?)</span>#is',$content,$cost);
            preg_match_all('#<span class="hearthstone-attack" title="Атака">(.+?)</span>#is',$content,$attack);
            preg_match_all('#<span class="hearthstone-health" title="Здоровье">(.+?)</span>#is',$content,$health);
            preg_match_all('#<span class="q2">(.+?)</span>#is',$content,$desc);
            preg_match_all('#<span class="q"><i>(.+?)</i></span>#is',$content,$history);
            preg_match_all("#src='//(.+?).png'>#is",$content,$simple);
            if($simple == '.png'){
                preg_match_all("#src='http://(.+?).png'>#is",$content,$simple);
            }
            preg_match_all("#src='//(.+?).gif'>#is", $content,$golden);

            $arCards[$id]['name'] = trim($name[1][0]);
            $arCards[$id]['class'] = trim($class[1][0]);
            $arCards[$id]['type'] = trim($type[1][0]);
            $arCards[$id]['pack'] = trim($pack[1][0]);
            $arCards[$id]['quality'] = trim($quality[1][0]);
            $arCards[$id]['cost'] = trim($cost[1][0]);
            $arCards[$id]['attack'] = trim($attack[1][0]);
            $arCards[$id]['health'] = trim($health[1][0]);
            $arCards[$id]['description'] = trim($desc[1][0]);
            $arCards[$id]['history'] = trim($history[1][0]);
            $arCards[$id]['card']['simple'] = array_pop(explode("/",$simple[1][0])).".png";
            $arCards[$id]['card']['golden'] = array_pop(explode("/",$golden[1][0])).".gif";


            //edit name
            $str = $arCards[$id]['name'];
            $str = str_replace("\\","",$str);
            $str = preg_replace('#"(.*?)"#', '«$1»', $str);
            $arCards[$id]['name'] = trim(strip_tags($str));
            $simple = str_replace('_premium.gif','',$arCards[$id]['card']['golden']);
            $arCards[$id]['card']['simple']=$simple.'.png';
            $i++;
        }

        $input = $_SERVER['DOCUMENT_ROOT'].self::RESULTS_DIR.$resultFileName;
        file_put_contents($input, serialize($arCards));

        return $i;
    }

    /**
     * Return unserialized array from result file
     * @param string $resultFileName
     * @return array
     */
    public function getResultFileData($resultFileName){
        $ser = $_SERVER['DOCUMENT_ROOT'].self::RESULTS_DIR.$resultFileName;
        $arCards = file_get_contents($ser);
        return unserialize($arCards);
    }

    /**
     * @param string $resultFileName
     * @param int $iterations
     * @return int
     */
    public function parseEnglishNames($resultFileName, $iterations = 25){
        $ser = $_SERVER['DOCUMENT_ROOT'].self::RESULTS_DIR.$resultFileName;
        $arCards = file_get_contents($ser);
        $arCards = unserialize($arCards);

        $i=0;
        foreach ($arCards as $k=>$arCard){
            if($arCard['name_en'] != ''){
                continue;
            }
            $card = $arCard['name'];
            $card = str_replace("\\","",$card);
            $card = preg_replace('#"(.*?)"#', '«$1»', $card);

            $str = urlencode("hearthstone.buffed.de ".$card);
            $content = file_get_contents("https://nova.rambler.ru/search?scroll=1&utm_source=nhp&utm_content=search&utm_medium=button&utm_campaign=self_promo&query={$str}");

            $content = str_replace(["<b>","</b>"],'',$content);
            $card = explode("'",$card);
            $card = $card[count($card)-1];
            preg_match_all("#{$card} / (.+?) -#is",$content,$name);

            if($name[1][0] != '' && strlen($name[1][0]) < 50){
                $arCards[$k]['name_en'] = $name[1][0];
                $i++;
            }
            sleep(1);
            if($i==$iterations){
                break;
            }

        }
        $input = $_SERVER['DOCUMENT_ROOT'].self::RESULTS_DIR.$resultFileName;
        file_put_contents($input, serialize($arCards));

        return $i;
    }

    /**
     * Return HTML with links to download cards files
     * @param string $resultFileName
     * @param boolean $en
     * @return string
     */
    public function getHtmlDownloadCards($resultFileName='', $en=true){
        if($resultFileName != ''){
            $ser = $_SERVER['DOCUMENT_ROOT'].self::RESULTS_DIR.$resultFileName;
            $arCards = file_get_contents($ser);
            $arCards = unserialize($arCards);
        }else{
            $arCards = Card::find()->asArray()->all();
        }

        ob_start();
        foreach ($arCards as $card){?>
            <?php if(!$en){?>
                <a class='png' href='http://www.allmmorpg.ru/wp-content/uploads/cards/<?= $card['png'] ?>' download><?=$card['name']?> - SIMPLE</a><br/>
            <?php } ?>
            <a class='png' href='<?=($en) ? "http://media.services.zam.com/v1/media/byName/hs/cards/enus/" :"//wow.zamimg.com/images/hearthstone/cards/ruru/original/"?><?=($resultFileName != '')
 ? $card['card']['simple'] : $card['png'] ?>' download><?=$card['name']?> - SIMPLE</a><br/>

            <?php if($en){?>
            <a class='gif' href='http://media.services.zam.com/v1/media/byName/hs/cards/enus/animated/<?=($resultFileName != '') ? $card['card']['golden'] : $card['gif']?>' download><?=$card['name']?> - GOLDEN</a><br/>
                <?php } ?>
        <?php } ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <button id="png">Скачать PNG</button>
        <button id="gif">Скачать GIF</button>

        <script>
            function sleep(milliseconds) {
                var start = new Date().getTime();
                for (var i = 0; i < 1e7; i++) {
                    if ((new Date().getTime() - start) > milliseconds){
                        break;
                    }
                }
            }
            $(document).on('click','#png',function(e){
                for(var i=0;i<$('.png').length; i++){
                    var link = $('.png')[i];
                    var linkEvent = document.createEvent('MouseEvents');
                    linkEvent.initEvent('click', true, true);
                    link.dispatchEvent(linkEvent);
                    sleep(1000);
                }
                e.preventDefault();
            });

            $(document).on('click','#gif',function(e){
                for(var i=0;i<$('.gif').length; i++){
                    var link = $('.gif')[i];
                    var linkEvent = document.createEvent('MouseEvents');
                    linkEvent.initEvent('click', true, true);
                    link.dispatchEvent(linkEvent);
                    sleep(1000);
                }
                e.preventDefault();
            });
        </script>
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }


    public function parseDeck($link){
        $content = file_get_contents($link);

        preg_match_all('#<h1 class="entry-title">(.+?)</h1>#is',$content,$title);
        preg_match_all('#<span class="card-name">(.+?)</span>#is',$content,$name);
        preg_match_all('#<span class="card-count">(.+?)</span>#is',$content,$count);

        $deck = [];
        $deck['title']=$title[1][0];
        foreach($name[1] as $k=>$card){
            $deck['deck'][$k+1]['name']=str_replace("&#8217;","'",$card);
            $deck['deck'][$k+1]['count']=$count[1][$k];
        }
        $arCost = [
            'Легендарный' => 1600,
            'Эпический'   => 400,
            'Редкий'      => 100,
            'Обычный'     => 40,  //!!!
            'Бесплатный'  => 0,
        ];

        $ser = $_SERVER['DOCUMENT_ROOT']."/results/name_to_card.ser";
        $arCards = file_get_contents($ser);
        $arCards = unserialize($arCards);

        $sumCost = 0;
        foreach($deck['deck'] as $card){
            if($arCards[$card['name']]['pack'] != 'Базовые'){
                $cost = $arCost[$arCards[$card['name']]['quality']] * $card['count'];
                $sumCost += $cost;
                //echo "card - ".$arCards[$card['name']]['name']." | cost - ".$arCost[$arCards[$card['name']]['quality']] * $card['count']."<br/>";
            }
            //echo "card - ".$arCards[$card['name']]['name']." | cost - ".$arCost[$arCards[$card['name']]['quality']] * $card['count']."<br/>";

        }

        $deck['cost'] = $sumCost;
        echo '<pre>';print_r($deck); echo '</pre>';

        echo '<pre>';print_r($arCards); echo '</pre>';
    }

    public function insertCards(){
        $host = 'localhost';
        $database = 'cardstone';
        $user = 'root';
        $password = '';


        $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));

        $createTable = "
        CREATE TABLE IF NOT EXISTS cards 
        (
            id INT NOT NULL AUTO_INCREMENT, 
            PRIMARY KEY(id), 
            name VARCHAR(255), 
            name_en VARCHAR(255), 
            class VARCHAR(255), 
            type VARCHAR(255), 
            pack VARCHAR(255), 
            quality VARCHAR(255), 
            cost INTEGER(2), 
            attack INTEGER(2), 
            health INTEGER(2), 
            description VARCHAR(255), 
            history VARCHAR(255), 
            png VARCHAR(25), 
            gif VARCHAR(25)
        );
        ";
        $result = mysqli_query($link, $createTable) or die("Ошибка " . mysqli_error($link));


        $ser = $_SERVER['DOCUMENT_ROOT']."/results/result_en.ser";
        $arCards = file_get_contents($ser);
        $arCards = unserialize($arCards);

        foreach($arCards as $id=>$card){
            $sql = '
        INSERT INTO `cards` (id, name, name_en,class, type, pack, quality, cost, attack, health, description, history, png, gif) 
        VALUES (
        "'.$id.'", 
        "'.$card["name"].'", 
        "'.$card["name_en"].'", 
        "'.$card["class"].'", 
        "'.$card["type"].'", 
        "'.$card["pack"].'", 
        "'.$card["quality"].'", 
        "'.$card["cost"].'", 
        "'.$card["attack"].'", 
        "'.$card["health"].'", 
        "'.$card["description"].'", 
        "'.$card["history"].'", 
        "'.$card["card"]["simple"].'", 
        "'.$card["card"]["golden"].'");';

            // echo '<pre>';print_r($sql); echo '</pre>';die();
            $result = mysqli_query($link, $sql);
            if(!$result){
                echo mysqli_error($link)."\n";

            }
        }


        mysqli_close($link);
    }

    /**
     * Resize cards to one format(307x465)
     * @param string $dirWithImages
     * @param string $destinationDir
     * @param int $width
     * @param int $height
     * @return int
     */
    public function resizeImages($dirWithImages, $destinationDir, $width=307, $height=465){
        $i=0;
        $arFiles = scandir($dirWithImages);
        foreach ($arFiles as $file){
            if($file == '.' || $file == '..') continue;

            $size = getimagesize($dirWithImages.$file);
            if($size[0] == $width && $size[1]==$height){
                continue;
            }
            $this->resizePng($width,$height,$dirWithImages.$file,$destinationDir.$file);
            $i++;
        }

        return $i;
    }

    /**
     * Crop cards images for the deck
     * @param string $dirWithImages
     * @param string $destinationDir
     * @return int
     */
    public function sliceCardsToDeck($dirWithImages, $destinationDir){
        $arFiles = scandir($dirWithImages);
        $i=0;
        foreach ($arFiles as $file){
            if($file == '.' || $file == '..') continue;
            if(file_exists($destinationDir.$file)) continue;

            $this->cropPng($file, $destinationDir);
            $i++;
        }

        return $i;
    }

    public function translateCards($dirWithRuCards, $dirWithEnCards, $dirWithResults, $tempDir){
        $arFiles = scandir($dirWithRuCards);

        foreach ($arFiles as $file){
            if($file == '.' || $file == '..') continue;

            $this->cropPng($dirWithRuCards.$file,$tempDir.$file,0,55,307,345, 307, 345,0);
            //include one ru crop to en card
            $this->includeOnPng($tempDir.$file, $dirWithEnCards.$file, 307, 345, $dirWithResults.$file, 307, 465, 55);
        }
    }

    /**
     * Crop Image(default deck images)
     * @param $image
     * @param $destination
     * @param int $x_o
     * @param int $y_o
     * @param int $w_o
     * @param int $h_o
     * @param int $dest_w
     * @param int $dest_h
     * @param int $bottom
     */
    protected function cropPng($image, $destination, $x_o=40, $y_o=68, $w_o=120, $h_o=40, $dest_w=307, $dest_h=40, $bottom=0){
        $image = imagecreatefrompng($image);
        $size = min(imagesx($image), imagesy($image));
        $image2 = imagecrop($image, ['x' => $x_o, 'y' => $y_o, 'width' => $w_o, 'height' => $h_o]);

        //Создаем полноцветное изображение
        $destination_resource=imagecreatetruecolor($dest_w, $dest_h);

        //Отключаем режим сопряжения цветов
        imagealphablending($destination_resource, false);

        //Включаем сохранение альфа канала
        imagesavealpha($destination_resource, true);

        // Allocate a transparent color and fill the new image with it.
        // Without this the image will have a black background instead of being transparent.
        $transparent = imagecolorallocatealpha( $destination_resource, 0, 0, 0, 127 );
        imagefill( $destination_resource, 0, 0, $transparent );

        //Ресайз
        imagecopyresampled($destination_resource, $image2, $dest_w-$w_o, $bottom, 0, 0, $w_o, $h_o, imagesx($image2), imagesy($image2));

        //Сохранение
        imagepng($destination_resource, $destination);
    }

    protected function cropDeck($dirWithImages, $destinationDir){
        $arFiles = scandir($dirWithImages);
        $i=0;
        foreach ($arFiles as $file){
            if($file == '.' || $file == '..') continue;
            if(file_exists($destinationDir.$file)) continue;

            $this->cropPng($dirWithImages.$file, $destinationDir.$file, 80, 120, 140, 40, 200, 40, 0);
            $i++;

        }

        return $i;
    }

    protected function resizePng($width, $height, $source, $destination){
        $png = imagecreatefrompng($source);

        //Создаем полноцветное изображение
        $destination_resource=imagecreatetruecolor($width, $height);

        //Отключаем режим сопряжения цветов
        imagealphablending($destination_resource, false);

        //Включаем сохранение альфа канала
        imagesavealpha($destination_resource, true);

        //Ресайз
        imagecopyresampled($destination_resource, $png, 0, 0, 0, 0, $width, $height, imagesx($png), imagesy($png));

        //Сохранение
        imagepng($destination_resource, $destination);
    }

    protected function includeOnPng($first, $bg, $w_o, $h_o, $destination, $dest_w, $dest_h, $bottom=0, $sdvig)
    {
        //Создаем полноцветное изображение
        $destination_resource = imagecreatefrompng($bg);
        $first = imagecreatefrompng($first);

        //Отключаем режим сопряжения цветов
        imagealphablending($destination_resource, false);

        //Включаем сохранение альфа канала
        imagesavealpha($destination_resource, true);

        // Allocate a transparent color and fill the new image with it.
        // Without this the image will have a black background instead of being transparent.
        $transparent = imagecolorallocatealpha($destination_resource, 0, 0, 0, 127);
        imagefill($destination_resource, 0, 0, $transparent);

        //Ресайз
        imagecopyresampled($destination_resource, $first, $sdvig, $bottom, 0, 0, $w_o, $h_o, imagesx($first), imagesy($first));


        //Сохранение
        imagepng($destination_resource, $destination);
    }
}