@extends('layouts.app')
@section('content')
<div class="jumbotron about-jumbotron">
	<div class="container">
		<h1>Students and Faculty <span>Transformed</span>.</h1>
		<h1>Campuses <span>Renewed</span>.</h1>
		<h1>World Changers <span>Developed</span>.</h1>
	</div>
</div>
<div class="container-fluid">
	<div class="row text-center video">
		<div class="col-sm-6 col-sm-offset-3 text-center">
			<div class="row">
				<div class="col-lg-12 embed-responsive embed-responsive-16by9">
					<iframe src="https://www.youtube.com/embed/gMTRE2fTpWc?rel=0&amp;showinfo=0" allowfullscreen class="embed-responsive-item"></iframe>
				</div>
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-center core-values">
			<h1>Core Values</h1>
			<ul class="list-inline">
				<li>Scripture</li>
				<li>Worship</li>
				<li>Mission</li>
				<li>Diversity</li>
				<li>Justice</li>
				<li>Prayer</li>
				<li>Community</li>
			</ul>
		</div>
		<a href="http://intervarsity.org/about/our/our-purpose" target="_blank"><div class="col-sm-6 text-center boxes purpose">
			<h1>Our Purpose</h1>
			<i class="fa fa-graduation-cap"></i>
		</div></a>
		<a href="http://intervarsity.org/about/our/our-doctrinal-basis" target="_blank"><div class="col-sm-6 text-center boxes doctrine">
			<h1>What We Believe</h1>
			<i class="fa fa-cubes"></i>
		</div></a>
	</div>
</div>
@stop