@extends('layouts.app')


@section('styles')
<style>
  blockquote{
  display:block;
  background: #fff;
  padding: 15px 20px 15px 45px;
  margin: 15px 0 20px;
  position: relative;

  /*Font*/
  font-family: Georgia, serif;
  font-size: 16px;
  line-height: 1.2;
  color: #666;
  text-align: justify;

  /*Borders - (Optional)*/
  border-left: 15px solid #4186c8;
  border-right: 2px solid #4186c8;

  /*Box Shadow - (Optional)*/
  -moz-box-shadow: 2px 2px 15px #ccc;
  -webkit-box-shadow: 2px 2px 15px #ccc;
  box-shadow: 2px 2px 15px #ccc;
}

blockquote::before{
  content: "\201C"; /*Unicode for Left Double Quote*/

  /*Font*/
  font-family: Georgia, serif;
  font-size: 30px;
  font-weight: bold;
  color: #999;

  /*Positioning*/
  position: absolute;
  left: 10px;
  top:5px;
}

blockquote::after{
  /*Reset to make sure*/
  content: "";
}

blockquote a{
  text-decoration: none;
  background: #eee;
  cursor: pointer;
  padding: 0 3px;
  color: #c76c0c;
}

blockquote a:hover{
 color: #666;
}

blockquote em{
  font-style: italic;
}

@if ($canEdit)
.editIcon{
  display:inline;
}
@else
.editIcon{
  display:none;
}
@endif
</style>
@endsection

@section('content')
  <div class="container profile m-t-25">
    @if ($canEdit)
      <h3>Click <i class="fa fa-pencil-square-o is-hover editIcon" aria-hidden="true"></i> to edit any part of this listing</h3>
    @endif
    @if(Session::has('status'))
          <p class="help is-danger is-font-16">{{ Session::get('status') }}</p>
    @endif
    @if(Session::has('success'))
          <p class="help is-success is-font-16">{{ Session::get('success') }}</p>
    @endif
          <div class="section profile-heading">
                  <div class="columns">
                          <div class="column is-2">
                                  <div class="image is-128x128 avatar">
                                          <i class="fa fa-pencil-square-o is-hover editIcon" id="editPicture"></i>
                                          <img src="{{asset($mainpic)}}">
                                  </div>
                          </div>
                          <div class="name">
                                  <p>
                                          <span class="title is-bold"><i class="fa fa-pencil-square-o is-hover editIcon" aria-hidden="true" id="editListingname"></i>{{ $info->breederName }}</span>

                                  </p>
                                  <p class="tagline"><i class="fa fa-pencil-square-o is-hover editIcon" aria-hidden="true" id="editBreedLocation"></i>{{ $info->breedName }} Breeder In {{ $info->city }},{{ $info->state_prefix }}</p>

                                    @if (!empty($info->about))
                                      <blockquote>
                                            <i class="fa fa-pencil-square-o is-hover editIcon" aria-hidden="true" id="editAbout"></i>{{ $info->about }}
                                      </blockquote>
                                    @endif

                          </div>
                          <div class="column is-2 followers has-text-centered">
                          </div>
                  </div>
          </div>
          <div class="profile-options">
                  <div class="tabs is-fullwidth">
                          <ul>
                                @if (!empty($info->url) || $canEdit)
                                  <li class="link main-border-bottom-color"><i class="fa fa-pencil-square-o is-hover editIcon" aria-hidden="true" id="editWeb"></i><a href="{{ $info->url }}" target="_blank" class="font-color-black"><span class="icon"><i class="fa fa-globe"></i></span> <span>Visit Website</span></a>
                                  </li>
                                @endif
                                  <li class="link main-border-bottom-color"><i class="fa fa-pencil-square-o is-hover editIcon" aria-hidden="true"></i><a class="font-color-black"><span class="icon"><i class="fa fa-envelope" id="editEmail"></i></span> <span>Send Email</span></a>
                                  </li>
                                  @if (!empty($info->phone) || $canEdit)
                                    <li class="link main-border-bottom-color"><i class="fa fa-pencil-square-o is-hover editIcon" aria-hidden="true"></i><a><span class="icon"><i class="fa fa-phone" id="editPhone"></i></span> <span>{{ $info->phone }}</span></a>
                                    </li>
                                  @endif

                          </ul>
                  </div>
          </div>


          <div class="spacer"></div>


          <div class="columns">
                  <div class="column is-3">
                      Availble/ Pictures

                  </div>

          </div>
  </div>


  <section class="m-t-75 m-l-100 m-r-100">
      <b-tabs type="is-boxed is-centered" v-model="activeTab">
          <b-tab-item label="Available {{ $info->breedName }}">
            @if ($canEdit)
              <a href="{{route('add-available',['url' => $thisurl])}}" class="button is-primary">Add For Sale</a>

            @endif
            <h1>Available {{ $info->breedName }}</h1>
          </b-tab-item>
          <b-tab-item label="{{ $info->breedName }} Pictures">
            @if ($canEdit)
              <button id="addPicture" class="button is-primary">Add Pictures</button>
            @endif
              <h1>{{ $info->breedName }} Pictures</h1>
          </b-tab-item>

      </b-tabs>
  </section>
  @if ($canEdit)
    @include('listings.edits')
  @endif

