
@extends('admin.includes.main')
@section('title')Menu Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Menu Settings</h3>
                            <a href="{{route('menu_settings')}}" class="btn btn-success btn-sm float-right">View Menu</a>
                        </div>
                        <div class="col-md-12 p-0">
                            @include('admin.includes.message')
                        </div>
                        <div class="card-body">
                            @php
                                if ($myMenu->menu_type == 'category'){
                                    $menu=App\Models\Category::where('id',$myMenu->menu)->first();
                                }else {
                                    $menu=App\Models\Page::where('id',$myMenu->menu)->first();
                                }
                            @endphp
                            <form action="{{route('menu_settings.update',$myMenu->id)}}" method="post">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="menu">Menu Type</label>
                                            <select name="menu_type" class="form-control" id="get_menu">
                                                <option selected disabled>---Choose Menu Type---</option>
                                                <option value="category" @if ($myMenu->menu_type == 'category')
                                                    selected
                                                @endif>Category Menu</option>
                                                <option value="page" @if ($myMenu->menu_type == 'page')
                                                    selected
                                                @endif>Page Menu</option>
                                            </select>
                                        </div>
                                    </div>  
                                </div> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{-- <label for="menu">Menu Items</label>
                                            <select name="menu" class="form-control">
                                                <option selected disabled>---Choose Menu Items---</option>
                                                <option disabled class="font-weight-bold text-dark text-center">Categories</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}" @if ($myMenu->menu == $category->id)
                                                    selected
                                                @endif>{{$category->name}}</option>
                                                @endforeach
                                                <option disabled class="font-weight-bold text-dark text-center">Pages</option>
                                                @foreach ($pages as $page)
                                                    <option value="{{$page->id}}" @if ($myMenu->menu == $page->id)
                                                        selected
                                                    @endif>{{$page->title}}</option>
                                                @endforeach
                                            </select> --}}
                                            <label for="menu">Menu Items</label>
                                            <select class="form-control" name="menu" id="menu_items">
                                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                                                
                                            </select>
                                        </div>
                                    </div>  
                                </div> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="menu_order">Menu Order</label>
                                            <input type="number" min="1" max='12' name="menu_order" class="form-control" value="{{old('menu_order',$myMenu->menu_order)}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm float-right">Edit Menu</button> 
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function (e) {
        $('#get_menu').on('change', function() {
            var type = $('#get_menu').val();
            $.post('{{ route('get_menu_items') }}',{_token:'{{ csrf_token() }}', type:type}, function(data){
                $('#menu_items').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#menu_items').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                
            });
        });
        
    });

</script>
@endsection