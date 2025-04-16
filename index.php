<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/sort-icon.png" type="image/png">
    <title>Bubble Sort Algorithm | SortArtOnline</title>
    <link rel="stylesheet" href="assets/css/styles.css">


    <style>
       /* Hero Section */
.hero {
    text-align: center;
    padding: 4rem 2rem;
    max-width: 800px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.hero-title {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    line-height: 1.2;
    color: var(--text-color);
}

.hero-highlight {
    color: var(--primary-color);
    position: relative;
    display: inline-block;
}

.hero-highlight::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--primary-color);
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.3s ease;
}

.hero:hover .hero-highlight::after {
    transform: scaleX(1);
    transform-origin: left;
}

.hero-subtitle {
    font-size: 1.2rem;
    color: var(--text-light);
    margin-bottom: 3rem;
}

/* Animated Button */
.btn-container {
    position: relative;
    display: inline-block;
    margin: 2rem 0;
}

.cta-btn {
    position: relative;
    display: inline-block;
    padding: 1rem 2.5rem;
    background: var(--primary-color);
    color: white;
    border-radius: 50px;
    font-weight: bold;
    text-decoration: none;
    overflow: hidden;
    z-index: 1;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.cta-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.wave {
    position: absolute;
    top: -100%;
    left: 0;
    width: 100%;
    height: 300%;
    background: linear-gradient(
        to right,
        rgba(255, 255, 255, 0.1),
        rgba(255, 255, 255, 0.3),
        rgba(255, 255, 255, 0.1)
    );
    transform: rotate(20deg);
    animation: wave 3s infinite linear;
    z-index: -1;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.cta-btn:hover .wave {
    opacity: 1;
}

@keyframes wave {
    0% {
        left: -100%;
    }
    100% {
        left: 100%;
    }
}

/* Value Proposition */
.value-prop {
    margin-top: 4rem;
    text-align: center;
}

.value-card {
    background: var(--code-bg);
    padding: 2rem;
    border-radius: 12px;
    max-width: 600px;
    margin: 0 auto;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    border: 1px solid var(--border-color);
}

.value-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.value-card h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.value-card p {
    color: var(--text-light);
}

/* Dark mode specific adjustments */
body.dark-mode .hero-title {
    color: var(--text-color);
}

body.dark-mode .hero-subtitle {
    color: var(--text-light);
}

body.dark-mode .value-card {
    background: var(--code-bg);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

body.dark-mode .cta-btn {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

body.dark-mode .cta-btn:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
}

/* Sorting Animation Elements */
.sorting-elements {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
    overflow: hidden;
}

.sorting-element {
    position: absolute;
    border-radius: 50%;
    opacity: 0.7;
    filter: blur(1px);
    animation: float 15s infinite linear;
}

@keyframes float {
    0% {
        transform: translateY(0) translateX(0) rotate(0deg);
    }
    25% {
        transform: translateY(-20vh) translateX(10vw) rotate(90deg);
    }
    50% {
        transform: translateY(10vh) translateX(20vw) rotate(180deg);
    }
    75% {
        transform: translateY(-15vh) translateX(-10vw) rotate(270deg);
    }
    100% {
        transform: translateY(0) translateX(0) rotate(360deg);
    }
}

/* Specific element styles */
.sorting-element:nth-child(1) {
    width: 30px;
    height: 30px;
    background: var(--primary-color);
    top: 20%;
    left: 10%;
    animation-duration: 18s;
    animation-delay: 0s;
}

.sorting-element:nth-child(2) {
    width: 40px;
    height: 40px;
    background: var(--secondary-color);
    top: 60%;
    left: 80%;
    animation-duration: 22s;
    animation-delay: 2s;
}

.sorting-element:nth-child(3) {
    width: 25px;
    height: 25px;
    background: var(--highlight-color);
    top: 30%;
    left: 50%;
    animation-duration: 20s;
    animation-delay: 1s;
}

.sorting-element:nth-child(4) {
    width: 35px;
    height: 35px;
    background: var(--primary-color);
    top: 70%;
    left: 30%;
    animation-duration: 25s;
    animation-delay: 3s;
}

.sorting-element:nth-child(5) {
    width: 20px;
    height: 20px;
    background: var(--secondary-color);
    top: 40%;
    left: 20%;
    animation-duration: 17s;
    animation-delay: 4s;
}

/* Dark mode adjustments for sorting elements */
body.dark-mode .sorting-element {
    opacity: 0.5;
    filter: blur(0.5px);
}

   /* Additional animation path */
        @keyframes floatReverse {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
            25% {
                transform: translateY(15vh) translateX(-10vw) rotate(-90deg);
            }
            50% {
                transform: translateY(-10vh) translateX(-20vw) rotate(-180deg);
            }
            75% {
                transform: translateY(20vh) translateX(10vw) rotate(-270deg);
            }
            100% {
                transform: translateY(0) translateX(0) rotate(-360deg);
            }
        }

        .cta-btn {
        animation: shake 2s ease-in-out infinite;
        display: inline-block; /* Ensure the animation works properly */
    }
    .cta-btn:hover {
    animation: shake 0.5s ease-in-out;
}
    
    @keyframes shake {
        0%, 100% {
            transform: scale(1);
        }
        10%, 30%, 50%, 70%, 90% {
            transform: scale(1.05) rotate(-2deg);
        }
        20%, 40%, 60%, 80% {
            transform: scale(1.05) rotate(2deg);
        }
    }
    </style>

</head>
<body>
<div class="loader-container">
  <div class="loader-spinner">
    <div class="sorting-bars"></div>
    <div class="loader-text">Loading</div>
  </div>
</div>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            Sort<span>Art</span>Online
        </div>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links" id="navLinks">
            <li><a href="home">Home</a></li>
            <li><a href="learn">Learn</a></li>
            <li><a href="sort-visualization">Visualize</a></li>
            <li><a href="quiz">Quiz</a></li>
            <li><a href="offline">Offline</a></li>
        </ul>
    </nav>

  
   
    <!-- Main Container -->
    <div class="container page-content" style="opacity: 0;">
        <main class="main-content">
            <!-- Hero Section -->
            <section class="hero">
                <h1 class="hero-title">Master Sorting Algorithms <span class="hero-highlight">Visually</span></h1>
                <p class="hero-subtitle">Understand how sorting works through interactive visualizations and step-by-step explanations</p>
                
                <!-- Animated Button -->
                <div class="btn-container">
                    <a href="learn" class="cta-btn">
                        <span>Start Learning Now</span>
                        <div class="wave"></div>
                    </a>
                </div>
            </section>

            <!-- Value Proposition -->
            <section class="value-prop">
                <div class="value-card">
                    <h3>Why Sorting Matters</h3>
                    <p>Sorting is fundamental to efficient data organization and retrieval. From databases to search algorithms, mastering sorting unlocks better problem-solving skills.</p>
                </div>
            </section>
        </main>
    </div>

       

    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>

    <script src="assets/js/script.js"></script>

   
    <script src="assets/js/spinner.js"></script>

</body>
</html>