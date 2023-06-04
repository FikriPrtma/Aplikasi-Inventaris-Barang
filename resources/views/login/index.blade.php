<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ URL::asset('assets/css/login/styleLogin.css'); }} />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Login Page</title>
</head>

<body>
    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="assets/img/logoInv.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Sign In</h1>
                <div>Please login to use the platform</div>
            </div>
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
            </div>    
            @endif
            
            <form class="login-card-form">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" placeholder="Enter Email" id="emailForm" 
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Enter Password" id="passwordForm"
                     required>
                </div>
                <button type="submit">Sign In</button>
            </form>
            <div class="login-card-footer">
                Don't have an account? <a href="/register">Create a free account.</a>
            </div>
        </div>
    </body>
</html>