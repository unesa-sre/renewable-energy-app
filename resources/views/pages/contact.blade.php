@extends('layouts.app-public')

@section('title', 'Hubungi Kami')

@section('content')
<div class="bg-[#f8faf9] min-h-screen py-16 md:py-24 font-sans">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-100 text-emerald-800 rounded-lg text-center font-bold shadow-sm">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- Hero -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-4xl md:text-6xl font-black text-[#006b4f] mb-6 tracking-tight">Hubungi Kami</h1>
            <p class="text-gray-500 max-w-2xl mx-auto text-sm md:text-base leading-relaxed font-medium">
                Kami siap membantu Anda. Silakan hubungi kami untuk informasi lebih lanjut mengenai program, kegiatan, atau pertanyaan lainnya terkait SRE UNESA.
            </p>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Left: Form -->
            <div class="lg:col-span-6 xl:col-span-5" data-aos="fade-right">
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100">
                    <h3 class="text-xl font-bold text-[#006b4f] mb-8">Kirim Pesan</h3>

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-lg focus:ring-[#006b4f] focus:border-[#006b4f] block p-3" placeholder="Masukkan nama lengkap Anda" required value="{{ old('name') }}">
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-lg focus:ring-[#006b4f] focus:border-[#006b4f] block p-3" placeholder="alamat@email.com" required value="{{ old('email') }}">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Subjek</label>
                            <input type="text" name="subject" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-lg focus:ring-[#006b4f] focus:border-[#006b4f] block p-3" placeholder="Topik pesan Anda" value="{{ old('subject') }}">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Pesan</label>
                            <textarea name="message" rows="4" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-lg focus:ring-[#006b4f] focus:border-[#006b4f] block p-3" placeholder="Tuliskan pesan Anda di sini..." required>{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="w-full md:w-auto mt-4 text-white bg-[#006b4f] hover:bg-[#00523c] font-bold rounded-lg text-sm px-8 py-3.5 text-center transition-colors">
                            KIRIM PESAN
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right: Info -->
            <div class="lg:col-span-6 xl:col-span-7 flex flex-col" data-aos="fade-left">
                <h3 class="text-xl font-bold text-[#006b4f] mb-6">Informasi Kontak</h3>
                
                <div class="space-y-4 mb-10">
                    <!-- Location Card -->
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgb(0,0,0,0.03)] flex items-start gap-4">
                        <svg class="w-6 h-6 text-[#006b4f] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <div>
                            <h4 class="text-xs font-bold text-gray-800 mb-1">Alamat Kampus</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">Universitas Negeri Surabaya Kampus 2 (Lidah Wetan)<br>Jl. Kampus Lidah Wetan, Surabaya, Jawa Timur 60213<br>Indonesia</p>
                        </div>
                    </div>

                    <!-- Phone Card -->
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgb(0,0,0,0.03)] flex items-start gap-4">
                        <svg class="w-6 h-6 text-[#006b4f] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <div>
                            <h4 class="text-xs font-bold text-gray-800 mb-1">Nomor Telepon</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">+62 812-3456-7890 (General)<br>+62 821-9876-5432 (WhatsApp Only)</p>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgb(0,0,0,0.03)] flex items-start gap-4">
                        <svg class="w-6 h-6 text-[#006b4f] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <div>
                            <h4 class="text-xs font-bold text-gray-800 mb-1">Email Layanan</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">sre.unesa@gmail.com</p>
                        </div>
                    </div>
                </div>

                <!-- Logos -->
                <div class="flex items-center gap-6 mt-auto justify-center lg:justify-start pb-4">
                    <img src="{{ asset('images/logo/srehijau.png') }}" alt="SRE Logo" class="h-16 md:h-20 object-contain drop-shadow-sm">
                    <img src="{{ asset('images/logo/unesa.png') }}" alt="UNESA Logo" class="h-24 md:h-28 object-contain drop-shadow-sm">
                </div>

            </div>
        </div>

        <!-- Map Section -->
        <div class="mt-16 w-full h-[400px] md:h-[500px] bg-gray-200 rounded-3xl overflow-hidden shadow-lg border border-gray-100 relative group" data-aos="fade-up">
            <!-- Koordinat asli UNESA Lidah Wetan -->
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.458925232777!2d112.67137451477517!3d-7.30230209472944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fc3b8a36c9d7%3A0x6b446a81e809312a!2sUniversitas%20Negeri%20Surabaya%20Kampus%20Lidah%20Wetan!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid"
                class="w-full h-full border-none filter contrast-100"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            
            <!-- Tombol "Lihat Peta Kampus" effect -->
            <div class="absolute inset-0 pointer-events-none flex items-center justify-center bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity">
                <a href="https://maps.app.goo.gl/3QWjE" target="_blank" class="pointer-events-auto bg-white text-[#006b4f] px-6 py-3 rounded-full font-bold shadow-xl flex items-center gap-2 hover:scale-105 transition-transform text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    Lihat Peta Kampus di Google Maps
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
