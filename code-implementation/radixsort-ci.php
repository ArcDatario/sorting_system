<!-- Radix Sort -->
<h2>Radix Sort Implementations</h2>
<div class="radix-sort-implementations">
    <div class="radix-sort-code-tabs">
        <div class="tab-buttons">
            <button class="radix-tab-btn tab-btn active" onclick="openRadixTab(event, 'radix-cpp-tab')">C++</button>
            <button class="radix-tab-btn tab-btn" onclick="openRadixTab(event, 'radix-python-tab')">Python</button>
            <button class="radix-tab-btn tab-btn" onclick="openRadixTab(event, 'radix-java-tab')">Java</button>
            <button class="radix-tab-btn tab-btn" onclick="openRadixTab(event, 'radix-js-tab')">JavaScript</button>
            <button class="radix-tab-btn tab-btn" onclick="openRadixTab(event, 'radix-csharp-tab')">C#</button>
            <button class="radix-tab-btn tab-btn" onclick="openRadixTab(event, 'radix-php-tab')">PHP</button>
        </div>

        <!-- C++ Tab -->
        <div id="radix-cpp-tab" class="radix-tab-content" style="display:block;">
            <div class="code-block">
                <pre><code class="language-cpp">#include &lt;iostream&gt;
#include &lt;vector&gt;
#include &lt;algorithm&gt;
using namespace std;

<span class="code-keyword">int</span> getMax(vector&lt;<span class="code-type">int</span>&gt;& arr) {
    <span class="code-keyword">return</span> *max_element(arr.begin(), arr.end());
}

<span class="code-keyword">void</span> countSort(vector&lt;<span class="code-type">int</span>&gt;& arr, <span class="code-type">int</span> exp) {
    <span class="code-type">int</span> n = arr.size();
    vector&lt;<span class="code-type">int</span>&gt; output(n);
    <span class="code-type">int</span> count[10] = {0};

    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = 0; i &lt; n; i++)
        count[(arr[i] / exp) % 10]++;

    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = 1; i &lt; 10; i++)
        count[i] += count[i - 1];

    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = n - 1; i &gt;= 0; i--) {
        output[count[(arr[i] / exp) % 10] - 1] = arr[i];
        count[(arr[i] / exp) % 10]--;
    }

    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = 0; i &lt; n; i++)
        arr[i] = output[i];
}

