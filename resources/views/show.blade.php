@extends('layouts.app')



@section('content')
    <div class="container mt-4">
        <div class="task-card p-4">
            <h1 class="text-center mb-4">{{ $task->title }}</h1>

            <p><strong>Description:</strong> {{ $task->description }}</p>

            @if ($task->long_description)
                <p><strong>Long Description:</strong> {{ $task->long_description }}</p>
            @else
                <p>No Long Description Available</p>
            @endif

            <p><strong>Status:</strong> {{ $task->completed ? 'Completed' : 'Incomplete' }}</p>
            <p><strong>Created At:</strong> {{ $task->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $task->updated_at }}</p>

            <div class="col-md-12">
                <div class="row align-items-center">

                    <div class="col-md-6"> <!-- Form column -->
                        @if($task->completed == 0)
                            <form action="{{ route('tasks.complete', ['task' => $task->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Complete Task</button>
                            </form>
                        @elseif($task->completed == 1)
                            <form action="{{ route('tasks.redo', ['task' => $task->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning">Redo Task</button>
                            </form>
                        @endif

                    </div>
                    <div class="col-md-6 right-button">

                        <a href="{{ route('tasks.index') }}" class="btn btn-primary">All Tasks</a>
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-primary">Edit Task</a>
                        <a href="{{route('tasks.index')}}" class="btn btn-danger" onclick="deleteTask({{ $task->id }})">Delete Task</a>

                    </div>

                </div>







            </div>


        </div>

    </div>
    <script>
        function deleteTask(taskId) {
            if (confirm('Are you sure you want to delete this task?')) {
                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Configure the DELETE request
                xhr.open('DELETE', '{{ route('tasks.delete', ['task' => ':task_id']) }}'.replace(':task_id', taskId), true);
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                // Define the callback function when the request completes
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // Handle success (e.g., redirect to another page)
                        window.location.href = '{{ route('tasks.index') }}';
                    } else {
                        // Handle errors (e.g., display an error message)
                        console.error('Error:', xhr.responseText);
                    }
                };

                // Send the DELETE request
                xhr.send();
            }
        }
    </script>
@endsection
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    .task-card {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #007BFF;
        font-size: 24px;
        margin-bottom: 20px;
    }

    p {
        font-size: 16px;
        margin-bottom: 10px;
    }

    strong {
        font-weight: bold;
    }

    .right-button {
        text-align: right;
    }




</style>

