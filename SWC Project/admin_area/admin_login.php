<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />        

    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">

</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center m-5">Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_login_page.jpg" alt="admin Page Pic" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <input type="submit" value="Login" name="admin_login" class="bg-info py-2 px-3 border-0">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>