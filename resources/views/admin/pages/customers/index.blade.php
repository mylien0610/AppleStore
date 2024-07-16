<div class="content_container">
    <div class="table">
        <div class="table_head">
            <div class="table_title">
                <h1>Khách hàng</h1>
            </div>
            <div class="table_action">
                <ul class="table_tab">
                    <li class="active"><a href="#">Danh sách</a></li>
                    <!-- <li><a href="#">Thùng rác (10)</a></li> -->
                </ul>
                <div class="table_totalItem">
                    Tổng: <b id="total_item">0</b> khách hàng
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
                <!-- <div class="table_left">
                    <button class="modal-open btn btn_primary table_add" data-modal-target="#create-modal">
                        Thêm mới
                    </button>
                </div> -->
            </div>
            <div class="table_content">
                <!-- Table root -->
                <table id="table"></table>
            </div>
        </div>
    </div>
</div>



<style>
    .btn_show,
    .btn_confirm {
        display: none;
    }
</style>

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
            url: 'khach-hang/danh-sach',
            success: function (response) {
                const customers = response.data;

                // Init table
                renderTable(customers, columns, false);

                // Handle search
                searchTable(customers, '#search', columns, false)

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

</script>