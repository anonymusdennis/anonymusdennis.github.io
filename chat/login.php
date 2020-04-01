<?php
session_start();
?>
<style>
    #name{
        color:unset;
        position:relative;
        left: calc(50% - 220px);
        width:440px;
        top:60px;
    }

    html {
        font-family: sans-serif;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%
    }

    body {
        margin: 0
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    nav,
    section,
    summary {
        display: block
    }

    audio,
    canvas,
    progress,
    video {
        display: inline-block;
        vertical-align: baseline
    }


    .container {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto
    }


    * {
        font-family: Arial, Verdana, sans-serif;
        text-decoration: none;
        font-size: 14px;

    }


    #wrapper {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        margin: 0;
        padding: 0;
        border: 0
    }



    body,
    html {
        width: 100%;
        height: 100%;
        margin: 0
    }

    body {
        -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        -moz-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        -webkit-perspective: 1400px;
        -moz-perspective: 1400px;
        perspective: 1400px;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d;
        background-color: transparent
    }

    .form-wrapper {
        position: absolute;
        z-index: -1
    }

    .form-wrapper #searchbar {
        width: 85%;
        height: 50px;
        float: left;
        font-weight: lighter;
        font-style: normal;
        font-variant: normal;
        font-stretch: normal;
        font-size: 20px;
        line-height: normal;
        font-family: 'lucida sans', 'trebuchet MS', Tahoma;
        border: none!important;
        background: #fff!important;
        border-radius: 0
    }

    .form-wrapper #searchbar:focus {
        outline: 0;
        border-color: #aaa;
        box-shadow: #bbb 0 1px 1px inset
    }

    .form-wrapper #submit {
        border: none;
        height: 25px;
        margin-top: 14px;
        width: 40px;
        cursor: pointer;
        margin-left: -50px;
        background: url(search-icon.png) no-repeat center center;
        background-size: contain
    }

    .form-wrapper #submit:active {
        outline: 0;
        box-shadow: rgba(0, 0, 0, .498039) 0 1px 4px inset
    }

    html {
        font-family: sans-serif
    }

    body {
        margin: 0
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    menu,
    nav,
    section,
    summary {
        display: block
    }

    audio,
    canvas,
    progress,
    video {
        display: inline-block;
        vertical-align: baseline
    }

    audio:not([controls]) {
        display: none;
        height: 0
    }

    [hidden],
    template {
        display: none
    }

    body,
    html {
        height: 100%;
        overflow: hidden;
        background: #eee
    }

    .landscape {
        position: absolute;
        height: 100%;
        width: 100%;
        overflow: hidden;
        left: 0;
        background: #0e1c2b;
        z-index: -1
    }

    .moon {
        position: absolute;
        left: 56%;
        bottom: 90px;
        width: 350px;
        height: 350px;
        margin: 0 0 0 -50px;
        border-radius: 50%;
        background: #ccc;
        animation-name: moon-move;
        animation-duration: 6s
    }

    .moon::after {
        top: 90px;
        left: 100px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        box-shadow: rgba(0, 0, 0, .0980392) 120px 80px 0, rgba(0, 0, 0, .0980392) 100px -60px 0 -20px, rgba(0, 0, 0, .0980392) -70px 40px 0 -20px, rgba(0, 0, 0, .0980392) -20px -50px 0 -15px, rgba(0, 0, 0, .0980392) -20px 120px 0 -15px, rgba(0, 0, 0, .0980392) 50px 50px 0 -15px;
        background: rgba(0, 0, 0, .0980392)
    }

    @keyframes moon-move {
        0% {
            bottom: -250px
        }
        100% {
            bottom: 90px
        }
    }

    .tree {
        position: absolute;
        left: 50%;
        bottom: 0;
        margin: 0 0 0 -742px
    }

    .tree div {
        position: relative;
        float: left;
        display: block;
        width: 6px;
        height: 8px;
        margin: 0 30px -5px 0;
        background: #eee
    }

    .tree div::before {
        bottom: 8px;
        border-style: solid;
        border-color: transparent transparent #eee;
        content: ' ';
        height: 0;
        width: 0;
        position: absolute;
        border-width: 12px;
        left: 50%;
        margin-left: -12px
    }

    .tree div::after {
        bottom: 15px;
        border-style: solid;
        border-color: transparent transparent #eee;
        content: ' ';
        height: 0;
        width: 0;
        position: absolute;
        border-width: 10px;
        left: 50%;
        margin-left: -10px
    }

    .tree div span::before {
        bottom: 22px;
        border-style: solid;
        border-color: transparent transparent #eee;
        content: ' ';
        height: 0;
        width: 0;
        position: absolute;
        border-width: 8px;
        left: 50%;
        margin-left: -8px
    }

    .tree div span::after {
        bottom: 28px;
        border-style: solid;
        border-color: transparent transparent #eee;
        content: ' ';
        height: 0;
        width: 0;
        position: absolute;
        border-width: 6px;
        left: 50%;
        margin-left: -6px
    }

    .hills {
        position: absolute;
        left: 50%;
        bottom: 0
    }

    .hills div {
        overflow: hidden;
        border-radius: 8%;
        transform: rotate(45deg)
    }

    .hills div:nth-child(1),
    .hills div:nth-child(2),
    .hills div:nth-child(3) {
        position: absolute;
        bottom: -350px;
        width: 500px;
        height: 500px;
        background: #223548
    }

    .hills div:nth-child(1) {
        left: -750px
    }

    .hills div:nth-child(2) {
        left: -250px
    }

    .hills div:nth-child(3) {
        left: 250px
    }

    .hills div:nth-child(4),
    .hills div:nth-child(5) {
        position: absolute;
        bottom: -400px;
        left: -600px;
        width: 500px;
        height: 500px;
        background: #506479
    }

    .hills div:nth-child(4) {
        left: -500px
    }

    .hills div:nth-child(5) {
        left: 0
    }

    canvas {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1
    }

    .gwd-div-j0it {
        -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        -moz-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d
    }

    .gwd-body-nsch {
        width: 100%;
        height: 100%
    }

    .gwd-div-qba7 {
        -webkit-transform: translate3d(164.75px, -291px, 0);
        -moz-transform: translate3d(164.75px, -291px, 0);
        transform: translate3d(164.75px, -291px, 0);
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d
    }

    .searchform {
        position: relative;
        left: 50%
    }

    .gwd-body-2t9x {
        background-image: none;
        background-color: #eee
    }

    .links {
        position: relative;
        top: 2px;
        left: 21px;
        z-index: -1
    }

    a.link {
        color: #234;
        padding-right: 15px;
        text-decoration: none;
        font-size: 16px
    }

    .toolbar {
        position: absolute;
        width: 100%;
        height: 80px;
        top: 0;
        left: 0;
        z-index: 1;
        padding: 10px
    }

    .left {
        float: left;
        width: 20%
    }

    .right {
        float: right;
        width: 20%;
        height: 80px
    }

    .container {
        width: 190px;
        text-align: center;
        margin-top: 10px;
        float: right;
        background-color: #fff;
        margin-right: 10px;
        padding: 10px;
        border-radius: 5px
    }

    .box {
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        width: 320px;
        margin: 0 auto;
        background: #fff;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .16), 0 3px 6px rgba(0, 0, 0, .23);
        border-radius: 3px
    }

    #daymonthyear {
        font-size: 16px;
        color: #234;
        border-top: 1px solid #ccc;
        padding-top: 7px
    }

    #hourminutesecond {
        font-size: 50px;
        color: #234;
    }
