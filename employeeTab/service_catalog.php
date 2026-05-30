<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BESIC SEVA - Service Catalog | Explore All Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f0f4f9;
            font-family: 'Inter', sans-serif;
            color: #1e2a3e;
            padding: 24px;
        }

        .catalog-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header Section */
        .page-header {
            background: white;
            border-radius: 32px;
            padding: 28px 36px;
            margin-bottom: 32px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03);
            border: 1px solid #eef2f8;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }
        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #0a2b38;
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .page-header h1 i {
            color: #2d8a52;
            font-size: 2rem;
        }
        .header-badge {
            background: #e8f5ed;
            padding: 10px 22px;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #2d8a52;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Search & Filter Bar */
        .search-section {
            background: white;
            border-radius: 28px;
            padding: 20px 28px;
            margin-bottom: 32px;
            border: 1px solid #eef2f8;
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: center;
            justify-content: space-between;
        }
        .search-box {
            flex: 1;
            min-width: 250px;
            display: flex;
            align-items: center;
            background: #f8fafd;
            border-radius: 60px;
            padding: 4px 20px;
            border: 1px solid #e2e8f0;
            transition: 0.2s;
        }
        .search-box:focus-within {
            border-color: #2d8a52;
            box-shadow: 0 0 0 3px rgba(45, 138, 82, 0.1);
        }
        .search-box i {
            color: #8aa0b8;
            font-size: 1.1rem;
        }
        .search-box input {
            flex: 1;
            padding: 14px 12px;
            border: none;
            background: transparent;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            outline: none;
        }
        .filter-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        .filter-btn {
            background: #f0f4f9;
            border: none;
            padding: 10px 24px;
            border-radius: 40px;
            font-weight: 500;
            font-size: 0.85rem;
            cursor: pointer;
            transition: 0.2s;
            color: #4a627a;
        }
        .filter-btn.active {
            background: #2d8a52;
            color: white;
        }
        .filter-btn:hover:not(.active) {
            background: #e0e8f0;
        }

        /* Stats Row */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }
        .stat-card {
            background: white;
            border-radius: 24px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 16px;
            border: 1px solid #eef2f8;
            transition: 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }
        .stat-icon {
            width: 52px;
            height: 52px;
            background: #e8f5ed;
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #2d8a52;
        }
        .stat-info h3 {
            font-size: 1.6rem;
            font-weight: 800;
            color: #1e2a3e;
        }
        .stat-info p {
            font-size: 0.75rem;
            color: #6f8fae;
            font-weight: 500;
        }

        /* Service Categories Section */
        .categories-section {
            margin-bottom: 32px;
        }
        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-left: 4px solid #2d8a52;
            padding-left: 16px;
        }
        .category-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 28px;
        }
        .category-chip {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 10px 24px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: 0.2s;
            color: #4a627a;
        }
        .category-chip:hover, .category-chip.active {
            background: #2d8a52;
            color: white;
            border-color: #2d8a52;
        }

        /* Service Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }
        .service-card {
            background: white;
            border-radius: 28px;
            overflow: hidden;
            transition: all 0.3s;
            border: 1px solid #eef2f8;
            cursor: pointer;
            position: relative;
        }
        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 36px -16px rgba(0, 0, 0, 0.15);
            border-color: #cde0d5;
        }
        .card-banner {
            background: linear-gradient(135deg, #2d8a52 0%, #3aa86a 100%);
            padding: 24px 24px;
            color: white;
            position: relative;
        }
        .card-banner i {
            font-size: 2.2rem;
            background: rgba(255,255,255,0.2);
            padding: 12px;
            border-radius: 18px;
        }
        .price-tag {
            position: absolute;
            bottom: -16px;
            right: 20px;
            background: white;
            color: #2d8a52;
            padding: 8px 20px;
            border-radius: 40px;
            font-weight: 800;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .card-content {
            padding: 24px 20px 20px;
        }
        .service-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .service-desc {
            font-size: 0.8rem;
            color: #5c7a9a;
            line-height: 1.4;
            margin-bottom: 14px;
        }
        .service-meta {
            display: flex;
            gap: 16px;
            font-size: 0.7rem;
            color: #7e95b0;
            margin: 12px 0;
            flex-wrap: wrap;
        }
        .service-meta span i {
            width: 18px;
            margin-right: 4px;
        }
        .rating {
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 10px 0;
        }
        .stars {
            color: #f5b042;
            font-size: 0.8rem;
            letter-spacing: 2px;
        }
        .rating-value {
            font-weight: 600;
            font-size: 0.8rem;
        }
        .card-footer {
            display: flex;
            gap: 12px;
            margin-top: 16px;
            padding-top: 12px;
            border-top: 1px solid #f0f4fa;
        }
        .btn-request {
            background: #2d8a52;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.2s;
        }
        .btn-request:hover {
            background: #236b41;
            transform: scale(0.98);
        }
        .btn-details {
            background: transparent;
            border: 1px solid #cbdde9;
            padding: 10px 18px;
            border-radius: 40px;
            font-weight: 500;
            font-size: 0.8rem;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-details:hover {
            background: #f0f4f9;
            border-color: #2d8a52;
        }

        /* Modal for Service Details */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(6px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            visibility: hidden;
            opacity: 0;
            transition: 0.2s;
        }
        .modal-overlay.active {
            visibility: visible;
            opacity: 1;
        }
        .modal-container {
            background: white;
            border-radius: 36px;
            width: 90%;
            max-width: 550px;
            max-height: 85vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .modal-header {
            padding: 20px 24px;
            border-bottom: 1px solid #eef2f8;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
        }
        .modal-header h3 { font-size: 1.3rem; font-weight: 700; }
        .close-modal {
            background: #f0f4f9;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.2s;
        }
        .modal-body {
            padding: 24px;
            overflow-y: auto;
        }
        .detail-item {
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid #f0f4fa;
        }
        .detail-label {
            font-weight: 600;
            color: #2d8a52;
            font-size: 0.8rem;
            margin-bottom: 6px;
        }

        @media (max-width: 780px) {
            body { padding: 16px; }
            .services-grid { grid-template-columns: 1fr; }
            .search-section { flex-direction: column; align-items: stretch; }
            .filter-group { justify-content: center; }
            .page-header { flex-direction: column; align-items: flex-start; gap: 12px; }
            .stats-row { gap: 12px; }
            .stat-card { padding: 14px; }
            .stat-icon { width: 44px; height: 44px; font-size: 1.2rem; }
            .stat-info h3 { font-size: 1.3rem; }
            .category-chips { justify-content: center; }
        }

        @media (max-width: 480px) {
            .service-card .price-tag { font-size: 0.9rem; padding: 4px 14px; }
            .card-footer { flex-direction: column; }
            .btn-request, .btn-details { width: 100%; justify-content: center; }
        }

        .empty-state {
            text-align: center;
            padding: 60px;
            color: #95adc7;
            grid-column: 1 / -1;
        }
        .footer-note {
            text-align: center;
            font-size: 0.7rem;
            color: #8aa0b8;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="catalog-container">
    <!-- Header -->
    <div class="page-header">
        <h1><i class="fas fa-tags"></i> Service Catalog</h1>
        <div class="header-badge"><i class="fas fa-star"></i> 50+ Services Available</div>
    </div>

    <!-- Search & Filter -->
    <div class="search-section">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Search services... (e.g., Plumbing, AC)" autocomplete="off">
        </div>
        <div class="filter-group">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="popular">🔥 Popular</button>
            <button class="filter-btn" data-filter="trending">📈 Trending</button>
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-row" id="statsRow"></div>

    <!-- Category Chips -->
    <div class="categories-section">
        <div class="section-title">
            <i class="fas fa-layer-group"></i> Browse by Category
        </div>
        <div class="category-chips" id="categoryChips"></div>
    </div>

    <!-- Services Grid -->
    <div class="services-grid" id="servicesGrid"></div>
    <div class="footer-note">
        <i class="fas fa-clock"></i> Request any service • Get instant quotes • Professional verified technicians
    </div>
</div>

<!-- Service Details Modal -->
<div id="serviceModal" class="modal-overlay">
    <div class="modal-container">
        <div class="modal-header">
            <h3 id="modalTitle">Service Details</h3>
            <button class="close-modal" id="closeModalBtn"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Dynamic content -->
        </div>
    </div>
</div>

<script>
    // ------------------------------
    // SERVICE CATALOG DATABASE
    // ------------------------------
    const services = [
        { id: 1, name: "Plumbing Service", category: "Plumbing", price: 349, duration: "1-2 hrs", popularity: 98, rating: 4.8, reviews: 1240, icon: "fas fa-wrench", description: "Fix leaks, install pipes, toilet repair, water heater service. Expert plumbers available 24/7.", tags: ["popular", "trending"] },
        { id: 2, name: "Electrical Repair", category: "Electrical", price: 399, duration: "1-2 hrs", popularity: 95, rating: 4.7, reviews: 980, icon: "fas fa-bolt", description: "Wiring, switch repair, circuit breaker, fan installation. Certified electricians.", tags: ["popular"] },
        { id: 3, name: "AC Service & Repair", category: "AC & Cooling", price: 499, duration: "1-2 hrs", popularity: 97, rating: 4.9, reviews: 2150, icon: "fas fa-wind", description: "Gas refill, maintenance, repair, installation. Same-day service.", tags: ["popular", "trending"] },
        { id: 4, name: "Fan Repair", category: "Electrical", price: 249, duration: "45-60 min", popularity: 88, rating: 4.6, reviews: 560, icon: "fas fa-fan", description: "Ceiling fan, exhaust fan, table fan repair and replacement.", tags: [] },
        { id: 5, name: "Water Heater Service", category: "Plumbing", price: 399, duration: "1-2 hrs", popularity: 85, rating: 4.5, reviews: 420, icon: "fas fa-water", description: "Geyser repair, tank cleaning, thermostat replacement.", tags: [] },
        { id: 6, name: "Smart Home Setup", category: "Electrical", price: 599, duration: "2-3 hrs", popularity: 92, rating: 4.8, reviews: 340, icon: "fas fa-microchip", description: "Smart switches, IoT devices, home automation installation.", tags: ["trending"] },
        { id: 7, name: "Refrigerator Repair", category: "Appliances", price: 449, duration: "1-2 hrs", popularity: 90, rating: 4.7, reviews: 890, icon: "fas fa-temperature-low", description: "Cooling issues, gas leakage, compressor repair.", tags: ["popular"] },
        { id: 8, name: "Washing Machine Repair", category: "Appliances", price: 449, duration: "1-2 hrs", popularity: 87, rating: 4.6, reviews: 670, icon: "fas fa-tshirt", description: "Drum repair, motor issue, water leakage fix.", tags: [] },
        { id: 9, name: "Carpentry Service", category: "Carpentry", price: 299, duration: "1-3 hrs", popularity: 82, rating: 4.5, reviews: 430, icon: "fas fa-hammer", description: "Furniture repair, door fixing, woodwork, cabinet installation.", tags: [] },
        { id: 10, name: "Painting Service", category: "Home", price: 499, duration: "3-5 hrs", popularity: 78, rating: 4.4, reviews: 320, icon: "fas fa-paint-roller", description: "Wall painting, texture finish, waterproofing.", tags: [] },
        { id: 11, name: "Gas Stove Repair", category: "Appliances", price: 299, duration: "45-60 min", popularity: 84, rating: 4.6, reviews: 510, icon: "fas fa-fire", description: "Burner repair, ignition fix, gas leak check.", tags: ["trending"] },
        { id: 12, name: "TV Installation", category: "Electronics", price: 349, duration: "1-2 hrs", popularity: 86, rating: 4.7, reviews: 480, icon: "fas fa-tv", description: "Wall mounting, setup, soundbar connection.", tags: [] }
    ];

    let currentCategory = "all";
    let currentFilter = "all";
    let searchQuery = "";

    // Extract unique categories
    const categories = ["all", ...new Set(services.map(s => s.category))];

    function renderCategoryChips() {
        const container = document.getElementById('categoryChips');
        container.innerHTML = categories.map(cat => `
            <div class="category-chip ${currentCategory === cat ? 'active' : ''}" data-category="${cat}">
                ${cat === 'all' ? 'All Categories' : cat}
            </div>
        `).join('');
        
        document.querySelectorAll('.category-chip').forEach(chip => {
            chip.addEventListener('click', () => {
                currentCategory = chip.getAttribute('data-category');
                renderCategoryChips();
                renderServicesGrid();
                renderStats();
            });
        });
    }

    // Filter services based on category, search, and popularity filter
    function getFilteredServices() {
        let filtered = services;
        
        // Category filter
        if (currentCategory !== 'all') {
            filtered = filtered.filter(s => s.category === currentCategory);
        }
        
        // Search filter
        if (searchQuery.trim()) {
            const query = searchQuery.toLowerCase();
            filtered = filtered.filter(s => 
                s.name.toLowerCase().includes(query) || 
                s.description.toLowerCase().includes(query) ||
                s.category.toLowerCase().includes(query)
            );
        }
        
        // Popular/Trending filter
        if (currentFilter === 'popular') {
            filtered = [...filtered].sort((a, b) => b.popularity - a.popularity);
            filtered = filtered.slice(0, 8);
        } else if (currentFilter === 'trending') {
            filtered = filtered.filter(s => s.tags && s.tags.includes('trending'));
        }
        
        return filtered;
    }

    function renderStats() {
        const filtered = getFilteredServices();
        const total = filtered.length;
        const avgRating = filtered.length ? (filtered.reduce((sum, s) => sum + s.rating, 0) / filtered.length).toFixed(1) : 0;
        const minPrice = filtered.length ? Math.min(...filtered.map(s => s.price)) : 0;
        const maxPrice = filtered.length ? Math.max(...filtered.map(s => s.price)) : 0;
        
        document.getElementById('statsRow').innerHTML = `
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-list"></i></div><div class="stat-info"><h3>${total}</h3><p>Services</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-star"></i></div><div class="stat-info"><h3>${avgRating}</h3><p>Avg Rating</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-rupee-sign"></i></div><div class="stat-info"><h3>₹${minPrice}</h3><p>Starting From</p></div></div>
            <div class="stat-card"><div class="stat-icon"><i class="fas fa-chart-line"></i></div><div class="stat-info"><h3>${filtered.length > 0 ? Math.max(...filtered.map(s => s.popularity)) : 0}%</h3><p>Satisfaction</p></div></div>
        `;
    }

    function renderServicesGrid() {
        const filtered = getFilteredServices();
        const grid = document.getElementById('servicesGrid');
        
        if (filtered.length === 0) {
            grid.innerHTML = `<div class="empty-state"><i class="fas fa-search" style="font-size: 3rem; opacity: 0.5;"></i><p>No services found matching your criteria.</p><p style="font-size: 0.8rem;">Try adjusting search or category.</p></div>`;
            return;
        }
        
        let html = '';
        filtered.forEach(service => {
            const stars = '★'.repeat(Math.floor(service.rating)) + '☆'.repeat(5 - Math.floor(service.rating));
            const isPopular = service.tags && service.tags.includes('popular');
            const isTrending = service.tags && service.tags.includes('trending');
            let badgeHtml = '';
            if (isPopular) badgeHtml = '<span style="background:#ff6b35; color:white; font-size:0.6rem; padding:2px 8px; border-radius:20px; margin-left:8px;">🔥 Popular</span>';
            if (isTrending) badgeHtml = '<span style="background:#2d8a52; color:white; font-size:0.6rem; padding:2px 8px; border-radius:20px; margin-left:8px;">📈 Trending</span>';
            
            html += `
                <div class="service-card" data-id="${service.id}">
                    <div class="card-banner">
                        <i class="${service.icon}"></i>
                        <div class="price-tag">₹${service.price}</div>
                    </div>
                    <div class="card-content">
                        <div class="service-title">
                            ${escapeHtml(service.name)}
                            ${badgeHtml}
                        </div>
                        <div class="service-desc">${escapeHtml(service.description.substring(0, 80))}${service.description.length > 80 ? '...' : ''}</div>
                        <div class="service-meta">
                            <span><i class="fas fa-clock"></i> ${service.duration}</span>
                            <span><i class="fas fa-tag"></i> ${service.category}</span>
                        </div>
                        <div class="rating">
                            <div class="stars">${stars}</div>
                            <div class="rating-value">${service.rating}</div>
                            <div style="font-size:0.7rem; color:#7e95b0;">(${service.reviews} reviews)</div>
                        </div>
                        <div class="card-footer">
                            <button class="btn-request request-service" data-id="${service.id}"><i class="fas fa-calendar-check"></i> Request Now</button>
                            <button class="btn-details view-details" data-id="${service.id}"><i class="fas fa-info-circle"></i> Details</button>
                        </div>
                    </div>
                </div>
            `;
        });
        grid.innerHTML = html;
        
        // Attach event listeners
        document.querySelectorAll('.request-service').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.getAttribute('data-id'));
                const service = services.find(s => s.id === id);
                alert(`✅ Service Request Sent!\n\nService: ${service.name}\nAmount: ₹${service.price}\n\nA BESIC SEVA professional will contact you shortly.`);
            });
        });
        
        document.querySelectorAll('.view-details').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const id = parseInt(btn.getAttribute('data-id'));
                const service = services.find(s => s.id === id);
                if (service) openServiceModal(service);
            });
        });
        
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('click', (e) => {
                if (!e.target.closest('.btn-request') && !e.target.closest('.btn-details')) {
                    const id = parseInt(card.getAttribute('data-id'));
                    const service = services.find(s => s.id === id);
                    if (service) openServiceModal(service);
                }
            });
        });
    }

    function openServiceModal(service) {
        const modal = document.getElementById('serviceModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');
        const stars = '★'.repeat(Math.floor(service.rating)) + '☆'.repeat(5 - Math.floor(service.rating));
        
        modalTitle.innerText = service.name;
        modalBody.innerHTML = `
            <div style="text-align: center; margin-bottom: 20px;">
                <i class="${service.icon}" style="font-size: 3rem; color: #2d8a52; background: #e8f5ed; padding: 20px; border-radius: 60px;"></i>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-info-circle"></i> Description</div>
                <p style="font-size: 0.9rem; line-height: 1.5;">${escapeHtml(service.description)}</p>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-rupee-sign"></i> Pricing</div>
                <p style="font-size: 1.2rem; font-weight: 700; color: #2d8a52;">₹${service.price} <span style="font-size: 0.8rem; font-weight: normal; color: #6f8fae;">(inclusive of all taxes)</span></p>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-clock"></i> Estimated Duration</div>
                <p>${service.duration}</p>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-star"></i> Rating & Reviews</div>
                <div class="stars" style="font-size: 1rem;">${stars}</div>
                <p>${service.rating} out of 5 • ${service.reviews} customer reviews</p>
            </div>
            <div class="detail-item">
                <div class="detail-label"><i class="fas fa-shield-alt"></i> Service Guarantee</div>
                <p>✓ 7-day service warranty • ✓ Verified professionals • ✓ Free inspection</p>
            </div>
            <button class="btn-request request-from-modal" data-id="${service.id}" style="width: 100%; margin-top: 16px; background: #2d8a52; color: white; padding: 14px; border-radius: 50px; font-weight: 700; border: none; cursor: pointer;">
                <i class="fas fa-calendar-check"></i> Request This Service
            </button>
        `;
        modal.classList.add('active');
        
        const requestBtn = modalBody.querySelector('.request-from-modal');
        if (requestBtn) {
            requestBtn.addEventListener('click', () => {
                alert(`✅ Service Request Sent!\n\nService: ${service.name}\nAmount: ₹${service.price}\n\nYou will receive confirmation shortly.`);
                closeModal();
            });
        }
    }

    function closeModal() {
        document.getElementById('serviceModal').classList.remove('active');
    }

    // Filter button handlers
    function bindFilterButtons() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                currentFilter = btn.getAttribute('data-filter');
                renderServicesGrid();
                renderStats();
            });
        });
    }

    // Search input handler
    function bindSearch() {
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', (e) => {
            searchQuery = e.target.value;
            renderServicesGrid();
            renderStats();
        });
    }

    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }

    // Initialize
    function init() {
        renderCategoryChips();
        bindFilterButtons();
        bindSearch();
        renderServicesGrid();
        renderStats();
        
        document.getElementById('closeModalBtn')?.addEventListener('click', closeModal);
        const modalOverlay = document.getElementById('serviceModal');
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) closeModal();
        });
    }
    
    init();
</script>
</body>
</html>