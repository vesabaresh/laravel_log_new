<?php

namespace App\Http\Controllers;
use App\Models\Request_logs;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class LogController extends Controller
{
    // Display the view
    public function index()
    {
        return view('logs.index');
    }

    // Return DataTable JSON
    public function getData()
    {
        $users = Request_logs::query();
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="/users/' . $user->id . '/edit" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
