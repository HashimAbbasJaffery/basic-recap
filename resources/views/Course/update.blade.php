<x-layout>
    <div class="container w-75 mx-auto">
        <form action="{{ route('editCourse', [ 'course' => $course->id ]) }}" style="text-align: center;" method="POST" name="formAdd">
            @csrf
            {{ method_field("PUT") }}
            <p class="mb-1">Course: </p>
            @error("course")
                <p>{{ $message }}</p>
            @enderror
            <input value="{{ $course->course }}" type="text" name="course">
            <br>
            <input class="mt-2" type="submit">
        </form>
    </div>
</x-layout>