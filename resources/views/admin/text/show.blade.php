@extends('admin.moban')
@section('cc')

<div id="text"></div>
<script src="js/jquery-3.4.1.js"></script>
<script>
document.getElementById('text').innerHTML='{!!$data!!}'
</script>
@endsection