<?php

namespace App\Controllers;


use App\Repositories\ProductsRepository;

class ItemsController
{
    private ProductsRepository $productsRepository;

    public function __construct()
    {
        $this->productsRepository = new MySQLProductsRepository();

        public function store()
    {
        try {
            $this->validator->validateProducts($_POST);

            $product = new Product(
                Uuid::uuid4(),
                $_POST['title'],
                $_POST['category'],
                $_POST['quantity'],
                $_SESSION['id']
            );

            $this->productsRepository->save($product);
            Redirect::url('/products');
        } catch (FormValidationException $exception)
        {
            $_SESSION['_errors'] = $this->validator->getErrors();
            Redirect::url('products/create');
        }
    }
}