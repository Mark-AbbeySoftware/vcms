@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop
@section('content')
    <style>
        .map-region:hover .map-region-single {
            fill:#ff0000;
            filter: url("#dropshadow");
            stroke: #fff;
            stroke-width: 8px;
        }
        .map-region-single {
            transition: fill 0.25s;
            fill:green;
            cursor: pointer;
        }
    </style>
    <div class="row">
        <h1 style="margin-left: 10px;">{{ $page->title }}</h1>
            <div  class="cta-map-container">
                <svg class="svg" version="1.1" id="svg_map" xmlns="http://www.w3.org/2000/svg" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" x="0px" y="0px" viewBox="125 -1112 1450.9 2375" xml:space="preserve" >

                    <metadata id="metadata211">
                        <sfw xmlns="&amp;ns_sfw;">
                            <slices></slices>
                            <slicesourcebounds width="1429" height="2340.8" bottomleftorigin="true" y="10.4" x="8.9"></slicesourcebounds>
                        </sfw>
                    </metadata>

                    <defs>
                        <filter xmlns="http://www.w3.org/2000/svg" id="dropshadow" width="120%" height="120%">
                            <feGaussianBlur in="SourceAlpha" stdDeviation="5"></feGaussianBlur>

                            <feOffset dx="-5" dy="5" result="offsetblur"></feOffset>

                            <feFlood flood-color="#777f"></feFlood>

                            <feComposite operator="in" in2="offsetblur"></feComposite>

                            <feMerge>
                                <feMergeNode></feMergeNode>
                                <feMergeNode in="SourceGraphic"></feMergeNode>
                            </feMerge>

                        </filter>
                    </defs>

                    @foreach($regions as $region)
                        <a xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{ $region->url  }}" target="{{ $region->target }}" id="{{$region->identifier}}" title="{{$region->title}}" class="map-region">
                        @foreach($region->polygons()->get() as $polygon)
                            @php $points = ''; @endphp
                            @foreach($polygon->points()->get() as $point)
                                {{ $points = $points.$point->point.',' }}
                            @endforeach
                                <polygon class="map-region-single" points="{{$points}}"></polygon>
                        @endforeach
                        </a>
                    @endforeach
                </svg>

                <span id="tool-tip_wales" class="map-tool-tip">Wales</span>
                <span id="tool-tip_scotland" class="map-tool-tip">Scotland</span>
                <span id="tool-tip_london" class="map-tool-tip">London</span>
                <span id="tool-tip_northern-ireland" class="map-tool-tip">Northern Ireland</span>
                <span id="tool-tip_yorkshire-and-the-humber" class="map-tool-tip">Yorkshire and the Humber</span>
                <span id="tool-tip_north-east" class="map-tool-tip">North East</span>
                <span id="tool-tip_north-west" class="map-tool-tip">North West</span>
                <span id="tool-tip_south-west" class="map-tool-tip">South West</span>
                <span id="tool-tip_east-midlands" class="map-tool-tip">East Midlands</span>
                <span id="tool-tip_west-midlands" class="map-tool-tip">West Midlands</span>
                <span id="tool-tip_south-east" class="map-tool-tip">South East</span>
                <span id="tool-tip_eastern" class="map-tool-tip">Eastern</span>

            </div>
    </div>
@stop
