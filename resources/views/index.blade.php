<x-layout>
<div class="container w-50 mt-4">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Status</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>Hashim</td>
        <td>Abbas</td>
        <td>Active</td>
        <td class="flex">
            <button type="button" class="btn btn-primary change-status">Update</button>
            <button type="button" class="btn btn-danger change-status">Danger</button>
        </td>
        <td>@mdo</td>
        </tr>
    </tbody>
    </table>
</div>
<script>

const status = document.querySelectorAll(".change-status");
status.addEventListener("click", function() {
    alert("test");
})

</script>
</x-layout>