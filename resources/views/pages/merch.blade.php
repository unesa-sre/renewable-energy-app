@extends('layouts.app-public')

@section('title', 'Official Merch - SRE UNESA')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
    body {
        background-color: #ffffff !important;
        color: #0f172a !important;
        font-family: 'Hanken Grotesk', sans-serif;
    }

    
    /* Hero Section */
    .merch-hero {
        background-color: #002816;
        padding: 6.5rem 2rem;
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .merch-hero-content {
        position: relative;
        z-index: 10;
        max-width: 800px;
        margin: 0 auto;
    }

    .merch-hero h1 {
        font-size: 2.25rem;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        letter-spacing: -0.05em;
        line-height: 1.1;
        margin-bottom: 1.5rem;
    }

    @media (min-width: 768px) {
        .merch-hero h1 {
            font-size: 3.5rem;
            line-height: 1;
        }
    }

    .merch-hero p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        font-weight: 400;
        max-width: 600px;
        margin: 0 auto;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    /* Decorative Elements */
    .hero-arrow {
        position: absolute;
        width: 120px;
        filter: invert(1);
        opacity: 0.8;
    }

    /* Sections */
    .merch-section-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        max-width: 1200px;
        margin: 4rem auto 2rem;
        padding: 0 2rem;
    }

    .merch-section-header h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0f172a;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    .merch-section-header .arrow-icon {
        color: #009150;
        font-size: 1.5rem;
    }

    .merch-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto 4rem;
        padding: 0 2rem;
    }

    .merch-card {
        background: white;
        border-radius: 0px; /* Brutalist sharp corners */
        overflow: hidden;
        transition: all 0.3s ease;
        border: 3px solid #0f172a; /* Thick border */
        display: flex;
        flex-direction: column;
        box-shadow: 8px 8px 0px #0f172a; /* Hard shadow */
    }

    .merch-card:hover {
        transform: translate(-4px, -4px);
        box-shadow: 12px 12px 0px #009150;
    }

    .merch-img-container {
        position: relative;
        background-color: #f8fafc;
        aspect-ratio: 1/1;
        overflow: hidden;
    }

    .merch-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s;
    }

    .merch-card:hover .merch-img {
        transform: scale(1.05);
    }

    .merch-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: #0f172a;
        color: #facc15;
        font-size: 0.65rem;
        font-weight: 700;
        padding: 0.4rem 0.8rem;
        border-radius: 0;
        z-index: 10;
        text-transform: uppercase;
        letter-spacing: 0.15em;
    }

    .merch-price {
        position: absolute;
        bottom: 1rem;
        right: 1rem;
        background: #009150;
        color: #0f172a;
        font-weight: 700;
        padding: 0.5rem 1rem;
        border-radius: 0;
        font-size: 0.85rem;
        z-index: 10;
        border: 2px solid #0f172a;
    }

    .merch-body {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .merch-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        font-family: 'Hanken Grotesk', sans-serif;
    }

    .merch-desc {
        font-size: 0.7rem;
        color: #475569;
        margin-bottom: 1.5rem;
        flex-grow: 1;
        line-height: 1.6;
        font-family: 'Hanken Grotesk', sans-serif;
    }

    .merch-btn {
        width: 100%;
        background: #009150;
        color: #0f172a;
        text-align: center;
        padding: 0.875rem;
        border-radius: 0;
        font-weight: 700;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-size: 0.75rem;
        border: 2px solid #0f172a;
        font-family: 'Hanken Grotesk', sans-serif;
    }

    .merch-btn:hover {
        background: #0f172a;
        color: white;
    }

    /* Marketplace Banner */
    .marketplace-banner {
        max-width: 1200px;
        margin: 6rem auto;
        border-radius: 3rem;
        background-color: #002816; /* Dark Green Banner */
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 3rem;
        color: white;
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    @media (min-width: 768px) {
        .marketplace-banner {
            flex-direction: row;
            text-align: left;
        }
    }

    .marketplace-content {
        position: relative;
        z-index: 10;
        flex: 1;
    }

    .marketplace-banner h2 {
        font-size: 2.5rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
    }

    .marketplace-btns {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .market-btn {
        background: white;
        color: #009150;
        padding: 0.75rem 2rem;
        border-radius: 99px;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s;
    }

    .market-btn:hover {
        background: #facc15;
        color: #0f172a;
        transform: translate(-4px, -4px);
        box-shadow: 8px 8px 0px #0f172a;
    }

    /* Special Section Styling - Matching the Screenshot */
    .special-section {
        background-color: #f0fdf4; /* Very Light Mint Green */
        margin: 0;
        padding: 5rem 2rem;
        position: relative;
        text-align: center;
    }

    .special-section::before { display: none; } /* Remove grid pattern */

    .special-title-container {
        position: relative;
        display: inline-block;
        margin-bottom: 4rem;
    }

    .special-section h2 {
        font-size: 2.75rem !important;
        font-weight: 800 !important;
        color: #002816 !important; /* Dark Green */
        text-transform: uppercase;
        letter-spacing: -0.01em;
        position: relative;
        z-index: 2;
        font-family: 'Hanken Grotesk', sans-serif; /* Keeping current font but styled as per image */
    }

    .special-underline {
        position: absolute;
        bottom: 2px;
        left: 0;
        width: 100%;
        height: 12px;
        background: #facc15; /* Yellow brush effect */
        z-index: 1;
        opacity: 0.8;
        transform: rotate(-1deg) skewX(-15deg);
    }

    .special-empty-card {
        background: rgba(255, 255, 255, 0.6);
        border: 1px solid rgba(6, 78, 59, 0.1);
        border-radius: 2rem;
        padding: 6rem 2rem;
        max-width: 1100px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
    }

    .empty-icon {
        color: #002816;
        width: 64px;
        height: 64px;
    }

    .empty-text-main {
        font-size: 1.25rem;
        font-weight: 700;
        color: #002816;
    }

    .empty-text-sub {
        font-size: 0.875rem;
        color: #002816;
        opacity: 0.7;
    }

    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }

    .animate-marquee {
        animation: marquee 30s linear infinite;
        display: flex;
        flex-shrink: 0;
    }

    .alert {
        padding: 1rem;
        border-radius: 12px;
        margin: 0 auto 2rem;
        max-width: 1200px;
        width: 90%;
        text-align: center;
    }
    .alert-success { background: #dcfce7; color: #10b981; }

    /* Quill Content Styling in Modal */
    #mDesc {
        word-break: break-word;
        overflow-wrap: break-word;
    }
    #mDesc p {
        white-space: pre-wrap; /* Preserves enters but wraps text */
        margin-bottom: 0.75rem;
    }
    #mDesc ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-bottom: 0.75rem;
    }
    #mDesc ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
        margin-bottom: 0.75rem;
    }
    #mDesc a {
        color: #009150;
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
@php
    $specialProducts = $products->where('is_special', true);
    $regularProducts = $products->where('is_special', false);
    $groupedRegular = $regularProducts->groupBy('category');
