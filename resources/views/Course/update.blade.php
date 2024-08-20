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
            <div>
            @error("program")
                <p>{{ $message }}</p>
            @enderror
                <div class="program-selector mx-auto search-course border w-50 p-2 mt-3" style="height: 250px; overflow: auto;">
                    <input type="text" class="search_program w-100 border outline-none px-2" placeholder="Search Course">
                    <ul class="courseList p-0 mt-2">
                        @foreach($programs as $program)
                        @php 
                        @endphp
                            <li style="list-style: none;" class="border p-2 d-flex align-items-center justify-content-between">
                                {{ $program->program_name }}
                                <button class="btn btn-primary" onclick="selectProgram(event, '{{ $program->id }}', this)" @disabled($course->program->id == $program->id)>{{ $course->program->id == $program->id ? 'Selected' : 'Select' }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <input type="hidden" name="program" class="program_field" value="{{ $course->program->id }}">
            
            <input class="mt-2" type="submit">
        </div>
        </form>
    </div>
    <script>
        
        const programs = JSON.parse(`@json($programs)`);
        const program_field = document.querySelector(".program_field");
        let modifiedCourses = [];
        const courseList = document.querySelector(".courseList");
        const search = document.querySelector(".search_program")
        
        const old_value = "{{ old('program') }}";

        const searchCourse = () => {
            modifiedCourses = programs.filter(program => program.program_name.toLowerCase().includes(search.value.toLowerCase()));
            console.log(modifiedCourses);
            
            courseList.innerHTML = "";
            modifiedCourses.forEach(program => {
                courseList.innerHTML += `<li style="list-style: none;" class="border p-2 d-flex align-items-center justify-content-between">${program.program_name} <button ${ program_field.value == program.id ? 'disabled' : '' ? 'disabled' : '' } class="text-white btn btn-primary selectElement" onclick="selectProgram(event, ${program.id}, this)" >${program_field.value == program.id ? 'Selected' : 'Select'}</button>`
            })
        }   
        search.addEventListener("input", searchCourse)
        const selectProgram = (e, program, element) => {
            const selectTag = document.querySelectorAll("button[disabled]");
            e.preventDefault();
            selectTag.forEach(tag => {
                tag.disabled = false;
                tag.textContent = "Select";
            })
            program_field.value = program;
            element.disabled = true;
            element.textContent = "Selected";
        }
    </script>
</x-layout>