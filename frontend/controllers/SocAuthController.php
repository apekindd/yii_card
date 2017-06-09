<?php
namespace frontend\controllers;


use app\modules\admin\models\SocAuth;

class SocAuthController extends AppController
{
    const USERS_DIR = '/images/public_users/';
    const SOC_TYPES = ['google','facebook'];

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionAuth(){
        if(\Yii::$app->request->isAjax){
            $post = \Yii::$app->request->post();
            $result = [];
            $result['status'] = 'error';

            $id = trim(strip_tags($post['id']));
            $name = trim(strip_tags($post['name']));
            $image = trim(strip_tags($post['image']));
            $type = trim(strip_tags($post['type']));
            if(!in_array($type, self::SOC_TYPES)){
                $result['code'] = 301;
                return json_encode($result);
            }
            if($id != '' && $name != ''){
                $userExists = SocAuth::find()->where(['=','soc_id', $id])->andWhere(['=','soc_type', $type])->limit(1)->all();
                if($userExists){
                    $userExists->auth_string = $this->generateAuthString($userExists->soc_id, $userExists->name);
                    if($userExists->save()){
                        $result['status'] = "success";
                        $result['auth_string'] = $userExists->auth_string;
                        return json_encode($result);
                    }else{
                        $result['code'] = 303;
                        return json_encode($result);
                    }
                }


                $newPublicUser = new SocAuth();
                $newPublicUser->name = $name;
                $newPublicUser->soc_id = $id;
                $newPublicUser->soc_type = $type;
                $newPublicUser->auth_string = $this->generateAuthString($id, $name);
                if($image != ''){
                    $extension = explode('.', $image);
                    if (!file_exists(\Yii::getAlias('@app') . self::USERS_DIR)) {
                        mkdir(\Yii::getAlias('@app') . self::USERS_DIR , 0777, true);
                    }
                    $fileName = md5($id.$name);
                    $copy = copy( $image , \Yii::getAlias('@app').self::USERS_DIR ."{$fileName}.".end($extension));
                    if($copy){
                        $newPublicUser->image = $fileName;
                    }
                }
                if($newPublicUser->save()){
                    $result['status'] = "success";
                    $result['auth_string'] = $newPublicUser->auth_string;
                    return json_encode($result);
                }else{
                    $result['code'] = 302;
                    return json_encode($result);
                }
            }else{
                $result['code'] = 300;
                return json_encode($result);
            }
        }
    }

    protected function generateAuthString($id, $name){
        return md5(md5($id).md5($name).time());
    }
}
?>
