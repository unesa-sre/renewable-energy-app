@php
    // Hanya mengubah warna background hijau menjadi biru untuk halaman resources
    // Elemen lain (teks, progress bar, dll) tetap menggunakan warna asli (kuning)
    $isResources = Request::is('resources*') || Request::is('research*');
    $bgColor = $isResources ? '#2563eb' : '#10b981'; // blue-600 atau emerald-500
@endphp

<div id="splash-screen" class="fixed inset-0 z-[9999] flex flex-col items-center justify-center transition-opacity duration-1000 ease-in-out" style="background-color: {{ $bgColor }};">
    <div class="relative flex flex-col items-center p-8">
        <!-- Logo Area -->
        <div class="relative mb-16">
            <!-- Decorative Rays (Top Left) - Premium SVG implementation -->
            <div class="absolute -top-16 -left-16 text-yellow-400 opacity-90">
                <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="animate-pulse">
                    <path d="M40 80L10 50" stroke="currentColor" stroke-width="8" stroke-linecap="round" />
                    <path d="M60 70V20" stroke="currentColor" stroke-width="8" stroke-linecap="round" />
                    <path d="M80 80L110 50" stroke="currentColor" stroke-width="8" stroke-linecap="round" />
                </svg>
            </div>

            <!-- Main Text -->
            <div class="flex flex-col items-center text-center">
                <div class="overflow-hidden animate-reveal-up flex justify-center w-full">
                    <img src="{{ asset('images/logo/navbar-logo-1.png') }}" alt="SRE Logo" 
                         class="h-32 sm:h-44 lg:h-52 object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500"
                         onerror="this.src='https://placehold.co/400x150/10b981/FFFFFF?text=SRE+UNESA'">
                </div>

                <div class="w-16 h-1.5 bg-yellow-400 mt-6 rounded-full animate-width-expand"></div>
            </div>
        </div>

        <!-- Progress Bar & Percentage Container -->
        <div class="flex flex-col items-center gap-3 w-80 sm:w-[28rem] opacity-0 animate-fade-in mt-12" style="animation-delay: 800ms;">
            <!-- Progress Bar -->
            <div class="w-full h-3 bg-black/20 rounded-full overflow-hidden backdrop-blur-md border border-white/10 shadow-inner">
                <div id="splash-progress" class="h-full bg-yellow-400 w-0 transition-all duration-[2400ms] ease-in-out shadow-[0_0_15px_rgba(250,204,21,0.6)]"></div>
            </div>
            <!-- Percentage Text -->
            <span id="splash-percentage" class="text-white font-black text-lg sm:text-xl tracking-widest drop-shadow-md">0%</span>
        </div>
    </div>
</div>

<style>
    @keyframes reveal-up {
        from {
            transform: translateY(100%);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes width-expand {
        from {
            width: 0;
            opacity: 0;
        }

        to {
            width: 4rem;
            opacity: 1;
        }
    }

    @keyframes fade-in-up {
        from {
            transform: translateY(20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .animate-reveal-up {
        animation: reveal-up 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
    }

    .animate-width-expand {
        animation: width-expand 1.2s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
        animation-delay: 0.3s;
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
    }

    .animate-fade-in {
        animation: fade-in 1s ease forwards;
    }

    body.splash-active {
        overflow: hidden !important;
    }
</style>

<script>
    (function () {
        function initSplash() {
            const splash = document.getElementById('splash-screen');
            const bar = document.getElementById('splash-progress');
            const percentageText = document.getElementById('splash-percentage');

            if (!splash || !bar) return;

            // Check if shown in this session (optional, but requested "awal masuk" usually means first time)
            // If you want it to show EVERY time, comment the lines below
            // if (sessionStorage.getItem('splash_shown')) {
            //     splash.style.display = 'none';
            //     return;
            // }
            // sessionStorage.setItem('splash_shown', 'true');

            document.body.classList.add('splash-active');

            // Start progress
            setTimeout(() => {
                bar.style.width = '100%';
                
                // Animate percentage
                if (percentageText) {
                    let startTimestamp = null;
                    const duration = 2400; // Match the CSS transition duration
                    
                    const step = (timestamp) => {
                        if (!startTimestamp) startTimestamp = timestamp;
                        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                        percentageText.innerText = Math.floor(progress * 100) + '%';
                        if (progress < 1) {
                            window.requestAnimationFrame(step);
                        } else {
                            percentageText.innerText = '100%';
                        }
                    };
                    window.requestAnimationFrame(step);
                }
            }, 1000);

            // Transition out
            setTimeout(() => {
                splash.style.opacity = '0';
                document.body.classList.remove('splash-active');
                setTimeout(() => {
                    splash.style.display = 'none';
                }, 1000);
            }, 3800);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initSplash);
        } else {
            initSplash();
        }
    })();
</script>