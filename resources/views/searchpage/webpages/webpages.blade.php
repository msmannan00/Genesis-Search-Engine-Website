<!--result-url-->
<div class="wp_result">
    @php
    $row_count=0
    @endphp
    @foreach($result as $rows)
        @php
            //if($row_count>=(constant::$pagination_limit-(($p_num+1)*constant::$pagination_limit-$result_count)))
            //{
            //    break;
            //}
            $searchQueryTitle = ucfirst($rows[keys::$title]);
            if(strlen($searchQueryTitle)>65)
            {
                $searchQueryTitle = substr($searchQueryTitle,constant::$zero,65)."...";
            }
            $searchQueryUrl = $rows[keys::$url];
            $searchQueryDescription = $rows[keys::$description];
            $webRedirection = $rows[keys::$redirection];
            $searchQueryDescription = substr($searchQueryDescription, constant::$zero, constant::$max_description_limit).'...';
            $searchQueryDescription = ucfirst(ltrim($searchQueryDescription));
            $row_count += 1;
        @endphp
        @if($s_type_selected=="all" && $result_count>0 && $p_num==0)

            @if ($row_count ==3 && sizeof($dlink)>0)
                <div class="wp_extra_image" id="info_container">

                    <p class="wp_extra_title">Images</p>
                    <hr class="wp_extra_divider">
                    </hr>
                    @foreach($dlink as $rows)
                        @php
                            $searchQueryUrl = $rows[keys::$dlink_url];
                        @endphp
                        <div class="wp_extra_item">
                            <a href="{{$searchQueryUrl}}"><img src="{{constant::$image_icon}}" class="wp_extra_item--icon"/></a>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (sizeof($news_extras)>0 && $row_count ==5)
                    <div class="wp_extra_info disable-highlight" id="info_container">
                        @php $counter=0; @endphp
                        <p class="wp_extra_info_title">News</p>
                        <hr ></hr>
                        @foreach($news_extras as $rows)
                            @php $counter++; @endphp
                            <a href="{{$rows[keys::$url]}}" style="outline: none;text-underline: grey;text-decoration:none;">
                            <div class="wp_extra_info_item"><p class="wp_extra_info_item--text">{{$rows[keys::$description]}}</div>
                            <p class="wp_extra_info_text"><i class="arrow right"></i></p>
                                @if($counter<3)
                                <hr class="wp_extra_info_divider"></hr></a>
                            @endif
                        @endforeach
                    </div>
            @endif
            @if (sizeof($finance_extras)>0 && $row_count ==7)
                    @php $counter=0; @endphp
                    <div class="wp_extra_info disable-highlight" id="info_container">

                        <p class="wp_extra_info_title">Finance</p>
                        <hr ></hr>
                        @foreach($finance_extras as $rows)
                                @php $counter++; @endphp
                                <a href="{{$rows[keys::$url]}}" style="outline: none;text-underline: grey;text-decoration:none;">
                                <div class="wp_extra_info_item"><p class="wp_extra_info_item--text">{{$rows[keys::$description]}}</div>
                                <p class="wp_extra_info_text"><i class="arrow right"></i></p>
                                @if($counter<3)
                                    <hr class="wp_extra_info_divider"></hr></a>
                                @endif
                        @endforeach
                    </div>
            @endif
        @endif
        <div class="wp_result__header--spacing-top" id="webcontent_border">
            <a href="{{ $webRedirection }}" class="wp_result__header disable-highlight" id="search_head">@php echo $searchQueryTitle; @endphp</a>
            <p class="wp_result__link disable-highlight" id="search_url">{{ $searchQueryUrl }}</p>
            <p class="wp_result__description disable-highlight" id="search_desc">{{$searchQueryDescription}}</p>
        </div>
    @endforeach

</div>

@if ($result_count>4)
 <!--pagination-->
        <form class="wp_pagination_view disable-highlight " id="dlpageination" style="margin-bottom:80px;margin-left:0px">
            @if ($result_count>0)
                <input type="button" onclick="window.location='/search?q={{ $query }}&p_num={{ $previous_page}}&s_type={{$s_type_selected}}'" class="wp_pagination__navigation wp_pagination--border-left" id="previous" value="Previous">
                <div class="wp_pagination_pages">
                    @for($counter = $nav_index; $counter < ($nav_index + constant::$dlink_navigation_limit) ; $counter++)
                        @if ($counter>=0)
                            <a href="/search?q={{ $query }}&&s_type={{$s_type_selected}}&p_num={{ $counter+1 }}" class=" @if($counter == $p_num) active @endif" >{{ $counter+1 }}</a>
                        @endif
                    @endfor
                </div>
                <input type="button" onclick="window.location='/search?q={{ $query }}&p_num={{ $next_page }}&s_type={{$s_type_selected}}'" class="wp_pagination__navigation wp_pagination--border-right wp_pagination__margin-right" id="next" value="Next">
            @endif
        </form>
    <!--pagination-->
@endif    