@endphp

<!-- Hero Section -->
<section class="merch-hero relative">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/merch/79S2.gif') }}" 
             alt="Background Hutan Merch" 
             class="w-full h-full object-cover object-center">
        <!-- Overlay to ensure text stays clear and readable -->
        <div class="absolute inset-0 bg-gradient-to-b from-[#002816]/85 via-[#005a32]/75 to-[#002816]/90"></div>
        <div class="absolute inset-0 bg-black/25"></div>
    </div>

    <div class="merch-hero-content animate-fade-in relative z-10">
        <h1 class="drop-shadow-lg text-white">Official Merchandise <br> SRE UNESA!</h1>
        <p class="text-white/95 drop-shadow">Tingkatkan gaya hidup berkelanjutan Anda dengan koleksi eksklusif dari komunitas kami.</p>
    </div>
    
    <!-- Decorative Accents -->
    <div class="absolute top-1/4 right-10 opacity-20 hidden lg:block pointer-events-none z-10">
        <svg width="200" height="200" viewBox="0 0 200 200" fill="none" class="text-white">
            <path d="M20 180Q50 150 180 20" stroke="currentColor" stroke-width="4" stroke-dasharray="8 8"/>
            <path d="M160 20L180 20L180 40" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
</section>

@if(session('success'))
<div class="alert alert-success animate-fade-in" style="margin-top: 2rem;">
    {{ session('success') }}
