@extends('layout.master')

@section('title', 'Giới Thiệu')

@section('favicon', asset('images/2.jpg'))

@section('content')
<head>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Inner Header */
        .inner-header {
            background: linear-gradient(135deg, #ffe6e6, #fff7f7);
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .inner-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #1a202c;
            margin: 0;
        }
        .beta-breadcrumb {
            font-size: 1rem;
            color: #4a5568;
        }
        .beta-breadcrumb a {
            color: #ff4d4f;
            text-decoration: none;
        }
        .beta-breadcrumb a:hover {
            text-decoration: underline;
        }

        /* History Section */
        .history-section {
            padding: 3rem 0;
        }
        .history-slider {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
        }
        .history-slide {
            display: flex;
            align-items: center;
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }
        .history-slide img {
            width: 100%;
            height: auto;
            border-radius: 0.75rem;
            object-fit: cover;
        }
        .history-slide h5 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #ff4d4f;
            margin-bottom: 1rem;
        }
        .history-slide p {
            color: #4a5568;
            line-height: 1.6;
        }
        .history-navigation {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }
        .history-navigation a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: #f7fafc;
            color: #1a202c;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        .history-navigation a:hover,
        .history-navigation a.active {
            background: #ff4d4f;
            color: #ffffff;
            transform: scale(1.1);
        }

        /* Passion Section */
        .passion-section {
            text-align: center;
            padding: 3rem 0;
            background: #f7fafc;
        }
        .passion-section h2 {
            font-size: 2.25rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 1.5rem;
        }
        .passion-section p {
            font-size: 1.125rem;
            color: #4a5568;
            max-width: 700px;
            margin: 0 auto 2rem;
        }

        /* Counter Section */
        .counter-section {
            padding: 3rem 0;
            background: #ffffff;
        }
        .beta-counter {
            text-align: center;
            transition: transform 0.3s ease;
        }
        .beta-counter:hover {
            transform: scale(1.1);
        }
        .beta-counter-icon {
            font-size: 2.5rem;
            color: #ff4d4f;
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }
        .beta-counter:hover .beta-counter-icon {
            transform: scale(1.2);
        }
        .beta-counter-value {
            font-size: 2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 0.5rem;
            transition: transform 0.3s ease;
        }
        .beta-counter:hover .beta-counter-value {
            transform: scale(1.15);
        }
        .beta-counter-title {
            font-size: 1rem;
            color: #4a5568;
            transition: transform 0.3s ease;
        }
        .beta-counter:hover .beta-counter-title {
            transform: scale(1.15);
        }

        /* Team Section */
        .team-section {
            padding: 3rem 0;
        }
        .beta-person {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .beta-person:hover {
            transform: translateY(-10px);
        }
        .beta-person img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .beta-person-body {
            padding: 1.5rem;
            text-align: center;
        }
        .beta-person-body h5 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }
        .beta-person-body p {
            color: #4a5568;
            margin-bottom: 1rem;
        }
        .beta-person-body a {
            color: #ff4d4f;
            text-decoration: none;
            font-weight: 600;
        }
        .beta-person-body a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .history-slide {
                flex-direction: column;
                text-align: center;
            }
            .history-slide img {
                margin-bottom: 1rem;
            }
            .history-navigation a {
                width: 50px;
                height: 50px;
                font-size: 0.9rem;
            }
            .beta-counter:hover {
                transform: scale(1.05);
            }
            .beta-counter:hover .beta-counter-icon {
                transform: scale(1.1);
            }
            .beta-counter:hover .beta-counter-value {
                transform: scale(1.1);
            }
            .beta-counter:hover .beta-counter-title {
                transform: scale(1.1);
            }
        }
    </style>
</head>

<!-- Inner Header -->
<div class="inner-header">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <h6 class="inner-title">Giới Thiệu</h6>
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('home') }}">Trang Chủ</a> / <span>Giới Thiệu</span>
            </div>
        </div>
    </div>
</div>

