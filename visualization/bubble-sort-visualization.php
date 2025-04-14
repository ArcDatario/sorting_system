<div class="algorithm-description">
    <p>Watch the algorithm in action with these colorful, animated bars!</p>
</div>

<!-- Visualization -->
<div class="visualization">
    <div class="graph-scroll-container">
        <div class="graph-container" id="bubble-graph-container"></div>
    </div>
    <p id="selection-status" style="font-size: 12.5px !important; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Ready to sort! Click start to begin</p>
    <div class="controls">
        <button class="btn toggle-btn" id="bubble-toggle-mode-btn">🔴 OFF</button>
        <button class="btn" id="bubble-start-btn" disabled>🎬 Start Sorting</button>
        <button class="btn btn-secondary" id="bubble-reset-btn">🔄 New Array</button>
        <button class="btn btn-secondary" id="bubble-prev-btn" disabled>⏮️</button>
        <button class="btn btn-secondary" id="bubble-next-btn" disabled>⏭️</button>
        
        <div class="control-group">
            <span class="speed-control">
                <label>⏱️ Speed: <span id="speed-value">Medium</span></label>
                <input type="range" id="bubble-speed" min="100" max="1500" value="800">
            </span>
        </div>
        
        <div class="control-group">
            <span class="elements-control">
                <label>📊 Elements: <span id="elements-value">10</span></label>
                <input type="range" id="bubble-elements-count" min="5" max="20" value="10">
            </span>
        </div>
    </div>
</div>

