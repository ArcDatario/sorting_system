<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/sort-icon.png" type="image/png">
    <title>Bubble Sort Algorithm | SortArtOnline</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .dynamic-island {
    position: fixed;
    top: 35px;
    left: 50%;
    transform: translateX(-50%);
    width: 250px;
    background-color: #1a1a1a;
    color: white;
    border-radius: 30px;
    padding: 5px 15px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    transition: all 0.3s ease;
    border: 2px solid #4ec9b0;
}

@media (max-width: 768px) {
    .dynamic-island {
        border: 1.5px solid #4ec9b0;
        top: 75px;
        width: 200px;
        padding: 3px 12px;
    }
    .dropdown-header {
        padding: 5px 0;
    }
}

.dynamic-island:hover {
    transform: translateX(-50%) scale(1.02);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
}

.dropdown-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    padding: 6px 0;
}

.dropdown-title {
    font-weight: 500;
    font-size: 16px;
}

.dropdown-icon {
    transition: transform 0.3s ease;
    font-size: 12px;
    color: #4ec9b0;
}

.dropdown-icon.open {
    transform: rotate(180deg);
}

.dropdown-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
    scrollbar-width: thin;
    scrollbar-color: #4ec9b0 #2a2a2a;
}

.dropdown-content.open {
    max-height: 300px;
    overflow-y: auto;
    transition: max-height 0.3s ease-in;
}

/* Modern scrollbar styling */
.dropdown-content::-webkit-scrollbar {
    width: 8px;
}

.dropdown-content::-webkit-scrollbar-track {
    background: #2a2a2a;
    border-radius: 10px;
    margin: 5px 0;
}

.dropdown-content::-webkit-scrollbar-thumb {
    background-color: #4ec9b0;
    border-radius: 10px;
    border: 2px solid #2a2a2a;
    transition: all 0.3s ease;
}

.dropdown-content::-webkit-scrollbar-thumb:hover {
    background-color: #3aa899;
    transform: scale(1.05);
}

.dropdown-content::-webkit-scrollbar-thumb:active {
    background-color: #2e8e81;
}

.dropdown-list {
    list-style: none;
    padding: 10px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.dropdown-item {
    padding: 10px 0;
    cursor: pointer;
    transition: all 0.2s ease;
    border-radius: 8px;
    padding-left: 10px;
    font-size: 14px;
    margin: 2px 0;
}

.dropdown-item:hover {
    background-color: rgba(255, 255, 255, 0.1);
    transform: translateX(3px);
}

.dropdown-item.selected {
    background-color: rgba(78, 201, 176, 0.2);
    font-weight: 500;
    color: #4ec9b0;
}

/* Animation for the dynamic island */
@keyframes pulse {
    0% { transform: translateX(-50%) scale(1); }
    50% { transform: translateX(-50%) scale(1.05); }
    100% { transform: translateX(-50%) scale(1); }
}

.dynamic-island.pulse {
    animation: pulse 0.5s ease;
}

/* Smooth transition for dropdown items */
.dropdown-item {
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
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
        <!-- Dynamic Island -->
        <div class="dynamic-island" id="dynamicIsland">
              <div class="dropdown-header" id="dropdownHeader">
                  <div class="dropdown-title" id="dropdownTitle">Select an option</div>
                  <div class="dropdown-icon" id="dropdownIcon">▼</div>
              </div>
              <div class="dropdown-content" id="dropdownContent">
    <ul class="dropdown-list" id="dropdownList">
        <li class="dropdown-item" data-value="bubble-sort">Bubble Sort</li>
        <li class="dropdown-item" data-value="insertion-sort">Insertion Sort</li>
        <li class="dropdown-item" data-value="selection-sort">Selection Sort</li>
        <li class="dropdown-item" data-value="merge-sort">Merge Sort</li>
        <li class="dropdown-item" data-value="quick-sort">Quick Sort</li>
        <li class="dropdown-item" data-value="counting-sort">Counting Sort</li>
        <li class="dropdown-item" data-value="bucket-sort">Bucket Sort</li>
        <li class="dropdown-item" data-value="radix-sort">Radix Sort</li>
        <li class="dropdown-item" data-value="heap-sort">Heap Sort</li>
        <li class="dropdown-item" data-value="tree-sort">Tree Sort</li>
    </ul>
</div>
        </div>
        <!-- Main Content -->

        <main class="main-content">
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

        <!-- Sidebar -->
        <?php include "includes/aside.php"; ?>
    </div>

    <!-- Footer -->

    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>

    <script src="assets/js/script.js"></script>

    <script src="assets/js/bubble-sort-graph.js"></script>

    <script src="assets/js/dynamic-island.js"></script>

</body>
</html>