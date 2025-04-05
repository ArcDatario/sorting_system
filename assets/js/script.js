const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const navLinks = document.getElementById('navLinks');

mobileMenuBtn.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

// Dark Mode Toggle
document.addEventListener('DOMContentLoaded', function() {
    // Check saved preference
    const darkModeEnabled = localStorage.getItem('darkMode') === 'true';
    
    // Apply saved mode
    if (darkModeEnabled) {
        document.body.classList.add('dark-mode');
    }
    
    // Set up toggle button
    const darkModeToggle = document.getElementById('darkModeToggle');
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function() {
            const isDark = document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', isDark);
        });
    }
});

// Tab System (keep this)
function openBubbleTab(evt, tabName) {
    // Get all bubble sort tab contents
    const tabContents = document.querySelectorAll('.bubble-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });
    
    // Remove active class from all bubble tab buttons
    const tabButtons = document.querySelectorAll('.bubble-tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove("active");
    });
    
    // Show current tab and mark button as active
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
    
    // Store the selected tab in localStorage with bubble-specific key
    localStorage.setItem('lastActiveBubbleTab', tabName);
}

// Load last active bubble tab if available
document.addEventListener('DOMContentLoaded', function() {
    const lastActiveTab = localStorage.getItem('lastActiveBubbleTab');
    if (lastActiveTab) {
        document.getElementById(lastActiveTab).style.display = "block";
        const buttons = document.querySelectorAll('.bubble-tab-btn');
        buttons.forEach(btn => {
            if (btn.getAttribute('onclick').includes(lastActiveTab)) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    } else {
        // Default to showing the first tab if no saved state
        document.querySelector('.bubble-tab-content').style.display = "block";
        document.querySelector('.bubble-tab-btn').classList.add("active");
    }
});

// Keep any syntax highlighting initialization if needed

function openInsertionTab(evt, tabName) {
    // Get all insertion sort tab contents
    const tabContents = document.querySelectorAll('.insertion-tab-content');
    tabContents.forEach(tab => {
        tab.style.display = "none";
    });
    
    // Remove active class from all insertion tab buttons
    const tabButtons = document.querySelectorAll('.insertion-tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove("active");
    });
    
    // Show current tab and mark button as active
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
    
    // Store the selected tab in localStorage with insertion-specific key
    localStorage.setItem('lastActiveInsertionTab', tabName);
}

// Load last active insertion tab if available
document.addEventListener('DOMContentLoaded', function() {
    const lastActiveTab = localStorage.getItem('lastActiveInsertionTab');
    if (lastActiveTab) {
        document.getElementById(lastActiveTab).style.display = "block";
        const buttons = document.querySelectorAll('.insertion-tab-btn');
        buttons.forEach(btn => {
            if (btn.getAttribute('onclick').includes(lastActiveTab)) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    } else {
        // Default to showing the first tab if no saved state
        document.querySelector('.insertion-tab-content').style.display = "block";
        document.querySelector('.insertion-tab-btn').classList.add("active");
    }
});