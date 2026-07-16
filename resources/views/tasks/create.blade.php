<!DOCTYPE html>
<html>
    <head>
        <title>Add Task</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        @vite(['resources/css/style.css'])

        <!-- js -->
        @vite(['resources/js/app.js'])
        @vite(['resources/js/sidepanel.js'])

        <!-- scss -->
        @vite(['resources/sass/app.scss'])

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    </head>
    <body>
        <div class="container2">
            <h2 class="mb-4">
                <i class="bi bi-plus"></i>Add New Task
            </h2>

            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf

                <!-- title -->
                <div class="mb-3">
                    <label class="form-label">Task Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <!-- Description fixed size box -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>

                <!-- Priority in dropdown list -->
                <div class="mb-3">
                    <label class="form-label">Priority</label>
                    <x-priority-dropdown/>
                </div>

                <!-- btns to add a task or cancel it -->
                <!-- Add -->
                <button type="submit" class="click-add-btn btn-add-style">
                    <i class="bi bi-file-earmark-plus"></i> Add
                </button>

                <!-- Cancel -->
                <a href="{{ route('tasks.index') }}" class="click-cancel-btn btn-cancel-style">
                    <i class="bi bi-x-square"></i> Cancel
                </a>
            </form>
        </div>

        <!-- scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
