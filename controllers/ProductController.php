<?php
namespace controllers;

require 'models/Product.php';

use models\Product;
class ProductController{
    public $product;

        public function __construct()
            {
                $this->product = new Product();

            }

    public function index()
    {

         $products = $this->product->index();
         
         require 'views/index.php';
     }

    public function createform()
    {

         
         require 'views/add-product.php';
     }
    

     public function insert()
    {
        $this->product->insert();
         
        $products = $this->product->index();

         require 'views/index.php';
     }

     public function edit($id)
    {
         
        $product = $this->product->find($id);

         require 'views/edit-product.php';
     }

     public function update($id)
    {
        $product = $this->product->find($id);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id' => $id,
        'nom' => $_POST['nom'],
        'description' => $_POST['description'],
        'prix' => $_POST['prix']
    ];

   
    }
        $product = $this->product->update($data);
        $products = $this->product->index();

         require 'views/index.php';
     }

     public function delete($id)
    {
            $this->product->delete($id);
         
        $products = $this->product->index();

         require 'views/index.php';
     }
}
