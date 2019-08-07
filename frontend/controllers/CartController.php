<?php

namespace frontend\controllers;

use common\classes\Debug;
use frontend\models\Cart;
use frontend\models\Product;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionAdd($id)
    {
        $product = Product::findOne($id);
        if(empty($product)) {
            return false;
        }
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionClear()
    {
        $session = \Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem($id)
    {
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionShow()
    {
        $session = \Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
}