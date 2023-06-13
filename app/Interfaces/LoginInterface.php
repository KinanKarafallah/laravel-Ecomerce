<?php

namespace App\Interfaces;

interface LoginInterface {
    public function login($request);

    public function handleProviderCallback();
}