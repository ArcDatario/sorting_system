<!-- Tree Sort -->
<h2>Tree Sort Implementations</h2>
<div class="tree-sort-implementations">
    <div class="tree-sort-code-tabs">
        <div class="tab-buttons">
            <button class="tree-tab-btn tab-btn active" onclick="openTreeTab(event, 'tree-cpp-tab')">C++</button>
            <button class="tree-tab-btn tab-btn" onclick="openTreeTab(event, 'tree-python-tab')">Python</button>
            <button class="tree-tab-btn tab-btn" onclick="openTreeTab(event, 'tree-java-tab')">Java</button>
            <button class="tree-tab-btn tab-btn" onclick="openTreeTab(event, 'tree-js-tab')">JavaScript</button>
            <button class="tree-tab-btn tab-btn" onclick="openTreeTab(event, 'tree-csharp-tab')">C#</button>
            <button class="tree-tab-btn tab-btn" onclick="openTreeTab(event, 'tree-php-tab')">PHP</button>
        </div>

        <!-- C++ Tab -->
        <div id="tree-cpp-tab" class="tree-tab-content" style="display:block;">
            <div class="code-block">
                <pre><code class="language-cpp">#include &lt;iostream&gt;
#include &lt;vector&gt;
using namespace std;

<span class="code-keyword">class</span> <span class="code-class">Node</span> {
<span class="code-keyword">public</span>:
    <span class="code-type">int</span> data;
    Node* left;
    Node* right;
    Node(<span class="code-type">int</span> value) : data(value), left(nullptr), right(nullptr) {}
};

<span class="code-keyword">void</span> insert(Node*& root, <span class="code-type">int</span> value) {
    <span class="code-keyword">if</span> (root == nullptr) {
        root = <span class="code-keyword">new</span> Node(value);
        <span class="code-keyword">return</span>;
    }
    <span class="code-keyword">if</span> (value &lt; root->data)
        insert(root->left, value);
    <span class="code-keyword">else</span>
        insert(root->right, value);
}

<span class="code-keyword">void</span> inOrderTraversal(Node* root, vector&lt;<span class="code-type">int</span>&gt;& result) {
    <span class="code-keyword">if</span> (root == nullptr) <span class="code-keyword">return</span>;
    inOrderTraversal(root->left, result);
    result.push_back(root->data);
    inOrderTraversal(root->right, result);
}

<span class="code-keyword">void</span> treeSort(vector&lt;<span class="code-type">int</span>&gt;& arr) {
    Node* root = nullptr;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr)
        insert(root, num);
    arr.clear();
    inOrderTraversal(root, arr);
}

<span class="code-type">int</span> main() {
    vector&lt;<span class="code-type">int</span>&gt; arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>};
    treeSort(arr);
    cout &lt;&lt; <span class="code-string">"Sorted array: "</span>;
    <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) cout &lt;&lt; num &lt;&lt; <span class="code-string">" "</span>;
    <span class="code-keyword">return</span> <span class="code-number">0</span>;
}</code></pre>
            </div>
        </div>

        <!-- Python Tab -->
        <div id="tree-python-tab" class="tree-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-python"><span class="code-keyword">class</span> <span class="code-class">Node</span>:
    <span class="code-keyword">def</span> <span class="code-function">__init__</span>(<span class="code-variable">self</span>, value):
        <span class="code-variable">self</span>.data = value
        <span class="code-variable">self</span>.left = <span class="code-keyword">None</span>
        <span class="code-variable">self</span>.right = <span class="code-keyword">None</span>

<span class="code-keyword">def</span> <span class="code-function">insert</span>(root, value):
    <span class="code-keyword">if</span> root <span class="code-keyword">is</span> <span class="code-keyword">None</span>:
        <span class="code-keyword">return</span> <span class="code-class">Node</span>(value)
    <span class="code-keyword">if</span> value &lt; root.data:
        root.left = insert(root.left, value)
    <span class="code-keyword">else</span>:
        root.right = insert(root.right, value)
    <span class="code-keyword">return</span> root

<span class="code-keyword">def</span> <span class="code-function">in_order_traversal</span>(root, result):
    <span class="code-keyword">if</span> root:
        in_order_traversal(root.left, result)
        result.append(root.data)
        in_order_traversal(root.right, result)

