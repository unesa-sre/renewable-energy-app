<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Hanken Grotesk', sans-serif; }
    </style>
</head>
<body class="bg-[#f8faf9] min-h-screen flex items-center justify-center relative overflow-hidden">
    
    <div class="relative z-10 flex flex-col items-center justify-center text-center px-4 w-full max-w-4xl">
        
        <!-- Logos and 404 background -->
        <div class="relative flex items-center justify-center mb-12 w-full h-[200px] md:h-[300px]">
            <!-- Huge 404 Text -->
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-[180px] md:text-[300px] font-black text-[#e8efec] leading-none select-none tracking-tighter">404</span>
            </div>
            
            <!-- Logos -->
            <div class="relative z-10 flex items-center justify-center gap-6 md:gap-12">
                <img src="{{ asset('images/logo/unesa.png') }}" alt="UNESA Logo" class="h-32 md:h-48 object-contain">
                <img src="{{ asset('images/logo/srehijau.png') }}" alt="SRE Logo" class="h-16 md:h-24 object-contain">
            </div>
        </div>

        <!-- Text Content -->
        <div class="relative z-10 mt-8">
            <h1 class="text-3xl md:text-[2.5rem] font-bold text-slate-800 mb-4 tracking-tight leading-tight">
                <span class="text-[#009150]">Ups!</span> Halaman Tidak<br>Ditemukan
            </h1>
            <p class="text-slate-500 mb-10 max-w-md mx-auto text-sm md:text-base font-medium">
                Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.
            </p>
            
            <a href="{{ url('/') }}" class="inline-block bg-[#009150] hover:bg-[#002816] text-white text-xs font-bold tracking-[0.1em] uppercase px-8 py-4 transition-all hover:shadow-lg hover:-translate-y-0.5">
                KEMBALI KE BERANDA
            </a>
        </div>
    </div>

</body>
</html>
