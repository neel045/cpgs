<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign UP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <x-navbar />

    <div class="container">
        <h3 class="center">Signup</h3>
        <form id="signup">
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Organization Name" required>
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
            <div class="form-group">
                <label for="exampleFormControlInput1">Admin Name</label>
                <input name="admin_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Address</label>
                <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">SignUP</button>
        </form>
    </div>

    <x-scripts />

    <script>
        const form = document.querySelector('#signup');
        form.addEventListener('submit',e=>{
        e.preventDefault();
        let data = new FormData(form);
        axios({
            method:'post',
            url:'/api/users/signup',
            data:data
        })
        .then((res) =>{
            console.log(res);
            if(res.status == 'sucess'){
                window.location = '/'
            }
        } )
    })
    </script>

</body>
</html>
