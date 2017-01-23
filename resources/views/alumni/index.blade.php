@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Halaman Alumni 
            <p><small>Data Alumni</small></p>
            
        </h1>
        
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-body">
                <h2>Selamat Datang</h2>
                <br />
                <p>Terima Kasih atas perhatian dan waktu yang telah Anda berikan dalam berpartisipasi mengisi quesioner program ini.</p>

                <br />
                <p>
                    <div class="pull-right" style="margin-right:100px; margin-bottom:50px;">
                        <i>Hormat Kami<p></p></i>

                    </div>
                </p>

            </div>
        </div>

    </section>

    <script>
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
@endsection