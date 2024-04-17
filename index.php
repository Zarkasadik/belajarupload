<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>File upload and download</title>
</head>
<body>
    <<div class="container mt-5">
        <h2>Upload a file</h2>
        <form action="upload.php"method="POST"enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file"class="form-label">Select file</label>
                <<input type="file" class="form-control"name="file id="file">
            </div>
            <button type="submit"class="btn btn-primary">Upload file</button>
        </form>
    </div>
    
</body>
</html>