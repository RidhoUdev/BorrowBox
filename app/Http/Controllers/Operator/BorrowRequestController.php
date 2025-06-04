<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BorrowRequestController extends Controller
{
    //
     public function index()
     {
         return view('operator.requests.index');
     }

     public function borrowerHistory()
     {
        return view('operator.borrower.index');
     }
}
