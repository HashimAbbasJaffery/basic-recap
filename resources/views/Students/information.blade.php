<x-layout>
    <style>
     datalist {
  position: absolute;
  background-color: white;
  border: 1px solid blue;
  border-radius: 0 0 5px 5px;
  border-top: none;
  font-family: sans-serif;
  width: 350px;
  padding: 5px;

}

option {
  background-color: white;
  padding: 4px;
  color: blue;
  margin-bottom: 1px;
   font-size: 18px;
  cursor: pointer;
}
    </style>
    <div class="information w-75 mt-3 mx-auto">
        <p style="font-size: 20px;" class="mb-1">Name: {{ $user->name }}</p>
        <p style="font-size: 20px;" class="mb-1">Email: {{ $user->email }}</p>
        <p style="font-size: 20px">Status: {{ !$user->status ? "Active" : "Deactive" }}</p>
        <p style="font-size: 20px;" class="mb-1 mt-3">Courses Enrolled: </p>
        <div class="courses mt-2">
            @forelse($user->courses as $course)
                <div class="d-block border rounded px-2 py-2 m-1 d-flex justify-content-between align-items-center" style="font-size: 20px;">
                    <div>{{ $course->course }}</div>
                    <button data-id="{{ $course->id }}" onclick="deallocate('{{ $user->id }}', '{{ $course->id }}')" class="unassign btn btn-danger">Unassign</button>
                </div>
            @empty 
                <div class="alert alert-danger">Not Enrolled in any course yet!</div>
            @endforelse
        </div>


        <div class="search-course border w-50 p-2 mt-3 mb-3" style="height: 250px; overflow: auto;">
            <p style="font-size: 20px;" class="mb-3 mt-3">Add Course</p>
            <input type="text" class="search_course w-100 border outline-none px-2" placeholder="Search Course">
            <ul class="courseList p-0 mt-2">
                @foreach($courses as $course)
                    <li style="list-style: none;" class="border p-2 d-flex align-items-center justify-content-between">
                        {{ $course->course }}
                        <button class="btn btn-primary" @disabled($user->courses()?->find($course->id)?->exists() ?? false) onclick="assign('{{ $course->id }}')">{{ !$user->courses()?->find($course->id)?->exists() ? "Assign" : "Assigned" }}</button>
                    </li>
                @endforeach
            </ul>
        </div>
        
    </div>
    <script>
        const unassign = document.querySelector(".unassign");

        const deallocate = (user, course) => {

            Swal.fire({
            title: "Are you sure you want to deallocate the course?",
            showCancelButton: true,
            confirmButtonText: "Deallocate",
            denyButtonText: `Cancel`
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                
            axios.post(`/course/${user}/remove`, { course: course })
                .then(res => {
                    console.log(res);
                    window.location.reload();
                })
                .catch(err => {
                    console.log(err)
                })
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
            }
            });
        }


        const search = document.querySelector(".search_course");
        const assign = course => {
            axios.post("/course/{{ $user->id }}/add", { course })
                .then(res => {
                    if(res.data)
                        window.location.reload();
                })
                .catch(err => {
                    console.log(err)
                })
        }

        function debounce(func, timeout = 300){
            let timer;
            return (...args) => {
                clearTimeout(timer);
                timer = setTimeout(() => { func.apply(this, args); }, timeout);
            };
        }

        const courses = JSON.parse(`@json($courses)`);
        let modifiedCourses = [];
        const courseList = document.querySelector(".courseList");
        let assignedCourse = JSON.parse(`@json($user->courses)`);
     
        const searchCourse = () => {

            const search = document.querySelector(".search_course");
            console.log(courses);
            modifiedCourses = courses.filter(course => course.course.toLowerCase().includes(search.value.toLowerCase()));
            console.log(modifiedCourses);
            
            courseList.innerHTML = "";
            modifiedCourses.forEach(course => {
                courseList.innerHTML += `<li style="list-style: none;" class="border p-2 d-flex align-items-center justify-content-between">${course.course} <button ${ assignedCourse.filter(crs => crs.id === course.id).length > 0 ? 'disabled' : '' } class="btn btn-primary" onclick="assign(${course.id})">${ assignedCourse.filter(crs => crs.id === course.id).length > 0 ? 'Assigned' : 'Assign' }</button></li>`
            })
        }
        search.addEventListener("input", searchCourse)
    </script>

</x-layout>