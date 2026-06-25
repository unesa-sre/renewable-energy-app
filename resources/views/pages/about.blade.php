@extends('layouts.app-public')

@section('title', 'Tentang Kami')

@section('content')
    <div class="bg-white">

        {{-- SECTION 1: HERO --}}
        {{-- sticky top-0 membuat section ini "diam" saat di-scroll --}}
        <section class="sticky top-0 h-screen flex flex-col justify-center text-center bg-white px-4 z-10">
            <div class="max-w-4xl mx-auto" data-aos="fade-up">
                <div class="flex items-center justify-center gap-6 mb-8">
                    <img src="/images/logo/srehijau.png" alt="SRE Logo" class="h-14 lg:h-16 w-auto object-contain">
                    <img src="/images/logo/unesa.png" alt="UNESA Logo" class="h-14 lg:h-16 w-auto object-contain">
                </div>
                <div class="text-lg text-slate-600 leading-relaxed font-medium px-4 text-center space-y-6">
                    <p>
                        Society of Renewable Energy (SRE) Universitas Negeri Surabaya merupakan organisasi mahasiswa yang baru direncanakan untuk mendukung transisi energi nasional menuju sumber energi bersih dan berkelanjutan. SRE Unesa difokuskan sebagai wadah pembelajaran terstruktur, diskusi ilmiah, serta pengembangan kompetensi energi terbarukan bagi mahasiswa lintas jurusan, khususnya dari latar belakang teknik dan sains di Unesa.
                    </p>
                    <p>
                        SRE Universitas Negeri Surabaya didirikan untuk menciptakan ekosistem pembelajaran dan inovasi di bidang energi terbarukan.
                    </p>
                </div>
            </div>
        </section>

        {{-- SECTION 2: VISI MISI --}}
        <section
            class="sticky top-0 min-h-screen bg-yellow-400 py-20 px-4 sm:px-6 lg:px-8 rounded-t-[5rem] lg:rounded-t-[8rem] z-20">
            <div class="max-w-5xl mx-auto w-full">
                <div class="text-center mb-8" data-aos="fade-up">
                    <div class="h-1.5 w-16 bg-slate-900 mx-auto mb-6 rounded-full"></div>
                    <h1 class="text-4xl lg:text-6xl font-black text-slate-900 mb-2 uppercase tracking-tighter">
                        Visi <span class="text-white">&</span> Misi
                    </h1>
                    <p class="text-slate-800 font-bold text-sm opacity-60 tracking-widest uppercase">
                        EcoFuture Strategic Plan
                    </p>
                </div>

                <div class="bg-white rounded-[2rem] p-6 md:p-10 shadow-2xl" data-aos="zoom-in">
                    {{-- VISION --}}
                    <div class="mb-8">
                        <h2 class="text-emerald-600 font-extrabold text-sm mb-3 tracking-tight uppercase">Vision</h2>
                        <div class="relative pl-6 border-l-4 border-emerald-500">
                            <p class="text-slate-700 italic text-base lg:text-lg leading-relaxed font-medium">
                                "Establish EcoFuture as a center for education and innovation in renewable energy, creating
                                a generation of competent, competitive, and impactful contributors to sustainable
                                development in Indonesia."
                            </p>
                        </div>
                    </div>

                    {{-- MISSION --}}
                    <div>
                        <h2 class="text-emerald-600 font-extrabold text-sm mb-6 tracking-tight uppercase">Mission</h2>
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="flex gap-3">
                                <div
                                    class="shrink-0 w-6 h-6 bg-emerald-600 rounded-full flex items-center justify-center text-white text-xs font-bold mt-0.5">
                                    1</div>
                                <p class="text-slate-600 text-xs leading-relaxed font-medium">Empower members to become
                                    change agents in renewable energy through innovative education and training programs.
                                </p>
                            </div>
                            <div class="flex gap-3">
                                <div
                                    class="shrink-0 w-6 h-6 bg-emerald-600 rounded-full flex items-center justify-center text-white text-xs font-bold mt-0.5">
                                    2</div>
                                <p class="text-slate-600 text-xs leading-relaxed font-medium">Offer opportunities for
                                    members to engage in research and innovation, contributing impactful solutions for
                                    society.</p>
                            </div>
                            <div class="flex gap-3">
                                <div
                                    class="shrink-0 w-6 h-6 bg-emerald-600 rounded-full flex items-center justify-center text-white text-xs font-bold mt-0.5">
                                    3</div>
                                <p class="text-slate-600 text-xs leading-relaxed font-medium">Foster members' growth with a
                                    hands-on curriculum, equipping them to understand and teach renewable energy concepts
                                    effectively.</p>
                            </div>
                            <div class="flex gap-3">
                                <div
                                    class="shrink-0 w-6 h-6 bg-emerald-600 rounded-full flex items-center justify-center text-white text-xs font-bold mt-0.5">
                                    4</div>
                                <p class="text-slate-600 text-xs leading-relaxed font-medium">Apply knowledge and skills
                                    through community service and educational programs, raising awareness about renewable
                                    energy.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- SECTION 2b: VISI MISI (salinan) --}}
        <section
            class="sticky top-0 min-h-screen bg-white py-20 px-4 sm:px-6 lg:px-8 rounded-t-[5rem] lg:rounded-t-[8rem] z-[21]">
            <div class="max-w-5xl mx-auto w-full">
                <div class="text-center mb-8" data-aos="fade-up">
                    <div class="h-1.5 w-16 bg-emerald-500 mx-auto mb-6 rounded-full"></div>
                    <h1 class="text-4xl lg:text-6xl font-black text-slate-900 mb-2 uppercase tracking-tighter">
                        Struktur <span class="text-emerald-600">Organisasi</span>
                    </h1>
                    <p class="text-slate-400 font-bold text-sm tracking-widest uppercase">
                        SRE UNESA
                    </p>
                </div>

                <div class="bg-white rounded-[2rem] overflow-hidden h-[380px]" data-aos="zoom-in">
                    {{-- Ganti dengan foto asli setelah upload ke: public/images/about/struktur-organisasi.jpg --}}
                    <img
                        src="/images/about/struktur-organisasi.png"
                        alt="Struktur Organisasi SRE UNESA"
                        class="w-full h-full object-cover">
                    {{-- Setelah upload, ganti src di atas dengan: /images/about/struktur-organisasi.jpg --}}
                </div>
            </div>
        </section>

        {{-- SECTION 3: ORGANIZER (Master Header) --}}
        <section
            class="sticky top-0 z-30 bg-emerald-600 rounded-t-[5rem] lg:rounded-t-[8rem] h-screen flex flex-col justify-center items-center">
            <div class="text-center">
                <div data-aos="fade-up">
                    <div class="h-1 w-16 bg-emerald-500 mx-auto mb-10"></div>
                    <h2 class="text-6xl lg:text-9xl font-black text-white uppercase tracking-tighter leading-none mb-6">
                        Organizer
                    </h2>
                    <div
                        class="flex items-center justify-center gap-4 text-emerald-100 font-bold tracking-[0.4em] text-xs uppercase">
                        <div class="w-8 h-px bg-emerald-400"></div>
                        <span>Tim Strategis EcoFuture</span>
                        <div class="w-8 h-px bg-emerald-400"></div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 01 Departemen Eksekutif --}}
        <section
            class="sticky top-0 z-[31] bg-white min-h-screen py-32 rounded-t-[5rem] lg:rounded-t-[8rem] flex items-center overflow-hidden">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center" data-aos="fade-up">
                    <div class="lg:col-span-4 xl:pr-12">
                        <div class="flex items-center gap-4 text-emerald-600 font-bold tracking-widest mb-6">
                            <span class="text-sm">01</span>
                            <div class="w-10 h-px bg-emerald-500"></div>
                            <span class="text-sm">DIVISION</span>
                        </div>
                        <h2
                            class="text-5xl lg:text-6xl font-[900] text-slate-900 mb-6 leading-tight uppercase tracking-tighter">
                            Eksekutif</h2>
                        <p class="text-slate-600 text-base leading-relaxed mb-10 max-w-sm font-medium">
                            Menentukan arah strategis organisasi, menjamin kelancaran operasional, dan membangun visi energi
                            masa depan.
                        </p>
                        <div class="flex gap-3">
                            <button onclick="scrollContainer('scroll-01', -340)"
                                class="w-12 h-12 rounded-full border-2 border-emerald-500 flex items-center justify-center text-emerald-600 hover:bg-emerald-50 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 19l-7-7 7-7" stroke-width="2.5"></path>
                                </svg>
                            </button>
                            <button onclick="scrollContainer('scroll-01', 340)"
                                class="w-12 h-12 rounded-full border-2 border-emerald-500 flex items-center justify-center text-emerald-600 hover:bg-emerald-50 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" stroke-width="2.5"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="scroll-01" class="lg:col-span-8 overflow-x-auto scroll-smooth hide-scrollbar flex gap-6 pb-10">
                        <div class="min-w-[320px] aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                            <img src="/images/team/guest.png"
                                class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                            <div
                                class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-8 opacity-0 group-hover:opacity-100">
                                <h4 class="text-3xl font-black text-white text-center uppercase tracking-tight mb-2">Andre
                                    Wijaya</h4>
                                <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">Chief
                                    Executive Officer</p>
                            </div>
                        </div>
                        <div class="min-w-[320px] aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                            <img src="/images/team/guest.png"
                                class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                            <div
                                class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-8 opacity-0 group-hover:opacity-100">
                                <h4 class="text-3xl font-black text-white text-center uppercase tracking-tight mb-2">Sarah
                                    Quinn</h4>
                                <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">Chief
                                    Operational Officer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 02 Departemen Operasional --}}
        <section
            class="sticky top-0 z-[32] bg-emerald-600 min-h-screen py-32 rounded-t-[5rem] lg:rounded-t-[8rem] flex items-center overflow-hidden">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center" data-aos="fade-up">
                    <div class="lg:col-span-4 xl:pr-12">
                        <div class="flex items-center gap-4 text-emerald-300 font-bold tracking-widest mb-6">
                            <span class="text-sm">02</span>
                            <div class="w-10 h-px bg-emerald-400"></div>
                            <span class="text-sm">DIVISION</span>
                        </div>
                        <h2
                            class="text-5xl lg:text-6xl font-[900] text-white mb-6 leading-tight uppercase tracking-tighter">
                            Department Capacity Building</h2>
                        <p class="text-emerald-50/60 text-base leading-relaxed mb-10 max-w-sm font-medium">
                            Mengelola instalasi lapangan, memastikan perawatan infrastruktur, dan kendali mutu teknis sistem
                            energi.
                        </p>
                        <div class="flex gap-3">
                            <button onclick="scrollContainer('scroll-02', -340)"
                                class="w-12 h-12 rounded-full border-2 border-emerald-400 flex items-center justify-center text-white hover:bg-emerald-600 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 19l-7-7 7-7" stroke-width="2.5"></path>
                                </svg>
                            </button>
                            <button onclick="scrollContainer('scroll-02', 340)"
                                class="w-12 h-12 rounded-full border-2 border-emerald-400 flex items-center justify-center text-white hover:bg-emerald-600 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" stroke-width="2.5"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="scroll-02" class="lg:col-span-8 overflow-x-auto scroll-smooth hide-scrollbar flex gap-6 pb-10">
                        {{-- Public Relation: 3 anggota --}}
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Fawazul Ammar</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Sains Data</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Public Relation</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Fadil Hasan Al-Rafli E. S.</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Elektro</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Public Relation</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">M. Yudhi Wahyu Wibowo</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Elektro</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2025</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Public Relation</p>
                            </div>
                        </div>

                        {{-- Human Resource: 4 anggota --}}
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Muhammad Ikhsan Dwi P.</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">D4 Teknik Listrik</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Human Resource</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Mutia Indah Ramadhani</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Mesin</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Human Resource</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Sekar Ayu Widura</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Pend. Fisika</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Human Resource</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Bunga Cantika Rahmatia P.</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Psikologi</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2025</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Human Resource</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 03 Departemen Riset & Teknologi --}}
        <section
            class="sticky top-0 z-[33] bg-white min-h-screen py-32 rounded-t-[5rem] lg:rounded-t-[8rem] flex items-center overflow-hidden">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center" data-aos="fade-up">
                    <div class="lg:col-span-4 xl:pr-12">
                        <div class="flex items-center gap-4 text-emerald-600 font-bold tracking-widest mb-6">
                            <span class="text-sm">03</span>
                            <div class="w-10 h-px bg-emerald-500"></div>
                            <span class="text-sm">DIVISION</span>
                        </div>
                        <h2
                            class="text-5xl lg:text-6xl font-[900] text-slate-900 mb-6 leading-tight uppercase tracking-tighter">
                            Department Business Development</h2>
                        <p class="text-slate-600 text-base leading-relaxed mb-10 max-w-sm font-medium">
                            Mengembangkan inovasi teknologi berbasis EBT dan melakukan studi mendalam untuk efisiensi energi
                            berkelanjutan.
                        </p>
                        <div class="flex gap-3">
                            <button onclick="scrollContainer('scroll-03', -340)"
                                class="w-12 h-12 rounded-full border-2 border-emerald-500 flex items-center justify-center text-emerald-600 hover:bg-emerald-50 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 19l-7-7 7-7" stroke-width="2.5"></path>
                                </svg>
                            </button>
                            <button onclick="scrollContainer('scroll-03', 340)"
                                class="w-12 h-12 rounded-full border-2 border-emerald-500 flex items-center justify-center text-emerald-600 hover:bg-emerald-50 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" stroke-width="2.5"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="scroll-03" class="lg:col-span-8 overflow-x-auto scroll-smooth hide-scrollbar flex gap-6 pb-10">
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Dewi Apriliani Inestasia</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Pend. Bisnis</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-slate-900 text-xs font-semibold uppercase tracking-widest">Business Development</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Wida Fitri Nabilatul Hamidah</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Sipil</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-slate-900 text-xs font-semibold uppercase tracking-widest">Business Development</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Reza Mortasefi</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Sistem Informasi</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-slate-900 text-xs font-semibold uppercase tracking-widest">Business Development</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Ahmad Naufal Farras R.</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Mesin</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-slate-900 text-xs font-semibold uppercase tracking-widest">Business Development</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 04 Departemen Edukasi --}}
        <section
            class="sticky top-0 z-[34] bg-emerald-600 min-h-screen py-32 rounded-t-[5rem] lg:rounded-t-[8rem] flex items-center overflow-hidden">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center" data-aos="fade-up">
                    <div class="lg:col-span-4 xl:pr-12">
                        <div class="flex items-center gap-4 text-emerald-300 font-bold tracking-widest mb-6">
                            <span class="text-sm">04</span>
                            <div class="w-10 h-px bg-emerald-400"></div>
                            <span class="text-sm">DIVISION</span>
                        </div>
                        <h2
                            class="text-5xl lg:text-6xl font-[900] text-white mb-6 leading-tight uppercase tracking-tighter">
                            Department Digital Media and Brand Experience</h2>
                        <p class="text-emerald-50/60 text-base leading-relaxed mb-10 max-w-sm font-medium">
                            Menyebarluaskan literasi energi alternatif ke masyarakat luas melalui program pelatihan dan
                            pengabdian.
                        </p>
                        <div class="flex gap-3">
                            <button onclick="scrollContainer('scroll-04', -340)"
                                class="w-12 h-12 rounded-full border-2 border-emerald-400 flex items-center justify-center text-white hover:bg-emerald-700 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 19l-7-7 7-7" stroke-width="2.5"></path>
                                </svg>
                            </button>
                            <button onclick="scrollContainer('scroll-04', 340)"
                                class="w-12 h-12 rounded-full border-2 border-emerald-400 flex items-center justify-center text-white hover:bg-emerald-700 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" stroke-width="2.5"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="scroll-04" class="lg:col-span-8 overflow-x-auto scroll-smooth hide-scrollbar flex gap-6 pb-10">
                        {{-- Graphic Design: 2 anggota --}}
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Evan Mulya Simbolon</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Sistem Informatika</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Graphic Design</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Nabila Aminatuzzahro</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Matematika</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2025</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Graphic Design</p>
                            </div>
                        </div>

                        {{-- Branding: 2 anggota --}}
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Farrel Brilliansyah Putra S</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Mesin</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Branding</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Tanzilal Ramadhan S</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Sipil</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Branding</p>
                            </div>
                        </div>

                        {{-- Web Development: 1 anggota --}}
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Damar Ninuwidarma</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Informatika</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Web Development</p>
                            </div>
                        </div>

                        {{-- Treasurer: 1 anggota --}}
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Ellen Eka Mei A.</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Elektro</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Treasurer</p>
                            </div>
                        </div>

                        {{-- Secretary: 1 anggota --}}
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-emerald-900/50">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-emerald-900/0 group-hover:bg-emerald-900/85 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Salwa Naysila Karvia P</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Perencanaan Wilayah dan Kota</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-white text-xs font-semibold uppercase tracking-widest">Secretary</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 05 Humas & Media --}}
        <section
            class="sticky top-0 z-[35] bg-white min-h-screen py-32 rounded-t-[5rem] lg:rounded-t-[8rem] flex items-center overflow-hidden">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-12 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center" data-aos="fade-up">
                    <div class="lg:col-span-4 xl:pr-12">
                        <div class="flex items-center gap-4 text-emerald-600 font-bold tracking-widest mb-6">
                            <span class="text-sm">05</span>
                            <div class="w-10 h-px bg-emerald-500"></div>
                            <span class="text-sm">DIVISION</span>
                        </div>
                        <h2
                            class="text-5xl lg:text-6xl font-[900] text-slate-900 mb-6 leading-tight uppercase tracking-tighter">
                            Department Research and Development</h2>
                        <p class="text-slate-600 text-base leading-relaxed mb-10 max-w-sm font-medium">
                            Membangun citra positif organisasi dan menjalin kerjasama strategis dengan pihak eksternal serta
                            media massa.
                        </p>
                        <div class="flex gap-3">
                            <button onclick="scrollContainer('scroll-05', -340)"
                                class="w-12 h-12 rounded-full border-2 border-emerald-500 flex items-center justify-center text-emerald-600 hover:bg-emerald-50 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 19l-7-7 7-7" stroke-width="2.5"></path>
                                </svg>
                            </button>
                            <button onclick="scrollContainer('scroll-05', 340)"
                                class="w-12 h-12 rounded-full border-2 border-emerald-500 flex items-center justify-center text-emerald-600 hover:bg-emerald-50 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 5l7 7-7 7" stroke-width="2.5"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="scroll-05" class="lg:col-span-8 overflow-x-auto scroll-smooth hide-scrollbar flex gap-6 pb-10">
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Hafsha Lahfah</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Mesin</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-slate-900 text-xs font-semibold uppercase tracking-widest">Research and Development</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Arya Latief</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Sipil</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-slate-900 text-xs font-semibold uppercase tracking-widest">Research and Development</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Muhajirin Ilham</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Sipil</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2024</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-slate-900 text-xs font-semibold uppercase tracking-widest">Research and Development</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Sendi Aribi Saputra</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Pertambangan</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2025</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-slate-900 text-xs font-semibold uppercase tracking-widest">Research and Development</p>
                            </div>
                        </div>
                        <div class="min-w-[280px] flex flex-col gap-3">
                            <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-100">
                                <img src="/images/team/guest.png"
                                    class="w-full h-full object-cover transition-all duration-700 group-hover:grayscale group-hover:scale-105">
                                <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/80 transition-all duration-500 flex flex-col items-center justify-center p-6 opacity-0 group-hover:opacity-100">
                                    <h4 class="text-xl font-black text-white text-center uppercase tracking-tight mb-2">Muhammad Purnama Adi Putra</h4>
                                    <div class="w-8 h-px bg-emerald-400 mb-3"></div>
                                    <p class="text-xs font-bold text-emerald-300 uppercase tracking-widest text-center">S1 Teknik Elektro</p>
                                    <p class="text-xs font-semibold text-emerald-200 tracking-widest text-center mt-1">Angkatan 2025</p>
                                </div>
                            </div>
                            <div class="text-center px-2">
                                <p class="text-slate-900 text-xs font-semibold uppercase tracking-widest">Research and Development</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA: Wujudkan Masa Depan Hijau --}}
        <section class="sticky top-0 z-[36] min-h-screen py-24 bg-white rounded-t-[5rem] lg:rounded-t-[8rem] flex items-center justify-center overflow-hidden" data-aos="fade-up">
            <div class="max-w-5xl mx-auto px-4 relative z-10 w-full">
                <div class="relative bg-blue-600 rounded-[3rem] p-12 lg:p-24 text-center shadow-2xl overflow-hidden group" data-aos="zoom-in" data-aos-delay="100">

                    {{-- Grid pattern background --}}
                    <div class="absolute inset-0 opacity-20 pointer-events-none">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <pattern id="about-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="0.8"/>
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" fill="url(#about-grid)" />
                        </svg>
                    </div>

                    {{-- Floating glow blobs --}}
                    <div class="absolute -top-16 -right-16 w-64 h-64 bg-white/10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000 pointer-events-none"></div>
                    <div class="absolute -bottom-16 -left-16 w-48 h-48 bg-blue-300/20 rounded-full blur-2xl pointer-events-none"></div>

                    {{-- Content --}}
                    <div class="relative z-10">
                        <h2 class="text-5xl lg:text-7xl font-black text-white mb-6 tracking-tighter leading-none" data-aos="fade-up" data-aos-delay="200">
                            Wujudkan Masa Depan <br>
                            <span class="text-blue-200 underline decoration-blue-400 underline-offset-8">Hijau.</span>
                        </h2>
                        <p class="text-blue-50/70 text-lg lg:text-xl max-w-2xl mx-auto mb-14 font-medium leading-relaxed" data-aos="fade-up" data-aos-delay="300">
                            Setiap informasi adalah langkah awal menuju keberlanjutan. Mari bergabung bersama komunitas kami untuk dampak yang lebih besar.
                        </p>
                        <div class="flex justify-center" data-aos="fade-up" data-aos-delay="400">
                            <a href="/contact" class="inline-flex items-center gap-3 bg-white text-blue-600 px-12 py-5 rounded-3xl font-black text-xl transition-all shadow-2xl hover:scale-105 hover:bg-blue-50 active:scale-95">
                                Mulai Berkontribusi
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
        function scrollContainer(id, amount) {
            const container = document.getElementById(id);
            container.scrollBy({ left: amount, behavior: 'smooth' });
        }

        // Letter-by-letter animation for About Description (Delayed for splash screen)
        document.addEventListener('DOMContentLoaded', () => {
            const textElement = document.getElementById('about-description');
            if (!textElement) return;
            
            // Wait for splash screen (approx 4 seconds)
            setTimeout(() => {
                const text = textElement.innerText.trim();
                textElement.innerHTML = '';
                
                let charIndex = 0;
                const words = text.split(' ');
                
                words.forEach((word, wordIndex) => {
                    const wordSpan = document.createElement('span');
                    wordSpan.className = 'inline-block';
                    
                    [...word].forEach((char) => {
                        const charSpan = document.createElement('span');
                        charSpan.innerText = char;
                        charSpan.className = 'inline-block opacity-0';
                        charSpan.style.animation = `appearLetter 0.5s cubic-bezier(0.23, 1, 0.32, 1) forwards ${charIndex * 0.012}s`;
                        wordSpan.appendChild(charSpan);
                        charIndex++;
                    });
                    
                    textElement.appendChild(wordSpan);
                    
                    // Add space between words
                    if (wordIndex < words.length - 1) {
                        textElement.appendChild(document.createTextNode(' '));
                        charIndex++; // Count space for timing
                    }
                });
            }, 4000); 
        });
    </script>

    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @keyframes appearLetter {
            from {
                opacity: 0;
                transform: translateY(10px) filter(blur(2px));
            }
            to {
                opacity: 1;
                transform: translateY(0) filter(blur(0));
            }
        }
    </style>

@endsection