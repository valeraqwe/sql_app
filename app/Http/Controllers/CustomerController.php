<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\PhoneNumber;

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

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone_numbers.*' => 'required|distinct|min:10'
        ]);

        $customer = Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        foreach ($request->phone_numbers as $number) {
            PhoneNumber::create([
                'customer_id' => $customer->id,
                'phone_number' => $number
            ]);
        }

        return redirect()->route('customers.index');
    }

    public function edit(Customer $customer): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Fetch phone numbers with the customer to pass to the view
        $customer->load('phoneNumbers');
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone_numbers.*' => 'required|string',
        ]);

        $customer->update($validatedData);

        $phoneNumbers = $request->input('phone_numbers', []);

        $customer->phoneNumbers()->delete();

        foreach ($phoneNumbers as $number) {
            $customer->phoneNumbers()->create(['phone_number' => $number]);
        }

        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        // Delete the customer and their associated phone numbers
        $customer->phoneNumbers()->delete(); // This deletes all related phone numbers
        $customer->delete(); // This deletes the customer

        // Redirect to the customers index route
        return redirect()->route('customers.index');
    }

}
