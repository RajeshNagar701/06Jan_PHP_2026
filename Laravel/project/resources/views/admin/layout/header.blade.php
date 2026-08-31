<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlassAdmin Dashboard - 3D Glassmorphism Dashboard</title>
    <meta name="description" content="3D Glassmorphism Dashboard Template by TemplateMo">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?php echo url('admin/templatemo-glass-admin-style.css')?>">
    <style>
        /* ---- Users Dropdown ---- */
        .nav-item.has-dropdown {
            position: relative;
        }

        .nav-dropdown-toggle {
            display: flex;
            align-items: center;
            width: 100%;
            cursor: pointer;
        }

        .nav-dropdown-toggle .dropdown-arrow {
            margin-left: auto;
            width: 16px;
            height: 16px;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        .nav-item.has-dropdown.open .dropdown-arrow {
            transform: rotate(180deg);
        }

        .nav-submenu {
            list-style: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
            opacity: 0;
        }

        .nav-item.has-dropdown.open .nav-submenu {
            max-height: 300px;
            opacity: 1;
        }

        .nav-submenu .nav-link {
            padding-left: 3rem !important;
            font-size: 0.85rem;
            opacity: 0.85;
        }

        .nav-submenu .nav-link:hover {
            opacity: 1;
        }

        .nav-submenu .sub-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            opacity: 0.6;
            margin-right: 0.6rem;
            flex-shrink: 0;
        }
    </style>

</head>

<body>
    <!-- Animated Background -->
    <div class="background"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">G</div>
                <span class="logo-text">GlassDash</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-section">
                    <span class="nav-section-title">Main Menu</span>
                    <ul>
                        <li class="nav-item">
                            <a href="index.html" class="nav-link active">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <rect x="3" y="3" width="7" height="7" rx="1" />
                                    <rect x="14" y="3" width="7" height="7" rx="1" />
                                    <rect x="3" y="14" width="7" height="7" rx="1" />
                                    <rect x="14" y="14" width="7" height="7" rx="1" />
                                </svg>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item has-dropdown" id="users-dropdown">
                            <!-- Toggle button -->
                            <span class="nav-link nav-dropdown-toggle" onclick="toggleDropdown('users-dropdown')"
                                style="cursor:pointer;">
                                Categories
                                <!-- Chevron arrow -->
                                <svg class="dropdown-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </span>
                            <!-- Submenu -->
                            <ul class="nav-submenu">
                                <li class="nav-item">
                                    <a href="manage_category" class="nav-link">
                                        <span class="sub-dot"></span>
                                        All Categories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="add_category" class="nav-link">
                                        <span class="sub-dot"></span>
                                        Add Categories
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-dropdown" id="category-dropdown">
                            <!-- Toggle button -->
                            <span class="nav-link nav-dropdown-toggle" onclick="toggleDropdown('category-dropdown')"
                                style="cursor:pointer;">
                                Properties
                                <!-- Chevron arrow -->
                                <svg class="dropdown-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </span>
                            <!-- Submenu -->
                            <ul class="nav-submenu">
                                <li class="nav-item">
                                    <a href="manage_properties" class="nav-link">
                                        <span class="sub-dot"></span>
                                        All Properties
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="add_properties" class="nav-link">
                                        <span class="sub-dot"></span>
                                        Add Properties
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="manage_contact" class="nav-link">
                                Contact
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="manage_customer" class="nav-link">
                                Customer
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-section">
                    <span class="nav-section-title">Account</span>
                    <ul>
                        <li class="nav-item">
                            <a href="/admin_logout" class="nav-link">
                                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" y1="12" x2="9" y2="12" />
                                </svg>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="user-avatar">TM</div>
                    <div class="user-info">
                        <div class="user-name">TemplateMo</div>
                        <div class="user-role">Administrator</div>
                    </div>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Navbar -->
            <nav class="navbar">
                <h1 class="page-title">Dashboard Overview</h1>
                <div class="navbar-right">
                    <div class="search-box">
                        <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input type="text" class="search-input" placeholder="Search anything...">
                    </div>
                    <button class="nav-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                        </svg>
                        <span class="notification-dot"></span>
                    </button>
                    <button class="nav-btn" id="theme-toggle" title="Toggle Light/Dark Mode">
                        <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="4" />
                            <path d="M12 2v2" />
                            <path d="M12 20v2" />
                            <path d="M4.93 4.93l1.41 1.41" />
                            <path d="M17.66 17.66l1.41 1.41" />
                            <path d="M2 12h2" />
                            <path d="M20 12h2" />
                            <path d="M6.34 17.66l-1.41 1.41" />
                            <path d="M19.07 4.93l-1.41 1.41" />
                        </svg>
                        <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            style="display: none;">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
                        </svg>
                    </button>
                </div>
            </nav>

            <script>
                function toggleDropdown(id) {
                    const item = document.getElementById(id);
                    if (item) {
                        item.classList.toggle('open');
                    }
                }
            </script>