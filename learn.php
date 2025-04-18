<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/sort-icon.png" type="image/png">
    <title>Bubble Sort Algorithm | SortArtOnline</title>
    <link rel="stylesheet" href="assets/css/styles.css">



</head>
<body>
<div class="loader-container">
  <div class="loader-spinner">
    <div class="sorting-bars"></div>
    <div class="loader-text">Loading</div>
  </div>
</div>
    <!-- Navbar -->
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

    <!-- Main Container -->
    <div class="container page-content">
      
            <?php include "includes/learn-dynamic-island.php"; ?>
     

      
            <?php include "sorting-content/bubble-sort.php"; ?>
            <?php include "sorting-content/bucket-sort.php"; ?>
            <?php include "sorting-content/counting-sort.php"; ?>
            <?php include "sorting-content/heap-sort.php"; ?>
            <?php include "sorting-content/insertion-sort.php"; ?>
            <?php include "sorting-content/merge-sort.php"; ?>
            <?php include "sorting-content/quick-sort.php"; ?>
            <?php include "sorting-content/radix-sort.php"; ?>
            <?php include "sorting-content/selection-sort.php"; ?>
            <?php include "sorting-content/tree-sort.php"; ?>
            
        <!-- Sidebar -->
       
    </div>

    <!-- Footer -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
    const lastActiveTab = localStorage.getItem('lastActiveInsertionTab');
    if (lastActiveTab) {
        document.getElementById(lastActiveTab).style.display = "block";
        const buttons = document.querySelectorAll('.insertion-tab-btn');
        buttons.forEach(btn => {
            if (btn.getAttribute('onclick').includes(lastActiveTab)) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    } else {
        // Default to showing the first tab if no saved state
        document.querySelector('.insertion-tab-content').style.display = "block";
        document.querySelector('.insertion-tab-btn').classList.add("active");
    }
});
            document.addEventListener('DOMContentLoaded', function() {
    const lastActiveTab = localStorage.getItem('lastActiveBubbleTab');
    if (lastActiveTab) {
        document.getElementById(lastActiveTab).style.display = "block";
        const buttons = document.querySelectorAll('.bubble-tab-btn');
        buttons.forEach(btn => {
            if (btn.getAttribute('onclick').includes(lastActiveTab)) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    } else {
        // Default to showing the first tab if no saved state
        document.querySelector('.bubble-tab-content').style.display = "block";
        document.querySelector('.bubble-tab-btn').classList.add("active");
    }
});
        </script>
    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>

    <script src="assets/js/script.js"></script>

    <script src="assets/js/bubble-sort-graph.js"></script>

    <script src="assets/js/dynamic-island.js"></script>
    <script src="assets/js/spinner.js"></script>
    

</body>
</html>