</div>
@endif

<!-- SPECIAL MERCH SECTION -->
@if($specialProducts->count() > 0)
<section class="special-section animate-fade-in">
    <div class="special-title-container">
        <h2>Our Special Merch</h2>
        <div class="special-underline"></div>
    </div>

    <div class="merch-grid">
        @foreach($specialProducts as $product)
            @include('partials.merch-card', ['product' => $product])
        @endforeach
    </div>
</section>
@else
<section class="special-section animate-fade-in">
    <div class="special-title-container">
        <h2>Our Special Bundle</h2>
        <div class="special-underline"></div>
    </div>
    
    <div class="special-empty-card">
        <div class="empty-icon">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
        </div>
        <p class="empty-text-main">No bundle merchandise available yet.</p>
        <p class="empty-text-sub">Please check back later for exciting bundles!</p>
    </div>
</section>
@endif

<!-- MARQUEE SECTION -->
<div class="w-full py-8 lg:py-12 my-12 overflow-hidden bg-white border-y border-slate-100 flex items-center select-none">
    <div class="flex shrink-0 items-center gap-12 lg:gap-20 pr-12 lg:pr-20 animate-marquee whitespace-nowrap">
        @foreach(range(1, 6) as $i)
        <span class="text-4xl lg:text-7xl font-black uppercase tracking-tighter inline-flex items-center gap-4 lg:gap-6 shrink-0">
            <img src="{{ asset('images/logo/srehijau.png') }}" class="h-10 lg:h-16 w-auto shrink-0 object-contain" alt="SRE Logo">
            <span><span class="text-sky-200">UNESA.</span><span class="text-yellow-400">MERCHANDISE</span></span>
        </span>
        @endforeach
    </div>
    <div class="flex shrink-0 items-center gap-12 lg:gap-20 pr-12 lg:pr-20 animate-marquee whitespace-nowrap" aria-hidden="true">
        @foreach(range(1, 6) as $i)
        <span class="text-4xl lg:text-7xl font-black uppercase tracking-tighter inline-flex items-center gap-4 lg:gap-6 shrink-0">
            <img src="{{ asset('images/logo/srehijau.png') }}" class="h-10 lg:h-16 w-auto shrink-0 object-contain" alt="SRE Logo">
            <span><span class="text-sky-200">UNESA.</span><span class="text-yellow-400">MERCHANDISE</span></span>
        </span>
        @endforeach
    </div>
</div>

<!-- REGULAR CATEGORIES -->
@forelse($groupedRegular as $category => $items)
    <!-- CATEGORY SECTION: {{ strtoupper($category) }} -->
    <div class="merch-section-header animate-fade-in" style="margin-top: {{ $loop->first && $specialProducts->count() == 0 ? '4rem' : '8rem' }};">
        <span class="arrow-icon">➔</span>
        <h2>{{ $category ?: 'Uncategorized' }}</h2>
    </div>

    <div class="merch-grid animate-fade-in">
        @foreach($items as $product)
            @include('partials.merch-card', ['product' => $product])
        @endforeach
    </div>
@empty
    @if($specialProducts->count() == 0)
        <div style="text-align: center; padding: 8rem 2rem;">
            <p style="color: #94a3b8; font-weight: 600; font-size: 1.5rem; text-transform: uppercase;">No products available yet.</p>
        </div>
    @endif
@endforelse

