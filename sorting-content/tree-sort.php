<main class="main-content tree-sort" id="tree-sort" style="display:none;">
    <div class="article-header">
        <h1>Tree Sort Algorithm</h1>
        <!-- breadcrumb same as above -->
    </div>

    <div class="article-content">
        <p>Tree Sort is a sorting algorithm that builds a binary search tree from the elements to be sorted, and then performs an in-order traversal of the tree to get the elements in sorted order. Its efficiency depends on the balance of the tree.</p>

        <div class="video-container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/n2MLjGeK7qA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
        <p class="video-caption">Video: Tree Sort Visualization</p>

        <h2>How Tree Sort Works?</h2>
        
      
        <!-- include visualization -->

        <h3>Step-by-Step Example (Sorting [7, 4, 9, 2, 5]):</h3>
        
        <h4>Step 1: Build Binary Search Tree</h4>
        <ul>
            <li>Insert 7 as root</li>
            <li>Insert 4 (left of 7)</li>
            <li>Insert 9 (right of 7)</li>
            <li>Insert 2 (left of 4)</li>
            <li>Insert 5 (right of 4)</li>
        </ul>
        
        <h4>Step 2: In-Order Traversal</h4>
        <ul>
            <li>Visit left subtree (2, 4, 5)</li>
            <li>Visit root (7)</li>
            <li>Visit right subtree (9)</li>
            <li>Final sorted order: [2, 4, 5, 7, 9]</li>
        </ul>

        <div class="important-note">
            <strong>Performance Characteristics:</strong>
            <ul>
                <li>Average Time Complexity: O(n log n)</li>
                <li>Worst Case: O(n²) (when tree becomes skewed)</li>
                <li>Space Complexity: O(n)</li>
                <li>Stable if implemented carefully</li>
                <li>Adaptive: Efficient for partially sorted data</li>
            </ul>
        </div>

        <?php include "code-implementation/treesort-ci.php"; ?>

        <h2>Variations</h2>
        <h3>Balanced Tree Sort</h3>
        <p>Using AVL or Red-Black trees to guarantee O(n log n) performance.</p>

        <h3>Threaded Binary Tree Sort</h3>
        <p>Improves traversal efficiency by adding threads to nodes.</p>

        <h2>Practical Applications</h2>
        <ul>
            <li>When maintaining a sorted data structure is needed</li>
            <li>Database indexing</li>
            <li>Auto-completion features</li>
            <li>Range queries in databases</li>
            <li>As part of more complex algorithms</li>
        </ul>

        <div class="important-note">
            <strong>Note:</strong> While simple to implement, basic tree sort has O(n²) worst-case performance with unbalanced trees. For production use, balanced tree variants should be used to guarantee O(n log n) performance in all cases.
        </div>
    </div>
</main>