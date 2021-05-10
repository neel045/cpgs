<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <x-navbar />

    <div class="container">
        <h3 class="center">Login</h3>
        <form id="login">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Password</label>
                <input name="password" type="password" class="form-control" id="exampleFormControlInput2" placeholder="*******" required>
            </div>
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Role</label>
                <select name="role" class="custom-select mr-sm-2 form-control" id="inlineFormCustomSelect">
                    <option value="admin">Admin</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary">Log In</button>
        </form>
    </div>

    <x-footer />
    <x-scripts />

    <script>
        const form = document.querySelector('#login');
        form.addEventListener('submit',e=>{
        e.preventDefault();
        let data = new FormData(form);
        const url = data.get('role') == 'admin' ? '/api/users/login': '/api/users/loginteacher';

        axios({
            method:'POST',
            url:url,
            data:data
        })
        .then((res) =>{
            if(res.data.status == 'sucess'){
                alert(res.data.message);
                window.location = '/dashboard'
            }
        } )
    })
    </script>

</body>
</html>


