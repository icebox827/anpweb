(function ($) {

    // Make sure you run this code under Elementor.
    $(window).on("elementor/frontend/init", function () {
        var carouselRefreshTimeout;

        elementorFrontend.hooks.addAction("frontend/element_ready/the7_elements_carousel.default", function ($scope, $) {
            refreshElementorCarousels($scope, $, "the7ElementorOwlCarousel")
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/the7-elements-woo-carousel.default", function ($scope, $) {
            refreshElementorCarousels($scope, $, "the7OwlCarousel")
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/the7_content_carousel.default", function ($scope, $) {
            refreshElementorCarousels($scope, $, "the7ElementorOwlCarousel")
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/the7_testimonials_carousel.default", function ($scope, $) {
            refreshElementorCarousels($scope, $, "the7ElementorOwlCarousel")
        });

        elementorEditorAddOnChangeHandler("the7_content_carousel:box_padding", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_content_carousel:carousel_width", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_content_carousel:carousel_width_tablet", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_content_carousel:carousel_width_mobile", refreshCarousel);

        elementorEditorAddOnChangeHandler("the7_testimonials_carousel:box_padding", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_testimonials_carousel:layout", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_testimonials_carousel:layout_tablet", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_testimonials_carousel:carousel_width", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_testimonials_carousel:carousel_width_tablet", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_testimonials_carousel:carousel_width_mobile", refreshCarousel);

        elementorEditorAddOnChangeHandler("the7_elements_carousel:box_padding", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_elements_carousel:carousel_width", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_elements_carousel:carousel_width_tablet", refreshCarousel);
        elementorEditorAddOnChangeHandler("the7_elements_carousel:carousel_width_mobile", refreshCarousel);

        function refreshCarousel(controlView, widgetView) {
            clearTimeout(carouselRefreshTimeout);
            carouselRefreshTimeout = setTimeout(function () {
                window.jQuery(widgetView.$el).find(".dt-owl-carousel-call, .elementor-owl-carousel-call").trigger("refresh.owl.carousel");
            }, 300);
        }

        function refreshElementorCarousels($scope, $, carouselFuncName) {
            if ($.fn[carouselFuncName] === undefined) {
                return;
            }

            $(document).ready(function () {
                $scope.find(".dt-owl-carousel-call, .elementor-owl-carousel-call").each(function () {
                    var $this = $(this);
                    $this[carouselFuncName]();

                    // Trigger lazy loading manually coz onLoad event is not reliable in Elementor preview.
                    if (!$this.hasClass("refreshed")) {
                        $this.addClass("refreshed");
                        $this.trigger("refresh.owl.carousel");
                    }

                    // Stub anchors.
                    $this.find("article a").on("click", function (e) {
                        e.preventDefault();

                        return false;
                    });
                });
            });
        }

    });

    function elementorEditorAddOnChangeHandler(widgetType, handler) {
        widgetType = widgetType ? ":" + widgetType : "";
        elementor.channels.editor.on("change" + widgetType, handler);
    }
})(jQuery);