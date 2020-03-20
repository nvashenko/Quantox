<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-body">

            <!-- New Task Form -->
                <form action="{{ url('student')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name') }}">
                        </div>
                        <label for="grades" class="col-sm-3 control-label">Grades (delimited by comma)</label>
                        <div class="col-sm-6">
                            <input type="text" name="grades" id="grades" class="form-control"
                                   value="{{ old('grades') }}">
                        </div>
                        <label for="boards" class="col-sm-3 control-label">Board</label>
                        <div class="col-sm-6">
                            <select  name="board" id="board" class="form-control">
                                @foreach ($boards as $board)
                                    <option value="{{ $board->id }}" {{ old('boards') === $board->id ? 'selected' : '' }}>{{ $board->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        @if (count($students) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                   Students
                </div>

                <div class="panel-body">
                    <table class="table table-striped table">
                        <thead>
                        <th>Student</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $student->name }}</div>
                                </td>

                                <!-- Task Delete Button -->
                                <td>
                                    <a href="{{ url('student/'.$student->id) }}">view</a>
                                </td>
                                <td>
                                    <form action="{{ url('student/'.$student->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
</body>
</html>
