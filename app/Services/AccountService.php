<?php
namespace App\Services;

use App\Mail\TestMail;
use App\Services\Contracts\AccountServiceInterface;
use App\Repositories\RepositoriesInterface\AccountWrite;
use Illuminate\Support\Facades\Mail;

final class AccountService implements AccountServiceInterface
{
    private $accountWrite;

    public function __construct(AccountWrite $accountWrite)
    {
        $this->accountWrite = $accountWrite;
    }

    public function save($request, $user)
    {
        return $this->accountWrite->writeNewAccount($request, $user);
    }

    public function getOrders($request)
    {
        $request->column ? $column = $request->column : $column[0] = 'created_at';
        $request->order  ? $order  = $request->order  : $order[0]= 'desc';
        $record['column'] = $column[0];
        $record['order'] = $order[0];
        return $record;
    }
}