<span class="code-keyword">void</span> radixSort(vector&lt;<span class="code-type">int</span>&gt;& arr) {
    <span class="code-type">int</span> m = getMax(arr);

    <span class="code-keyword">for</span> (<span class="code-type">int</span> exp = 1; m / exp &gt; 0; exp *= 10)
        countSort(arr, exp);
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">int</span>&gt; arr = {170, 45, 75, 90, 802, 24, 2, 66};
    radixSort(arr);
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
            </div>
        </div>

        <!-- Python Tab -->
        <div id="radix-python-tab" class="radix-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-python"><span class="code-keyword">def</span> <span class="code-function">counting_sort</span>(arr, exp):
    n = <span class="code-function">len</span>(arr)
    output = [<span class="code-number">0</span>] * n
    count = [<span class="code-number">0</span>] * <span class="code-number">10</span>
    
    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(n):
        index = (arr[i] // exp) % <span class="code-number">10</span>
        count[index] += <span class="code-number">1</span>
    
    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(<span class="code-number">1</span>, <span class="code-number">10</span>):
        count[i] += count[i - <span class="code-number">1</span>]
    
    i = n - <span class="code-number">1</span>
    <span class="code-keyword">while</span> i >= <span class="code-number">0</span>:
        index = (arr[i] // exp) % <span class="code-number">10</span>
        output[count[index] - <span class="code-number">1</span>] = arr[i]
        count[index] -= <span class="code-number">1</span>
        i -= <span class="code-number">1</span>
    
    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(n):
        arr[i] = output[i]

<span class="code-keyword">def</span> <span class="code-function">radix_sort</span>(arr):
    max_num = <span class="code-function">max</span>(arr)
    exp = <span class="code-number">1</span>
    <span class="code-keyword">while</span> max_num // exp > <span class="code-number">0</span>:
        counting_sort(arr, exp)
        exp *= <span class="code-number">10</span>

arr = [<span class="code-number">170</span>, <span class="code-number">45</span>, <span class="code-number">75</span>, <span class="code-number">90</span>, <span class="code-number">802</span>, <span class="code-number">24</span>, <span class="code-number">2</span>, <span class="code-number">66</span>]
radix_sort(arr)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, arr)</code></pre>
            </div>
        </div>

        <!-- Java Tab -->
        <div id="radix-java-tab" class="radix-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-java"><span class="code-keyword">public class</span> <span class="code-class">RadixSort</span> {
    <span class="code-keyword">static int</span> <span class="code-function">getMax</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> max = arr[<span class="code-number">0</span>];
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) {
            <span class="code-keyword">if</span> (num > max) {
                max = num;
            }
        }
        <span class="code-keyword">return</span> max;
    }

    <span class="code-keyword">static void</span> <span class="code-function">countSort</span>(<span class="code-type">int</span>[] arr, <span class="code-type">int</span> exp) {
        <span class="code-type">int</span> n = arr.length;
        <span class="code-type">int</span>[] output = <span class="code-keyword">new</span> <span class="code-type">int</span>[n];
        <span class="code-type">int</span>[] count = <span class="code-keyword">new</span> <span class="code-type">int</span>[<span class="code-number">10</span>];

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
            count[(arr[i] / exp) % <span class="code-number">10</span>]++;
        }

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">1</span>; i &lt; <span class="code-number">10</span>; i++) {
            count[i] += count[i - <span class="code-number">1</span>];
        }

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = n - <span class="code-number">1</span>; i >= <span class="code-number">0</span>; i--) {
            output[count[(arr[i] / exp) % <span class="code-number">10</span>] - <span class="code-number">1</span>] = arr[i];
            count[(arr[i] / exp) % <span class="code-number">10</span>]--;
        }

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
            arr[i] = output[i];
        }
    }

    <span class="code-keyword">static void</span> <span class="code-function">radixSort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> m = getMax(arr);

        <span class="code-keyword">for</span> (<span class="code-type">int</span> exp = <span class="code-number">1</span>; m / exp > <span class="code-number">0</span>; exp *= <span class="code-number">10</span>) {
            countSort(arr, exp);
        }
    }

    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span>[] args) {
        <span class="code-type">int</span>[] arr = {<span class="code-number">170</span>, <span class="code-number">45</span>, <span class="code-number">75</span>, <span class="code-number">90</span>, <span class="code-number">802</span>, <span class="code-number">24</span>, <span class="code-number">2</span>, <span class="code-number">66</span>};
        radixSort(arr);
        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) {
            System.out.print(num + <span class="code-string">" "</span>);
        }
    }
}</code></pre>
            </div>
        </div>

        <!-- JavaScript Tab -->
        <div id="radix-js-tab" class="radix-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-javascript"><span class="code-keyword">function</span> <span class="code-function">getMax</span>(arr) {
    <span class="code-keyword">let</span> max = arr[<span class="code-number">0</span>];
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> num <span class="code-keyword">of</span> arr) {
        <span class="code-keyword">if</span> (num > max) {
            max = num;
        }
    }
    <span class="code-keyword">return</span> max;
}

<span class="code-keyword">function</span> <span class="code-function">countSort</span>(arr, exp) {
    <span class="code-keyword">let</span> n = arr.length;
    <span class="code-keyword">let</span> output = <span class="code-keyword">new</span> <span class="code-type">Array</span>(n).fill(<span class="code-number">0</span>);
    <span class="code-keyword">let</span> count = <span class="code-keyword">new</span> <span class="code-type">Array</span>(<span class="code-number">10</span>).fill(<span class="code-number">0</span>);

    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
        <span class="code-keyword">let</span> index = Math.floor(arr[i] / exp) % <span class="code-number">10</span>;
        count[index]++;
    }

    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">1</span>; i &lt; <span class="code-number">10</span>; i++) {
        count[i] += count[i - <span class="code-number">1</span>];
    }

    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = n - <span class="code-number">1</span>; i >= <span class="code-number">0</span>; i--) {
        <span class="code-keyword">let</span> index = Math.floor(arr[i] / exp) % <span class="code-number">10</span>;
        output[count[index] - <span class="code-number">1</span>] = arr[i];
        count[index]--;
    }

    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
        arr[i] = output[i];
    }
}

<span class="code-keyword">function</span> <span class="code-function">radixSort</span>(arr) {
    <span class="code-keyword">let</span> max = getMax(arr);

    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> exp = <span class="code-number">1</span>; Math.floor(max / exp) > <span class="code-number">0</span>; exp *= <span class="code-number">10</span>) {
        countSort(arr, exp);
    }
}

