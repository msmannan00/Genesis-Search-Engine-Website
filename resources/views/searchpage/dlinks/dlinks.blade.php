<!--script initialization-->
@include('searchpage.dlinks.local_initialization')

<!--local php variables-->

<!--top bar-->
    <div class="main-container">
        @if ($result_count>0)
            <div style="display: inline-block;">
                <div class="content" >
                    @foreach($dlink as $rows)
                        @php
                            $searchQueryTitle = $rows[keys::$dlink_title];
                            $searchQueryUrl = $rows[keys::$dlink_url];
                            $searchExtension = $rows[keys::$dlink_extension];
                        @endphp

                        <a href="{{$searchQueryUrl}}">
                            <div class="content-container disable-highlight">
                                <div class="content__header"><div class="disable-highlight">{{$searchQueryTitle}}</div></div>
                                <p class="content__extension">{{$searchExtension}}</p>
                                <img src="{{$dlink_icon}}" class="content__image__icon"/>
                                <!--<p class="content__link disable-highlight">{{$searchQueryUrl}} </p>-->
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
<!--pagination-->
<!--footer-->
