<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Traits\CommonTrait;

class DashboardController extends Controller
{
    use CommonTrait;

    protected function index(): View
    {
        return view('dashboard.index');
    }

    protected function get(): JsonResponse
    {
        try {
            $departments = $this->getDepartments()
            ->withCount('user')
            ->get();

            $designations = $this->getDesignations()
            ->withCount('user')
            ->get();

            $departmentArray = [];
            $designationArray = [];
            $keyData = 0;
            
            foreach($departments as $key=>$department){
                $departmentArray[$key]['title'] = $department->name;
                $departmentArray[$key]['count'] = $department->user_count;
                $keyData = $key+1;
            }

            foreach($designations as $key=>$designation){
                $designationArray[$key]['title'] = $designation->name;
                $designationArray[$key]['count'] = $designation->user_count;
                $keyData = $key+1;
            }

            $jsonArray = [
                'status' => 'success',
                'departments' => $departmentArray,
                'designations' => $designationArray
            ];

        } catch (\Exception $e) {
            $jsonArray = [
                'status' => "error",
                'message' => $e->getMessage(),
            ];
        }
        return response()->json($jsonArray);
    }
}
