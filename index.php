<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/sort-icon.png" type="image/png">
    <title>Bubble Sort Algorithm | SortArtOnline</title>
    <link rel="stylesheet" href="assets/css/styles.css">

    <style>
    .video-container {
    position: relative;
    width: 100%;
    max-width: 800px; /* Maximum width for large screens */
    margin: 25px auto;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    height: 0;
    overflow: hidden;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.video-caption {
    display: block;
    text-align: center;
    font-style: italic;
    margin-top: 10px;
    color: #555;
    font-size: 0.9em;
    padding: 0 15px;
}

/* Optional: Add some responsive adjustments */
@media (max-width: 768px) {
    .video-container {
        margin: 20px auto;
        padding-bottom: 62.5%; /* Slightly taller ratio on mobile */
    }
    
    .video-caption {
        font-size: 0.85em;
      
    }
}

@media (max-width: 480px) {
    .video-container {
        padding-bottom: 75%; /* Even taller ratio on small mobile */
        margin: 15px auto;
    }
}

/* style for toggle button */

.toggle-btn {
    background-color: #f44336; /* Red for OFF state */
    color: white;
    border: none;
}

.toggle-btn.active {
    background-color: #4CAF50; /* Green for ON state */
}




/* Button Container Styles */
.control-panel {
    display: flex;
    flex-wrap: nowrap;
    gap: 8px;
    margin: 10px 0;
    overflow-x: auto;
    padding-bottom: 5px;
    width: 100%;
}

/* Hide scrollbar but keep functionality */
.control-panel::-webkit-scrollbar {
    height: 5px;
}

.control-panel::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 5px;
}

/* Base Button Styles */
.btn {
    flex-shrink: 0; /* Prevent buttons from shrinking */
    min-width: 120px; /* Set minimum width */
    white-space: nowrap; /* Keep text in one line */
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.2s;
    text-align: center;
    box-sizing: border-box;
}

/* Toggle Button */
.toggle-btn {
    background-color: #f0f0f0;
    color: #333;
}

/* Active Toggle State */
.toggle-btn.active {
    background-color: #4CAF50;
    color: white;
}

/* Secondary Buttons */
.btn-secondary {
    background-color: #e0e0e0;
    color: #333;
    min-width: 50px; /* Smaller width for prev/next buttons */
}

/* Start Button */
#selection-start-btn {
    background-color: #3a86ff;
    color: white;
}

/* Disabled State */
.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .btn {
        min-width: 100px;
        padding: 8px 10px;
        font-size: 13px;
    }
    
    .btn-secondary {
        min-width: 40px;
    }
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            Sort<span>Art</span>Online
        </div>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links" id="navLinks">
            <li><a href="#">Home</a></li>
            <li><a href="#">Learn</a></li>
            <li><a href="#">Quiz</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>

    <!-- Main Container -->
    <div class="container">

        <!-- Main Content -->
        <main class="main-content">
            <div class="article-header">
                <h1>Bubble Sort Algorithm</h1>
                <div class="breadcrumb">
                    <a href="#">Home</a>
                    <span>/</span>
                    <a href="#">Sorting Algorithms</a>
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

        <!-- Sidebar -->
        <?php include "includes/aside.php"; ?>
    </div>

    <!-- Footer -->

    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>

    <script src="assets/js/script.js"></script>

    <script src="assets/js/bubble-sort-graph.js"></script>

</body>
</html>