@extends('layouts.home') @section('content')
<div class="container-fluid">
    <div class="row page-header">
        <div class="col-xs-6">
            <h1>Posts</h1>
        </div>
        <div class="col-xs-6">
            {{ link_to_action('BlogController@create', 'Add New Article', null, ['class' => 'btn btn-primary']) }}
        </div>
    </div>
    <div class="row">
        <table class="table">
            <tbody>
                <tr>
                    <td class="thin">
                        <input type="checkbox" id="checkall">
                    </td>
                    <td class="thin">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Action
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a id="delete" data-action="delete_posts">Delete</a></li>
                                <li><a href="#">Enable</a></li>
                                <li><a href="#">Disable</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="search" placeholder="Search">
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Sort By
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li>{{ sortPostsBy('title', 'Title') }}</li>
                                <li>{{ sortPostsBy('user_id', 'Author') }}</li>
                                <li>{{ sortPostsBy('published_at', 'Published At') }}</li>
                                <li>{{ sortPostsBy('updated_at', 'Updated At') }}</li>
                                <li role="separator" class="divider"></li>
                                <li>{{ sortPostsBy($sortBy, 'Ascending', 'asc') }}</li>
                                <li>{{ sortPostsBy($sortBy, 'Descending', 'desc') }}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table posts-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th class="hidden-xs">Post Date</th>
                    <th class="hidden-xs hidden-sm">Author</th>
                    <th class="hidden-xs hidden-sm">Status</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td scope="row">
                        <input type="checkbox" id="{{ $article->id }}" name="id">
                    </td>
                    <td class="title">{{ (link_to_action('BlogController@edit', strip_tags($article->title), $article->id)) }}</td>
                    <td class="hidden-xs" >{{ $article->published_at->format('m/d/Y') }}</td>
                    <td class="hidden-xs hidden-sm">{{ $article->user->name }}</td>
                    <td class="hidden-xs hidden-sm">@if($article->is_published == true) Published @else Draft @endif</td>
                    <td>{{ link_to_action('SiteController@blogShow', 'View', [$article->id, $queryString]) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $articles->appends(['sortBy' => $sortBy, 'order' => $order])->render() }}
    </div>
</div>
@stop @section('footer')
<script>
$(window).load(function() {
    $(document).ready(function() {
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").each(function(index) {
                if (index !== 0) {
                    $row = $(this);
                    var id = $row.find(".title").text().toLowerCase();
                    if (id.indexOf(value) !== 0) {
                        $row.hide();
                    } else {
                        $row.show();
                    }
                }
            });
        });
        $("#checkall").change(function() {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
        var ids = [];
        var row = $('.posts-table tbody tr');

        $('#delete').on('click', function() {

            row.each(function() {

                var checkbox = $(this).find('input[name="id"]');
                if (checkbox.prop('checked')) {
                    ids.push(checkbox.attr('id'));
                }

            });

            console.log(ids);

            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                confirmButtonClass: $(this).data('action'),
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        cache: false
                    });
                    $.ajax({
                        type: 'delete',
                        url: "/home/posts",
                        dataType: 'json',
                        data: {
                            ids: ids,
                        },
                        success: function(data) {
                            swal("Deleted!", data.message, "success");
                            setTimeout(function() {
                                location.reload();
                            }, 400);


                        },

                        error: function(data) {
                            console.log(data);
                        }

                    });

                } else {
                    ids = [];
                    swal.close();
                }

            });
        });
    });
});
</script>
@stop