<!-- Marketplace / Community Banner -->
<section class="animate-fade-in px-4 mb-24">
    <div class="max-w-7xl mx-auto relative group overflow-hidden rounded-[2rem] lg:rounded-[4rem] shadow-2xl shadow-emerald-900/10 border border-emerald-100">
        <!-- Banner Image -->
        <img src="{{ asset('images/merch/srebenner.jpg') }}" 
             alt="Get Our Official Merchandise at" 
             class="w-full h-auto object-cover block select-none pointer-events-none">
        
        <!-- Interactive Overlay (Clickable Pill Buttons for Instagram Handles) -->
        <div class="absolute inset-0 z-20">
            <!-- Button 1: @sreunesa.merch -->
            <a href="https://www.instagram.com/sreunesa.merch/" 
               target="_blank" 
               rel="noopener noreferrer"
               style="top: 10.8%; left: 69.5%; width: 26.0%; height: 11.0%;"
               class="absolute rounded-[1rem] sm:rounded-[1.5rem] lg:rounded-[2.2rem] hover:bg-black/10 hover:ring-2 sm:hover:ring-4 hover:ring-[#009150]/60 active:scale-[0.98] transition-all cursor-pointer"
               title="Kunjungi Instagram @sreunesa.merch">
            </a>
            
            <!-- Button 2: @sre_unesa -->
            <a href="https://www.instagram.com/sre_unesa/" 
               target="_blank" 
               rel="noopener noreferrer"
               style="top: 23.8%; left: 69.5%; width: 26.0%; height: 11.0%;"
               class="absolute rounded-[1rem] sm:rounded-[1.5rem] lg:rounded-[2.2rem] hover:bg-black/10 hover:ring-2 sm:hover:ring-4 hover:ring-[#009150]/60 active:scale-[0.98] transition-all cursor-pointer"
               title="Kunjungi Instagram @sre_unesa">
            </a>
        </div>
    </div>

    <!-- Mobile Quick Buttons (Optional easy-to-tap buttons on small screens) -->
    <div class="flex sm:hidden flex-wrap items-center justify-center gap-3 mt-4">
        <a href="https://www.instagram.com/sreunesa.merch/" target="_blank" rel="noopener noreferrer" 
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-full text-xs font-bold hover:bg-emerald-100 transition shadow-sm active:scale-95">
            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            <span>@sreunesa.merch</span>
        </a>
        <a href="https://www.instagram.com/sre_unesa/" target="_blank" rel="noopener noreferrer" 
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-full text-xs font-bold hover:bg-emerald-100 transition shadow-sm active:scale-95">
            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            <span>@sre_unesa</span>
        </a>
    </div>
</section>

