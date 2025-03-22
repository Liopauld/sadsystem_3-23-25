<?php 
session_start(); 
include 'includes/header.php'; 
?>

<style>
    /* General Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #2E8B57, #228B22);
        margin: 0;
        padding: 0;
        text-align: center;
        color: white;
        position: relative;
        overflow-x: hidden;
    }

    /* New Side Elements - Animated Plant Growth */
    .side-container {
        position: fixed;
        top: 0;
        height: 100%;
        width: 15%;
        z-index: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        pointer-events: none;
        overflow: hidden;
    }

    .left-side {
        left: 0;
    }

    .right-side {
        right: 0;
    }

    /* Plant Growth Animation */
    .plant-container {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 100%;
    }

    .plant-stem {
        position: absolute;
        bottom: 0;
        width: 6px;
        background: linear-gradient(to top, #3a6a47, #8bc34a);
        border-radius: 3px;
        transform-origin: bottom center;
        animation: growPlant 15s ease-out forwards;
    }

    .plant-leaf {
        position: absolute;
        width: 30px;
        height: 15px;
        background: linear-gradient(to bottom right, #8bc34a, #4caf50);
        border-radius: 50% 50% 50% 0;
        transform-origin: bottom left;
        opacity: 0;
        animation: growLeaf 3s ease-out forwards;
    }

    .plant-flower {
        position: absolute;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: radial-gradient(circle, #ffffff, #f1c40f);
        transform: scale(0);
        opacity: 0;
        animation: bloomFlower 4s ease-out forwards;
    }

    @keyframes growPlant {
        0% { height: 0; }
        100% { height: 80%; }
    }

    @keyframes growLeaf {
        0% { transform: scale(0) rotate(-10deg); opacity: 0; }
        100% { transform: scale(1) rotate(-10deg); opacity: 1; }
    }

    @keyframes bloomFlower {
        0% { transform: scale(0); opacity: 0; }
        70% { transform: scale(1.2); opacity: 0.8; }
        100% { transform: scale(1); opacity: 1; }
    }

    /* Particle Ecosystem Animation */
    .particle-container {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
    }

    .particle {
        position: absolute;
        border-radius: 50%;
        opacity: 0.6;
        filter: blur(1px);
        animation: floatParticle 20s infinite linear;
    }

    .particle.water {
        background-color: #3498db;
    }

    .particle.earth {
        background-color: #8B4513;
    }

    .particle.air {
        background-color: #ffffff;
    }

    .particle-line {
        position: absolute;
        height: 1px;
        background: rgba(255, 255, 255, 0.2);
        transform-origin: left center;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    @keyframes floatParticle {
        0% { transform: translate(0, 0); }
        25% { transform: translate(30%, 20%); }
        50% { transform: translate(10%, 40%); }
        75% { transform: translate(-20%, 20%); }
        100% { transform: translate(0, 0); }
    }

    /* Fun Facts Box in Bottom Left */
    .fun-facts-container {
        position: fixed;
        bottom: 20px;
        left: 20px;
        background: rgba(0, 0, 0, 0.6);
        border-radius: 10px;
        padding: 15px;
        max-width: 300px;
        text-align: left;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        border-left: 4px solid #4CAF50;
        z-index: 10;
        backdrop-filter: blur(5px);
        transition: opacity 0.5s ease;
    }

    .fun-facts-title {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
        color: #4CAF50;
        font-weight: bold;
    }

    .fun-facts-title i {
        margin-right: 8px;
    }

    .fun-fact {
        font-size: 14px;
        line-height: 1.4;
        display: none;
        animation: fadeFact 20s linear infinite;
    }

    .fun-fact.active {
        display: block;
    }

    @keyframes fadeFact {
        0%, 100% { opacity: 0; }
        10%, 90% { opacity: 1; }
    }

    /* Progress bar for fact timing */
    .fact-progress {
        margin-top: 10px;
        width: 100%;
        height: 3px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
        overflow: hidden;
    }

    .fact-progress-bar {
        width: 0%;
        height: 100%;
        background: #4CAF50;
        animation: progressBar 20s linear infinite;
    }

    @keyframes progressBar {
        0% { width: 0%; }
        100% { width: 100%; }
    }

    /* Hub container styles */
    .hub-container {
        max-width: 1000px;
        margin: auto;
        padding: 20px;
        position: relative;
        z-index: 1;
    }

    /* Improved Engaging Heading */
    .hub-title {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.5);
        background: linear-gradient(45deg, #ffffff, #4CAF50, #ffffff);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        position: relative;
        display: inline-block;
        padding: 0 10px;
        animation: titleGlow 3s infinite alternate;
    }

    @keyframes titleGlow {
        0% { text-shadow: 0 0 10px rgba(76, 175, 80, 0.5); }
        100% { text-shadow: 0 0 20px rgba(76, 175, 80, 0.9), 0 0 30px rgba(255, 255, 255, 0.7); }
    }

    .hub-title::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #ffffff, transparent);
        border-radius: 3px;
    }

    /* Fixed Search Bar */
    .search-container {
        width: 100%;
        max-width: 500px;
        height: 60px;
        margin: 0 auto 20px auto;
        position: relative;
    }

    .search-bar {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 20px;
        font-size: 16px;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        position: absolute;
        top: 0;
        left: 0;
    }

    /* Cards Layout */
    .cards-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    min-height: 300px; /* Ensure container doesn't collapse */
    margin-top: 20px; /* Add margin to separate from search bar */
}

    .card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 250px;
        height: 250px;
        text-align: center;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor: pointer;
        position: relative;
        color: black;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }

    .card i {
        font-size: 50px;
        color: #2ECC71;
        margin-bottom: 10px;
    }

    .card h3 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.9);
        width: 60%;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        padding: 20px;
        z-index: 1000;
        text-align: left;
        max-height: 80vh;
        overflow-y: auto;
        opacity: 0;
        transition: all 0.3s ease-in-out;
        color: black;
    }

    .modal.show {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
        display: block;
    }

    .modal h3 {
        margin-top: 0;
    }

    .modal-content {
        padding: 10px;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        background: #ff4d4d;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 5px;
        transition: 0.3s ease-in-out;
    }

    .close-btn:hover {
        background: #cc0000;
    }

    /* Overlay Background */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    .overlay.show {
        display: block;
    }

    /* Recycling & Upcycling Modal Styles */
    .modal ul {
        list-style-type: none;
        padding-left: 0;
    }
    
    .modal ul li {
        margin-bottom: 10px;
        padding-left: 20px;
        position: relative;
    }
    
    .modal ul li:before {
        content: "🌱";
        position: absolute;
        left: 0;
    }

    /* Gamification Modal Styles */
    .game-container {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .game-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        font-size: 1.2em;
    }

    .game-area {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .waste-items {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        min-height: 150px;
        background: #fff;
        padding: 10px;
        border-radius: 8px;
        border: 2px dashed #dee2e6;
    }

    .bins {
        display: flex;
        justify-content: space-around;
        gap: 10px;
    }

    .bin {
        flex: 1;
        text-align: center;
        padding: 15px;
        background: #fff;
        border-radius: 8px;
        border: 2px solid #dee2e6;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .bin:hover {
        border-color: #28a745;
        transform: translateY(-2px);
    }

    .bin i {
        font-size: 2em;
        margin-bottom: 5px;
    }

    /* News Modal Styles */
    .news-feed {
        max-height: 400px;
        overflow-y: auto;
    }

    .news-item {
        background: #fff;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .news-date {
        color: #6c757d;
        font-size: 0.9em;
        margin-bottom: 5px;
    }

    .read-more {
        color: #28a745;
        text-decoration: none;
        font-weight: 500;
    }

    .read-more:hover {
        text-decoration: underline;
    }

    /* Community Modal Styles */
    .post-creation textarea {
        min-height: 100px;
        resize: vertical;
    }

    .post {
        background: #fff;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .post-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .post-content {
        margin: 10px 0;
    }

    .post-image {
        width: 100%;
        border-radius: 8px;
        margin: 10px 0;
    }

    .post-actions {
        display: flex;
        gap: 10px;
    }

    /* Media Modal Styles */
    .media-gallery {
        max-height: 500px;
        overflow-y: auto;
    }

    .media-section {
        margin-bottom: 30px;
    }

    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 15px;
    }

    .video-item {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .video-item iframe {
        width: 100%;
        height: 200px;
    }

    .video-item h5 {
        padding: 10px;
        margin: 0;
    }

    .interactive-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 15px;
    }

    .interactive-item {
        background: #fff;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .interactive-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .success-stories {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 15px;
    }

    .story-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .story-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .story-card h5 {
        padding: 10px;
        margin: 0;
    }

    .story-card p {
        padding: 0 10px 10px;
        margin: 0;
    }

    .story-card button {
        margin: 10px;
    }
