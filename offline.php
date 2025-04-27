<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting Algorithms Quiz | SortArtOnline</title>
    <link rel="icon" href="assets/images/sort-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        /* Additional styles for the GitHub-like container */
        .repo-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .repo-container:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .repo-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .repo-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin: 0;
        }

        .repo-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s;
        }

        .repo-title a:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }

        .repo-description {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .repo-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .repo-meta-item {
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .repo-meta-item i {
            font-size: 1rem;
        }

        .repo-topics {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .repo-topic {
            background: var(--tag-bg);
            color: var(--tag-text);
            padding: 0.3rem 0.8rem;
            border-radius: 2rem;
            font-size: 0.8rem;
            transition: all 0.2s;
        }

        .repo-topic:hover {
            background: var(--tag-hover-bg);
            transform: scale(1.05);
        }

        .repo-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--border-color);
            padding-top: 1rem;
        }

        .repo-stats-left {
            display: flex;
            gap: 1rem;
        }

        .repo-stat {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .repo-btn {
            background: var(--btn-bg);
            color: var(--btn-text);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
        }

        .repo-btn:hover {
            background: var(--btn-hover-bg);
            transform: translateY(-1px);
        }

        .repo-btn i {
            font-size: 0.9rem;
        }

        /* Dark mode variables */
        :root {
            --card-bg: #ffffff;
           
            --text-secondary: #57606a;
            --tag-bg: #f6f8fa;
            --tag-text: #24292f;
            --tag-hover-bg: #eaeef2;
            --border-color: #d0d7de;
            --btn-bg: #f6f8fa;
            --btn-text: #24292f;
            --btn-hover-bg: #eaeef2;
        }

        .dark-mode {
            --card-bg: #1e1e1e;
          
            --text-secondary: #8b949e;
            --tag-bg: #30363d;
            --tag-text: #c9d1d9;
            --tag-hover-bg: #484f58;
            --border-color: #30363d;
            --btn-bg: #30363d;
            --btn-text: #c9d1d9;
            --btn-hover-bg: #484f58;
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
    <div class="container">
        <div class="repo-container">
            <div class="repo-header">
                <h2 class="repo-title">
                    <a href="https://github.com/yourusername/SortArtOnline" target="_blank">
                        <i class="fab fa-github"></i> SortArtOnline
                    </a>
                </h2>
                <button class="repo-btn">
                    <i class="far fa-star"></i> Star
                    <span class="star-count">1.2k</span>
                </button>
            </div>
            
            <p class="repo-description">
                An interactive platform for learning, visualizing, and testing your knowledge of sorting algorithms. 
                Includes educational content, visualization tools, and quizzes to master sorting algorithms.
            </p>
            
            <div class="repo-meta">
                <span class="repo-meta-item">
                    <i class="fas fa-code-branch"></i> 
                    <span>MIT License</span>
                </span>
                <span class="repo-meta-item">
                    <i class="fas fa-circle" style="color: #3fb950;"></i> 
                    <span>JavaScript</span>
                </span>
                <span class="repo-meta-item">
                    <i class="fas fa-eye"></i> 
                    <span>1.5k watches</span>
                </span>
                <span class="repo-meta-item">
                    <i class="fas fa-code-fork"></i> 
                    <span>342 forks</span>
                </span>
            </div>
            
            <div class="repo-topics">
                <span class="repo-topic">sorting-algorithms</span>
                <span class="repo-topic">visualization</span>
                <span class="repo-topic">education</span>
                <span class="repo-topic">javascript</span>
                <span class="repo-topic">web-app</span>
            </div>
            
            <div class="repo-stats">
                <div class="repo-stats-left">
                    <span class="repo-stat">
                        <i class="fas fa-history"></i> Updated 3 days ago
                    </span>
                    <span class="repo-stat">
                        <i class="far fa-calendar-alt"></i> Created 1 year ago
                    </span>
                </div>
                <button class="repo-btn" onclick="window.open('https://github.com/yourusername/SortArtOnline', '_blank')">
                    <i class="fas fa-external-link-alt"></i> View on GitHub
                </button>
            </div>
        </div>
    </div>

    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>
    
    <script src="assets/js/spinner.js"></script>

    <script>
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

            // Star button interaction
            const starBtn = document.querySelector('.repo-btn .fa-star').parentElement;
            let starred = false;
            let starCount = 1200;
            
            starBtn.addEventListener('click', function() {
                starred = !starred;
                const starIcon = this.querySelector('.fa-star');
                const countElement = this.querySelector('.star-count');
                
                if (starred) {
                    starIcon.classList.remove('far');
                    starIcon.classList.add('fas');
                    starCount++;
                    countElement.textContent = formatNumber(starCount);
                    this.style.color = '#ffac33';
                } else {
                    starIcon.classList.remove('fas');
                    starIcon.classList.add('far');
                    starCount--;
                    countElement.textContent = formatNumber(starCount);
                    this.style.color = '';
                }
            });

            // Format large numbers
            function formatNumber(num) {
                return num >= 1000 ? (num/1000).toFixed(1) + 'k' : num;
            }

            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const navLinks = document.getElementById('navLinks');
            
            if (mobileMenuBtn && navLinks) {
                mobileMenuBtn.addEventListener('click', function() {
                    navLinks.classList.toggle('active');
                });
            }
        });
    </script>
</body>
</html>