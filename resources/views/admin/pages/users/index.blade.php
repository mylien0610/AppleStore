<div class="content_container">
    <div class="table">
        <div class="table_head">
            <div class="table_title">
                <h1>Nhân viên</h1>
            </div>
            <div class="table_action">
                <ul class="table_tab">
                    <li class="active"><a href="#">Danh sách</a></li>
                    <!-- <li><a href="#">Thùng rác (10)</a></li> -->
                </ul>
                <div class="table_totalItem">
                    Tổng: <b id="total_item">0</b> nhân viên
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
                        <input id="search" type="text" placeholder="Tìm kiếm...">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <div class="table_left">
                    <button class="modal-open btn btn_primary table_add" data-modal-target="#create-modal">
                        Thêm mới
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
            <h1 class="modal_title">Thêm nhân viên</h1>
            <form class="form mt-5" id="form_create" style="width: 700px;">
                <div class="form_group ">
                    <div class='form_field'>
                        <input name="fullName" id='fullName' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="name" class="form_label">Tên nhân viên</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="email" id='email' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="name" class="form_label">Email</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="dob" id='dob' type="date" class="form_input" placeholder=" " autocomplete="off">
                        <label for="dob" class="form_label">Ngày sinh</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <textarea name="address" id='address' type="text" class="form_input" placeholder=" "
                            autocomplete="off"></textarea>
                        <label for="address" class="form_label">Địa chỉ</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_group">
                    <div class='form_field'>
                        <select name="gender" id='gender' class="form_input">
                            <option value="" disabled selected hidden>-- Chọn --</option>
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                        <label for="gender" class="form_label">Giới tính</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="phoneNumber" id='phoneNumber' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="phoneNumber" class="form_label">Điện thoại</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="password" id='password' type="password" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="password" class="form_label">Mật khẩu</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="password_r" id='password_r' type="password" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="password_r" class="form_label">Nhập lại mật khẩu</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_action text-right">
                    <div class="btn btn_secondary modal_close">Huỷ</div>
                    <button type="submit" class="btn btn_primary
                    ">Thêm</button>
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
            <h1 class="modal_title">Cập nhật nhân viên</h1>
            <form class="form mt-5" id="form_edit" style="width: 700px;">
                <div class="form_group" style="display: none;">
                    <div class='form_field'>
                        <input name="id" id='id' type="text" class="form_input">
                    </div>
                </div>
                <div class="form_group ">
                    <div class='form_field'>
                        <input name="fullName" id='fullName' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="name" class="form_label">Tên nhân viên</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="email" id='email' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="name" class="form_label">Email</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="dob" id='dob' type="date" class="form_input" placeholder=" " autocomplete="off">
                        <label for="dob" class="form_label">Ngày sinh</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <textarea name="address" id='address' type="text" class="form_input" placeholder=" "
                            autocomplete="off"></textarea>
                        <label for="address" class="form_label">Địa chỉ</label>
                    </div>
                    <span class="form_messages"></span>
                </div>
                <div class="form_group">
                    <div class='form_field'>
                        <select name="gender" id='gender' class="form_input">
                            <option value="" disabled selected hidden>-- Chọn --</option>
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                        <label for="gender" class="form_label">Giới tính</label>
                    </div>
                    <span class="form_messages"></span>
                </div>

                <div class="form_group">
                    <div class='form_field'>
                        <input name="phoneNumber" id='phoneNumber' type="text" class="form_input" placeholder=" "
                            autocomplete="off">
                        <label for="phoneNumber" class="form_label">Điện thoại</label>
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
            <h1 class="modal_title">Xoá nhân viên</h1>
            <div class="form mt-5" id="form_delete" style="width: 450px;">
                <h1>Bạn có chắc muốn xoá nhân viên này?</h1>
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

