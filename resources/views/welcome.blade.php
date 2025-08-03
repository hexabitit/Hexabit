<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HexaBit - Professional Programming & IT Technical Support Services">
    <title>HexaBit | Programming & IT Technical Support</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Fira+Code:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Space Grotesk', 'sans-serif'],
                        mono: ['Fira Code', 'monospace'],
                    },
                    animation: {
                        blob: "blob 7s infinite",
                    },
                    keyframes: {
                        blob: {
                            "0%": {
                                transform: "translate(0px, 0px) scale(1)",
                            },
                            "33%": {
                                transform: "translate(30px, -50px) scale(1.1)",
                            },
                            "66%": {
                                transform: "translate(-20px, 20px) scale(0.9)",
                            },
                            "100%": {
                                transform: "translate(0px, 0px) scale(1)",
                            },
                        },
                    },
                },
            },
            plugins: [
                require('@tailwindcss/forms'),
            ],
        }
    </script>
    <style>
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1f2937;
        }
        ::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 font-sans antialiased">
    <!-- Navigation -->
    <nav x-data="{ scrolled: false, isOpen: false }" @scroll.window="scrolled = (window.pageYOffset > 50) ? true : false" 
        :class="{ 'bg-gray-800/90 backdrop-blur-md shadow-lg': scrolled, 'bg-transparent': !scrolled }"
        class="fixed w-full z-50 transition-all duration-300 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="#" class="flex items-center space-x-2">
                        <div class="w-10 h-10 rounded-md bg-gradient-to-br from-cyan-400 to-purple-600 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">HB</span>
                        </div>
                        <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-400">HexaBit</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-8">
                        <a href="#home" class="text-gray-300 hover:text-cyan-400 px-3 py-2 text-sm font-medium transition-colors">Home</a>
                        <a href="#services" class="text-gray-300 hover:text-cyan-400 px-3 py-2 text-sm font-medium transition-colors">Services</a>
                        <a href="#tech" class="text-gray-300 hover:text-cyan-400 px-3 py-2 text-sm font-medium transition-colors">Tech Stack</a>
                        <a href="#contact" class="text-gray-300 hover:text-cyan-400 px-3 py-2 text-sm font-medium transition-colors">Contact</a>
                        <a href="#contact" class="px-4 py-2 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-md text-sm font-medium text-white hover:opacity-90 transition-opacity">
                            Get Support
                        </a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="isOpen = !isOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" class="md:hidden bg-gray-800 border-t border-gray-700">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#home" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#services" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Services</a>
                <a href="#tech" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Tech Stack</a>
                <a href="#contact" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                <a href="#contact" class="block w-full px-4 py-2 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-md text-center text-base font-medium text-white mt-2">
                    Get Support
                </a>
            </div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section id="home" class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900 to-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-500">HexaBit</span>
                            <br>Programming & IT Solutions
                        </h1>
                        <p class="text-lg text-gray-300 max-w-lg">
                            Expert programming services and technical support to take your digital projects to the next level. 
                            We turn complex problems into elegant solutions.
                        </p>
                        <div class="flex flex-wrap gap-4 pt-4">
                            <a href="#contact" class="px-6 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-md text-white font-medium hover:opacity-90 transition-opacity">
                                Get Started
                            </a>
                            <a href="#services" class="px-6 py-3 border border-gray-700 rounded-md text-gray-300 font-medium hover:bg-gray-800 transition-colors">
                                Our Services
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute -top-8 -left-8 w-32 h-32 bg-purple-600 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                        <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-cyan-600 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                        <div class="absolute top-16 -right-16 w-32 h-32 bg-pink-600 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
                        
                        <div class="relative bg-gray-800/50 border border-gray-700 rounded-2xl p-6 backdrop-blur-sm">
                            <div class="flex items-center space-x-2 mb-4">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                <div class="text-gray-400 text-sm ml-2 font-mono">terminal</div>
                            </div>
                            <div class="font-mono text-sm text-gray-300 space-y-2">
                                <div><span class="text-purple-400">$</span> <span class="text-cyan-400">hexabit</span> init project</div>
                                <div>> Initializing HexaBit environment...</div>
                                <div>> Loading technical expertise...</div>
                                <div>> Connecting to solution database...</div>
                                <div class="text-green-400">√ Project ready for development!</div>
                                <div><span class="text-purple-400">$</span> <span class="text-cyan-400">hexabit</span> <span class="text-gray-500 animate-pulse">_</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-500">Our Services</span>
                    </h2>
                    <p class="text-lg text-gray-300 max-w-3xl mx-auto">
                        Comprehensive IT solutions tailored to your specific needs. We cover all aspects of modern software development and technical support.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-700/50 hover:bg-gray-700/70 border border-gray-700 rounded-xl p-6 transition-all hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center mb-6">
                            <i class="fas fa-code text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Custom Development</h3>
                        <p class="text-gray-300">Tailored software solutions designed specifically for your business needs and workflows.</p>
                        <div class="mt-4">
                            <a href="#contact" class="inline-flex items-center text-cyan-400 group-hover:text-cyan-300 transition-colors">
                                Learn more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    
                    
                    <div class="bg-gray-700/50 hover:bg-gray-700/70 border border-gray-700 rounded-xl p-6 transition-all hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center mb-6">
                            <i class="fas fa-globe text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Website Development</h3>
                        <p class="text-gray-300">Professional, high-performance websites tailored to your brand with modern technologies and responsive design.</p>
                        <div class="mt-4">
                            <a href="#contact" class="inline-flex items-center text-cyan-400 group-hover:text-cyan-300 transition-colors">
                                Get started
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <div class="bg-gray-700/50 hover:bg-gray-700/70 border border-gray-700 rounded-xl p-6 transition-all hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center mb-6">
                            <i class="fas fa-mobile-screen-button text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Mobile Application Development</h3>
                        <p class="text-gray-300">Custom native and cross-platform mobile apps built with cutting-edge technologies for iOS and Android.</p>
                        <div class="mt-4">
                            <a href="#contact" class="inline-flex items-center text-cyan-400 group-hover:text-cyan-300 transition-colors">
                                Learn more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="bg-gray-700/50 hover:bg-gray-700/70 border border-gray-700 rounded-xl p-6 transition-all hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-cyan-500 to-cyan-700 flex items-center justify-center mb-6">
                            <i class="fas fa-tools text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Technical Support</h3>
                        <p class="text-gray-300">Expert troubleshooting and maintenance to keep your systems running smoothly.</p>
                        <div class="mt-4">
                            <a href="#contact" class="inline-flex items-center text-cyan-400 group-hover:text-cyan-300 transition-colors">
                                Learn more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    
                    
                    <div class="bg-gray-700/50 hover:bg-gray-700/70 border border-gray-700 rounded-xl p-6 transition-all hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center mb-6">
                            <i class="fas fa-network-wired text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Network Solutions</h3>
                        <p class="text-gray-300">Comprehensive network design, implementation, and optimization for secure and high-performance connectivity.</p>
                        <div class="mt-4">
                            <a href="#contact" class="inline-flex items-center text-cyan-400 group-hover:text-cyan-300 transition-colors">
                                Learn more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="bg-gray-700/50 hover:bg-gray-700/70 border border-gray-700 rounded-xl p-6 transition-all hover:-translate-y-1 group">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center mb-6">
                            <i class="fas fa-database text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Database Solutions</h3>
                        <p class="text-gray-300">Optimized database design, implementation, and management for your applications.</p>
                        <div class="mt-4">
                            <a href="#contact" class="inline-flex items-center text-cyan-400 group-hover:text-cyan-300 transition-colors">
                                Learn more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tech Stack Section -->
        <section id="tech" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-900">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-500">Our Tech Stack</span>
                    </h2>
                    <p class="text-lg text-gray-300 max-w-3xl mx-auto">
                        We work with modern technologies to deliver robust, scalable, and high-performance solutions.
                    </p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                        <i class="fab fa-laravel text-red-500 text-4xl mb-3 group-hover:scale-110 transition-transform"></i>
                        <span class="text-gray-200 font-medium">Laravel</span>
                    </div>
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                        <i class="fab fa-laravel text-purple-400 text-4xl mb-3 group-hover:scale-110 transition-transform"></i>
                        <span class="text-gray-200 font-medium">Livewire</span>
                    </div>
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                        <i class="fab fa-wordpress text-blue-400 text-4xl mb-3 group-hover:scale-110 transition-transform"></i>
                        <span class="text-gray-200 font-medium">WordPress</span>
                    </div>
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                        <svg class="w-10 h-10 mb-3 group-hover:scale-110 transition-transform" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22c-5.523 0-10-4.477-10-10S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" fill="#714B67"/>
                            <path d="M12 5.5c-3.584 0-6.5 2.916-6.5 6.5s2.916 6.5 6.5 6.5 6.5-2.916 6.5-6.5-2.916-6.5-6.5-6.5zm0 11.5c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5z" fill="#714B67"/>
                            <path d="M12 8.5c-1.93 0-3.5 1.57-3.5 3.5s1.57 3.5 3.5 3.5 3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5z" fill="#714B67"/>
                        </svg>
                        <span class="text-gray-200 font-medium">Odoo</span>
                    </div>
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                      <img src="https://img.pikbest.com/origin/10/41/85/35HpIkbEsTU62.png!sw800" 
                          alt="Flutter Logo"
                          class="w-19 h-14 mb-3 group-hover:scale-110 transition-transform object-contain">
                      <span class="text-gray-200 font-medium">Flutter</span>
                  </div>
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/c/c6/Dart_logo.png" 
                          alt="Dart Logo"
                          class="w-10 h-10 mb-3 group-hover:scale-110 transition-transform object-contain">
                      <span class="text-gray-200 font-medium">Dart</span>
                  </div>
                  <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                      <img src="https://logos-world.net/wp-content/uploads/2025/01/UniFi-Logo.png" 
                          alt="Unifi Logo"
                          class="w-16 h-10 mb-3 group-hover:scale-110 transition-transform object-contain">
                      <span class="text-gray-200 font-medium">Unifi</span>
                  </div>
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                        <i class="fab fa-python text-blue-500 text-4xl mb-3 group-hover:scale-110 transition-transform"></i>
                        <span class="text-gray-200 font-medium">Python</span>
                    </div>
                    
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                        <i class="fab fa-aws text-orange-400 text-4xl mb-3 group-hover:scale-110 transition-transform"></i>
                        <span class="text-gray-200 font-medium">AWS</span>
                    </div>
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                        <i class="fab fa-git-alt text-orange-600 text-4xl mb-3 group-hover:scale-110 transition-transform"></i>
                        <span class="text-gray-200 font-medium">Git</span>
                    </div>
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                        <i class="fas fa-database text-blue-300 text-4xl mb-3 group-hover:scale-110 transition-transform"></i>
                        <span class="text-gray-200 font-medium">MySQL</span>
                    </div>
                    <div class="bg-gray-800 rounded-lg p-6 flex flex-col items-center justify-center hover:bg-gray-700 transition-colors group">
                      <img src="https://www.pngfind.com/pngs/m/675-6757223_iot-application-internet-of-things-transparent-hd-png.png" 
                          alt="IoT Logo"
                          class="w-10 h-10 mb-3 group-hover:scale-110 transition-transform object-contain">
                      <span class="text-gray-200 font-medium">IoT</span>
                  </div>
                    
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
<script type="module" src="{{ asset('js/contact.js') }}"></script>
        <section id="contact" class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-800">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <h2 class="text-3xl md:text-4xl font-bold">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-500">Get In Touch</span>
                        </h2>
                        <p class="text-lg text-gray-300">
                            Have a project in mind or need technical support? Send us a message and we'll get back to you as soon as possible.
                        </p>
                        <div class="space-y-4 pt-4">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-gradient-to-br from-cyan-500 to-purple-600 flex items-center justify-center">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">Email Us</h4>
                                    <a href="mailto:hexabit.it@gmail.com" class="text-cyan-400 hover:text-cyan-300">hexabit.it@gmail.com</a>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-gradient-to-br from-cyan-500 to-purple-600 flex items-center justify-center">
                                    <i class="fas fa-phone-alt text-white"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">Call Us</h4>
                                    <a href="tel:+9647808868658" class="text-cyan-400 hover:text-cyan-300">+964 780 886 8658</a> || 
                                    <a href="tel:+9647515163601" class="text-cyan-400 hover:text-cyan-300">+964 751 516 3601</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-700/50 border border-gray-700 rounded-xl p-6 sm:p-8">
                        <form id="contactForm" class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Your Name</label>
                                <input type="text" id="name" class="w-full bg-gray-800 border border-gray-700 rounded-md px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent" required>
                                <div id="nameError" class="text-red-400 text-sm hidden">Please enter your name</div>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                                <input type="email" id="email" class="w-full bg-gray-800 border border-gray-700 rounded-md px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent" required>
                                <div id="emailError" class="text-red-400 text-sm hidden">Please enter a valid email</div>
                            </div>
                            
                            <div>
                                <label for="service" class="block text-sm font-medium text-gray-300 mb-1">Service Needed</label>
                                <select id="service" class="w-full bg-gray-800 border border-gray-700 rounded-md px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                                    <option value="general">General Inquiry</option>
                                    <option value="development">Custom Development</option>
                                    <option value="support">Technical Support</option>
                                    <option value="consulting">Consulting</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-300 mb-1">Your Message</label>
                                <textarea id="message" rows="4" class="w-full bg-gray-800 border border-gray-700 rounded-md px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent" required></textarea>
                                <div id="messageError" class="text-red-400 text-sm hidden">Please enter your message</div>
                            </div>
                            
                            <div>
                                <button type="submit" id="submitBtn" class="w-full px-6 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-md text-white font-medium hover:opacity-90 transition-opacity">
                                    Send Message
                                </button>
                            </div>
                        </form>
                        
                        <div id="successMessage" class="text-center py-12 hidden">
                            <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-check text-green-400 text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-2">Message Sent!</h3>
                            <p class="text-gray-300 mb-6">Thank you for contacting us. We'll get back to you soon.</p>
                            <button id="resetForm" class="px-6 py-2 bg-gray-600 hover:bg-gray-500 rounded-md text-white font-medium transition-colors">
                                Send Another Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <a href="#" class="flex items-center space-x-2 mb-6">
                        <div class="w-10 h-10 rounded-md bg-gradient-to-br from-cyan-400 to-purple-600 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">HB</span>
                        </div>
                        <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-purple-400">HexaBit</span>
                    </a>
                    <p class="text-gray-400 mb-6">
                        Professional programming services and IT technical support to help your business thrive in the digital world.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-cyan-400 transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-cyan-400 transition-colors">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-cyan-400 transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-cyan-400 transition-colors">
                            <i class="fab fa-discord text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-white font-bold text-lg mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#services" class="text-gray-400 hover:text-cyan-400 transition-colors">Custom Development</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-cyan-400 transition-colors">Technical Support</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-cyan-400 transition-colors">Database Solutions</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-cyan-400 transition-colors">Network Solutions</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-bold text-lg mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-cyan-400 transition-colors">About Us</a></li>
                        <li><a href="#tech" class="text-gray-400 hover:text-cyan-400 transition-colors">Technologies</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-cyan-400 transition-colors">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-cyan-400 transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">©2025 HexaBit. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-cyan-400 text-sm transition-colors">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-cyan-400 text-sm transition-colors">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Alpine JS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    
    <!-- Contact Form Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            const successMessage = document.getElementById('successMessage');
            const resetFormBtn = document.getElementById('resetForm');
            const submitBtn = document.getElementById('submitBtn');
            
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate form
                let isValid = true;
                const name = document.getElementById('name');
                const email = document.getElementById('email');
                const message = document.getElementById('message');
                
                // Reset errors
                document.getElementById('nameError').classList.add('hidden');
                document.getElementById('emailError').classList.add('hidden');
                document.getElementById('messageError').classList.add('hidden');
                
                if (!name.value.trim()) {
                    document.getElementById('nameError').classList.remove('hidden');
                    isValid = false;
                }
                
                if (!email.value.trim() || !email.checkValidity()) {
                    document.getElementById('emailError').classList.remove('hidden');
                    isValid = false;
                }
                
                if (!message.value.trim()) {
                    document.getElementById('messageError').classList.remove('hidden');
                    isValid = false;
                }
                
                if (!isValid) return;
                
                // Show loading state
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Sending...
                `;
                submitBtn.disabled = true;
                
                // Simulate form submission
                setTimeout(() => {
                    contactForm.classList.add('hidden');
                    successMessage.classList.remove('hidden');
                    submitBtn.innerHTML = 'Send Message';
                    submitBtn.disabled = false;
                }, 1500);
            });
            
            resetFormBtn.addEventListener('click', function() {
                contactForm.reset();
                contactForm.classList.remove('hidden');
                successMessage.classList.add('hidden');
            });
        });
    </script>
    <!-- Firebase App (the core Firebase SDK) -->
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
    import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";
  
    const firebaseConfig = {
        apiKey: "AIzaSyAVnIlmFWj-NMEToWMVl0ezMELDqQpGzOM",
        authDomain: "hexabit-6464d.firebaseapp.com",
     projectId: "hexabit-6464d",
    storageBucket: "hexabit-6464d.firebasestorage.app",
     messagingSenderId: "293920464527",
     appId: "1:293920464527:web:f024f18edbf19e1a629afa",
  measurementId: "G-S1D68KWBQ2"
    };
  
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const db = getFirestore(app);
  
    // Handle form submission
    document.getElementById("contactForm").addEventListener("submit", async function (e) {
      e.preventDefault();
  
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const subject = document.getElementById("service").value;
      const message = document.getElementById("message").value.trim();
  
      // Optionally validate
      if (!name || !email || !message) {
        alert("Please fill out all required fields.");
        return;
      }
  
      try {
        await addDoc(collection(db, "contact"), {
          name,
          email,
          subject,
          message,
          created_at: new Date().toISOString(),
        });
  
        // Hide form and show success
        document.getElementById("contactForm").classList.add("hidden");
        document.getElementById("successMessage").classList.remove("hidden");
      } catch (error) {
        console.error("Error submitting contact form:", error);
        alert("Something went wrong. Please try again.");
      }
    });
  
    // Reset form logic
    document.getElementById("resetForm").addEventListener("click", function () {
      document.getElementById("contactForm").reset();
      document.getElementById("contactForm").classList.remove("hidden");
      document.getElementById("successMessage").classList.add("hidden");
    });
  </script>
  
</body>
</html>