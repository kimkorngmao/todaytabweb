<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\User;

class VisitorController extends Controller
{
    // Display all visitors
    public function index()
    {
        $visitors = Visitor::latest()->paginate(20);
        return view('admin.visitors.index', compact('visitors'));
    }
}
