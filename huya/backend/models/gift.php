<?php  
namespace app\models;  
use yii\web\UploadedFile;  
use Yii;  
      
    /**  
     * This is the model class for table "upload".  
     *  
     * @property integer $u_id  
     * @property string $u_name  
     * @property string $u_pwd  
     * @property string $u_img  
     */  
    class Gift extends \yii\db\ActiveRecord  
    {  
        /**  
         * @inheritdoc  
         */  
        public static function tableName()  
        {  
            return 'huya_gift';  
        }  
      
        /**  
         * @inheritdoc  
         */  
        public function rules()  
        {  
            return [  
                [['g_name', 'g_img'],  'string', 'max' => 255]  ,
                [['is_free','is_give'],'int',    'max' => 11 ]  ,
            ];  
        }  
      
        /**  
         * @inheritdoc  
         */  
        public function attributeLabels()  
        {  
            return [  
                'id' => 'U ID',  
                'g_name' => 'U Name',  
                'g_img' => 'U Img',  
                'is_free' => 'U Free',
                'is_give' => 'U Give',    
            ];  
        }  
         public function upload(){  
            //$this->p_photo->saveAs('uploads/' . $this->p_photo->baseName . '.' . $this->p_photo->extension);  
            //return true;  
            return $this->u_img->saveAs('upload/' . $this->u_img->baseName . '.' . $this->u_img->extension);  
      
        }  
    }  