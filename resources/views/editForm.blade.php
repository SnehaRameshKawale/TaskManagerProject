<!doctype html>
<html lang="en" style="height: 100%">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Task Managemenet||Edit Form</title>
    {{-- <link rel="stylesheet" href="{{asset(css\style.css)}}"> --}}
  </head>
  <body style="height: 100%;weight:100%;margin-top:150px">
    <div class="container">
        <form action="{{route('update.task',['id'=>$data->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label for="staticTitle" class="col-sm-2 col-form-label font-weight-bold">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="{{$data->title}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Description</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="description" name="description" value="{{$data->description}}">
              </div>
            </div>
            <div class="form-group row">
                <label for="inputPriority" class="col-sm-2 col-form-label font-weight-bold">Priority</label>
                <div class="col-sm-10">
                    <select class="form-control" name="priority">
                        @if ($data->priority === 'high')
                            <option selected>High</option>
                        @else
                            <option>High</option>
                        @endif
                
                        @if ($data->priority === 'medium')
                            <option selected>Medium</option>
                        @else
                            <option>Medium</option>
                        @endif
                
                        @if ($data->priority === 'low')
                            <option selected>Low</option>
                        @else
                            <option>Low</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Due Date</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="duedate" name="duedate" value="{{$data->duedate}}">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn bg-primary text-light font-weight-bold">Add Task</button>
            </div>
          </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>