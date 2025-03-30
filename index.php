<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/sort-icon.png" type="image/png">
    <title>Bubble Sort Algorithm | SortArtOnline</title>
    <link rel="stylesheet" href="assets/css/styles.css">
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
            <li><a href="#">Offline</a></li>
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
                    <a href="#">Learn</a>
                    <span>/</span>
                    <a href="#">Sorting Algorithms</a>
                    <span>/</span>
                    <span>Bubble Sort</span>
                </div>
            </div>

            <div class="article-content">
                <p>Bubble Sort is the simplest sorting algorithm that works by repeatedly swapping the adjacent elements if they are in the wrong order. This algorithm is not suitable for large data sets as its average and worst-case time complexity is quite high.</p>

                <h2>How Bubble Sort Works?</h2>
                <p>Consider an array <code>arr[] = {5, 1, 4, 2, 8}</code></p>

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

                
                <?php include "includes/bubblesort-ci.php"; ?>

                <h2>Complexity Analysis of Bubble Sort</h2>
                <div class="table-container">
                    <table>
                        <tr>
                            <th>Case</th>
                            <th>Time Complexity</th>
                        </tr>
                        <tr>
                            <td>Best Case</td>
                            <td>O(n) (when array is already sorted)</td>
                        </tr>
                        <tr>
                            <td>Average Case</td>
                            <td>O(n<sup>2</sup>)</td>
                        </tr>
                        <tr>
                            <td>Worst Case</td>
                            <td>O(n<sup>2</sup>) (when array is reverse sorted)</td>
                        </tr>
                        <tr>
                            <td>Space Complexity</td>
                            <td>O(1) (Auxiliary Space)</td>
                        </tr>
                        <tr>
                            <td>Stable</td>
                            <td>Yes</td>
                        </tr>
                    </table>
                </div>

                <h2>Bubble Sort Visualization</h2>
                <div class="visualization">
                    <h3>Interactive Bubble Sort Demonstration</h3>
                    <div class="array-container" id="arrayContainer">
                        <!-- Array elements will be inserted here by JavaScript -->
                    </div>
                    <div class="controls">
                        <button class="btn" id="startBtn">Start Sorting</button>
                        <button class="btn btn-secondary" id="resetBtn">Reset Array</button>
                    </div>
                    <p id="statusText" style="text-align: center; margin-top: 1rem;">Click "Start Sorting" to begin the visualization</p>
                </div>
            </div>
        </main>

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-widget">
                <h3>Related Articles</h3>
                <ul class="widget-links">
                    <li><a href="#">Selection Sort Algorithm</a></li>
                    <li><a href="#">Insertion Sort Algorithm</a></li>
                    <li><a href="#">Merge Sort Algorithm</a></li>
                    <li><a href="#">Quick Sort Algorithm</a></li>
                    <li><a href="#">Heap Sort Algorithm</a></li>
                </ul>
            </div>

            <div class="sidebar-widget">
                <h3>Complexity Cheatsheet</h3>
                <ul class="widget-links">
                    <li><a href="#">Time Complexity of All Sorting Algorithms</a></li>
                    <li><a href="#">Space Complexity Comparison</a></li>
                    <li><a href="#">When to Use Each Sorting Algorithm</a></li>
                </ul>
            </div>

            <div class="sidebar-widget">
                <h3>Practice Problems</h3>
                <ul class="widget-links">
                    <li><a href="#">Sort an Array of 0s, 1s and 2s</a></li>
                    <li><a href="#">Bubble Sort in Linked List</a></li>
                    <li><a href="#">Sort a Nearly Sorted Array</a></li>
                    <li><a href="#">Sorting a String Array</a></li>
                </ul>
            </div>
        </aside>
    </div>

    <!-- Footer -->
   
    <footer class="footer" style="border-top:3px solid  #4ec9b0; ">
        <div class="footer-content">
            <div class="footer-column">
                <h3>SortArtOnline</h3>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Learn</h3>
                <ul class="footer-links">
                    <li><a href="#">Algorithms</a></li>
                    <li><a href="#">Data Structures</a></li>
                    <li><a href="#">Languages</a></li>
                    <li><a href="#">CS Subjects</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Practice</h3>
                <ul class="footer-links">
                    <li><a href="#">Quizzes</a></li>
                    <li><a href="#">Coding Challenges</a></li>
                    <li><a href="#">Interview Prep</a></li>
                    <li><a href="#">Competitive Programming</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contribute</h3>
                <ul class="footer-links">
                    <li><a href="#">Write an Article</a></li>
                    <li><a href="#">Improve an Article</a></li>
                    <li><a href="#">Pick a Topic to Write</a></li>
                    <li><a href="#">Report a Bug</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2023 SortArtOnline. All rights reserved.</p>
        </div>
    </footer>

    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>

    <script src="assets/js/script.js"></script>
       
   
</body>
</html>