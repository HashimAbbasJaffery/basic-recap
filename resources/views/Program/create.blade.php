<x-layout>
    <div class="container w-75">
        <form action="{{ route('program.store') }}" method="POST" name="formAdd">
            @csrf
                
            <label for="program_name" class="w-100 mb-1">
                <h2 style="font-size: 20px;">Program Name</h2>
                @error("program_name")
                    <p class="mb-1 text-danger" style="font-size: 12px;">{{ $message }}</p>
                @enderror
                <input type="text" value="{{ old('program_name') }}" class="@error('program_name') border border-danger @enderror form-control w-50" id="name" name="program_name">
            </label>

            <label for="description" class="w-100 mb-1">
                <h2 style="font-size: 20px;">Description</h2>
                @error("description")
                    <p class="mb-1 text-danger" style="font-size: 12px;">{{ $message }}</p>
                @enderror
                <textarea style="resize: none;" class="@error('description') border border-danger @enderror  form-control" name="description">{{ old('description') }}</textarea>
            </label>
            <br>
            <input class="mt-2 btn btn-primary form-control" type="submit">
        </form>
    </div>
    <script>
        
    </script>
</x-layout>