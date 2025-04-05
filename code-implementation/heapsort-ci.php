<h1>Sorting Algorithm Implementations</h1>

<h2>Heap Sort Implementations</h2>
<div class="code-tabs">
    <div class="tab-buttons">
        <button class="tab-btn active" onclick="openTab(event, 'heap-cpp-tab')">C++</button>
        <button class="tab-btn" onclick="openTab(event, 'heap-python-tab')">Python</button>
        <button class="tab-btn" onclick="openTab(event, 'heap-java-tab')">Java</button>
        <button class="tab-btn" onclick="openTab(event, 'heap-js-tab')">JavaScript</button>
    </div>

    <!-- C++ Tab -->
    <div id="heap-cpp-tab" class="tab-content" style="display:block;">
        <div class="code-block">
            <pre><code class="language-cpp">#include &lt;iostream&gt;
#include &lt;vector&gt;
using namespace std;

<span class="code-keyword">void</span> heapify(vector&lt;<span class="code-type">int</span>&gt;& arr, <span class="code-type">int</span> n, <span class="code-type">int</span> i) {
    <span class="code-type">int</span> largest = i;
    <span class="code-type">int</span> left = <span class="code-number">2</span> * i + <span class="code-number">1</span>;
    <span class="code-type">int</span> right = <span class="code-number">2</span> * i + <span class="code-number">2</span>;

    <span class="code-keyword">if</span> (left &lt; n && arr[left] > arr[largest])
        largest = left;

    <span class="code-keyword">if</span> (right &lt; n && arr[right] > arr[largest])
        largest = right;

    <span class="code-keyword">if</span> (largest != i) {
        swap(arr[i], arr[largest]);
        heapify(arr, n, largest);
    }
}

<span class="code-keyword">void</span> heapSort(vector&lt;<span class="code-type">int</span>&gt;& arr) {
    <span class="code-type">int</span> n = arr.size();

    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = n / <span class="code-number">2</span> - <span class="code-number">1</span>; i >= <span class="code-number">0</span>; i--)
        heapify(arr, n, i);

    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = n - <span class="code-number">1</span>; i > <span class="code-number">0</span>; i--) {
        swap(arr[<span class="code-number">0</span>], arr[i]);
        heapify(arr, i, <span class="code-number">0</span>);
    }
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">int</span>&gt; arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>};
    heapSort(arr);
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
        </div>
    </div>

    <!-- Python Tab -->
    <div id="heap-python-tab" class="tab-content">
        <div class="code-block">
            <pre><code class="language-python"><span class="code-keyword">def</span> <span class="code-function">heapify</span>(arr, n, i):
    largest = i
    left = <span class="code-number">2</span> * i + <span class="code-number">1</span>
    right = <span class="code-number">2</span> * i + <span class="code-number">2</span>

    <span class="code-keyword">if</span> left &lt; n <span class="code-keyword">and</span> arr[i] &lt; arr[left]:
        largest = left

    <span class="code-keyword">if</span> right &lt; n <span class="code-keyword">and</span> arr[largest] &lt; arr[right]:
        largest = right

    <span class="code-keyword">if</span> largest != i:
        arr[i], arr[largest] = arr[largest], arr[i]
        heapify(arr, n, largest)

