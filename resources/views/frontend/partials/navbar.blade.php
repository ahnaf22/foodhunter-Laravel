<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">FoodHunter</a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto order-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Areas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Find coupons</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logIn.html"><span><i class="fas fa-sign-in-alt"></i></span>  Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sign Up<span><i class="fas fa-level-up-alt"></i></span></a>
                </li>
            </ul>

        </div>
    </nav>

@push('custom-scripts')
<script>
        $(document).ready(function () {
            $(window).on('beforeunload', function () {
                $(window).scrollTop(0);
            });
            $(document).scrollTop(0);; //scroll top after refresh
            //console.log($('.navbar').height())
            // var scroll_start = 0;
            // var startchange = $('.navbar');
            // var offset = startchange.height();
            // console.log(offset);
            // var nearFoodHeight = $('.nearFood').offset().top;
            // console.log(nearFoodHeight);

            // $(document).scroll(function () {
            //     scroll_start = $(this).scrollTop();
            //     if (scroll_start > offset) {
            //         $('.navbar').addClass('scroll');
            //         $('.nav-link').addClass('change');
            //         $('.navbar-brand').addClass('change');
            //         $('.navbar-toggler').removeClass('custom-toggler').addClass('whiteToggler');

            //     } else {
            //         $('.navbar').removeClass('scroll');
            //         $('.nav-link').removeClass('change');
            //         $('.navbar-brand').removeClass('change');
            //         $('.navbar-toggler').addClass('custom-toggler').removeClass('whiteToggler');

            //     }

            //     if (scroll_start > nearFoodHeight) {
            //         $('.trapezoid').addClass('trapezoidAnimation');

            //     }
            // });

        });
</script>
@endpush