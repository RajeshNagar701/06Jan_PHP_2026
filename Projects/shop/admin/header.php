<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DayNight Admin</title>
    <script>
        // Prevent flash of white in dark mode - runs before CSS/page render
        if (localStorage.getItem('daynight-theme') === 'carbon') {
            document.documentElement.classList.add('carbon');
        }
    </script>
    <link rel="stylesheet" href="templatemo-daynight-style.css">
    <!--

TemplateMo 608 DayNight Admin

https://templatemo.com/tm-608-daynight-admin

-->
</head>
<body>
    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay"></div>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <div class="mobile-menu-header">
            <a href="dashboard" class="logo">
                DayNight
            </a>
            <button class="mobile-menu-close" onclick="closeMobileMenu()">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        <nav class="mobile-menu-nav">
            <a href="dashoard" class="active">
                Dashboard
            </a>
			<div class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Projects
				</a>
				 <div class="dropdown-menu">
					<a class="dropdown-item" href="#">Link 1</a>
					<a class="dropdown-item" href="#">Link 2</a>
					<a class="dropdown-item" href="#">Link 3</a>
				  </div>
            </div>
        </nav>
        <div class="mobile-menu-footer">
            <a href="index" class="mobile-logout-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Logout
            </a>
            <div class="theme-toggle">
                <button class="theme-btn theme-btn-snow active" onclick="setTheme('snow')" title="Snow Edition">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="5"/>
                        <line x1="12" y1="1" x2="12" y2="3"/>
                        <line x1="12" y1="21" x2="12" y2="23"/>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                        <line x1="1" y1="12" x2="3" y2="12"/>
                        <line x1="21" y1="12" x2="23" y2="12"/>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                    </svg>
                </button>
                <button class="theme-btn theme-btn-carbon" onclick="setTheme('carbon')" title="Carbon Edition">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>




    <div class="app-container">
        <!-- Top Navigation -->
        <nav class="top-nav">
            <div class="nav-container">
                <div class="nav-left">
                    <a href="dashboard" class="logo">
                        <div class="logo-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        DayNight
                    </a>
                    <div class="nav-menu">
                        <div class="nav-item">
                            <a href="dashboard" class="nav-link active">
                             Dashboard
                            </a>
                        </div>
                        <div class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							Categories
						  </a>
						  <div class="dropdown-menu">
							<a class="dropdown-item" href="add_categories">Add</a>
							<a class="dropdown-item" href="manage_categories">Manage</a>
						  </div>
						</div>
						<div class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							Product
						  </a>
						  <div class="dropdown-menu">
							<a class="dropdown-item" href="add_product">Add</a>
							<a class="dropdown-item" href="manage_product">Manage</a>
						  </div>
						</div>
						<div class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							Shop
						  </a>
						  <div class="dropdown-menu">
							<a class="dropdown-item" href="manage_cart">Cart</a>
							<a class="dropdown-item" href="manage_order">Order</a>
							<a class="dropdown-item" href="manage_feedback">Feedback</a>
						  </div>
						</div>
						<div class="nav-item">
                            <a href="manage_customer" class="nav-link">
                                Customer
                            </a>
                        </div>
						<div class="nav-item">
                            <a href="manage_contact" class="nav-link">
                                Contact
                            </a>
                        </div>
						<div class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							Employee
						  </a>
						  <div class="dropdown-menu">
							<a class="dropdown-item" href="add_employee">Add</a>
							<a class="dropdown-item" href="manage_employee">Manage</a>
						  </div>
						</div>

                    </div>
                </div>
                <div class="nav-right">
                    <div class="theme-toggle">
                        <button class="theme-btn theme-btn-snow active" onclick="setTheme('snow')" title="Snow Edition">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="5"/>
                                <line x1="12" y1="1" x2="12" y2="3"/>
                                <line x1="12" y1="21" x2="12" y2="23"/>
                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                                <line x1="1" y1="12" x2="3" y2="12"/>
                                <line x1="21" y1="12" x2="23" y2="12"/>
                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                            </svg>
                        </button>
                        <button class="theme-btn theme-btn-carbon" onclick="setTheme('carbon')" title="Carbon Edition">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                            </svg>
                        </button>
                    </div>
                    <button class="user-menu">
                        <div class="user-avatar">A</div>
                        <span class="user-name">Alex</span>
                    </button>
                    <a href="login.html" class="btn-logout" title="Logout">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                    </a>
                    <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="3" y1="12" x2="21" y2="12"/>
                            <line x1="3" y1="6" x2="21" y2="6"/>
                            <line x1="3" y1="18" x2="21" y2="18"/>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>