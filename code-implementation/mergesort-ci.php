<!-- Merge Sort -->
<h2>Merge Sort Implementations</h2>
<div class="code-tabs">
    <div class="tab-buttons">
        <button class="tab-btn active" onclick="openTab(event, 'merge-cpp-tab')">C++</button>
        <button class="tab-btn" onclick="openTab(event, 'merge-python-tab')">Python</button>
        <button class="tab-btn" onclick="openTab(event, 'merge-java-tab')">Java</button>
    </div>

    <!-- C++ Tab -->
    <div id="merge-cpp-tab" class="tab-content" style="display:block;">
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
    <div id="merge-python-tab" class="tab-content">
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
    <div id="merge-java-tab" class="tab-content">
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
</div>
