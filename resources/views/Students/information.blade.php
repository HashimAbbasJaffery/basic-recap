<x-layout>
    <div class="information w-75 mt-3 mx-auto">
        <p style="font-size: 20px;">Name: {{ $user->name }}</p>
        <p style="font-size: 20px;" class="mb-1">Courses Enrolled: </p>
        <div class="courses mt-2">
            @foreach($user->courses as $course)
                <a href="#" class="d-block" style="font-size: 20px;">{{ $course->course }}</a>
            @endforeach
        </div>

        <div class="enroll mt-2">
            <form action="/course/{{ $user->id }}/add" method="POST">
                @csrf 
                <p style="font-size: 20px;">Enroll New Course: </p>
                <select name="course">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course }}</option>
                    @endforeach
                </select>
                <button type="submit">Add Course</button>
            </form>
        </div>
        
    </div>
</x-layout>