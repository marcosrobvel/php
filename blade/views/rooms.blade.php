<ol>
    @foreach ($rooms as $room)
        <li>
            Room Type: {{ $room['roomType'] ?? 'No Room Type' }}<br>
            Room Number: {{ $room['roomNumber'] ?? 'No Room Number' }}<br>
            Price: ${{ isset($room['price']) ? number_format($room['price'], 2) : 'No Price' }}<br>
            Offer Price: ${{ isset($room['offer_price']) ? number_format($room['offer_price'], 2) : 'No Offer Price' }}<br>
            Amenities: {{ $room['amenities'] ?? 'No Amenities' }}<br>
            Status: {{ $room['status'] ?? 'No Status' }}<br>
        </li>
    @endforeach
</ol>