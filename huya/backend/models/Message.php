<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Message".
 *
 * @property integer $message_id
 * @property string $message_content
 * @property integer $message_type
 */
class Message extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'huya_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_content'], 'string'],
            [['message_type'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'message_id' => 'Message ID',
            'message_content' => 'Message Content',
            'message_type' => 'Message Type',
        ];
    }
}
