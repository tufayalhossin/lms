<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function students($status="Active")
    {
        return view('backend.templates.student.index', [
            'status'=> $status,
        ]);
    }

    public function studentAjax(Request $request,$status="Active")
    {
        if ($request->ajax()) {
            $data = User::where(['isStudent'=>1,'status'=>$status])->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function($row){
                         if ($row->status == "Active") { 
                            $statusbtn = ' <span class="badge badge-outline-success rounded-pill">'.ucwords($row->status).'</span>';
                         } else { 
                            $statusbtn = '<span class="badge badge-outline-danger rounded-pill">'.ucwords($row->status).'</span>';
                         } 
     
                            return $statusbtn;
                    })
                    ->addColumn('action', function($row){
                        return  ' <div class="dropdown">
                         <i class="uil uil-ellipsis-v dropdown-toggle artyir-dropdown-toggle btn btn-light btn-sm" id="dropdownMenuLink" data-bs-toggle="dropdown"></i>
                         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                             <li><a href="'.route('admin.category.view',[$row->id]).'" class="dropdown-item  text-info"><i class="dripicons-information me-2"></i> View</a></li>
                             <li><a href="'.route('admin.category.edit',[$row->id]).'" class="dropdown-item text-warning"><i class="dripicons-document-edit me-2"></i> Edit</a></li>
                             <li><a onclick="return confirm("'."Are you sure you want to delete this item?');".'" href="'.route('admin.category.delete',[$row->id]).'" class="dropdown-item text-danger"><i class="dripicons-trash me-2 "></i> Delete</a>
                             </li>
                         </ul>
                     </div>';
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);
        }
         
        return;
    }

    public function instructors($status="Active")
    {
        return view('backend.templates.instructor.index', [
            'status'=> $status,
        ]);
    }

    public function instructorAjax(Request $request,$status="Active")
    {
        if ($request->ajax()) {
            $data = User::where(['isInstructor'=>1,'status'=>$status])->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('status', function($row){
                         if ($row->status == "Active") { 
                            $statusbtn = ' <span class="badge badge-outline-success rounded-pill">'.ucwords($row->status).'</span>';
                         } else { 
                            $statusbtn = '<span class="badge badge-outline-danger rounded-pill">'.ucwords($row->status).'</span>';
                         } 
     
                            return $statusbtn;
                    })
                    ->addColumn('action', function($row){
                        return  ' <div class="dropdown">
                         <i class="uil uil-ellipsis-v dropdown-toggle artyir-dropdown-toggle btn btn-light btn-sm" id="dropdownMenuLink" data-bs-toggle="dropdown"></i>
                         <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                             <li><a href="'.route('admin.category.view',[$row->id]).'" class="dropdown-item  text-info"><i class="dripicons-information me-2"></i> View</a></li>
                             <li><a href="'.route('admin.category.edit',[$row->id]).'" class="dropdown-item text-warning"><i class="dripicons-document-edit me-2"></i> Edit</a></li>
                             <li><a onclick="return confirm("'."Are you sure you want to delete this item?');".'" href="'.route('admin.category.delete',[$row->id]).'" class="dropdown-item text-danger"><i class="dripicons-trash me-2 "></i> Delete</a>
                             </li>
                         </ul>
                     </div>';
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);
        }
         
        return view('users');
    }
}
