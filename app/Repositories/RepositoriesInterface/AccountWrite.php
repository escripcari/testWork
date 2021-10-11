<?php
namespace App\Repositories\RepositoriesInterface;

interface AccountWrite
{
    public function writeNewAccount($request, $user);

    public function destroyAccount($accountId);
}
