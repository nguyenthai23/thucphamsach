<?php

namespace backend\modules\product\models;
use backend\modules\product\models\Dmsanpham;
use Yii;


/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $size
 * @property string $description
 * @property string $image
 * @property int $price
 * @property int $create_time
 * @property int $create_by
 * @property int $update_time
 * @property int $update_by
 * @property int $cate_id
 */
class Quanlysanpham extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size', 'price'], 'string'],
            [[ 'create_time', 'create_by', 'update_time', 'update_by', 'cate_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 2000],
            [['image'], 'string', 'max' => 1000],
        ];
    }

      public function getDmsanpham()
    {
        return $this->hasOne(DmsanphamSearch::className(), ['id' => 'cate_id']);
    }

    /**
     * @inheritdoc
     */
    public function getImageurl($image)
    {
        //var_dump(Yii::$app->request->BaseUrl);die;
        return \Yii::$app->request->BaseUrl.'   '.$image;
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'size' => 'Size',
            'description' => 'Description',
            'image' => 'Image',
            'price' => 'Price',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
            'update_time' => 'Update Time',
            'update_by' => 'Update By',
            'cate_id' => 'Cate ID',
        ];
    }
}
