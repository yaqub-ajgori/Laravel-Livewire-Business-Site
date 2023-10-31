<div>
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                @if($services)
                @foreach ($services as $service)
                 <x-service-card :service="$service" />
                @endforeach
                @endif
            </div>
        </div>
    </section>
</div>