<span class="code-keyword">def</span> <span class="code-function">tree_sort</span>(arr):
    root = <span class="code-keyword">None</span>
    <span class="code-keyword">for</span> num <span class="code-keyword">in</span> arr:
        root = insert(root, num)
    sorted_arr = []
    in_order_traversal(root, sorted_arr)
    <span class="code-keyword">return</span> sorted_arr

arr = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>]
sorted_arr = tree_sort(arr)
<span class="code-function">print</span>(<span class="code-string">"Sorted array:"</span>, sorted_arr)</code></pre>
            </div>
        </div>

        <!-- Java Tab -->
        <div id="tree-java-tab" class="tree-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-java"><span class="code-keyword">class</span> <span class="code-class">Node</span> {
    <span class="code-type">int</span> data;
    Node left, right;
    <span class="code-keyword">public</span> <span class="code-function">Node</span>(<span class="code-type">int</span> item) {
        data = item;
        left = right = <span class="code-keyword">null</span>;
    }
}

<span class="code-keyword">public class</span> <span class="code-class">TreeSort</span> {
    Node root;
    
    <span class="code-keyword">void</span> <span class="code-function">insert</span>(<span class="code-type">int</span> key) {
        root = insertRec(root, key);
    }
    
    Node <span class="code-function">insertRec</span>(Node root, <span class="code-type">int</span> key) {
        <span class="code-keyword">if</span> (root == <span class="code-keyword">null</span>) {
            root = <span class="code-keyword">new</span> Node(key);
            <span class="code-keyword">return</span> root;
        }
        <span class="code-keyword">if</span> (key &lt; root.data)
            root.left = insertRec(root.left, key);
        <span class="code-keyword">else if</span> (key > root.data)
            root.right = insertRec(root.right, key);
        <span class="code-keyword">return</span> root;
    }
    
    <span class="code-keyword">void</span> <span class="code-function">inOrderRec</span>(Node root, java.util.List&lt;<span class="code-type">Integer</span>&gt; result) {
        <span class="code-keyword">if</span> (root != <span class="code-keyword">null</span>) {
            inOrderRec(root.left, result);
            result.add(root.data);
            inOrderRec(root.right, result);
        }
    }
    
    <span class="code-type">void</span> <span class="code-function">treeSort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr)
            insert(num);
        java.util.List&lt;<span class="code-type">Integer</span>&gt; sortedList = <span class="code-keyword">new</span> java.util.ArrayList<>();
        inOrderRec(root, sortedList);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; arr.length; i++)
            arr[i] = sortedList.get(i);
    }
    
    <span class="code-keyword">public static void</span> <span class="code-function">main</span>(<span class="code-type">String</span> args[]) {
        <span class="code-type">int</span>[] arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>};
        <span class="code-class">TreeSort</span> tree = <span class="code-keyword">new</span> <span class="code-class">TreeSort</span>();
        tree.treeSort(arr);
        System.out.print(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> num : arr) System.out.print(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- JavaScript Tab -->
        <div id="tree-js-tab" class="tree-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-javascript"><span class="code-keyword">class</span> <span class="code-class">Node</span> {
    <span class="code-function">constructor</span>(value) {
        <span class="code-variable">this</span>.data = value;
        <span class="code-variable">this</span>.left = <span class="code-keyword">null</span>;
        <span class="code-variable">this</span>.right = <span class="code-keyword">null</span>;
    }
}

<span class="code-keyword">function</span> <span class="code-function">insert</span>(root, value) {
    <span class="code-keyword">if</span> (root === <span class="code-keyword">null</span>) {
        <span class="code-keyword">return</span> <span class="code-keyword">new</span> <span class="code-class">Node</span>(value);
    }
    <span class="code-keyword">if</span> (value &lt; root.data) {
        root.left = insert(root.left, value);
    } <span class="code-keyword">else</span> {
        root.right = insert(root.right, value);
    }
    <span class="code-keyword">return</span> root;
}

<span class="code-keyword">function</span> <span class="code-function">inOrderTraversal</span>(root, result) {
    <span class="code-keyword">if</span> (root !== <span class="code-keyword">null</span>) {
        inOrderTraversal(root.left, result);
        result.push(root.data);
        inOrderTraversal(root.right, result);
    }
}

<span class="code-keyword">function</span> <span class="code-function">treeSort</span>(arr) {
    <span class="code-keyword">let</span> root = <span class="code-keyword">null</span>;
    <span class="code-keyword">for</span> (<span class="code-keyword">let</span> num <span class="code-keyword">of</span> arr) {
        root = insert(root, num);
    }
    <span class="code-keyword">let</span> sortedArr = [];
    inOrderTraversal(root, sortedArr);
    <span class="code-keyword">return</span> sortedArr;
}

<span class="code-keyword">let</span> arr = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>];
<span class="code-keyword">let</span> sortedArr = treeSort(arr);
console.log(<span class="code-string">"Sorted array:"</span>, sortedArr);</code></pre>
            </div>
        </div>

        <!-- C# Tab -->
        <div id="tree-csharp-tab" class="tree-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-csharp"><span class="code-keyword">using</span> System;