</style>

<!-- Left side decorative elements -->
<div class="side-container left-side">
    <!-- Plant Growth Animation -->
    <div class="plant-container" id="leftPlants"></div>
    
    <!-- Particle Ecosystem -->
    <div class="particle-container" id="leftParticles"></div>
</div>

<!-- Right side decorative elements -->
<div class="side-container right-side">
    <!-- Plant Growth Animation -->
    <div class="plant-container" id="rightPlants"></div>
    
    <!-- Particle Ecosystem -->
    <div class="particle-container" id="rightParticles"></div>
</div>

<!-- Fun Facts Container -->
<div class="fun-facts-container">
    <div class="fun-facts-title">
        <i class="fas fa-lightbulb"></i> Did You Know?
    </div>
    <div class="fun-fact active">The average American throws away about 4.5 pounds of waste every day, totaling 1,642 pounds per person annually.</div>
    <div class="fun-fact">Recycling one aluminum can saves enough energy to power a TV for three hours.</div>
    <div class="fun-fact">If all newspaper was recycled, we could save about 250 million trees each year.</div>
    <div class="fun-fact">Plastics can take up to 1,000 years to decompose in landfills.</div>
    <div class="fun-fact">Glass bottles take 4,000 years to decompose, but can be recycled indefinitely without losing quality.</div>
    <div class="fun-fact">The Great Pacific Garbage Patch is a collection of marine debris estimated to be twice the size of Texas.</div>
    <div class="fun-fact">Composting food waste reduces methane emissions from landfills and creates nutrient-rich soil.</div>
    <div class="fun-fact">E-waste represents only 2% of trash in landfills but accounts for 70% of toxic waste.</div>
    <div class="fun-fact">The energy saved from recycling one glass bottle can power a computer for 25 minutes.</div>
    <div class="fun-fact">Americans throw away enough office paper each year to build a 12-foot-high wall from Los Angeles to New York City.</div>
    <div class="fact-progress">
        <div class="fact-progress-bar"></div>
    </div>
