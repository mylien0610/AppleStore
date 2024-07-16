@extends('admin/layouts/main-layout')

@section('content')
    <div class="content_container">
        <div class="table">
            <div class="table_head">
                <div class="table_title">
                    <h1>Products</h1>
                </div>
                <div class="table_action">
                    <ul class="table_tab">
                        <li class="active"><a href="#">Table</a></li>
                        <!-- <li><a href="#">Thùng rác (10)</a></li> -->
                    </ul>
                    <div class="table_totalItem">
                        Total: <b id="total_item">0</b> products
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
                <h1 class="modal_title">Create product</h1>
                <form class="form mt-5" id="form_create" style="width: 800px;">
                    <div class="form_group ">
                        <div class='form_field'>
                            <input name="title" id='title' type="text" class="form_input" placeholder=" "
                                autocomplete="off">
                            <label for="title" class="form_label">Title</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                    <div class="group_container">
                        <div class="form_group ">
                            <div class='form_field'>
                                <input name="price" id='price' type="text" class="form_input" placeholder=" "
                                    autocomplete="off">
                                <label for="price" class="form_label">Price</label>
                            </div>
                            <span class="form_messages"></span>
                        </div>
                        <div class="form_group ">
                            <div class='form_field'>
                                <input name="sale_price" id='sale_price' type="text" class="form_input" placeholder=" "
                                    autocomplete="off">
                                <label for="sale_price" class="form_label">Sale price</label>
                            </div>
                            <span class="form_messages"></span>
                        </div>
                    </div>
                    <div class="group_container">
                        <div class="form_group ">
                            <div class='form_field'>
                                <input name="color" id='color' type="text" class="form_input" placeholder=" "
                                    autocomplete="off">
                                <label for="color" class="form_label">Color</label>
                            </div>
                            <span class="form_messages"></span>
                        </div>
                        <div class="form_group ">
                            <div class='form_field'>
                                <select name="hot" id="hot" class="form_input">
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <label for="hot" class="form_label">Hot</label>
                            </div>
                            <span class="form_messages"></span>
                        </div>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <textarea name="description" id='description' type="text" class="form_input" placeholder=" " autocomplete="off"></textarea>
                            <label for="description" class="form_label">Description</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <textarea name="content" id='content' type="text" class="form_input" placeholder=" " autocomplete="off"></textarea>
                            <label for="content" class="form_label">Content</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <select name="category_id" id="category_id" class="form_input">
                                <option selected disabled value="">Select category</option>
                            </select>
                            <label for="category_id" class="form_label">Category</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <div class="form-img">
                                <img id="blah" src="/img/img.png" alt="">
                            </div>
                            <input name="img" id='img' type="file" class="form_input" placeholder=" "
                                autocomplete="off">
                            <label for="file" class="form_label">Image</label>
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
                <h1 class="modal_title">Cập nhật sản phẩm</h1>
                <form class="form mt-5" id="form_edit" style="width: 700px;">
                    <div class="form_group" style="display: none;">
                        <div class='form_field'>
                            <input name="id" id='id' type="text" class="form_input">
                        </div>
                    </div>
                    <div class="form_group ">
                        <div class='form_field'>
                            <input name="name" id='name' type="text" class="form_input" placeholder=" "
                                autocomplete="off">
                            <label for="name" class="form_label">Tên sản phẩm</label>
                        </div>
                        <span class="form_messages"></span>
                    </div>

                    <div class="form_action text-right">
                        <div class="btn btn_secondary modal_close">Huỷ</div>
                        <button type="submit" class="btn btn_primary
                    ">Cập nhật</button>
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
                <h1 class="modal_title">Xoá sản phẩm</h1>
                <div class="form mt-5" id="form_delete" style="width: 450px;">
                    <h1>Bạn có chắc muốn xoá sản phẩm này?</h1>
                    <div class="form_action text-right mt-5">
                        <div class="btn btn_secondary modal_close">Huỷ</div>
                        <button type="submit" class="btn btn_primary
                    ">Xác nhận</button>
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
        // Preview Img Input
        const fileValue = document.getElementById('img');
        fileValue.onchange = evt => {
            const [file] = fileValue.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }

        const columns = [{
                title: '#',
                field: 'index',
                width: '100px'
            },
            {
                title: 'Hot',
                field: 'hot',
                filter: [{
                    0: 'Yes'
                }, {
                    1: "No"
                }],
                width: '100px',
                align: 'center',
            },
            {
                title: 'Title',
                field: 'title',
                align: 'center'
            },
            {
                title: 'Image',
                field: 'img',
                align: 'center',
                type: 'img'
            },
            {
                title: 'Price',
                field: 'price',
                align: 'center',
                type: 'format'
            },
            {
                title: 'Sale price',
                field: 'sale_price',
                align: 'center',
                type: 'format'
            },
        ];

        // Get access token
        const token = getCookie('access_token');
        // Define api
        const urlGlobal = '/api/products'

        const init = () => {

            //  Handle load categories form create product
            $.ajax({
                type: 'GET',
                url: '/api/categories',
                success: function(response) {
                    const categories = response.categories;
                    const selectElement = $('#create-modal #category_id');

                    // Xóa các option cũ nếu có
                    selectElement.empty();

                    // Lặp qua mảng categories và tạo các option
                    categories.map((category) => {
                        const option = $('<option></option>');
                        option.attr('value', category.id);
                        option.text(category.title);
                        selectElement.append(option);
                    });
                },
                error: function(error) {
                    toast({
                        title: 'Failed load category form create',
                        message: `Error server`,
                        type: 'error',
                        duration: 3000,
                    });
                }
            });

            $.ajax({
                type: 'GET',
                url: urlGlobal,
                success: function(response) {
                    const products = response.products;
                    // Init table
                    renderTable(products, columns, true);

                    // Handle search
                    searchTable(products, '#search', columns, true)

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

        init();

        // Handle edit
        const handleEdit = (id) => {
            $('#edit-modal').addClass('show');
            $.ajax({
                type: 'GET',
                url: `hang/${id}`,
                success: function(response) {
                    const brand = response.data;

                    $('#form_edit #id').val(brand.id)
                    $('#form_edit #name').val(brand.name)
                },
                error: function(error) {
                    toast({
                        title: 'Thất bại',
                        message: `Lỗi hệ thống`,
                        type: 'error',
                        duration: 3000,
                    });
                }
            });
        }

        // Handle delete
        const handleDelete = (id) => {
            $('#delete-modal').addClass('show');
            $('#delete-modal .btn_primary').data('id', id)
        }

        // Handle click btn delete
        $('#delete-modal .btn_primary').on('click', function() {
            $('#delete-modal').removeClass('show');
            $('#table_main').addClass('animation');
            const id = $(this).data('id');

            $.ajax({
                type: 'DELETE',
                url: `hang/${id}`,
                success: function(response) {
                    init();
                    toast({
                        title: 'Thành công',
                        message: `Xoá sản phẩm thành công`,
                        type: 'success',
                        duration: 3000,
                    });
                },
                error: function(error) {
                    toast({
                        title: 'Thất bại',
                        message: `Lỗi hệ thống`,
                        type: 'error',
                        duration: 3000,
                    });
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
                Validator.isRequired('#price', 'Price is require.'),
                Validator.isNumber('#price', 'Please enter number.'),
                Validator.isRequired('#sale_price', 'Sale price is require.'),
                Validator.isNumber('#sale_price', 'Please enter number.'),
                Validator.isRequired('#description', 'Description is require.'),
                Validator.isRequired('#content', 'Content is require.'),
                Validator.isRequired('#color', 'Color is require.'),
                Validator.isRequired('#img', 'Image is require.'),
                Validator.isRequired('#category_id', 'Category is require.'),

            ],
            onSubmit: (data) => {
                $('#create-modal').removeClass('show');
                $('#table_main').addClass('animation');


                // Add FormData when handle file with ajax
                const formData = new FormData();
                formData.append('title', data.title);
                formData.append('price', data.price);
                formData.append('sale_price', data.sale_price);
                formData.append('hot', data.hot);
                formData.append('content', data.content);
                formData.append('description', data.description);
                formData.append('color', data.color);
                formData.append('img', data.img);
                formData.append('category_id', data.category_id);


                $.ajax({
                    type: 'POST',
                    url: urlGlobal,
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false, // Add this row when handle file
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader("Authorization", "Bearer " + token);
                    },
                    success: function(response) {
                        toast({
                            title: 'Thành công',
                            message: `Thêm sản phẩm thành công`,
                            type: 'success',
                            duration: 3000,
                        });
                        init();
                    },
                    error: function(error) {
                        toast({
                            title: 'Thất bại',
                            message: `Thêm sản phẩm thất bại`,
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
                Validator.isRequired('#name', 'Vui lòng nhập tên hãng.'),
            ],
            onSubmit: (data) => {
                const {
                    id,
                    ...restData
                } = data;
                $('#edit-modal').removeClass('show');
                $('#table_main').addClass('animation');

                $.ajax({
                    type: 'POST',
                    url: `hang/${id}/cap-nhat`,
                    data: restData,
                    success: function(response) {
                        if (response.code === 1) {
                            toast({
                                title: 'Thất bại',
                                message: response.message,
                                type: 'error',
                                duration: 3000,
                            });
                        } else {
                            toast({
                                title: 'Thành công',
                                message: `Cập nhật sản phẩm thành công`,
                                type: 'success',
                                duration: 3000,
                            });
                        }

                        init();
                    },
                    error: function(error) {
                        toast({
                            title: 'Thất bại',
                            message: `Cập nhật sản phẩm thất bại`,
                            type: 'error',
                            duration: 3000,
                        });
                    }
                });
            }
        });
    </script>
@endsection
