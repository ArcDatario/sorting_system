<main class="main-content radix-sort" id="radix-sort" style="display:none;">
    <div class="article-header">
        <h1>Radix Sort Algorithm</h1>
        <!-- breadcrumb same as above -->
    </div>

    <div class="article-content">
        <p>Radix Sort is a non-comparative integer sorting algorithm that processes digits by grouping numbers by each digit, from least significant to most significant (LSD) or vice versa (MSD). It avoids comparison by creating and distributing elements into buckets according to their radix.</p>

        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/nu4gDuFabIM" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="video-caption">Video: Radix Sort Visualization</p>

        <h2>How Radix Sort Works?</h2>
        
        <!-- include visualization -->

        <br><br>
                <?php include "button.php";?>

<br><br>

        <h3>LSD Radix Sort Example (Sorting [170, 45, 75, 90, 802, 24, 2, 66]):</h3>
        
        <h4>Step 1: Sort by least significant digit (1s place)</h4>
        <ul>
            <li>Original: 170, 045, 075, 090, 802, 024, 002, 066</li>
            <li>After 1st pass: 170, 090, 802, 002, 024, 045, 075, 066</li>
        </ul>
        
        <h4>Step 2: Sort by next digit (10s place)</h4>
        <ul>
            <li>After 2nd pass: 802, 002, 024, 045, 066, 170, 075, 090</li>
        </ul>

        <h4>Step 3: Sort by most significant digit (100s place)</h4>
        <ul>
            <li>After 3rd pass: 002, 024, 045, 066, 075, 090, 170, 802</li>
            <li>Final sorted array: [2, 24, 45, 66, 75, 90, 170, 802]</li>
        </ul>

        <div class="important-note">
            <strong>Key Characteristics:</strong>
            <ul>
                <li>Time Complexity: O(d*(n + b)) where d is digits, b is base</li>
                <li>Space Complexity: O(n + b)</li>
                <li>Stable (when implemented properly)</li>
                <li>Not in-place</li>
                <li>Works for integers, strings, and fixed-length data</li>
            </ul>
        </div>

        <?php include "code-implementation/radixsort-ci.php"; ?>

        <h2>Variations</h2>
        <h3>MSD Radix Sort</h3>
        <p>Most-significant-digit first approach that works well with variable-length strings.</p>

        <h3>In-Place Radix Sort</h3>
        <p>More complex implementation that reduces space complexity.</p>

        <h3>Hybrid Radix Sort</h3>
        <p>Combines MSD and LSD approaches for better performance.</p>

        <h2>Practical Applications</h2>
        <ul>
            <li>Sorting large collections of numbers with fixed digit length</li>
            <li>Card sorting machines</li>
            <li>String sorting (dictionary order)</li>
            <li>Implementations in database systems</li>
            <li>Used in suffix array construction algorithms</li>
        </ul>

        <div class="important-note">
            <strong>Note:</strong> Radix sort is particularly effective when the range of input values (k) is larger than the number of elements (n), where comparison sorts would perform poorly (O(n log n) vs Radix's O(n) for fixed digit numbers).
        </div>
    </div>
</main>