<span class="code-keyword">let</span> arr = [<span class="code-number">170</span>, <span class="code-number">45</span>, <span class="code-number">75</span>, <span class="code-number">90</span>, <span class="code-number">802</span>, <span class="code-number">24</span>, <span class="code-number">2</span>, <span class="code-number">66</span>];
radixSort(arr);
console.log(<span class="code-string">"Sorted array:"</span>, arr);</code></pre>
            </div>
        </div>

        <!-- C# Tab -->
        <div id="radix-csharp-tab" class="radix-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-csharp"><span class="code-keyword">using</span> System;

<span class="code-keyword">class</span> <span class="code-class">RadixSort</span> {
    <span class="code-keyword">static int</span> <span class="code-function">GetMax</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> max = arr[<span class="code-number">0</span>];
        <span class="code-keyword">foreach</span> (<span class="code-type">int</span> num <span class="code-keyword">in</span> arr) {
            <span class="code-keyword">if</span> (num > max) {
                max = num;
            }
        }
        <span class="code-keyword">return</span> max;
    }

    <span class="code-keyword">static void</span> <span class="code-function">CountSort</span>(<span class="code-type">int</span>[] arr, <span class="code-type">int</span> exp) {
        <span class="code-type">int</span> n = arr.Length;
        <span class="code-type">int</span>[] output = <span class="code-keyword">new</span> <span class="code-type">int</span>[n];
        <span class="code-type">int</span>[] count = <span class="code-keyword">new</span> <span class="code-type">int</span>[<span class="code-number">10</span>];

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
            count[(arr[i] / exp) % <span class="code-number">10</span>]++;
        }

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">1</span>; i &lt; <span class="code-number">10</span>; i++) {
            count[i] += count[i - <span class="code-number">1</span>];
        }

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = n - <span class="code-number">1</span>; i >= <span class="code-number">0</span>; i--) {
            output[count[(arr[i] / exp) % <span class="code-number">10</span>] - <span class="code-number">1</span>] = arr[i];
            count[(arr[i] / exp) % <span class="code-number">10</span>]--;
        }

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n; i++) {
            arr[i] = output[i];
        }
    }

    <span class="code-keyword">static void</span> <span class="code-function">Sort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> m = GetMax(arr);

        <span class="code-keyword">for</span> (<span class="code-type">int</span> exp = <span class="code-number">1</span>; m / exp > <span class="code-number">0</span>; exp *= <span class="code-number">10</span>) {
            CountSort(arr, exp);
        }
    }

    <span class="code-keyword">static void</span> <span class="code-function">Main</span>() {
        <span class="code-type">int</span>[] arr = {<span class="code-number">170</span>, <span class="code-number">45</span>, <span class="code-number">75</span>, <span class="code-number">90</span>, <span class="code-number">802</span>, <span class="code-number">24</span>, <span class="code-number">2</span>, <span class="code-number">66</span>};
        Sort(arr);
        Console.Write(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">foreach</span> (<span class="code-type">int</span> num <span class="code-keyword">in</span> arr) {
            Console.Write(num + <span class="code-string">" "</span>);
        }
    }
}</code></pre>
            </div>
        </div>

        <!-- PHP Tab -->
        <div id="radix-php-tab" class="radix-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-php"><span class="code-keyword">function</span> <span class="code-function">getMax</span>(<span class="code-variable">$arr</span>) {
    <span class="code-variable">$max</span> = <span class="code-variable">$arr</span>[<span class="code-number">0</span>];
    <span class="code-keyword">foreach</span> (<span class="code-variable">$arr</span> <span class="code-keyword">as</span> <span class="code-variable">$num</span>) {
        <span class="code-keyword">if</span> (<span class="code-variable">$num</span> > <span class="code-variable">$max</span>) {
            <span class="code-variable">$max</span> = <span class="code-variable">$num</span>;
        }
    }
    <span class="code-keyword">return</span> <span class="code-variable">$max</span>;
}

