@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')
@section('page_title', 'Ringkasan Admin')

@section('content')
    <div class="space-y-4 lg:space-y-8 animate-in fade-in duration-700">
        <!-- Welcome Card -->
        <div class="main-card p-5 lg:p-8 bg-gradient-to-br from-white to-emerald-50/30 dark:from-slate-800 dark:to-emerald-900/10 border-none relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="relative z-10">
                <h2 class="text-2xl lg:text-3xl font-black text-slate-800 dark:text-white tracking-tight">Selamat Datang, Admin {{ explode(' ', $user->name)[0] }}!</h2>
                <p class="text-sm lg:text-base text-slate-500 dark:text-slate-400 mt-2 leading-relaxed max-w-2xl">Panel kendali pusat SRE UNESA. Kelola seluruh konten dan aktivitas komunitas dari satu dashboard terpadu.</p>
            </div>
        </div>

        <!-- Stats Grid (Admin Style) -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-6">
            @php
                $cardConfigs = [

                    'activity' => ['label' => 'Activity', 'color' => 'blue', 'text_color' => 'text-blue-500', 'bg_color' => 'bg-blue-50'],
                    'news' => ['label' => 'News', 'color' => 'sky', 'text_color' => 'text-sky-500', 'bg_color' => 'bg-sky-50'],
                    'product' => ['label' => 'Product', 'color' => 'amber', 'text_color' => 'text-amber-500', 'bg_color' => 'bg-amber-50'],
                ];
                $icons = [

                    'activity' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9',
                    'news' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 002-2h10l4 4v10a2 2 0 01-2 2h-14',
                    'product' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z',
                ];
            @endphp

            @foreach($cardConfigs as $key => $config)
                <div class="main-card overflow-hidden group hover:shadow-xl transition-all duration-500">
                    <div class="p-3 lg:p-6 flex items-center gap-3 lg:gap-6">
                        <div class="w-10 h-10 lg:w-14 lg:h-14 {{ $config['bg_color'] }} dark:{{ str_replace('bg-', 'bg-', $config['bg_color']) }}900/20 {{ $config['text_color'] }} rounded-xl lg:rounded-2xl flex items-center justify-center transition-transform group-hover:scale-110 duration-500 shrink-0">
                            <svg class="w-5 h-5 lg:w-8 lg:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icons[$key] }}"></path>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[9px] lg:text-[10px] font-bold uppercase tracking-widest text-slate-400 truncate">{{ $config['label'] }}</p>
                            <p class="text-lg lg:text-2xl font-black text-slate-800 dark:text-white truncate">{{ $stats[$key]['total'] }}</p>
                        </div>
                    </div>
                    
                    <!-- Diagram Section -->
                    <div class="px-3 lg:px-6 pb-3 lg:pb-4 hidden sm:block">
                        <div class="h-6 lg:h-8 flex items-end gap-1 mb-2 lg:mb-3">
                            @php $seed = substr(md5($key), 0, 5); @endphp
                            @foreach([40, 70, 45, 90, 65, 80, 50] as $i => $h)
                                <div class="flex-1 {{ str_replace('text-', 'bg-', $config['text_color']) }} opacity-20 rounded-t-sm group-hover:opacity-40 transition-all duration-700" 
                                     style="height: {{ $h }}%; transition-delay: {{ $i * 50 }}ms"></div>
                            @endforeach
                        </div>
                        <div class="flex items-center justify-between border-t border-slate-50 dark:border-slate-800 pt-2 lg:pt-3">
                            <div class="flex flex-col min-w-0 pr-2">
                                <span class="text-[8px] font-bold text-slate-400 uppercase tracking-tight truncate">Last Upload</span>
                                <span class="text-[9px] lg:text-[10px] font-bold text-slate-600 dark:text-slate-300 truncate">{{ $stats[$key]['last_date'] }}</span>
                            </div>
                            <div class="text-right shrink-0">
                                <span class="px-2 py-0.5 rounded-full {{ $config['bg_color'] }} {{ $config['text_color'] }} text-[9px] font-bold">+{{ $stats[$key]['last_count'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-8">
            <!-- Activities Section -->
            <div class="space-y-4 lg:space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-base lg:text-lg font-bold text-slate-800 dark:text-white flex items-center gap-2">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                        Kegiatan Terbaru
                    </h3>
                    <a href="{{ route('admin.activity.index') }}" class="text-[10px] lg:text-xs font-bold text-primary hover:underline">Kelola Semua</a>
                </div>
                <div class="space-y-3 lg:space-y-4">
                    @forelse($activities as $activity)
                        <div class="main-card p-4 lg:p-5 group hover:border-primary transition duration-300">
                            <div class="flex items-center gap-3 lg:gap-4">
                                <div class="w-10 h-10 lg:w-12 lg:h-12 bg-slate-50 dark:bg-slate-800 rounded-xl flex items-center justify-center text-slate-400 group-hover:bg-primary group-hover:text-white transition shrink-0">
                                    <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm lg:text-base font-bold text-slate-800 dark:text-white group-hover:text-primary transition line-clamp-1">{{ $activity->name }}</h4>
                                    <p class="text-[9px] lg:text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-wider">
                                        {{ $activity->date ? \Carbon\Carbon::parse($activity->date)->format('d M Y') : 'Segera' }} • {{ $activity->location }}
                                    </p>
                                </div>
                                <a href="{{ route('milestone.activity.show', $activity) }}" class="p-1.5 lg:p-2 bg-slate-50 dark:bg-slate-800 group-hover:bg-primary/10 rounded-lg transition text-slate-400 group-hover:text-primary">
                                    <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="main-card p-8 lg:p-10 text-center border-dashed">
                            <p class="text-slate-400 text-[10px] lg:text-sm italic">Tidak ada kegiatan tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Articles Section -->
            <div class="space-y-4 lg:space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-base lg:text-lg font-bold text-slate-800 dark:text-white flex items-center gap-2">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"></path></svg>
                        Berita Terbaru
                    </h3>
                    <a href="{{ route('admin.article.index') }}" class="text-[10px] lg:text-xs font-bold text-primary hover:underline">Kelola Berita</a>
                </div>
                <div class="grid grid-cols-1 gap-3 lg:gap-4">
                    @foreach($articles as $article)
                        <div class="main-card p-4 lg:p-5 group flex items-center gap-4 lg:gap-5 hover:border-sky-500 transition duration-300">
                            <div class="w-14 h-14 lg:w-20 lg:h-20 bg-slate-100 dark:bg-slate-800 rounded-xl lg:rounded-2xl flex items-center justify-center text-slate-300 group-hover:text-sky-500 transition shrink-0">
                                <svg class="w-6 h-6 lg:w-10 lg:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm lg:text-base font-bold text-slate-800 dark:text-white truncate group-hover:text-sky-500 transition">{{ $article->title }}</h4>
                                <p class="text-[9px] lg:text-[10px] text-slate-400 mt-1 lg:mt-2 font-bold uppercase tracking-widest">{{ $article->created_at->diffForHumans() }}</p>
                            </div>
                            <a href="{{ route('milestone.article.show', $article) }}" class="p-1.5 lg:p-2 bg-slate-50 dark:bg-slate-800 group-hover:bg-sky-500/10 rounded-lg transition text-slate-400 group-hover:text-sky-500">
                                <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent History Table -->
        <div class="main-card p-5 lg:p-8 bg-white dark:bg-slate-900 border-none shadow-lg overflow-hidden">
            <div class="flex items-center justify-between mb-4 lg:mb-8">
                <div>
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white">Riwayat Unggahan Terbaru</h3>
                    <p class="text-xs text-slate-400 mt-1 uppercase tracking-widest font-bold">Log aktivitas konten terbaru dari seluruh kategori</p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800 px-4 py-2 rounded-xl border border-slate-100 dark:border-slate-700">
                    <span class="text-xs font-bold text-slate-500">Total Log: {{ count($history) }}</span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-slate-50 dark:border-slate-800">
                            <th class="pb-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Judul / Nama Konten</th>
                            <th class="pb-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Kategori</th>
                            <th class="pb-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Tanggal Unggah</th>
                            <th class="pb-4 text-[10px] font-black uppercase tracking-widest text-slate-400 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                        @forelse($history as $item)
                            <tr class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                <td class="py-4 pr-4">
                                    <p class="text-sm font-bold text-slate-700 dark:text-slate-200 group-hover:text-primary transition-colors line-clamp-1">{{ $item['title'] }}</p>
                                </td>
                                <td class="py-4">
                                    <span class="px-2.5 py-1 rounded-lg bg-{{ $item['color'] }}-50 dark:bg-{{ $item['color'] }}-900/20 text-{{ $item['color'] === 'emerald' ? 'primary' : ($item['color'] . '-500') }} text-[10px] font-black uppercase tracking-tight border border-{{ $item['color'] }}-100/50 dark:border-{{ $item['color'] }}-800/50">
                                        {{ $item['type'] }}
                                    </span>
                                </td>
                                <td class="py-4">
                                    <span class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ \Carbon\Carbon::parse($item['date'])->format('d M Y, H:i') }}</span>
                                </td>
                                <td class="py-4 text-right">
                                    @if($item['status'] === 'Deleted')
                                        <div class="inline-flex items-center gap-1.5 text-red-500">
                                            <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div>
                                            <span class="text-[10px] font-black uppercase tracking-tight">Deleted</span>
                                        </div>
                                    @else
                                        <div class="inline-flex items-center gap-1.5 text-emerald-500">
                                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></div>
                                            <span class="text-[10px] font-black uppercase tracking-tight">Live</span>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-10 text-center text-slate-400 italic text-sm">Belum ada riwayat aktivitas tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection