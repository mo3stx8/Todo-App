<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>📝Todo List</title>

        <!-- web icon -->
        <link rel="icon" href="{{ asset('imgs/favicon.ico') }}" type="image/x-icon">

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

        <!-- 1s container for icons and card -->
        <div class="card-container">

            <!-- icon -->
            <div class="container3">
                <a href="http://github.com/mo3stx8" target="_blank" rel="noopener noreferrer" class="github">
                    <i class="bi bi-github fs-5"></i>
                </a>
                <a href="mailto:mostafasa7754@gmail.com" target="_blank" class="mail">
                    <i class="bi bi-google fs-5"></i>
                </a>
                <a href="http://www.instagram.com/mo3st__x7?gsh=MWY3eW15cXNhZnF4cg" target="_blank"
                rel="noopener noreferrer" class="insta">
                    <i class="bi bi-instagram fs-5"></i>
                </a>
                <a href="https://www.linkedin.com/in/aogolo-9a831733b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                target="_blank" rel="noopener noreferrer" class="linke">
                    <i class="bi bi-linkedin fs-5"></i>
                </a>
            </div>

            <!-- card -->
            <div class="container">
                <h1 class="mb-4">
                    <i class="bi bi-journal-text"></i>
                    <!-- 📝 -->
                    Todo List
                </h1>

                <div class="d-flex align-items-center gap-3 mb-3">
                    <!-- icon -->
                    <button id="darkModeToggle" aria-label="Toggle Dark Mode">
                        <i id="themeIcon" class="bi bi-moon"></i> <!-- Bootstrap icon -->
                    </button>

                    <!-- btn to add task-->
                    <div class="buttons-wrapper">
                        <a class="click-btn btn-style"
                        href="{{ route('tasks.create') }}">
                        <i class="bi-plus-circle"></i>Add Task
                        </a>
                    </div>
                </div>


                @if ($tasks->count())
                <div class="card shadow-sm">
                    <div class="table-wrapper">
                        <table class="table table-bordered shadow-sm sticky-header-table">
                            <thead class="table-thead">
                                <tr>
                                    <th>Title</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>

                                <!-- title -->
                                    <td id="task-color">{{ $task->title }}</td>

                                    <!-- priority -->
                                    <td>
                                        @php
                                            $badgeClass = match($task->priority) {
                                                'Urgent' => 'badge bg-danger',
                                                'Important' => 'badge bg-warning text-dark',
                                                'Ordinary' => 'badge bg-success',
                                                default => 'badge bg-secondary',
                                            };
                                        @endphp
                                        <span class="{{ $badgeClass }}">{{ $task->priority }}</span>
                                    </td>

                                    <!-- status -->
                                    <td>
                                        @php
                                            $icon = match($task->status) {
                                                'Pending' => 'clock',
                                                'Processing' => 'gear',
                                                'Completed' => 'check-circle',
                                                default => 'question-circle',
                                            };
                                            $statusClass = match($task->status) {
                                                'Pending' => 'text-secondary',
                                                'Processing' => 'text-warning',
                                                'Completed' => 'text-success',
                                                default => 'text-muted',
                                            };
                                        @endphp
                                        <span class="{{ $statusClass }}">
                                            <i class="bi bi-{{ $icon }}"></i> {{ $task->status }}
                                        </span>
                                    </td>

                                    <!-- action -->
                                    <td>
                                        <!-- Delete -->
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <div class="buttons-wrapper">
                                                <button type="submit" class="click-delete-btn btn-delete-style">
                                                    <i class="bi bi-trash2"></i> Delete <!--Delete-->
                                                </button>
                                            </div>
                                        </form>

                                        <!-- show -->
                                        <div class="buttons-wrapper">
                                            <a class="link">
                                                <button class="click-view-btn btn-view-style"
                                                data-bs-toggle="offcanvas"
                                                data-bs-target="#taskDetails"
                                                data-id="{{ $task->id }}"
                                                href="{{ route('tasks.show', $task->id) }}">
                                                    <i class="bi bi-eye"></i> View <!--View-->
                                                </button>
                                            </a>
                                        </div>

                                        <!-- side panel -->
                                        <div class="offcanvas offcanvas-end" tabindex="-1" id="taskDetails">
                                            <div class="offcanvas-header">
                                                <h5 class="offcanvas-title">
                                                    <i class="bi bi-info-circle"></i>Task Details
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                                            </div>
                                            <div class="offcanvas-body" id="task-details-content">
                                                <div class="text-center text-muted">Loading...</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                    <p>No tasks yet.</p>
                @endif
            </div>
        </div>

        <!-- bootstrap scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
