<?php
namespace App\Scopes;
use Iluminate\Database\Eloquent\Scope;
use Iluminate\Database\Eloquent\Model;
use Iluminate\Database\Eloquent\Builder;

class ProductAdminScope implements Scope
{
	public function apply(Builder $builder ,Model $model)
	{
		if (admin()->check()) {
			$builder->where('admin_id',admin()->user()->id());
		}
	}
}
