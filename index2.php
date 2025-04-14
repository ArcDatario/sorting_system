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
    </style>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            Sort<span>Art</span>Online
        </div>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links" id="navLinks">
            <li><a href="home">Home</a></li>
            <li><a href="learn">Learn</a></li>
            <li><a href="quiz">Quiz</a></li>
            <li><a href="#">Offline</a></li>
        </ul>
    </nav>

    <!-- Main Container -->
    <div class="container">
      
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

    <!-- Footer -->

    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>

    <script src="assets/js/script.js"></script>

  

   

</body>
</html>