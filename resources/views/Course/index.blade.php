<x-layout>
<div class="container w-50 mt-4">
    <div class="search-course d-flex justify-content-between align-items-center">
        <a href="/course/create" class="btn btn-light mb-3">Create Course</a>
        <form class="search" action="{{ route('courses') }}"  method="GET">
            <input type="text" name="q" style="height: 32px;" value="{{ request()->q }}">
            <input type="submit" value="Search">
        </form>
    </div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Course</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->course }}</td>
            <td class="flex">
                <a href="{{ route('updateCourse', [ 'course' => $course->id ]) }}" type="submit" class="btn btn-primary">Update</a>
                <form method="POST" style="display: inline-block;" action="{{ route('deleteCourse', ['course' => $course->id]) }}">
                    @csrf 
                    {{ method_field("DELETE") }}
                    <button class="delete btn btn-danger" data-id="{{ $course->id }}">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{{ $courses->links() }}
</div>

<script>


const status = document.querySelectorAll(".status-button");
const deleteButton = document.querySelectorAll(".delete");

deleteButton.forEach(del => {
    del.addEventListener("click", function() {
        const id = del.dataset.id;
        axios.delete(`/student/${id}/delete`)
            .then(res => {
                window.location = "/"
            })
            .catch(err => {
                console.log(err)
            })
    })
})


status.forEach(statusButton => {
    statusButton.addEventListener("click", function() {
        const enable = document.querySelector(`.enable[data-id='${statusButton.dataset.id}']`);
        const disable = document.querySelector(`.enable[data-id='${statusButton.dataset.id}']`);
        axios.put(`/student/${statusButton.dataset.id}/changeStatus`)
            .then(res => {
                
                window.location = "/";

            })
            .catch(err => {
                console.log(err)
            })
    })
})


</script>


</x-layout>