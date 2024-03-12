<?php

namespace  App\Http\Traits;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Department;
use App\Models\Designation;
use App\Models\User;

trait CommonTrait
{
	private function getDepartments(): Builder
	{
		return Department::select('id', 'name')
		->latest();
	}

	private function getDesignations(): Builder
	{
		return Designation::select('id', 'name')
		->latest();
	}

	private function getUsers(): Builder
	{
		return User::whereNot('id', 1) //user id 1 only for login purpose
		->with([
			'department:id,name',
			'designation:id,name'
		])
		->select('id', 'department_id', 'designation_id', 'name')
		->latest();
	}
} 