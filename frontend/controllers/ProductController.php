<?php

namespace frontend\controllers;

use frontend\models\Product;
use yii\web\HttpException;

class ProductController extends AppController
{
    public function actionView($id)
    {
        $product = Product::findOne($id);
        if(empty($product)){
            throw new HttpException(404, 'Такого продукта нет');
        }
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER | '. $product->name, $product->keywords, $product->description);

        return $this->render('view', compact('product', 'hits'));
    }
}