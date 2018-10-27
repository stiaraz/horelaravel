@extends('layouts.index')

 @section ('slider')
<section id="featured">

 		<!-- <p><strong>PT PLN APP Surabaya</strong>&nbsp;| JL. Ketintang Baru No 9 Surabaya 60231</p> -->
    <div class="container">
        <div class=".col-md-6">
      <img src="http://10.151.33.16:5000/calc" width="420" height="350">
      <!-- <iframe width="420" height="350" src="//www.youtube.com/embed/9GZVbDDcW6Q" frameborder="2px"allowfullscreen style="margin-right: 30px;"></iframe> -->
    </div>
    <div class=".col-md-4 .col-md-offset-4">
                                    <h5 class="m-t-10 m-b-10">Pilih Tempat</h5>
                                    <select class="selectpicker" data-style="form-control">
                                        <optgroup label="Lokasi Informatika">
                                            <option>KCV</option>
                                            <option>Plasa Lama</option>
                                            
                                        </optgroup>
                                        <optgroup label="Luar Informatika">
                                            <option>Parkiran</option>
                                            <option>parkiran Motor</option>
                                            
                                        </optgroup>
                                    </select>
                                    <button class="btn btn-success btn-rounded" type="submit">Submit</button>
                                </div>
  
</div>
</section>


@endsection



 