<h2>Selection Sort Algorithm</h2>
<div class="algorithm-description">
    <p>Watch the algorithm in action with these colorful, animated bars!</p>
</div>

<!-- Visualization -->
<div class="visualization">

    <div class="graph-scroll-container">
        <div class="graph-container" id="selection-graph-container"></div>
    </div>
    <div class="controls">
        <button class="btn" id="selection-start-btn">🎬 Start Sorting</button>
        <button class="btn btn-secondary" id="selection-reset-btn">🔄 New Array</button>
        
        <div class="control-group">
            <span class="speed-control">
                <label>⏱️ Speed: <span id="speed-value">Medium</span></label>
                <input type="range" id="selection-speed" min="100" max="1500" value="800">
            </span>
        </div>
        
        <div class="control-group">
            <span class="elements-control">
                <label>📊 Elements: <span id="elements-value">10</span></label>
                <input type="range" id="elements-count" min="5" max="20" value="10">
            </span>
        </div>
    </div>
    <p id="selection-status">Ready to sort! Click start to begin</p>
</div>