</div>

<div class="hub-container">
    <h2 class="hub-title">Community Hub</h2>

    <!-- Search Bar in Fixed Container -->
    <div class="search-container">
        <input type="text" id="search" class="search-bar" placeholder="🔍 Search sections..." onkeyup="filterCards()">
    </div>

    <div class="cards-container">
        <div class="card" data-name="education" onclick="openModal('education')">
            <i class="fas fa-book"></i>
            <h3>Waste Management 📚</h3>
        </div>
        <div class="card" data-name="recycling" onclick="openModal('recycling')">
            <i class="fas fa-recycle"></i>
            <h3>Recycling & Upcycling 🔄</h3>
        </div>
        <div class="card" data-name="gamification" onclick="openModal('gamification')">
            <i class="fas fa-gamepad"></i>
            <h3>Gamification & Challenges 🎯</h3>
        </div>
        <div class="card" data-name="news" onclick="openModal('news')">
            <i class="fas fa-newspaper"></i>
            <h3>News & Awareness Hub 📰</h3>
        </div>
        <div class="card" data-name="community" onclick="openModal('community')">
            <i class="fas fa-exclamation-triangle"></i>
            <h3>Community Interaction ⚠️</h3>
        </div>
        <div class="card" data-name="media" onclick="openModal('media')">
            <i class="fas fa-photo-video"></i>
            <h3>Fun & Engaging Media 🎥</h3>
        </div>
    </div>
</div>

<!-- Overlay Background -->
<div class="overlay" id="overlay" onclick="closeModal()"></div>

<!-- Modals -->
<div class="modal" id="education">
    <button class="close-btn" onclick="closeModal()">✖</button>
    <h3>Waste Management Education 📚</h3>
    
    <!-- Image -->
    <div style="display: flex; justify-content: center; margin-bottom: 15px;">
    <img src="assets/waste-management.jpg" alt="Waste Management" style="width: 10%; border-radius: 100px;">
