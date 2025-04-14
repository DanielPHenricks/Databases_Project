<!-- add_activity.php -->
<!DOCTYPE html>
<html>
<head><title>Add Activity</title></head>
<body>
<h2>Add Activity</h2>
<form action="submit_activity.php" method="POST">
  <input type="hidden" name="trip_id" value="<?= $_GET['trip_id'] ?>">

  <label>Name:</label>
  <input type="text" name="name" required><br>

  <label>Cost:</label>
  <input type="number" step="0.01" name="cost" required><br>

  <label>Location:</label>
  <input type="text" name="location"><br>

  <label>Duration (hours):</label>
  <input type="number" name="duration_hours"><br>

  <button type="submit">Add</button>
</form>
<a href="dashboard.php?trip_id=<?= $_GET['trip_id'] ?>">← Back</a>
</body>
</html>
