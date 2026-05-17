<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration | {{ config('app.name', 'SIMS') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }

        .hero-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0ea5e9 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .form-input-focus:focus {
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.2);
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        .slide-up {
            animation: slideUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes slideUp {
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800 bg-white">

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-lg border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-sky-500 to-blue-700 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold bg-gradient-to-r from-sky-600 to-blue-800 bg-clip-text text-transparent">SIMS</span>
                </div>
                <div class="hidden md:flex items-center gap-8">
                    <a href="#home" class="text-sm font-medium text-gray-600 hover:text-sky-600 transition-colors">Home</a>
                    <a href="#features" class="text-sm font-medium text-gray-600 hover:text-sky-600 transition-colors">Features</a>
                    <a href="#register" class="text-sm font-medium text-gray-600 hover:text-sky-600 transition-colors">Register</a>
                    <a href="#contact" class="text-sm font-medium text-gray-600 hover:text-sky-600 transition-colors">Contact</a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="#register" class="hidden sm:inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-sky-500 to-blue-600 text-white text-sm font-semibold rounded-xl hover:from-sky-600 hover:to-blue-700 transition-all shadow-lg shadow-sky-500/25 hover:shadow-sky-500/40">
                        Register Now
                    </a>
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <div class="flex flex-col gap-2">
                    <a href="#home" class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors">Home</a>
                    <a href="#features" class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors">Features</a>
                    <a href="#register" class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors">Register</a>
                    <a href="#contact" class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient relative min-h-screen flex items-center overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-sky-400/10 rounded-full blur-3xl float-animation"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-400/10 rounded-full blur-3xl float-animation" style="animation-delay: -3s;"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-sky-500/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-16">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Hero Content -->
                <div class="text-center lg:text-left">
                    <div class="fade-in">
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-sky-500/20 text-sky-200 text-sm font-medium rounded-full border border-sky-400/20 mb-6">
                            <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                            Enrollment Open for 2026
                        </span>
                    </div>
                    <h1 class="slide-up text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight" style="animation-delay: 0.2s;">
                        Start Your
                        <span class="bg-gradient-to-r from-sky-300 to-cyan-200 bg-clip-text text-transparent"> Academic Journey</span>
                        Today
                    </h1>
                    <p class="slide-up mt-6 text-lg sm:text-xl text-sky-100/80 max-w-xl mx-auto lg:mx-0 leading-relaxed" style="animation-delay: 0.4s;">
                        Join our community of learners. Register now and take the first step toward a brighter future with quality education and modern resources.
                    </p>
                    <div class="slide-up mt-10 flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start" style="animation-delay: 0.6s;">
                        <a href="#register" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-white text-blue-800 text-base font-bold rounded-2xl hover:bg-sky-50 transition-all shadow-xl shadow-black/10 hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Register Now
                        </a>
                        <a href="#features" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 border-2 border-white/20 text-white text-base font-semibold rounded-2xl hover:bg-white/10 transition-all">
                            Learn More
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="slide-up mt-14 grid grid-cols-3 gap-6 max-w-md mx-auto lg:mx-0" style="animation-delay: 0.8s;">
                        <div class="text-center lg:text-left">
                            <div class="text-3xl font-extrabold text-white">5K+</div>
                            <div class="text-sm text-sky-200/70 mt-1">Students</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-3xl font-extrabold text-white">50+</div>
                            <div class="text-sm text-sky-200/70 mt-1">Courses</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-3xl font-extrabold text-white">95%</div>
                            <div class="text-sm text-sky-200/70 mt-1">Success Rate</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Visual -->
                <div class="hidden lg:flex justify-center items-center">
                    <div class="relative float-animation">
                        <div class="w-80 h-80 bg-gradient-to-br from-sky-400/20 to-blue-600/20 rounded-3xl border border-white/10 backdrop-blur-sm p-8 shadow-2xl">
                            <div class="space-y-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 bg-sky-500/30 rounded-2xl flex items-center justify-center">
                                        <svg class="w-7 h-7 text-sky-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold">Academic Programs</div>
                                        <div class="text-sky-200/60 text-sm">50+ courses available</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 bg-emerald-500/30 rounded-2xl flex items-center justify-center">
                                        <svg class="w-7 h-7 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold">Expert Faculty</div>
                                        <div class="text-sky-200/60 text-sm">Experienced educators</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 bg-violet-500/30 rounded-2xl flex items-center justify-center">
                                        <svg class="w-7 h-7 text-violet-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold">Certified Programs</div>
                                        <div class="text-sky-200/60 text-sm">Accredited degrees</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 bg-amber-500/30 rounded-2xl flex items-center justify-center">
                                        <svg class="w-7 h-7 text-amber-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-semibold">Quick Registration</div>
                                        <div class="text-sky-200/60 text-sm">Easy 2-minute process</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 lg:py-28 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 bg-sky-50 text-sky-600 text-sm font-semibold rounded-full mb-4">Why Choose Us</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Everything You Need to <span class="text-sky-600">Succeed</span></h2>
                <p class="mt-4 text-lg text-gray-500">Our institution provides a comprehensive learning environment designed to help every student reach their full potential.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group p-8 bg-white rounded-2xl border border-gray-100 hover:border-sky-200 hover:shadow-xl hover:shadow-sky-500/5 transition-all duration-300">
                    <div class="w-14 h-14 bg-sky-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-sky-500 transition-colors">
                        <svg class="w-7 h-7 text-sky-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Modern Curriculum</h3>
                    <p class="text-gray-500 leading-relaxed">Industry-aligned courses designed with the latest standards and practices to prepare you for the real world.</p>
                </div>

                <!-- Feature 2 -->
                <div class="group p-8 bg-white rounded-2xl border border-gray-100 hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/5 transition-all duration-300">
                    <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-500 transition-colors">
                        <svg class="w-7 h-7 text-emerald-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Smart Learning</h3>
                    <p class="text-gray-500 leading-relaxed">Access digital resources, interactive labs, and a personalized learning management system for every student.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group p-8 bg-white rounded-2xl border border-gray-100 hover:border-violet-200 hover:shadow-xl hover:shadow-violet-500/5 transition-all duration-300">
                    <div class="w-14 h-14 bg-violet-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-violet-500 transition-colors">
                        <svg class="w-7 h-7 text-violet-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Faculty</h3>
                    <p class="text-gray-500 leading-relaxed">Learn from experienced professors and industry professionals who are passionate about teaching and mentoring.</p>
                </div>

                <!-- Feature 4 -->
                <div class="group p-8 bg-white rounded-2xl border border-gray-100 hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/5 transition-all duration-300">
                    <div class="w-14 h-14 bg-amber-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-amber-500 transition-colors">
                        <svg class="w-7 h-7 text-amber-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Campus Facilities</h3>
                    <p class="text-gray-500 leading-relaxed">State-of-the-art labs, libraries, sports facilities, and student lounges for a complete campus experience.</p>
                </div>

                <!-- Feature 5 -->
                <div class="group p-8 bg-white rounded-2xl border border-gray-100 hover:border-rose-200 hover:shadow-xl hover:shadow-rose-500/5 transition-all duration-300">
                    <div class="w-14 h-14 bg-rose-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-rose-500 transition-colors">
                        <svg class="w-7 h-7 text-rose-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Career Support</h3>
                    <p class="text-gray-500 leading-relaxed">Dedicated career counseling, internship placements, and job fairs to launch your professional career.</p>
                </div>

                <!-- Feature 6 -->
                <div class="group p-8 bg-white rounded-2xl border border-gray-100 hover:border-cyan-200 hover:shadow-xl hover:shadow-cyan-500/5 transition-all duration-300">
                    <div class="w-14 h-14 bg-cyan-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-cyan-500 transition-colors">
                        <svg class="w-7 h-7 text-cyan-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Global Community</h3>
                    <p class="text-gray-500 leading-relaxed">Join a diverse community of students from around the world and build a network that lasts a lifetime.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Form Section -->
    <section id="register" class="py-20 lg:py-28 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-start">
                <!-- Left Content -->
                <div class="lg:sticky lg:top-28">
                    <span class="inline-block px-4 py-1.5 bg-sky-50 text-sky-600 text-sm font-semibold rounded-full mb-4">Registration</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Begin Your <span class="text-sky-600">Registration</span></h2>
                    <p class="mt-4 text-lg text-gray-500 leading-relaxed">Fill out the form to start your enrollment process. Our team will review your application and get back to you within 2-3 business days.</p>

                    <div class="mt-10 space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-sky-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Quick & Easy</h4>
                                <p class="text-gray-500 text-sm mt-1">Complete your registration in just a few minutes with our streamlined form.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Secure & Private</h4>
                                <p class="text-gray-500 text-sm mt-1">Your personal information is encrypted and stored securely on our servers.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-violet-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Instant Confirmation</h4>
                                <p class="text-gray-500 text-sm mt-1">Receive an email confirmation immediately after submitting your application.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="glass-card rounded-3xl shadow-2xl shadow-gray-200/50 p-8 sm:p-10 border border-gray-100">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="text-center mb-2">
                            <h3 class="text-2xl font-bold text-gray-900">Student Registration</h3>
                            <p class="text-gray-500 text-sm mt-1">Please fill in all required fields</p>
                        </div>

                        <!-- Name Fields -->
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">First Name <span class="text-red-500">*</span></label>
                                <input type="text" id="first_name" name="first_name" required placeholder="John"
                                    class="form-input-focus w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-sky-500 transition-all">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">Last Name <span class="text-red-500">*</span></label>
                                <input type="text" id="last_name" name="last_name" required placeholder="Doe"
                                    class="form-input-focus w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-sky-500 transition-all">
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" required placeholder="john.doe@example.com"
                                class="form-input-focus w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-sky-500 transition-all">
                        </div>

                        <!-- Phone & Date of Birth -->
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number <span class="text-red-500">*</span></label>
                                <input type="tel" id="phone" name="phone" required placeholder="+251 9XX XXX XXX"
                                    class="form-input-focus w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-sky-500 transition-all">
                            </div>
                            <div>
                                <label for="dob" class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth <span class="text-red-500">*</span></label>
                                <input type="date" id="dob" name="date_of_birth" required
                                    class="form-input-focus w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-sky-500 transition-all">
                            </div>
                        </div>

                        <!-- Gender -->
                        <div>
                            <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">Gender <span class="text-red-500">*</span></label>
                            <select id="gender" name="gender" required
                                class="form-input-focus w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:border-sky-500 transition-all bg-white">
                                <option value="" disabled selected>Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Program -->
                        <div>
                            <label for="program" class="block text-sm font-semibold text-gray-700 mb-2">Program of Study <span class="text-red-500">*</span></label>
                            <select id="program" name="program" required
                                class="form-input-focus w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:border-sky-500 transition-all bg-white">
                                <option value="" disabled selected>Select a program</option>
                                <option value="computer_science">Computer Science</option>
                                <option value="information_technology">Information Technology</option>
                                <option value="software_engineering">Software Engineering</option>
                                <option value="electrical_engineering">Electrical Engineering</option>
                                <option value="mechanical_engineering">Mechanical Engineering</option>
                                <option value="civil_engineering">Civil Engineering</option>
                                <option value="business_administration">Business Administration</option>
                                <option value="accounting">Accounting</option>
                                <option value="economics">Economics</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Academic Year -->
                        <div>
                            <label for="academic_year" class="block text-sm font-semibold text-gray-700 mb-2">Academic Year <span class="text-red-500">*</span></label>
                            <select id="academic_year" name="academic_year" required
                                class="form-input-focus w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:border-sky-500 transition-all bg-white">
                                <option value="" disabled selected>Select academic year</option>
                                <option value="1st_year">1st Year</option>
                                <option value="2nd_year">2nd Year</option>
                                <option value="3rd_year">3rd Year</option>
                                <option value="4th_year">4th Year</option>
                                <option value="5th_year">5th Year</option>
                            </select>
                        </div>

                        <!-- Address -->
                        <div>
                            <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
                            <textarea id="address" name="address" rows="3" placeholder="Enter your full address"
                                class="form-input-focus w-full px-4 py-3 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:border-sky-500 transition-all resize-none"></textarea>
                        </div>

                        <!-- Terms -->
                        <div class="flex items-start gap-3">
                            <input type="checkbox" id="terms" name="terms" required
                                class="mt-1 w-4 h-4 text-sky-600 border-gray-300 rounded focus:ring-sky-500">
                            <label for="terms" class="text-sm text-gray-600">
                                I agree to the <a href="#" class="text-sky-600 font-medium hover:underline">Terms and Conditions</a> and <a href="#" class="text-sky-600 font-medium hover:underline">Privacy Policy</a>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full py-4 bg-gradient-to-r from-sky-500 to-blue-600 text-white text-base font-bold rounded-xl hover:from-sky-600 hover:to-blue-700 transition-all shadow-lg shadow-sky-500/25 hover:shadow-sky-500/40 hover:-translate-y-0.5 active:translate-y-0">
                            Submit Registration
                        </button>

                        <p class="text-center text-sm text-gray-400">
                            Already registered? <a href="{{ url('/login') }}" class="text-sky-600 font-medium hover:underline">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact / Footer Section -->
    <footer id="contact" class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10">
                <!-- Brand -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-sky-500 to-blue-700 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold">SIMS</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">Student Information Management System - Empowering education through modern technology.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#home" class="text-gray-400 hover:text-sky-400 text-sm transition-colors">Home</a></li>
                        <li><a href="#features" class="text-gray-400 hover:text-sky-400 text-sm transition-colors">Features</a></li>
                        <li><a href="#register" class="text-gray-400 hover:text-sky-400 text-sm transition-colors">Registration</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-sky-400 text-sm transition-colors">About Us</a></li>
                    </ul>
                </div>

                <!-- Programs -->
                <div>
                    <h4 class="font-semibold text-white mb-4">Programs</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-sky-400 text-sm transition-colors">Computer Science</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-sky-400 text-sm transition-colors">Engineering</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-sky-400 text-sm transition-colors">Business</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-sky-400 text-sm transition-colors">View All</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="font-semibold text-white mb-4">Contact Us</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-sky-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:kindalemtazeb@gmail.com" class="text-gray-400 hover:text-sky-400 text-sm transition-colors">kindalemtazeb@gmail.com</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-sky-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-gray-400 text-sm">Debark University, Ethiopia</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-sky-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-gray-400 text-sm">+251 9XX XXX XXX</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-800 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} SIMS. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <a href="https://github.com/kindalemtazeb-ops" target="_blank" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center hover:bg-sky-600 transition-colors">
                        <svg class="w-5 h-5 text-gray-400 hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>
                    <a href="mailto:kindalemtazeb@gmail.com" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center hover:bg-sky-600 transition-colors">
                        <svg class="w-5 h-5 text-gray-400 hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