</div>

    
    <!-- Introduction -->
    <p>Proper waste management is essential for environmental sustainability. Understanding different waste types and how to handle them can help reduce pollution and improve our ecosystem.</p>

    <!-- Video -->
    <iframe width="100%" height="250px" style="border-radius: 10px;"
        src="https://www.youtube.com/embed/OasbYWF4_S8" 
        title="Waste Segregation" frameborder="0" allowfullscreen>
    </iframe>

    <!-- Sections -->
    <h4>🔹 Types of Waste</h4>
    <ul>
        <li><b>Biodegradable:</b> Organic waste like food scraps and garden waste.</li>
        <li><b>Non-Biodegradable:</b> Plastics, metals, and glass that take longer to decompose.</li>
        <li><b>Hazardous Waste:</b> Chemicals, batteries, and medical waste requiring special disposal.</li>
    </ul>

    <h4>🔹 Waste Segregation Tips</h4>
    <ul>
        <li>Use **separate bins** for biodegradable and non-biodegradable waste.</li>
        <li>Reduce, Reuse, and Recycle whenever possible.</li>
        <li>Avoid using single-use plastics.</li>
    </ul>

    <h4>🔹 Benefits of Proper Waste Management</h4>
    <p>✅ Reduces pollution and protects natural resources.</p>
    <p>✅ Helps in composting organic waste for soil enrichment.</p>
    <p>✅ Minimizes landfill waste and improves community cleanliness.</p>

    <p style="text-align: center; margin-top: 15px;">
        <b>🌍 Small actions lead to a big impact! Start segregating your waste today. ♻</b>
    </p>
</div>


<div class="modal" id="recycling">
    <button class="close-btn" onclick="closeModal()">✖</button>
    <h3>Recycling & Upcycling Tips 🔄</h3>
    
    <!-- Introduction -->
    <p>Transform your waste into something beautiful and useful! Learn creative ways to repurpose items and reduce landfill waste.</p>

    <!-- Video Tutorial -->
    <iframe width="100%" height="250px" style="border-radius: 10px; margin-bottom: 20px;"
        src="https://www.youtube.com/embed/8Jt9qXqXqXq" 
        title="Upcycling Tutorial" frameborder="0" allowfullscreen>
    </iframe>

    <!-- Tutorial Sections -->
    <h4>🔹 Basic Upcycling Projects</h4>
    <ul>
        <li><b>Plastic Bottle Planters:</b> Transform empty bottles into beautiful hanging gardens</li>
        <li><b>Old T-Shirt Tote Bags:</b> Create eco-friendly shopping bags from worn-out shirts</li>
        <li><b>Glass Jar Lanterns:</b> Turn empty jars into decorative lighting</li>
    </ul>

    <h4>🔹 Advanced Projects</h4>
    <ul>
        <li><b>Furniture Upcycling:</b> Give old furniture new life with paint and creativity</li>
        <li><b>Electronic Waste Art:</b> Create unique sculptures from old gadgets</li>
        <li><b>Textile Recycling:</b> Make quilts and rugs from old clothes</li>
    </ul>

    <h4>🔹 Tips for Success</h4>
    <ul>
        <li>Start with simple projects and gradually increase complexity</li>
        <li>Use proper safety equipment when working with tools</li>
        <li>Join online upcycling communities for inspiration</li>
    </ul>

    <div class="text-center mt-4">
        <a href="https://www.upcycling.com/tutorials" class="btn btn-success" target="_blank">
            <i class="fas fa-external-link-alt"></i> View More Tutorials
        </a>
    </div>
</div>

