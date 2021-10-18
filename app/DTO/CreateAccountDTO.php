<?php
namespace App\DTO;

class CreateAccountDTO
{
    public $title;
    public $income;
    public $expenses;

    public static function transform(mixed $args): CreateAccountDTO
    {
        $dto = new self();
        $dto->title    = $args->input('title');
        $dto->income   = $args->input('income');
        $dto->expenses = $args->input('expenses');
        return $dto;
    }
}
