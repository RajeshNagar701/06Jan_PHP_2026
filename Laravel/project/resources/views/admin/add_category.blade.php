
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
                        <div class="settings-section">
                            <h3 class="settings-section-title">Profile Information</h3>
                            <div class="form-grid">
                                <div class="form-group-settings">
                                    <label>First Name</label>
                                    <input type="text" value="Template">
                                </div>
                                <div class="form-group-settings">
                                    <label>Last Name</label>
                                    <input type="text" value="Mo">
                                </div>
                                <div class="form-group-settings">
                                    <label>Email Address</label>
                                    <input type="email" value="admin@templatemo.com">
                                </div>
                                <div class="form-group-settings">
                                    <label>Phone Number</label>
                                    <input type="tel" value="+1 (555) 123-4567">
                                </div>
                                <div class="form-group-settings full-width">
                                    <label>Bio</label>
                                    <textarea>Dashboard template creator and web design enthusiast. Building beautiful interfaces for modern applications.</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="settings-section">
                            <h3 class="settings-section-title">Preferences</h3>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Language</span>
                                    <span class="settings-label-desc">Select your preferred language</span>
                                </div>
                                <select class="settings-select">
                                    <option>English (US)</option>
                                    <option>English (UK)</option>
                                    <option>Spanish</option>
                                    <option>French</option>
                                    <option>German</option>
                                </select>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Timezone</span>
                                    <span class="settings-label-desc">Set your local timezone</span>
                                </div>
                                <select class="settings-select">
                                    <option>UTC -08:00 (Pacific)</option>
                                    <option>UTC -05:00 (Eastern)</option>
                                    <option>UTC +00:00 (London)</option>
                                    <option>UTC +01:00 (Berlin)</option>
                                    <option>UTC +09:00 (Tokyo)</option>
                                </select>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-primary" style="width: auto;">Save Changes</button>
                            <button class="btn btn-secondary" style="width: auto;">Cancel</button>
                        </div>
                    </div>
                </div>
            </section>

           
        </main>
    </div>

@endsection