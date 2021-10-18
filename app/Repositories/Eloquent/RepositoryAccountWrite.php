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
            'title'    => $request->title,
            'income'   => $request->income,
            'expenses' => $request->expenses,
            'sum'      => $request->income - $request->expenses,
            'user_id'  => $user->id,
        ]);
        return true;
    }

    public function updateAccount($request)
    {
        $account = $this->accountBook->find($request->id);
        $account->title    = $request->title;
        $account->income   = $request->income;
        $account->expenses = $request->expenses;
        $account->sum      = $request->income - $request->expenses;
        $account->save();
        return true;
    }

    public function destroyAccount($accountId)
    {
        $this->accountBook->destroy($accountId);
    }
}
