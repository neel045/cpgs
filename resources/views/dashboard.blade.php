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

    @if (!session('user'))
    <div class="alert alert-danger" role="alert">
        Please Login First
      </div>
    @else


    @if (session('user')[0]->role == 'admin')

    <div class="container">
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Add Teacher</a>
            {{-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">View Teachers</button> --}}
        </p>
        <div class="row">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <form id="addteacher">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="*******" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">phone</label>
                            <input name="phone" type="phone" class="form-control" id="exampleFormControlInput1" placeholder="" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Teacher</button>
                    </form>
                </div>
            </div>
            {{-- <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    @elseif (session('user')[0]->role == 'teacher')

    <div class="container">
        <p class="mt-4">
            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Generate Paper</a>
            <a href="/questions" class="btn btn-primary">Get All Questions</a>
            {{-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">View Teachers</button> --}}
        </p>
        <div class="row">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <form id="generatepaper">
                        <div class="form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Subject</label>
                            <select name="subject_code" class="custom-select mr-sm-2 form-control" id="inlineFormCustomSelect">
                                <option value="3140709">Computer Network</option>
                                {{-- <option value="3140705">Teacher</option> --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Difficulty</label>
                            <select name="difficulty" class="custom-select mr-sm-2 form-control" id="inlineFormCustomSelect">
                                <option value="1">Easy</option>
                                <option value="2">Medium</option>
                                <option value="3">Hard</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Paper Style</label>
                            <select name="paper_style" class="custom-select mr-sm-2 form-control" id="inlineFormCustomSelect">
                                <option value="mst">MST</option>
                                <option value="gtu">GTU</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Paper</button>
                    </form>
                </div>
            </div>
            {{-- <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    @endif
    @endif

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
                .then((res) =>{
                    console.log(res);
                    if(res.data.status == 'sucess'){
                        alert(res.data.message);
                        window.location = '/login'
                    }else{
                        alert(res.data.message);
                    }
                } )
            });
        } catch (error) {
        }
        const form2 = document.querySelector('#generatepaper');
        form2.addEventListener('submit',e=>{
            e.preventDefault();
            let data = new FormData(form2);
            axios({
                method:'post',
                url:'/api/generatepaper',
                data:data
            })
        .then((res) =>{
            console.log(res);
            if(res.data.status == 'sucess'){
                alert(res.data.message);
            }else{
                alert(res.data.message);
            }
        } )
    })
    </script>
</body>
</html>