</style>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<form id ="name" style="z-index:200" method="POST" name="input" style="float:none !important; padding:unset !important; margin:unset !important; width:unset;" action="index.php">
    <p style="text-align: center;"><h1 style="color:white; text-align: center; font-size:2em;">F&uuml;r Chat Anmelden:</h1></p><br>
    <input onClick="this.setSelectionRange(0, this.value.length)" name="user" type="text" id="account" placeholder="Benutzer" autocomplete="username" value="Gast">
    <input onClick="this.setSelectionRange(0, this.value.length)" name="password" type="password" id="password" placeholder="Passwort" autocomplete="current-password" value="passwort">
    <button type="submit">Anmelden</button></form>
<div id="wrapper">
    <div id="content-wrapper">
        <div class="landscape">
            <div class="moon"></div>
            <div class="hills">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="tree">
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
                <div>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <canvas id="cvs"></canvas>
</div>
<script>
    /*! simpleWeather v3.1.0 - http://simpleweatherjs.com */ ! function(t) {
        "use strict";

        function e(t, e) {
            return "f" === t ? Math.round(5 / 9 * (e - 32)) : Math.round(1.8 * e + 32)
        }
        t.extend({
            simpleWeather: function(i) {
                i = t.extend({
                    location: "",
                    woeid: "",
                    unit: "f",
                    success: function(t) {},
                    error: function(t) {}
                }, i);
                var o = new Date,
                    n = "https://query.yahooapis.com/v1/public/yql?format=json&rnd=" + o.getFullYear() + o.getMonth() + o.getDay() + o.getHours() + "&diagnostics=true&callback=?&q=";
                if ("" !== i.location) {
                    var r = "";
                    r = /^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$/.test(i.location) ? "(" + i.location + ")" : i.location, n += 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="' + r + '") and u="' + i.unit + '"'
                } else {
                    if ("" === i.woeid) return i.error("Could not retrieve weather due to an invalid location."), !1;
                    n += "select * from weather.forecast where woeid=" + i.woeid + ' and u="' + i.unit + '"'
                }
                return t.getJSON(encodeURI(n), function(t) {
                    if (null !== t && null !== t.query && null !== t.query.results && "Yahoo! Weather Error" !== t.query.results.channel.description) {
                        var o, n = t.query.results.channel,
                            r = {},
                            s = ["N", "NNE", "NE", "ENE", "E", "ESE", "SE", "SSE", "S", "SSW", "SW", "WSW", "W", "WNW", "NW", "NNW", "N"],
                            a = "https://s.yimg.com/os/mit/media/m/weather/images/icons/l/44d-100567.png";
                        r.title = n.item.title, r.temp = n.item.condition.temp, r.code = n.item.condition.code, r.todayCode = n.item.forecast[0].code, r.currently = n.item.condition.text, r.high = n.item.forecast[0].high, r.low = n.item.forecast[0].low, r.text = n.item.forecast[0].text, r.humidity = n.atmosphere.humidity, r.pressure = n.atmosphere.pressure, r.rising = n.atmosphere.rising, r.visibility = n.atmosphere.visibility, r.sunrise = n.astronomy.sunrise, r.sunset = n.astronomy.sunset, r.description = n.item.description, r.city = n.location.city, r.country = n.location.country, r.region = n.location.region, r.updated = n.item.pubDate, r.link = n.item.link, r.units = {
                            temp: n.units.temperature,
                            distance: n.units.distance,
                            pressure: n.units.pressure,
                            speed: n.units.speed
                        }, r.wind = {
                            chill: n.wind.chill,
                            direction: s[Math.round(n.wind.direction / 22.5)],
                            speed: n.wind.speed
                        }, n.item.condition.temp < 80 && n.atmosphere.humidity < 40 ? r.heatindex = -42.379 + 2.04901523 * n.item.condition.temp + 10.14333127 * n.atmosphere.humidity - .22475541 * n.item.condition.temp * n.atmosphere.humidity - 6.83783 * Math.pow(10, -3) * Math.pow(n.item.condition.temp, 2) - 5.481717 * Math.pow(10, -2) * Math.pow(n.atmosphere.humidity, 2) + 1.22874 * Math.pow(10, -3) * Math.pow(n.item.condition.temp, 2) * n.atmosphere.humidity + 8.5282 * Math.pow(10, -4) * n.item.condition.temp * Math.pow(n.atmosphere.humidity, 2) - 1.99 * Math.pow(10, -6) * Math.pow(n.item.condition.temp, 2) * Math.pow(n.atmosphere.humidity, 2) : r.heatindex = n.item.condition.temp, "3200" == n.item.condition.code ? (r.thumbnail = a, r.image = a) : (r.thumbnail = "https://s.yimg.com/zz/combo?a/i/us/nws/weather/gr/" + n.item.condition.code + "ds.png", r.image = "https://s.yimg.com/zz/combo?a/i/us/nws/weather/gr/" + n.item.condition.code + "d.png"), r.alt = {
                            temp: e(i.unit, n.item.condition.temp),
                            high: e(i.unit, n.item.forecast[0].high),
                            low: e(i.unit, n.item.forecast[0].low)
                        }, "f" === i.unit ? r.alt.unit = "c" : r.alt.unit = "f", r.forecast = [];
                        for (var m = 0; m < n.item.forecast.length; m++) o = n.item.forecast[m], o.alt = {
                            high: e(i.unit, n.item.forecast[m].high),
                            low: e(i.unit, n.item.forecast[m].low)
                        }, "3200" == n.item.forecast[m].code ? (o.thumbnail = a, o.image = a) : (o.thumbnail = "https://s.yimg.com/zz/combo?a/i/us/nws/weather/gr/" + n.item.forecast[m].code + "ds.png", o.image = "https://s.yimg.com/zz/combo?a/i/us/nws/weather/gr/" + n.item.forecast[m].code + "d.png"), r.forecast.push(o);
                        i.success(r)
                    } else i.error("There was a problem retrieving the latest weather information.")
                }), this
            }
        })
    }(jQuery);

    function Drop() {
        this.x, this.y, this.radius, this.distance, this.color, this.speed, this.vx, this.vy
    }

    function draw_frame() {
        ctx.clearRect(0, 0, width, height), collection.forEach(function(t) {
            ctx.globalAlpha = (t.distance + 1) / 10, t.draw(ctx), ctx.globalAlpha = 1, t.x += t.vx, t.y += t.vy;
            var i = t.vx + windforce;
            i < maxspeed && i > 1 - maxspeed && (t.vx = i), t.y > (t.distance + 1) / 10 * height && (t.y = Math.random() * -t.radius * (num_drops / 10), t.x = t.random_x()), t.x > width * (1 + gutter) && (t.x = 1 - width * gutter), t.x < 1 - width * gutter && (t.x = width * (1 + gutter))
        })
    }

    function animate() {
        requestAnimFrame(animate), draw_frame()
    }

    function windtimer() {
        windforce = Math.random() > .5 ? windmultiplier : -windmultiplier, setTimeout(windtimer, 3e4 * Math.random())
    }

    function init() {
        for (collection = []; num_drops--;) {
            var t = new Drop;
            t.color = "rgba(255, 255, 255, 0.5)", t.distance = 10 * Math.random() | 0, t.speed = Math.random() * (t.distance / 10) + gravity, t.vx = 0, t.vy = Math.random() * t.speed + t.speed / 2, t.radius = (t.distance + 1) / 16 * 3, t.x = t.random_x(), t.y = Math.random() * height, collection.push(t)
        }
        windtimer(), animate(), window.onresize = function() {
            height = canvas.height = document.body.offsetHeight, width = canvas.width = document.body.offsetWidth
        }
    }
    window.requestAnimFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(t) {
        window.setTimeout(t, 1e3 / 60)
    };
    var canvas = document.getElementById("cvs"),
        ctx = canvas.getContext("2d"),
        height = canvas.height = document.body.offsetHeight,
        width = canvas.width = document.body.offsetWidth,
        collection = [],
        num_drops = 700,
        gravity = .8,
        windforce = 1,
        windmultiplier = 0,
        maxspeed = 5,
        gutter = 0;
    Drop.prototype = {
        constructor: Drop,
        random_x: function() {
            var t = width * (1 + gutter);
            return 1 - (1 + gutter) + Math.random() * t
        },
        draw: function(t) {
            t.fillStyle = this.color, t.beginPath(), t.arc(this.x, this.y, this.radius, 0, 2 * Math.PI, !1), t.closePath(), t.fill()
        }
    }, init();
    document.querySelector(".landscape").setAttribute("height", window.height + "px;");
    document.querySelector(".landscape").setAttribute("style", "height:" + window.height + "px;");
</script>