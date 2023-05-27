<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StockModel;
use App\Models\UsersModel;
use App\Models\PaymentModel;
use App\Models\CourierModel;
use App\Models\IncomeOutcomeModel;

class Buy extends BaseController
{

    protected $session;
    protected $data; 

    protected $stock_model; 
    protected $users;
    protected $payment;
    protected $courier;

    public function __construct(){
        $this->stock_model = new StockModel();
        $this->users = new UsersModel();
        $this->courier = new CourierModel();
        $this->payment = new PaymentModel();
        $this->data['session'] = $this->session;
        }

    public function display($id='')
    {
        $this->data['page_title'] = "Buy";
        $qry = $this->stock_model->select('*')->where(['id'=>$id]);

        $this->data['data'] = $qry->first();
        $this->data['courier'] = $this->courier->findAll();
        $this->data['payment'] = $this->payment->findAll();
        echo view('templates/header', $this->data);
        echo view('store/buy-view.php', $this->data);
        echo view('templates/footer');
    }   

    
    }