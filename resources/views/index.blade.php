@extends('layouts.index')

 @section ('slider')
<section id="featured">
  <div class="marquee">
 		<!-- <p><strong>PT PLN APP Surabaya</strong>&nbsp;| JL. Ketintang Baru No 9 Surabaya 60231</p> -->
  </div>


      
<!--
  <div id="modalslide" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 id="mySigninModalLabel">{{ __('Login') }} to your <strong>account</strong></h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
      @csrf
        <div class="control-group">
          <label class="control-label" for="inputText">Nomor Slide</label>
          <div class="controls">
            <select class="form-control select2" style="width: 100%;" name="id_slide"  required="">
              <option selected="selected">Nomor Slide</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputText">Judul</label>
          <div class="controls">
            <input type="text" class="form-control" id="name" placeholder="Judul Slide" name="judul_slide" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputText">Isi</label>
          <div class="controls">
            <input type="text" class="form-control" id="name" placeholder="Isi Slide" name="isi_slide" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputText">Image</label>
          <div class="controls"> 
            <input type="file" id="input-file-now" class="dropify" required="" name="image_slide" />
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn">{{ __('Submit') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>-->
</section>


@endsection



 