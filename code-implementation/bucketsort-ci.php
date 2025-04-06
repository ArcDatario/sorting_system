<!-- Bucket Sort -->
<h2>Bucket Sort Implementations</h2>
<div class="bucket-sort-implementations">
    <div class="bucket-sort-code-tabs">
        <div class="tab-buttons">
            <button class="bucket-tab-btn tab-btn active" onclick="openBucketTab(event, 'bucket-cpp-tab')">C++</button>
            <button class="bucket-tab-btn tab-btn" onclick="openBucketTab(event, 'bucket-python-tab')">Python</button>
            <button class="bucket-tab-btn tab-btn" onclick="openBucketTab(event, 'bucket-java-tab')">Java</button>
            <button class="bucket-tab-btn tab-btn" onclick="openBucketTab(event, 'bucket-js-tab')">JavaScript</button>
            <button class="bucket-tab-btn tab-btn" onclick="openBucketTab(event, 'bucket-csharp-tab')">C#</button>
            <button class="bucket-tab-btn tab-btn" onclick="openBucketTab(event, 'bucket-php-tab')">PHP</button>
        </div>

        <!-- C++ Tab -->
        <div id="bucket-cpp-tab" class="bucket-tab-content" style="display:block;">
            <div class="code-block">
                <pre><code class="language-cpp">#include &lt;iostream&gt;
#include &lt;vector&gt;
#include &lt;algorithm&gt;
using namespace std;

<span class="code-keyword">void</span> bucketSort(vector&lt;<span class="code-type">float</span>&gt;& arr) {
    <span class="code-type">int</span> n = arr.size();
    
    <span class="code-comment">// 1) Create n empty buckets</span>
    vector&lt;vector&lt;<span class="code-type">float</span>&gt;&gt; buckets(n);
    
    <span class="code-comment">// 2) Put array elements in different buckets</span>
    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
        <span class="code-type">int</span> bucketIndex = n * arr[i]; <span class="code-comment">// Index in bucket</span>
        buckets[bucketIndex].push_back(arr[i]);
    }
    
    <span class="code-comment">// 3) Sort individual buckets</span>
    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++)
        sort(buckets[i].begin(), buckets[i].end());
    
    <span class="code-comment">// 4) Concatenate all buckets into arr[]</span>
    <span class="code-type">int</span> index = <span class="code-number">0</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++)
        <span class="code-keyword">for</span> (<span class="code-type">int</span> j = <span class="code-number">0</span>; j &lt; buckets[i].size(); j++)
            arr[index++] = buckets[i][j];
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">float</span>&gt; arr = {<span class="code-number">0.897</span>, <span class="code-number">0.565</span>, <span class="code-number">0.656</span>, <span class="code-number">0.1234</span>, <span class="code-number">0.665</span>, <span class="code-number">0.3434</span>};
    bucketSort(arr);
    
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">float</span> num : arr)
        cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
            </div>
        </div>

        <!-- Python Tab -->
        <div id="bucket-python-tab" class="bucket-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-python"><span class="code-keyword">def</span> <span class="code-function">bucket_sort</span>(arr):
    <span class="code-comment"># Create empty buckets</span>
    n = <span class="code-function">len</span>(arr)
    buckets = [[] <span class="code-keyword">for</span> _ <span class="code-keyword">in</span> <span class="code-function">range</span>(n)]
    
    <span class="code-comment"># Put array elements in different buckets</span>
    <span class="code-keyword">for</span> num <span class="code-keyword">in</span> arr:
        bucket_index = <span class="code-function">int</span>(n * num)
        buckets[bucket_index].append(num)
    
    <span class="code-comment"># Sort individual buckets</span>
    <span class="code-keyword">for</span> bucket <span class="code-keyword">in</span> buckets:
        bucket.<span class="code-function">sort</span>()
    
    <span class="code-comment"># Concatenate all buckets into arr</span>
    index = <span class="code-number">0</span>
    <span class="code-keyword">for</span> bucket <span class="code-keyword">in</span> buckets:
        <span class="code-keyword">for</span> num <span class="code-keyword">in</span> bucket:
            arr[index] = num
            index += <span class="code-number">1</span>

arr = [<span class="code-number">0.897</span>, <span class="code-number">0.565</span>, <span class="code-number">0.656</span>, <span class="code-number">0.1234</span>, <span class="code-number">0.665</span>, <span class="code-number">0.3434</span>]
bucket_sort(arr)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, arr)</code></pre>
            </div>
        </div>

        <!-- Java Tab -->
        <div id="bucket-java-tab" class="bucket-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-java"><span class="code-keyword">import</span> java.util.*;