<span class="code-keyword">using</span> System.Collections.Generic;

<span class="code-keyword">class</span> <span class="code-class">Node</span> {
    <span class="code-keyword">public</span> <span class="code-type">int</span> Data;
    <span class="code-keyword">public</span> Node Left, Right;
    <span class="code-keyword">public</span> <span class="code-function">Node</span>(<span class="code-type">int</span> item) {
        Data = item;
        Left = Right = <span class="code-keyword">null</span>;
    }
}

<span class="code-keyword">class</span> <span class="code-class">TreeSort</span> {
    Node root;
    
    <span class="code-keyword">void</span> <span class="code-function">Insert</span>(<span class="code-type">int</span> key) {
        root = InsertRec(root, key);
    }
    
    Node <span class="code-function">InsertRec</span>(Node root, <span class="code-type">int</span> key) {
        <span class="code-keyword">if</span> (root == <span class="code-keyword">null</span>) {
            root = <span class="code-keyword">new</span> Node(key);
            <span class="code-keyword">return</span> root;
        }
        <span class="code-keyword">if</span> (key &lt; root.Data)
            root.Left = InsertRec(root.Left, key);
        <span class="code-keyword">else if</span> (key > root.Data)
            root.Right = InsertRec(root.Right, key);
        <span class="code-keyword">return</span> root;
    }
    
    <span class="code-keyword">void</span> <span class="code-function">InOrderRec</span>(Node root, List&lt;<span class="code-type">int</span>&gt; result) {
        <span class="code-keyword">if</span> (root != <span class="code-keyword">null</span>) {
            InOrderRec(root.Left, result);
            result.Add(root.Data);
            InOrderRec(root.Right, result);
        }
    }
    
    <span class="code-keyword">public</span> <span class="code-type">void</span> <span class="code-function">Sort</span>(<span class="code-type">int</span>[] arr) {
        <span class="code-keyword">foreach</span> (<span class="code-type">int</span> num <span class="code-keyword">in</span> arr)
            Insert(num);
        List&lt;<span class="code-type">int</span>&gt; sortedList = <span class="code-keyword">new</span> List&lt;<span class="code-type">int</span>&gt;();
        InOrderRec(root, sortedList);
        <span class="code-keyword">for</span> (<span class="code-type">int</span> i = <span class="code-number">0</span>; i &lt; arr.Length; i++)
            arr[i] = sortedList[i];
    }
    
    <span class="code-keyword">static void</span> <span class="code-function">Main</span>() {
        <span class="code-type">int</span>[] arr = {<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>};
        <span class="code-class">TreeSort</span> tree = <span class="code-keyword">new</span> <span class="code-class">TreeSort</span>();
        tree.Sort(arr);
        Console.Write(<span class="code-string">"Sorted array: "</span>);
        <span class="code-keyword">foreach</span> (<span class="code-type">int</span> num <span class="code-keyword">in</span> arr) Console.Write(num + <span class="code-string">" "</span>);
    }
}</code></pre>
            </div>
        </div>

        <!-- PHP Tab -->
        <div id="tree-php-tab" class="tree-tab-content" style="display:none;">
            <div class="code-block">
                <pre><code class="language-php"><span class="code-keyword">class</span> <span class="code-class">Node</span> {
    <span class="code-keyword">public</span> <span class="code-variable">$data</span>;
    <span class="code-keyword">public</span> <span class="code-variable">$left</span>;
    <span class="code-keyword">public</span> <span class="code-variable">$right</span>;
    <span class="code-keyword">public function</span> <span class="code-function">__construct</span>(<span class="code-variable">$value</span>) {
        <span class="code-variable">$this</span>->data = <span class="code-variable">$value</span>;
        <span class="code-variable">$this</span>->left = <span class="code-keyword">null</span>;
        <span class="code-variable">$this</span>->right = <span class="code-keyword">null</span>;
    }
}

