<?php
namespace App\Repositories\Eloquent;

use App\Models\AccountBook;
use App\Repositories\RepositoriesInterface\AccountQueries;

final class RepositoryAccountQueries implements AccountQueries
{
    protected $accountBook;
    public function __construct(AccountBook $accountBook)
    {
        $this->accountBook = $accountBook;
    }
    public function getById($id): AccountBook
    {
        return AccountBook::find($id);
    }

    public function getUserAccount($userId, $column, $order)
    {
        return $this->accountBook->where('user_id', $userId)
            ->orderBy($column, $order)
            ->get();
    }
}
