<!-- add_accommodation.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Accommodation</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Add Accommodation</h2>
  <form action="submit_accommodation.php" method="POST">
    <input type="hidden" name="trip_id" value="<?= $_GET['trip_id'] ?>">
    
    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Cost:</label>
    <input type="number" step="0.01" name="cost" required><br>

    <label>Check-in Date:</label>
    <input type="date" name="check_in"><br>

    <label>Number of Days:</label>
    <input type="number" name="number_of_days" required><br>

    <label>Address:</label>
    <input type="text" name="address"><br>

    <button type="submit">Add</button>
  </form>
  <br>
  <a href="dashboard.php?trip_id=<?= $_GET['trip_id'] ?>">← Back to Dashboard</a>
</body>
</html>
