<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourierModel;
use App\Models\PaymentModel;
use App\Models\TransactionModel;
use App\Models\UsersModel;
use App\Models\StockModel;
use Dompdf\Dompdf;

class Invoice extends BaseController
{
    protected $data;
    protected $transaction;
    protected $courier;
    protected $payment;
    protected $stock;
    protected $user;

    public function __construct()
    {
        $this->transaction = new TransactionModel();
        $this->stock = new StockModel();
        $this->courier = new CourierModel();
        $this->payment = new PaymentModel();
        $this->user = new UsersModel();
    }

    public function index()
    {
        $this->data["data"] = $this->transaction->select('*')->orderBy('id', 'DESC')->limit(1)->first();
        echo view('/templates/header', $this->data);
        echo view('/store/confirm-view.php', $this->data);
        echo view('/templates/footer');
    }

    public function updateStatus(){
        $this->transaction->where(['id' => $this->request->getPost('id')])->set('status','paid')->update();
        redirect()->to('/invoice');
    }

    public function pdfGenerator(){
        $dompdf = new Dompdf();
        $transaction = $this->transaction->select('*')->orderBy('id', 'DESC')->limit(1)->first();
        $delivery = $this->courier->select('price')->where(['courier_name' => $transaction['delivery_courier']])->first();
        $payment = $this->payment->select('admin_fee')->where(['payment_method' => $transaction['payment_method']])->first();
        $data = [
            'imageSrc'    => $this->imageToBase64(ROOTPATH . 'public\assets\logo.png'),
            'item_name'         => $transaction['item_name'],
            'quantity' => $transaction['quantity'],
            'price'        => $transaction['price'],
            'payment_method' => $transaction['payment_method'],
            'delivery_courier' => $transaction['delivery_courier'],
            'address' => $transaction['address'],
            'total_price' => $transaction['total_price'],
            'delivery_price' => $delivery['price'],
            'admin_fee' => $payment['admin_fee'],
            'delivery_courier' => $transaction['delivery_courier'],
            'payment_method' => $transaction['payment_method'],   
            'id' => $transaction['id'],
            'created_at' => $transaction['created_at'],
            'user' => $transaction['user']
        ];
        $html = view('store/invoice.php', $data);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('invoice.pdf', [ 'Attachment' => false ]);
    }

    public function cartInv($id = ''){
        $transaction = $this->transaction->select('*')->orderBy('id', 'DESC')->limit(1)->first();
        $delivery = $this->courier->select('price')->where(['courier_name' => $transaction['delivery_courier']])->first();
        $payment = $this->payment->select('admin_fee')->where(['payment_method' => $transaction['payment_method']])->first();
        $dompdf = new Dompdf();
        $transaction = $this->transaction->select('*')->where(['id' => $id])->first();
        $data = [
            'imageSrc'    => $this->imageToBase64(ROOTPATH . 'public\assets\logo.png'),
            'item_name'         => $transaction['item_name'],
            'quantity' => $transaction['quantity'],
            'price'        => $transaction['price'],
            'payment_method' => $transaction['payment_method'],
            'delivery_courier' => $transaction['delivery_courier'],
            'address' => $transaction['address'],
            'total_price' => $transaction['total_price'],
            'delivery_price' => $delivery['price'],
            'admin_fee' => $payment['admin_fee'],
            'delivery_courier' => $transaction['delivery_courier'],
            'payment_method' => $transaction['payment_method'],   
            'id' => $transaction['id'],
            'created_at' => $transaction['created_at'],
            'user' => $transaction['user']
        ];
        $html = view('store/invoice.php', $data);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('invoice.pdf', [ 'Attachment' => false ]);
    }

    private function imageToBase64($path) {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    
}
