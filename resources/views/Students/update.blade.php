<x-layout>
    <div class="container w-75 mx-auto">
        <form action="{{ route('editUser', [ 'user' => $user->id ]) }}" style="text-align: center;" method="POST" name="formAdd">
            @csrf
            @error("name")
                <p>{{ $message }}</p>
            @enderror
            <p class="mb-1">Name: </p>
            <input type="text" name="name" value="{{ $user->name }}">
            @error("email")
                <p>{{ $message }}</p>
            @enderror
            <p class="mb-1">Email: </p>
            <input type="email" name="email" value="{{ $user->email }}">
            @error("password")
                <p>{{ $message }}</p>
            @enderror
            <p class="mb-1">Password: </p>
            <input type="password" name="password">
            <br>
            <input class="mt-2" type="submit">
        </form>
    </div>
</x-layout>