<!-- Merge Sort -->
<h2>Merge Sort Implementations</h2>
<div class="merge-sort-implementations">
    <div class="merge-sort-code-tabs">
        <div class="tab-buttons">
            <button class="merge-tab-btn tab-btn active" onclick="openMergeTab(event, 'merge-cpp-tab')">C++</button>
            <button class="merge-tab-btn tab-btn" onclick="openMergeTab(event, 'merge-python-tab')">Python</button>
            <button class="merge-tab-btn tab-btn" onclick="openMergeTab(event, 'merge-java-tab')">Java</button>
            <button class="merge-tab-btn tab-btn" onclick="openMergeTab(event, 'merge-js-tab')">JavaScript</button>
        </div>

        <!-- C++ Tab -->
        <div id="merge-cpp-tab" class="merge-tab-content" style="display:block;">
            <div class="code-block">
                <pre><code class="language-cpp">#include &lt;iostream&gt;
#include &lt;vector&gt;
using namespace std;

<span class="code-keyword">void</span> merge(vector&lt;<span class="code-type">int</span>&gt;& arr, <span class="code-type">int</span> l, <span class="code-type">int</span> m, <span class="code-type">int</span> r) {
    <span class="code-type">int</span> n1 = m - l + <span class="code-number">1</span>;
    <span class="code-type">int</span> n2 = r - m;

    vector&lt;<span class="code-type">int</span>&gt; L(n1), R(n2);
    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n1; i++)
        L[i] = arr[l + i];
    <span class="code-keyword">for</span> (<span class="code-type">int</span> j = <span class="code-number">0</span>; j &lt; n2; j++)
        R[j] = arr[m + <span class="code-number">1</span> + j];

    <span class="code-type">int</span> i = <span class="code-number">0</span>, j = <span class="code-number">0</span>, k = l;
    <span class="code-keyword">while</span> (i &lt; n1 && j &lt; n2) {
        <span class="code-keyword">if</span> (L[i] &lt;= R[j]) {
            arr[k] = L[i];
            i++;
        } <span class="code-keyword">else</span> {
            arr[k] = R[j];
            j++;
        }
        k++;
    }

    <span class="code-keyword">while</span> (i &lt; n1) {
        arr[k] = L[i];
        i++;
        k++;
    }

    <span class="code-keyword">while</span> (j &lt; n2) {
        arr[k] = R[j];
        j++;
        k++;
    }
}

