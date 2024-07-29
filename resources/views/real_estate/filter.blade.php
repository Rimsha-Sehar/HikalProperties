@extends('global.index')
@section('content')
    <div class="container">
        <div class="sub-header antrySub">
            <!-- Add the row class to start a new row -->
        </div>
        <div class="row">
            @forelse ($listings as $listing)
                @if (isset($listing['meta_tags_for_listings']['banner']))
                    @php
                        // Check if listing type name is not null, else use listing title
                        $name = $listing['listing_type']['name'] ?? $listing['title'];
                        // Generate slug
                        $slug = Str::slug($name);
                        // Concatenate slug with ID
                        $slugWithId = $slug . '/' . $listing['id'];
                    @endphp
                    <!-- Wrap each item in a col-md-4 class for 3 columns per row -->
                    <div class="col-md-4 mb-20">
                        <a href="{{ route('singleListing', ['type' => $slug, 'id' => $listing['id']]) }}">
                            <div class="product-entry">
                                <div class="product-img">
                                    <span class="featured">{{ $listing['listing_attribute_type']['type'] ?? 'Residential' }}</span>
                                    @php
                                        $imageUrl = $listing['meta_tags_for_listings']['banner'] ?? 'https://via.placeholder.com/600x400?text=No+Image+Available';
                                    @endphp
                                    <img src="{{ $imageUrl }}" alt="Banner Image">
                                    <span id="grid_3" class="wishlist" onclick="wishlist_check('3'); return false;">
                                        <i class="fa-regular fa-heart"></i>
                                    </span>
                                </div>

                                <div class="product-details grid_list_p">
                                    <div class="list_price">
                                        <div>
                                            <div class="product-location d-flex mb-0">
                                                <div class="product-meta-item">
                                                    <img class="bed"
                                                        src="https://hikalproperties.com/public/assets/real-estate/images/double.png"
                                                        alt="">
                                                    <p>
                                                        {{ $listing['city'] ?? 'N/A' }},
                                                        {{ $listing['state'] ?? 'N/A' }},
                                                        {{ $listing['country'] ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <h3 class="product-title mt-0 mb-0">{{ $listing['title'] }}</h3>
                                        </div>
                                        <div class="antry_list_price">
                                            <div>
                                                <div class="item-price-1">
                                                    AED{{ $listing['listing_attribute_type']['price'] ?? '0' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="l_text">{{ $listing['short_description'] }}</p>
                                    <div class="product-meta d-flex justify-content-between align-items-center">
                                        <div class="product-meta-item">
                                            <img class="bed"
                                                src="https://hikalproperties.com/public/assets/real-estate/images/double.png"
                                                alt="">
                                            <div><span class="number">{{ $listing['listing_attribute']['bedroom'] }}</span>
                                                Bed</div>
                                        </div>
                                        <div class="product-meta-item">
                                            <img class="bed"
                                                src="https://hikalproperties.com/public/assets/real-estate/images/double.png"
                                                alt="">
                                            <div><span
                                                    class="number">{{ $listing['listing_attribute']['bathroom'] }}</span>
                                                Bathroom</div>
                                        </div>
                                        <div class="product-meta-item">
                                            <img class="bed"
                                                src="https://hikalproperties.com/public/assets/real-estate/images/double.png"
                                                alt="">
                                            <div><span class="number">{{ $listing['listing_attribute']['garage'] }}</span>
                                                Garage</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @empty
                <p>No Listing Found</p>
            @endforelse
        </div>
        <!-- Pagination Controls -->
        <div class="text-center m-5">
        <div class="pagination">
            @if ($pagination['total_pages'] > 1)
                @if ($pagination['links']['prev'])
                    <a href="{{ route('realeStateListings', ['page' => $pagination['current_page'] - 1]) }}"
                        class="prev">
                        &laquo; Previous
                    </a>
                @endif

                @for ($i = 1; $i <= $pagination['total_pages']; $i++)
                    <a href="{{ route('realeStateListings', ['page' => $i]) }}"
                        class="{{ $pagination['current_page'] == $i ? 'active' : '' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if ($pagination['links']['next'])
                    <a href="{{ route('realeStateListings', ['page' => $pagination['current_page'] + 1]) }}"
                        class="next">
                        Next &raquo;
                    </a>
                @endif
            @endif
        </div>
        </div>
    </div>
@endsection
<style>
    .pagination {
        justify-content: end;
    }
    .pagination a {
        padding: 5px 10px;
        margin: 0 2px;
        text-decoration: none;
        color: #db150b;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .pagination a.active {
        background-color: #db150b;
        color: white;
        border-color: #db150b;
    }
</style>
