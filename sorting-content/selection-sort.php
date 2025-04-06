<main class="main-content  selection-sort" id="selection-sort" style="display:none;">
    <div class="article-header">
        <h1>Selection Sort Algorithm</h1>
        <!-- breadcrumb same as above -->
    </div>

    <div class="article-content">
        <p>Selection Sort is an in-place comparison sorting algorithm that divides the input list into two parts: a sorted sublist which is built up from left to right and a sublist of the remaining unsorted elements. The algorithm repeatedly selects the smallest (or largest) element from the unsorted sublist and moves it to the end of the sorted sublist.</p>

        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/g-PGLbMth_g" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="video-caption">Video: Selection Sort Visualization</p>

        <h2>How Selection Sort Works?</h2>

        <!-- include visualization -->

        <h3>Detailed Step-by-Step Example:</h3>
        <p>Sorting the array: [64, 25, 12, 22, 11]</p>

        <h4>First Pass:</h4>
        <ul>
            <li>Entire array is unsorted</li>
            <li>Find minimum: 11 at index 4</li>
            <li>Swap with first element (64)</li>
            <li>Array becomes: [11, 25, 12, 22, 64]</li>
        </ul>

        <h4>Second Pass:</h4>
        <ul>
            <li>First element is sorted</li>
            <li>Find minimum in remaining: 12 at index 2</li>
            <li>Swap with second element (25)</li>
            <li>Array becomes: [11, 12, 25, 22, 64]</li>
        </ul>

        <h4>Third Pass:</h4>
        <ul>
            <li>First two elements are sorted</li>
            <li>Find minimum in remaining: 22 at index 3</li>
            <li>Swap with third element (25)</li>
            <li>Array becomes: [11, 12, 22, 25, 64]</li>
        </ul>

        <h4>Fourth Pass:</h4>
        <ul>
            <li>First three elements are sorted</li>
            <li>Find minimum in remaining: 25 at index 3</li>
            <li>No swap needed</li>
        </ul>

        <div class="important-note">
            <strong>Performance Analysis:</strong>
            <ul>
                <li>Time Complexity: Always O(n²) as it performs O(n²) comparisons</li>
                <li>Space Complexity: O(1) (in-place)</li>
                <li>Not stable but can be made stable with extra space</li>
                <li>Makes only O(n) swaps (minimum among all O(n²) algorithms)</li>
            </ul>
        </div>

        <?php include "code-implementation/selectionsort-ci.php"; ?>

        <h2>Variations</h2>
        <h3>Double Selection Sort</h3>
        <p>Finds both the minimum and maximum in each pass, placing them at both ends of the unsorted portion, reducing the number of passes by half.</p>

        <h3>Bingo Sort</h3>
        <p>An optimization when there are many duplicate values, where the minimum is found and all equal values are moved in one pass.</p>

        <h2>When to Use Selection Sort?</h2>
        <ul>
            <li>When memory writes are expensive (fewest swaps among O(n²) algorithms)</li>
            <li>When the array is small</li>
            <li>When checking all elements is compulsory</li>
            <li>When memory space is limited</li>
        </ul>

        <div class="important-note">
            <strong>Note:</strong> Selection sort is not suitable for large datasets due to its O(n²) time complexity, but it outperforms more complex algorithms for small lists due to its simplicity.
        </div>
    </div>
</main>