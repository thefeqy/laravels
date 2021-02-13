<x-layouts.master title="Search in Laravel 8 & Ajax">

    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="search w-50">
                <h1 class="text-center mb-5">Search with Ajax</h1>
                <form action="#" id="search-form">
                    @csrf
                    <div class="row">
                        <div class="col-12" id="search-wrapper">
                            <input type="text" class="form-control w-100 m-0 search" placeholder="What are you looking for .. ">

                            <div id="results">

                            </div>
                        </div>
                    </div>
                </form>

                <div id="post" class="mt-5">

                </div>
            </div>
        </div>
    </div>

<x-slot name="scripts">
    <script>
        $(function ()
        {
            'use strict';

            $(document).on('keyup', '#search-form .search', function ()
            {
                if($(this).val().length > 0)
                {
                    var search = $(this).val();

                    $.get("{{ route('posts.search') }}", {search: search}, function (res)
                    {
                        $('#results').html(res);
                    });

                    return;
                }

                $('#results').empty();
            });

            $(document).on('click', '.post-link', function ()
            {
                var postId = $(this).data('id');

                $.get("{{ url('posts/show') }}", {id: postId}, function (res)
                {
                    $('#results').empty();
                    $('.search').val('');
                    $('#post').html(res);
                });
            });
        });
    </script>
</x-slot>

</x-layouts.master>
