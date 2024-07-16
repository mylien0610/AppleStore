$(document).ready(function () {
    const app = {
        // Handle toggle sidebar
        handleToggleSidebar() {
            $("#button-toggle-sidebar").on("click", () => {
                $("#main").toggleClass("active");
                this.handleScrollLoadPage();
            });
        },

        // Handle toggle dropdown
        handleToggleDropdown() {
            $(".dropdown").click(function () {
                $(".dropdown.active").not(this).removeClass("active");

                $(this).toggleClass("active");
            });

            // Hide when click outside menu
            $(document).on("click", function (event) {
                const trigger = $(".dropdown");
                if (
                    trigger !== event.target &&
                    !trigger.has(event.target).length
                ) {
                    $(".dropdown").removeClass("active");
                }
            });
        },

        // Handle modal
        handleModal() {
            $(".modal-open").on("click", function () {
                const modalTarget = $(this).data("modal-target");
                const modal = $(modalTarget);

                modal.addClass("show");
            });

            $(".modal").on("click", function (event) {
                if (!$(event.target).closest(".modal_container").length) {
                    const modal = $(this);
                    modal.removeClass("show");
                }
            });

            $(".modal").on("click", ".modal_close", function () {
                const modal = $(this).closest(".modal");
                modal.removeClass("show");
            });
        },

        // Handle scroll when load pages
        handleScrollLoadPage() {
            const offsetFromTop = 75;

            if ($(".sidebar .menu_item.active")) {
            }

            const newScrollTop =
                $(".sidebar .menu_item.active").offset().top - offsetFromTop;

            $(".sidebar").animate(
                {
                    scrollTop: newScrollTop,
                },
                "slow"
            );
        },

        // Handle functions start
        start() {
            this.handleToggleSidebar();
            this.handleToggleDropdown();
            this.handleModal();
            this.handleScrollLoadPage();
        },
    };

    // init app
    app.start();
});
