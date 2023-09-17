@extends('layouts.app')

@section('title')
    <div class="task-item mb-3">
        <h1 class="text-center mt-4 mb-5">Task List</h1>
    </div>

@endsection

@section('content')

    <style>
        .completed-task {
            text-decoration: line-through;
        }
    </style>


    <div class="container">
        <div class="task-card p-4">
            @forelse($tasks as $task)
                <div class="task-item mb-3">
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="task-link {{ $task->completed ? 'completed-task' : '' }}">
                        {{ $task->title }}
                    </a>
                </div>
            @empty
                <div class="empty-message">There are no tasks</div>
            @endforelse
        </div>

        <div class="col-md-12">
            <div class="middle-button">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Tasks</a>

            </div>

        </div>
    </div>
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

    .task-item {
        text-align: center;
    }

    .task-link {
        text-decoration: none;
        color: #007BFF;
        font-weight: bold;
        font-size: 18px;
    }

    .task-link:hover {
        color: #0056b3;
    }

    .empty-message {
        text-align: center;
        font-size: 18px;
        color: #555;
    }

    strong {
        font-weight: bold;
    }

    .middle-button {
        text-align: center;

    }






</style>
