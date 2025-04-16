<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting Algorithms Quiz | SortArtOnline</title>
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
    <div class="container">
        
    </div>

    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>
    
     
        <script src="assets/js/spinner.js"></script>

   

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Check saved preference
    const darkModeEnabled = localStorage.getItem('darkMode') === 'true';
    
    // Apply saved mode
    if (darkModeEnabled) {
        document.body.classList.add('dark-mode');
    }
    
    // Set up toggle button
    const darkModeToggle = document.getElementById('darkModeToggle');
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function() {
            const isDark = document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', isDark);
        });
    }
});
    </script>


</body>
</html>