<span class="code-keyword">def</span> <span class="code-function">heap_sort</span>(arr):
    n = <span class="code-function">len</span>(arr)

    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(n // <span class="code-number">2</span> - <span class="code-number">1</span>, -<span class="code-number">1</span>, -<span class="code-number">1</span>):
        heapify(arr, n, i)

    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(n-<span class="code-number">1</span>, <span class="code-number">0</span>, -<span class="code-number">1</span>):
        arr[i], arr[<span class="code-number">0</span>] = arr[<span class="code-number">0</span>], arr[i]
        heapify(arr, i, <span class="code-number">0</span>)

arr = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>]
heap_sort(arr)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, arr)</code></pre>
        </div>
    </div>

    <!-- Java Tab -->
    <div id="heap-java-tab" class="tab-content">
        <div class="code-block">
            <pre><code class="language-java"><span class="code-keyword">public class</span> <span class="code-class">HeapSort</span> {
    <span class="code-keyword">public void</span> <span class="code-function">sort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> n = arr.length;

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = n / <span class="code-number">2</span> - <span class="code-number">1</span>; i >= <span class="code-number">0</span>; i--)
            heapify(arr, n, i);

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = n - <span class="code-number">1</span>; i > <span class="code-number">0</span>; i--) {
            <span class="code-type">int</span> temp = arr[<span class="code-number">0</span>];
            arr[<span class="code-number">0</span>] = arr[i];
            arr[i] = temp;

            heapify(arr, i, <span class="code-number">0</span>);
        }
    }

    <span class="code-keyword">void</span> <span class="code-function">heapify</span>(<span class="code-type">int</span>[] arr, <span class="code-type">int</span> n, <span class="code-type">int</span> i) {
        <span class="code-type">int</span> largest = i;
        <span class="code-type">int</span> left = <span class="code-number">2</span> * i + <span class="code-number">1</span>;
        <span class="code-type">int</span> right = <span class="code-number">2</span> * i + <span class="code-number">2</span>;

        <span class="code-keyword">if</span> (left &lt; n && arr[left] > arr[largest])
            largest = left;

        <span class="code-keyword">if</span> (right &lt; n && arr[right] > arr[largest])
            largest = right;

        <span class="code-keyword">if</span> (largest != i) {
            <span class="code-type">int</span> swap = arr[i];
            arr[i] = arr[largest];
            arr[largest] = swap;

            heapify(arr, n, largest);
        }
    }

    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span> args[]) {
        <span class="code-type">int</span>[] arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>};
        <span class="code-class">HeapSort</span> ob = <span class="code-keyword">new</span> <span class="code-class">HeapSort</span>();
        ob.sort(arr);
        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) System.out.print(num + <span class="code-string">" "</span>);
    }
}</code></pre>
        </div>
    </div>

    <!-- JavaScript Tab -->
    <div id="heap-js-tab" class="tab-content">
        <div class="code-block">
            <pre><code class="language-javascript"><span class="code-keyword">function</span> <span class="code-function">heapify</span>(arr, n, i) {
    <span class="code-keyword">let</span> largest = i;
    <span class="code-keyword">let</span> left = <span class="code-number">2</span> * i + <span class="code-number">1</span>;
    <span class="code-keyword">let</span> right = <span class="code-number">2</span> * i + <span class="code-number">2</span>;

    <span class="code-keyword">if</span> (left &lt; n && arr[left] > arr[largest])
        largest = left;

    <span class="code-keyword">if</span> (right &lt; n && arr[right] > arr[largest])
        largest = right;

    <span class="code-keyword">if</span> (largest != i) {
        [arr[i], arr[largest]] = [arr[largest], arr[i]];
        heapify(arr, n, largest);
    }
}

<span class="code-keyword">function</span> <span class="code-function">heapSort</span>(arr) {
    <span class="code-keyword">let</span> n = arr.length;

    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = Math.floor(n / <span class="code-number">2</span>) - <span class="code-number">1</span>; i >= <span class="code-number">0</span>; i--)
        heapify(arr, n, i);

    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = n - <span class="code-number">1</span>; i > <span class="code-number">0</span>; i--) {
        [arr[<span class="code-number">0</span>], arr[i]] = [arr[i], arr[<span class="code-number">0</span>]];
        heapify(arr, i, <span class="code-number">0</span>);
    }
}

<span class="code-keyword">let</span> arr = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>];
heapSort(arr);
console.log(<span class="code-string">"Sorted array:"</span>, arr);</code></pre>
        </div>
    </div>
</div>





