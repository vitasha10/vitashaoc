<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Виташа OC</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
    <style>
        *{
            padding:0;
            margin:0;
            font-family: 'Nunito', sans-serif;
        }
        main{
            background-repeat: no-repeat;
            -moz-background-size: 100%; /* Firefox 3.6+ */
            -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
            -o-background-size: 100%; /* Opera 9.6+ */
            background-size: 100%; /* Современные браузеры */
            height:93vh;
        }
        footer{
            position:fixed;
            height:7vh;
            width:100%;
            background-color:#0f2e3b;
            color:;
            z-index:-1;
        }
        #pusk{
            height:7vh;
            width:10vh;
            background:#1a3e55;
            color:#e8534f;
            border:1vh;
            border-style:none;
        }
        #clock{
            background:#1a3e55;
            color:#eb6626;
            padding:0 2vh 0 2vh;
            height:7vh;
            line-height:7vh;
            width:auto;
            float:right;
        }
        #puskdiv{
            display:none;
            position:fixed;
            background-color:#1a3e55;
            position:overflow;
            z-index:5;
            height:93vh;
            width:135vh;
        }
        #optionsdiv{
            display:none;
            position:fixed;
            background-color:#11a9dd;
            position:overflow;
            z-index:4;
            height:93vh;
            width:100%;
        }
        h2{
            padding:5vh 0 5vh 5vh;
            color:#e8534f;
        }
        #close{
            float:right;
            position:owerflow;
            padding:1vh 3vh 1vh 3vh;
            background:red;
            color:black;
            border-style:none;
        }
        #options{
            height:7vh;
            width:20vh;
            background:#0f2e3b;
            color:#e8534f;
            border:1vh;
            border-style:none;
        }
        #about{
            display:none;
            position:fixed;
            background-color:#11a9dd;
            position:overflow;
            z-index:4;
            height:93vh;
            width:100%;
        }
        #vitashaoc{
            float:right;
            position:owerflow;
            background:#0f2e3b;
            height:93vh;
            width:93vh;
        }
        #vitashaocp{
            text-align:center;
            padding:1vh 0 3vh 1vh;
            color:#e8534f;
        }
        .myphoto{
            display:block;
            height:25vw;
            width:25vw;
            border-radius:50%;
            margin:0 auto;
        }
        iframe{
            display:block;
            height:93vh;
            width:100%;
        }
        #brouser{
            display:none;
            position:fixed;
            background-color:#11a9dd;
            position:overflow;
            z-index:4;
            height:93vh;
            width:100%;
        }
        
    </style>
</head>
<body>
    <main>
        <div id="puskdiv">
            <button id="options" onclick='pusk(); setTimeout(options, 500);'>Настройки</button>
            <button id="options" onclick='pusk(); setTimeout(about, 500);'>Справка</button>
            <div id='vitashaoc'>
                <h2>Виташа OC</h2>
                <p id='vitashaocp'>Это веб операционка от Виташи :)</p>
            
                <img class="myphoto" src="https://sun9-67.userapi.com/c855024/v855024444/fb96a/Shn0aoyLZ8M.jpg" alt="myphoto">
                <h2>Версия 1.0.0:105</h2>
            </div>
        </div>
        <div id="brouser">
            <!--<iframe src="http://vitaliys.tk/" frameborder="0"></iframe>-->
            
            
        </div>
        <div id="optionsdiv">
            <button id='close' onclick='options()'>X</button>
            <h2>Настройки:</h2>
            <textarea name="" id="backgroundtextarea" cols="30" rows="10"></textarea>
            <button onclick='backgroundImage()'>Обновить</button>
            <button onclick='oldbg()'>Установить стандартное</button>
        </div>
        <div id="about">
            <button id='close' onclick='about()'>X</button>
            <h2>Маленькая справка:</h2>
            <p>Это онлайн OC от Виталий, я сделал её просто так, по приколу, чтобы отточить некоторые знания в js и php.</p>
        </div>
    </main>
    <footer>
        <button id='pusk' onclick='setTimeout(pusk, 100)'>Пуск</button>
        <div id="clock">TIME</div>
    </footer>
    <script>
    function notice(text){
        alert(text);
    }
    $.ajax({
        type: "POST",
        url: "bgimage.php",
        dataType: 'text',
        data: {link: "text"},
        success: function(data){
            var inputValue = document.getElementById('backgroundtextarea').value;
            $("main").css("background-image", "url("+data+")")
        }
    })
    var timeNode = document.getElementById('clock');
    function getCurrentTimeString() {
        return new Date().toTimeString().replace(/ .*/, '');
    }
    setInterval(
        () => timeNode.innerHTML = getCurrentTimeString(),
        1000
    );
    function pusk(){
        $("#puskdiv").toggle();
    }
    function options(){
        $("#puskdiv").hide();
        $("#optionsdiv").toggle();
    }
    function about(){
        $("#puskdiv").hide();
        $("#about").toggle();
    }
    document.onkeydown = function(e) {
        e = e || window.event;
        if (e.shiftKey && e.keyCode == 91) {
            pusk();
        }
        if (e.shiftKey && e.keyCode == 115) {
            pusk();
        }
    }
    function backgroundImage(){
        var inputValue = document.getElementById('backgroundtextarea').value;
        $("main").css("background-image", "url("+inputValue+")")
        $.ajax({
            type: "POST",
            url: "newbgimage.php",
            dataType: 'text',
            data: {link: inputValue},
            success: function(data){
                notice("ФОН СИНХРОНИЗИРОВАН!");
            }
        })
    }
    function oldbg(){
        $("main").css("background-image", "url(http://oboi-dlja-stola.ru/file/14626/760x0/16:9/windows-xp.jpg)")
        $.ajax({
            type: "POST",
            url: "newbgimage.php",
            dataType: 'text',
            data: {link: "http://oboi-dlja-stola.ru/file/14626/760x0/16:9/windows-xp.jpg"},
            success: function(data){
                notice("ФОН СИНХРОНИЗИРОВАН!");
            }
        })
    }
    </script>
</body>
</html>