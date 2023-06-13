<?php

namespace App\Interfaces;

interface ProductInterface {

    public function store($request);

    public function update($request, $id);
}