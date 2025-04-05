<h2>Insertion Sort Implementations</h2>
<div class="insertion-sort-implementations">
    <div class="insertion-sort-code-tabs">  <!-- Changed class name to be specific -->
        <div class="tab-buttons">
            <button class="insertion-tab-btn tab-btn active" onclick="openInsertionTab(event, 'insertion-cpp-tab')">C++</button>
            <button class="insertion-tab-btn tab-btn" onclick="openInsertionTab(event, 'insertion-python-tab')">Python</button>
            <button class="insertion-tab-btn tab-btn" onclick="openInsertionTab(event, 'insertion-java-tab')">Java</button>
            <button class="insertion-tab-btn tab-btn" onclick="openInsertionTab(event, 'insertion-js-tab')">JavaScript</button>
            <button class="insertion-tab-btn tab-btn" onclick="openInsertionTab(event, 'insertion-csharp-tab')">C#</button>
            <button class="insertion-tab-btn tab-btn" onclick="openInsertionTab(event, 'insertion-php-tab')">PHP</button>
        </div>

        <!-- C++ Tab -->
        <div id="insertion-cpp-tab" class="insertion-tab-content" style="display:block;">
            <div class="code-block">
                <pre><code class="language-cpp">#include &lt;iostream&gt;
#include &lt;vector&gt;
using namespace std;

<span class="code-keyword">void</span> insertionSort(vector&lt;<span class="code-type">int</span>&gt;& arr) {
    <span class="code-type">int</span> n = arr.size();
    
    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">1</span>; i &lt; n; i++) {
        <span class="code-type">int</span> key = arr[i];
        <span class="code-type">int</span> j = i - <span class="code-number">1</span>;
        
        <span class="code-comment">// Move elements of arr[0..i-1] that are greater than key</span>
        <span class="code-comment">// to one position ahead of their current position</span>
        <span class="code-keyword">while</span> (j >= <span class="code-number">0</span> && arr[j] > key) {
            arr[j + <span class="code-number">1</span>] = arr[j];
            j = j - <span class="code-number">1</span>;
        }
        arr[j + <span class="code-number">1</span>] = key;
    }
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">int</span>&gt; arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>};
    insertionSort(arr);
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
            </div>
        </div>

        <!-- Python Tab -->
        <div id="insertion-python-tab" class="insertion-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-python"><span class="code-keyword">def</span> <span class="code-function">insertion_sort</span>(arr):
    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(<span class="code-number">1</span>, <span class="code-function">len</span>(arr)):
        key = arr[i]
        j = i - <span class="code-number">1</span>
        
        <span class="code-comment"># Move elements of arr[0..i-1] that are greater than key</span>
        <span class="code-comment"># to one position ahead of their current position</span>
        <span class="code-keyword">while</span> j >= <span class="code-number">0</span> <span class="code-keyword">and</span> arr[j] > key:
            arr[j + <span class="code-number">1</span>] = arr[j]
            j -= <span class="code-number">1</span>
        arr[j + <span class="code-number">1</span>] = key

