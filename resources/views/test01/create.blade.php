<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Test01</title>
</head>
<br>
    <body>
          <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">

                        @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif

                        <div class="card border-primary mb-3">
                            <div class="card-header bg-transparent border-success">
                                <h4>Add Notes
                                    <a href="{{ url('test01') }}" class="btn btn-danger float-end">BACK</a>
                                </h4>
                            </div>


                            <div class="card-body">

                            @foreach($errors->all() as $error)

                                <div class="text-danger" role="alert">
                                        {{$error}}
                                </div>

                            @endforeach

                                <form action="{{ url('add-test01') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Telephone Num</label>
                                        <input type="text" name="number" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">company</label>
                                        <input type="text" name="company" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Notes</label>
                                        <input type="text" name="notes" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Profile Image</label>
                                        <input type="file" name="profile_image" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">Save Notes</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>


