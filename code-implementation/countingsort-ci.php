
<h2>Counting Sort Implementations</h2>
<div class="counting-sort-implementations">
    <div class="counting-sort-code-tabs">
        <div class="tab-buttons">
            <button class="counting-tab-btn tab-btn active" onclick="openCountingTab(event, 'counting-cpp-tab')">C++</button>
            <button class="counting-tab-btn tab-btn" onclick="openCountingTab(event, 'counting-python-tab')">Python</button>
            <button class="counting-tab-btn tab-btn" onclick="openCountingTab(event, 'counting-java-tab')">Java</button>
            <button class="counting-tab-btn tab-btn" onclick="openCountingTab(event, 'counting-js-tab')">JavaScript</button>
        </div>

        <!-- C++ Tab -->
        <div id="counting-cpp-tab" class="counting-tab-content" style="display:block;">
            <div class="code-block">
                <pre><code class="language-cpp">#include &lt;iostream&gt;
#include &lt;vector&gt;
#include &lt;algorithm&gt;
using namespace std;

<span class="code-keyword">void</span> countingSort(vector&lt;<span class="code-type">int</span>&gt;& arr) {
    <span class="code-type">int</span> max = *max_element(arr.begin(), arr.end());
    <span class="code-type">int</span> min = *min_element(arr.begin(), arr.end());
    <span class="code-type">int</span> range = max - min + <span class="code-number">1</span>;

    vector&lt;<span class="code-type">int</span>&gt; count(range), output(arr.size());
    <span class="code-keyword">for</span>(<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; arr.size(); i++)
        count[arr[i] - min]++;

    <span class="code-keyword">for</span>(<span class="code-type">int</span> i = <span class="code-number">1</span>; i &lt; count.size(); i++)
        count[i] += count[i - <span class="code-number">1</span>];

    <span class="code-keyword">for</span>(<span class="code-type">int</span> i = arr.size() - <span class="code-number">1</span>; i >= <span class="code-number">0</span>; i--) {
        output[count[arr[i] - min] - <span class="code-number">1</span>] = arr[i];
        count[arr[i] - min]--;
    }

    <span class="code-keyword">for</span>(<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; arr.size(); i++)
        arr[i] = output[i];
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">int</span>&gt; arr = {-<span class="code-number">5</span>, -<span class="code-number">10</span>, <span class="code-number">0</span>, -<span class="code-number">3</span>, <span class="code-number">8</span>, <span class="code-number">5</span>, -<span class="code-number">1</span>, <span class="code-number">10</span>};
    countingSort(arr);
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
            </div>
        </div>

        <!-- Python Tab -->
        <div id="counting-python-tab" class="counting-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-python"><span class="code-keyword">def</span> <span class="code-function">counting_sort</span>(arr):
    max_val = <span class="code-function">max</span>(arr)
    min_val = <span class="code-function">min</span>(arr)
    range_size = max_val - min_val + <span class="code-number">1</span>

    count = [<span class="code-number">0</span>] * range_size
    output = [<span class="code-number">0</span>] * <span class="code-function">len</span>(arr)

    <span class="code-keyword">for</span> num <span class="code-keyword">in</span> arr:
        count[num - min_val] += <span class="code-number">1</span>

    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(<span class="code-number">1</span>, <span class="code-function">len</span>(count)):
        count[i] += count[i - <span class="code-number">1</span>]

    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(<span class="code-function">len</span>(arr) - <span class="code-number">1</span>, -<span class="code-number">1</span>, -<span class="code-number">1</span>):
        output[count[arr[i] - min_val] - <span class="code-number">1</span>] = arr[i]
        count[arr[i] - min_val] -= <span class="code-number">1</span>

    <span class="code-keyword">for</span> i <span class="code-keyword">in</span> <span class="code-function">range</span>(<span class="code-function">len</span>(arr)):
        arr[i] = output[i]

arr = [-<span class="code-number">5</span>, -<span class="code-number">10</span>, <span class="code-number">0</span>, -<span class="code-number">3</span>, <span class="code-number">8</span>, <span class="code-number">5</span>, <span class="code-number">-1</span>, <span class="code-number">10</span>]
counting_sort(arr)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, arr)</code></pre>
            </div>
        </div>

        <!-- Java Tab -->
        <div id="counting-java-tab" class="counting-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-java"><span class="code-keyword">import</span> java.util.Arrays;

<span class="code-keyword">public class</span> <span class="code-class">CountingSort</span> {
    <span class="code-keyword">static void</span> <span class="code-function">countingSort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-type">int</span> max = Arrays.stream(arr).max().getAsInt();
        <span class="code-type">int</span> min = Arrays.stream(arr).min().getAsInt();
        <span class="code-type">int</span> range = max - min + <span class="code-number">1</span>;
        <span class="code-type">int</span>[] count = <span class="code-keyword">new</span> <span class="code-type">int</span>[range];
        <span class="code-type">int</span>[] output = <span class="code-keyword">new</span> <span class="code-type">int</span>[arr.length];

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; arr.length; i++)
            count[arr[i] - min]++;

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">1</span>; i &lt; count.length; i++)
            count[i] += count[i - <span class="code-number">1</span>];

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = arr.length - <span class="code-number">1</span>; i >= <span class="code-number">0</span>; i--) {
            output[count[arr[i] - min] - <span class="code-number">1</span>] = arr[i];
            count[arr[i] - min]--;
        }

        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; arr.length; i++)
            arr[i] = output[i];
    }

    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span>[] args) {
        <span class="code-type">int</span>[] arr = {-<span class="code-number">5</span>, -<span class="code-number">10</span>, <span class="code-number">0</span>, -<span class="code-number">3</span>, <span class="code-number">8</span>, <span class="code-number">5</span>, -<span class="code-number">1</span>, <span class="code-number">10</span>};
        countingSort(arr);
        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) System.out.print(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- JavaScript Tab -->
        <div id="counting-js-tab" class="counting-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-javascript"><span class="code-keyword">function</span> <span class="code-function">countingSort</span>(arr) {
    <span class="code-keyword">const</span> max = Math.max(...arr);
    <span class="code-keyword">const</span> min = Math.min(...arr);
    <span class="code-keyword">const</span> range = max - min + <span class="code-number">1</span>;
    
    <span class="code-keyword">const</span> count = <span class="code-keyword">new</span> <span class="code-type">Array</span>(range).fill(<span class="code-number">0</span>);
    <span class="code-keyword">const</span> output = <span class="code-keyword">new</span> <span class="code-type">Array</span>(arr.length);
    
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; arr.length; i++) {
        count[arr[i] - min]++;
    }
    
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">1</span>; i &lt; count.length; i++) {
        count[i] += count[i - <span class="code-number">1</span>];
    }
    
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = arr.length - <span class="code-number">1</span>; i >= <span class="code-number">0</span>; i--) {
        output[count[arr[i] - min] - <span class="code-number">1</span>] = arr[i];
        count[arr[i] - min]--;
    }
    
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> i = <span class="code-number">0</span>; i &lt; arr.length; i++) {
        arr[i] = output[i];
    }
}

<span class="code-keyword">let</span> arr = [-<span class="code-number">5</span>, -<span class="code-number">10</span>, <span class="code-number">0</span>, -<span class="code-number">3</span>, <span class="code-number">8</span>, <span class="code-number">5</span>, -<span class="code-number">1</span>, <span class="code-number">10</span>];
countingSort(arr);
console.log(<span class="code-string">"Sorted array:"</span>, arr);</code></pre>
            </div>
        </div>
    </div>
</div>
