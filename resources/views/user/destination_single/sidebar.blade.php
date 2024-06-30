<div class="destination-single-sidebar card">
    <div class="card-body">
        <div class="card-header-z mb-4">
            <h4 class="sidebar-card-title">
                <span class="text"><i class="bi bi-info-circle"></i> &nbsp;Tour Details</span>
            </h4>
        </div>

        <hr style="color: #0a0a0a40;" />

        <div class="details-list">
            @if(isset($destination->tour_details)) 
            <ul>
                @foreach(json_decode($destination->tour_details) as $d)
                    <li><div class="title">{{ $d->title ?? '' }}</div><div class="content">{{ $d->text ?? '' }}</div></li>
                @endforeach 
            </ul>
            @endif
        </div>
    </div>
</div>