
@extends('admin.layout.layout')

@section('container')
            <!-- Stats Cards -->
            <section class="stats-grid">
                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Total Revenue</h3>
                            <div class="stat-value">$84,254</div>
                            <span class="stat-change positive">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/></svg>
                                +12.5%
                            </span>
                        </div>
                        <div class="stat-icon cyan">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--emerald-light)" stroke-width="2">
                                <line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Active Users</h3>
                            <div class="stat-value">24,521</div>
                            <span class="stat-change positive">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/></svg>
                                +8.2%
                            </span>
                        </div>
                        <div class="stat-icon magenta">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--gold)" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Total Orders</h3>
                            <div class="stat-value">8,461</div>
                            <span class="stat-change negative">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"/></svg>
                                -3.1%
                            </span>
                        </div>
                        <div class="stat-icon purple">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--coral)" stroke-width="2">
                                <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass-card glass-card-3d stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <h3>Conversion Rate</h3>
                            <div class="stat-value">3.24%</div>
                            <span class="stat-change positive">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/></svg>
                                +2.4%
                            </span>
                        </div>
                        <div class="stat-icon success">
                            <svg viewBox="0 0 24 24" fill="none" stroke="var(--success)" stroke-width="2">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Content Grid -->
            <section class="content-grid">
               
                <!-- Data Table -->
                <div class="glass-card table-card">
                    <div class="card-header">
                        <div>
                            <h2 class="card-title">Recent Transactions</h2>
                            <p class="card-subtitle">Latest orders and payments</p>
                        </div>
                        <div class="card-actions">
                            <button class="card-btn">View All</button>
                            <button class="card-btn">Export</button>
                        </div>
                    </div>
                    <div class="table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div class="table-user"><div class="table-avatar" style="background: linear-gradient(135deg, var(--emerald-light), var(--emerald));">JD</div><div class="table-user-info"><span class="table-user-name">John Doe</span><span class="table-user-email">john@example.com</span></div></div></td>
                                    <td>Premium Plan</td>
                                    <td>Jan 15, 2025</td>
                                    <td><span class="status-badge completed">Completed</span></td>
                                    <td><span class="table-amount">$299.00</span></td>
                                </tr>
                                <tr>
                                    <td><div class="table-user"><div class="table-avatar" style="background: linear-gradient(135deg, var(--gold), var(--amber));">AS</div><div class="table-user-info"><span class="table-user-name">Anna Smith</span><span class="table-user-email">anna@example.com</span></div></div></td>
                                    <td>Enterprise License</td>
                                    <td>Jan 14, 2025</td>
                                    <td><span class="status-badge processing">Processing</span></td>
                                    <td><span class="table-amount">$1,499.00</span></td>
                                </tr>
                                <tr>
                                    <td><div class="table-user"><div class="table-avatar" style="background: linear-gradient(135deg, var(--success), var(--emerald));">MJ</div><div class="table-user-info"><span class="table-user-name">Mike Johnson</span><span class="table-user-email">mike@example.com</span></div></div></td>
                                    <td>Team Bundle</td>
                                    <td>Jan 13, 2025</td>
                                    <td><span class="status-badge completed">Completed</span></td>
                                    <td><span class="table-amount">$599.00</span></td>
                                </tr>
                                <tr>
                                    <td><div class="table-user"><div class="table-avatar" style="background: linear-gradient(135deg, var(--coral), var(--gold));">EW</div><div class="table-user-info"><span class="table-user-name">Emily White</span><span class="table-user-email">emily@example.com</span></div></div></td>
                                    <td>Starter Plan</td>
                                    <td>Jan 12, 2025</td>
                                    <td><span class="status-badge pending">Pending</span></td>
                                    <td><span class="table-amount">$49.00</span></td>
                                </tr>
                                <tr>
                                    <td><div class="table-user"><div class="table-avatar" style="background: linear-gradient(135deg, var(--emerald), var(--gold));">RB</div><div class="table-user-info"><span class="table-user-name">Robert Brown</span><span class="table-user-email">robert@example.com</span></div></div></td>
                                    <td>Pro Annual</td>
                                    <td>Jan 11, 2025</td>
                                    <td><span class="status-badge completed">Completed</span></td>
                                    <td><span class="table-amount">$199.00</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

           
        </main>
    </div>

@endsection