<span class="code-keyword">public class</span> <span class="code-class">BucketSort</span> {
    <span class="code-keyword">static void</span> <span class="code-function">bucketSort</span>(<span class="code-type">float</span>[] arr) {
        <span class="code-type">int</span> n = arr.length;
        
        <span class="code-comment">// Create n empty buckets</span>
        <span class="code-type">ArrayList</span>&lt;<span class="code-type">ArrayList</span>&lt;<span class="code-type">Float</span>&gt;&gt; buckets = <span class="code-keyword">new</span> <span class="code-type">ArrayList</span>&lt;&gt;(n);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++)
            buckets.add(<span class="code-keyword">new</span> <span class="code-type">ArrayList</span>&lt;&gt;());
        
        <span class="code-comment">// Put array elements in different buckets</span>
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
            <span class="code-type">int</span> bucketIndex = (<span class="code-type">int</span>) (n * arr[i]);
            buckets.get(bucketIndex).add(arr[i]);
        }
        
        <span class="code-comment">// Sort individual buckets</span>
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++)
            Collections.sort(buckets.get(i));
        
        <span class="code-comment">// Concatenate all buckets into arr[]</span>
        <span class="code-type">int</span> index = <span class="code-number">0</span>;
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++)
            <span class="code-keyword">for</span> (<span class="code-type">int</span> j = <span class="code-number">0</span>; j &lt; buckets.get(i).size(); j++)
                arr[index++] = buckets.get(i).get(j);
    }
    
    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span>[] args) {
        <span class="code-type">float</span>[] arr = {<span class="code-number">0.897f</span>, <span class="code-number">0.565f</span>, <span class="code-number">0.656f</span>, <span class="code-number">0.1234f</span>, <span class="code-number">0.665f</span>, <span class="code-number">0.3434f</span>};
        bucketSort(arr);
        
        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">float</span> num : arr)
            System.out.print(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- JavaScript Tab -->
        <div id="bucket-js-tab" class="bucket-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-javascript"><span class="code-keyword">function</span> <span class="code-function">bucketSort</span>(arr) {
    <span class="code-keyword">let</span> n = arr.length;
    
    <span class="code-comment">// Create n empty buckets</span>
    <span class="code-keyword">let</span> buckets = <span class="code-keyword">new</span> <span class="code-type">Array</span>(n);
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
        buckets[i] = [];
    }
    
    <span class="code-comment">// Put array elements in different buckets</span>
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
        <span class="code-keyword">let</span> bucketIndex = Math.floor(n * arr[i]);
        buckets[bucketIndex].push(arr[i]);
    }
    
    <span class="code-comment">// Sort individual buckets</span>
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
        buckets[i].sort((a, b) => a - b);
    }
    
    <span class="code-comment">// Concatenate all buckets into arr[]</span>
    <span class="code-keyword">let</span> index = <span class="code-number">0</span>;
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
        <span class="code-keyword">for</span> (<span class="code-keyword">let</span> j = <span class="code-number">0</span>; j &lt; buckets[i].length; j++) {
            arr[index++] = buckets[i][j];
        }
    }
}

<span class="code-keyword">let</span> arr = [<span class="code-number">0.897</span>, <span class="code-number">0.565</span>, <span class="code-number">0.656</span>, <span class="code-number">0.1234</span>, <span class="code-number">0.665</span>, <span class="code-number">0.3434</span>];
bucketSort(arr);
console.log(<span class="code-string">"Sorted array:"</span>, arr);</code></pre>
            </div>
        </div>

        <!-- C# Tab -->
        <div id="bucket-csharp-tab" class="bucket-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-csharp"><span class="code-keyword">using</span> System;
<span class="code-keyword">using</span> System.Collections.Generic;
<span class="code-keyword">using</span> System.Linq;

