<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getSearchProducts(array $filters);
}
