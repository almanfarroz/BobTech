<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\CourierModel;
use App\Models\IncomeOutcomeModel;
use App\Models\PaymentModel;
use App\Models\TransactionModel;
use App\Models\UsersModel;
use App\Models\StockModel;
use App\Models\SupplierModel;
use App\Models\SupplierStockModel;
use Dompdf\Dompdf;

class Admin extends BaseController
{
    protected $data;
    protected $transaction;
    protected $courier;
    protected $payment;
    protected $stock;
    protected $user;
    protected $supplier;
    protected $category;
    protected $supplierstock;
    protected $in_out;

    public function __construct()
    {
        $this->transaction = new TransactionModel();
        $this->stock = new StockModel();
        $this->courier = new CourierModel();
        $this->payment = new PaymentModel();
        $this->user = new UsersModel();
        $this->supplier = new SupplierModel();
        $this->category = new CategoryModel();
        $this->supplierstock = new SupplierStockModel();
        $this->in_out = new IncomeOutcomeModel();
    }

    public function display()
    {
        $arrayComplete = array('status' => 'paid');
       

        $this->data["data"] = $this->transaction->where($arrayComplete)->paginate(10, 'data');
        $this->data["pager"] = $this->transaction->pager;
        $this->data["number"] = nomor($this->request->getVar('page_data'), 10);
        $this->data["stock"] = $this->stock->select('*')->join('suppliers', 'suppliers.id = stock.supplier')->join('category', 'category.id = stock.category')->where(['stock >' => 0])->get()->getResult();
        $this->data["category"] = $this->category->findAll();
        $this->data["supplier"] = $this->supplier->findAll();
        $this->data["in_out"] = $this->in_out->select('*')->first();

        echo view('/templates/header', $this->data);
        echo view('/store/admin-view.php', $this->data);
        echo view('/templates/footer');
    }

    public function stock(){     
        $categoryID = $this->request->getPost('category');
        $supplierID = $this->request->getPost('supplier');
        
        $stock = "<option value='0'> Select Item </option>";
        
        $arrayStock = array('supplier' => $supplierID, 'category' => $categoryID);
        
        $stockdata =  $this->supplierstock->where($arrayStock)->get()->getResult();
        foreach ($stockdata as $value) : 
            $stock.= "<option value='$value->name'> $value->name </option>";
 endforeach;

 

 return $stock;
    }

    public function price(){

        $quantity = $this->request->getPost('quantity');
        $stockName = $this->request->getPost('stock');
        $price = "<p class='text-sm'> Total Price: </p>";
        $priceArray = array('name' => $stockName); 
        $pricedata = $this->supplierstock->where($priceArray)->get()->getResult();
        $this->data["priceData"] = $this->supplierstock->where($priceArray)->get()->getResult();

        foreach ($pricedata as $value) : 
            $totalPrice=$value->price * $quantity;
            $price.= "<p class='text-sm'> Rp.$totalPrice </p> <input type='hidden' value=$value->price name='price'> <input type='hidden' value='$value->imagePath' name='imagePath'>";
        endforeach;

        return $price;
    }

    public function BuyItem(){

        $this->data['stock'] = $this->stock->select('*')->join('suppliers', 'suppliers.id = stock.supplier')->join('category', 'category.id = stock.category')->get()->getResult();
        
        $stockSelect = $this->stock->where(['name' => $this->request->getPost('stock')])->select('*')->get()->getResult();
       

        $this->transaction->insert([
            'item_name' => $this->request->getPost('stock'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
            'total_price' => $this->request->getPost('quantity')*$this->request->getPost('price'),
            'payment_method' => 'BCA',
            'address' => session('address'),
            'user' => session('name'),
            'type' => 'buy',
            'status' => 'paid'
        ]);

        if(count($stockSelect) > 0){
            $stock = $this->stock->select('*')->where(['name' => $this->request->getPost('stock')])->first();
            $stocktotal = $stock['stock'] + $this->request->getPost('quantity');
            $this->stock->set(['stock' => $stocktotal])->where(['name' => $this->request->getPost('stock')])->update();
        } else {

        $sellPrice = $this->request->getPost('price')+$this->request->getPost('price')*(25/100);

        $this->stock->insert([
            'name' => $this->request->getPost('stock'),
            'stock' => $this->request->getPost('quantity'),
            'price' => $sellPrice,
            'category' => $this->request->getPost('category'),
            'supplier' => $this->request->getPost('supplier'),
            'imagePath' => $this->request->getPost('imagePath')
        ]);
    }
        $total_price = $this->request->getPost('price')*$this->request->getPost('quantity');
        $this->in_out->where(['id' => '1'])->set('outcome', "outcome + $total_price", FALSE )->update();

        return redirect()->to('admin/display');
    }

    public function AddItem()
        {
            if (!$this->validate([
                'image' => [
                    'rules' => 'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]|',
                    'errors' => [
                        'uploaded' => 'No Uploaded Files',
                        'mime_in' => 'File Extention Must Be jpg, jpeg, gif, png',
                    ]
                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }

		$dataImage = $this->request->getFile('image');
		$fileName = $dataImage->getRandomName();
		$this->supplierstock->insert([
			'imagePath' => "assets/$fileName",
			'name' => $this->request->getPost('ItemName'),
            'price' => $this->request->getPost('ItemPrice'),
            'supplier' => $this->request->getPost('ItemSupplier'),
            'category' => $this->request->getPost('ItemCategory')
        ]);
		$dataImage->move('assets/', $fileName);
		return redirect()->to(base_url('admin/display'));
    }

    public function AddSupplier(){
        $this->supplier->insert([
			'supplier_name' => $this->request->getPost('SupplierName')
        ]);
        return redirect()->to(base_url('admin/display'));
    }

    public function AddCategory(){
        $this->category->insert([
			'category_name' => $this->request->getPost('CategoryName')
        ]);
        return redirect()->to(base_url('admin/display'));
    }

}