<div class="modal" id="gamification">
    <button class="close-btn" onclick="closeModal()">✖</button>
    <h3>Gamification & Challenges 🎯</h3>
    
    <!-- Game Container -->
    <div id="wasteSortingGame" class="game-container">
        <div class="game-header">
            <div class="score">Score: <span id="score">0</span></div>
            <div class="timer">Time: <span id="timer">60</span>s</div>
        </div>
        
        <div class="game-area">
            <div class="waste-items" id="wasteItems">
                <!-- Items will be dynamically added here -->
            </div>
            
            <div class="bins">
                <div class="bin" data-type="recyclable">
                    <i class="fas fa-recycle"></i>
                    <span>Recyclable</span>
                </div>
                <div class="bin" data-type="organic">
                    <i class="fas fa-leaf"></i>
                    <span>Organic</span>
                </div>
                <div class="bin" data-type="hazardous">
                    <i class="fas fa-skull-crossbones"></i>
                    <span>Hazardous</span>
                </div>
            </div>
        </div>
        
        <button id="startGame" class="btn btn-primary mt-3">Start Game</button>
    </div>

    <!-- Daily Challenges -->
    <div class="challenges-section mt-4">
        <h4>Daily Challenges</h4>
        <div class="challenge-card">
            <h5>🌱 Today's Challenge</h5>
            <p>Create a DIY compost bin and share your progress!</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 0%"></div>
            </div>
            <button class="btn btn-outline-success mt-2">Accept Challenge</button>
        </div>
    </div>
</div>

<div class="modal" id="news">
    <button class="close-btn" onclick="closeModal()">✖</button>
    <h3>News & Awareness Hub 📰</h3>
    
    <!-- Latest News Section -->
    <div class="news-feed">
        <div class="news-item">
            <div class="news-date">March 15, 2024</div>
            <h5>Global Recycling Day: New Initiatives Announced</h5>
            <p>World leaders come together to announce new recycling initiatives aimed at reducing plastic waste by 50% by 2030.</p>
            <a href="#" class="read-more">Read More</a>
        </div>

        <div class="news-item">
            <div class="news-date">March 14, 2024</div>
            <h5>Breakthrough in Plastic Recycling Technology</h5>
            <p>Scientists develop new method to recycle previously unrecyclable plastics, offering hope for reducing landfill waste.</p>
            <a href="#" class="read-more">Read More</a>
        </div>

        <div class="news-item">
            <div class="news-date">March 13, 2024</div>
            <h5>Community Success: Zero Waste Town Achieves 90% Recycling Rate</h5>
            <p>Small town sets example for sustainable waste management practices.</p>
            <a href="#" class="read-more">Read More</a>
        </div>
    </div>

    <!-- Subscribe Section -->
    <div class="subscribe-section mt-4">
        <h5>Stay Updated</h5>
        <form class="newsletter-form">
            <input type="email" placeholder="Enter your email" class="form-control">
            <button type="submit" class="btn btn-success mt-2">Subscribe</button>
        </form>
    </div>
</div>

