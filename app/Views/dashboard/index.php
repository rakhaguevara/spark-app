<div class="dashboard-content">

    <!-- LEFT: LIST PARKING -->
    <section class="parking-list">

        <div class="list-header">
            <span class="badge active">Shortest Walk</span>
            <span class="sort">Sort by Relevance ▾</span>
        </div>

        <!-- CARD -->
        <div class="parking-item active">
            <img src="<?= BASEURL ?>/assets/img/parking.jpg" alt="">
            <div class="parking-info">
                <h4>Malioboro Park Yogyakarta</h4>
                <div class="meta">
                    ⭐ 4.9 (20 reviews) · 1 min walk
                </div>
                <div class="price">$5</div>
                <button class="btn-book">Book Now</button>
            </div>
        </div>

        <div class="parking-item">
            <img src="<?= BASEURL ?>/assets/img/parking.jpg" alt="">
            <div class="parking-info">
                <h4>Malioboro Park Yogyakarta</h4>
                <div class="meta">
                    ⭐ 4.8 (18 reviews) · 2 min walk
                </div>
                <div class="price">$7</div>
                <button class="btn-book">Book Now</button>
            </div>
        </div>

    </section>

    <!-- RIGHT: MAP -->
    <section class="parking-map">
        <div id="map"></div>
    </section>

</div>