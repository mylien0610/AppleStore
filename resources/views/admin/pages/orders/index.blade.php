<div class="content_container">
    <div class="table">
        <div class="table_head">
            <div class="table_title">
                <h1>Đơn hàng</h1>
            </div>
            <div class="table_action">
                <ul class="table_tab">
                    <li class="active"><a href="#">Danh sách</a></li>
                    <!-- <li><a href="#">Thùng rác (10)</a></li> -->
                </ul>
                <div class="table_totalItem">
                    Tổng: <b id="total_item">0</b> đơn hàng
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
    .btn_edit,
    .btn_delete {
        display: none;
    }
</style>

<!-- Modal show -->
<div id="show-modal" class="modal">
    <div class="modal_container">
        <button class="modal_close btn-close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="modal_inner">
            <h1 class="modal_title">Thông tin đơn hàng</h1>
            <div class="form mt-5" id="form_delete" style="width: 1000px;">
                <div class="bill">
                    <div class="bill__header">
                        <div id="status"> </div>
                        <p>Hóa đơn <b id="id-order"></b></p>
                    </div>
                    <div class=" bill__content">
                        <div class="bill__top">
                            <div class="bill__info">
                                <div class="customer__info">
                                    <p class="customer__position">Người đặt hàng</p>
                                    <p class="customer__name"></p>
                                    <p class="customer__phone"></p>
                                </div>
                                <div class="bill__receive">
                                    <div class="receive__title">Người nhận</div>
                                    <div class="receive__name"></div>
                                    <div class="receive__phone"></div>
                                    <div class="receive__address"></div>
                                    <div class="receive__note"></div>
                                    <div class="receive__payment"></div>
                                </div>
                            </div>
                            <div class="bill__date">
                                <p></p>
                            </div>
                        </div>
                        <div class="bill__main">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody id="list-product-order">

                                </tbody>
                            </table>
                        </div>
                        <div class="bill__bottom">
                            <p class="bill__total"></p>
                            <!-- <div class="bill__action">
                                <button class="btn btn_confirm">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                                <button class="btn btn_cancel">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /Modal show -->

<script src="/js/table.js"></script>
<script src="/js/toast.js"></script>
<script src="/js/validator.js"></script>
<script>
    const columns = [
        { title: 'Mã đơn hàng', field: 'id', align: 'center', width: '120px' },
        {
            title: 'Trạng thái',
            field: 'statusOrder',
            filter:
                [
                    { 0: 'Chờ duyệt' }, { 1: "Đã duyệt" }, { 2: "Đã huỷ" }
                ],
            align: 'center'
        },
        { title: 'Tên người đặt', field: 'nameReceive' },
        { title: 'Điện thoại', field: 'phoneReceive' },
        { title: 'Tổng tiền', field: 'totalMoney', align: 'right', type: 'format' },
    ];

    const init = () => {
        $.ajax({
            type: 'GET',
            url: 'don-hang/danh-sach',
            success: function (response) {
                const evaluates = response.data;
                // Init table
                renderTable(evaluates, columns, true, 'statusOrder');

                // Handle search
                searchTable(evaluates, '#search', columns, true)

                $('#table_main').removeClass('animation')
            },
            error: function (error) {
                toast({
                    title: 'Tải trang thất bại',
                    message: `Lối máy chủ`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });
    }

    init();

    // Handle confirm
    const handleConfirm = (id) => {
        $('#table_main').addClass('animation');
        $.ajax({
            type: 'POST',
            url: `don-hang/${id}/xac-nhan`,
            success: function (response) {
                init();
                toast({
                    title: 'Thành công',
                    message: `Duyệt đơn hàng thành công`,
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
    }

    // Handle confirm
    const handleCancel = (id) => {
        $('#table_main').addClass('animation');
        $.ajax({
            type: 'POST',
            url: `don-hang/${id}/huy`,
            success: function (response) {
                init();
                toast({
                    title: 'Thành công',
                    message: `Huỷ đơn hàng thành công`,
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
    }

    // Handle show
    const handleShow = (id) => {
        $('#table_main').addClass('animation');
        $.ajax({
            type: 'GET',
            url: `don-hang/${id}`,
            success: function (response) {
                const VND = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND',
                });

                $('#show-modal').addClass('show');
                $('#table_main').removeClass('animation');
                const order = response.data;
                const orderDetails = order.OrderDetails;
                const payment = order.Payment;
                const customer = order.Customer;

                // Id order
                $("#id-order").text('#' + order.id);

                // Customer
                $('.customer__name').text('- ' + customer.fullName);
                $('.customer__phone').text('- ' + customer.phoneNumber);

                // Receive
                $('.receive__name').text(order.nameReceive);
                $('.receive__phone').text(order.phoneReceive);
                $('.receive__address').text(order.address);
                $('.receive__note').text(order.note);
                $('.receive__payment').text(payment.name);

                // Date
                const dateWithTimezone = new Date(order.createdAt);

                const dateUTC = new Date(
                    dateWithTimezone.toISOString()
                );

                const formattedDate = dateUTC.toLocaleString('en-US', {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    timeZone: 'UTC',
                });
                $(".bill__date p").text('Thời gian: ' + formattedDate);

                let total = 0;
                // List product
                orderDetails.forEach((orderDetail) => {
                    let index = 0;
                    let product = orderDetail.Product;
                    total += orderDetail.quantity * orderDetail.price;
                    $('#list-product-order').html(
                        `<tr>
                            <td class="text-center">${index + 1}</td>
                            <td>
                                ${product.name}
                            </td>
                            <td class="text-center">
                                ${orderDetail.quantity}
                            </td>
                            <td class="text-right">
                               ${VND.format(orderDetail.price)}
                            </td>
                            <td class="text-right">
                               ${VND.format(orderDetail.quantity * orderDetail.price)}
                            </td>
                        </tr>`
                    )
                })

                // Total
                $('.bill__total').text('Tổng cộng: ' + VND.format(total));

                // Status
                let htmlStatus = `
                    <div class="btn-status btn-status--pending">
                        Đơn hàng mới
                    </div>
                `;
                if (order.statusOrder === 1) {
                    htmlStatus = `
                    <div class="btn-status btn-status--success">
                        Đã duyệt
                    </div>
                `;
                } else if (order.statusOrder === 2) {
                    htmlStatus = `
                    <div class="btn-status btn-status--close">
                        Đã huỷ
                    </div>
                `;
                }

                $('#status').html(htmlStatus);
                if (order.statusOrder !== 0) {
                    $('.bill__action').css('display', 'none');
                }
            },
            error: function (error) {
                toast({
                    title: 'Thao tác thất bại',
                    message: `Lỗi hệ thống`,
                    type: 'error',
                    duration: 3000,
                });
            }
        });

    }

</script>