<div class="modal" id="community">
    <button class="close-btn" onclick="closeModal()">✖</button>
    <h3>Community Interaction ⚠️</h3>
    
    <!-- Post Creation -->
    <div class="post-creation mb-4">
        <textarea class="form-control" placeholder="Share your waste management story or tip..."></textarea>
        <div class="post-actions mt-2">
            <button class="btn btn-outline-primary"><i class="fas fa-image"></i> Add Photo</button>
            <button class="btn btn-success">Post</button>
        </div>
    </div>

    <!-- Community Feed -->
    <div class="community-feed">
        <div class="post">
            <div class="post-header">
                <img src="assets/community/avatar1.jpg" alt="User" class="avatar">
                <div class="post-info">
                    <h6>Sarah Johnson</h6>
                    <small>2 hours ago</small>
                </div>
            </div>
            <div class="post-content">
                <p>Just started my zero-waste journey! Here's my first attempt at making reusable shopping bags from old t-shirts. #ZeroWaste #Upcycling</p>
                <img src="assets/community/post1.jpg" alt="Upcycling Project" class="post-image">
            </div>
            <div class="post-actions">
                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-heart"></i> Like</button>
                <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-comment"></i> Comment</button>
                <button class="btn btn-sm btn-outline-success"><i class="fas fa-share"></i> Share</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="media">
    <button class="close-btn" onclick="closeModal()">✖</button>
    <h3>Fun & Engaging Media 🎥</h3>
    
    <!-- Media Gallery -->
    <div class="media-gallery">
        <!-- Videos Section -->
        <div class="media-section">
            <h4>Educational Videos</h4>
            <div class="video-grid">
                <div class="video-item">
                    <iframe src="https://www.youtube.com/embed/VIDEO_ID1" frameborder="0" allowfullscreen></iframe>
                    <h5>How to Start Composting</h5>
                </div>
                <div class="video-item">
                    <iframe src="https://www.youtube.com/embed/VIDEO_ID2" frameborder="0" allowfullscreen></iframe>
                    <h5>DIY Recycling Projects</h5>
                </div>
            </div>
        </div>

        <!-- Interactive Content -->
        <div class="media-section">
            <h4>Interactive Content</h4>
            <div class="interactive-grid">
                <div class="interactive-item">
                    <img src="assets/media/quiz.jpg" alt="Interactive Quiz">
                    <h5>Test Your Recycling Knowledge</h5>
                    <button class="btn btn-primary">Take Quiz</button>
                </div>
                <div class="interactive-item">
                    <img src="assets/media/virtual-tour.jpg" alt="Virtual Tour">
                    <h5>Virtual Recycling Center Tour</h5>
                    <button class="btn btn-primary">Start Tour</button>
                </div>
            </div>
        </div>

        <!-- Success Stories -->
        <div class="media-section">
            <h4>Success Stories</h4>
            <div class="success-stories">
                <div class="story-card">
                    <img src="assets/media/success-story.jpg" alt="Success Story">
                    <h5>From Waste to Wonder</h5>
                    <p>See how one community transformed their waste management practices.</p>
                    <button class="btn btn-outline-success">Read Story</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Modal Functions
    function openModal(id) {
        document.getElementById(id).classList.add("show");
        document.getElementById("overlay").classList.add("show");
    }

    function closeModal() {
        document.querySelectorAll('.modal').forEach(modal => modal.classList.remove("show"));
        document.getElementById("overlay").classList.remove("show");
    }

    function filterCards() {
    let input = document.getElementById("search").value.toLowerCase();
    let cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        let name = card.dataset.name.toLowerCase();
        if (name.includes(input)) {
            card.style.display = "block"; // Show matching cards
        } else {
            card.style.display = "none"; // Hide non-matching cards
        }
    });
}
    // Create Animated Plant Growth
    function createPlants(containerId, plantsCount) {
        const container = document.getElementById(containerId);
        
        for (let i = 0; i < plantsCount; i++) {
            // Create stem
            const stem = document.createElement('div');
            stem.className = 'plant-stem';
            
            // Random positioning and delays
            const leftPos = 10 + Math.random() * 80; // % within container
            stem.style.left = leftPos + '%';
            stem.style.animationDelay = (Math.random() * 5) + 's';
            
            // Add stem to container
            container.appendChild(stem);
            
            // Create leaves at different heights
            const leafCount = 2 + Math.floor(Math.random() * 4); // 2-5 leaves
            for (let j = 0; j < leafCount; j++) {
                const leaf = document.createElement('div');
                leaf.className = 'plant-leaf';
                
                // Position leaf on stem at different heights
                const leafHeight = 20 + (j * 20); // % of stem height
                leaf.style.bottom = leafHeight + '%';
                leaf.style.left = '100%'; // Attach to right side of stem
                
                // Alternate sides for leaves
                if (j % 2 === 0) {
                    leaf.style.left = '-100%';
                    leaf.style.transform = 'rotate(10deg)';
                    leaf.style.borderRadius = '50% 50% 0 50%';
                }
                
                // Random delays for growth
                leaf.style.animationDelay = (stem.style.animationDelay.replace('s', '') * 1 + 1 + j) + 's';
                
                stem.appendChild(leaf);
            }
            
            // Add flower at top for some plants
            if (Math.random() > 0.5) {
                const flower = document.createElement('div');
                flower.className = 'plant-flower';
                flower.style.top = '-10px';
                flower.style.left = '-7px';
                flower.style.animationDelay = (stem.style.animationDelay.replace('s', '') * 1 + 5) + 's';
                
                // Random flower colors
                const colors = ['#f1c40f', '#e74c3c', '#9b59b6', '#3498db', '#1abc9c'];
                const randomColor = colors[Math.floor(Math.random() * colors.length)];
                flower.style.background = `radial-gradient(circle, #ffffff, ${randomColor})`;
                
                stem.appendChild(flower);
            }
        }
    }
    
    // Create Particle Ecosystem
    function createParticles(containerId, particleCount) {
        const container = document.getElementById(containerId);
        const types = ['water', 'earth', 'air'];
        const particles = [];
        
        // Create particles
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle ' + types[Math.floor(Math.random() * types.length)];
            
            // Random size (2-6px)
            const size = 2 + (Math.random() * 4);
            particle.style.width = size + 'px';
            particle.style.height = size + 'px';
            
            // Random position
            const left = Math.random() * 100;
            const top = Math.random() * 100;
            particle.style.left = left + '%';
            particle.style.top = top + '%';
            
            // Random animation duration and delay
            const duration = 15 + (Math.random() * 10);
            const delay = Math.random() * 10;
            particle.style.animationDuration = duration + 's';
            particle.style.animationDelay = delay + 's';
            
            container.appendChild(particle);
            particles.push({
                element: particle,
                left: left,
                top: top
            });
        }
        
        // Create connections between nearby particles
        function updateConnections() {
            // Remove existing connections
            container.querySelectorAll('.particle-line').forEach(line => line.remove());
            
            // Check distances and create connections
            for (let i = 0; i < particles.length; i++) {
                const p1 = particles[i];
                const rect1 = p1.element.getBoundingClientRect();
                
                for (let j = i + 1; j < particles.length; j++) {
                    const p2 = particles[j];
                    const rect2 = p2.element.getBoundingClientRect();
                    
                    // Calculate distance
                    const dx = rect2.left - rect1.left;
                    const dy = rect2.top - rect1.top;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    
                    // If particles are close, create a connection
                    if (distance < 100) {
                        const line = document.createElement('div');
                        line.className = 'particle-line';
                        
                        // Position and rotate line to connect particles
                        line.style.width = distance + 'px';
                        line.style.left = rect1.left + 'px';
                        line.style.top = (rect1.top + rect1.height/2) + 'px';
                        
                        // Calculate angle
                        const angle = Math.atan2(dy, dx) * 180 / Math.PI;
                        line.style.transform = `rotate(${angle}deg)`;
                        
                        // Opacity based on distance
                        const opacity = 1 - (distance / 100);
                        line.style.opacity = opacity;
                        
                        container.appendChild(line);
                    }
                }
            }
            
            requestAnimationFrame(updateConnections);
        }
        
        // Initialize connection updates
        updateConnections();
        
        // Interactive particle behavior
        document.addEventListener('mousemove', function(event) {
            // Adjust particles on mousemove
            const mouseX = event.clientX;
            const mouseY = event.clientY;
            
            particles.forEach(p => {
                const rect = p.element.getBoundingClientRect();
                const dx = mouseX - rect.left;
                const dy = mouseY - rect.top;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 150) {
                    // Move away from cursor slightly
                    const factor = 1 - (distance / 150);
                    const moveX = dx * factor * 0.1;
                    const moveY = dy * factor * 0.1;
                    
                    const newLeft = parseFloat(p.element.style.left) - moveX;
                    const newTop = parseFloat(p.element.style.top) - moveY;
                    
                    p.element.style.left = newLeft + '%';
                    p.element.style.top = newTop + '%';
                }
            });
        });
    }
    
    // Initialize all animations
    window.addEventListener('DOMContentLoaded', (event) => {
        // Create plants on both sides
        createPlants('leftPlants', 5);
        createPlants('rightPlants', 5);
        
        // Create particle ecosystems
        createParticles('leftParticles', 20);
        createParticles('rightParticles', 20);
        
        // Start rotating facts
        rotateFacts();
    });

    // Rotating fun facts functionality
    function rotateFacts() {
        const facts = document.querySelectorAll('.fun-fact');
        let currentIndex = 0;
        
        setInterval(() => {
            facts.forEach((fact, index) => {
                fact.classList.remove('active');
            });
            
            currentIndex = (currentIndex + 1) % facts.length;
            facts[currentIndex].classList.add('active');
            
            // Reset animation for progress bar
            const progressBar = document.querySelector('.fact-progress-bar');
            progressBar.style.animation = 'none';
            progressBar.offsetHeight; // Trigger reflow
            progressBar.style.animation = 'progressBar 20s linear infinite';
        }, 20000); // 20 seconds
    }

    // Existing function for card filtering
    function filterCards() {
        let input = document.getElementById("search").value.toLowerCase();
        let cards = document.querySelectorAll(".card");

        cards.forEach(card => {
            let name = card.dataset.name.toLowerCase();
            if (name.includes(input)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }

    // Waste Sorting Game
    const wasteItems = [
        { name: 'Plastic Bottle', type: 'recyclable', image: 'assets/waste/plastic-bottle.jpg' },
        { name: 'Apple Core', type: 'organic', image: 'assets/waste/apple-core.jpg' },
        { name: 'Battery', type: 'hazardous', image: 'assets/waste/battery.jpg' },
        { name: 'Paper', type: 'recyclable', image: 'assets/waste/paper.jpg' },
        { name: 'Banana Peel', type: 'organic', image: 'assets/waste/banana-peel.jpg' },
        { name: 'Paint Can', type: 'hazardous', image: 'assets/waste/paint-can.jpg' },
        { name: 'Glass Bottle', type: 'recyclable', image: 'assets/waste/glass-bottle.jpg' },
        { name: 'Coffee Grounds', type: 'organic', image: 'assets/waste/coffee-grounds.jpg' },
        { name: 'Medicine', type: 'hazardous', image: 'assets/waste/medicine.jpg' }
    ];

    let currentScore = 0;
    let timeLeft = 60;
    let gameInterval;
    let currentItems = [];

    function startGame() {
        currentScore = 0;
        timeLeft = 60;
        document.getElementById('score').textContent = currentScore;
        document.getElementById('timer').textContent = timeLeft;
        document.getElementById('startGame').disabled = true;
        
        // Clear previous items
        const wasteItemsContainer = document.getElementById('wasteItems');
        wasteItemsContainer.innerHTML = '';
        
        // Add new items
        currentItems = shuffleArray([...wasteItems]).slice(0, 6);
        currentItems.forEach(item => {
            const itemElement = createWasteItem(item);
            wasteItemsContainer.appendChild(itemElement);
        });

        // Start timer
        gameInterval = setInterval(updateTimer, 1000);
    }

    function createWasteItem(item) {
        const div = document.createElement('div');
        div.className = 'waste-item';
        div.draggable = true;
        div.dataset.type = item.type;
        
        const img = document.createElement('img');
        img.src = item.image;
        img.alt = item.name;
        img.style.width = '100%';
        img.style.height = '100%';
        img.style.objectFit = 'contain';
        
        div.appendChild(img);
        
        // Add drag events
        div.addEventListener('dragstart', handleDragStart);
        div.addEventListener('dragend', handleDragEnd);
        
        return div;
    }

    function handleDragStart(e) {
        e.dataTransfer.setData('text/plain', e.target.dataset.type);
        e.target.classList.add('dragging');
    }

    function handleDragEnd(e) {
        e.target.classList.remove('dragging');
    }

    function handleBinDrop(e, binType) {
        e.preventDefault();
        const itemType = e.dataTransfer.getData('text/plain');
        
        if (itemType === binType) {
            currentScore += 10;
            document.getElementById('score').textContent = currentScore;
            
            // Remove the item
            const item = document.querySelector('.dragging');
            if (item) {
                item.remove();
            }
            
            // Check if game is complete
            if (document.querySelectorAll('.waste-item').length === 0) {
                endGame(true);
            }
        } else {
            currentScore = Math.max(0, currentScore - 5);
            document.getElementById('score').textContent = currentScore;
        }
    }

    function updateTimer() {
        timeLeft--;
        document.getElementById('timer').textContent = timeLeft;
        
        if (timeLeft <= 0) {
            endGame(false);
        }
    }

    function endGame(won) {
        clearInterval(gameInterval);
        document.getElementById('startGame').disabled = false;
        
        const message = won ? 
            `Congratulations! You won with a score of ${currentScore}!` : 
            `Game Over! Your final score: ${currentScore}`;
        
        alert(message);
    }

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    // Initialize game
    document.addEventListener('DOMContentLoaded', function() {
        const startButton = document.getElementById('startGame');
        if (startButton) {
            startButton.addEventListener('click', startGame);
        }

        // Add drop event listeners to bins
        document.querySelectorAll('.bin').forEach(bin => {
            bin.addEventListener('dragover', e => e.preventDefault());
            bin.addEventListener('drop', e => handleBinDrop(e, bin.dataset.type));
        });
    });
</script>

<?php include 'includes/footer.php'; ?>