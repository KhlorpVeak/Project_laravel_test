<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid ">
                <div>
                    <img src="https://w7.pngwing.com/pngs/399/620/png-transparent-laravel-hd-logo.png" alt="logo" width="40px">
                </div>
                    <form class="d-flex" method="get" action="/search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
    </nav>
    <div class="container p-4 w-60 container">
            @yield('content')     
    </div>
</body>
</html>