<!-- History Section -->
<section class="history-section">
    <div class="container mx-auto px-4">
        <h2 class="text-center text-3xl font-bold text-gray-900 mb-8">Lịch Sử Của Chúng Tôi</h2>
        <div class="history-slider swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide history-slide">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="md:w-5/12">
                            <img src="https://images.pexels.com/photos/5638732/pexels-photo-5638732.jpeg" alt="2003">
                        </div>
                        <div class="md:w-7/12">
                            <h5 class="other-title">Khai Sinh</h5>
                            <p>
                                123 Đường Bánh Ngọt, Phường 7,<br />
                                Quận 3, TP. Hồ Chí Minh<br />
                                Việt Nam
                            </p>
                            <div class="my-4"></div>
                            <p>Tiệm bánh của chúng tôi ra đời vào năm 2003 với giấc mơ mang đến những chiếc bánh ngọt ngào, lan tỏa niềm vui cho mọi người. Từ một cửa hàng nhỏ, chúng tôi đã bắt đầu hành trình với tình yêu dành cho nghệ thuật làm bánh và sự tận tâm trong từng sản phẩm.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide history-slide">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="md:w-5/12">
                            <img src="https://nplaw.vn/upload/images/doanh-nghiep/02(3).jpg" alt="2004">
                        </div>
                        <div class="md:w-7/12">
                            <h5 class="other-title">Mở Rộng</h5>
                            <p>
                                123 Đường Bánh Ngọt, Phường 7,<br />
                                Quận 3, TP. Hồ Chí Minh<br />
                                Việt Nam
                            </p>
                            <div class="my-4"></div>
                            <p>Năm 2004, tiệm bánh mở thêm chi nhánh thứ hai, mang đến nhiều lựa chọn bánh ngọt hơn cho khách hàng. Chúng tôi bắt đầu thử nghiệm các công thức mới, kết hợp hương vị truyền thống và hiện đại để đáp ứng mọi khẩu vị.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide history-slide">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="md:w-5/12">
                            <img src="https://images.pexels.com/photos/205961/pexels-photo-205961.jpeg" alt="2005">
                        </div>
                        <div class="md:w-7/12">
                            <h5 class="other-title">Đổi Mới</h5>
                            <p>
                                123 Đường Bánh Ngọt, Phường 7,<br />
                                Quận 3, TP. Hồ Chí Minh<br />
                                Việt Nam
                            </p>
                            <div class="my-4"></div>
                            <p>Năm 2005 đánh dấu bước ngoặt khi chúng tôi giới thiệu dòng bánh thiết kế riêng, giúp khách hàng cá nhân hóa bánh cho các dịp đặc biệt. Sự sáng tạo này đã nhận được sự yêu thích lớn từ cộng đồng.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide history-slide">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="md:w-5/12">
                            <img src="https://file.hstatic.net/200000472237/file/ship-hang-la-gi_430e7b6ce6684f948b248b87ae81363b_grande.png" alt="2007">
                        </div>
                        <div class="md:w-7/12">
                            <h5 class="other-title">Giao Hàng</h5>
                            <p>
                                123 Đường Bánh Ngọt, Phường 7,<br />
                                Quận 3, TP. Hồ Chí Minh<br />
                                Việt Nam
                            </p>
                            <div class="my-4"></div>
                            <p>Năm 2007, chúng tôi ra mắt dịch vụ giao bánh tận nơi, mang sự tiện lợi đến khách hàng. Điều này giúp tiệm bánh trở thành lựa chọn hàng đầu cho các sự kiện và tiệc tùng tại TP. Hồ Chí Minh.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide history-slide">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="md:w-5/12">
                            <img src="https://images.pexels.com/photos/5638736/pexels-photo-5638736.jpeg" alt="2009">
                        </div>
                        <div class="md:w-7/12">
                            <h5 class="other-title">Đội Ngũ</h5>
                            <p>
                                123 Đường Bánh Ngọt, Phường 7,<br />
                                Quận 3, TP. Hồ Chí Minh<br />
                                Việt Nam
                            </p>
                            <div class="my-4"></div>
                            <p>Năm 2009, đội ngũ thợ bánh của chúng tôi được mở rộng với các chuyên gia lành nghề, giúp nâng cao chất lượng và sự đa dạng của các món bánh, từ bánh mì ngọt đến bánh cưới sang trọng.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide history-slide">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="md:w-5/12">
                            <img src="https://marketingtrips.com/wp-content/uploads/2021/03/cong-dong-thuong-hieu-1.jpeg" alt="2011">
                        </div>
                        <div class="md:w-7/12">
                            <h5 class="other-title">Cộng Đồng</h5>
                            <p>
                                123 Đường Bánh Ngọt, Phường 7,<br />
                                Quận 3, TP. Hồ Chí Minh<br />
                                Việt Nam
                            </p>
                            <div class="my-4"></div>
                            <p>Năm 2011, chúng tôi tổ chức các workshop làm bánh, kết nối với cộng đồng yêu bánh ngọt. Những buổi học này đã trở thành cầu nối, lan tỏa đam mê làm bánh đến mọi người.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide history-slide">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="md:w-5/12">
                            <img src="https://images.pexels.com/photos/5638734/pexels-photo-5638734.jpeg" alt="2014">
                        </div>
                        <div class="md:w-7/12">
                            <h5 class="other-title">Thành Công</h5>
                            <p>
                                123 Đường Bánh Ngọt, Phường 7,<br />
                                Quận 3, TP. Hồ Chí Minh<br />
                                Việt Nam
                            </p>
                            <div class="my-4"></div>
                            <p>Năm 2014, tiệm bánh được vinh danh là một trong những tiệm bánh ngọt hàng đầu TP. Hồ Chí Minh, khẳng định vị thế nhờ chất lượng vượt trội và sự yêu mến từ khách hàng.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="history-navigation">
                <a href="#" data-slide-index="0" class="circle">2003</a>
                <a href="#" data-slide-index="1" class="circle">2004</a>
                <a href="#" data-slide-index="2" class="circle">2005</a>
                <a href="#" data-slide-index="3" class="circle">2007</a>
                <a href="#" data-slide-index="4" class="circle">2009</a>
                <a href="#" data-slide-index="5" class="circle">2011</a>
                <a href="#" data-slide-index="6" class="circle">2014</a>
            </div>
        </div>
    </div>
