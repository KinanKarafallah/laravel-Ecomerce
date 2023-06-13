<div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
    @unless(count($products) == 0)

        @foreach($products as $product)
        <x-product-card :product="$product" />
        @endforeach

        @else
        <p>No listings found</p>
    @endunless
</div>