<span class="code-keyword">void</span> mergeSort(vector&lt;<span class="code-type">int</span>&gt;& arr, <span class="code-type">int</span> l, <span class="code-type">int</span> r) {
    <span class="code-keyword">if</span> (l &lt; r) {
        <span class="code-type">int</span> m = l + (r - l) / <span class="code-number">2</span>;
        mergeSort(arr, l, m);
        mergeSort(arr, m + <span class="code-number">1</span>, r);
        merge(arr, l, m, r);
    }
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">int</span>&gt; arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>};
    mergeSort(arr, <span class="code-number">0</span>, arr.size() - <span class="code-number">1</span>);
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
            </div>
        </div>

        <!-- Python Tab -->
        <div id="merge-python-tab" class="merge-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-python"><span class="code-keyword">def</span> <span class="code-function">merge_sort</span>(arr):
    <span class="code-keyword">if</span> <span class="code-function">len</span>(arr) > <span class="code-number">1</span>:
        mid = <span class="code-function">len</span>(arr) // <span class="code-number">2</span>
        L = arr[:mid]
        R = arr[mid:]

        merge_sort(L)
        merge_sort(R)

        i = j = k = <span class="code-number">0</span>

        <span class="code-keyword">while</span> i &lt; <span class="code-function">len</span>(L) <span class="code-keyword">and</span> j &lt; <span class="code-function">len</span>(R):
            <span class="code-keyword">if</span> L[i] &lt; R[j]:
                arr[k] = L[i]
                i += <span class="code-number">1</span>
            <span class="code-keyword">else</span>:
                arr[k] = R[j]
                j += <span class="code-number">1</span>
            k += <span class="code-number">1</span>

        <span class="code-keyword">while</span> i &lt; <span class="code-function">len</span>(L):
            arr[k] = L[i]
            i += <span class="code-number">1</span>
            k += <span class="code-number">1</span>

        <span class="code-keyword">while</span> j &lt; <span class="code-function">len</span>(R):
            arr[k] = R[j]
            j += <span class="code-number">1</span>
            k += <span class="code-number">1</span>

arr = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>]
merge_sort(arr)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, arr)</code></pre>
            </div>
        </div>

        <!-- Java Tab -->
        <div id="merge-java-tab" class="merge-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-java"><span class="code-keyword">public class</span> <span class="code-class">MergeSort</span> {
    <span class="code-keyword">void</span> <span class="code-function">merge</span>(<span class="code-type">int</span>[] arr, <span class="code-type">int</span> l, <span class="code-type">int</span> m, <span class="code-type">int</span> r) {
        <span class="code-type">int</span> n1 = m - l + <span class="code-number">1</span>;
        <span class="code-type">int</span> n2 = r - m;

        <span class="code-type">int</span>[] L = <span class="code-keyword">new</span> <span class="code-type">int</span>[n1];
        <span class="code-type">int</span>[] R = <span class="code-keyword">new</span> <span class="code-type">int</span>[n2];

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n1; ++i)
            L[i] = arr[l + i];
        <span class="code-keyword">for</span> (<span class="code-type">int</span> j = <span class="code-number">0</span>; j &lt; n2; ++j)
            R[j] = arr[m + <span class="code-number">1</span> + j];

        <span class="code-type">int</span> i = <span class="code-number">0</span>, j = <span class="code-number">0</span>;
        <span class="code-type">int</span> k = l;
        <span class="code-keyword">while</span> (i &lt; n1 && j &lt; n2) {
            <span class="code-keyword">if</span> (L[i] &lt;= R[j]) {
                arr[k] = L[i];
                i++;
            } <span class="code-keyword">else</span> {
                arr[k] = R[j];
                j++;
            }
            k++;
        }

        <span class="code-keyword">while</span> (i &lt; n1) {
            arr[k] = L[i];
            i++;
            k++;
        }

        <span class="code-keyword">while</span> (j &lt; n2) {
            arr[k] = R[j];
            j++;
            k++;
        }
    }

    <span class="code-keyword">void</span> <span class="code-function">sort</span>(<span class="code-type">int</span>[] arr, <span class="code-type">int</span> l, <span class="code-type">int</span> r) {
        <span class="code-keyword">if</span> (l &lt; r) {
            <span class="code-type">int</span> m = l + (r - l) / <span class="code-number">2</span>;
            sort(arr, l, m);
            sort(arr, m + <span class="code-number">1</span>, r);
            merge(arr, l, m, r);
        }
    }

    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span> args[]) {
        <span class="code-type">int</span>[] arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>};
        <span class="code-class">MergeSort</span> ob = <span class="code-keyword">new</span> <span class="code-class">MergeSort</span>();
        ob.sort(arr, <span class="code-number">0</span>, arr.length - <span class="code-number">1</span>);
        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) System.out.print(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- JavaScript Tab -->
        <div id="merge-js-tab" class="merge-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-javascript"><span class="code-keyword">function</span> <span class="code-function">merge</span>(arr, l, m, r) {
    <span class="code-keyword">let</span> n1 = m - l + <span class="code-number">1</span>;
    <span class="code-keyword">let</span> n2 = r - m;

    <span class="code-keyword">let</span> L = <span class="code-keyword">new</span> <span class="code-type">Array</span>(n1);
    <span class="code-keyword">let</span> R = <span class="code-keyword">new</span> <span class="code-type">Array</span>(n2);

    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; n1; i++)
        L[i] = arr[l + i];
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> j = <span class="code-number">0</span>; j &lt; n2; j++)
        R[j] = arr[m + <span class="code-number">1</span> + j];

    <span class="code-keyword">let</span> i = <span class="code-number">0</span>, j = <span class="code-number">0</span>, k = l;
    <span class="code-keyword">while</span> (i &lt; n1 && j &lt; n2) {
        <span class="code-keyword">if</span> (L[i] &lt;= R[j]) {
            arr[k] = L[i];
            i++;
        } <span class="code-keyword">else</span> {
            arr[k] = R[j];
            j++;
        }
        k++;
    }

    <span class="code-keyword">while</span> (i &lt; n1) {
        arr[k] = L[i];
        i++;
        k++;
    }

    <span class="code-keyword">while</span> (j &lt; n2) {
        arr[k] = R[j];
        j++;
        k++;
    }
}

<span class="code-keyword">function</span> <span class="code-function">mergeSort</span>(arr, l, r) {
    <span class="code-keyword">if</span> (l &lt; r) {
        <span class="code-keyword">let</span> m = l + Math.floor((r - l) / <span class="code-number">2</span>);
        mergeSort(arr, l, m);
        mergeSort(arr, m + <span class="code-number">1</span>, r);
        merge(arr, l, m, r);
    }
}

<span class="code-keyword">let</span> arr = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>];
mergeSort(arr, <span class="code-number">0</span>, arr.length - <span class="code-number">1</span>);
console.log(<span class="code-string">"Sorted array:"</span>, arr);</code></pre>
            </div>
        </div>
    </div>
</div>

<script>
function openMergeTab(evt, tabName) {
    // Prevent default behavior if it's a click event
    if (evt) {
        evt.preventDefault();
    }

    // Get all merge sort tab contents
    const tabContents = document.querySelectorAll('.merge-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });
    
    // Remove active class from all merge tab buttons
    const tabButtons = document.querySelectorAll('.merge-tab-btn');
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
    
    // Store the selected tab in localStorage with merge-specific key
    localStorage.setItem('lastActiveMergeTab', tabName);
}

// Load last active merge tab if available
document.addEventListener('DOMContentLoaded', function() {
    // First hide all merge tab contents
    const tabContents = document.querySelectorAll('.merge-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });

    // Remove active class from all buttons initially
    const tabButtons = document.querySelectorAll('.merge-tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove("active");
    });

    const lastActiveTab = localStorage.getItem('lastActiveMergeTab');
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
        const firstTab = document.querySelector('.merge-tab-content');
        const firstButton = document.querySelector('.merge-tab-btn');
        
        if (firstTab) firstTab.style.display = "block";
        if (firstButton) firstButton.classList.add("active");
        
        // Store the default tab if nothing is stored
        if (firstTab) {
            localStorage.setItem('lastActiveMergeTab', firstTab.id);
        }
    }
});
</script>