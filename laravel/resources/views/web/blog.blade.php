@extends('master.frontapp')
@section('content')
<title>Blog</title>

<link href="{{ asset('assets/css/blog-post.css') }}" rel="stylesheet">

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$blogs->title}}</h1>

            <!-- Author -->
            <!-- <p class="lead">
                by <a href="#">Start Bootstrap</a>
            </p> -->

            <hr>

            <!-- Date/Time -->
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> Posted on <?php echo date_format($blogs->created_at,'F d, Y \a\t h:i A'); ?></p>

            <hr>

            <!-- Preview Image -->
            <div class="blog-img">
                <img class="img-responsive" src="{{$blogs->image}}" style="margin:auto;">
            </div>

            <hr>

            <!-- Post Content -->
            <div class="lead">
                <?php echo nl2br($blogs->description) ?>
            </div>
            <?php echo nl2br($blogs->content) ?>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" method="POST" action="#" id="subcomment">
                    <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
                    <div class="form-group">
                        <div class="validcomment" style="color:red;"></div>
                        <textarea class="form-control" rows="3" style="border:1px solid #ccc;" name="content" id="inputcontent"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="postment">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <?php if(count($comments) == 0) {?>
                There is no Comment
            <?php } else {?>
            @foreach($comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="{{$comment->photo}}" style="max-height:64px;max-width:64px;">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->name}}
                        <small><?php echo date_format($comment->created_at,'F d, Y \a\t h:i A'); ?></small>
                    </h4>
                    {{$comment->comment}}
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>
            @endforeach
            <?php } ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog List</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled">
                            <br>
                            @foreach($getblogs as $getall)
                            <li>
                                <a href="{{url('blog/'.$getall->url)}}">{{$getall->title}}</a><br>
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date_format($getall->created_at,'F d, Y \a\t h:i A'); ?>
                            </li>
                            <br>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <!-- <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div> -->

        </div>

    </div>
    <!-- /.row -->

    <hr>

</div>
<!-- /.container -->

<script type="text/javascript">
    function postment(){
        var content = $('.inputcontent').val();

    }
</script>

@stop
