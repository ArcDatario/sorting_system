<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualization</title>
    <link rel="icon" href="assets/images/sort-icon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
    
    </style>

</head>
<body>
<div class="loader-container">
  <div class="loader-spinner">
    <div class="sorting-bars"></div>
    <div class="loader-text">Loading</div>
  </div>
</div>
<nav class="navbar">
        <div class="navbar-brand">
            Sort<span>Art</span>Online
        </div>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links" id="navLinks">
            <li><a href="home">Home</a></li>
            <li><a href="learn">Learn</a></li>
            <li><a href="sort-visualization">Visualize</a></li>
            <li><a href="quiz">Quiz</a></li>
            <li><a href="offline">Offline</a></li>
        </ul>
    </nav>
    <div class="container">
    <?php include "includes/learn-dynamic-island.php"; ?>

    <?php include "visualization/heap-sort-visualization.php"; ?>
    <?php include "visualization/merge-sort-visualization.php"; ?>
    <?php include "visualization/quick-sort-visualization.php"; ?>
    <?php include "visualization/insertion-sort-visualization.php"; ?>
    <?php include "visualization/selection-sort-visualization.php"; ?>
    <?php include "visualization/radix-sort-visualization.php"; ?>
    <?php include "visualization/tree-sort-visualization.php"; ?>
    <?php include "visualization/counting-sort-visualization.php"; ?>
    <?php include "visualization/bubble-sort-visualization.php"; ?>
    <?php include "visualization/bucket-sort-visualization.php"; ?>
    
    </div>
   
   

<script>
          
        </script>
        
    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>

    <script src="assets/js/script.js"></script>



    <script src="assets/js/dynamic-island.js"></script>
    <script src="assets/js/spinner.js"></script>
    
</body>
</html>