</section>

<!-- Passion Section -->
<section class="passion-section">
    <div class="container mx-auto px-4">
        <h2>Đam Mê Của Chúng Tôi Là Mang Hạnh Phúc Qua Từng Chiếc Bánh</h2>
        <p>Chúng tôi tin rằng mỗi chiếc bánh không chỉ là món ăn, mà còn là món quà của niềm vui và sự kết nối. Với tình yêu và sự tận tâm, chúng tôi luôn nỗ lực để mang đến những trải nghiệm ngọt ngào nhất cho bạn.</p>
    </div>
</section>

<!-- Counter Section -->
<section class="counter-section">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="beta-counter">
                <p class="beta-counter-icon">👥</p>
                <p class="beta-counter-value timer" data-to="19855" data-speed="2000">19855</p>
                <p class="beta-counter-title">Khách Hàng Hài Lòng</p>
            </div>
            <div class="beta-counter">
                <p class="beta-counter-icon">🍰</p>
                <p class="beta-counter-value timer" data-to="3568" data-speed="2000">3568</p>
                <p class="beta-counter-title">Chiếc Bánh Đã Làm</p>
            </div>
            <div class="beta-counter">
                <p class="beta-counter-icon">⏰</p>
                <p class="beta-counter-value timer" data-to="258934" data-speed="2000">258934</p>
                <p class="beta-counter-title">Giờ Phục Vụ</p>
            </div>
            <div class="beta-counter">
                <p class="beta-counter-icon">🎂</p>
                <p class="beta-counter-value timer" data-to="150" data-speed="2000">150</p>
                <p class="beta-counter-title">Đơn Hàng Mới</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container mx-auto px-4">
        <h2 class="text-center text-3xl font-bold text-gray-900 mb-8">Đội Ngũ Tuyệt Vời Của Chúng Tôi</h2>
        <h5 class="text-center text-xl font-semibold text-gray-700 mb-4">Người Sáng Lập</h5>
        <p class="text-center text-gray-600 mb-8">Họ là những người đặt nền móng cho tiệm bánh, mang đam mê và sáng tạo để tạo nên những món bánh ngọt ngào.</p>
        <!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="beta-person">
                <img src="https://images.unsplash.com/photo-1595877244574-e90ce46ce0d7" alt="Founder 1">
                <div class="beta-person-body">
                    <h5>Nguyễn Thị Lan</h5>
                    <p class="font-large text-gray-600">Người Sáng Lập</p>
                    <p>Với tình yêu dành cho bánh ngọt, chị Lan đã khởi đầu tiệm bánh với ước mơ mang niềm vui đến mọi gia đình. Sự tận tâm của chị là nguồn cảm hứng cho cả đội ngũ.</p>
                    <a href="#">Xem thêm <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="beta-person">
                <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e" alt="Founder 2">
                <div class="beta-person-body">
                    <h5>Trần Văn Hùng</h5>
                    <p class="font-large text-gray-600">Người Sáng Lập</p>
                    <p>Anh Hùng mang đến sự sáng tạo trong từng công thức bánh, kết hợp hương vị truyền thống và hiện đại để tạo nên những món bánh độc đáo.</p>
                    <a href="#">Xem thêm <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div> -->
        <h5 class="text-center text-xl font-semibold text-gray-700 mb-4">Những Thợ Bánh Tài Hoa</h5>
        <p class="text-center text-gray-600 mb-8">Đội ngũ thợ bánh của chúng tôi là những nghệ sĩ, đặt cả trái tim vào từng chiếc bánh để mang đến trải nghiệm tuyệt vời cho bạn.</p>
        <!-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="beta-person">
                <img src="https://images.pexels.com/photos/3771122/pexels-photo-3771122.jpeg" alt="Team 1">
                <div class="beta-person-body">
                    <h5>Lê Hồng Nhung</h5>
                    <p class="font-large text-gray-600">Thợ Bánh Chính</p>
                    <p>Chị Nhung nổi tiếng với những chiếc bánh cưới lộng lẫy, biến mọi ý tưởng thành hiện thực.</p>
                    <a href="#">Xem thêm <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="beta-person">
                <img src="https://images.pexels.com/photos/3771118/pexels-photo-3771118.jpeg" alt="Team 2">
                <div class="beta-person-body">
                    <h5>Phạm Minh Tuấn</h5>
                    <p class="font-large text-gray-600">Thợ Bánh</p>
                    <p>Anh Tuấn chuyên về bánh ngọt truyền thống, mang đến hương vị quê nhà trong từng món bánh.</p>
                    <a href="#">Xem thêm <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="beta-person">
                <img src="https://images.pexels.com/photos/3771120/pexels-photo-3771120.jpeg" alt="Team 3">
                <div class="beta-person-body">
                    <h5>Đỗ Thị Mai</h5>
                    <p class="font-large text-gray-600">Thợ Bánh</p>
                    <p>Chị Mai là bậc thầy về bánh ngọt hiện đại, luôn sáng tạo với các công thức mới lạ.</p>
                    <a href="#">Xem thêm <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="beta-person">
                <img src="https://images.pexels.com/photos/3771110/pexels-photo-3771110.jpeg" alt="Team 4">
                <div class="beta-person-body">
                    <h5>Nguyễn Văn An</h5>
                    <p class="font-large text-gray-600">Thợ Bánh</p>
                    <p>Anh An chuyên thiết kế bánh sinh nhật, mang lại nụ cười cho mọi bữa tiệc.</p>
                    <a href="#">Xem thêm <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div> -->
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countto/1.2.0/jquery.countTo.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // History Slider
        const historySwiper = new Swiper('.history-slider', {
            loop: false,
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: false,
            navigation: false,
            on: {
                slideChange: function () {
                    // Update active navigation button
                    const activeIndex = this.activeIndex;
                    document.querySelectorAll('.history-navigation a').forEach(a => a.classList.remove('active'));
                    document.querySelector(`.history-navigation a[data-slide-index="${activeIndex}"]`).classList.add('active');
                }
            }
        });

        // Navigation buttons
        document.querySelectorAll('.history-navigation a').forEach((button, index) => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                historySwiper.slideTo(index);
                // Active state updated via slideChange event
            });
        });

        // Set first button active
        document.querySelector('.history-navigation a[data-slide-index="0"]').classList.add('active');

        // Counter animation
        $('.timer').each(function() {
            $(this).countTo({
                formatter: function(value, options) {
                    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                }
            });
        });
    });
</script>
@endsection