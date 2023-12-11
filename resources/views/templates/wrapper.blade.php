<html>
    <head>
        <title>{{ config('app.name', 'Pterodactyl') }}</title>

        @section('meta')
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="robots" content="noindex">
            <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
            <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
            <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
            <link rel="manifest" href="/favicons/manifest.json">
            <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
            <link rel="shortcut icon" href="/favicons/favicon.ico">
            <meta name="msapplication-config" content="/favicons/browserconfig.xml">
            <meta name="theme-color" content="#0e4688">
            <link rel="stylesheet" href="/assets/enigma_christmas/style.css">
        @show

        @section('user-data')
            @if(!is_null(Auth::user()))
                <script>
                    window.PterodactylUser = {!! json_encode(Auth::user()->toVueObject()) !!};
                </script>
            @endif
            @if(!empty($siteConfiguration))
                <script>
                    window.SiteConfiguration = {!! json_encode($siteConfiguration) !!};
                </script>
            @endif
        @show
        <style>
            @import url('//fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap');
            @import url('//fonts.googleapis.com/css?family=IBM+Plex+Mono|IBM+Plex+Sans:500&display=swap');
        </style>

        @yield('assets')

        @include('layouts.scripts')
    </head>
    <body class="{{ $css['body'] ?? 'bg-neutral-50' }}">
        @section('content')
            @yield('above-container')
            @yield('container')
            @yield('below-container')
        @show
        @section('scripts')
            {!! $asset->js('main.js') !!}
        @show

        <link rel="stylesheet" href="/assets/enigma_christmas/style.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
        var snowmax=10;
        var snowcolor=new Array("#AAAACC","#DDDDFF","#CCCCDD","#F3F3F3","#F0FFFF","#FFFFFF","#EFF5FF")
        var snowtype=new Array("Arial Black","Arial Narrow","Times","Comic Sans MS");
        var snowletter="*";
        var sinkspeed=0.6; 
        var snowmaxsize=40;
        var snowminsize=8;
        var snowingzone=1;
        
        
        var snow=new Array();
        var marginbottom;
        var marginright;
        var timer;
        var i_snow=0;
        var x_mv=new Array();
        var crds=new Array();
        var lftrght=new Array();
        var browserinfos=navigator.userAgent;
        var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/);
        var ns6=document.getElementById&&!document.all;
        var opera=browserinfos.match(/Opera/);
        var browserok=ie5||ns6||opera;
        function randommaker(range) {
            rand=Math.floor(range*Math.random());
            return rand;
        }
        function initsnow() {
            if (ie5 || opera) {
                marginbottom=document.body.clientHeight;
                marginright=document.body.clientWidth;
            }
            else if (ns6) {
                marginbottom=window.innerHeight;
                marginright=window.innerWidth;
            }
            var snowsizerange=snowmaxsize-snowminsize;
            for (i=0;i<=snowmax;i++) {
                crds[i]=0;
                lftrght[i]=Math.random()*15;
                x_mv[i]=0.03+Math.random()/10;
                snow[i]=document.getElementById("s"+i);
                snow[i].style.fontFamily=snowtype[randommaker(snowtype/length)];
                snow[i].size=randommaker(snowsizerange)+snowminsize;
                snow[i].style.fontSize=snow[i].size+"px";
                snow[i].style.color=snowcolor[randommaker(snowcolor.length)];
                snow[i].sink=sinkspeed*snow[i].size/5;
                if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
                if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
                if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
                if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
                snow[i].posy=randommaker(2*marginbottom-marginbottom-2*snow[i].size);
                snow[i].style.left=snow[i].posx+"px";
                snow[i].style.top=snow[i].posy+"px";
            }
            movesnow();
        }
        function movesnow() {
            for(i=0;i<=snowmax;i++) {
                crds[i]+=x_mv[i];
                snow[i].posy+=snow[i].sink;
                snow[i].style.left=snow[i].posx+lftrght[i]*Math.sin(crds[i])+"px";
                snow[i].style.top=snow[i].posy+"px";
                if (snow[i].posy>=marginbottom-2*snow[i].size || parseInt(snow[i].style.left)>(marginright-3*lftrght[i])) {
                    if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
                    if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
                    if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
                    if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
                    snow[i].posy=0;
                }
            }
            var timer=setTimeout("movesnow()",50);
        }
        for (i=0;i<=snowmax;i++) {
            document.write("<span id='s"+i+"' style='position:absolute;top:-"+snowmaxsize+"px;'>"+snowletter+"</span>");
        }
        if (browserok) {
            window.onload=initsnow;
        }

        setInterval(() => {
            if($('.fNmetC')[0]) $('.fNmetC')[0].innerHTML = '<p class="kbxq2g-3 fNmetC">© 2015 - 2021&nbsp;<a rel="noopener nofollow noreferrer" href="https://pterodactyl.io" target="_blank" class="kbxq2g-4 hcJQtJ">Pterodactyl Software</a><br>Theme by <img style="height:14px;display:inline-block;" src="/assets/enigma_christmas/enigma_logo_t.png"> <a style="display:inline-block;" href="https://discord.gg/C5Ex7cJU5r" class="kbxq2g-4 hcJQtJ">Enigma prod.</a> <a style="display:inline-block;" href="https://icons8.com" class="kbxq2g-4 hcJQtJ">Icons: icons8.com</a</p>';
            if($('.fFcOT')[0]) $('.fFcOT')[0].innerHTML = '<p class="kbxq2g-3 fNmetC">© 2015 - 2021&nbsp;<a rel="noopener nofollow noreferrer" href="https://pterodactyl.io" target="_blank" class="kbxq2g-4 hcJQtJ">Pterodactyl Software</a><br>Theme by <img style="height:14px;display:inline-block;" src="/assets/enigma_christmas/enigma_logo_t.png"> <a style="display:inline-block;" href="https://discord.gg/C5Ex7cJU5r" class="kbxq2g-4 hcJQtJ">Enigma prod.</a> <a style="display:inline-block;" href="https://icons8.com" class="kbxq2g-4 hcJQtJ">Icons: icons8.com</a></p>';
        }, 500);
        </script>
    </body>
</html>
