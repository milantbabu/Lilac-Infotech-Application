<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Traits\CommonTrait;
use DataTables;
use Validator;

class DepartmentController extends Controller
{
    use CommonTrait;

    protected function index(Request $request)
    {
        if ($request->ajax()) {
            $departments = $this->getDepartments();
            return DataTables::of($departments)
             ->addIndexColumn()
            ->addColumn('actions', function($row) {
                $button = "";
                $button .= '<a href="javascript:void(0)"  data-id="' . $row->id . '" class="' . \config('buttons.edit-class') . '" title="Edit">' . \config('buttons.edit-icon') . '</a>&nbsp;';
            
               $button .= '<a href="javascript:void(0)" data-id="' . $row->id . '" class="' . \config('buttons.delete-class') . '" title="Delete">' . \config('buttons.delete-icon') . '</a>';
                
                return $button;

            })
            ->rawColumns(['actions'])
            ->toJson();
        }
        return view('department.index');
    }

    protected function save(Request $request): JsonResponse
    {
        try {
            $id = $request->id;
            $validatedData = Validator::make($request->all(), [
                'name' => 'bail|required|unique:departments,name,'.$id.',id,deleted_at,NULL',
            ], [
                'name.required' => 'Department name is mandatory.',
                'name.unique' => 'Department name is already exist.'
            ]);
            if ($validatedData->fails()) {
                $jsonArray = [
                    'status' => 'validationError',
                    'messages' => $validatedData->messages()
                ];
            } else {
                $department = $this->getDepartments()->updateOrCreate(['id' => $id], $request->all());
                if ($department->wasRecentlyCreated) {
                    $message = "Department Created Successfully.";
                } else if ((!$department->wasRecentlyCreated && $department->wasChanged()) || (!$department->wasRecentlyCreated && !$department->wasChanged())) {
                    $message = "Department Updated Successfully.";
                }
                $jsonArray = [
                    'status' => "success",
                    'message' => $message,
                ];
            }
        } catch (\Exception $e) {
            $jsonArray = [
                'status' => "error",
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($jsonArray);
    }

    protected function get(Request $request): JsonResponse
    {
        try {
            if ($this->departmentIdValidate($request)->fails()) {
                $jsonArray = [
                    'status' => 'validationError', 
                    'message' => 'Invalid Department.'
                ];
            } else {
                $department = $this->getDepartments()->find($request->id);
                $jsonArray = [
                    'status' => 'success',
                    'data' => $department
                ];
            }
        } catch (\Exception $e) {
            $jsonArray = [
                'status' => "error",
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($jsonArray);
    }

    protected function delete(Request $request): JsonResponse
    {
        try {
            if ($this->departmentIdValidate($request)->fails()) {
                $jsonArray = [
                    'status' => 'validationError', 
                    'message' => 'Invalid Department.'
                ];
            } else {
                $this->getDepartments()->find($request->id)->delete();
                $jsonArray = [
                    'status' => 'success',
                    'message' => 'Department Deleted Successfully.' 
                ];
            }
        } catch (\Exception $e) {
            $jsonArray = [
                'status' => "error",
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($jsonArray);
    }

    private function departmentIdValidate($request): object
    {
        return Validator::make($request->all(),[
            'id' => 'bail|required|exists:departments,id'
        ]);
    }
}
