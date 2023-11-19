@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customers</h1>
        <a href="{{ url('/customers/create') }}" class="btn btn-primary">Add New Customer</a>
        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Numbers</th>
                <th>Actions</th> <!-- New column for actions -->
            </tr>
            </thead>
            <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td>
                        @foreach ($customer->phoneNumbers as $phoneNumber)
                            <div>{{ $phoneNumber->phone_number }}</div>
                        @endforeach
                    </td>
                    <td>
                        <!-- Edit button (link) -->
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-info">Edit</a>

                        <!-- Delete button (form) -->
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $customers->links() }}
    </div>
@endsection
