<div class="breadcrumb-area">
    <h1>
        <a href="{{url("/home")}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Dashboard">
            <i class='bx bx-home-alt'></i>
        </a>
    </h1>
        <ol class="breadcrumb">
<?php $link = "" ?>
@for($i = 1; $i <= count(Request::segments()); $i++)
    @if($i < count(Request::segments()) & $i > 0)
    <?php $link .= "/" . Request::segment($i); ?>
    <li class="item">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</li>
    @else <li class="item">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</li>
    @endif
@endfor
    </ol>
</div>
    