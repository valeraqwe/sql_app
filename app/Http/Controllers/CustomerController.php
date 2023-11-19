<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $customers = Customer::with('phoneNumbers')->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // Validation and storing logic goes here
    }
}
