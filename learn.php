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
     

        <main class="main-content bubble-sort" id="bubble-sort" style="display:block;">
            <div class="article-header">
                <h1>Bubble Sort Algorithm</h1>
                <div class="breadcrumb">
                    <a href="#">Home</a>
                    <span>/</span>
                    <a href="#">Algorithms</a>
                    <span>/</span>
                    <span>Bubble Sort</span>
                </div>
            </div>

            <div class="article-content">
            <p>Bubble Sort is the simplest sorting algorithm that works by repeatedly swapping the adjacent elements if they are in the wrong order. This algorithm is not suitable for large data sets as its average and worst-case time complexity is quite high.</p>

<!-- Added Bubble Sort video -->
<div class="video-container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/xli_FI7CuzA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 
</div>
<p class="video-caption">Video: Bubble Sort Algorithm Explained</p>

<h2>How Bubble Sort Works?</h2>
<?php include "visualization/bubble-sort-visualization.php"; ?>

<h3>First Pass:</h3>
<ul>
    <li><strong>( 5 1 4 2 8 ) → ( 1 5 4 2 8 )</strong>, Here, algorithm compares the first two elements, and swaps since 5 > 1.</li>
    <li><strong>( 1 5 4 2 8 ) → ( 1 4 5 2 8 )</strong>, Swap since 5 > 4</li>
    <li><strong>( 1 4 5 2 8 ) → ( 1 4 2 5 8 )</strong>, Swap since 5 > 2</li>
    <li><strong>( 1 4 2 5 8 ) → ( 1 4 2 5 8 )</strong>, Now, since these elements are already in order (8 > 5), algorithm does not swap them.</li>
</ul>

<h3>Second Pass:</h3>
<ul>
    <li><strong>( 1 4 2 5 8 ) → ( 1 4 2 5 8 )</strong></li>
    <li><strong>( 1 4 2 5 8 ) → ( 1 2 4 5 8 )</strong>, Swap since 4 > 2</li>
    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
</ul>

<p>Now, the array is already sorted, but our algorithm does not know if it is completed. The algorithm needs one whole pass without any swap to know it is sorted.</p>

<h3>Third Pass:</h3>
<ul>
    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
</ul>

<div class="important-note">
    <strong>Note:</strong> Bubble sort is not a practical sorting algorithm when n is large. It will not be efficient in the case of a reverse-ordered collection.
</div>

                <!-- code implementaion start -->

                <?php include "includes/bubblesort-ci.php"; ?>

                <!-- code implementation end -->

            
            <h2>How Logic Works?</h2>
                <p style="text-align: justify;">Bubble Sort is a basic comparison-based sorting algorithm that works by repeatedly stepping through the list, comparing adjacent elements, and swapping them if they are in the wrong order. This process continues until the entire list is sorted. The algorithm ensures that with each pass, the largest unsorted element moves to its correct position at the end of the list, similar to how bubbles rise to the surface in water—hence the name "Bubble Sort." However, this algorithm is inefficient for large datasets because it repeatedly checks and swaps elements, leading to a high time complexity of O(n²) in both the worst and average cases. Due to this inefficiency, Bubble Sort is mainly used for small lists or educational purposes to demonstrate sorting logic.</p>
                

                <div class="important-note">
    <strong>Note:</strong> Bubble sort is not a practical sorting algorithm when n is large. It will not be efficient in the case of a reverse-ordered collection.
</div>
            </main>

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
        <?php include "includes/aside.php"; ?>
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