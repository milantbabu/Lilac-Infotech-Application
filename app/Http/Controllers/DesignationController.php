<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Traits\CommonTrait;
use DataTables;
use Validator;

class DesignationController extends Controller
{
    use CommonTrait;

    protected function index(Request $request)
    {
        if ($request->ajax()) {
            $designations = $this->getDesignations();
            return DataTables::of($designations)
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
        return view('designation.index');
    }

    protected function save(Request $request): JsonResponse
    {
        try {
            $id = $request->id;
            $validatedData = Validator::make($request->all(), [
                'name' => 'bail|required|unique:designations,name,'.$id.',id,deleted_at,NULL',
            ], [
                'name.required' => 'Designation name is mandatory.',
                'name.unique' => 'Designation name is already exist.'
            ]);
            if ($validatedData->fails()) {
                $jsonArray = [
                    'status' => 'validationError',
                    'messages' => $validatedData->messages()
                ];
            } else {
                $designation = $this->getDesignations()->updateOrCreate(['id' => $id], $request->all());
                if ($designation->wasRecentlyCreated) {
                    $message = "Designation Created Successfully.";
                } else if ((!$designation->wasRecentlyCreated && $designation->wasChanged()) || (!$designation->wasRecentlyCreated && !$designation->wasChanged())) {
                    $message = "Designation Updated Successfully.";
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
            if ($this->designationIdValidate($request)->fails()) {
                $jsonArray = [
                    'status' => 'validationError', 
                    'message' => 'Invalid Designation.'
                ];
            } else {
                $department = $this->getDesignations()->find($request->id);
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
            if ($this->designationIdValidate($request)->fails()) {
                $jsonArray = [
                    'status' => 'validationError', 
                    'message' => 'Invalid Designation.'
                ];
            } else {
                $this->getDesignations()->find($request->id)->delete();
                $jsonArray = [
                    'status' => 'success',
                    'message' => 'Designation Deleted Successfully.' 
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

    private function designationIdValidate($request): object
    {
        return Validator::make($request->all(),[
            'id' => 'bail|required|exists:designations,id'
        ]);
    }
}
