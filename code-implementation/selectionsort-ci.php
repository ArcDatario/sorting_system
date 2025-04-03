<h2>Selection Sort Implementations</h2>
<div class="code-tabs">
    <div class="tab-buttons">
        <button class="tab-btn active" onclick="openTab(event, 'cpp-tab')">C++</button>
        <button class="tab-btn" onclick="openTab(event, 'python-tab')">Python</button>
        <button class="tab-btn" onclick="openTab(event, 'java-tab')">Java</button>
        <button class="tab-btn" onclick="openTab(event, 'js-tab')">JavaScript</button>
        <button class="tab-btn" onclick="openTab(event, 'csharp-tab')">C#</button>
        <button class="tab-btn" onclick="openTab(event, 'php-tab')">PHP</button>
    </div>

    <!-- C++ Tab -->
    <div id="cpp-tab" class="tab-content" style="display:block;">
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
        
        <span class="code-comment">// Swap the found minimum element with the first element</span>
        swap(arr[i], arr[min_idx]);
    }
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">int</span>&gt; arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>};
    selectionSort(arr);
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
        </div>
    </div>

    <!-- Python Tab -->
    <div id="python-tab" class="tab-content">
        <div class="code-block">
            <pre><code class="language-python"><span class="code-keyword">def</span> <span class="code-function">selection_sort</span>(arr):
    n = <span class="code-function">len</span>(arr)
    
    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(n-<span class="code-number">1</span>):
        min_idx = i
        
        <span class="code-keyword">for</span> j <span class="code-keyword">in</span> <span class="code-function">range</span>(i+<span class="code-number">1</span>, n):
            <span class="code-keyword">if</span> arr[j] &lt; arr[min_idx]:
                min_idx = j
                
        <span class="code-comment"># Swap the found minimum element with the first element</span>
        arr[i], arr[min_idx] = arr[min_idx], arr[i]

arr = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>]
selection_sort(arr)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, arr)</code></pre>
        </div>
    </div>

    <!-- Java Tab -->
    <div id="java-tab" class="tab-content">
        <div class="code-block">
            <pre><code class="language-java"><span class="code-keyword">public class</span> <span class="code-class">SelectionSort</span> {
    <span class="code-keyword">public static void</span> <span class="code-function">selectionSort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> n = arr.length;
        
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n-<span class="code-number">1</span>; i++) {
            <span class="code-type">int</span> min_idx = i;
            
            <span class="code-keyword">for</span> (<span class="code-type">int</span> j = i+<span class="code-number">1</span>; j &lt; n; j++) {
                <span class="code-keyword">if</span> (arr[j] &lt; arr[min_idx]) {
                    min_idx = j;
                }
            }
            
            <span class="code-comment">// Swap the found minimum element with the first element</span>
            <span class="code-type">int</span> temp = arr[min_idx];
            arr[min_idx] = arr[i];
            arr[i] = temp;
        }
    }

    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span>[] args) {
        <span class="code-type">int</span>[] arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>};
        selectionSort(arr);
        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) System.out.print(num + <span class="code-string">" "</span>);
    }
}</code></pre>
        </div>
    </div>

    <!-- JavaScript Tab -->
    <div id="js-tab" class="tab-content">
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
        
        <span class="code-comment">// Swap the found minimum element with the first element</span>
        [arr[i], arr[min_idx]] = [arr[min_idx], arr[i]];
    }
}

<span class="code-keyword">let</span> arr = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>];
selectionSort(arr);
console.log(<span class="code-string">"Sorted array:"</span>, arr);</code></pre>
        </div>
    </div>

    <!-- C# Tab -->
    <div id="csharp-tab" class="tab-content">
        <div class="code-block">
            <pre><code class="language-csharp"><span class="code-keyword">using</span> System;

<span class="code-keyword">class</span> <span class="code-class">SelectionSort</span> {
    <span class="code-keyword">static void</span> <span class="code-function">Sort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> n = arr.Length;
        
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n-<span class="code-number">1</span>; i++) {
            <span class="code-type">int</span> min_idx = i;
            
            <span class="code-keyword">for</span> (<span class="code-type">int</span> j = i+<span class="code-number">1</span>; j &lt; n; j++) {
                <span class="code-keyword">if</span> (arr[j] &lt; arr[min_idx]) {
                    min_idx = j;
                }
            }
            
            <span class="code-comment">// Swap the found minimum element with the first element</span>
            <span class="code-type">int</span> temp = arr[min_idx];
            arr[min_idx] = arr[i];
            arr[i] = temp;
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
    <div id="php-tab" class="tab-content">
        <div class="code-block">
            <pre><code class="language-php"><span class="code-keyword">&lt;?php</span>
<span class="code-keyword">function</span> <span class="code-function">selectionSort</span>(<span class="code-keyword">&</span>$arr) {
    $n = <span class="code-function">count</span>($arr);
    
    <span class="code-keyword">for</span> ($i = <span class="code-number">0</span>; $i &lt; $n-<span class="code-number">1</span>; $i++) {
        $min_idx = $i;
        
        <span class="code-keyword">for</span> ($j = $i+<span class="code-number">1</span>; $j &lt; $n; $j++) {
            <span class="code-keyword">if</span> ($arr[$j] &lt; $arr[$min_idx]) {
                $min_idx = $j;
            }
        }
        
        <span class="code-comment">// Swap the found minimum element with the first element</span>
        $temp = $arr[$min_idx];
        $arr[$min_idx] = $arr[$i];
        $arr[$i] = $temp;
    }
}

$arr = <span class="code-function">array</span>(<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>);
selectionSort($arr);
<span class="code-keyword">echo</span> <span class="code-string">"Sorted array: "</span> . <span class="code-function">implode</span>(<span class="code-string">" "</span>, $arr);
<span class="code-keyword">?&gt;</span></code></pre>
        </div>
    </div>
</div>