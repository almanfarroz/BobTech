<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourierModel;
use App\Models\PaymentModel;
use App\Models\TransactionModel;
use App\Models\StockModel;

class Transaction extends BaseController
{
    protected $data;
    protected $transaction;
    protected $courier;
    protected $payment;
    protected $stock;

    public function __construct()
    {
        $this->transaction = new TransactionModel();
        $this->stock = new StockModel();
        $this->courier = new CourierModel();
        $this->payment = new PaymentModel();
    }

    public function index()
    {
        $transaction = new TransactionModel();

        $transArr = $transaction->select('*')->orderBy('id', 'DESC')->limit(1)->first();

        $pay = $transArr['payment_method'];
        $cour = $transArr['delivery_courier'];

        $this->data["data"] = $this->transaction->select('*')->orderBy('id', 'DESC')->limit(1)->first();
        $this->data["courierArr"] = $this->courier->select('*')->where(['courier_name' => $cour])->first();
        $this->data["paymentArr"] = $this->payment->select('*')->where(['payment_method' => $pay])->first();
        echo view('/templates/header', $this->data);
        echo view('/store/transaction-view.php', $this->data);
        echo view('/templates/footer');
    }

    public function AddTransaction(){
        $payment = new PaymentModel();
        $courier = new CourierModel();

        $paymentMethod =  $this->request->getPost('payment_method');
        $courierName = $this->request->getPost('courier');

        $paymentAdmin = $payment->select('payment_method, admin_fee')->where([
            'payment_method' => $paymentMethod,
        ])->first();
        $courierPrice = $courier->select('courier_name, price')->where([
            'courier_name' => $courierName,
        ])->first();

        $pay = $paymentAdmin['admin_fee'];
        $cour = $courierPrice['price'];

        $this->transaction->insert([
            'item_name' => $this->request->getPost('item_name'),
            'size' => $this->request->getPost('size'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
            'payment_method' => $this->request->getPost('payment_method'),
            'delivery_courier' => $this->request->getPost('courier'),
            'total_price' => $this->request->getPost('quantity')*$this->request->getPost('price')+$pay+$cour,
            'address' => session('address'),
        ]);

        return redirect()->route('transactions');
    }

    public function updateStatus(){
        $this->transaction->where(['id' => $this->request->getPost('id')])->set('status','paid')->update();
        return redirect()->to('/confirm');
    }
}
