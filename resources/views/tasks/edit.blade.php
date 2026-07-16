<!DOCTYPE html>
<html>
    <head>
        <title>Edit Task</title>

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
                <i class="bi bi-pencil"></i>Edit Task
            </h2>


            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
                </div>

                <!-- Description fixed size box -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $task->description) }}</textarea>
                </div>

                <!-- Priority in dropdown list -->
                <div class="mb-3">
                    <label class="form-label">Priority</label>
                    <x-priority-dropdown :selected="$task->priority" />
                </div>


                <!-- Status in dropdown list -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Processing" {{ $task->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                        <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <!-- btn to confirm edit process -->
                <button type="submit" class="click-delete-btn btn-delete-style">
                    <i class="bi bi-save"></i> Save
                </button>
            </form>
        </div>

        <!-- scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
