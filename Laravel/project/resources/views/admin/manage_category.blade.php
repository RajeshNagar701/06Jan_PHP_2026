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
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->cate_name}}</td>
                            <td><img width="50px" src="{{url('admin/upload/category/'.$category->image)}}"</td>
                            <td>
                                <a href="{{url('/delete_category/'.$category->id)}}">Delete</a>
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