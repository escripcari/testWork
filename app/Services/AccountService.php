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
        $request->validate(['title' => 'required|max:255']);
        $this->send($request, $user);
        return $this->accountWrite->writeNewAccount($request, $user);
    }

    public function send($request, $user)
    {
        $body = [
            'user'     => $user->name,
            'title'    => $request->input('title'),
            'income'   => $request->input('income'),
            'expenses' => $request->input('expenses'),
            'sum'      => $request->input('income')-$request->input('expenses'),
        ];
        Mail::to($user->email)->send(new TestMail($body));
    }

    public function getOrders($request)
    {
        $request->input('column') ? $column = $request->input('column') : $column[0] = 'created_at';
        $request->input('order')  ? $order  = $request->input('order')  : $order[0]= 'desc';
        $record['column'] = $column[0];
        $record['order'] = $order[0];
        return $record;
    }
}
