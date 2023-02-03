<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Wolmart eCommmerce Marketplace HTML Template</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/icons/favicon.png">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700'] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    <link rel="preload" href="/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="/assets/fonts/wolmart.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/customX.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/fontawesome-free/css/all.min.css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="/assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/codemirror/codemirror.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/photoswipe/default-skin/default-skin.min.css">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/demo2.min.css">
</head>

<body class="my-account">
<div class="page-wrapper">
    <x-header></x-header>
    <x-alert></x-alert>
    <x-success></x-success>

@yield('content')

<!-- Start of Footer -->
    <x-footer></x-footer>
    <!-- End of Footer -->
</div>
<!-- End of Page Wrapper -->

<!-- Start of Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
    <a href="demo1.html" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>Home</p>
    </a>
    <a href="shop-banner-sidebar.html" class="sticky-link">
        <i class="w-icon-category"></i>
        <p>Shop</p>
    </a>
    <a href="my-account.html" class="sticky-link">
        <i class="w-icon-account"></i>
        <p>Account</p>
    </a>
    <div class="cart-dropdown dir-up">
        <a href="cart.html" class="sticky-link">
            <i class="w-icon-cart">
                @if(session('cart'))
                    <span class="cart-count Counter">{{ count((array) session('cart')) }}</span>
                @endif
            </i>
            <p>Carrello</p>
        </a>
        <div class="dropdown-box">
            @if(session('cart'))
                <div class="dropdown-box">
                    @foreach(session('cart') as $id => $details)
                        <div class="products">

                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}"
                                       class="product-name">{{$details['name']}}</a>
                                    <div class="price-box">
                                        <span class="product-quantity">{{$details['quantity']}}</span>
                                        <span class="product-price">€ {{ price($details['price']) }}</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}">
                                        <img src="{{'/uploads/products/images/' . $details['img_01'] }}"
                                             alt="product" height="84"
                                             width="94"/>
                                    </a>
                                </figure>
                                <a class="btn btn-link btn-close" aria-label="button"
                                   href="{{route('remove', ['lang'=>app()->getLocale(),$id])}}">
                                    <i class="fas fa-times"></i>
                                </a>

                            </div>


                        </div>
                    @endforeach
                    <div class="cart-total">
                        <label>Totale:</label>
                        <span class="price">{{ price($details['quantity'] * $details['price'])}}</span>
                    </div>

                    <div class="cart-action">
                        <a href="{{route('cart', app()->getLocale())}}"
                           class="btn btn-dark btn-outline btn-rounded">Carrello</a>
                        <a href="{{route('checkout', app()->getLocale())}}"
                           class="btn btn-primary  btn-rounded">Checkout</a>
                    </div>
                </div>
            @endif

        </div>
        <!-- End of Dropdown Box -->
    </div>

    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="w-icon-search"></i>
            <p>Search</p>
        </a>
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                   placeholder="Search" required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
    </div>
</div>
<!-- End of Sticky Footer -->

<!-- Start of Scroll Top -->
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70"> <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400;"></circle> </svg> </a>
<!-- End of Scroll Top -->

