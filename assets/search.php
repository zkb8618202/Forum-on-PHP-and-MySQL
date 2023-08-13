<?php require "dbconnect.php";?>
<!doctype html>
<html lang="en">

<head>
    <title>Search Results for - <?php echo $_GET['search'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            #main{
                min-height: 82vh;
            }
        </style>
</head>

<body>
    <?php include "header.php";?>
    <div class="container my-3" id="main">
        <h1 class="my-3 py-2"> Search results for <em>"<?php echo $_GET['search'] ?>"</em></h1>
<?php
                $query = $_GET['search'] ;
                $noresult = true;
                $sql = "SELECT * FROM `threads` WHERE MATCH (`thread_title` , `thread_desc`) against ('$query')";
                $result = mysqli_query($con,$sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['thread_id'];
                    $title = $row['thread_title'];
                    $desc = $row['thread_desc'];
                    $noresult = false;

                    echo '  <div class="container my-3">
                    <h3 class="my-3"><a href="/forum/threads.php?threadid='.$id.'" class="text-dark">'.$title.'</a></h3>
                    <p class="my-3">'.$desc.'</p>
                    </div>';
                }
                if($noresult){
                    echo ' <div class="jumbotron my-3">
                <h1 class="display-3">No Result Found</h1>
                <p class="lead">Try Different Keywords</p>
                <hr class="my-2">
            </div>';
                }



?>

       

        
       
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include "footer.php";?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>