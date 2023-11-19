@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Customer</h1>
        <form method="POST" action="{{ route('customers.update', $customer) }}" class="mb-3">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $customer->first_name) }}" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $customer->last_name) }}" required>
            </div>

            <div id="phoneNumbers" class="mb-3">
                <label class="form-label">Phone Numbers</label>
                @foreach ($customer->phoneNumbers as $index => $phoneNumber)
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="phone_numbers[{{ $index }}]" value="{{ old('phone_numbers.'.$index, $phoneNumber->phone_number) }}" required>
                        <button class="btn btn-danger" type="button" onclick="removePhoneNumber(this)">Remove</button>
                    </div>
                @endforeach
                <button class="btn btn-primary" type="button" onclick="addPhoneNumber()">Add Phone Number</button>
            </div>

            <button type="submit" class="btn btn-success">Update Customer</button>
        </form>
    </div>

    <script>
        function addPhoneNumber() {
            let phoneNumbersDiv = document.getElementById('phoneNumbers');
            let newInput = document.createElement('div');
            newInput.classList.add('input-group', 'mb-2');
            newInput.innerHTML = `
        <input type="text" class="form-control" name="phone_numbers[]" required>
        <button class="btn btn-danger" type="button" onclick="removePhoneNumber(this)">Remove</button>
    `;
            // Insert the new input group before the "Add Phone Number" button
            phoneNumbersDiv.insertBefore(newInput, phoneNumbersDiv.children[phoneNumbersDiv.children.length - 1]);
        }

        function removePhoneNumber(button) {
            button.closest('.input-group').remove();
        }
    </script>
    @push('scripts')
        <script>
            // Your JavaScript or jQuery code here
        </script>
    @endpush
@endsection
