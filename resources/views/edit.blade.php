@extends('layouts.app')




@section('content')

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        /* Center the button within a div */
        .center-button {
            text-align: center;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-paragraph{
            color: red;

        }
    </style>
    <div class="container">
        <h2>Add Task</h2>
        <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$task->title}}" />
            </div>
            @error('title')
            <p class="error-paragraph"> {{$message}}</p>
            @enderror

            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="5">{{$task->description}}</textarea>
            </div>
            @error('description')
            <p class="error-paragraph"> {{$message}}</p>
            @enderror

            <div>
                <label for="long_description">Long Description</label>
                <textarea name="long_description" id="long_description" rows="10">{{$task->long_description}}</textarea>
            </div>
            @error('long_description')
            <p class="error-paragraph"> {{$message}}</p>
            @enderror


            <!-- Center the button within a div -->
            <div class="center-button">
                <button type="submit">Edit Task</button>
            </div>


        </form>
    </div>

@endsection
