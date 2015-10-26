<?php
/**
 * This is the model class for table "category"
 *
 * Created by Administrator
 * Date: 04.10.2015
 *
 * @property string $name
 * @property string $description
 * @property boolean $activity
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['name', 'activity'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 60],
            [['activity'], 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'description' => 'Description',
            'activity' => 'Activity'
        ];
    }

    public static function findAllRecords()
    {
        $categoriesArray = static::find()->asArray()->all();
        $result = "";

        foreach ($categoriesArray as $row)
        {
            if($row['activity'] == 1)
            {
                $result .= "<li> <a href='#'>" . $row['name'] . "</a> </li> <hr>";
            }
        }
        return $result;
    }

}