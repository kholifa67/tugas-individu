@extends('admin')
 
@section('title', 'Projects')
@section('content')
    <!--Projects-->
    <section id="projects">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-5">
                    <h2>My Projects</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1586802978403-6406fb3ddfff?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="gambar">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1467043198406-dc953a3defa0?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cG90dGVkJTIwcGxhbnR8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="gambar">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1557090495-fc9312e77b28?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=334&q=80" class="card-img-top" alt="gambar">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--End of projects-->
@endsection