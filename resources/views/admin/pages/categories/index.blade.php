@extends('admin/layouts/main-layout')

@section('content')
    <div class="content_container">
        <div class="table">
            <div class="table_head">
                <div class="table_title">
                    <h1>Categories</h1>
                </div>
                <div class="table_action">
                    <ul class="table_tab">
                        <li class="active"><a href="#">Table</a></li>
                        <!-- <li><a href="#">Thùng rác (10)</a></li> -->
                    </ul>
                    <div class="table_totalItem">
                        Total: <b id="total_item">0</b> categories
                    </div>
                </div>
            </div>
            <div class="table_main animation" id="table_main">
                <div class="table_loader">
                    <div class="loader"></div>
                </div>
                <div class="top_table">
                    <div class="table_right">
                        <div class="table_search">
                            <input id="search" type="text" placeholder="Search...">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                    <div class="table_left">
                        <button class="modal-open btn btn_primary table_add" data-modal-target="#create-modal">
                            Create
                        </button>
                    </div>
                </div>
                <div class="table_content">
                    <!-- Table root -->
                    <table id="table"></table>
                </div>
            </div>
        </div>
    </div>
    <style>
        .btn_cancel,
        .btn_show,
        .btn_confirm {
            display: none;
        }
    </style>
    <!-- Modal Create -->
    <div id="create-modal" class="modal">
        <div class="modal_container">
            <button class="modal_close btn-close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal_inner">
                <h1 class="modal_title">Create Category</h1>
                <form class="form mt-5" id="form_create" style="width: 700px;">
                    <div class="form_group ">
                        <div class='form_field'>
                            <input name="title" id='title' type="text" class="form_input" placeholder=" "
                                autocomplete="off">
                            <label for="title" class="form_label">Title</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                    <div class="form_action text-right">
                        <div class="btn btn_secondary modal_close">Cance</div>
                        <button type="submit" class="btn btn_primary
                    ">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal Create -->

    <!-- Modal Edit -->
    <div id="edit-modal" class="modal">
        <div class="modal_container">
            <button class="modal_close btn-close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal_inner">
                <h1 class="modal_title">Update category</h1>
                <form class="form mt-5" id="form_edit" style="width: 700px;">
                    <div class="form_group" style="display: none;">
                        <div class='form_field'>
                            <input name="id" id='id' type="text" class="form_input">
                        </div>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <input name="title" id='title' type="text" class="form_input" placeholder=" "
                                autocomplete="off">
                            <label for="title" class="form_label">title</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>

                    <div class="form_action text-right">
                        <div class="btn btn_secondary modal_close">Cance</div>
                        <button type="submit" class="btn btn_submit-update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal Edit-->

    <!-- Modal delete -->
    <div id="delete-modal" class="modal">
        <div class="modal_container">
            <button class="modal_close btn-close">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="modal_inner">
                <h1 class="modal_title">Delete category</h1>
                <div class="form mt-5" id="form_delete" style="width: 450px;">
                    <h1>Are you sure you want to delete the category?</h1>
                    <div class="form_action text-right mt-5">
                        <div class="btn btn_secondary modal_close">Cance</div>
                        <button type="submit" class="btn btn_submit-delete">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal delete -->

    <script src="/js/table.js"></script>
    <script src="/js/toast.js"></script>
    <script src="/js/validator.js"></script>
    <script src="/js/utils.js"></script>

    <script>
        const columns = [{
                title: '#',
                field: 'index',
            },
            {
                title: 'Title',
                field: 'title',
                align: 'center'
            },
        ];

        // Get access token
        const token = getCookie('access_token');
        // Define api
        const urlGlobal = '/api/categories'

        // Function render view
        const init = () => {
            $.ajax({
                type: 'GET',
                url: urlGlobal,
                success: function(response) {
                    const categories = response.categories;

                    // Init table
                    renderTable(categories, columns, true);

                    // Handle search
                    searchTable(categories, '#search', columns, true)

                    $('#table_main').removeClass('animation')
                },
                error: function(error) {
                    toast({
                        title: 'Failed load page',
                        message: `Error server`,
                        type: 'error',
                        duration: 3000,
                    });
                }
            });
        }

        // Init render view
        init();

        // Handle edit
        const handleEdit = (id) => {
            $('#edit-modal').addClass('show');
            $.ajax({
                type: 'GET',
                url: `${urlGlobal}/${id}`,
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("Authorization", "Bearer " + token);
                },
                success: function(response) {
                    const category = response.data;

                    $('#form_edit #id').val(category.id)
                    $('#form_edit #title').val(category.title)
                },
                error: function(error) {
                    toast({
                        title: 'Failed',
                        message: `Error system 404`,
                        type: 'error',
                        duration: 3000,
                    });
                    $('#edit-modal').removeClass('show');

                }
            });
        }

        // Handle delete
        const handleDelete = (id) => {
            $('#delete-modal').addClass('show');
            $('#delete-modal .btn_submit-delete').data('id', id)
        }

        // Handle click btn delete
        $('#delete-modal .btn_submit-delete').on('click', function() {
            $('#delete-modal').removeClass('show');
            $('#table_main').addClass('animation');
            const id = $(this).data('id');

            $.ajax({
                type: 'DELETE',
                url: `${urlGlobal}/${id}`,
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("Authorization", "Bearer " + token);
                },
                success: function(response) {
                    init();
                    toast({
                        title: 'Success',
                        message: `Deleted category successfully!`,
                        type: 'success',
                        duration: 3000,
                    });
                },
                error: function(error) {
                    toast({
                        title: 'Failed',
                        message: `${JSON.parse(error.responseText).message}`,
                        type: 'error',
                        duration: 3000,
                    });
                    init();
                }
            });
        })


        // Handle validation form create
        Validator({
            form: '#form_create',
            formGroupSelector: '.form_group',
            errorSelector: '.form_messages',
            rules: [
                Validator.isRequired('#title', 'Title is require.'),
            ],
            onSubmit: (data) => {
                $('#create-modal').removeClass('show');
                $('#table_main').addClass('animation');




                $.ajax({
                    type: 'POST',
                    url: urlGlobal,
                    data: data,
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader("Authorization", "Bearer " + token);
                    },
                    success: function(response) {
                        toast({
                            title: 'Success',
                            message: `Created category successfully!`,
                            type: 'success',
                            duration: 3000,
                        });
                        init();
                    },
                    error: function(error) {
                        toast({
                            title: 'Failed',
                            message: `${JSON.parse(error.responseText).message}`,
                            type: 'error',
                            duration: 3000,
                        });
                        init();
                    }
                });
            }
        })

        // Handle validation form edit
        Validator({
            form: '#form_edit',
            formGroupSelector: '.form_group',
            errorSelector: '.form_messages',
            rules: [
                Validator.isRequired('#title', 'Title is require.'),
            ],
            onSubmit: (data) => {
                const {
                    id,
                    ...restData
                } = data;
                $('#edit-modal').removeClass('show');
                $('#table_main').addClass('animation');

                $.ajax({
                    type: 'PUT',
                    url: `${urlGlobal}/${id}`,
                    data: restData,
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader("Authorization", "Bearer " + token);
                    },
                    success: function(response) {
                        toast({
                            title: 'Success',
                            message: `Updated category successfully!`,
                            type: 'success',
                            duration: 3000,
                        });

                        // Render reload view
                        init();
                    },
                    error: function(error) {
                        toast({
                            title: 'Failed',
                            message: `${JSON.parse(error.responseText).message}`,
                            type: 'error',
                            duration: 3000,
                        });
                        // Render reload view
                        init();
                    }
                });
            }
        });
    </script>
@endsection
