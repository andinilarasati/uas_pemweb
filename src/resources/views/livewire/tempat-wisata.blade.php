<div>
    <h1 style="margin-bottom: 30px;">Daftar Tempat Wisata</h1>
    <div class="wisata-container">
        @foreach ($wisata as $item)
            <div class="wisata-card">
                <img src="{{ asset('img/' . $item['gambar']) }}" alt="{{ $item['nama'] }}">
                <div class="info">
                    <h3>{{ $item['nama'] }}</h3>
                    <p>{{ $item['lokasi'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
