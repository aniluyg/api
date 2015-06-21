@extends('layouts.compact')
@section('content')

<section class="login u-pt50">

  <div class="row u-pv50">
    <div class="col-md-6 col-md-offset-3">

      <h2 class="u-mv20">Kayit Ol</h2>

      <div class="form-group form-fullwidth u-mb20">
        <label>Ad</label>
        <input type="text" class="form-input" value="" name="user.firstname" placeholder="i.e. John" />
      </div>

      <div class="form-group form-fullwidth u-mb20">
        <label>Soyad</label>
        <input type="text" class="form-input" value="" name="user.lastname" placeholder="i.e. Doe" />
      </div>

      <div class="form-group form-fullwidth u-mb20">
        <label>E-posta adresi</label>
        <input type="text" class="form-input" value="" name="user.email" placeholder="i.e. john@example.com" />
      </div>

      <div class="form-group form-fullwidth u-mb20">
        <label>Şifre</label>
        <input type="password" class="form-input" value="" name="user.password" placeholder="min. 8 characters" />
      </div>

      <div class="form-group form-fullwidth u-mb20">
        <label>Mahalle</label>
        <input type="text" class="form-input" value="" name="user.hood" placeholder="Start typing your mahalle..." />
      </div>

      <a href="javascript:void(0)" class="btn btn-primary u-floatright">KAYİT OL</i></a>

    </div>
  </div>

  <div class="row">
    <div class="col-md-6 col-md-offset-3 u-aligncenter u-pv20">
    
      <em>veya</em>
      <br />
      <br />

      <a href="" ng-click='login();' class="btn btn-facebook u-mr10"><i class="ion ion-social-facebook ion-15x"></i> CONNECT</a>
      <a href="javascript:void(0)" class="btn btn-twitter u-mr10"><i class="ion ion-social-twitter"></i> CONNECT</a>

    </div>
  </div>

</section>

@stop