<script>
    const columns = [
        { title: '#', field: 'index', width: '100px' },
        { title: 'Tên', field: 'fullName' },
        { title: 'Email', field: 'email' },
        { title: 'Điện thoại', field: 'phoneNumber' },
        {
            title: 'Giới tính',
            field: 'gender',
            width: '100px',
            align: 'center',
            filter: [{ 1: 'Nam' }, { 0: 'Nữ' }],
        },
        { title: 'Ngày sinh', field: 'dob', align: 'center' }
    ];

    const init = () => {
        $.ajax({
            type: 'GET',
            url: 'nhan-vien/danh-sach',
            success: function (response) {
                const users = response.data;

                // Init table
                renderTable(users, columns, true);

                // Handle search
                searchTable(users, '#search', columns, true)

                $('#table_main').removeClass('animation')
            },
            error: function (error) {
                toast({
                    title: 'Tải trang thất bại',
                    message: `Lỗi máy chủ`,
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
            url: `nhan-vien/${id}`,
            success: function (response) {
                const user = response.data;
                const dobDate = new Date(user.dob);
                const formattedDate = dobDate.toISOString().split('T')[0];

                $('#form_edit #id').val(user.id)
                $('#form_edit #fullName').val(user.fullName)
                $('#form_edit #email').val(user.email)
                $('#form_edit #dob').val(formattedDate)
                $('#form_edit #address').val(user.address)
                $('#form_edit #gender').val(user.gender)
                $('#form_edit #phoneNumber').val(user.phoneNumber)
            },
            error: function (error) {
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
    $('#delete-modal .btn_primary').on('click', function () {
        $('#delete-modal').removeClass('show');
        $('#table_main').addClass('animation');
        const id = $(this).data('id');

        $.ajax({
            type: 'DELETE',
            url: `nhan-vien/${id}`,
            success: function (response) {
                init();
                toast({
                    title: 'Thành công',
                    message: `Xoá nhân viên thành công`,
                    type: 'success',
                    duration: 3000,
                });
            },
            error: function (error) {
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
            Validator.isRequired('#fullName', 'Vui lòng nhập đầy đủ họ tên.'),
            Validator.isRequired('#email', 'Vui lòng nhập trường này'),
            Validator.isRequired('#dob', 'Vui lòng nhập ngày sinh'),
            Validator.isRequired('#address', 'Vui lòng nhập địa chỉ'),
            Validator.isRequired('#phoneNumber', 'Vui lòng nhập số điện thoại'),
            Validator.isRequired('#gender', 'Vui lòng chọn giới tính'),
            Validator.isRequired('#password', 'Vui lòng nhập mật khẩu'),
            Validator.minLength('#password', 6, 'Mật khẩu yêu cầu niều hơn 6 ký tự'),
            Validator.isRequired('#password_r', 'Vui lòng nhập trường này'),
            Validator.isConfirmed('#password_r', () => {
                return $('#password').val();
            }, 'Mật khẩu nhập lại không chính xác'),
            Validator.isEmail('#email', "Vui lòng nhập email"),
        ],
        onSubmit: (data) => {
            $('#create-modal').removeClass('show');
            $('#table_main').addClass('animation');

            $.ajax({
                type: 'POST',
                url: 'nhan-vien/tao-moi',
                data: data,
                success: function (response) {
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
                            message: `Thêm nhân viên thành công`,
                            type: 'success',
                            duration: 3000,
                        });
                    }
                    init();
                },
                error: function (error) {
                    toast({
                        title: 'Thất bại',
                        message: `Thêm nhân viên thất bại`,
                        type: 'error',
                        duration: 3000,
                    });
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
            Validator.isRequired('#fullName', 'Vui lòng nhập đầy đủ họ tên.'),
            Validator.isRequired('#email', 'Vui lòng nhập trường này'),
            Validator.isRequired('#dob', 'Vui lòng nhập ngày sinh'),
            Validator.isRequired('#address', 'Vui lòng nhập địa chỉ'),
            Validator.isRequired('#phoneNumber', 'Vui lòng nhập số điện thoại'),
            Validator.isRequired('#gender', 'Vui lòng chọn giới tính'),
        ],
        onSubmit: (data) => {
            const { id, ...restData } = data;
            $('#edit-modal').removeClass('show');
            $('#table_main').addClass('animation');

            $.ajax({
                type: 'POST',
                url: `nhan-vien/${id}/cap-nhat`,
                data: restData,
                success: function (response) {
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
                            message: `Cập nhật nhân viên thành công`,
                            type: 'success',
                            duration: 3000,
                        });
                    }

                    init();
                },
                error: function (error) {
                    toast({
                        title: 'Thất bại',
                        message: `Cập nhật nhân viên thất bại`,
                        type: 'error',
                        duration: 3000,
                    });
                }
            });
        }
    })
</script>