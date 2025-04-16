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

<?php include "button.php"; ?>

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