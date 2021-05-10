<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <title>CPGS</title>
    <style>
        *{
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <x-navbar />

    <div class="container">
        <h2>Teachers</h2>
        @if (count($teachers) == 0)
        <div class="alert alert-danger alert-dismissible fade show container" role="alert">
            <strong>Sorry !</strong> There Are no teachers so please go to the dashboard for adding teachers
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <a href="/" class="btn btn-primary">Go To Home</a>

        @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>

            {{-- <p>{{$teachers}}</p> --}}
            <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                <th scope="row">{{$teacher->id}}</th>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->phone}}</td>
                <td><button class="btn btn-outline-danger" onclick="deleteteacher({{$teacher->id}})"><i class="bi bi-x-circle"></i>  Delete</button></td>
            </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <script>
        function deleteteacher(id){
            let deleteOrNot = confirm("Are You Sure Want to delete..?");
            if(deleteOrNot){
            axios(
                {method:'delete',
                url:`/api/admin/deleteTeacher/${id}`
            }            ).then(
                alert(res.data.message)
                )
            }
            }
            </script>

<x-scripts / >
</body>

</html>
