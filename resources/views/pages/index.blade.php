@extends('layouts.app')
@section('content')
<div class="jumbotron home-jumbotron">
    <div class="container">
        <div class="title-wrapper">
            <span class="line-1"></span>
            <span class="line-2"></span>
            <h1>InterVarsity Gainesville</h1>
        </div>
        <i class="fa fa-angle-down bounce animated"></i>
    </div>
</div>
<div class="container-fluid">
    <div class="row info">
        <div class="col-md-10 col-md-offset-1 text-center info-wrapper">
            <h2>Jesus. Mission. Community.</h2>
            <h3>We are seeking to be a diverse community growing in God's love and giving every student a chance to respond to Jesus.</h3>
        </div>
    </div>
    <div class="row home-guide">
        <a href="/about"><div class="col-sm-4 boxes about">
            <h1>Who We Are</h1>
        </div></a>
        <a href="/smallgroups"><div class="col-sm-8 boxes small-group">
            <i class="fa fa-leaf"></i>
            <h1>Small Groups</h1>
        </div></a>
        <a href="http://intervarsity.org/blog"><div class="col-sm-7 boxes iv-usa-blog" target="_blank">
            <i class="fa fa-thumbs-o-up"></i>
            <h1>IV <span>Blog</span></h1>
        </div></a>
        <a href="/contact"><div class="col-sm-5 boxes contact">
            <i class="fa fa-laptop"></i>
            <h1>Contact</h1>
        </div></a>
    </div>
    <div class="row social-feed">
         <div class="col-md-12 instagram-wrapper">
            <div class="row" id="instafeed"></div> 
         </div>
         <div class="twitter-wrapper text-center col-md-8 col-md-offset-2"> 
             <div id="iv-tweets"></div>
         </div>
    </div>
</div>
<div class="container-fluid">
      <div class="row pre-footer text-center">
        <div class="col-sm-6">
          <h2>Want Updates on What's going on?</h2>
          <h3>Sign up here to hear about our events</h3>
        </div>
         <div class="col-sm-6">
          <form  action="//facebook.us7.list-manage.com/subscribe/post-json?u=8bdc1ef8ffa46f3c8fd9725fe&amp;id=9552a1c35c&c=?" method="GET" class="form-inline mailchimp-form">
          {{ csrf_field() }}
            <div class="form-group">
              <input type="email" class="form-control" name="EMAIL" id="mc-email" placeholder="Your Email" />
            </div>
            <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default text-center"><i class="fa fa-arrow-right text-center"></i></button>
          </form>
          <i class="fa fa-spinner fa-spin" id="load-image"></i>
          <h1 id="thanks-text">Thanks!</h1>
        </div>
          
        </div>
    </div>
@stop
@section('footer')
<script type="text/javascript">
     var feed = new Instafeed({ 
        get: 'user',
        sortBy: 'most-recent',
        limit: 4,
        resolution: 'standard_resolution',
        template: '<div class="col-sm-3 col-xs-6"><a href="@{{link}}" class="instagram-@{{orientation}}"><img src="@{{image}}"/></a></div>',
        userId: '3025865173', accessToken: '3025865173.8166f12.d046a506ebf54e00a68238e3108a5de8',
    });
    feed.run();

    var config1 = {
    "id": '705511869050531841',
    "domId": 'iv-tweets',
    "maxTweets": 4,
    "showImages": false,
    "enableLinks": true,
    "showUser": true,
    };
    twitterFetcher.fetch(config1);
    function populateTpl(tweets){
    console.log(tweets);
    }
</script>
@stop