@endsection
@section('scripts')




  @if ($canEdit)
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
  $( document ).ready(function() {
            $( ".editIcon" ).show();

            $('.close-modal').click(function(e){
                e.preventDefault();
                $( ".modal" ).hide();
            });

            $('#editListingname').click(function(){
                $( "#listingnameEdit" ).toggle();
            });
            @if ($errors->has('listingname'))
              $( "#listingnameEdit" ).show();
            @endif
            $('#editBreedLocation').click(function(){
                $( "#breedLocationEdit" ).toggle();
            });
            @if ($errors->has('zipcode') || $errors->has('breed'))
              $( "#breedLocationEdit" ).show();
            @endif
            $('#editAbout').click(function(){
                $( "#aboutEdit" ).toggle();
            });
            @if ($errors->has('about'))
              $( "#aboutEdit" ).show();
            @endif
            $('#editWeb').click(function(){
                $( "#webEdit" ).toggle();
            });
            @if ($errors->has('url'))
              $( "#webEdit" ).show();
            @endif
            $('#editEmail').click(function(){
                $( "#emailEdit" ).toggle();
            });
            @if ($errors->has('email'))
              $( "#emailEdit" ).show();
            @endif
            $('#editPhone').click(function(){
                $( "#phoneEdit" ).toggle();
            });
            @if ($errors->has('phone'))
              $( "#phoneEdit" ).show();
            @endif
            $('#editPicture').click(function(){
                $( "#pictureEdit" ).toggle();
            });
            @if ($errors->has('photos'))
              $( "#pictureEdit" ).show();
            @endif

            $('#addPicture').click(function(){
                $( "#pictureAdd" ).toggle();
            });
            @if ($errors->has('pictures'))
              $( "#pictureAdd" ).show();
            @endif



            $('#setdefault').click(function(){
                if($('input[name="setdefault"]').is(':checked')){
                  $( ".non-default" ).prop('disabled',true);
                  $(" #newpicfile").hide();
                }else{
                  $(" #newpicfile").show();
                  $( ".non-default" ).prop('disabled',false);
                }
            });

            var max_fields = 10;
            var x = 1;
            $('.add_field_button').click(function(e) {
              e.preventDefault();
              if(x < max_fields){
                x++;
                if(x >= max_fields){
                  $('.add_field_button').hide();
                }
                $('.input_fields_wrap').append('<div class="control"><input class="file-input" type="file" name="pictures[]" /><a href="#" class="remove_field">Remove</a></div>')
              }
            });
            $('.input_fields_wrap').on("click",".remove_field",function(e){
              e.preventDefault();
              $(this).parent('div').remove();
              x--;
              if(x < max_fields){
                $('.add_field_button').show();
              }
            });

  });
  </script>
  @endif
  <script>

  var app = new Vue({
    el: '#app',
    data: {
      activeTab: 0,
    }
  });


(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-105694721-1', 'auto');
ga('send', 'pageview');

</script>
@endsection
