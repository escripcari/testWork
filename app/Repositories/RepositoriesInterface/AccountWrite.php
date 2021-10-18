<?php
namespace App\Repositories\RepositoriesInterface;

use Illuminate\Support\Facades\Request;

interface AccountWrite
{
    public function writeNewAccount($request, $user);

    public function updateAccount($request);

    public function destroyAccount($accountId);
}
