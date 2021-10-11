<?php
namespace App\Services\Contracts;

interface AccountServiceInterface
{
    public function save($request, $user);

    public function getOrders($request);
}
