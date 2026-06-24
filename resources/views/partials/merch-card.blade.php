<div class="merch-card">
    <div class="merch-img-container">
        <span class="merch-badge">{{ $product->category ?? 'Other' }}</span>
        @if($product->image && is_array($product->image) && count($product->image) > 0)
            <img src="{{ asset('storage/'.$product->image[0]) }}" class="merch-img" alt="{{ $product->name }}">
        @else
            <div class="merch-img" style="display:flex; align-items:center; justify-content:center; font-size:3rem; background: #f1f5f9;">📦</div>
        @endif
        <div class="merch-price">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
    </div>
    
    <div class="merch-body">
        <h3 class="merch-title text-slate-800">{{ $product->name }}</h3>
        <p class="merch-desc">{!! Str::limit(strip_tags($product->description), 100) !!}</p>
        
        @php
            $imgs = is_array($product->image) ? $product->image : ($product->image ? [$product->image] : []);
            $fullImgs = array_map(fn($i) => asset('storage/'.$i), $imgs);
        @endphp

        <button class="merch-btn" 
            onclick="openModal(this)"
            data-name="{{ $product->name }}"
            data-category="{{ $product->category ?? 'Other' }}"
            data-price="Rp{{ number_format($product->price, 0, ',', '.') }}"
            data-desc="{{ $product->description }}"
            data-imgs="{{ json_encode($fullImgs) }}"
            data-link="{{ $product->order_link ?? '#' }}">
            Order Sekarang
        </button>
    </div>
</div>
