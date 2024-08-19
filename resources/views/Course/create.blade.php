<x-layout>
    <div class="container w-75 mx-auto">
        <form action="{{ route('createCourse') }}" style="text-align: center;" method="POST" name="formAdd">
            @csrf
            <p class="mb-1">Course: </p>
            @error("course")
                <p>{{ $message }}</p>
            @enderror
            <input type="text" name="course">
            <br>
            <input class="mt-2" type="submit">
        </form>
    </div>
</x-layout>