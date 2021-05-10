<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <x-navbar />
    <div class="row" style="width: 100%">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar"style="height: 85.5vh">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        Dashboard
                    </a>
                </li>
                @if (session('user')[0]->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard#addteacher">
                        <span data-feather="file"></span> Add Teacher
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/viewteachers">
                        <span data-feather="file"></span> Get All Teachers
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/#generatepaper">
                        <span data-feather="file"></span> Generate Paper
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/viewpapers">
                        <span data-feather="file"></span> View Papers
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
<div class="container" style="height: 85.5vh">
    @if (!session('user'))
    <div class="alert alert-danger alert-dismissible fade show container" role="alert">
        <strong>Sorry !</strong> You should have login first
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <a href="/" class="btn btn-primary">Go To Home</a>

    @else

    @if (session('user')[0]->role == 'admin')
    @if (session('user')[0]->is_verified === 0)
    <div class="alert alert-danger alert-dismissible fade show container" role="alert">
        <strong>Sorry !</strong> Please Verify your email address and then you will be abale to acess the services
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <a href="/" class="btn btn-primary">Go To Home</a>
    @else

    <div class="container">
        <h2>Add Teacher</h2>
        <form id="addteacher">
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Password</label>
                <input name="password" type="password" class="form-control" id="exampleFormControlInput3" placeholder="*******" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput4">phone</label>
                <input name="phone" type="phone" class="form-control" id="exampleFormControlInput4" placeholder="" required>
            </div>
            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-patch-plus"></i> Add Teacher</button>
        </form>
    </div>
    @endif

    @elseif (session('user')[0]->role == 'teacher')
    <div class="container">
        <h3>Generate Paper</h3>
        <form id="generatepaper">
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect1">Subject</label>
                <select name="subject_code" class="custom-select mr-sm-2 form-control" id="inlineFormCustomSelect1">
                    <option value="3140709">Computer Network</option>
                    <option value="3150703">Analysis And Design Of Algorithms</option>
                    <option value="3130702">Data Structures</option>
                    <option value="3350704">Cryptography and Network Security</option>
                </select>
            </div>
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect2">Difficulty</label>
                <select name="difficulty" class="custom-select mr-sm-2 form-control" id="inlineFormCustomSelect2">
                    <option value="1">Easy</option>
                    <option value="2">Medium</option>
                    <option value="3">Hard</option>
                </select>
            </div>
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect3">Paper Style</label>
                <select name="paper_style" class="custom-select mr-sm-2 form-control" id="inlineFormCustomSelect3">
                    <option value="gtu">GTU</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-newspaper"></i> Generate Paper</button>
        </form>
    </div>

    @endif
    @endif
</div>


</div>
<x-footer />
<x-scripts />

<script>
    try {
        const form = document.querySelector('#addteacher');
        form.addEventListener('submit',e=>{
            e.preventDefault();
            let data = new FormData(form);
            axios({
                    method:'post',
                    url:'/api/admin/addTeacher',
                    data:data
                })
                .then(res =>alert(res.data.message))
            });
    }catch{

    }
    try {
        const form2 = document.querySelector('#generatepaper');

                form2.addEventListener('submit',e=>{
                    e.preventDefault();
                    let data = new FormData(form2);
                    axios({
                        method:'post',
                        url:'/api/generatepaper',
                        data:data
                    })
                // .then(res => alert(res.data.message))
                .then(res => console.log(res.data))
            })
    } catch (error) {

    }
    </script>
</body>
</html>
