document.addEventListener('DOMContentLoaded', function() {
    const dynamicIsland = document.getElementById('dynamicIsland');
    const dropdownHeader = document.getElementById('dropdownHeader');
    const dropdownContent = document.getElementById('dropdownContent');
    const dropdownIcon = document.getElementById('dropdownIcon');
    const dropdownTitle = document.getElementById('dropdownTitle');
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    let isOpen = false;

    // Function to switch content with animation
    function switchContent(selectedAlgorithm, skipAnimation = false) {
        const allContents = document.querySelectorAll('.main-content');
        const activeContent = document.getElementById(selectedAlgorithm);
        
        // Save to localStorage
        localStorage.setItem('selectedAlgorithm', selectedAlgorithm);
        
        if (skipAnimation) {
            // Just show/hide without animation
            allContents.forEach(content => {
                content.style.display = 'none';
                content.style.animation = '';
            });
            if (activeContent) {
                activeContent.style.display = 'block';
            }
            return;
        }

        // Add exit animation to currently visible content
        allContents.forEach(content => {
            if (content.style.display === 'block' || content.style.display === '') {
                // Apply exit animation
                content.style.animation = 'contentExit 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                
                // After animation completes, hide it
                setTimeout(() => {
                    content.style.display = 'none';
                    content.style.animation = '';
                    
                    // Show new content with entry animation
                    if (activeContent) {
                        activeContent.style.display = 'block';
                        activeContent.style.animation = 'contentEnter 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                        
                        // Remove animation after it completes
                        setTimeout(() => {
                            activeContent.style.animation = '';
                        }, 500);
                    }
                }, 400);
            }
        });
    }

    // Check localStorage for previously selected algorithm
    const savedAlgorithm = localStorage.getItem('selectedAlgorithm');
    if (savedAlgorithm) {
        // Set the dropdown title
        const selectedItem = document.querySelector(`.dropdown-item[data-value="${savedAlgorithm}"]`);
        if (selectedItem) {
            dropdownTitle.textContent = selectedItem.textContent;
            selectedItem.classList.add('selected');
        }
        
        // Show the saved content (without animation on page load)
        switchContent(savedAlgorithm, true);
    }

    // Toggle dropdown
    dropdownHeader.addEventListener('click', function() {
        isOpen = !isOpen;
        
        if (isOpen) {
            dropdownContent.classList.add('open');
            dropdownIcon.classList.add('open');
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
            
            // Switch content
            const selectedValue = this.getAttribute('data-value');
            switchContent(selectedValue);
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