<x-layout>
    <div class="container w-75">
        <form action="{{ route('createCourse') }}"  method="POST" name="formAdd">
            @csrf
            
            <label for="course" class="w-100 mb-1">
                <h2 style="font-size: 20px;">Course</h2>
                @error("course")
                    <p class="mb-1 text-danger" style="font-size: 12px;">{{ $message }}</p>
                @enderror
                <input type="text" value="{{ old('course') }}" class="@error('course') border border-danger @enderror form-control w-50" id="name" name="course" value="{{ old('name') }}">
            </label>
            <br>
            <div>
                <div class="program-selector search-course border w-50 p-2 mt-3" style="height: 250px; overflow: auto;">
                    @error("program")
                        <p class="mb-1 text-danger" style="font-size: 12px;">{{ $message }}</p>
                    @enderror
                    <input type="text" class="search_program w-100 border outline-none px-2" placeholder="Search Course">
                    <ul class="courseList p-0 mt-2">
                        @foreach($programs as $program)
                            <li style="list-style: none;" class="border p-2 d-flex align-items-center justify-content-between">
                                {{ $program->program_name }}
                                <button class="btn btn-primary" onclick="selectProgram(event, '{{ $program->id }}', this)" @disabled(old('program') == $program->id)>{{ old('program') == $program->id ? 'Selected' : 'Select' }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                <input type="hidden" value="{{ old('program') }}" name="program" class="program_field">
            
            <input class="mt-2 form-control btn btn-primary" type="submit">
        </div>
        </form>
    </div>
    <script>
        const old_value = "{{ old('program') }}"
        const programs = JSON.parse(`@json($programs)`);
        const program_field = document.querySelector(".program_field");
        let modifiedCourses = [];
        const courseList = document.querySelector(".courseList");
        const search = document.querySelector(".search_program")

        const searchCourse = () => {
            modifiedCourses = programs.filter(program => program.program_name.toLowerCase().includes(search.value.toLowerCase()));
            console.log(modifiedCourses);
            
            courseList.innerHTML = "";
            modifiedCourses.forEach(program => {
                courseList.innerHTML += `<li style="list-style: none;" class="border p-2 d-flex align-items-center justify-content-between">${program.program_name} <button ${old_value == program.id || program_field.value == program.id ? 'disabled' : ''} class="text-white btn btn-primary selectElement" onclick="selectProgram(event, ${program.id}, this)" >${old_value == program.id || program_field.value == program.id ? 'Selected' : 'Select'}</button>`
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
    </script>
</x-layout>