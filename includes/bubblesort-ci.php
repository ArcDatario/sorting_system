<h2>Bubble Sort Implementations</h2>
<div class="bubblesort-implementation">
    <div class="bubble-sort-code-tabs">  <!-- Changed class name to be specific -->
        <div class="tab-buttons">
            <button class="bubble-tab-btn tab-btn active" onclick="openBubbleTab(event, 'bubble-cpp-tab')">C++</button>
            <button class="bubble-tab-btn tab-btn" onclick="openBubbleTab(event, 'bubble-python-tab')">Python</button>
            <button class="bubble-tab-btn tab-btn" onclick="openBubbleTab(event, 'bubble-java-tab')">Java</button>
            <button class="bubble-tab-btn tab-btn" onclick="openBubbleTab(event, 'bubble-js-tab')">JavaScript</button>
            <button class="bubble-tab-btn tab-btn" onclick="openBubbleTab(event, 'bubble-csharp-tab')">C#</button>
            <button class="bubble-tab-btn tab-btn" onclick="openBubbleTab(event, 'bubble-php-tab')">PHP</button>
           
        </div>

        <!-- C++ Tab -->
        <div id="bubble-cpp-tab" class="bubble-tab-content" style="display:block;">
            <div class="code-block">
                <pre><code class="language-cpp">#include &lt;bits/stdc++.h&gt;
using namespace std;

<span class="code-keyword">void</span> bubbleSort(vector&lt;<span class="code-type">int</span>&gt;& arr) {
    <span class="code-type">int</span> n = arr.size();
    <span class="code-type">bool</span> swapped;

    <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n - <span class="code-number">1</span>; i++) {
        swapped = <span class="code-keyword">false</span>;
        <span class="code-keyword">for</span> (<span class="code-type">int</span> j = <span class="code-number">0</span>; j &lt; n - i - <span class="code-number">1</span>; j++) {
            <span class="code-keyword">if</span> (arr[j] &gt; arr[j + <span class="code-number">1</span>]) {
                swap(arr[j], arr[j + <span class="code-number">1</span>]);
                swapped = <span class="code-keyword">true</span>;
            }
        }
        <span class="code-keyword">if</span> (!swapped) <span class="code-keyword">break</span>;
    }
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">int</span>&gt; arr = {<span class="code-number">64</span>, <span class="code-number">34</span>, <span class="code-number">25</span>, <span class="code-number">12</span>, <span class="code-number">22</span>, <span class="code-number">11</span>, <span class="code-number">90</span>};
    bubbleSort(arr);
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
            </div>
        </div>

        <!-- Python Tab -->
        <div id="bubble-python-tab" class="bubble-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-python"><span class="code-keyword">def</span> <span class="code-function">bubble_sort</span>(arr):
    n = <span class="code-function">len</span>(arr)
    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(n):
        swapped = <span class="code-keyword">False</span>
        <span class="code-keyword">for</span> j <span class="code-keyword">in</span> <span class="code-function">range</span>(<span class="code-number">0</span>, n-i-<span class="code-number">1</span>):
            <span class="code-keyword">if</span> arr[j] &gt; arr[j+<span class="code-number">1</span>]:
                arr[j], arr[j+<span class="code-number">1</span>] = arr[j+<span class="code-number">1</span>], arr[j]
                swapped = <span class="code-keyword">True</span>
        <span class="code-keyword">if</span> <span class="code-keyword">not</span> swapped:
            <span class="code-keyword">break</span>

arr = [<span class="code-number">64</span>, <span class="code-number">34</span>, <span class="code-number">25</span>, <span class="code-number">12</span>, <span class="code-number">22</span>, <span class="code-number">11</span>, <span class="code-number">90</span>]
bubble_sort(arr)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, arr)</code></pre>
            </div>
        </div>

        <!-- Java Tab -->
        <div id="bubble-java-tab" class="bubble-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-java"><span class="code-keyword">public class</span> <span class="code-class">BubbleSort</span> {
    <span class="code-keyword">public static void</span> <span class="code-function">bubbleSort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> n = arr.length;
        <span class="code-type">boolean</span> swapped;
        
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n-<span class="code-number">1</span>; i++) {
            swapped = <span class="code-keyword">false</span>;
            <span class="code-keyword">for</span> (<span class="code-type">int</span> j = <span class="code-number">0</span>; j &lt; n-i-<span class="code-number">1</span>; j++) {
                <span class="code-keyword">if</span> (arr[j] &gt; arr[j+<span class="code-number">1</span>]) {
                    <span class="code-type">int</span> temp = arr[j];
                    arr[j] = arr[j+<span class="code-number">1</span>];
                    arr[j+<span class="code-number">1</span>] = temp;
                    swapped = <span class="code-keyword">true</span>;
                }
            }
            <span class="code-keyword">if</span> (!swapped) <span class="code-keyword">break</span>;
        }
    }

    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span>[] args) {
        <span class="code-type">int</span>[] arr = {<span class="code-number">64</span>, <span class="code-number">34</span>, <span class="code-number">25</span>, <span class="code-number">12</span>, <span class="code-number">22</span>, <span class="code-number">11</span>, <span class="code-number">90</span>};
        bubbleSort(arr);
        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) System.out.print(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- JavaScript Tab -->
        <div id="bubble-js-tab" class="bubble-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-javascript"><span class="code-keyword">function</span> <span class="code-function">bubbleSort</span>(arr) {
    <span class="code-keyword">let</span> n = arr.length;
    <span class="code-keyword">let</span> swapped;
    
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; n-<span class="code-number">1</span>; i++) {
        swapped = <span class="code-keyword">false</span>;
        <span class="code-keyword">for</span> (<span class="code-keyword">let</span> j = <span class="code-number">0</span>; j &lt; n-i-<span class="code-number">1</span>; j++) {
            <span class="code-keyword">if</span> (arr[j] &gt; arr[j+<span class="code-number">1</span>]) {
                [arr[j], arr[j+<span class="code-number">1</span>]] = [arr[j+<span class="code-number">1</span>], arr[j]];
                swapped = <span class="code-keyword">true</span>;
            }
        }
        <span class="code-keyword">if</span> (!swapped) <span class="code-keyword">break</span>;
    }
}

