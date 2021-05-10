<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

</head>
<body>
    <div class="container">
        <h3 align="center">Question Bank</h3>
        <br />
        <div class="table-responsive">
             <table id="questions" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                        <td>Id</td>
                        <td>Question</td>
                        <td>Subject Code</td>
                        <td>Module</td>
                        <td>marks</td>
                        <td>Difficulty</td>
                    </tr>
                  </thead>
                  @foreach ($questions as $question)
                    <tr>
                        <td>{{$question->id}}</td>
                        <td>{{$question->question}}</td>
                        <td>{{$question->subject_code}}</td>
                        <td>{{$question->module}}</td>
                        <td>{{$question->marks}}</td>
                        <td>
                            @if ($question->difficulty == 1)
                                Easy
                            @elseif ($question->difficulty == 2)
                                Medium
                            @else
                                Hard
                            @endif
                        </td>
                    </tr>
        @endforeach
             </table>
        </div>
   </div>
</body>
<script>
    $(document).ready(function(){
         $('#questions').DataTable();
    });
    </script>
</html>
