<html>

<body>
  <style>

nav {
  background-color: #333;
  overflow: hidden;
  margin: 0;
  padding: 0;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav li {
  float: left;
}

nav a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

nav a:hover {
  background-color: #111;
}

nav .active {
  background-color: red;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

form {
  text-align: center;
}


  </style>

  </head>
    <nav>
      <ul>
	<li><a class="active" href="form.html">Home</a></li>
        <li><a href="form.html">Search a Receptionist's Records</a></li>
        <li><a href="book.html">Book a Reservation</a></li>
        <li><a href="request.html">Request Perks</a></li>
        <li><a href="update.html">Update Perks</a></li>
        <li><a href="cancel_perks.html">Cancel Perks</a></li>
        <li><a href="create.html">Create a New Pet Owner Account</a></li>
      </ul>
    </nav>

<center>
<h1>HappyTails Hotel</h1>

<?php
$servername = "sql1.njit.edu";
$username = "so42";
$password = "mosgid7Dransac.";
$databasename = "so42";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}

?>

<table border="1 px">
<tr><th>Receptionist First Name</th><th>Receptionist Last Name</th><th>Receptionist ID</th><th>Receptionist Phone</th><th>Receptionist Email</th><th>Owner Address and Phone</th><th>Pet Name and Type</th><th>Check-In Date</th><th>Check-Out Date</th><th>Owner ID</th><th>Stay ID</th></tr>

<?php

  $sql = "SELECT
            Reservation_DB.AddressAndPhone AS 'Owner Address and Phone',
            Reservation_DB.NameAndType AS 'Pet Name and Type',
            Reservation_DB.InDate AS 'Check-In Date',
            Reservation_DB.OutDate AS 'Check-Out Date',
            Reservation_DB.OwnerID AS 'Owner ID',
            Reservation_DB.ID AS 'Stay ID',
            Receptionist_DB.FirstName AS 'Receptionist First Name',
            Receptionist_DB.LastName AS 'Receptionist Last Name',
            Receptionist_DB.ID AS 'Receptionist ID',
            Receptionist_DB.PhoneNumber AS 'Receptionist Phone',
            Receptionist_DB.Email AS 'Receptionist Email'
          FROM Reservation_DB
          INNER JOIN Receptionist_DB ON Receptionist_DB.ID = Reservation_DB.ID;";

$result = $conn->query($sql);

if ($result->num_rows > 0)
{

    while($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <td><?php echo $row["Receptionist First Name"]?></td>
    <td><?php echo $row["Receptionist Last Name"]?></td>
    <td><?php echo $row["Receptionist ID"]?></td>
    <td><?php echo $row["Receptionist Phone"]?></td>
    <td><?php echo $row["Receptionist Email"]?></td>
    <td><?php echo $row["Owner Address and Phone"]?></td>
    <td><?php echo $row["Pet Name and Type"]?></td>
    <td><?php echo $row["Check-In Date"]?></td>
    <td><?php echo $row["Check-Out Date"]?></td>
    <td><?php echo $row["Owner ID"]?></td>
    <td><?php echo $row["Owner ID"]?></td>

    </tr>

    <?php

    }
}

else
{
 echo "No Information to display.";
}

$conn->close();
?>

</table>

</center>
</body>
</html>
