@extends('admin.layout.layout')

@section('container')

    <!-- Content Grid -->
    <section class="content-grid">

        <!-- Data Table -->
        <div class="glass-card table-card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Contact</h2>
                    <p class="card-subtitle">Add Contact</p>
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
                            <th>ID</th>
                            <th>Contact Name</th>
                            <th> Email</th>
                            <th> Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->coment }}</td>
                                <td>
                                    <a href="{{  }} ">Delete</a>
                                    <a href="">Edit</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>


    </main>
    </div>

@endsection