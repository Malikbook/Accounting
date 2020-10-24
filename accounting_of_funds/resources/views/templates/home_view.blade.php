@extends ('layouts.home_page')

@section('app_content')
    @guest
    <div style="margin-bottom: -5px;" class="container content-bg my-2 content_l d-flex justify-content-center align-content-center content_greeting">
        <div class="text-center mt-5">
            <h2>Hello friends!</h2>
            <p>
                This application is designed to solve problems with uncontrolled costs, especially when these costs may exceed your income.
            </p>
            <p>
                You need to register before you can use it, it will help to keep all your data in complete confidentiality.
            </p>

            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 488.4 488.4" style="enable-background:new 0 0 488.4 488.4; width: 250px" xml:space="preserve">
                <g>
                    <g>
                        <path d="M243.8,241.113L243.8,241.113c0.1,0,0.2,0,0.4,0c0.1,0,0.2,0,0.4,0l0,0c64.1-0.7,54.8-86.3,54.8-86.3
                            c-2.6-57.2-50.5-56.7-55.2-56.5c-4.7-0.2-52.5-0.7-55.2,56.5C189,154.913,179.7,240.513,243.8,241.113z"/>
                        <path d="M393.8,270.313L393.8,270.313c0.1,0,0.2,0,0.3,0c0.1,0,0.2,0,0.3,0l0,0c51.5-0.5,44.1-69.4,44.1-69.4
                            c-2.1-46-40.6-45.6-44.4-45.5c-3.8-0.2-42.3-0.5-44.4,45.5C349.7,201.013,342.2,269.813,393.8,270.313z"/>
                        <path d="M488.3,340.113c-0.4-14.8-3.3-25.1-18.4-34.6c-20.1-12.6-42.6-23.5-42.6-23.5l-17.9,56.6l-10.4-29.7
                            c18.3-25.6-1.3-26.9-4.8-26.9l0,0h-0.1H394l0,0c-3.5,0-23.1,1.3-4.8,26.9l-10.4,29.6l-17.9-56.6c0,0-6.4,3.1-15.4,7.9
                            c-2.1-1.7-4.4-3.4-7-5c-25-15.7-52.9-29.3-52.9-29.3l-22.2,70.3l-13-36.9c22.8-31.8-1.6-33.4-6-33.5l0,0h-0.1h-0.1l0,0
                            c-4.4,0-28.8,1.6-6,33.5l-13,36.9l-22.2-70.3c0,0-27.9,13.6-52.9,29.3c-2.7,1.7-5,3.4-7.1,5.1c-9.1-4.9-15.6-8-15.6-8l-17.9,56.6
                            l-10.4-29.6c18.3-25.6-1.3-26.9-4.8-26.9l0,0h-0.1h-0.1l0,0c-3.5,0-23.1,1.3-4.8,26.9l-10.4,29.6l-17.9-56.6
                            c0,0-22.5,10.9-42.6,23.5c-15.2,9.5-18,19.8-18.4,34.6v50.1h94h32.9h61.3H244h55.8h61.5H394h94.4L488.3,340.113z"/>
                        <path d="M93.6,270.313L93.6,270.313c0.1,0,0.2,0,0.3,0c0.1,0,0.2,0,0.3,0l0,0c51.6-0.5,44.1-69.4,44.1-69.4
                            c-2.1-46-40.6-45.6-44.4-45.5c-3.8-0.2-42.3-0.5-44.4,45.5C49.5,201.013,42.1,269.813,93.6,270.313z"/>
                    </g>
                </g>
        </svg>
        </div>
    </div>
    @else

    <div class="container text-center content-bg mt-5">
        @if(($results != null) && (count($results['one']) != 0))

            <h3>Comparison of the current month relative to the previous ones</h3>
            <div class="mb-5" id="your-id" style="height: 400px"></div>

            <script>
                document.addEventListener("DOMContentLoaded", function(){
                    // Create liteChart.js Object
                    let d = new liteChart("chart", {
                        axisX: {
                            show: true,
                            color: "#000409",
                            width: 2,
                            value: '₴',
                        },
                        axisY: {
                            show: true,
                            color: "#010409",
                            width: 2,
                            value: "",
                            minValue: 0,
                            maxValue: 0,
                        },
                        fill: null,
                        gridX: {
                            show: true,
                            interval: 1500,
                            fill: 1,
                            label: {
                                show: true
                            },
                            stroke:"#000305",
                            width:2,
                            dasharray:"0 10.04",
                            linecap:"round",
                        },
                        gridY: {
                            show: false,
                        },
                        line: {
                            width: 2,
                            style: "straight",
                            shadow: true,
                        },
                        point: {
                            show: true,
                            radius: 4,
                            strokeWidth: 3,
                            stroke: "#0e0101", // null or color by hex/rgba
                        }
                    });


                    // Set labels - count
                    let one = 1;
                    let two = 1;

                    <?php static $one = 1 ?>
                    <?php static $two = 1 ?>

                        @foreach($results['one'] as $res)
                            <?php $one++ ?>
                        @endforeach

                        @foreach($results['two'] as $res)
                            <?php $two++ ?>
                        @endforeach
                    // Set labels
                    d.setLabels([
                        @if($one > $two)
                            @foreach($results['one'] as $res)
                                one++,
                            @endforeach
                        @else
                                @foreach($results['two'] as $res)
                                    two++,
                                @endforeach
                        @endif
                    ]);

                    // Set legends and values
                    d.addLegend({"name": "{{$results['one'][0]->month}}", "stroke": "#4a7efa", "fill": "#315afc", "values": [@foreach($results['one'] as $res) {{$res->cost_amount}},  @endforeach]});
                    d.addLegend({"name": "Previous Mass", "stroke": "#fc9c3b", "fill": "#eeb100", "values": [@foreach($results['two'] as $res) {{$res->cost_amount}}, @endforeach]});

                    // Inject chart into DOM object
                    let div = document.getElementById("your-id");
                    d.inject(div);

                    // Draw
                    d.draw();
                });
            </script>

            <h3>Details of expenses for the current month:</h3>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                @forelse($results['one'] as $result)
                        <div class="card swiper-slide my-2 justify-content-center bg-secondary" style="max-width: 55em; margin: auto;">

                            <div class="card-header my-1 bg-white">Title: {{$result->title}} <br>
                                Added:

                                @if($result->created_at == NULL)
                                    Not known...
                                @else
                                    {{$result->created_at}}
                                @endif

                                <div class="card-body text-success">
                                    <b style="font-size: 50px;" class="d-block card-title text-center my-2">{{$result->cost_amount}} &#x20b4;</b>
                                    @if($result->description != null)
                                        <p><i style="font-size: 25px;" class="card-text text-secondary">{{$result->description}}</i></p>
                                    @else
                                        <p><i style="font-size: 25px;" class="card-text text-secondary">No description...</i></p>
                                    @endif
                                </div>
                            </div>
                        </div>

                @empty
                    <div style="margin-bottom: -15px;" class="card pt-5 mt-5 mb-n5 justify-content-center bg-warning" style="max-width: 55em; margin: auto;">
                        <div class="card-header bg-white">Empty

                            <div class="card-body text-warning text-center">
                                <p class="font-weight-bold">Sorry {{Auth::user()->name}}, but you haven't added any costs yet.</p>
                            </div>

                        </div>
                    </div>
                @endforelse
                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <script>
                    $(document).ready(function (){
                        var mySwiper = new Swiper('.swiper-container', {
                            // Optional parameters
                            centeredSlides: true,
                            loop: false,

                            // Navigation arrows
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                        });
                    });
                </script>
            </div>
        @else
                <div style="margin-bottom: -15px;" class="card pt-5 mt-5 mb-n5 justify-content-center bg-warning" style="max-width: 55em; margin: auto;">
                    <div class="card-header bg-white">Empty

                        <div class="card-body text-warning text-center">
                            <p class="font-weight-bold">Sorry {{Auth::user()->name}}, but you haven't added any costs yet.</p>
                        </div>

                    </div>
                </div>
        @endif
    </div>
    @endguest
@endsection
