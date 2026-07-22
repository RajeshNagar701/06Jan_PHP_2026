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
                    <button class="card-btn" href="manage_category">View All</button>
                    <button class="card-btn">Export</button>
                </div>
            </div>
            <div class="table-wrapper">
                <form action="" method="post">
                    <div class="settings-section">
                        <h3 class="settings-section-title">Add Category</h3>
                        <div class="form-grid">
                            <div class="form-group-settings full-width">
                                <label>Category Name</label>
                                <input type="text" name="cate_name" placeholder="Category Name">
                            </div>
                            <div class="form-group-settings full-width">
                                <label>Category Image</label>
                                <input type="file" name="image" placeholder="Category image">
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary" style="width: auto;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    </main>
    </div>

@endsection