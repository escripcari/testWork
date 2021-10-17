<?php
namespace App\Repositories\Eloquent;

use App\Models\AccountBook;
use App\Repositories\RepositoriesInterface\AccountWrite;

class RepositoryAccountWrite implements AccountWrite
{
    protected $accountBook;

    public function __construct(AccountBook $accountBook)
    {
        $this->accountBook = $accountBook;
    }

    public function writeNewAccount($request, $user)
    {
        $this->accountBook->create([
            'title'    => $request->input('title'),
            'income'   => $request->input('income'),
            'expenses' => $request->input('expenses'),
            'sum'      => $request->input('income') - $request->input('expenses'),
            'user_id'  => $user->id,
        ]);
        return true;
    }

    public function destroyAccount($accountId)
    {
        $this->accountBook->destroy($accountId);
    }
}
