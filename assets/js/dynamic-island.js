document.addEventListener('DOMContentLoaded', function() {
    const dynamicIsland = document.getElementById('dynamicIsland');
    const dropdownHeader = document.getElementById('dropdownHeader');
    const dropdownContent = document.getElementById('dropdownContent');
    const dropdownIcon = document.getElementById('dropdownIcon');
    const dropdownTitle = document.getElementById('dropdownTitle');
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    let isOpen = false;

    // Toggle dropdown
    dropdownHeader.addEventListener('click', function() {
        isOpen = !isOpen;
        
        if (isOpen) {
            dropdownContent.classList.add('open');
            dropdownIcon.classList.add('open');
            dynamicIsland.classList.add('pulse');
            
            // Remove pulse class after animation completes
            setTimeout(() => {
                dynamicIsland.classList.remove('pulse');
            }, 500);
        } else {
            dropdownContent.classList.remove('open');
            dropdownIcon.classList.remove('open');
        }
    });

    // Select item from dropdown
    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove selected class from all items
            dropdownItems.forEach(i => i.classList.remove('selected'));
            
            // Add selected class to clicked item
            this.classList.add('selected');
            
            // Update title
            dropdownTitle.textContent = this.textContent;
            
            // Close dropdown
            isOpen = false;
            dropdownContent.classList.remove('open');
            dropdownIcon.classList.remove('open');
            
            // Add pulse effect
            dynamicIsland.classList.add('pulse');
            setTimeout(() => {
                dynamicIsland.classList.remove('pulse');
            }, 500);
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!dynamicIsland.contains(event.target) && isOpen) {
            isOpen = false;
            dropdownContent.classList.remove('open');
            dropdownIcon.classList.remove('open');
        }
    });
});