<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$car->name}}</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>

    <div class="container">
        <div class="col-10 mt-5 mx-auto">
            <div class="card">
                <div class="card-header text-center h4">
                    Car Info
                </div>

                <div class="card-body">
                    <div class="text-center">
                        <div class="h4">{{$car->name}}</div>
                        <p>{{$car->description}}</p>
                        <div class="h5 mt-3 mb-3">Models:</div>
                        <ul class="list-group list-group-horizontal d-flex justify-content-center">
                            @forelse ($car->carmodels as $carmodel)
                                <li class="list-group-item">{{$carmodel->model}}</li>
                            @empty
                                <p>Sorry, No Model Found</p>
                            @endforelse
                        </ul>
                        <div class="h5 mt-3 mb-3">Colors:</div>
                        <ul class="list-group list-group-horizontal d-flex justify-content-center">
                            @forelse ($car->carmodels as $carcolor)
                                <li class="list-group-item">{{$carcolor->color}}</li>
                            @empty
                                <p>Sorry, No Model Found</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