<span class="code-keyword">class</span> <span class="code-class">BucketSort</span> {
    <span class="code-keyword">static void</span> <span class="code-function">Sort</span>(<span class="code-type">float</span>[] arr) {
        <span class="code-type">int</span> n = arr.Length;
        
        <span class="code-comment">// Create n empty buckets</span>
        <span class="code-type">List</span>&lt;<span class="code-type">float</span>&gt;[] buckets = <span class="code-keyword">new</span> <span class="code-type">List</span>&lt;<span class="code-type">float</span>&gt;[n];
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++)
            buckets[i] = <span class="code-keyword">new</span> <span class="code-type">List</span>&lt;<span class="code-type">float</span>&gt;();
        
        <span class="code-comment">// Put array elements in different buckets</span>
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
            <span class="code-type">int</span> bucketIndex = (<span class="code-type">int</span>) (n * arr[i]);
            buckets[bucketIndex].Add(arr[i]);
        }
        
        <span class="code-comment">// Sort individual buckets</span>
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++)
            buckets[i].Sort();
        
        <span class="code-comment">// Concatenate all buckets into arr[]</span>
        <span class="code-type">int</span> index = <span class="code-number">0</span>;
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++)
            <span class="code-keyword">for</span> (<span class="code-type">int</span> j = <span class="code-number">0</span>; j &lt; buckets[i].Count; j++)
                arr[index++] = buckets[i][j];
    }
    
    <span class="code-keyword">static void</span> <span class="code-function">Main</span>() {
        <span class="code-type">float</span>[] arr = {<span class="code-number">0.897f</span>, <span class="code-number">0.565f</span>, <span class="code-number">0.656f</span>, <span class="code-number">0.1234f</span>, <span class="code-number">0.665f</span>, <span class="code-number">0.3434f</span>};
        Sort(arr);
        
        Console.Write(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">foreach</span> (<span class="code-type">float</span> num <span class="code-keyword">in</span> arr)
            Console.Write(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- PHP Tab -->
        <div id="bucket-php-tab" class="bucket-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-php"><span class="code-keyword">function</span> <span class="code-function">bucketSort</span>(&<span class="code-variable">$arr</span>) {
    <span class="code-variable">$n</span> = <span class="code-function">count</span>(<span class="code-variable">$arr</span>);
    
    <span class="code-comment">// Create n empty buckets</span>
    <span class="code-variable">$buckets</span> = <span class="code-function">array_fill</span>(<span class="code-number">0</span>, <span class="code-variable">$n</span>, <span class="code-keyword">array</span>());
    
    <span class="code-comment">// Put array elements in different buckets</span>
    <span class="code-keyword">foreach</span> (<span class="code-variable">$arr</span> <span class="code-keyword">as</span> <span class="code-variable">$num</span>) {
        <span class="code-variable">$bucketIndex</span> = <span class="code-function">floor</span>(<span class="code-variable">$n</span> * <span class="code-variable">$num</span>);
        <span class="code-function">array_push</span>(<span class="code-variable">$buckets</span>[<span class="code-variable">$bucketIndex</span>], <span class="code-variable">$num</span>);
    }
    
    <span class="code-comment">// Sort individual buckets</span>
    <span class="code-keyword">for</span> (<span class="code-variable">$i</span> = <span class="code-number">0</span>; <span class="code-variable">$i</span> &lt; <span class="code-variable">$n</span>; <span class="code-variable">$i</span>++) {
        <span class="code-function">sort</span>(<span class="code-variable">$buckets</span>[<span class="code-variable">$i</span>]);
    }
    
    <span class="code-comment">// Concatenate all buckets into arr[]</span>
    <span class="code-variable">$index</span> = <span class="code-number">0</span>;
    <span class="code-keyword">for</span> (<span class="code-variable">$i</span> = <span class="code-number">0</span>; <span class="code-variable">$i</span> &lt; <span class="code-variable">$n</span>; <span class="code-variable">$i</span>++) {
        <span class="code-keyword">foreach</span> (<span class="code-variable">$buckets</span>[<span class="code-variable">$i</span>] <span class="code-keyword">as</span> <span class="code-variable">$num</span>) {
            <span class="code-variable">$arr</span>[<span class="code-variable">$index</span>++] = <span class="code-variable">$num</span>;
        }
    }
}

<span class="code-variable">$arr</span> = [<span class="code-number">0.897</span>, <span class="code-number">0.565</span>, <span class="code-number">0.656</span>, <span class="code-number">0.1234</span>, <span class="code-number">0.665</span>, <span class="code-number">0.3434</span>];
bucketSort(<span class="code-variable">$arr</span>);
echo <span class="code-string">"Sorted array: "</span> . <span class="code-function">implode</span>(<span class="code-string">" "</span>, <span class="code-variable">$arr</span>);</code></pre>
            </div>
        </div>
    </div>
</div>

<script>
function openBucketTab(evt, tabName) {
    // Prevent default behavior if it's a click event
    if (evt) {
        evt.preventDefault();
    }

    // Get all bucket sort tab contents
    const tabContents = document.querySelectorAll('.bucket-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });
    
    // Remove active class from all bucket tab buttons
    const tabButtons = document.querySelectorAll('.bucket-tab-btn');
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
    
    // Store the selected tab in localStorage with bucket-specific key
    localStorage.setItem('lastActiveBucketTab', tabName);
}

// Load last active bucket tab if available
document.addEventListener('DOMContentLoaded', function() {
    // First hide all bucket tab contents
    const tabContents = document.querySelectorAll('.bucket-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });

    // Remove active class from all buttons initially
    const tabButtons = document.querySelectorAll('.bucket-tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove("active");
    });

    const lastActiveTab = localStorage.getItem('lastActiveBucketTab');
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
        const firstTab = document.querySelector('.bucket-tab-content');
        const firstButton = document.querySelector('.bucket-tab-btn');
        
        if (firstTab) firstTab.style.display = "block";
        if (firstButton) firstButton.classList.add("active");
        
        // Store the default tab if nothing is stored
        if (firstTab) {
            localStorage.setItem('lastActiveBucketTab', firstTab.id);
        }
    }
});
</script>