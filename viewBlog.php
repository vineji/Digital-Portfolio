<html>
    <head>
        <title>Blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="reset.css" media="screen" />
        <link rel="stylesheet" href="style.css" media="screen" />
    </head>
    <body class="blogContainer">
        <nav style="padding-top: 0.3cm;" class="item1">
            <ul>
                <li style="padding-right: 30px; padding-top: 0.3cm;" class = "item12"><a href="session.php">Add post</a></li>
                <li style="padding-right: 30px; padding-top: 0.3cm;" class = "item12"><a href="index.php">Home</a></li>
            </ul>
        </nav>
        <div class="login0" style="padding-bottom: 10rem;" id="top">
          <h1 class="login1" id="addBlog">My blog</h1>
          <form method="post" name="month" style="display: flex; flex-direction: row; gap: 1rem;">
            <div class="month">
                <label for="month">Blogs from :</label>
                <select name="month">
                    <option value="" <?php if($_POST['month']==''){echo 'selected';} ?>>all months</option>
                    <option value="01" <?php if($_POST['month']=='01'){echo 'selected';} ?>>January</option>
                    <option value="02" <?php if($_POST['month']=='02'){echo 'selected';} ?>>February</option>
                    <option value="03" <?php if($_POST['month']=='03'){echo 'selected';} ?>>March</option>
                    <option value="04" <?php if($_POST['month']=='04'){echo 'selected';} ?>>April</option>
                    <option value="05" <?php if($_POST['month']=='05'){echo 'selected';} ?>>May</option>
                    <option value="06" <?php if($_POST['month']=='06'){echo 'selected';} ?>>June</option>
                    <option value="07" <?php if($_POST['month']=='07'){echo 'selected';} ?>>July</option>
                    <option value="08" <?php if($_POST['month']=='08'){echo 'selected';} ?>>August</option>
                    <option value="09" <?php if($_POST['month']=='09'){echo 'selected';} ?>>September</option>
                    <option value="10" <?php if($_POST['month']=='10'){echo 'selected';} ?>>October</option>
                    <option value="11" <?php if($_POST['month']=='11'){echo 'selected';} ?>>November</option>
                    <option value="12" <?php if($_POST['month']=='12'){echo 'selected';} ?>>December</option>
                </select>
            </div>
            <input type="submit" value="Show" class="month_input">
          </form>
          <div class="viewBlog1">  
                <?php
                // Connect to the database
                $servername = "*********";
                $username = "****";
                $password = "****";
                $dbname = "*****";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if (isset($_POST["month"])){
                    if ($_POST['month'] != ""){
                        $sq1 = "SELECT date FROM BlogPosts WHERE MONTH(date) = '{$_POST['month']}'";
                        $sq2 = "SELECT time FROM BlogPosts WHERE MONTH(date) = '{$_POST['month']}'";
                    }
                    else{
                        $sq1 = "SELECT date FROM BlogPosts ";
                        $sq2 = "SELECT time FROM BlogPosts ";

                    }
                }
                else{
                    $sq1 = "SELECT date FROM BlogPosts ";
                    $sq2 = "SELECT time FROM BlogPosts ";
                }

                $date_result = $conn->query($sq1);
                $date_array = array();
                while ($row = $date_result->fetch_assoc()){
                    $date_array[] = $row['date'];
                }
                function date_sorting($a, $b){
                    return strtotime($b) - strtotime($a);
                }
                usort($date_array, 'date_sorting');
                $date_array = array_unique($date_array);



                $time_result = $conn->query($sq2);
                $time_array = array();
                while ($row = $time_result->fetch_assoc()){
                    $time_array[] = $row['time'];
                }
                function time_sorting($a, $b){
                    return strtotime($b)-strtotime($a);
                }
                usort($time_array, 'time_sorting');
                $time_array = array_unique($time_array);


                if ($date_result->num_rows == 0){
                    echo "<div class='viewBlogs' id='viewBlogs'>";
                    echo "<h>" ."No blog posts " . "</h>";
                    echo "</div>";

                } 
                else{
                    echo "<div class='viewBlogs' >";
                    foreach ($date_array as $date){
                        foreach ($time_array as $time){
                            $sql = "SELECT * FROM BlogPosts WHERE date ='$date' AND time ='$time' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<div style='padding-top: 1rem;'>";
                                    echo "<h>" . $row["title"]. "</h>";
                                    echo "<article style='width: 71rem;'>" . $row["content"]. "</article>";
                                    echo "<p>" ."Posted at " . $row["time"]. " on " . $row["date"]. "</p>";
                                    echo "<hr style='border-color: black;'>";
                                    echo "</div>";
                                }
                            } 
                        } 
                    }
                    echo "</div>";
                    echo "<div style='padding-top: 1rem;'></div>";
                    echo "<a class='top' href='#top'>  " . "back to top" ." <div style= 'color: aqua;' >  "."&uarr;"."  </div></a>";

                }
                $conn->close();
                ?>
          </div>
        </div>
    </body>