arr = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>]
insertion_sort(arr)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, arr)</code></pre>
            </div>
        </div>

        <!-- Java Tab -->
        <div id="insertion-java-tab" class="insertion-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-java"><span class="code-keyword">public class</span> <span class="code-class">InsertionSort</span> {
    <span class="code-keyword">public static void</span> <span class="code-function">insertionSort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> n = arr.length;
        
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">1</span>; i &lt; n; i++) {
            <span class="code-type">int</span> key = arr[i];
            <span class="code-type">int</span> j = i - <span class="code-number">1</span>;
            
            <span class="code-comment">// Move elements of arr[0..i-1] that are greater than key</span>
            <span class="code-comment">// to one position ahead of their current position</span>
            <span class="code-keyword">while</span> (j >= <span class="code-number">0</span> && arr[j] > key) {
                arr[j + <span class="code-number">1</span>] = arr[j];
                j = j - <span class="code-number">1</span>;
            }
            arr[j + <span class="code-number">1</span>] = key;
        }
    }

    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span>[] args) {
        <span class="code-type">int</span>[] arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>};
        insertionSort(arr);
        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) System.out.print(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- JavaScript Tab -->
        <div id="insertion-js-tab" class="insertion-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-javascript"><span class="code-keyword">function</span> <span class="code-function">insertionSort</span>(arr) {
    <span class="code-keyword">let</span> n = arr.length;
    
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">1</span>; i &lt; n; i++) {
        <span class="code-keyword">let</span> key = arr[i];
        <span class="code-keyword">let</span> j = i - <span class="code-number">1</span>;
        
        <span class="code-comment">// Move elements of arr[0..i-1] that are greater than key</span>
        <span class="code-comment">// to one position ahead of their current position</span>
        <span class="code-keyword">while</span> (j >= <span class="code-number">0</span> && arr[j] > key) {
            arr[j + <span class="code-number">1</span>] = arr[j];
            j = j - <span class="code-number">1</span>;
        }
        arr[j + <span class="code-number">1</span>] = key;
    }
}

<span class="code-keyword">let</span> arr = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>];
insertionSort(arr);
console.log(<span class="code-string">"Sorted array:"</span>, arr);</code></pre>
            </div>
        </div>

        <!-- C# Tab -->
        <div id="insertion-csharp-tab" class="insertion-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-csharp"><span class="code-keyword">using</span> System;

<span class="code-keyword">class</span> <span class="code-class">InsertionSort</span> {
    <span class="code-keyword">static void</span> <span class="code-function">Sort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> n = arr.Length;
        
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">1</span>; i &lt; n; i++) {
            <span class="code-type">int</span> key = arr[i];
            <span class="code-type">int</span> j = i - <span class="code-number">1</span>;
            
            <span class="code-comment">// Move elements of arr[0..i-1] that are greater than key</span>
            <span class="code-comment">// to one position ahead of their current position</span>
            <span class="code-keyword">while</span> (j >= <span class="code-number">0</span> && arr[j] > key) {
                arr[j + <span class="code-number">1</span>] = arr[j];
                j = j - <span class="code-number">1</span>;
            }
            arr[j + <span class="code-number">1</span>] = key;
        }
    }

    <span class="code-keyword">static void</span> <span class="code-function">Main</span>() {
        <span class="code-type">int</span>[] arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>};
        Sort(arr);
        Console.Write(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">foreach</span> (<span class="code-type">int</span> num <span class="code-keyword">in</span> arr) Console.Write(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- PHP Tab -->
        <div id="insertion-php-tab" class="insertion-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-php"><span class="code-keyword">&lt;?php</span>
<span class="code-keyword">function</span> <span class="code-function">insertionSort</span>(<span class="code-keyword">&</span>$arr) {
    $n = <span class="code-function">count</span>($arr);
    
    <span class="code-keyword">for</span> ($i = <span class="code-number">1</span>; $i &lt; $n; $i++) {
        $key = $arr[$i];
        $j = $i - <span class="code-number">1</span>;
        
        <span class="code-comment">// Move elements of arr[0..i-1] that are greater than key</span>
        <span class="code-comment">// to one position ahead of their current position</span>
        <span class="code-keyword">while</span> ($j >= <span class="code-number">0</span> && $arr[$j] > $key) {
            $arr[$j + <span class="code-number">1</span>] = $arr[$j];
            $j = $j - <span class="code-number">1</span>;
        }
        $arr[$j + <span class="code-number">1</span>] = $key;
    }
}

$arr = <span class="code-function">array</span>(<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>);
insertionSort($arr);
<span class="code-keyword">echo</span> <span class="code-string">"Sorted array: "</span> . <span class="code-function">implode</span>(<span class="code-string">" "</span>, $arr);
<span class="code-keyword">?&gt;</span></code></pre>
            </div>
        </div>
    </div>
</div>