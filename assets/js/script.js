 // Mobile Menu Toggle
 const mobileMenuBtn = document.getElementById('mobileMenuBtn');
 const navLinks = document.getElementById('navLinks');

 mobileMenuBtn.addEventListener('click', () => {
     navLinks.classList.toggle('active');
 });

 // Dark Mode Toggle
 document.addEventListener('DOMContentLoaded', function() {
     // Check saved preference
     const darkModeEnabled = localStorage.getItem('darkMode') === 'true';
     
     // Apply saved mode
     if (darkModeEnabled) {
         document.body.classList.add('dark-mode');
     }
     
     // Set up toggle button
     const darkModeToggle = document.getElementById('darkModeToggle');
     if (darkModeToggle) {
         darkModeToggle.addEventListener('click', function() {
             const isDark = document.body.classList.toggle('dark-mode');
             localStorage.setItem('darkMode', isDark);
         });
     }
 });

 // Bubble Sort Visualization
 const arrayContainer = document.getElementById('arrayContainer');
 const startBtn = document.getElementById('startBtn');
 const resetBtn = document.getElementById('resetBtn');
 const statusText = document.getElementById('statusText');

 let array = [64, 34, 25, 12, 22, 11, 90];
 let sorting = false;

 function renderArray(highlightIndices = []) {
     arrayContainer.innerHTML = '';
     array.forEach((value, index) => {
         const element = document.createElement('div');
         element.className = 'array-element';
         if (highlightIndices.includes(index)) {
             element.classList.add('highlight');
         }
         element.textContent = value;
         element.style.height = `${value}px`;
         arrayContainer.appendChild(element);
     });
 }

 function resetArray() {
     if (sorting) return;
     array = [64, 34, 25, 12, 22, 11, 90];
     renderArray();
     statusText.textContent = 'Array reset. Click "Start Sorting" to begin the visualization';
 }

 async function bubbleSort() {
     if (sorting) return;
     sorting = true;
     startBtn.disabled = true;
     
     let n = array.length;
     let swapped;
     
     for (let i = 0; i < n-1; i++) {
         swapped = false;
         for (let j = 0; j < n-i-1; j++) {
             // Highlight the elements being compared
             renderArray([j, j+1]);
             statusText.textContent = `Comparing ${array[j]} and ${array[j+1]}`;
             
             // Add delay for visualization
             await new Promise(resolve => setTimeout(resolve, 1000));
             
             if (array[j] > array[j+1]) {
                 // Swap elements
                 [array[j], array[j+1]] = [array[j+1], array[j]];
                 swapped = true;
                 
                 // Show swap in visualization
                 renderArray([j, j+1]);
                 statusText.textContent = `Swapping ${array[j]} and ${array[j+1]}`;
                 await new Promise(resolve => setTimeout(resolve, 1000));
             }
         }
         
         // If no two elements were swapped, array is sorted
         if (!swapped) break;
     }
     
     renderArray();
     statusText.textContent = 'Array sorted! Click "Reset Array" to start over';
     sorting = false;
     startBtn.disabled = false;
 }

 startBtn.addEventListener('click', bubbleSort);
 resetBtn.addEventListener('click', resetArray);

 // Initialize
 resetArray();


 function openTab(evt, tabName) {
     // Hide all tab contents
     const tabContents = document.getElementsByClassName("tab-content");
     for (let i = 0; i < tabContents.length; i++) {
         tabContents[i].style.display = "none";
     }
     
     // Remove active class from all buttons
     const tabButtons = document.getElementsByClassName("tab-btn");
     for (let i = 0; i < tabButtons.length; i++) {
         tabButtons[i].classList.remove("active");
     }
     
     // Show current tab and mark button as active
     document.getElementById(tabName).style.display = "block";
     evt.currentTarget.classList.add("active");
     
     // Store the selected tab in localStorage
     localStorage.setItem('lastActiveTab', tabName);
 }

 // Load last active tab if available
 document.addEventListener('DOMContentLoaded', function() {
     const lastActiveTab = localStorage.getItem('lastActiveTab');
     if (lastActiveTab) {
         document.getElementById(lastActiveTab).style.display = "block";
         const buttons = document.querySelectorAll('.tab-btn');
         buttons.forEach(btn => {
             if (btn.getAttribute('onclick').includes(lastActiveTab)) {
                 btn.classList.add('active');
             } else {
                 btn.classList.remove('active');
             }
         });
     }
 });



 // Syntax highlighting for code blocks