@extends('layout.app') @section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-white">
                <div class="card-body">
                    @include('flash')
                    <h1>TO DO LIST</h1>
                    <!-- Todo listing section -->
                    <ul class="nav nav-pills todo-nav">
                        <span class="pt-2">Show Category:</span>
                        @foreach($categories as $category)
                        <li
                            role="presentation"
                            class="r-border nav-item all-task @if($type==$category->id) active @endif"
                        >
                            <a
                                href="{{ url('/?category_id='.$category->id,)}}"
                                class="nav-link"
                                >{{ $category->name}}</a
                            >
                        </li>
                        @endforeach
                        <li
                            role="presentation"
                            class="nav-item all-task active"
                        >
                            <a href="{{ route('index')}}" class="nav-link"
                                >All</a
                            >
                        </li>
                    </ul>

                    <div class="todo-list">
                        @foreach($todos as $todo)
                        <div class="todo-item">
                            <div class="checker">
                                <span class=""><input type="checkbox" /></span>
                            </div>
                            <span>{{ $todo->task}}</span>
                            <a
                                href="javascript:void(0);"
                                class="float-right remove-todo-item"
                                accesskey="{{$todo->id}}"
                                ><i class="fa fa-times" aria-hidden="true"></i
                            ></a>
                        </div>
                        @endforeach
                    </div>

                    <!-- Todo add section -->
                    <hr />
                    <div class="">
                        <form
                            class=""
                            method="POST"
                            action="{{route('todos.store')}}"
                        >
                            @csrf
                            <label>Add Todo</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="task"
                                    class="task form-control"
                                    required
                                />
                            </div>

                            <div class="form-inline">
                                <div class="form-group mb-2 mr-2">
                                    <select
                                        name="category_id"
                                        class="categorytodo form-control"
                                        required
                                    >
                                        <option value="">
                                            Choose Category
                                        </option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button
                                    id="todosave"
                                    class="btn btn-primary todosave mb-2"
                                    type="submit"
                                    value="create"
                                >
                                    Add Todo
                                </button>
                            </div>
                        </form>
                    </div>
                    <hr />
                    <!-- Todo Category crud section -->
                    <div class="">
                        <h1>CATEGORIES</h1>
                        <form
                            id="mycForm"
                            class=""
                            name="mycForm"
                            novalidate=""
                        >
                            @csrf

                            <label>Add Category</label>
                            <div class="form-inline">
                                <div class="form-group mb-2 mr-2">
                                    <input
                                        type="text"
                                        name="name"
                                        class="category form-control"
                                        required="required"
                                        required
                                    />
                                </div>

                                <button
                                    id="categorysave"
                                    class="btn btn-primary addcategory mb-2"
                                    type="submit"
                                    value="create"
                                >
                                    Add Category
                                </button>
                            </div>
                        </form>
                        <ul class="category-list p-1">
                            <li class="list-group-item"></li>
                            @foreach($categories as $category)
                            <li class="list-group-item">
                                <span
                                    class="remove-cat-item mr-4"
                                    onmessage="{{ $category->id}}"
                                    ><a class=""
                                        ><i
                                            class="fa fa-times"
                                            aria-hidden="true"
                                        ></i></a
                                ></span>
                                {{ $category->name }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- end Todo Category crud section -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @section('script')
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
></script>
<script type="text/javascript">
    function catdel(nl){

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var catd_id=nl;
        var formcData = {
            catd_id: jQuery('.category-list .category-id').val(),
        };
        var type = "POST";
        var ajaxurl = 'categories/delete/'+catd_id;
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formcData,
            dataType: 'json',
            success: function (data) {

            },
            error: function (data) {
                console.log(data);
            }
        });
        location.reload();
    }
</script>
@endsection
