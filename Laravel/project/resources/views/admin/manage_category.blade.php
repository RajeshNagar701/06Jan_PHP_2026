@extends('admin.layout.layout')

@section('container')

<!-- Content Grid -->
<section class="content-grid">

    <!-- Data Table -->
    <div class="glass-card table-card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Category</h2>
                <p class="card-subtitle">Add Category</p>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="table-user">
                                <div class="table-avatar" style="background: linear-gradient(135deg, var(--emerald-light), var(--emerald));">JD</div>
                                <div class="table-user-info"><span class="table-user-name">John Doe</span><span class="table-user-email">john@example.com</span></div>
                            </div>
                        </td>
                        <td>Premium Plan</td>
                        <td>Jan 15, 2025</td>
                        <td><span class="status-badge completed">Completed</span></td>
                        <td>
                            <a href="">Delete</a>
                            <a href="">Edit</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</section>


</main>
</div>

@endsection