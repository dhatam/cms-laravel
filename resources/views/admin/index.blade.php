@extends('maelstrom::layouts.index')

@section('buttons')

    @include('maelstrom::buttons.button', [
        'url' => route('pages.create'),
        'label' => 'Create Page'
    ])

@endsection

@section('content')

    @include('maelstrom::components.table', [
        'columns' => [
            [
                'label' => 'Name',
                'name' => 'page',
                'sortable' => true,
                'type' => 'EditLinkColumn',
                'searchable' => true,
            ],
        ]
    ])

@endsection
