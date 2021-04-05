@extends('layouts.app')

@section('title')Всі новини@endsection

@section('content')
<style>
img {
	width: 100%;
	height: auto;
}
.single-blog-item {
  border: 1px solid #dfdede;
  box-shadow: 2px 5px 10px #dfdede;
  margin: 15px auto;
  padding: 5px;
  position: relative;
}
.blog-content {
  padding: 15px;
}
.blog-content h4 {
  font-size: 16px;
  font-weight: 500;
  margin-bottom: 10px;
  text-transform: uppercase;
}
.blog-content h4 a{
	color:#777;
	}
.blog-content p{
  color: #999;
  font-size: 14px;
  font-weight: 300;
  line-height: 1.3333;
}
.blog-date{
	}
.blog-date {
    position: absolute;
	  background: #337ab7;
    top: 35px;
    left: 5px;
    color: #fff;
    border-radius: 0 25px 25px 0;
    padding: 5px 15px;
    font-weight: 700;
}
.more-btn {
  background: #337ab7;
  border-radius: 2px;
  display: block;
  height: 30px;
  line-height: 30px;
  margin: 30px auto auto auto;
  text-align: center;
  width: 110px;
  color: #f1f1f1;
}
</style>
<script src="https://raw.github.com/marcoscaceres/jsi18n/master/jsi18n_patch.js">
</script>
    <div class="container" style="margin-top: 5rem !important;">
    @auth('admin')
    <h2 style="text-align:center; margin:20px; color:rgba(220,50,60, 0.6);">Щоб редагувати пост, виберіть його і там будуть кнопки "Редагувати|Вилучити"</h2>
    @endauth
    <div style="text-align:center; display:block;">
    @forelse($data as $row)        
        <div class="" style="width:400px; display:inline-block;">
           <div class="single-blog-item">
                    <div class="blog-thumnail">
                    @isset($row->picture)
                        <img src="data:image/png;base64,{{ chunk_split(base64_encode($row->picture)) }}" class="" style="object-fit: cover; height:250px;">
                        @else
                        <img style="opacity:0.6; object-fit: cover; height:250px;" src="https://img.icons8.com/ios-filled/250/000000/no-image.png" alt="">
                    @endisset
                    </div>
                    <div class="blog-content">
                        <h4>{{ $row->title }}</h4>
                        <div class="showme">
                        </div>
                        <a style="text-decoration:none;" href="{{ route('news-post', ['id' => $row->id]) }}" class="more-btn">Детальніше</a>
                    </div>
                    <span class="blog-date" id='date{{ $loop->index }}'><?php echo (strtotime($row->date_create)); ?></span>
                </div>
         </div>
         <script>
            var date = new Date("{{$row->date_create}}");
            options = {"year":"numeric","month":"short","day":"2-digit"};
            document.getElementById('date{{$loop->index}}').textContent = date.toLocaleDateString("uk", options);
        </script>
    @empty
            <p>Постів немає</p>
    @endforelse
    </div>
    </div>
@endsection