<!-- Product Detail Modal -->
<div id="productModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6 drop-shadow-2xl opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeModal()"></div>
    
    <div id="modalContent" class="relative w-full max-w-5xl bg-white rounded-[2rem] shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]">
        <div class="flex-grow overflow-y-auto sm:overflow-visible flex flex-col md:flex-row p-6 sm:p-8 gap-8">
            <!-- Left: Images -->
            <div class="w-full md:w-1/2 flex flex-col gap-4">
                <div class="bg-[#f8fafc] rounded-2xl p-6 flex-grow flex items-center justify-center min-h-[300px]">
                    <img id="mImg" src="" class="w-full h-auto object-contain max-h-[400px] rounded-lg shadow-sm" alt="Product Image" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                    <div id="mPlaceholder" style="display:none;" class="text-6xl items-center justify-center">📦</div>
                </div>
                <!-- Mock Thumbnails (Optional matching design) -->
                <div class="flex gap-3 overflow-x-auto pb-2">
                    <div class="w-20 h-20 shrink-0 bg-[#f8fafc] rounded-lg border-2 border-slate-800 p-1 cursor-pointer transition"><img class="w-full h-full object-cover rounded" src=""></div>
                    <div class="w-20 h-20 shrink-0 bg-[#f8fafc] rounded-lg border border-slate-200 p-1 cursor-pointer opacity-70 hover:opacity-100 transition"><img class="w-full h-full object-cover rounded" src=""></div>
                    <div class="w-20 h-20 shrink-0 bg-[#f8fafc] rounded-lg border border-slate-200 p-1 cursor-pointer opacity-70 hover:opacity-100 transition"><img class="w-full h-full object-cover rounded" src=""></div>
                    <div class="w-20 h-20 shrink-0 bg-[#f8fafc] rounded-lg border border-slate-200 p-1 cursor-pointer opacity-70 hover:opacity-100 transition"><img class="w-full h-full object-cover rounded" src=""></div>
                </div>
            </div>

            <!-- Right: Info -->
            <div class="w-full md:w-1/2 flex flex-col">
                <div class="border border-slate-200 rounded-3xl p-6 mb-6 relative hover:shadow-lg transition">
                    <p class="text-xs font-black uppercase tracking-widest text-slate-400 mb-1">PRICE</p>
                    <h2 id="mPrice" class="text-4xl font-semibold text-slate-800 mb-4 tracking-tight">Rp0</h2>
                    <div class="h-px bg-slate-200 w-full mb-4"></div>
                    <div class="flex justify-between items-center text-sm font-medium text-slate-500">
                        <span>Kategori:</span>
                        <span id="mCategory" class="font-bold text-slate-800">Other</span>
                    </div>
                </div>

                <div class="mb-2 flex items-center gap-2">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                    <h3 class="font-bold text-slate-800">Deskripsi Produk</h3>
                </div>
                
                <div class="bg-[#f8fafc] rounded-2xl p-5 mb-8 flex-grow overflow-y-auto" style="max-h: 250px;">
                    <h4 id="mName" class="font-bold text-slate-800 mb-2"></h4>
                    <div id="mDesc" class="text-sm text-slate-500 leading-relaxed break-words whitespace-normal" style="word-wrap: break-word; overflow-x: hidden;"></div>
                </div>

                <a id="mOrderBtn" href="#" target="_blank" class="w-full bg-[#009150] hover:bg-[#002816] text-white text-center py-4 rounded-2xl font-bold transition shadow-xl shadow-emerald-500/20 active:scale-95 flex justify-center items-center gap-2 mt-auto">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Order Sekarang
                </a>
            </div>
        </div>
        
        <!-- Footer Menu -->
        <div class="bg-slate-50 px-6 sm:px-8 py-4 border-t border-slate-100 flex justify-between items-center">
            <span class="text-xs text-slate-400 font-medium">Official SRE UNESA Merchandise</span>
            <button onclick="closeModal()" class="text-sm font-bold text-slate-500 hover:text-slate-800 transition">Close</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function openModal(btn) {
        const modal = document.getElementById('productModal');
        const content = document.getElementById('modalContent');
        
        // Extract data
        const name = btn.getAttribute('data-name');
        const category = btn.getAttribute('data-category');
        const price = btn.getAttribute('data-price');
        const desc = btn.getAttribute('data-desc');
        const imgs = JSON.parse(btn.getAttribute('data-imgs') || '[]');
        let link = btn.getAttribute('data-link');
        
        if (!link || link === '#') {
            link = "javascript:alert('Tautan pembelian belum diatur oleh admin.');";
        }

        // Apply data
        document.getElementById('mName').textContent = name;
        document.getElementById('mCategory').textContent = category;
        document.getElementById('mPrice').textContent = price;
        document.getElementById('mDesc').innerHTML = desc;
        document.getElementById('mOrderBtn').href = link;
        
        const imgEl = document.getElementById('mImg');
        const pEl = document.getElementById('mPlaceholder');
        const thumbContainer = document.querySelector('.flex.gap-3.overflow-x-auto.pb-2');
        
        // Clear old thumbnails or manage them
        if (imgs.length > 0) {
            imgEl.src = imgs[0];
            imgEl.style.display = 'block';
            pEl.style.display = 'none';
            
            // Manage thumbnails (Up to 4)
            const thumbNodes = thumbContainer.querySelectorAll('div');
            imgs.forEach((url, i) => {
                if (i < 4) {
                    const node = thumbNodes[i];
                    const img = node.querySelector('img');
                    if (img) {
                        img.src = url;
                        node.style.display = 'block';
                        node.onclick = () => {
                            imgEl.src = url;
                            // Reset borders
                            thumbNodes.forEach(rn => rn.classList.replace('border-slate-800', 'border-slate-200'));
                            node.classList.replace('border-slate-200', 'border-slate-800');
                        };
                    }
                }
            });
            
            // Hide extra slots if fewer than 4 images
            for (let i = imgs.length; i < 4; i++) {
                if (thumbNodes[i]) thumbNodes[i].style.display = 'none';
            }
        } else {
            imgEl.style.display = 'none';
            pEl.style.display = 'flex';
        }

        // Show modal
        document.body.style.overflow = 'hidden';
        modal.classList.remove('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            content.classList.remove('scale-95');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('productModal');
        const content = document.getElementById('modalContent');
        
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = '';
        }, 300);
    }
</script>
@endsection
