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