<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                   placeholder="Search" required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="demo1.html">Home</a></li>
                    <li>
                        <a href="shop-banner-sidebar.html">Shop</a>
                        <ul>
                            <li>
                                <a href="#">Shop Pages</a>
                                <ul>
                                    <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
                                    <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Full Width Banner</a></li>
                                    <li><a href="shop-horizontal-filter.html">Horizontal Filter<span class="tip tip-hot">Hot</span></a></li>
                                    <li><a href="shop-off-canvas.html">Off Canvas Sidebar<span class="tip tip-new">New</span></a></li>
                                    <li><a href="shop-infinite-scroll.html">Infinite Ajax Scroll</a></li>
                                    <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                    <li><a href="shop-both-sidebar.html">Both Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Shop Layouts</a>
                                <ul>
                                    <li><a href="shop-grid-3cols.html">3 Columns Mode</a></li>
                                    <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                    <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                    <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                    <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                    <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                    <li><a href="shop-list.html">List Mode</a></li>
                                    <li><a href="shop-list-sidebar.html">List Mode With Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Pages</a>
                                <ul>
                                    <li><a href="product-variable.html">Variable Product</a></li>
                                    <li><a href="product-featured.html">Featured &amp; Sale</a></li>
                                    <li><a href="product-accordion.html">Data In Accordion</a></li>
                                    <li><a href="product-section.html">Data In Sections</a></li>
                                    <li><a href="product-swatch.html">Image Swatch</a></li>
                                    <li><a href="product-extended.html">Extended Info</a>
                                    </li>
                                    <li><a href="product-without-sidebar.html">Without Sidebar</a></li>
                                    <li><a href="product-video.html">360<sup>o</sup> &amp; Video<span class="tip tip-new">New</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Layouts</a>
                                <ul>
                                    <li><a href="product-default.html">Default<span class="tip tip-hot">Hot</span></a></li>
                                    <li><a href="product-vertical.html">Vertical Thumbs</a></li>
                                    <li><a href="product-grid.html">Grid Images</a></li>
                                    <li><a href="product-masonry.html">Masonry</a></li>
                                    <li><a href="product-gallery.html">Gallery</a></li>
                                    <li><a href="product-sticky-info.html">Sticky Info</a></li>
                                    <li><a href="product-sticky-thumb.html">Sticky Thumbs</a></li>
                                    <li><a href="product-sticky-both.html">Sticky Both</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="vendor-dokan-store.html">Vendor</a>
                        <ul>
                            <li>
                                <a href="#">Store Listing</a>
                                <ul>
                                    <li><a href="vendor-dokan-store-list.html">Store listing 1</a></li>
                                    <li><a href="vendor-wcfm-store-list.html">Store listing 2</a></li>
                                    <li><a href="vendor-wcmp-store-list.html">Store listing 3</a></li>
                                    <li><a href="vendor-wc-store-list.html">Store listing 4</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Vendor Store</a>
                                <ul>
                                    <li><a href="vendor-dokan-store.html">Vendor Store 1</a></li>
                                    <li><a href="vendor-wcfm-store-product-grid.html">Vendor Store 2</a></li>
                                    <li><a href="vendor-wcmp-store-product-grid.html">Vendor Store 3</a></li>
                                    <li><a href="vendor-wc-store-product-grid.html">Vendor Store 4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>
                        <ul>
                            <li><a href="blog.html">Classic</a></li>
                            <li><a href="blog-listing.html">Listing</a></li>
                            <li>
                                <a href="blog-grid.html">Grid</a>
                                <ul>
                                    <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                    <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                    <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masonry</a>
                                <ul>
                                    <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                    <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                    <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Mask</a>
                                <ul>
                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="post-single.html">Single Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="about-us.html">Pages</a>
                        <ul>

                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="become-a-vendor.html">Become A Vendor</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="error-404.html">Error 404</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="elements.html">Elements</a>
                        <ul>
                            <li><a href="element-products.html">Products</a></li>
                            <li><a href="element-titles.html">Titles</a></li>
                            <li><a href="element-typography.html">Typography</a></li>
                            <li><a href="element-categories.html">Product Category</a></li>
                            <li><a href="element-buttons.html">Buttons</a></li>
                            <li><a href="element-accordions.html">Accordions</a></li>
                            <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                            <li><a href="element-tabs.html">Tabs</a></li>
                            <li><a href="element-testimonials.html">Testimonials</a></li>
                            <li><a href="element-blog-posts.html">Blog Posts</a></li>
                            <li><a href="element-instagrams.html">Instagrams</a></li>
                            <li><a href="element-cta.html">Call to Action</a></li>
                            <li><a href="element-vendors.html">Vendors</a></li>
                            <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                            <li><a href="element-icons.html">Icons</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-tshirt2"></i>Fashion
                        </a>
                        <ul>
                            <li>
                                <a href="#">Women</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Jewlery &
                                            Watches</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Sale</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Men</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Jewlery &
                                            Watches</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-home"></i>Home & Garden
                        </a>
                        <ul>
                            <li>
                                <a href="#">Bedroom</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Beds, Frames &
                                            Bases</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Dressers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Nightstands</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Kid's Beds &
                                            Headboards</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Armoires</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Living Room</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Coffee Tables</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Chairs</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Tables</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Futons & Sofa
                                            Beds</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Cabinets &
                                            Chests</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Office</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Office Chairs</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Desks</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bookcases</a></li>
                                    <li><a href="shop-fullwidth-banner.html">File Cabinets</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Breakroom
                                            Tables</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Kitchen & Dining</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Dining Sets</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Kitchen Storage
                                            Cabinets</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bashers Racks</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Dining Chairs</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Dining Room
                                            Tables</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bar Stools</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-electronics"></i>Electronics
                        </a>
                        <ul>
                            <li>
                                <a href="#">Laptops &amp; Computers</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Desktop
                                            Computers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Monitors</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Laptops</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Hard Drives &amp;
                                            Storage</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Computer
                                            Accessories</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">TV &amp; Video</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">TVs</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Home Audio
                                            Speakers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Projectors</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Media Streaming
                                            Devices</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Digital Cameras</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Digital SLR
                                            Cameras</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Sports & Action
                                            Cameras</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Camera Lenses</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Photo Printer</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Digital Memory
                                            Cards</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Cell Phones</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Carrier Phones</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Unlocked Phones</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Phone & Cellphone
                                            Cases</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Cellphone
                                            Chargers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-furniture"></i>Furniture
                        </a>
                        <ul>
                            <li>
                                <a href="#">Furniture</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Sofas & Couches</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Armchairs</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bed Frames</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Beside Tables</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Dressing Tables</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Lighting</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Light Bulbs</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Lamps</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Celling Lights</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Wall Lights</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Bathroom
                                            Lighting</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Home Accessories</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Decorative
                                            Accessories</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Candals &
                                            Holders</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Home Fragrance</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Mirrors</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Clocks</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Garden & Outdoors</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Garden
                                            Furniture</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Lawn Mowers</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Pressure
                                            Washers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">All Garden
                                            Tools</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Outdoor Dining</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-heartbeat"></i>Healthy & Beauty
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-gift"></i>Gift Ideas
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-gamepad"></i>Toy & Games
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ice-cream"></i>Cooking
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ios"></i>Smart Phones
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-camera"></i>Cameras & Photo
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ruby"></i>Accessories
                        </a>
                    </li>
                    <li>
                        <a href="shop-banner-sidebar.html" class="font-weight-bold text-primary text-uppercase ls-25">
                            View All Categories<i class="w-icon-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->

<!-- Plugin JS File -->
<!-- Plugin JS File -->
<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="/assets/vendor/jquery.plugin/jquery.plugin.min.js"></script>
<script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>
<script src="/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="/assets/vendor/floating-parallax/parallax.min.js"></script>
<script src="/assets/vendor/zoom/jquery.zoom.js"></script>

<!-- Main Js -->
<script src="/assets/js/main.min.js"></script>
<script>
    $(window).load(function () {
        setTimeout(function () {
            $('#hideMe').fadeOut()
        }, 6000);
    });
</script>
</body>

</html>
