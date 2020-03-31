@extends('layouts/app')

@section('script')
<script>
var post_id ={{ $id }};
$(function(){
 $.getJSON('/api/posts/' + post_id, function(data){
   $('#title').html(data.title);
   $('#body').html(data.text);
   $('#body').append('<hr>'+ data.created_at)
 });
});
</script>
@endsection

@section('content')
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="card">
        <div class="card-header" id="title">Title</div>

        <div class="card-body" id="body">
        </div>

  </div>

</div>


@endsection
