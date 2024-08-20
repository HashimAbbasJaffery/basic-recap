<x-layout>
<div class="container w-75 mt-4">
    <div class="search-course d-flex justify-content-between align-items-center">
        <a href="/program/create" class="btn btn-light mb-3">Create Program</a>
        <form class="search" action="{{ route('programs') }}"  method="GET">
            <input type="text" name="q" style="height: 32px;" value="{{ request()->q }}">
            <input type="hidden" name="page" value="{{ request()->page }}">
            <input type="submit" value="Search">
        </form>
    </div>
    @if($programs->count())
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Program</th>
        <th scope="col">Description</th>
        <th scope="col">Total Courses</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($programs as $program)
        <tr>
            <td>{{ $program->program_name }}</td>
            <td>{{ substr($program->description, 0, 60) }} {{ strlen($program->description) > 60 ? "..." : "" }}</td>
            <td>{{ $program->courses()->count() }}</td>
            <td class="flex text-center">
                <a href="{{ route('program.update', [ 'program' => $program->id ]) }}" type="submit" class="btn btn-primary">Update</a>
                <button class="delete btn btn-danger" data-id="{{ $program->id }}">Delete</button>
            </td>
        </tr>
        @endforeach

    </tbody>
    @else 
    <div class="alert alert-danger">No Programs Found!</div>
    @endif
</table>
{{ $programs->appends(request()->query())->links() }}
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
            
        axios.delete(`/program/${id}/delete`)
            .then(res => {
                window.location = `/programs?page={{request()->page}}`
            })
            .catch(err => {
                window.location = `/programs?page={{request()->page}}`
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