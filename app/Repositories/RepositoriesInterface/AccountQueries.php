<?php
namespace App\Repositories\RepositoriesInterface;

use App\Models\AccountBook;

interface AccountQueries
{
    public function getById($id): AccountBook;

    public function getUserAccount($userId, $column, $order);
}
