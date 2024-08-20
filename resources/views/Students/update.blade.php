<x-layout>
    <div class="container w-75">
        <form action="{{ route('editUser', [ 'user' => $user->id ]) }}" method="POST" name="formAdd">
        @csrf

<label for="name" class="w-100 mb-3">
    <h2 style="font-size: 20px;">Name</h2>
    @error("name")
        <p class="mb-1 text-danger" style="font-size: 12px;">{{ $message }}</p>
    @enderror
    <input type="text" value="{{ $user->name }}" class="@error('name') border border-danger @enderror form-control w-50" id="name" name="name" value="{{ old('name') }}">
</label>

<label for="email" class="w-100 mb-3">
    <h2 style="font-size: 20px;">Email</h2>
    @error("email")
        <p class="mb-1 text-danger" style="font-size: 12px;">{{ $message }}</p>
    @enderror
    <input type="text" value="{{ $user->email }}" class="@error('email') border border-danger @enderror form-control w-50" id="name" name="email" value="{{ old('name') }}">
</label>

<label for="password" class="w-100 mb-3">
    <h2 style="font-size: 20px;">Password</h2>
    @error("password")
        <p class="mb-1 text-danger" style="font-size: 12px;">{{ $message }}</p>
    @enderror
    <input type="password" value="{{ $user->password }}" class="@error('password') border border-danger @enderror form-control w-50" id="name" name="password" value="{{ old('name') }}">
</label>
<br>
<input class="form-control btn btn-primary mt-2" type="submit">

        </form>
    </div>
</x-layout>