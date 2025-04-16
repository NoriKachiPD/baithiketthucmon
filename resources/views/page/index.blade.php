@extends('layout.master')

@section('title', 'Trang Chủ')

@section('favicon', asset('images/1.jpg'))

@section('content')

<head>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Hero Slider */
        .hero-slider {
            width: 100%;
            height: 500px;
            overflow: hidden;
        }
        .hero-slider img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .swiper-button-prev,
        .swiper-button-next {
            color: #ffffff;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .swiper-pagination-bullet {
            background: #ffffff;
            opacity: 0.7;
        }
        .swiper-pagination-bullet-active {
            background: #ff4d4f;
            opacity: 1;
        }

        /* Section styles */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1a202c;
            text-align: center;
            margin-bottom: 2rem;
        }
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #ffffff;
            border-radius: 0.75rem;
            padding: 1.5rem;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .cta-button {
            background: linear-gradient(90deg, #ff4d4f, #ff6b6b);
            color: #ffffff;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s ease;
        }
        .cta-button:hover {
            background: linear-gradient(90deg, #e63946, #f94144);
        }
        .testimonial-card {
            background: #f7fafc;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .partner-logo {
            max-height: 80px; /* Tăng kích thước logo */
            width: auto;
            object-fit: contain;
            transition: transform 0.3s ease, filter 0.3s ease;
            filter: grayscale(20%); /* Hiệu ứng màu nhẹ */
        }
        .partner-logo:hover {
            transform: scale(1.1); /* Phóng to khi hover */
            filter: grayscale(0%) brightness(1.1); /* Bỏ grayscale, tăng sáng */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Thêm bóng */
        }
        .partner-section {
            background: linear-gradient(135deg, #fff7f7, #ffe6e6); /* Nền gradient màu pastel */
            padding: 3rem 0;
            border-radius: 1rem;
        }
    </style>
</head>

<!-- Hero Slider (giữ nguyên) -->
<div class="swiper hero-slider" style="width: 100%; height: 500px; margin-bottom: 10px;">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="source/assets/dest/images/thumbs/banner1.jpg" style="width:100%; height:100%; object-fit: cover;">
        </div>
        <div class="swiper-slide">
            <img src="source/assets/dest/images/thumbs/banner2.jpg" style="width:100%; height:100%; object-fit: cover;">
        </div>
        <div class="swiper-slide">
            <img src="source/assets/dest/images/thumbs/banner3.jpg" style="width:100%; height:100%; object-fit: cover;">
        </div>
        <div class="swiper-slide">
            <img src="source/assets/dest/images/thumbs/banner4.jpg" style="width:100%; height:100%; object-fit: cover;">
        </div>
    </div>
    <!-- Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<!-- About Us Section -->
<section class="py-16 bg-gray-100" style="margin-top: 10px;">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Về Tiệm Bánh Của Sự Ngọt Ngào</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <p class="text-lg text-black-900 leading-relaxed">
                    Chào mừng bạn đến với tiệm bánh của chúng tôi, nơi mỗi chiếc bánh là một câu chuyện ngọt ngào được tạo nên từ tình yêu và đam mê. Với hơn một thập kỷ mang niềm vui qua từng món bánh, chúng tôi tự hào mang đến những trải nghiệm vị giác tuyệt vời cho mọi khách hàng.
                </p>
                <p class="text-lg text-black-900 leading-relaxed mt-4">
                    Tại đây, chúng tôi sử dụng nguyên liệu tươi ngon nhất, kết hợp với bí quyết thủ công để tạo ra những chiếc bánh không chỉ đẹp mắt mà còn đậm đà hương vị. Hãy ghé thăm để cùng chúng tôi lan tỏa niềm hạnh phúc qua từng miếng bánh!
                </p>
                <a href="{{ route('about') }}" class="cta-button mt-6">Khám Phá Thêm</a>
            </div>
            <div class="flex justify-center">
                <img src="https://png.pngtree.com/thumb_back/fh260/background/20230518/pngtree-bakery-has-many-kinds-of-pastries-in-display-cases-image_2573059.jpg" alt="Tiệm bánh" class="rounded-lg shadow-lg max-w-full h-auto bakery-image">
            </div>
        </div>
    </div>
</section>
<style>
    /* Section Title */
    .section-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: #1a202c;
        text-align: center;
        margin-bottom: 2rem;
    }

    /* CTA Button */
    .cta-button {
        display: inline-block;
        background: #ff4d4f;
        color: #ffffff;
        padding: 0.75rem 1.5rem;
        border-radius: 0.375rem;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s ease;
    }
    .cta-button:hover {
        background: #e63946;
    }

    /* Bakery Image */
    .bakery-image {
        transition: all 0.3s ease; /* Chuyển động mượt mà cho tất cả hiệu ứng */
    }

    /* Hiệu ứng 1: Phóng to */
    .bakery-image:hover {
        transform: scale(1.1); /* Phóng to 110% */
    }

    /* Hiệu ứng 2: Mờ và sáng (uncomment để dùng riêng) */
/*     
    .bakery-image:hover {
        opacity: 0.85;
        filter: brightness(1.2);
    }
    */

    /* Hiệu ứng 3: Xoay nhẹ (uncomment để dùng riêng) */
    
    .bakery-image:hover {
        transform: rotate(5deg);
    }
   

    /* Hiệu ứng 4: Viền sáng (uncomment để dùng riêng) */
    
    .bakery-image:hover {
        border: 3px solid #ff4d4f;
        box-shadow: 0 0 15px rgba(255, 77, 79, 0.5);
    }
   

    /* Kết hợp tất cả hiệu ứng (uncomment để dùng) */
/*     
    .bakery-image:hover {
        transform: scale(1.1) rotate(5deg);
        opacity: 0.85;
        filter: brightness(1.2);
        border: 3px solid #ff4d4f;
        box-shadow: 0 0 15px rgba(255, 77, 79, 0.5);
    }
    */

    /* Responsive */
    @media (max-width: 768px) {
        .bakery-image {
            max-width: 100%;
        }
        .bakery-image:hover {
            transform: scale(1.05); /* Giảm phóng to trên mobile */
            /* Hoặc các hiệu ứng khác nếu dùng */
            /*
            transform: rotate(3deg);
            opacity: 0.9;
            filter: brightness(1.1);
            border: 2px solid #ff4d4f;
            box-shadow: 0 0 10px rgba(255, 77, 79, 0.3);
            */
        }
    }
    .swiper-button-next,
    .swiper-button-prev {
        box-shadow: none !important;
        filter: none !important;
        background: none !important;
        z-index: 99 !important;
        color: gray;
    }
</style>

<!-- Features Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Điều Gì Làm Nên Sự Đặc Biệt?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="feature-card text-center">
                <div class="text-4xl text-red-500 mb-4">🍰</div>
                <h3 class="text-xl font-semibold mb-2">Nguyên liệu tươi ngon</h3>
                <p class="text-gray-600">Chọn lọc những nguyên liệu chất lượng cao để đảm bảo hương vị tuyệt hảo.</p>
            </div>
            <div class="feature-card text-center">
                <div class="text-4xl text-red-500 mb-4">🧑‍🍳</div>
                <h3 class="text-xl font-semibold mb-2">Thợ bánh tận tâm</h3>
                <p class="text-gray-600">Đội ngũ thợ bánh giàu kinh nghiệm, đặt cả trái tim vào từng sản phẩm.</p>
            </div>
            <div class="feature-card text-center">
                <div class="text-4xl text-red-500 mb-4">🎂</div>
                <h3 class="text-xl font-semibold mb-2">Thiết kế độc đáo</h3>
                <p class="text-gray-600">Tùy chỉnh bánh theo ý tưởng của bạn, phù hợp mọi dịp đặc biệt.</p>
            </div>
            <div class="feature-card text-center">
                <div class="text-4xl text-red-500 mb-4">🚚</div>
                <h3 class="text-xl font-semibold mb-2">Giao bánh tận nơi</h3>
                <p class="text-gray-600">Mang những chiếc bánh thơm ngon đến tận tay bạn, nhanh chóng và tiện lợi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Khách Hàng Nói Gì</h2>
        <div class="swiper testimonial-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonial-card mx-auto max-w-lg text-center">
                        <p class="text-gray-700 italic">"Chiếc bánh sinh nhật ở đây thật sự tuyệt vời, cả nhà mình ai cũng thích! Dịch vụ rất chu đáo."</p>
                        <p class="mt-4 font-semibold">Nguyễn Thị Mai</p>
                        <p class="text-gray-500">Khách hàng thân thiết</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial-card mx-auto max-w-lg text-center">
                        <p class="text-gray-700 italic">"Mình đặt bánh cưới ở đây, thiết kế đẹp lung linh và vị thì không chê vào đâu được!"</p>
                        <p class="mt-4 font-semibold">Trần Văn Minh</p>
                        <p class="text-gray-500">Khách hàng sự kiện</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonial-card mx-auto max-w-lg text-center">
                        <p class="text-gray-700 italic">"Bánh ngọt ở đây lúc nào cũng tươi mới, giao hàng đúng giờ. Mình rất hài lòng!"</p>
                        <p class="mt-4 font-semibold">Lê Hồng Nhung</p>
                        <p class="text-gray-500">Khách hàng thường xuyên</p>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-16 bg-red-500 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Thưởng Thức Ngọt Ngào Ngay Hôm Nay!</h2>
        <p class="text-lg mb-6">Đặt bánh hoặc ghé thăm tiệm để trải nghiệm những món bánh tuyệt hảo của chúng tôi!</p>
        <a href="{{ route('contacts') }}" class="cta-button text-lg">Liên Hệ Ngay</a>
    </div>
</section>

<!-- Partners/Clients Section -->
<section class="py-16 partner-section">
    <div class="container mx-auto px-4">
        <h2 class="section-title">Khách Hàng & Đối Tác</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-10">
            <img src="https://images.pexels.com/photos/5638732/pexels-photo-5638732.jpeg" alt="Partner 1" class="partner-logo mx-auto">
            <img src="https://images.pexels.com/photos/5638733/pexels-photo-5638733.jpeg" alt="Partner 2" class="partner-logo mx-auto">
            <img src="https://images.pexels.com/photos/5638734/pexels-photo-5638734.jpeg" alt="Partner 3" class="partner-logo mx-auto">
            <img src="https://images.pexels.com/photos/5638735/pexels-photo-5638735.jpeg" alt="Partner 4" class="partner-logo mx-auto">
            <img src="https://images.pexels.com/photos/5638736/pexels-photo-5638736.jpeg" alt="Partner 5" class="partner-logo mx-auto">
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Hero Slider (giữ nguyên)
        const heroSwiper = new Swiper('.hero-slider', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                reverseDirection: true, // <- cái này sẽ bị bỏ qua nếu không có suppor
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'cube',
            grabCursor: true,
            cubeEffect: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 1,
            },
        });

        // Testimonial Slider
        const testimonialSwiper = new Swiper('.testimonial-slider', {
            loop: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            slidesPerView: 1,
            spaceBetween: 20,
        });
    });
</script>

@endsection