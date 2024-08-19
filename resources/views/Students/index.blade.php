<x-layout>
<div class="container w-50 mt-4">
    
    <div class="search-course d-flex justify-content-between align-items-center">
        <a href="/student/add" class="btn btn-light mb-3">Create Student</a>
        <form class="search" action="{{ route('students') }}"  method="GET">
            <input type="text" name="q" style="height: 32px;" value="{{ request()->q }}">
            <input type="submit" value="Search">
        </form>
    </div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Course Enrolled</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>
                <button type="submit" class="btn btn-light status-button enable {{ $student->status ? 'd-none' : '' }}" data-id="{{ $student->id }}">Active</button>
                <button type="submit" class="btn btn-dark status-button disable {{ !$student->status ? 'd-none' : '' }}" data-id="{{ $student->id }}">Deactive</button>
            </td>
            @php

                $courses = implode(", ", $student->courses->pluck("course")->toArray());
            @endphp
            <td>{{ $courses ? $courses : "Not enrolled yet!" }}</td>
            <td class="flex">
                <button class="delete btn btn-danger" data-id="{{ $student->id }}">Delete</button>
                <!-- <a href="/student/{{ $student->id }}" class="btn btn-primary" data-id="{{ $student->id }}">More Information</a> -->
                <a href="{{ route('updateUser', [ 'user' => $student->id ]) }}" class="btn btn-primary" data-id="{{ $student->id }}">Update</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{{ $students->links() }}
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