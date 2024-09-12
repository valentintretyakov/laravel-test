<div class="d-flex gap-2 justify-content-between align-items-center flex-wrap mb-3">
    <h3>{{ isset($title) ? $title : '' }}</h3>
    <div class="d-flex gap-2 align-items-center flex-wrap">
        {{ isset($slot) ? $slot : '' }}
    </div>
</div>
