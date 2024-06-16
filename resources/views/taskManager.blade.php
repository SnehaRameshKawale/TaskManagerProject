<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Task Management!</title>
</head>
<body>
<div class="container">
    <h1 class="mt-4 text-center">Task Management System</h1>
    <h3 class="mt-3 text-center">Task List</h3>
    <div class="mt-5">
        <button class="btn btn-primary"><a href="{{ route('addtask.form') }}" class="text-light font-weight-bold">Create Task</a></button>
        <button class="btn btn-success"><a href="{{route('showCompleted.task')}}" class="text-light font-weight-bold">Show Completed Task</a></button>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-bordered table-dark">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Priority</th>
                <th scope="col">Due Date</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data->sortByDesc(function ($item) {
                return $item->priority == 'high' ? 3 : ($item->priority == 'medium' ? 2 : 1);
            }) as $item)
                <tr>
                    <td class="font-weight-bold">{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->priority }}</td>
                    <td>{{ $item->duedate }}</td>
                    <td>
                        <form action="{{route('complete.task',['id' => $item->id])}}" method="POST" style="display:inline">
                            @csrf
                            <button class="btn btn-success mt-1 taskComplete"><span class="text-light font-weight-bold">Completed</span></button>
                        </form>
                            <form action="{{ route('edit.task', ['id' => $item->id]) }}" method="POST" style="display:inline">
                            @csrf
                            <button class="btn btn-primary mt-1"><span class="text-light font-weight-bold">Edit</span></button>
                        </form>
                        <form action="{{ route('remove.task', ['id' => $item->id]) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mt-1"><span class="text-light font-weight-bold">Remove</span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>