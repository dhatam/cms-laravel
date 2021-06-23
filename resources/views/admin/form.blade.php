@extends('maelstrom::layouts.form')

@section('content')
    @component('maelstrom::components.form', [
        'action' => $action,
        'method' => $method,
    ])

        @include('maelstrom::inputs.text', [
            'name' => 'name',
            'label' => 'Post Name',
            'required' => true,
        ])

        @include('maelstrom::inputs.text', [
            'name' => 'slug',
            'label' => 'Post Slug',
            'required' => true,
            'html_type' => 'url',
        ])

        @include('maelstrom::inputs.wysiwyg', [
            'name' => 'body',
            'label' => 'Post Body',
            'required' => true,
        ])

        @include('maelstrom::inputs.tags', [
            'name' => 'tags',
            'label' => 'Tags',
        ])

        @include('maelstrom::components.media_manager', [
            'name' => 'header_image',
            'label' => 'Featured Image',
        ])

    @endcomponent

@endsection
