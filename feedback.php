<div class="container">
    <div class="box form-box">
        <header class="header">User Feedback</header>
        <?php 
        include("db_connect.php");

        $feedback_query = "SELECT * FROM feedback";
        $result = mysqli_query($conn, $feedback_query);

        if(mysqli_num_rows($result) > 0) {
            echo "<table>
                    <tr>
                        <th>Username</th>
                        <th>Feedback</th>
                    </tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['username']}</td>
                        <td>{$row['feedback']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No feedback available.</p>";
        }
        ?>
    </div>
</div>