@extends('admin.layout.layout')

@section('container')

    <!-- Content Grid -->
    <section class="content-grid">

        <!-- Data Table -->
        <div class="glass-card table-card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">Customer</h2>
                    <p class="card-subtitle">Manage Customer</p>
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
							<th>Profile</th>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Gender</th>
							<th>Hobby</th>
							<th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
								<td><img width="50px" src="{{url('admin/upload/customer/'.$customer->image)}}"</td>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->gender }}</td>
								<td>{{ $customer->hobby }}</td>
								<td>{{ $customer->mobile }}</td>
                                <td>
                                    <a href="{{url('/delete_customer/'.$customer->id)}}">Delete</a>
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