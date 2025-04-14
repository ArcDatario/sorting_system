<main class="main-content insertion-sort" id="insertion-sort" style="display:none;">
    <div class="article-header">
        <h1>Insertion Sort Algorithm</h1>
        <div class="breadcrumb">
            <a href="#">Home</a> <span>/</span>
            <a href="#">Algorithms</a> <span>/</span>
            <span>Insertion Sort</span>
        </div>
    </div>

    <div class="article-content">
        <p>Insertion Sort is a simple sorting algorithm that builds the final sorted array one item at a time. It is much less efficient on large lists than more advanced algorithms like quicksort, heapsort, or merge sort, but it has several advantages including being efficient for small data sets and adaptive for data sets that are already substantially sorted.</p>

        <div class="video-container">
            
            <iframe width="560" height="315" src="https://www.youtube.com/embed/JU767SDMDvA" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="video-caption">Video: Insertion Sort Visualization</p>

        <h2>How Insertion Sort Works?</h2>

       <?php include "visualization/insertion-sort-visualization.php";?>

        <h3>Step-by-Step Example:</h3>
        <p>Let's sort the array: [12, 11, 13, 5, 6]</p>
        
        <h4>First Iteration:</h4>
        <ul>
            <li>Start with second element (11)</li>
            <li>Compare with 12 → 11 < 12 → shift 12 right</li>
            <li>Array becomes: [11, 12, 13, 5, 6]</li>
        </ul>

        <h4>Second Iteration:</h4>
        <ul>
            <li>Next element is 13</li>
            <li>Compare with 12 → 13 > 12 → no shift</li>
            <li>Array remains: [11, 12, 13, 5, 6]</li>
        </ul>

        <h4>Third Iteration:</h4>
        <ul>
            <li>Next element is 5</li>
            <li>Compare with 13 → shift right</li>
            <li>Compare with 12 → shift right</li>
            <li>Compare with 11 → shift right</li>
            <li>Array becomes: [5, 11, 12, 13, 6]</li>
        </ul>

        <h4>Fourth Iteration:</h4>
        <ul>
            <li>Next element is 6</li>
            <li>Compare with 13 → shift right</li>
            <li>Compare with 12 → shift right</li>
            <li>Compare with 11 → shift right</li>
            <li>Compare with 5 → insert</li>
            <li>Final sorted array: [5, 6, 11, 12, 13]</li>
        </ul>

        <div class="important-note">
            <strong>Key Characteristics:</strong>
            <ul>
                <li>Time Complexity: O(n²) worst and average cases, O(n) best case (when nearly sorted)</li>
                <li>Space Complexity: O(1) (in-place)</li>
                <li>Stable: Maintains relative order of equal elements</li>
                <li>Adaptive: Performance improves when input is partially sorted</li>
            </ul>
        </div>

        <?php include "code-implementation/insertionsort-ci.php"; ?>

        <h2>Optimization Techniques</h2>
        <h3>Binary Insertion Sort</h3>
        <p>Uses binary search to find the proper location to insert the selected item, reducing the number of comparisons from O(n) to O(log n) in the worst case.</p>

        <h3>Shell Sort</h3>
        <p>A generalization of insertion sort that allows exchange of items that are far apart, improving performance to about O(n^(7/6)) for the best known sequence.</p>

        <h2>Practical Applications</h2>
        <ul>
            <li>Small datasets (typically less than 50 elements)</li>
            <li>Nearly sorted datasets where it performs in near-linear time</li>
            <li>As the base case for hybrid sorting algorithms like Timsort</li>
            <li>Online algorithms where new elements are added to a sorted list</li>
        </ul>

        <div class="important-note">
            <strong>Note:</strong> While insertion sort is inefficient for large random lists, it is one of the fastest algorithms for small arrays (about 10-20 elements) due to its low overhead.
        </div>
    </div>
</main>