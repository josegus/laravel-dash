$(document).ready(function () {

    const $target = $('body');

    const $toggler = $('.'+$target.data('sidebar-toggler'));

    $toggler.click(function () {
        const width = window.innerWidth;

        if (width <= 960) {
            toggleSidebarOnMobile();
        } else {
            toggleSidebarOnDesktop();
        }
    });

    /**
     * Sidebar is open by default in desktop, because media query (>960px)
     */
    function toggleSidebarOnDesktop() {
        $target.toggleClass('sidebar--closed');
    }

    function toggleSidebarOnMobile() {
        if (sidebarIsOpen()) {
            closeSidebar();
        } else {
            openSidebar();
        }
    }

    $(window).resize(function () {
        const width = window.innerWidth;

        if (width < 960) {
            closeSidebarIfNotFixedOpen();
        } else {
            // Remove forced open or closed
            $target.removeClass('sidebar--open').removeClass('sidebar--closed');
        }
    });

    // Close sidebar if not forced open. Keep it open if already is
    function closeSidebarIfNotFixedOpen() {
        if (sidebarIsOpen()) {
            return false;
        }

        closeSidebar();
    }

    function sidebarIsOpen() {
        return $target.hasClass('sidebar--open');
    }

    function openSidebar() {
        $target.removeClass('sidebar--closed').addClass('sidebar--open');
    }

    function closeSidebar() {
        $target.removeClass('sidebar--open').addClass('sidebar--closed');
    }
});
