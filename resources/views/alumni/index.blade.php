@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Halaman Alumni 
            <p><small>Data Alumni</small></p>
            
        </h1>
        
    </section>

    <section class="content">
        <h2>Halaman Alumni</h2>
    </section>

    <script>
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
@endsection