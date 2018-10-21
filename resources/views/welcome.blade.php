<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Local News</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>
    <body>
    <div id="appendDivNews">
        <nav class="navbar fixed-top navbar-light bg-faded" style="background-color: #e3f2fd;">
          <a class="navbar-brand" href="#">Local News</a>
        </nav>

            {{ csrf_field() }}
<section id="content" class="section-dropdown">
<p class="select-header"> Select a news source: </p>
<label class="select"> 
    <select name="news_sources" id="news_sources">
    <option value="{{@$source_id}} : {{@$source_name}}">{{$source_name}}</option>
    @foreach ($news_sources as $news_source)
      <option value="{{$news_source['id']}} : {{$news_source['name'] }}">{{$news_source['name']}}</option>
    @endforeach
    </select>
</label>

 </section> 
<p> News Source : {{$source_name}}</p>
    <section class="news">
    @foreach($news as $selected_news)
    <article>
        <img src="{{$selected_news['urlToImage']}}" alt="" />
        <div class="text">
            <h1>{{$selected_news['title']}}</h1>
            <p style="font-size: 14px">{{$selected_news['description']}} <a href="{{$selected_news['url']}}" target="_blank"><small>read more...</small></a> </p>
            <div style="padding-top: 5px;font-size: 12px">Author: {{$selected_news['author'] or "Unknown" }}</div>
            @if($selected_news['publishedAt'] != null)
             <div style="padding-top: 5px;">Date Published: {{ Carbon\Carbon::parse($selected_news['publishedAt'])->format('l jS \\of F Y ') }}</div>
             @else
             <div style="padding-top: 5px;">Date Published: Unknown</div>

             @endif

        </div>
    </article>
    @endforeach
</section>
</div>

         </body>
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</html>