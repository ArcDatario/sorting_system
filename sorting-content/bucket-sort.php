<main class="main-content">
    <div class="article-header">
        <h1>Bucket Sort Algorithm</h1>
        <!-- breadcrumb same as above -->
    </div>

    <div class="article-content">
        <p>Bucket Sort is a distribution sorting algorithm that works by distributing the elements of an array into a number of buckets. Each bucket is then sorted individually, either using a different sorting algorithm or by recursively applying the bucket sort algorithm.</p>

        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/VuXbEb5ywrU" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="video-caption">Video: Bucket Sort Visualization</p>

        <h2>How Bucket Sort Works?</h2>
        <?php include "visualization/bucket-sort-visualization.php"; ?>

        <h3>Step-by-Step Example (Sorting [0.42, 0.32, 0.75, 0.12, 0.89, 0.63]):</h3>
        
        <h4>Step 1: Create Buckets</h4>
        <ul>
            <li>Create 10 buckets (0.0-0.1, 0.1-0.2,...,0.9-1.0)</li>
        </ul>
        
        <h4>Step 2: Scatter Elements</h4>
        <ul>
            <li>0.42 → bucket 4</li>
            <li>0.32 → bucket 3</li>
            <li>0.75 → bucket 7</li>
            <li>0.12 → bucket 1</li>
            <li>0.89 → bucket 8</li>
            <li>0.63 → bucket 6</li>
        </ul>

        <h4>Step 3: Sort Individual Buckets</h4>
        <ul>
            <li>Bucket 1: [0.12]</li>
            <li>Bucket 3: [0.32]</li>
            <li>Bucket 4: [0.42]</li>
            <li>Bucket 6: [0.63]</li>
            <li>Bucket 7: [0.75]</li>
            <li>Bucket 8: [0.89]</li>
        </ul>

        <h4>Step 4: Gather Elements</h4>
        <ul>
            <li>Concatenate all buckets in order</li>
            <li>Final sorted array: [0.12, 0.32, 0.42, 0.63, 0.75, 0.89]</li>
        </ul>

        <div class="important-note">
            <strong>Performance Analysis:</strong>
            <ul>
                <li>Average Time Complexity: O(n + k) where k is number of buckets</li>
                <li>Worst Case: O(n²) when all elements fall in same bucket</li>
                <li>Space Complexity: O(n + k)</li>
                <li>Stability depends on inner sorting algorithm</li>
            </ul>
        </div>

        <?php include "includes/bucketsort-ci.php"; ?>

        <h2>Optimization Techniques</h2>
        <h3>Bucket Size Selection</h3>
        <p>Optimal bucket count is typically equal to array size with range/n buckets.</p>

        <h3>Hybrid Approach</h3>
        <p>Use Insertion Sort for small buckets and QuickSort for larger ones.</p>

        <h2>Practical Applications</h2>
        <ul>
            <li>Sorting floating-point numbers uniformly distributed in [0,1)</li>
            <li>External sorting when data doesn't fit in memory</li>
            <li>Histogram generation</li>
            <li>As part of more complex algorithms</li>
        </ul>

        <div class="important-note">
            <strong>Note:</strong> Bucket sort performs best when the input is uniformly distributed across the range, making the elements distribute evenly into buckets. With non-uniform distributions, performance degrades to O(n²) in the worst case.
        </div>
    </div>
</main>