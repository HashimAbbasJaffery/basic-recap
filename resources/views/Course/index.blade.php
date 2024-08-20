<x-layout>
<div class="container w-75 mt-4">
    <div class="search-course d-flex justify-content-between align-items-center">
        <a href="/course/create" class="btn btn-light mb-3">Create Course</a>
        <form class="search" action="{{ route('courses') }}"  method="GET">
            <input type="text" name="q" style="height: 32px;" value="{{ request()->q }}">
            <input type="submit" value="Search">
        </form>
    </div>
    @if($courses->count())
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Course</th>
        <th scope="col">Program</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->course }}</td>
            <td>{{ $course->program->program_name }}</td>
            <td class="flex">
                <a href="{{ route('updateCourse', [ 'course' => $course->id ]) }}" type="submit" class="btn btn-primary">Update</a>
                <button class="delete btn btn-danger" data-id="{{ $course->id }}">Delete</button>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@else
    <div class="alert alert-danger">No Course Found!</div>
@endif
{{ $courses->appends(request()->query())->links() }}
</div>

<script>


const status = document.querySelectorAll(".status-button");
const deleteButton = document.querySelectorAll(".delete");

deleteButton.forEach(del => {
    del.addEventListener("click", function() {
        const id = del.dataset.id;
        Swal.fire({
        title: "Are you sure? You want to delete it?",
        showDenyButton: true,
        confirmButtonText: "Delete",
        denyButtonText: `Cancel`
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            
        axios.delete(`/course/${id}/delete`)
            .then(res => {
                window.location = "/courses/?page={{ request()->page }}&q={{ request()->q }}"
            })
            .catch(err => {
                
                window.location = "/courses/?page={{ request()->page }}&q={{ request()->q }}"
            })

        } else if (result.isDenied) {

        }
        });
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