<span class="code-keyword">function</span> <span class="code-function">insert</span>(<span class="code-variable">$root</span>, <span class="code-variable">$value</span>) {
    <span class="code-keyword">if</span> (<span class="code-variable">$root</span> === <span class="code-keyword">null</span>) {
        <span class="code-keyword">return</span> <span class="code-keyword">new</span> <span class="code-class">Node</span>(<span class="code-variable">$value</span>);
    }
    <span class="code-keyword">if</span> (<span class="code-variable">$value</span> &lt; <span class="code-variable">$root</span>->data) {
        <span class="code-variable">$root</span>->left = insert(<span class="code-variable">$root</span>->left, <span class="code-variable">$value</span>);
    } <span class="code-keyword">else</span> {
        <span class="code-variable">$root</span>->right = insert(<span class="code-variable">$root</span>->right, <span class="code-variable">$value</span>);
    }
    <span class="code-keyword">return</span> <span class="code-variable">$root</span>;
}

<span class="code-keyword">function</span> <span class="code-function">inOrderTraversal</span>(<span class="code-variable">$root</span>, &<span class="code-variable">$result</span>) {
    <span class="code-keyword">if</span> (<span class="code-variable">$root</span> !== <span class="code-keyword">null</span>) {
        inOrderTraversal(<span class="code-variable">$root</span>->left, <span class="code-variable">$result</span>);
        <span class="code-variable">$result</span>[] = <span class="code-variable">$root</span>->data;
        inOrderTraversal(<span class="code-variable">$root</span>->right, <span class="code-variable">$result</span>);
    }
}

<span class="code-keyword">function</span> <span class="code-function">treeSort</span>(<span class="code-variable">$arr</span>) {
    <span class="code-variable">$root</span> = <span class="code-keyword">null</span>;
    <span class="code-keyword">foreach</span> (<span class="code-variable">$arr</span> <span class="code-keyword">as</span> <span class="code-variable">$num</span>) {
        <span class="code-variable">$root</span> = insert(<span class="code-variable">$root</span>, <span class="code-variable">$num</span>);
    }
    <span class="code-variable">$sortedArr</span> = [];
    inOrderTraversal(<span class="code-variable">$root</span>, <span class="code-variable">$sortedArr</span>);
    <span class="code-keyword">return</span> <span class="code-variable">$sortedArr</span>;
}

<span class="code-variable">$arr</span> = [<span class="code-number">12</span>, <span class="code-number">11</span>, <span class="code-number">13</span>, <span class="code-number">5</span>, <span class="code-number">6</span>, <span class="code-number">7</span>];
<span class="code-variable">$sortedArr</span> = treeSort(<span class="code-variable">$arr</span>);
echo <span class="code-string">"Sorted array: "</span> . implode(<span class="code-string">" "</span>, <span class="code-variable">$sortedArr</span>);</code></pre>
            </div>
        </div>
    </div>
</div>

<script>
function openTreeTab(evt, tabName) {
    // Prevent default behavior if it's a click event
    if (evt) {
        evt.preventDefault();
    }

    // Get all tree sort tab contents
    const tabContents = document.querySelectorAll('.tree-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });
    
    // Remove active class from all tree tab buttons
    const tabButtons = document.querySelectorAll('.tree-tab-btn');
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
    
    // Store the selected tab in localStorage with tree-specific key
    localStorage.setItem('lastActiveTreeTab', tabName);
}

// Load last active tree tab if available
document.addEventListener('DOMContentLoaded', function() {
    // First hide all tree tab contents
    const tabContents = document.querySelectorAll('.tree-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });

    // Remove active class from all buttons initially
    const tabButtons = document.querySelectorAll('.tree-tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove("active");
    });

    const lastActiveTab = localStorage.getItem('lastActiveTreeTab');
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
        const firstTab = document.querySelector('.tree-tab-content');
        const firstButton = document.querySelector('.tree-tab-btn');
        
        if (firstTab) firstTab.style.display = "block";
        if (firstButton) firstButton.classList.add("active");
        
        // Store the default tab if nothing is stored
        if (firstTab) {
            localStorage.setItem('lastActiveTreeTab', firstTab.id);
        }
    }
});
</script>