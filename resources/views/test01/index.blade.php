<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Test01</title>
</head>
    <body>
        <br>
            <center>
                
                    <h3><b>Simple customer Review System</h3>
                    <h4>Test 01</h4>
               
            </center>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-primary mb-3">
                        @if (session('status'))
                            <h6 class="alert alert-danger">{{ session('status') }}</h6>
                        @endif

                        <div class="card-header bg-transparent border-success">
                            <h4>
                                <a href="{{ url('add-notes') }}" class="btn btn-warning float-end">Add Notes</a>
                            </h4>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telephone Num</th>
                                        <th>Company</th>
                                        <th>Notes</th>
                                        <th>Image</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>{{ $item->company }}</td>
                                        <td>{{ $item->notes }}</td>
                                        <td>
                                        <center> <img src="{{ asset('uploads/students/'.$item->profile_image) }}" width="80px" height="80px" alt="Image"></center>
                                        </td>
                                        <td>
                                            <a href="{{ url('edit-test01/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            {{-- <a href="{{ url('delete-test01/'.$item->id) }}" class="btn btn-danger">Delete</a> --}}
                                            <form action="{{ url('delete-test01/'.$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