<span class="code-keyword">function</span> <span class="code-function">countSort</span>(&<span class="code-variable">$arr</span>, <span class="code-variable">$exp</span>) {
    <span class="code-variable">$n</span> = <span class="code-function">count</span>(<span class="code-variable">$arr</span>);
    <span class="code-variable">$output</span> = <span class="code-function">array_fill</span>(<span class="code-number">0</span>, <span class="code-variable">$n</span>, <span class="code-number">0</span>);
    <span class="code-variable">$count</span> = <span class="code-function">array_fill</span>(<span class="code-number">0</span>, <span class="code-number">10</span>, <span class="code-number">0</span>);

    <span class="code-keyword">for</span> (<span class="code-variable">$i</span> = <span class="code-number">0</span>; <span class="code-variable">$i</span> &lt; <span class="code-variable">$n</span>; <span class="code-variable">$i</span>++) {
        <span class="code-variable">$index</span> = (<span class="code-function">int</span>)(<span class="code-variable">$arr</span>[<span class="code-variable">$i</span>] / <span class="code-variable">$exp</span>) % <span class="code-number">10</span>;
        <span class="code-variable">$count</span>[<span class="code-variable">$index</span>]++;
    }

    <span class="code-keyword">for</span> (<span class="code-variable">$i</span> = <span class="code-number">1</span>; <span class="code-variable">$i</span> &lt; <span class="code-number">10</span>; <span class="code-variable">$i</span>++) {
        <span class="code-variable">$count</span>[<span class="code-variable">$i</span>] += <span class="code-variable">$count</span>[<span class="code-variable">$i</span> - <span class="code-number">1</span>];
    }

    <span class="code-keyword">for</span> (<span class="code-variable">$i</span> = <span class="code-variable">$n</span> - <span class="code-number">1</span>; <span class="code-variable">$i</span> >= <span class="code-number">0</span>; <span class="code-variable">$i</span>--) {
        <span class="code-variable">$index</span> = (<span class="code-function">int</span>)(<span class="code-variable">$arr</span>[<span class="code-variable">$i</span>] / <span class="code-variable">$exp</span>) % <span class="code-number">10</span>;
        <span class="code-variable">$output</span>[<span class="code-variable">$count</span>[<span class="code-variable">$index</span>] - <span class="code-number">1</span>] = <span class="code-variable">$arr</span>[<span class="code-variable">$i</span>];
        <span class="code-variable">$count</span>[<span class="code-variable">$index</span>]--;
    }

    <span class="code-keyword">for</span> (<span class="code-variable">$i</span> = <span class="code-number">0</span>; <span class="code-variable">$i</span> &lt; <span class="code-variable">$n</span>; <span class="code-variable">$i</span>++) {
        <span class="code-variable">$arr</span>[<span class="code-variable">$i</span>] = <span class="code-variable">$output</span>[<span class="code-variable">$i</span>];
    }
}

<span class="code-keyword">function</span> <span class="code-function">radixSort</span>(&<span class="code-variable">$arr</span>) {
    <span class="code-variable">$m</span> = getMax(<span class="code-variable">$arr</span>);

    <span class="code-keyword">for</span> (<span class="code-variable">$exp</span> = <span class="code-number">1</span>; <span class="code-variable">$m</span> / <span class="code-variable">$exp</span> > <span class="code-number">0</span>; <span class="code-variable">$exp</span> *= <span class="code-number">10</span>) {
        countSort(<span class="code-variable">$arr</span>, <span class="code-variable">$exp</span>);
    }
}

<span class="code-variable">$arr</span> = [<span class="code-number">170</span>, <span class="code-number">45</span>, <span class="code-number">75</span>, <span class="code-number">90</span>, <span class="code-number">802</span>, <span class="code-number">24</span>, <span class="code-number">2</span>, <span class="code-number">66</span>];
radixSort(<span class="code-variable">$arr</span>);
echo <span class="code-string">"Sorted array: "</span> . <span class="code-function">implode</span>(<span class="code-string">" "</span>, <span class="code-variable">$arr</span>);</code></pre>
            </div>
        </div>
    </div>
</div>

<script>
function openRadixTab(evt, tabName) {
    // Prevent default behavior if it's a click event
    if (evt) {
        evt.preventDefault();
    }

    // Get all radix sort tab contents
    const tabContents = document.querySelectorAll('.radix-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });
    
    // Remove active class from all radix tab buttons
    const tabButtons = document.querySelectorAll('.radix-tab-btn');
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
    
    // Store the selected tab in localStorage with radix-specific key
    localStorage.setItem('lastActiveRadixTab', tabName);
}

// Load last active radix tab if available
document.addEventListener('DOMContentLoaded', function() {
    // First hide all radix tab contents
    const tabContents = document.querySelectorAll('.radix-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });

    // Remove active class from all buttons initially
    const tabButtons = document.querySelectorAll('.radix-tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove("active");
    });

    const lastActiveTab = localStorage.getItem('lastActiveRadixTab');
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
        const firstTab = document.querySelector('.radix-tab-content');
        const firstButton = document.querySelector('.radix-tab-btn');
        
        if (firstTab) firstTab.style.display = "block";
        if (firstButton) firstButton.classList.add("active");
        
        // Store the default tab if nothing is stored
        if (firstTab) {
            localStorage.setItem('lastActiveRadixTab', firstTab.id);
        }
    }
});
</script>