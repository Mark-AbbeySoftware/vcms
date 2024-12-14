@extends('layouts.master')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

@section('title', 'Blogger Template')

@include('partials.navbar')

@section('content')


    @include('partials.blog-posts')

    @include('partials.business')

    @include('partials.culture')

    @include('partials.politics')

    {{-- include('partials.travel') --}}

@endsection

</html>
