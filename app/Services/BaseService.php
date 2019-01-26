<?php
namespace App\Services;


use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseService
{
    public abstract function create(Collection $data, User $user = null): Model;
}