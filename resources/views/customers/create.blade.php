
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Customer</h1>
        <form method="POST" action="{{ url('/customers') }}">
            @csrf
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" required>
            </div>
            <div id="phoneNumbers">
                <label for="phoneNumbers" class="form-label">Phone Numbers</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="phone_numbers[]">
                    <button class="btn btn-secondary" type="button" id="addPhone">+</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('addPhone').addEventListener('click', function() {
            let container = document.getElementById('phoneNumbers');
            let input = document.createElement('input');
            input.type = 'text';
            input.name = 'phone_numbers[]';
            input.classList.add('form-control', 'mb-3');
            container.appendChild(input);
        });
    </script>
@endsection
