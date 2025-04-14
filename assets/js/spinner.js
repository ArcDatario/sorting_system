document.addEventListener('DOMContentLoaded', () => {
    const loader = document.querySelector('.loader-container');
    const sortingBars = document.querySelector('.sorting-bars');
    const pageContent = document.querySelector('.page-content');
    const barCount = 5;
    let minimumLoadTime = 1500; // Minimum 1.5 seconds loading time
    let loadStartTime = Date.now();
  
    // Initialize loader
    function initLoader() {
        // Create animated bars
        for (let i = 0; i < barCount; i++) {
            const bar = document.createElement('div');
            bar.className = 'sorting-bar';
            bar.style.animationDelay = `${i * 0.2}s`;
            sortingBars.appendChild(bar);
        }
        
        // Start loading process
        startLoading();
    }
  
    function startLoading() {
        // First ensure minimum load time has passed
        const timePassed = Date.now() - loadStartTime;
        const remainingTime = Math.max(0, minimumLoadTime - timePassed);
  
        setTimeout(() => {
            // Then wait for window load (whichever comes last)
            const loadHandler = () => {
                hideLoader();
                window.removeEventListener('load', loadHandler);
            };
            
            if (document.readyState === 'complete') {
                hideLoader();
            } else {
                window.addEventListener('load', loadHandler);
                // Safety fallback
                setTimeout(hideLoader, 3000);
            }
        }, remainingTime);
    }
  
    function hideLoader() {
        loader.style.opacity = '0';
        setTimeout(() => {
            loader.style.display = 'none';
            loader.style.pointerEvents = 'none'; // Ensure it doesn't block clicks
            pageContent.style.opacity = '1';
        }, 500);
    }
  
    // Watch for theme changes
    const themeObserver = new MutationObserver(() => {
        // Force redraw to ensure color updates
        loader.style.display = 'none';
        void loader.offsetWidth; // Trigger reflow
        loader.style.display = 'flex';
    });
    
    themeObserver.observe(document.body, { 
        attributes: true, 
        attributeFilter: ['class'] 
    });
  
    // Initialize
    initLoader();
});