@extends('admin_toko.layout.core_store')

<title>Foresell - Detail</title>

@section('judul')
    Detail 
@endsection

@section('content')

<h1>{{$kategori->name}}</h1>
<p>{{$kategori->image}}
<p>{{$kategori->slug}}
<p>{{$kategori->desc}}

@endsection