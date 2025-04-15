<button class="visualize-btn" onclick="window.location.href='sort-visualization'">
  Visualize
  <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
    <path d="M5 12h14M12 5l7 7-7 7"/>
  </svg>
</button>

<style>
.visualize-btn {
  position: relative;
  padding: 14px 28px;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  background: linear-gradient(45deg, #4ec9b0, #3aa897);
  border: none;
  border-radius: 8px;
  cursor: pointer;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(78, 201, 176, 0.3);
  transition: all 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-left:35%;
  /* Auto-bounce animation */
  animation: bounce 2s infinite, pulse-glow 3s infinite;
}

/* Bouncing effect */
@keyframes bounce {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-8px); }
}

/* Pulsing glow */
@keyframes pulse-glow {
  0% { box-shadow: 0 0 0 0 rgba(78, 201, 176, 0.7); }
  70% { box-shadow: 0 0 0 15px rgba(78, 201, 176, 0); }
  100% { box-shadow: 0 0 0 0 rgba(78, 201, 176, 0); }
}

/* Moving arrow (continuous) */
.visualize-btn .icon {
  display: inline-block;
  margin-left: 8px;
  animation: moveArrow 1s infinite alternate;
}

@keyframes moveArrow {
  0% { transform: translateX(0); }
  100% { transform: translateX(5px); }
}

/* Ripple effect */
.visualize-btn span.ripple {
  position: absolute;
  border-radius: 50%;
  background-color: rgba(255, 255, 255, 0.4);
  transform: scale(0);
  animation: ripple 0.6s linear;
  pointer-events: none;
}

@keyframes ripple {
  to {
    transform: scale(4);
    opacity: 0;
  }
}
</style>

<script>
document.querySelector('.visualize-btn').addEventListener('click', function(e) {
  e.preventDefault();
  
  // Ripple effect
  const ripple = document.createElement('span');
  ripple.classList.add('ripple');
  
  const rect = this.getBoundingClientRect();
  const size = Math.max(rect.width, rect.height);
  ripple.style.width = ripple.style.height = `${size}px`;
  ripple.style.left = `${e.clientX - rect.left - size/2}px`;
  ripple.style.top = `${e.clientY - rect.top - size/2}px`;
  
  this.appendChild(ripple);
  
  setTimeout(() => {
    ripple.remove();
    window.location.href = 'sort-visualization';
  }, 600);
});
</script>