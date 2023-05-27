<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\StockModel;

class Main extends BaseController
{

    protected $session;
    protected $data; 
    protected $stock_model; 
    protected $category;

    public function index()
    {
        $this->data['page_title'] = "Index";
        $this->data['list'] = $this->stock_model->select('*')->get()->getResult();
        $this->data["category"] = $this->category->findAll();
        echo view('templates/header', $this->data);
        echo view('store/home.php', $this->data);
        echo view('templates/footer');
    }

    public function __construct(){
        $this->category = new CategoryModel();
        $this->stock_model = new StockModel();
        $this->data['session'] = $this->session;
        }

    public function update_stock(){
        $addStock = $this->request->getPost('stock');
        $post =     [
            'name' => $this->request->getPost('item_name'),
            'price' => $this->request->getPost('price'),
            'desc' => $this->request->getPost('desc')
        ];
        $this->stock_model->where(['id' => $this->request->getPost('id')])->set($post)->update();
        $this->stock_model->where(['id' => $this->request->getPost('id')])->set('stock', "stock + $addStock", FALSE)->update();
        return redirect()->back();  
    }

    public function stock(){     
        $categoryID = $this->request->getPost('category');
        
        $stock = '';
        
        $arrayStock = array('category' => $categoryID, 'stock >' => 0);
        
        $stockdata =  $this->stock_model->where($arrayStock)->get()->getResult();
        foreach ($stockdata as $value) : 
            $stock.= '
                    <a href="'. base_url("buy/display/".$value->id).'">
                    <div class="card cursor-pointer w-40 lg:w-64 h-80 lg:h-96 min-h-none bg-slate-500 shadow-xl transition ease-in-out delay-100 hover:scale-105">
                  <figure><img src="'.$value->imagePath.'" alt="Shoes" class="w-" /></figure>
                  <div class="card-body">
                    <h2 class="card-title text-sm">
                      '.$value->name.'
                    </h2>
                    <p class="text-xs">Rp.'.$value->price.' </p>
                    <div class="card-actions justify-end">
                      <div class="badge badge-outline">Stock: '.$value->stock.'</div>
                    </div>
                  </div>
                </div>
                </a>';
 endforeach;

 

 return $stock;
    }
}
