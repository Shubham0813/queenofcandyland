<?php
namespace App\Controller;

use App\Controller\AppController;

class HomeController extends AppController
{

    public function index()
    {
        $this->loadModel('Items');
        $items = $this->paginate($this->Items->find('all'));
        $this->set('items', $items);
        //$this->set(compact('items'));
        //$this->set('_serialize', ['items']);

        $this->loadModel('Vendors');
        $vendors = $this->Vendors->find('all');
        $this->set('vendors', $vendors);

    }

}
