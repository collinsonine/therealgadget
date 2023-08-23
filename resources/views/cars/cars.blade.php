<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>

    <div class="container">
        <div class="col-10 mt-5 mx-auto">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>SN</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cars as $car)
                            <tr>
                                <td>{{$car->id}}</td>
                                <td> <a href="{{route('car.info', ['id' => $car->id])}}">{{$car->name}}</a></td>
                                <td>{{$car->description}}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center"> Sorry No Data Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
