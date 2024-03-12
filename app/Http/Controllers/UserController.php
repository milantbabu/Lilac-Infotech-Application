<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Validator;

class UserController extends Controller
{
    use CommonTrait;

    protected function index(): View
    {
        return view('user.index');
    }

    protected function get(Request $request): JsonResponse
    {
        try {
            $search = $request->search;
            $users = $this->getUsers()
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                ->orWhereHas('department', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                ->orWhereHas('designation', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                });
            })
            ->paginate(8);
            $jsonArray = [
                'status' => 'success',
                'users' => $users
            ];
        } catch (\Exception $e) {
            $jsonArray = [
                'status' => "error",
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($jsonArray);  
    }   

    protected function getUserDepartments(Request $request): JsonResponse
    {
        $departments = $this->getDepartments()->get();
        $department = '';
        if ($request->id > 0) {
            $department = $this->getUsers()->find($request->id);
        } 
        if (count($departments) > 0) {
            $jsonArray = [
                'status' => 'success',
                'departments' => $departments,
                'department' => $department
            ];
        } else {
            $jsonArray = [
                'status' => 'error', 
                'message' => 'No departments found!'
            ];
        }
        return response()->json($jsonArray);
    }

    protected function getUserDesignations(Request $request): JsonResponse
    {
        $designations = $this->getDesignations()->get();
        $designation = '';
        if ($request->id > 0) {
            $designation = $this->getUsers()->find($request->id);
        } 
        if (count($designations) > 0) {
            $jsonArray = [
                'status' => 'success',
                'designations' => $designations,
                'designation' => $designation
            ];
        } else {
            $jsonArray = [
                'status' => 'error', 
                'message' => 'No designations found!'
            ];
        }
        return response()->json($jsonArray);
    }

    protected function save(Request $request): JsonResponse
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'name' => 'required',
                'department_id' => 'bail|required|exists:departments,id',
                'designation_id' => 'bail|required|exists:designations,id'
            ], [
                'name.required' => 'Name is mandatory.',
                'department_id.required' => 'Department is mandatory.',
                'department_id.exists' => 'Department does not exist.',
                'designation_id.required' => 'Designation is mandatory.',
                'designation_id.exists' => 'Designation does not exist.'
            ]);
            if ($validatedData->fails()) {
                $jsonArray = [
                    'status' => 'validationError',
                    'messages' => $validatedData->messages()
                ];
            } else {
                $user = $this->getUsers()->updateOrCreate(['id' => $request->id], $request->all());
                if ($user->wasRecentlyCreated) {
                    $message = "User Created Successfully.";
                } else if ((!$user->wasRecentlyCreated && $user->wasChanged()) || (!$user->wasRecentlyCreated && !$user->wasChanged())) {
                    $message = "User Updated Successfully.";
                }
                $jsonArray = [
                    'status' => "success",
                    'message' => $message,
                ];
            }
        }  catch (\Exception $e) {
            $jsonArray = [
                'status' => "error",
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($jsonArray);  
    }

}
