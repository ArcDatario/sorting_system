
<!-- Quick Sort -->
<h2>Quick Sort Implementations</h2>
<div class="quick-sort-implementations">
    <div class="quick-sort-code-tabs">
        <div class="tab-buttons">
            <button class="quick-tab-btn tab-btn active" onclick="openQuickTab(event, 'quick-cpp-tab')">C++</button>
            <button class="quick-tab-btn tab-btn" onclick="openQuickTab(event, 'quick-python-tab')">Python</button>
            <button class="quick-tab-btn tab-btn" onclick="openQuickTab(event, 'quick-java-tab')">Java</button>
            <button class="quick-tab-btn tab-btn" onclick="openQuickTab(event, 'quick-js-tab')">JavaScript</button>
        </div>

        <!-- C++ Tab -->
        <div id="quick-cpp-tab" class="quick-tab-content" style="display:block;">
            <div class="code-block">
                <pre><code class="language-cpp">#include &lt;iostream&gt;
#include &lt;vector&gt;
using namespace std;

<span class="code-type">int</span> <span class="code-function">partition</span>(vector&lt;<span class="code-type">int</span>&gt;& arr, <span class="code-type">int</span> low, <span class="code-type">int</span> high) {
    <span class="code-type">int</span> pivot = arr[high];
    <span class="code-type">int</span> i = low - <span class="code-number">1</span>;

    <span class="code-keyword">for</span> (<span class="code-type">int</span> j = low; j <= high - <span class="code-number">1</span>; j++) {
        <span class="code-keyword">if</span> (arr[j] < pivot) {
            i++;
            swap(arr[i], arr[j]);
        }
    }
    swap(arr[i + <span class="code-number">1</span>], arr[high]);
    <span class="code-keyword">return</span> i + <span class="code-number">1</span>;
}

