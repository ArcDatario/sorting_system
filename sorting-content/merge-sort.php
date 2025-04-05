<main class="main-content merge-sort">
    <div class="article-header">
        <h1>Merge Sort Algorithm</h1>
        <div class="breadcrumb">
            <a href="#">Home</a> <span>/</span>
            <a href="#">Algorithms</a> <span>/</span>
            <span>Merge Sort</span>
        </div>
    </div>

    <div class="article-content">
        <p>Merge Sort is a divide-and-conquer algorithm that recursively divides the input array into two halves, sorts each half, and then merges them back together. It guarantees O(n log n) time complexity in all cases, making it efficient for large datasets.</p>

        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/4VqmGXwpLqc" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="video-caption">Video: Merge Sort Visualization</p>

        <h2>How Merge Sort Works?</h2>
        
        <!-- include visualization -->

        <h3>Step-by-Step Example (Sorting [38, 27, 43, 3, 9, 82, 10]):</h3>
        
        <h4>Division Phase:</h4>
        <ul>
            <li>Original array: [38, 27, 43, 3, 9, 82, 10]</li>
            <li>First split: [38, 27, 43, 3] and [9, 82, 10]</li>
            <li>Second split: [38, 27], [43, 3], [9, 82], [10]</li>
            <li>Third split: [38], [27], [43], [3], [9], [82], [10]</li>
        </ul>

        <h4>Merge Phase:</h4>
        <ul>
            <li>Merge [38] and [27] → [27, 38]</li>
            <li>Merge [43] and [3] → [3, 43]</li>
            <li>Merge [9] and [82] → [9, 82]</li>
            <li>Merge [27, 38] and [3, 43] → [3, 27, 38, 43]</li>
            <li>Merge [9, 82] and [10] → [9, 10, 82]</li>
            <li>Final merge: [3, 9, 10, 27, 38, 43, 82]</li>
        </ul>

        <div class="important-note">
            <strong>Key Characteristics:</strong>
            <ul>
                <li>Time Complexity: O(n log n) in all cases</li>
                <li>Space Complexity: O(n) auxiliary space</li>
                <li>Stable: Maintains relative order of equal elements</li>
                <li>Not in-place (standard implementation)</li>
                <li>Excellent for linked lists and external sorting</li>
            </ul>
        </div>

        <?php include "includes/mergesort-ci.php"; ?>

        <h2>Optimization Techniques</h2>
        <h3>Hybrid Merge Sort</h3>
        <p>Uses Insertion Sort for small subarrays (typically < 15 elements) to reduce recursion overhead.</p>

        <h3>In-Place Merge Sort</h3>
        <p>More complex implementation that reduces space complexity to O(1) but with performance tradeoffs.</p>

        <h3>Natural Merge Sort</h3>
        <p>Takes advantage of existing ordered runs in the input data for improved performance on partially sorted data.</p>

        <h2>Practical Applications</h2>
        <ul>
            <li>Sorting large datasets that don't fit in memory (external sorting)</li>
            <li>Implementation in standard libraries (Java's Arrays.sort() for objects)</li>
            <li>Sorting linked lists (requires only O(1) extra space)</li>
            <li>Inversion count problems</li>
            <li>Used as the basis for Timsort (Python, Android, Java)</li>
        </ul>

        <div class="important-note">
            <strong>Note:</strong> While merge sort has excellent O(n log n) time complexity, its O(n) space requirement makes it less desirable than quicksort for in-memory sorting of arrays in many practical implementations.
        </div>
    </div>
</main>