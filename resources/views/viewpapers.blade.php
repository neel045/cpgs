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
        <h1>Papers</h1>
        @if (count($papers) == 0)
        <div class="alert alert-danger alert-dismissible fade show container" role="alert">
            <strong>Sorry !</strong> There Are no papers so please go to the dashboard for adding papers
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <a href="/dashboard" class="btn btn-primary">Go To Dashboard</a>

        @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Paper Id</th>
                    <th scope="col">paper</th>
                    <th scope="col">Subject Code</th>
                    <th scope="col">View Paper</th>
                    <th scope="col">Delete Paper</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($papers as $paper)
                <tr>
                <th scope="row">{{$paper->paper_id}}</th>
                <td>{{$paper->paper}}</td>
                <td>{{$paper->subject_code}}</td>
                <td><a href="/paper/{{$paper->paper_id}}" class="btn btn-outline-success"><i class="bi bi-envelope-open"></i> View</a></td>
                <td><button class="btn btn-outline-danger" onclick="deletePaper({{$paper->paper_id}})"><i class="bi bi-x-circle"></i> Delete</button></td>
            </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <script>
        function deletePaper(id){
            let deleteOrNot = confirm("Are You Sure Want to delete..?");
            if (deleteOrNot) {
            axios({
                method:'delete',
                url:`/api/paper/${id}`
            })
            .then((res) =>{
                alert(res.data.message);
                window.location.reload();
            })
            }
            }
            </script>

<x-scripts / >
</body>

</html>
