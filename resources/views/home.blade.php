@extends('layouts.app')

@section('title')Головна@endsection

@section('link')
<link rel="stylesheet" href="/css/tour.css">
@endsection

@section('content')
<style>

    .img_block{
        position: relative;
        z-index:-1;
    }
    .img_text{
        text-shadow: 5px 4px 2px rgba(0,0,0,0.3);
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
        font-size:120px; 
        user-select:none;
    }
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
    <div class="img_block">
        <img src="/image.jpg" alt="" style="width:100%; height:500px; object-fit: cover;">
        <div class="img_text">HistoryCamp</div>
    </div>
    <div style="background:rgba(133,255,17,0.2); position:relative;">
        <div class="container">
            <div style="text-align:center; font-size:60px; padding-top:100px;">
                <h1 style="font-size:80px; font-weight:bold;">HistoryCamp</h1> - сайт з історичними турами.
            </div>
            <br>
            <hr style="width:100px; margin:0 auto; height:2px;">
            <div style="text-align:center; font-size: 50px; color:rgba(0,43,122,0.6); padding-bottom:30px;">
                Подорожуй, та знай історію своєї України.
            </div>
        </div>   
    </div>
    <div class="container" style="text-align:center;">
        <h1 style="font-size:40px; margin-top:20px; text-align:left;">Популярні тури</h1>
        @forelse ($data as $el)
        <a href="{{ route('tour-id-page', ['id' => $el->id]) }}" style="text-decoration:none; color:black;">
        <div class="my-2 mx-auto p-relative bg-white shadow-1 blue-hover" style="width: 310px; min-height:550px; overflow: hidden; border-radius: 1px; display: inline-block; text-align:left;">
            @isset($images[$el->id])
            <img style="height:300px; max-width:100%; object-fit: cover;" src="{{ URL::asset($images[$el->id]) }}" alt="" class="d-block w-full">
            @else
            <img style="opacity:0.6; height:300px;" src="https://img.icons8.com/ios-filled/250/000000/no-image.png" alt="" class="d-block w-full">
            @endisset
            <div class="px-2 py-2">
                <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
                    Travel
                </p>
                @isset($rating[$el->id])
                <div>
                @if($rating[$el->id] == 0)
                    <span class="bi bi-star-fill" style="color:orange;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" style="color:orange;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" style="color:orange;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" style="color:orange;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" style="color:orange;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                @else
                    <span class="bi bi-star-fill" {{ ($rating[$el->id] >= 1) ? 'style=color:orange;' : 'style=color:gray;' }} ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($rating[$el->id] >= 2) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($rating[$el->id] >= 3) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($rating[$el->id] >= 4) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($rating[$el->id] >= 5) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                @endif
                </div>
                @endisset
                <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
                {{ $el->name }}
                </h1>
                <p class="mb-1">
                {{ $el->short_description }}&hellip;
                </p>
            </div>
        </div>
        </a>
        @empty
            <p class="d-flex justify-content-center" style="font-size:28px;">турів не знайдено</p>
        @endforelse
    </div>
    <div style="">
    <div class="container">
        <h1 style="font-size:40px; padding-top:20px; padding-bottom:10px">Останні новини сайту</h1>
        <div style="text-align:center; display:block;">
        @forelse($news as $row)        
            <div class="" style="width:300px; display:inline-block;">
            <div class="single-blog-item">
                        <div class="blog-thumnail" style="background-color:white;">
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
                <p>Новини відсутні</p>
        @endforelse
        </div>
        <div style="padding-bottom:30px;"></div>
    </div>
    </div>
@endsection