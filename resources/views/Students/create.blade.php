<x-layout>
    <div class="container w-75 mx-auto">
        <form action="{{ route('addUser') }}" style="text-align: center;" method="POST" name="formAdd">
            @csrf
            
            <p class="mb-1">Name: </p>
            <input type="text" name="name" value="{{ old('name') }}">
            @error("name")
                <p>{{ $message }}</p>
            @enderror
            <p class="mb-1">Email: </p>
            <input type="email" name="email" value="{{ old('email') }}">
            @error("email")
                <p>{{ $message }}</p>
            @enderror
            <p class="mb-1">Password: </p>
            <input type="password" name="password" value="{{ old('password') }}">
            @error("password")
                <p>{{ $message }}</p>
            @enderror
            <br>
            <input class="mt-2" type="submit">
        </form>
    </div>
</x-layout>