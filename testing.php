<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heap Sort Visualization</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
    
    </style>

</head>
<body>
<nav class="navbar">
        <div class="navbar-brand">
            Sort<span>Art</span>Online
        </div>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links" id="navLinks">
            <li><a href="home">Home</a></li>
            <li><a href="learn">Learn</a></li>
            <li><a href="quiz">Quiz</a></li>
            <li><a href="#">Offline</a></li>
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



    <script src="assets/js/dynamic-island.js"></script>
    <script src="assets/js/spinner.js"></script>
    
</body>
</html>