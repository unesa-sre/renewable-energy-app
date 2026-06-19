@extends('layouts.dashboard')

@section('title', 'Kegiatan Komunitas')
@section('page_title', 'Kegiatan Mendukung Alam')

@section('content')
    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($activities as $activity)
                <div class="main-card overflow-hidden group hover:border-primary transition duration-500">
                    <div class="relative h-48 bg-slate-100 overflow-hidden">
                        @if($activity->image)
                            <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->name }}"
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-primary/20">
                                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        @endif
                        <div
                            class="absolute top-4 right-4 bg-white/90 dark:bg-slate-900/90 backdrop-blur px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest text-primary shadow-sm">
                            {{ $activity->category ?? 'Ekspedisi' }}
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs font-bold text-slate-400 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ $activity->date ? \Carbon\Carbon::parse($activity->date)->format('d M Y') : 'Segera Hadir' }}
                        </div>
                        <h3
                            class="text-lg font-bold text-slate-800 dark:text-white group-hover:text-primary transition line-clamp-1">
                            {{ $activity->name }}</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-2 mb-6 line-clamp-2 leading-relaxed">
                            {{ $activity->description }}</p>

                        <div class="flex items-center justify-between pt-4 border-t border-slate-50 dark:border-slate-800">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                                <span
                                    class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $activity->location }}</span>
                            </div>
                            <a href="{{ route('milestone.activity.show', $activity) }}"
                                class="text-xs font-black text-primary hover:translate-x-1 transition flex items-center gap-1">
                                DETAIL <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div
                        class="w-20 h-20 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 dark:text-white">Belum Ada Kegiatan</h3>
                    <p class="text-slate-500 mt-2">Nantikan ekspedisi hijau selanjutnya dari komunitas EcoFuture.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $activities->links() }}
        </div>
    </div>
@endsection