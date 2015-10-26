<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $sku
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $quantity
 * @property double $price
 * @property boolean $activity
 * @property integer $company_id
 *
 * @property CategoryProducts[] $categoryProducts
 * @property OrderProducts[] $orderProducts
 * @property Company $company
 */
class Product extends \yii\db\ActiveRecord
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
            [['id'], 'required'],
            [['id', 'quantity', 'company_id'], 'integer'],
            [['sku', 'name', 'description', 'image'], 'string'],
            [['price'], 'number'],
            [['activity'], 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sku' => 'Sku',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'activity' => 'Activity',
            'company_id' => 'Company ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryProducts()
    {
        return $this->hasMany(CategoryProducts::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProducts::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
