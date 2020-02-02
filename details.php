<?php 
    require 'config.php';

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($mysqli->connect_errno) {
        echo $mysqli->connect_error;
        exit();
    }

    //if id correctly set, populate from database
    if(isset($_GET['id']) && !empty($_GET['id'])) {

        $sql = "SELECT * FROM immigrants 
            WHERE id = " . $_GET['id'] . ";";

        $results = $mysqli->query($sql);
        if(!$results) {
            echo $mysqli->error;
        }
        
        // $statement = $mysqli->prepare($sql);
        // $statement->bind_param("i", $id);
        // $statement->execute();

        //should only be one row of results for one id
        $row = $results->fetch_assoc();

    }
    //otherwise redirect back to main page
    else {
        header('Location: index.php');
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">


    <title>Details</title>

    <style>
        .container {
            display: flex;
            justify-content: center;
        }
        #inner-container {
            /* width: 50%; */
            margin-bottom: 40px;
            margin-top: 20px;
        }

        #inner-container div {
            padding-left: 40px;
        }

        .category {
            font-weight: bold;
            padding-left: 20px !important;
            margin-top: 15px;
        }
        .header {
            padding-left: 0px !important;
            margin-top: 40px;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div id="inner-container">

            <div id="biographical-info">
                <h4 class="header">Biographical Information</h4 class="header">
                <div class="category">Name</div>
                <div id="name">
                    <?php echo $row['name']; ?>
                </div>
                <div class="category">A#</div>
                <div id="a-num">
                    <?php echo $row['anum']; ?>
                </div>
                <div class="category">Country of Origin</div>
                <div id="origin-country">
                    <?php echo $row['country']; ?>
                </div>
                <div class="category">Detention Center</div>
                <div id="detention-center">
                    <?php echo $row['center']; ?>
                </div>
            </div>
            <div id="preliminary-qs">
                <h4 class="header">Preliminary Questions</h4 class="header">
                <div class="category">Previous Attorney?</div>
                <div id="previous-attorney">
                    <?php echo $row['attorney']; ?> 
                </div>
            </div>
            <div id="last-entry">
                <h4 class="header">Last Entry</h4 class="header">
                <div class="category">Last U.S. Entry</div>
                <div id="last-us-entry">
                    <?php echo $row['lastentry']; ?>
                </div>
            </div>
            <div id="community-ties">
                <h4 class="header">Community Ties</h4 class="header">
                <div class="category">U.S. Family</div>
                <div id="us-family">
                    <?php echo $row['family']; ?>
                </div>
            </div>
            <div id="detention-history">
                <h4 class="header">Detention History</h4 class="header">
                <div class="category">How Detained?</div>
                <div id="how-detained">
                    <?php echo $row['howdetained']; ?>
                </div>
            </div>
            <div id="potential-bars">
                <h4 class="header">Potential Bars</h4 class="header">
                <div class="category">Previously Deported?</div>
                <div id="previously-deported">
                    <?php echo $row['deported']; ?>
                </div>
            </div>
            <div id="other-details">
                <h4 class="header">Other Details</h4 class="header">
                <div class="category">Anything Else?</div>
                <div id="anything-else">
                    <?php echo $row['otherdetails']; ?>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>