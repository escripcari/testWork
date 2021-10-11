<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\RepositoryAccountQueries;
use App\Repositories\RepositoriesInterface\AccountQueries;
use App\Repositories\RepositoriesInterface\AccountWrite;
use App\Services\Contracts\AccountServiceInterface;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccountBook;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(
        AccountQueries $repository,
        $column = 'created_at',
        $order = 'desc')
    {
        $user = Auth::user();
        $account = $repository->getUserAccount($user->id, $column, $order);
        return view('index', ['account' => $account, 'user' => $user]);
    }

    public function getOrderBy(Request $request, AccountServiceInterface $accountService)
    {
        $record = $accountService->getOrders($request);
        return redirect()->route('accounts.index', [
            'column' => $record['column'],
            'order' => $record['order']]);
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request, AccountServiceInterface $accountService)
    {
        $user = Auth::user();
        $accountService->save($request, $user);
        return redirect()->route('accounts.index');
    }

    public function show(AccountQueries $repository, $account_id)
    {
        $account = $repository->getById($account_id);

        return response()->json([$account]);
    }

    public function destroy($accountId, AccountWrite $writeRepository)
    {
        $writeRepository->destroyAccount($accountId);
        return redirect()->route('accounts.index');
    }
}
