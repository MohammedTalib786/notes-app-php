<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>

    </style>
</head>

<body>
    <?php include("./header.php") ?>
    <?php include("database.php") ?>

    <div class="container py-4 ">
        <form action="index.php" method="post">
            <input type="text" class="form-control my-3" name="title" id="" placeholder="Enter Title">
            <textarea class="form-control my-3" id="" rows="3" name="description" placeholder="Enter Description"></textarea>
            <button class="btn btn-primary my-3 " name="submit">Add Note</button>
        </form>
        <?php

        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            $description = $_POST["description"];
            if (empty($title)) {
                // echo " <script>alert('Enter Title')</script>";
            } elseif (empty($description)) {
                // echo " <script>alert('Enter Description')</script>";
            } else {
                $sqlInsert = "INSERT INTO notes (title, description) VALUES ('$title', '$description') ";
                if (mysqli_query($con, $sqlInsert)) {
                    echo "<script> window.location = 'index.php' </script>";
                    // echo "Saved";
                }
            }
        }
        ?>
    </div>

    <h2 class="my-4 text-center "> YOUR NOTES </h2>

    <!-- ~~~~~~~~~~~~ SHOW NOTES ~~~~~~~~~~~~ -->

    <div class="container d-flex justify-content-center align-items-center flex-wrap gap-5 py-5 ">

        <?php

        $selQuery = "SELECT * FROM notes";
        $getQuery = mysqli_query($con, $selQuery);
        $rows = mysqli_num_rows($getQuery);
        // echo $rows;
        if ($rows > 0) {
            while ($notes = mysqli_fetch_assoc($getQuery)) {
                echo "
                    <div class='card' style='width: 20rem;'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$notes['title']}</h5>
                            <p class='card-text'>{$notes['description']}</p>
                            <a href='delete.php?sr_no={$notes['sr_no']}' class='btn btn-danger'>Delete Note</a>
                        </div>
                    </div>
                    ";
            }
        } else {
            echo "
                <div class='card' style='width: 20rem;'>
                    <div class='card-body'>
                        <h5 class='card-title'>No Notes</h5>
                        <p class='card-text'>No notes are Available!</p>
                    </div>
                </div>
            ";
        }

        ?>
        <!-- <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-danger  ">Delete Note</a>
            </div>
        </div> -->

    </div>

    <?php
    mysqli_close($con)
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>