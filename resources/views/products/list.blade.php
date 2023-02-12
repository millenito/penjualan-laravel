<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<x-volt-app title="Daftar Produk">
    {{-- @livewire(\App\Http\Livewire\Table\ProductTable::class) --}}

    <div class="row">
    @foreach ($products as $product)
        <div class="col-sm-2">
            <div class="card" style="width: 18rem;">
                <img src="{{ url($product->product_image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    @if ($product->discount || $product->discount > 0)
                        <p class="card-text"><s>Rp {{ number_format($product->price) }}</s> Rp {{ number_format($product->price - ($product->price*$product->discount/100)) }}</p>
                    @else
                        <p class="card-text">Rp {{ number_format($product->price) }}</p>
                    @endif
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->product_name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->product_image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="btn btn-primary">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    </div>

</x-volt-app>
