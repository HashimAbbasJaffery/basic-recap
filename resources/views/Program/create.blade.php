<x-layout>
    <div class="container w-75 mx-auto">
        <form action="{{ route('program.store') }}" style="text-align: center;" method="POST" name="formAdd">
            @csrf
            
            <p class="mb-1">Program Name: </p>
            <input type="text" value="{{ old('program_name') }}" name="program_name">
            @error("program_name")
                <p>{{ $message }}</p>
            @enderror
            <p class="mb-1">Description: </p>
            <textarea style="resize: none;" name="description">{{ old('description') }}</textarea>
            @error("description")
                <p>{{ $message }}</p>
            @enderror
            <br>
            <input class="mt-2" type="submit">
        </form>
    </div>
    <script>
        
    </script>
</x-layout>