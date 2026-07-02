@extends('layouts.app-public')

@section('title', 'Our Activities')

@section('content')
<!-- Header Section with Wave -->
<div class="relative w-full bg-[#009150] pt-36 pb-48 overflow-hidden text-center">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 flex flex-col items-center">
        <h1 class="text-4xl md:text-6xl font-black mb-6 text-white animate-in fade-in slide-in-from-top-4 duration-700 delay-100 tracking-tight">
            Our <span class="text-yellow-400">Activities</span>
        </h1>
        <p class="text-emerald-50 text-lg max-w-2xl mx-auto animate-in fade-in slide-in-from-top-4 duration-700 delay-200">
            Berbagai kegiatan untuk mengembangkan kompetensi di bidang energi terbarukan
        </p>
    </div>
    
    <!-- White Wave at the bottom -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-20 translate-y-[1px]">
        <svg class="relative block w-full h-[60px] md:h-[120px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"></path>
        </svg>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16 relative z-30 -mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($activities as $activity)
        <a href="{{ route('milestone.activity.show', $activity) }}" class="group bg-white rounded-[2rem] overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-300 border border-slate-100 flex flex-col h-full hover:-translate-y-1">
            <div class="h-64 relative overflow-hidden p-3 pb-0">
                <div class="w-full h-full relative rounded-[1.5rem] overflow-hidden">
                    @if($activity->image)
                        <img src="{{ str_contains($activity->image, 'http') ? $activity->image : asset('storage/'.$activity->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    
                    <!-- Top Left Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="bg-slate-900/80 backdrop-blur-md text-white text-sm font-bold px-4 py-2 rounded-xl">{{ sprintf('%02d', $loop->iteration) }}</span>
                    </div>

                    <!-- Bottom Right Badge -->
                    <div class="absolute bottom-4 right-4">
                        <span class="bg-[#009150] text-white text-[11px] font-bold px-4 py-2 rounded-full flex items-center gap-1.5 shadow-lg">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                            {{ $activity->category ?? 'Activity' }}
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="p-8 pt-6 flex-1 flex flex-col">
                <h3 class="text-xl font-black text-[#004225] mb-3 line-clamp-2 group-hover:text-[#009150] transition-colors">{{ $activity->name }}</h3>
                <p class="text-slate-500 text-sm mb-8 line-clamp-2 leading-relaxed">
                    {{ Str::limit(strip_tags($activity->description ?? 'Tidak ada deskripsi.'), 100) }}
                </p>
                
                <div class="mt-auto space-y-3">
                    <!-- Date Badge -->
                    <div class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-50/80 text-[#009150] text-[10px] font-bold uppercase tracking-wider w-fit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                        {{ $activity->date ? \Carbon\Carbon::parse($activity->date)->translatedFormat('d F Y') : 'Segera' }}
                    </div>
                    
                    <!-- Target Audience Badge -->
                    <div class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-50/80 text-[#009150] text-[10px] font-bold uppercase tracking-wider w-fit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Semua Anggota
                    </div>
                </div>
            </div>
        </a>
        @empty
        <div class="col-span-full text-center py-20">
            <p class="text-slate-400 font-bold italic">Belum ada agenda kegiatan.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-16">
        {{ $activities->links() }}
    </div>
</div>
@endsection
