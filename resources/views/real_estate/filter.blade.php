@extends('global.index')
@section('content')
    <div class="container">
        {{-- <div class="sub-header antrySub">
            <!-- Add the row class to start a new row -->
        </div> --}}
        <div class="row mt-5">
            @forelse ($listings as $listing)
                @if (isset($listing))
                    @php
                        $name = $listing['listing_type']['name'] ?? $listing['title'];
                        $slug = Str::slug($name);
                        $slugWithId = $slug . '/' . $listing['id'];
                    @endphp
                    <div class="col-md-4 mb-20">
                        <a href="{{ route('singleListing', ['type' => $slug, 'id' => $listing['id']]) }}">
                            <div class="product-entry">
                                <div class="product-img">
                                    <span class="featured">{{ $listing['listing_attribute_type']['type'] ?? 'Residential' }}</span>
                                    @php
                                        $imageUrl = $listing['meta_tags_for_listings']['banner'] ??
                                            'https://via.placeholder.com/600x400?text=No+Image+Available';
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
                                                    <i class="fa-solid fa-location-dot" ></i>
                                                    <p style="width: 70%;">
                                                        {{ $listing['city'] ?? 'N/A' }},
                                                        {{ $listing['state'] ?? 'N/A' }},
                                                        {{ $listing['country'] ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <h3 class="product-title mt-0 mb-0" style="height: 50px; overflow: hidden; text-overflow: ellipsis; display: flex; align-items: center;">
                                                {{ Str::limit($listing['title'], 45, '...') }}
                                            </h3>

                                        </div>
                                        <div class="antry_list_price">
                                            <div>
                                                <div class="item-price-1">
                                                    AED{{ $listing['listing_attribute_type']['price'] ?? '0' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            <p class="l_text" style="height: 60px; overflow: hidden; text-overflow: ellipsis; display: flex; align-items: center;">
                                                {{ Str::limit($listing['short_description'], 80, '...') }}
                                            </p>

                                    <div class="product-meta d-flex justify-content-between align-items-center">
                                        <div class="product-meta-item">
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                            <div><span class="number">{{ $listing['listing_attribute']['bedroom'] }}</span></div>
                                        </div>
                                        <div class="product-meta-item">
                                                <i class="fa fa-bath" ></i>
                                            <div><span class="number">{{ $listing['listing_attribute']['bathroom'] }}</span></div>
                                        </div>
                                        <div class="product-meta-item">
                                            {{-- <i class="fa fa-garage"></i> --}}
                                        <div><span class="number">{{ $listing['listing_attribute']['garage'] }}</span></div>
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
