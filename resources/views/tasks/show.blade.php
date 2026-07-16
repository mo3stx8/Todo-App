<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task Details - {{ $task->title }}</title>

        {{-- Bootstrap CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

        {{-- Bootstrap Icons --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- custom style -->
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

        <!-- side panel -->
        <div class="container mt-5">
            <h4>{{ $task->title }}</h4>
            <p>{{ $task->description }}</p>

            <p>
                <strong>Priority:</strong>
                @php
                    $priorityClass = match($task->priority) {
                        'Urgent' => 'bg-danger',
                        'Important' => 'bg-warning text-dark',
                        'Ordinary' => 'bg-success',
                        default => 'bg-secondary',
                    };
                @endphp
                <span class="badge {{ $priorityClass }}">
                    {{ $task->priority }}
                </span>
            </p>

            <p>
                <strong>Status:</strong>
                @php
                    $statusClass = match($task->status) {
                        'Pending' => 'text-secondary',
                        'Processing' => 'text-warning',
                        'Completed' => 'text-success',
                        default => 'text-muted',
                    };

                    $statusIcon = match($task->status) {
                        'Pending' => 'clock',
                        'Processing' => 'gear',
                        'Completed' => 'check-circle',
                        default => 'question-circle',
                    };
                @endphp
                <span class="{{ $statusClass }}">
                    <i class="bi bi-{{ $statusIcon }}"></i> {{ $task->status }}
                </span>
            </p>

            <!-- btn for edit -->
            <a href="{{ route('tasks.edit', $task->id) }}" class="click-cancel-btn btn-cancel-style">
                <i class="bi bi-pencil"></i>Edit Task
            </a>
        </div>

        {{-- Bootstrap JS (optional) --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
