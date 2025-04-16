<!-- add_transport.php -->
<!DOCTYPE html>
<html>
<head><title>Add Transport</title></head>
<body>
<h2>Add Transportation</h2>
<form action="submit_transport.php" method="POST">
  <input type="hidden" name="trip_id" value="<?= $_GET['trip_id'] ?>">

  <label>Company:</label>
  <input type="text" name="company" required><br>

  <label>Type (e.g. flight, train):</label>
  <input type="text" name="type"><br>

  <label>Cost:</label>
  <input type="number" step="0.01" name="cost" required><br>

  <label>Departure:</label>
  <input type="datetime-local" name="departure_datetime"><br>

  <label>Arrival:</label>
  <input type="datetime-local" name="arrival_datetime"><br>

  <label>From:</label>
  <input type="text" name="departure_location"><br>

  <label>To:</label>
  <input type="text" name="arrival_location"><br>

  <button type="submit">Add</button>
</form>
<a href="dashboard.php?trip_id=<?= $_GET['trip_id'] ?>">← Back</a>
</body>
</html>
