@extends('layouts.home')

@section('content')
    <div class="row section featured topspace">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center><img src="{{url('img/sampul.jpg')}}" style="margin-bottom:50px;"  width="820" height="227" alt=""></center>
                </div>
            </div>
        </div>
                <h2 class="section-title"><span>Tracer Study</span></h2>
                <div class="row">
            
    <main id="main">
        <div class="container">
            
            <div class="row section topspace">
                <div class="col-md-12">
                    <p class="lead text-center text-muted"><i>Tracer Study</i> adalah studi mengenai lulusan lembaga penyelenggara pendidikan tinggi yang mampu menyediakan berbagai informasi bermanfaat bagi kepentingan evaluasi hasil pendidikan tinggi dan selanjutnya dapat digunakan untuk penyempurnaan dan penjaminan kualitas lembaga yang bersangkutan serta menyediakan informasi penting mengenai hubungan antara pendidikan tinggi dan dunia kerja professional, menilai relevansi pendidikan tinggi, informasi bagi pemangku kepentingan, dan kelengkapan persyaratan bagi akreditasi pendidikan tinggi.</p>
                </div>
            <div class="row section featured topspace">
                <h2 class="section-title"><span>Sign in</span></h2>
                <div class="row">
                    
                    <!-- / section -->
                    <div class="container">
                        <div class="row" style="margin-top:5px">
                            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                            
                                <form role="form" action="{{url('/login-alumni')}}" method="post">
                                    {{ csrf_field() }}
                                    <fieldset>
                                        <h2 class="text-center">Sign in to start your session</h2>
                                        <hr class="colorgraph">
                                        <div class="form-group">
                                            <input type="text" name="email" id="user" class="form-control input-lg" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="user" class="form-control input-lg" placeholder="Password">
                                        </div>
                                        <hr class="colorgraph">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <input type="submit" name="signin" id="signin" class="btn btn-lg btn-success btn-block" value="Sign In" tabindex="3">
                                                    
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <a href="{{url('/reg-alumni')}}" class="btn btn-lg btn-primary btn-block">Sign Up</a>
                                            </div>
                                        </div>
                                    </fieldset>
                                
                                    </form>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /section -->

            
            <div class="row section clients topspace">
                <h2 class="section-title"><span></span></h2>
                <div class="col-lg-12">
                    <p>
                        <img src="" alt="">
                    </p>
                </div>
            </div>
        </div>	
    </main>

    
    <script src="{{url('tracer/js/template.js')}}"></script>
@endsection