<span class="code-keyword">let</span> arr = [<span class="code-number">64</span>, <span class="code-number">34</span>, <span class="code-number">25</span>, <span class="code-number">12</span>, <span class="code-number">22</span>, <span class="code-number">11</span>, <span class="code-number">90</span>];
bubbleSort(arr);
console.log(<span class="code-string">"Sorted array:"</span>, arr);</code></pre>
            </div>
        </div>

        <!-- C# Tab -->
        <div id="bubble-csharp-tab" class="bubble-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-csharp"><span class="code-keyword">using</span> System;

<span class="code-keyword">class</span> <span class="code-class">BubbleSort</span> {
    <span class="code-keyword">static void</span> <span class="code-function">BubbleSort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> n = arr.Length;
        <span class="code-type">bool</span> swapped;
        
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; n-<span class="code-number">1</span>; i++) {
            swapped = <span class="code-keyword">false</span>;
            <span class="code-keyword">for</span> (<span class="code-type">int</span> j = <span class="code-number">0</span>; j &lt; n-i-<span class="code-number">1</span>; j++) {
                <span class="code-keyword">if</span> (arr[j] &gt; arr[j+<span class="code-number">1</span>]) {
                    <span class="code-type">int</span> temp = arr[j];
                    arr[j] = arr[j+<span class="code-number">1</span>];
                    arr[j+<span class="code-number">1</span>] = temp;
                    swapped = <span class="code-keyword">true</span>;
                }
            }
            <span class="code-keyword">if</span> (!swapped) <span class="code-keyword">break</span>;
        }
    }

    <span class="code-keyword">static void</span> <span class="code-function">Main</span>() {
        <span class="code-type">int</span>[] arr = {<span class="code-number">64</span>, <span class="code-number">34</span>, <span class="code-number">25</span>, <span class="code-number">12</span>, <span class="code-number">22</span>, <span class="code-number">11</span>, <span class="code-number">90</span>};
        BubbleSort(arr);
        Console.Write(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">foreach</span> (<span class="code-type">int</span> num <span class="code-keyword">in</span> arr) Console.Write(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- PHP Tab -->
        <div id="bubble-php-tab" class="bubble-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-php"><span class="code-keyword">&lt;?php</span>
<span class="code-keyword">function</span> <span class="code-function">bubbleSort</span>(<span class="code-keyword">&</span>$arr) {
    $n = <span class="code-function">count</span>($arr);
    $swapped;
    
    <span class="code-keyword">for</span> ($i = <span class="code-number">0</span>; $i &lt; $n-<span class="code-number">1</span>; $i++) {
        $swapped = <span class="code-keyword">false</span>;
        <span class="code-keyword">for</span> ($j = <span class="code-number">0</span>; $j &lt; $n-$i-<span class="code-number">1</span>; $j++) {
            <span class="code-keyword">if</span> ($arr[$j] &gt; $arr[$j+<span class="code-number">1</span>]) {
                <span class="code-function">list</span>($arr[$j], $arr[$j+<span class="code-number">1</span>]) = <span class="code-function">array</span>($arr[$j+<span class="code-number">1</span>], $arr[$j]);
                $swapped = <span class="code-keyword">true</span>;
            }
        }
        <span class="code-keyword">if</span> (!$swapped) <span class="code-keyword">break</span>;
    }
}

$arr = <span class="code-function">array</span>(<span class="code-number">64</span>, <span class="code-number">34</span>, <span class="code-number">25</span>, <span class="code-number">12</span>, <span class="code-number">22</span>, <span class="code-number">11</span>, <span class="code-number">90</span>);
bubbleSort($arr);
<span class="code-keyword">echo</span> <span class="code-string">"Sorted array: "</span> . <span class="code-function">implode</span>(<span class="code-string">" "</span>, $arr);
<span class="code-keyword">?&gt;</span></code></pre>
            </div>
        </div>

        <!-- Optimized Tab -->
      
    </div>
</div>