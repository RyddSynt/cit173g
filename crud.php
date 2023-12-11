<!DOCTYPE html>
<html>
<head>
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add User</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

        <h2>Add Instructor</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="instructor_name">Instructor Name:</label>
                <input type="text" class="form-control" id="instructor_name" name="instructor_name">
            </div>
            <div class="form-group">
                <label for="specialization">Specialization:</label>
                <input type="text" class="form-control" id="specialization" name="specialization">
            </div>
            <button type="submit" class="btn btn-primary" name="submit_instructor">Submit</button>
        </form>

        <h2>Add Course</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" class="form-control" id="course_name" name="course_name">
            </div>
            <div class="form-group">
                <label for="specification">Course Specification:</label>
                <input type="text" class="form-control" id="specification" name="specification">
            </div>
            <button type="submit" class="btn btn-primary" name="submit_course">Submit</button>
        </form>

        <?php
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kin-iway";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the user form has been submitted
        if (isset($_POST["submit"])) {
            // Sanitize and validate inputs
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            // Insert data into users table
            $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "New user record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Check if the instructor form has been submitted
        if (isset($_POST["submit_instructor"])) {
            // Sanitize and validate inputs
            $instructor_name = mysqli_real_escape_string($conn, $_POST['instructor_name']);
            $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);

            // Insert data into instructors table
            $sql = "INSERT INTO instructors (instructor_name, specialization) VALUES ('$instructor_name', '$specialization')";

            if ($conn->query($sql) === TRUE) {
                echo "New instructor record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Select data from the users table
        $sql = "SELECT id, username, email FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display users data in a table
            echo "<h2>Users</h2>";
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        // Select data from the instructors table
        $sql = "SELECT id, instructor_name, specialization FROM instructors";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Instructors</h2>";
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Instructor Name</th><th>Specialization</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["instructor_name"] . "</td>";
                echo "<td>" . $row["specialization"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_course"])) {
            // Sanitize and validate inputs
            $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
            $specification = mysqli_real_escape_string($conn, $_POST['specification']);

            // Insert data into courses table
            $sql = "INSERT INTO courses (course_name, specification) VALUES ('$course_name', '$specification')";

            if ($conn->query($sql) === TRUE) {
                echo "New course record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Close connection
        $conn->close();
        ?>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>