<span class="code-keyword">void</span> <span class="code-function">quickSort</span>(vector&lt;<span class="code-type">int</span>&gt;& arr, <span class="code-type">int</span> low, <span class="code-type">int</span> high) {
    <span class="code-keyword">if</span> (low < high) {
        <span class="code-type">int</span> pi = partition(arr, low, high);
        quickSort(arr, low, pi - <span class="code-number">1</span>);
        quickSort(arr, pi + <span class="code-number">1</span>, high);
    }
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">int</span>&gt; arr = {<span class="code-number">10</span>, <span class="code-number">7</span>, <span class="code-number">8</span>, <span class="code-number">9</span>, <span class="code-number">1</span>, <span class="code-number">5</span>};
    <span class="code-type">int</span> n = arr.size();
    quickSort(arr, <span class="code-number">0</span>, n - <span class="code-number">1</span>);
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
            </div>
        </div>

        <!-- Python Tab -->
        <div id="quick-python-tab" class="quick-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-python"><span class="code-keyword">def</span> <span class="code-function">partition</span>(arr, low, high):
    i = low - <span class="code-number">1</span>
    pivot = arr[high]

    <span class="code-keyword">for</span> j <span class="code-keyword">in</span> <span class="code-function">range</span>(low, high):
        <span class="code-keyword">if</span> arr[j] &lt; pivot:
            i += <span class="code-number">1</span>
            arr[i], arr[j] = arr[j], arr[i]

    arr[i+<span class="code-number">1</span>], arr[high] = arr[high], arr[i+<span class="code-number">1</span>]
    <span class="code-keyword">return</span> i + <span class="code-number">1</span>

<span class="code-keyword">def</span> <span class="code-function">quick_sort</span>(arr, low, high):
    <span class="code-keyword">if</span> low &lt; high:
        pi = partition(arr, low, high)
        quick_sort(arr, low, pi-<span class="code-number">1</span>)
        quick_sort(arr, pi+<span class="code-number">1</span>, high)

arr = [<span class="code-number">10</span>, <span class="code-number">7</span>, <span class="code-number">8</span>, <span class="code-number">9</span>, <span class="code-number">1</span>, <span class="code-number">5</span>]
n = <span class="code-function">len</span>(arr)
quick_sort(arr, <span class="code-number">0</span>, n-<span class="code-number">1</span>)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, arr)</code></pre>
            </div>
        </div>

        <!-- Java Tab -->
        <div id="quick-java-tab" class="quick-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-java"><span class="code-keyword">public class</span> <span class="code-class">QuickSort</span> {
    <span class="code-keyword">int</span> <span class="code-function">partition</span>(<span class="code-type">int</span>[] arr, <span class="code-type">int</span> low, <span class="code-type">int</span> high) {
        <span class="code-type">int</span> pivot = arr[high];
        <span class="code-type">int</span> i = low - <span class="code-number">1</span>;

        <span class="code-keyword">for</span> (<span class="code-type">int</span> j = low; j < high; j++) {
            <span class="code-keyword">if</span> (arr[j] < pivot) {
                i++;
                <span class="code-type">int</span> temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }

        <span class="code-type">int</span> temp = arr[i + <span class="code-number">1</span>];
        arr[i + <span class="code-number">1</span>] = arr[high];
        arr[high] = temp;

        <span class="code-keyword">return</span> i + <span class="code-number">1</span>;
    }

    <span class="code-keyword">void</span> <span class="code-function">sort</span>(<span class="code-type">int</span>[] arr, <span class="code-type">int</span> low, <span class="code-type">int</span> high) {
        <span class="code-keyword">if</span> (low < high) {
            <span class="code-type">int</span> pi = partition(arr, low, high);
            sort(arr, low, pi - <span class="code-number">1</span>);
            sort(arr, pi + <span class="code-number">1</span>, high);
        }
    }

    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span> args[]) {
        <span class="code-type">int</span>[] arr = {<span class="code-number">10</span>, <span class="code-number">7</span>, <span class="code-number">8</span>, <span class="code-number">9</span>, <span class="code-number">1</span>, <span class="code-number">5</span>};
        <span class="code-type">int</span> n = arr.length;

        <span class="code-class">QuickSort</span> ob = <span class="code-keyword">new</span> <span class="code-class">QuickSort</span>();
        ob.sort(arr, <span class="code-number">0</span>, n - <span class="code-number">1</span>);

        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) System.out.print(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- JavaScript Tab -->
        <div id="quick-js-tab" class="quick-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-javascript"><span class="code-keyword">function</span> <span class="code-function">partition</span>(arr, low, high) {
    <span class="code-keyword">let</span> pivot = arr[high];
    <span class="code-keyword">let</span> i = low - <span class="code-number">1</span>;

    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> j = low; j <= high - <span class="code-number">1</span>; j++) {
        <span class="code-keyword">if</span> (arr[j] < pivot) {
            i++;
            [arr[i], arr[j]] = [arr[j], arr[i]];
        }
    }
    [arr[i + <span class="code-number">1</span>], arr[high]] = [arr[high], arr[i + <span class="code-number">1</span>]];
    <span class="code-keyword">return</span> i + <span class="code-number">1</span>;
}

<span class="code-keyword">function</span> <span class="code-function">quickSort</span>(arr, low, high) {
    <span class="code-keyword">if</span> (low < high) {
        <span class="code-keyword">let</span> pi = partition(arr, low, high);
        quickSort(arr, low, pi - <span class="code-number">1</span>);
        quickSort(arr, pi + <span class="code-number">1</span>, high);
    }
}

<span class="code-keyword">let</span> arr = [<span class="code-number">10</span>, <span class="code-number">7</span>, <span class="code-number">8</span>, <span class="code-number">9</span>, <span class="code-number">1</span>, <span class="code-number">5</span>];
<span class="code-keyword">let</span> n = arr.length;
quickSort(arr, <span class="code-number">0</span>, n - <span class="code-number">1</span>);
console.log(<span class="code-string">"Sorted array:"</span>, arr);</code></pre>
            </div>
        </div>
    </div>
</div>

<script>
function openQuickTab(evt, tabName) {
    // Prevent default behavior if it's a click event
    if (evt) {
        evt.preventDefault();
    }

    // Get all quick sort tab contents
    const tabContents = document.querySelectorAll('.quick-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });
    
    // Remove active class from all quick tab buttons
    const tabButtons = document.querySelectorAll('.quick-tab-btn');
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
    
    // Store the selected tab in localStorage with quick-specific key
    localStorage.setItem('lastActiveQuickTab', tabName);
}

// Load last active quick tab if available
document.addEventListener('DOMContentLoaded', function() {
    // First hide all quick tab contents
    const tabContents = document.querySelectorAll('.quick-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });

    // Remove active class from all buttons initially
    const tabButtons = document.querySelectorAll('.quick-tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove("active");
    });

    const lastActiveTab = localStorage.getItem('lastActiveQuickTab');
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
        const firstTab = document.querySelector('.quick-tab-content');
        const firstButton = document.querySelector('.quick-tab-btn');
        
        if (firstTab) firstTab.style.display = "block";
        if (firstButton) firstButton.classList.add("active");
        
        // Store the default tab if nothing is stored
        if (firstTab) {
            localStorage.setItem('lastActiveQuickTab', firstTab.id);
        }
    }
});
</script>
