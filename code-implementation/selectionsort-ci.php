<!-- Selection Sort -->
<h2>Selection Sort Implementations</h2>
<div class="selection-sort-implementations">
    <div class="selection-sort-code-tabs">
        <div class="tab-buttons">
            <button class="selection-tab-btn tab-btn active" onclick="openSelectionTab(event, 'selection-cpp-tab')">C++</button>
            <button class="selection-tab-btn tab-btn" onclick="openSelectionTab(event, 'selection-python-tab')">Python</button>
            <button class="selection-tab-btn tab-btn" onclick="openSelectionTab(event, 'selection-java-tab')">Java</button>
            <button class="selection-tab-btn tab-btn" onclick="openSelectionTab(event, 'selection-js-tab')">JavaScript</button>
           
        </div>

        <!-- C++ Tab -->
        <div id="selection-cpp-tab" class="selection-tab-content" style="display:block;">
            <div class="code-block">
                <pre><code class="language-cpp">#include &lt;iostream&gt;
#include &lt;vector&gt;
using namespace std;

<span class="code-keyword">void</span> selectionSort(vector&lt;<span class="code-type">int</span>&gt;& arr) {
    <span class="code-type">int</span> n = arr.size();
    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n-<span class="code-number">1</span>; i++) {
        <span class="code-type">int</span> min_idx = i;
        <span class="code-keyword">for</span> (<span class="code-type">int</span> j = i+<span class="code-number">1</span>; j &lt; n; j++) {
            <span class="code-keyword">if</span> (arr[j] &lt; arr[min_idx]) {
                min_idx = j;
            }
        }
        <span class="code-keyword">if</span> (min_idx != i) {
            swap(arr[i], arr[min_idx]);
        }
    }
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">int</span>&gt; arr = {<span class="code-number">64</span>, <span class="code-number">25</span>, <span class="code-number">12</span>, <span class="code-number">22</span>, <span class="code-number">11</span>};
    selectionSort(arr);
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
            </div>
        </div>

        <!-- Python Tab -->
        <div id="selection-python-tab" class="selection-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-python"><span class="code-keyword">def</span> <span class="code-function">selection_sort</span>(arr):
    n = <span class="code-function">len</span>(arr)
    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(n-<span class="code-number">1</span>):
        min_idx = i
        <span class="code-keyword">for</span> j <span class="code-keyword">in</span> <span class="code-function">range</span>(i+<span class="code-number">1</span>, n):
            <span class="code-keyword">if</span> arr[j] &lt; arr[min_idx]:
                min_idx = j
        arr[i], arr[min_idx] = arr[min_idx], arr[i]

arr = [<span class="code-number">64</span>, <span class="code-number">25</span>, <span class="code-number">12</span>, <span class="code-number">22</span>, <span class="code-number">11</span>]
selection_sort(arr)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, arr)</code></pre>
            </div>
        </div>

        <!-- Java Tab -->
        <div id="selection-java-tab" class="selection-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-java"><span class="code-keyword">public class</span> <span class="code-class">SelectionSort</span> {
    <span class="code-keyword">void</span> <span class="code-function">sort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> n = arr.length;
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n-<span class="code-number">1</span>; i++) {
            <span class="code-type">int</span> min_idx = i;
            <span class="code-keyword">for</span> (<span class="code-type">int</span> j = i+<span class="code-number">1</span>; j &lt; n; j++) {
                <span class="code-keyword">if</span> (arr[j] &lt; arr[min_idx]) {
                    min_idx = j;
                }
            }
            <span class="code-type">int</span> temp = arr[min_idx];
            arr[min_idx] = arr[i];
            arr[i] = temp;
        }
    }

    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span> args[]) {
        <span class="code-type">int</span>[] arr = {<span class="code-number">64</span>, <span class="code-number">25</span>, <span class="code-number">12</span>, <span class="code-number">22</span>, <span class="code-number">11</span>};
        <span class="code-class">SelectionSort</span> ob = <span class="code-keyword">new</span> <span class="code-class">SelectionSort</span>();
        ob.sort(arr);
        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) System.out.print(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- JavaScript Tab -->
        <div id="selection-js-tab" class="selection-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-javascript"><span class="code-keyword">function</span> <span class="code-function">selectionSort</span>(arr) {
    <span class="code-keyword">let</span> n = arr.length;
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; n-<span class="code-number">1</span>; i++) {
        <span class="code-keyword">let</span> min_idx = i;
        <span class="code-keyword">for</span> (<span class="code-keyword">let</span> j = i+<span class="code-number">1</span>; j &lt; n; j++) {
            <span class="code-keyword">if</span> (arr[j] &lt; arr[min_idx]) {
                min_idx = j;
            }
        }
        <span class="code-keyword">if</span> (min_idx != i) {
            [arr[i], arr[min_idx]] = [arr[min_idx], arr[i]];
        }
    }
}

<span class="code-keyword">let</span> arr = [<span class="code-number">64</span>, <span class="code-number">25</span>, <span class="code-number">12</span>, <span class="code-number">22</span>, <span class="code-number">11</span>];
selectionSort(arr);
console.log(<span class="code-string">"Sorted array:"</span>, arr);</code></pre>
            </div>
        </div>

     
    </div>
</div>

<script>
function openSelectionTab(evt, tabName) {
    // Prevent default behavior if it's a click event
    if (evt) {
        evt.preventDefault();
    }

    // Get all selection sort tab contents
    const tabContents = document.querySelectorAll('.selection-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });
    
    // Remove active class from all selection tab buttons
    const tabButtons = document.querySelectorAll('.selection-tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove("active");
    });
    
    // Show current tab and mark button as active
    const activeTab = document.getElementById(tabName);
    if (activeTab) {
        activeTab.style.display = "block";
    }
    
    if (evt && evt.currentTarget) {
        evt.currentTarget.classList.add("active");
    }
    
    // Store the selected tab in localStorage with selection-specific key
    localStorage.setItem('lastActiveSelectionTab', tabName);
}

// Load last active selection tab if available
document.addEventListener('DOMContentLoaded', function() {
    // First hide all selection tab contents
    const tabContents = document.querySelectorAll('.selection-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });

    // Remove active class from all buttons initially
    const tabButtons = document.querySelectorAll('.selection-tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove("active");
    });

    const lastActiveTab = localStorage.getItem('lastActiveSelectionTab');
    if (lastActiveTab && document.getElementById(lastActiveTab)) {
        // Show the saved tab
        document.getElementById(lastActiveTab).style.display = "block";
        
        // Activate the corresponding button
        tabButtons.forEach(btn => {
            if (btn.getAttribute('onclick').includes(lastActiveTab)) {
                btn.classList.add('active');
            }
        });
    } else {
        // Default to showing the first tab and activating first button
        const firstTab = document.querySelector('.selection-tab-content');
        const firstButton = document.querySelector('.selection-tab-btn');
        
        if (firstTab) firstTab.style.display = "block";
        if (firstButton) firstButton.classList.add("active");
        
        // Store the default tab if nothing is stored
        if (firstTab) {
            localStorage.setItem('lastActiveSelectionTab', firstTab.id);
        }
    }
});
</script>