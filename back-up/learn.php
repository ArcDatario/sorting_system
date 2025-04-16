<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/sort-icon.png" type="image/png">
    <title>Sorting Algorithms | SortArtOnline</title>
    <link rel="stylesheet" href="assets/css/styles.css">

    <style>
       
        /* Main Content */
        .main-content {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .main-content h1 {
            font-size: 28px;
            margin-bottom: 15px;
            border-bottom: 2px solid #1abc9c;
            padding-bottom: 5px;
        }

        .main-content h2 {
            font-size: 22px;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #16a085;
        }
        .main-content h3 {
            font-size: 22px;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #16a085;
        }

        .main-content p {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .main-content ul {
            list-style: disc;
            margin-left: 20px;
        }

        .main-content ul li {
            margin-bottom: 10px;
        }

        /* Algorithm Steps */
        .algorithm-steps ol {
            list-style: decimal;
            margin-left: 20px;
            padding-left: 10px;
        }

        .algorithm-steps ol li {
            margin-bottom: 10px;
            font-size: 16px;
        }

        /* Process Details */
        .process-details p {
            font-weight: bold;
            margin-top: 10px;
        }

        .process-details ul {
            list-style: circle;
            margin-left: 20px;
            padding-left: 10px;
        }

        .process-details ul li {
            margin-bottom: 8px;
        }

        /* Performance Section */
        .performance h3 {
            font-size: 18px;
            margin-top: 15px;
            color: #16a085;
        }

        .performance ul {
            list-style: square;
            margin-left: 20px;
            padding-left: 10px;
        }

        .performance ul li {
            margin-bottom: 8px;
        }

        /* Use Cases */
        .use-cases ul {
            list-style: disc;
            margin-left: 20px;
            padding-left: 10px;
        }

        .use-cases ul li {
            margin-bottom: 8px;
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                padding: 15px;
            }

            .main-content h1 {
                font-size: 24px;
            }

            .main-content h2 {
                font-size: 20px;
            }

            .main-content p, .main-content ul li {
                font-size: 14px;
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
            <li><a href="home">Home</a></li>
            <li><a href="learn">Learn</a></li>
            <li><a href="quiz">Quiz</a></li>
            <li><a href="offline">Offline</a></li>
        </ul>
    </nav>

    <!-- Main Container -->
    <div class="container">
        
    <?php include "includes/learn-dynamic-island.php"; ?>
        <!-- Bubble Sort Content -->
        <main class="main-content bubble-sort" id="bubble-sort" style="display:block;">
            <h1>Bubble Sort</h1>
            <p class="intro">Bubble Sort is one of the simplest sorting algorithms that works by repeatedly swapping adjacent elements if they are in the wrong order.</p>
            
            <h2>How Bubble Sort Works</h2>
            <div class="algorithm-steps">
                <ol>
                    <li><strong>Start at the beginning</strong> of the array with the first element</li>
                    <li><strong>Compare adjacent elements</strong> - if the first element is greater than the second, swap them</li>
                    <li><strong>Move to the next pair</strong> and repeat the comparison</li>
                    <li><strong>Continue this process</strong> until the end of the array is reached</li>
                    <li><strong>Repeat all steps</strong> for the entire array, each time ignoring the last element as it's already sorted</li>
                    <li><strong>The algorithm stops</strong> when a complete pass through the array requires no swaps</li>
                </ol>
                <p>This process causes larger values to "bubble up" to their correct position at the end of the array with each complete pass.</p>
            </div>

            <h2>Detailed Process Example</h2>
            <p>For the array [4, 1, 6, 3, 8] (from the quiz example), here's how Bubble Sort would process it:</p>
            <div class="process-details">
                <p><strong>First Pass:</strong></p>
                <ul>
                    <li>Compare 4 and 1 → swap → [1, 4, 6, 3, 8]</li>
                    <li>Compare 4 and 6 → no swap</li>
                    <li>Compare 6 and 3 → swap → [1, 4, 3, 6, 8]</li>
                    <li>Compare 6 and 8 → no swap</li>
                </ul>
                <p><strong>Second Pass:</strong></p>
                <ul>
                    <li>Compare 1 and 4 → no swap</li>
                    <li>Compare 4 and 3 → swap → [1, 3, 4, 6, 8]</li>
                    <li>Compare 4 and 6 → no swap</li>
                </ul>
                <p><strong>Third Pass:</strong> No swaps needed - array is now sorted</p>
            </div>

            <h2>Performance Characteristics</h2>
            <div class="performance">
                <h3>Time Complexity:</h3>
                <ul>
                    <li><strong>Worst-case:</strong> O(n²) - When the array is in reverse order</li>
                    <li><strong>Average-case:</strong> O(n²)</li>
                    <li><strong>Best-case:</strong> O(n) - When the array is already sorted (with optimized version)</li>
                </ul>
                
                <h3>Space Complexity:</h3>
                <p>O(1) - Bubble sort is an in-place sorting algorithm, requiring only a constant amount of additional space</p>
                
                <h3>Stability:</h3>
                <p>Bubble sort is stable - it maintains the relative order of equal elements</p>
            </div>

            <h2>Optimization Techniques</h2>
            <div class="optimizations">
                <p><strong>Early Termination:</strong> The algorithm can be optimized by stopping if no swaps occur during a pass, indicating the array is sorted.</p>
                <p><strong>Reduced Passes:</strong> After each pass, the largest element is in its final position, so subsequent passes can ignore the last sorted elements.</p>
            </div>

            <h2>When to Use Bubble Sort</h2>
            <div class="use-cases">
                <ul>
                    <li>When simplicity is more important than efficiency</li>
                    <li>For nearly sorted data (where it can approach O(n) time)</li>
                    <li>For educational purposes to introduce sorting concepts</li>
                    <li>When working with small datasets</li>
                </ul>
            </div>
        </main>

        <!-- Selection Sort Content -->
        <main class="main-content selection-sort" id="selection-sort" style="display:none;">
            <h1>Selection Sort</h1>
            <p class="intro">Selection Sort divides the input array into a sorted and unsorted region, repeatedly selecting the smallest element from the unsorted region and moving it to the sorted region.</p>
            
            <h2>How Selection Sort Works</h2>
            <div class="algorithm-steps">
                <ol>
                    <li><strong>Initialize</strong> the sorted region as empty and unsorted region as the entire array</li>
                    <li><strong>Find the minimum element</strong> in the unsorted region</li>
                    <li><strong>Swap it</strong> with the first element of the unsorted region</li>
                    <li><strong>Expand the sorted region</strong> by one element</li>
                    <li><strong>Repeat the process</strong> for the remaining unsorted region</li>
                </ol>
                <p>This process continues until the entire array is sorted, with each pass placing one more element in its correct position.</p>
            </div>

            <h2>Detailed Process Example</h2>
            <p>For the array [5, 2, 9, 3, 7] (from the quiz example), here's how Selection Sort would process it:</p>
            <div class="process-details">
                <p><strong>First Pass:</strong></p>
                <ul>
                    <li>Find minimum (2) and swap with first element (5) → [2, 5, 9, 3, 7]</li>
                </ul>
                <p><strong>Second Pass:</strong></p>
                <ul>
                    <li>Find minimum in unsorted portion (3) and swap with first unsorted (5) → [2, 3, 9, 5, 7]</li>
                </ul>
                <p><strong>Third Pass:</strong></p>
                <ul>
                    <li>Find minimum (5) and swap with first unsorted (9) → [2, 3, 5, 9, 7]</li>
                </ul>
                <p><strong>Fourth Pass:</strong></p>
                <ul>
                    <li>Find minimum (7) and swap with first unsorted (9) → [2, 3, 5, 7, 9]</li>
                </ul>
            </div>

            <h2>Performance Characteristics</h2>
            <div class="performance">
                <h3>Time Complexity:</h3>
                <ul>
                    <li><strong>Worst-case:</strong> O(n²) - Same for all cases as it always scans entire unsorted portion</li>
                    <li><strong>Average-case:</strong> O(n²)</li>
                    <li><strong>Best-case:</strong> O(n²)</li>
                </ul>
                
                <h3>Space Complexity:</h3>
                <p>O(1) - Selection sort is an in-place sorting algorithm</p>
                
                <h3>Stability:</h3>
                <p>Selection sort is generally not stable as it may change the relative order of equal elements</p>
            </div>

            <h2>Key Properties</h2>
            <div class="properties">
                <ul>
                    <li>Makes only O(n) swaps - minimal among O(n²) sorting algorithms</li>
                    <li>Performs well on small lists</li>
                    <li>Performs the same number of comparisons regardless of input order</li>
                </ul>
            </div>

            <h2>When to Use Selection Sort</h2>
            <div class="use-cases">
                <ul>
                    <li>When memory writes are expensive (fewest swaps among O(n²) algorithms)</li>
                    <li>For small datasets</li>
                    <li>When simplicity is preferred over efficiency</li>
                </ul>
            </div>
        </main>

        <!-- Insertion Sort Content -->
        <main class="main-content insertion-sort" id="insertion-sort" style="display:none;">
            <h1>Insertion Sort</h1>
            <p class="intro">Insertion Sort builds the final sorted array one item at a time by repeatedly taking the next element and inserting it into the correct position in the already sorted portion.</p>
            
            <h2>How Insertion Sort Works</h2>
            <div class="algorithm-steps">
                <ol>
                    <li><strong>Start</strong> with the second element (consider the first element as sorted)</li>
                    <li><strong>Take the next element</strong> and scan through the sorted portion</li>
                    <li><strong>Find the correct position</strong> where this element belongs</li>
                    <li><strong>Shift all larger elements</strong> up to make space</li>
                    <li><strong>Insert the element</strong> in its correct position</li>
                    <li><strong>Repeat</strong> until all elements are processed</li>
                </ol>
                <p>This process is similar to how people sort playing cards in their hands.</p>
            </div>

            <h2>Detailed Process Example</h2>
            <p>For the array [7, 2, 5, 9, 3] (from the quiz example), here's how Insertion Sort would process it:</p>
            <div class="process-details">
                <p><strong>First Pass:</strong></p>
                <ul>
                    <li>Take 2 and insert before 7 → [2, 7, 5, 9, 3]</li>
                </ul>
                <p><strong>Second Pass:</strong></p>
                <ul>
                    <li>Take 5 and insert between 2 and 7 → [2, 5, 7, 9, 3]</li>
                </ul>
                <p><strong>Third Pass:</strong></p>
                <ul>
                    <li>9 is already in correct position → no change</li>
                </ul>
                <p><strong>Fourth Pass:</strong></p>
                <ul>
                    <li>Take 3 and insert between 2 and 5 → [2, 3, 5, 7, 9]</li>
                </ul>
            </div>

            <h2>Performance Characteristics</h2>
            <div class="performance">
                <h3>Time Complexity:</h3>
                <ul>
                    <li><strong>Worst-case:</strong> O(n²) - When the array is reverse sorted</li>
                    <li><strong>Average-case:</strong> O(n²)</li>
                    <li><strong>Best-case:</strong> O(n) - When the array is already sorted</li>
                </ul>
                
                <h3>Space Complexity:</h3>
                <p>O(1) - Insertion sort is an in-place sorting algorithm</p>
                
                <h3>Stability:</h3>
                <p>Insertion sort is stable - it maintains the relative order of equal elements</p>
            </div>

            <h2>Key Properties</h2>
            <div class="properties">
                <ul>
                    <li>Efficient for small data sets</li>
                    <li>More efficient in practice than other O(n²) algorithms like Bubble Sort</li>
                    <li>Adaptive - performance improves when input is nearly sorted</li>
                    <li>Online - can sort as it receives input</li>
                </ul>
            </div>

            <h2>When to Use Insertion Sort</h2>
            <div class="use-cases">
                <ul>
                    <li>When the array is small or nearly sorted</li>
                    <li>As the base case for recursive sorting algorithms (like Quick Sort)</li>
                    <li>When memory is limited (in-place sorting)</li>
                    <li>For online sorting problems</li>
                </ul>
            </div>
        </main>

        <!-- Merge Sort Content -->
        <main class="main-content merge-sort" id="merge-sort" style="display:none;">
            <h1>Merge Sort</h1>
            <p class="intro">Merge Sort is a divide-and-conquer algorithm that recursively divides the array into halves, sorts them, and then merges the sorted halves.</p>
            
            <h2>How Merge Sort Works</h2>
            <div class="algorithm-steps">
                <ol>
                    <li><strong>Divide</strong> the unsorted array into two halves</li>
                    <li><strong>Recursively sort</strong> each half</li>
                    <li><strong>Merge</strong> the two sorted halves to produce the final sorted array</li>
                </ol>
                <p>The key operation is the merge process, which combines two sorted arrays into one sorted array.</p>
            </div>

            <h2>Detailed Process Example</h2>
            <p>For the array [8, 3, 5, 1, 9] (from the quiz example), here's how Merge Sort would process it:</p>
            <div class="process-details">
                <p><strong>Divide Phase:</strong></p>
                <ul>
                    <li>First split: [8, 3] and [5, 1, 9]</li>
                    <li>Second split: [8], [3] and [5], [1, 9]</li>
                    <li>Third split: [1], [9]</li>
                </ul>
                <p><strong>Merge Phase:</strong></p>
                <ul>
                    <li>Merge [8] and [3] → [3, 8]</li>
                    <li>Merge [1] and [9] → [1, 9]</li>
                    <li>Merge [5] and [1, 9] → [1, 5, 9]</li>
                    <li>Merge [3, 8] and [1, 5, 9] → [1, 3, 5, 8, 9]</li>
                </ul>
            </div>

            <h2>Performance Characteristics</h2>
            <div class="performance">
                <h3>Time Complexity:</h3>
                <ul>
                    <li><strong>Worst-case:</strong> O(n log n)</li>
                    <li><strong>Average-case:</strong> O(n log n)</li>
                    <li><strong>Best-case:</strong> O(n log n)</li>
                </ul>
                
                <h3>Space Complexity:</h3>
                <p>O(n) - Requires additional space proportional to the input size</p>
                
                <h3>Stability:</h3>
                <p>Merge sort is stable - it maintains the relative order of equal elements</p>
            </div>

            <h2>Key Properties</h2>
            <div class="properties">
                <ul>
                    <li>Consistent O(n log n) performance for all cases</li>
                    <li>Well-suited for linked lists (requires only O(1) extra space)</li>
                    <li>Parallelizable - can be easily adapted for multi-threaded implementations</li>
                    <li>Excellent for external sorting (sorting data too large for memory)</li>
                </ul>
            </div>

            <h2>When to Use Merge Sort</h2>
            <div class="use-cases">
                <ul>
                    <li>When stable sorting is required</li>
                    <li>For sorting linked lists</li>
                    <li>When worst-case performance matters</li>
                    <li>For external sorting scenarios</li>
                </ul>
            </div>
        </main>

        <!-- Quick Sort Content -->
        <main class="main-content quick-sort" id="quick-sort" style="display:none;">
            <h1>Quick Sort</h1>
            <p class="intro">Quick Sort is a divide-and-conquer algorithm that selects a 'pivot' element and partitions the array around the pivot, placing smaller elements before it and larger elements after it.</p>
            
            <h2>How Quick Sort Works</h2>
            <div class="algorithm-steps">
                <ol>
                    <li><strong>Choose a pivot element</strong> from the array (various selection strategies exist)</li>
                    <li><strong>Partition</strong> the array so that elements less than pivot come before, and elements greater come after</li>
                    <li><strong>Recursively apply</strong> the same process to the sub-arrays before and after the pivot</li>
                </ol>
                <p>The base case of the recursion is arrays of size zero or one, which are already sorted.</p>
            </div>

            <h2>Detailed Process Example</h2>
            <p>For the array [6, 2, 8, 4, 5] (from the quiz example), here's how Quick Sort might process it (choosing last element as pivot):</p>
            <div class="process-details">
                <p><strong>First Partition:</strong> (pivot = 5)</p>
                <ul>
                    <li>Rearrange: [2, 4, 5, 8, 6] (elements less than 5 moved left)</li>
                </ul>
                <p><strong>Left Subarray:</strong> [2, 4]</p>
                <ul>
                    <li>Pivot = 4 → [2, 4] (already sorted)</li>
                </ul>
                <p><strong>Right Subarray:</strong> [8, 6]</p>
                <ul>
                    <li>Pivot = 6 → [6, 8]</li>
                </ul>
                <p><strong>Final Sorted Array:</strong> [2, 4, 5, 6, 8]</p>
            </div>

            <h2>Performance Characteristics</h2>
            <div class="performance">
                <h3>Time Complexity:</h3>
                <ul>
                    <li><strong>Worst-case:</strong> O(n²) - When poor pivot choices lead to unbalanced partitions</li>
                    <li><strong>Average-case:</strong> O(n log n)</li>
                    <li><strong>Best-case:</strong> O(n log n) - When pivot divides array into equal parts</li>
                </ul>
                
                <h3>Space Complexity:</h3>
                <p>O(log n) - Due to recursion stack (in-place version)</p>
                
                <h3>Stability:</h3>
                <p>Quick sort is generally not stable, though stable versions exist</p>
            </div>

            <h2>Key Properties</h2>
            <div class="properties">
                <ul>
                    <li>Typically faster in practice than other O(n log n) algorithms</li>
                    <li>Cache-efficient - good locality of reference</li>
                    <li>Pivot selection strategy greatly affects performance</li>
                    <li>Can be implemented as an in-place sort</li>
                </ul>
            </div>

            <h2>When to Use Quick Sort</h2>
            <div class="use-cases">
                <ul>
                    <li>For general-purpose sorting of large datasets</li>
                    <li>When average-case performance is more important than worst-case</li>
                    <li>When memory is limited (in-place version)</li>
                    <li>When cache performance is important</li>
                </ul>
            </div>
        </main>

        <!-- Heap Sort Content -->
        <main class="main-content heap-sort" id="heap-sort" style="display:none;">
            <h1>Heap Sort</h1>
            <p class="intro">Heap Sort works by visualizing the array as a binary heap, then repeatedly extracting the maximum element and rebuilding the heap until sorted.</p>
            
            <h2>How Heap Sort Works</h2>
            <div class="algorithm-steps">
                <ol>
                    <li><strong>Build a max heap</strong> from the input array</li>
                    <li><strong>The largest item</strong> is stored at the root of the heap</li>
                    <li><strong>Swap</strong> the root with the last item of the heap</li>
                    <li><strong>Reduce heap size</strong> by one (excluding the last item which is now sorted)</li>
                    <li><strong>Heapify</strong> the root of the tree to maintain heap property</li>
                    <li><strong>Repeat</strong> until the heap size reduces to one</li>
                </ol>
                <p>This process creates a sorted array in ascending order by repeatedly moving the maximum element to the end.</p>
            </div>

            <h2>Detailed Process Example</h2>
            <p>For an example array, here's how Heap Sort would process it:</p>
            <div class="process-details">
                <p><strong>Build Max Heap:</strong></p>
                <ul>
                    <li>Transform array into a complete binary tree satisfying heap property</li>
                </ul>
                <p><strong>Sorting Phase:</strong></p>
                <ul>
                    <li>Swap root (max element) with last element</li>
                    <li>Reduce heap size and heapify the new root</li>
                    <li>Repeat until heap contains only one element</li>
                </ul>
            </div>

            <h2>Performance Characteristics</h2>
            <div class="performance">
                <h3>Time Complexity:</h3>
                <ul>
                    <li><strong>Worst-case:</strong> O(n log n)</li>
                    <li><strong>Average-case:</strong> O(n log n)</li>
                    <li><strong>Best-case:</strong> O(n log n)</li>
                </ul>
                
                <h3>Space Complexity:</h3>
                <p>O(1) - Heap sort is an in-place sorting algorithm</p>
                
                <h3>Stability:</h3>
                <p>Heap sort is not stable - it may change the relative order of equal elements</p>
            </div>

            <h2>Key Properties</h2>
            <div class="properties">
                <ul>
                    <li>Guaranteed O(n log n) performance</li>
                    <li>Doesn't require additional space (in-place)</li>
                    <li>Not adaptive - performs the same regardless of input order</li>
                    <li>Not efficient for small datasets due to constant factors</li>
                </ul>
            </div>

            <h2>When to Use Heap Sort</h2>
            <div class="use-cases">
                <ul>
                    <li>When worst-case performance matters</li>
                    <li>When memory is limited (in-place sorting)</li>
                    <li>When you need to extract the k largest elements efficiently</li>
                    <li>In embedded systems with limited resources</li>
                </ul>
            </div>
        </main>

        <!-- Counting Sort Content -->
        <main class="main-content counting-sort" id="counting-sort" style="display:none;">
            <h1>Counting Sort</h1>
            <p class="intro">Counting Sort is a non-comparison based sorting algorithm that works by counting the number of objects having distinct key values, then calculating positions using arithmetic.</p>
            
            <h2>How Counting Sort Works</h2>
            <div class="algorithm-steps">
                <ol>
                    <li><strong>Find the range</strong> of input values (minimum and maximum)</li>
                    <li><strong>Create a count array</strong> to store count of each unique value</li>
                    <li><strong>Modify the count array</strong> to store cumulative counts</li>
                    <li><strong>Build the output array</strong> by placing elements in their correct positions based on the count array</li>
                </ol>
                <p>This algorithm works best when the range of input data is not significantly greater than the number of elements.</p>
            </div>

            <h2>Detailed Process Example</h2>
            <p>For an example array, here's how Counting Sort would process it:</p>
            <div class="process-details">
                <p><strong>Counting Phase:</strong></p>
                <ul>
                    <li>Create a frequency count of each distinct element</li>
                </ul>
                <p><strong>Position Calculation:</strong></p>
                <ul>
                    <li>Convert counts to cumulative counts representing positions</li>
                </ul>
                <p><strong>Placement Phase:</strong></p>
                <ul>
                    <li>Place each element in its calculated position and decrement count</li>
                </ul>
            </div>

            <h2>Performance Characteristics</h2>
            <div class="performance">
                <h3>Time Complexity:</h3>
                <ul>
                    <li><strong>Worst-case:</strong> O(n + k) where k is range of input</li>
                    <li><strong>Average-case:</strong> O(n + k)</li>
                    <li><strong>Best-case:</strong> O(n + k)</li>
                </ul>
                
                <h3>Space Complexity:</h3>
                <p>O(n + k) - Requires additional space for count and output arrays</p>
                
                <h3>Stability:</h3>
                <p>Counting sort is stable - it maintains the relative order of equal elements</p>
            </div>

            <h2>Key Properties</h2>
            <div class="properties">
                <ul>
                    <li>Not a comparison-based sort (can be faster than O(n log n) sorts)</li>
                    <li>Works best when range of data (k) is not much larger than number of elements (n)</li>
                    <li>Often used as a subroutine in Radix Sort</li>
                    <li>Only works for integer data with known range</li>
                </ul>
            </div>

            <h2>When to Use Counting Sort</h2>
            <div class="use-cases">
                <ul>
                    <li>When sorting integers with a limited range</li>
                    <li>When stable sorting is required for small-range data</li>
                    <li>As a building block for more complex algorithms</li>
                    <li>When the range of input data is known and not significantly larger than count</li>
                </ul>
            </div>
        </main>

        <!-- Radix Sort Content -->
        <main class="main-content radix-sort" id="radix-sort" style="display:none;">
            <h1>Radix Sort</h1>
            <p class="intro">Radix Sort is a non-comparative sorting algorithm that processes individual digits of numbers, grouping numbers by each digit from least significant to most significant.</p>
            
            <h2>How Radix Sort Works</h2>
            <div class="algorithm-steps">
                <ol>
                    <li><strong>Find the maximum number</strong> to determine number of digits</li>
                    <li><strong>Sort numbers</strong> based on least significant digit (using a stable sort like Counting Sort)</li>
                    <li><strong>Continue sorting</strong> by next significant digits until all digits are processed</li>
                    <li><strong>After processing</strong> all digits, the array becomes fully sorted</li>
                </ol>
                <p>Radix sort can process digits from left to right (MSD) or right to left (LSD), with LSD being more common.</p>
            </div>

            <h2>Detailed Process Example</h2>
            <p>For the array [170, 45, 75, 90, 802, 24, 2, 66] (from the quiz example), here's how Radix Sort would process it:</p>
            <div class="process-details">
                <p><strong>First Pass (units place):</strong></p>
                <ul>
                    <li>Group by last digit: [170, 90], [802, 2], [24], [45, 75], [66]</li>
                    <li>Array after sort: [170, 90, 802, 2, 24, 45, 75, 66]</li>
                </ul>
                <p><strong>Second Pass (tens place):</strong></p>
                <ul>
                    <li>Group by second digit: [802, 2], [24], [45], [66], [170, 75], [90]</li>
                    <li>Array after sort: [802, 2, 24, 45, 66, 170, 75, 90]</li>
                </ul>
                <p><strong>Third Pass (hundreds place):</strong></p>
                <ul>
                    <li>Group by third digit: [2, 24, 45, 66, 75, 90], [170], [802]</li>
                    <li>Final sorted array: [2, 24, 45, 66, 75, 90, 170, 802]</li>
                </ul>
            </div>

            <h2>Performance Characteristics</h2>
            <div class="performance">
                <h3>Time Complexity:</h3>
                <ul>
                    <li><strong>Worst-case:</strong> O(nk) where k is number of digits</li>
                    <li><strong>Average-case:</strong> O(nk)</li>
                    <li><strong>Best-case:</strong> O(nk)</li>
                </ul>
                
                <h3>Space Complexity:</h3>
                <p>O(n + k) - Requires additional space for buckets and counting</p>
                
                <h3>Stability:</h3>
                <p>Radix sort is stable when using a stable subroutine sort (like Counting Sort)</p>
            </div>

            <h2>Key Properties</h2>
            <div class="properties">
                <ul>
                    <li>Not a comparison-based sort (can be faster than O(n log n) sorts)</li>
                    <li>Works well for numbers with fixed width (same number of digits)</li>
                    <li>Can be used for strings and other data types with digit-like components</li>
                    <li>Performance depends on the choice of base (radix) for digit processing</li>
                </ul>
            </div>

            <h2>When to Use Radix Sort</h2>
            <div class="use-cases">
                <ul>
                    <li>When sorting numbers with fixed number of digits</li>
                    <li>When the range of numbers is known and not extremely large</li>
                    <li>For sorting strings or other lexicographic data</li>
                    <li>When stable sorting is required for multi-pass sorting</li>
                </ul>
            </div>
        </main>

        <!-- Bucket Sort Content -->
        <main class="main-content bucket-sort" id="bucket-sort" style="display:none;">
            <h1>Bucket Sort</h1>
            <p class="intro">Bucket Sort distributes elements into a number of buckets, then sorts each bucket individually, either using a different sorting algorithm or recursively applying bucket sort.</p>
            
            <h2>How Bucket Sort Works</h2>
            <div class="algorithm-steps">
                <ol>
                    <li><strong>Create empty buckets</strong> (typically as arrays or lists)</li>
                    <li><strong>Scatter</strong> the input elements into buckets based on their values</li>
                    <li><strong>Sort each bucket</strong> individually (often using Insertion Sort)</li>
                    <li><strong>Gather</strong> all buckets in order to produce the sorted array</li>
                </ol>
                <p>The efficiency depends on the distribution of elements into buckets and the sorting algorithm used for buckets.</p>
            </div>

            <h2>Detailed Process Example</h2>
            <p>For the array [12, 6, 18, 3, 9] (from the quiz example), here's how Bucket Sort might process it (with bucket range 0-5, 6-10, 11-15, 16-20):</p>
            <div class="process-details">
                <p><strong>Scatter Phase:</strong></p>
                <ul>
                    <li>Bucket 0-5: [3]</li>
                    <li>Bucket 6-10: [6, 9]</li>
                    <li>Bucket 11-15: [12]</li>
                    <li>Bucket 16-20: [18]</li>
                </ul>
                <p><strong>Sort Buckets:</strong></p>
                <ul>
                    <li>Bucket 6-10 sorted: [6, 9]</li>
                </ul>
                <p><strong>Gather Phase:</strong></p>
                <ul>
                    <li>Combine buckets in order: [3, 6, 9, 12, 18]</li>
                </ul>
            </div>

            <h2>Performance Characteristics</h2>
            <div class="performance">
                <h3>Time Complexity:</h3>
                <ul>
                    <li><strong>Worst-case:</strong> O(n²) - When all elements fall into a single bucket</li>
                    <li><strong>Average-case:</strong> O(n + k) where k is number of buckets</li>
                    <li><strong>Best-case:</strong> O(n) - When elements are uniformly distributed</li>
                </ul>
                
                <h3>Space Complexity:</h3>
                <p>O(n + k) - Requires additional space for buckets</p>
                
                <h3>Stability:</h3>
                <p>Bucket sort is stable when using a stable sorting algorithm for buckets</p>
            </div>

            <h2>Key Properties</h2>
            <div class="properties">
                <ul>
                    <li>Performance depends heavily on input distribution</li>
                    <li>Works best when input is uniformly distributed over a range</li>
                    <li>Can be very efficient when the assumptions hold</li>
                    <li>Often used for floating-point numbers in [0,1) range</li>
                </ul>
            </div>

            <h2>When to Use Bucket Sort</h2>
            <div class="use-cases">
                <ul>
                    <li>When input is uniformly distributed over a known range</li>
                    <li>For sorting floating-point numbers</li>
                    <li>When additional memory is available for buckets</li>
                    <li>When a stable sort is needed for certain distributions</li>
                </ul>
            </div>
        </main>

        <main class="main-content tree-sort" id="tree-sort" style="display:none;">
    <h1>Tree Sort</h1>
    <p class="intro">Tree Sort works by building a binary search tree from the input elements, then performing an in-order traversal to produce the sorted sequence.</p>
    
    <h2>How Tree Sort Works</h2>
    <div class="algorithm-steps">
        <ol>
            <li><strong>Create an empty binary search tree</strong> (BST)</li>
            <li><strong>Insert</strong> all elements of the input array into the BST</li>
            <li><strong>Perform in-order traversal</strong> of the BST to get elements in sorted order</li>
        </ol>
        <p>The efficiency depends on the structure of the BST, which is influenced by the input order.</p>
    </div>

    <h2>Detailed Process Example</h2>
    <p>For the array [12, 6, 18, 3, 9], here's how Tree Sort would process it:</p>
    <div class="process-details">
        <p><strong>BST Construction Phase:</strong></p>
        <ul>
            <li>Insert 12 as root</li>
            <li>Insert 6 to left of 12</li>
            <li>Insert 18 to right of 12</li>
            <li>Insert 3 to left of 6</li>
            <li>Insert 9 to right of 6</li>
        </ul>
        <p><strong>In-order Traversal Phase:</strong></p>
        <ul>
            <li>Traverse left subtree: 3, 6, 9</li>
            <li>Visit root: 12</li>
            <li>Traverse right subtree: 18</li>
            <li>Final sorted order: [3, 6, 9, 12, 18]</li>
        </ul>
    </div>

    <h2>Performance Characteristics</h2>
    <div class="performance">
        <h3>Time Complexity:</h3>
        <ul>
            <li><strong>Worst-case:</strong> O(n²) - When tree becomes skewed (like a linked list)</li>
            <li><strong>Average-case:</strong> O(n log n) - With balanced tree</li>
            <li><strong>Best-case:</strong> O(n log n) - When tree remains balanced</li>
        </ul>
        
        <h3>Space Complexity:</h3>
        <p>O(n) - Requires space for the tree nodes</p>
        
        <h3>Stability:</h3>
        <p>Tree sort is not inherently stable as equal elements might appear in different order in the BST</p>
    </div>

    <h2>Key Properties</h2>
    <div class="properties">
        <ul>
            <li>Performance depends on the balance of the BST</li>
            <li>Can be improved by using self-balancing trees (AVL, Red-Black)</li>
            <li>Natural choice when data needs to be maintained in sorted order for future operations</li>
            <li>Performs well when data is inserted in random order</li>
        </ul>
    </div>

    <h2>When to Use Tree Sort</h2>
    <div class="use-cases">
        <ul>
            <li>When you need to maintain data in sorted order for multiple operations</li>
            <li>When using a self-balancing tree implementation</li>
            <li>When memory is available for tree node storage</li>
            <li>When input data is likely to produce a reasonably balanced tree</li>
        </ul>
    </div>
</main>
    </div>
    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>
    <script src="assets/js/script.js"></script>
    
    <script src="assets/js/learn-dynamic-island.js"></script>

</body>
</html>
