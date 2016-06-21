<html>

<head>
<title>Movie Ratings Database</title>
<link rel="stylesheet" href="rating-style.css" type="text/css">
<script src="sorttable.js"></script>
<script type="text/javascript">

	function validate() {
        var complete = true;

        if (document.movieform.title.value == ""
            || document.movieform.title.value == "Title required") {
            document.movieform.title.value = "Title required";
            complete = false;
        }
        if (document.movieform.year.value == ""
            || parseInt(document.movieform.year.value) < 1900
            || parseInt(document.movieform.year.value) > 2020
            || isNaN(parseInt(document.movieform.year.value))
            || document.movieform.year.value == "Valid year required") {
            document.movieform.year.value = "Valid year required";
            complete = false;
        }
        if (document.movieform.runtime.value == ""
            || document.movieform.runtime.value == "Runtime required") {
            document.movieform.runtime.value = "Runtime required";
            complete = false;
        }
        if (document.movieform.rating.value == ""
            || parseInt(document.movieform.rating.value) < 0
            || parseInt(document.movieform.rating.value) > 10
            || isNaN(parseInt(document.movieform.rating.value)) 
            || document.movieform.rating.value == "Rating required") {
            document.movieform.rating.value = "Rating required (0-10)";
            complete = false;
        }

        return complete;
	}

</script>
</head>

<body>

<table>
    <tr><td style="font-size: 42px; background-color: #c2c2d6;">
Movie Ratings Database
</td></tr>
</table>

<table class="sortable">
	<tr>
		<th>Title</th>
		<th>Year</th>
		<th>Runtime</th>
		<th>Rating</th>
	</tr>

<?php


    $connection = new mysqli("cis.gvsu.edu", "toneyc", "toneyc");
    $connection->select_db("toneyc");

    if (isset($_POST['title']) && isset($_POST['year'])) {
        $sql="INSERT INTO movies (title, year, runtime, rating) VALUES ('$_POST[title]', '$_POST[year]', '$_POST[runtime]', '$_POST[rating]')";
        $r = $connection->query($sql);
    }

    $sql = "select * from movies";

    $result = $connection->query($sql);

    while ($row = $result->fetch_array()) {
    	echo '<tr>';
    	echo '<td>';
    	echo $row['title'];
    	echo '</td><td>';
    	echo $row['year'];
    	echo '</td><td>';
    	echo $row['runtime'];
    	echo '</td><td>';
    	echo $row['rating'];
    	echo '</td></tr>';
    }

    $connection->close();



?>
</table>
<table>
    <col width="350">
    <tr>
        <th>Title</th>
        <th>Year</th>
        <th>Runtime</th>
        <th>Rating</th>
        <th></th>
    </tr>

<tr>
<form action="ratings.php" name="movieform" method="post" onsubmit="return(validate());">
	<td><input type="text" name="title" id="title"></td>
	<td><input type="text" name="year" id="year"></td>
	<td><input type="text" name="runtime" id="runtime"></td>
	<td><input type="text" name="rating" id="rating"></td>
    <td><input type="submit" value="Submit" class="movieButton"></td>
</tr>
</table>
</form>


</body>

</html>