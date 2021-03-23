<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>second task</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <form style="max-width: 400px;" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="text-input">some text</label>
                <input type="text" class="form-control" id="text-input" aria-describedby="textHelp" placeholder="Enter some text">
                <small id="textHelp" class="form-text text-muted">You can type some text here.</small>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile">Example file input</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
    </div>
    
</body>
</html>