@extends('backend.admin.layout.master')
@section('content')
<div class="content">
    <!-- Start Content-->
    {{-- Livewire_content --}}
    <livewire:category.show-category />
    <livewire:category.create-category @item-created="$refresh" />
</div> <!-- content -->
@endsection
