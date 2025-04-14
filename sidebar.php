<!-- sidebar.php -->
<div class="sidebar">
  <h3>Trip Budget Planner</h3>
  <a href="index.php">🏠 All Trips</a>
  <?php if (isset($_GET['trip_id'])): ?>
    <a href="dashboard.php?trip_id=<?= $_GET['trip_id'] ?>">📊 Trip Dashboard</a>
    <a href="add_accommodation.php?trip_id=<?= $_GET['trip_id'] ?>">🏨 Add Accommodation</a>
    <a href="add_transport.php?trip_id=<?= $_GET['trip_id'] ?>">🚗 Add Transport</a>
    <a href="add_activity.php?trip_id=<?= $_GET['trip_id'] ?>">🎯 Add Activity</a>
  <?php endif; ?>
</div>
