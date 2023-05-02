    <style>
        #btn-jour-nuit{
            background: #1e1e1e;
            border-radius: 10px;
            position: fixed;
            height: 30px;
            width: 60px;
            bottom: 7px;
            right: 7px;
        }
        .soleil{
            position: fixed;
            bottom: 10px;
            right: 9px;
            height: 24px;
            width: 24px;
            border-radius: 100%;
            background:
        }
        .planete{
            animation: all ease;
            position: fixed;
            bottom: 10px;
            right: 39px;
            height: 24px;
            width: 24px;
            border-radius: 100%;
            background: radial-gradient(circle, rgba(245,255,138,1) 0%, rgba(255,240,76,1) 100%);
            /*radial-gradient(circle, rgba(208,208,208,1) 0%, rgba(119,119,119,1) 100%)*/
        }
        .planete2{
            animation: all ease;
            position: fixed;
            bottom: 10px;
            right: 39px;
            height: 24px;
            width: 24px;
            border-radius: 100%;
            background: radial-gradient(circle, rgba(208,208,208,1) 0%, rgba(119,119,119,1) 100%);
        }
        .barre{
            background: #e1e1e1;
            border-radius: 10px;
            position: fixed;
            height: 14px;
            width: 46px;
            bottom: 15px;
            right: 13px;
        }

        @keyframes sun_to_moon {
            0%{
                transform: translate(0px);
                opacity: 1
            }
            50%{
                transform: translate(28px);
                opacity: 0
            }
            100%{
                transform: translate(28px);
                opacity: 0
            }
        }
        @keyframes sun_to_moon2 {
            0%{
                transform: translate(0px);
            }
            50%{
                transform: translate(28px);
            }
            100%{
                transform: translate(28px);
            }
        }

        @keyframes moon_to_sun {
            0%{
                transform: translate(28px);
                opacity: 0;
            }
            50%{
                transform: translate(0px);
                opacity: 1
            }
            100%{
                transform: translate(0px);
                opacity: 1
            }
        }
        @keyframes moon_to_sun2 {
            0%{
                transform: translate(28px);
            }
            50%{
                transform: translate(0px);
            }
            100%{
                transform: translate(0px);
            }
        }
        @keyframes darkmode {
            0%{
                background: #D9D9D9;
                color:;
            }
            50%{
                background: #2E2E2E;
                color: #fff;
            }
            100%{
                background: #2E2E2E;
                color: #fff;
            }
        }
        @keyframes lightmode {
            0%{
                background: #2E2E2E;
                color: #EDE0CA;
            }
            50%{
                background : #D9D9D9;
                color: black;
            }
            100%{
                background : #D9D9D9;
                color: black;
            }
        }
    </style>
    <button id="btn-jour-nuit" onclick="jour_nuit()">
        <div>
            <div class="barre"></div>
            <div class="planete2" id="planete2"></div>
            <div class="planete" id="planete"></div>
        </div>
    </button>
    </body>
    <script>
        let jour = true;
        function jour_nuit(){
            if (jour==true){
                jour=false;
                document.getElementById('planete').style.animation= "sun_to_moon 0.6s ease-out";
                document.getElementById('planete2').style.animation= "sun_to_moon2 0.6s ease-out";
                document.body.style.animation= "darkmode 0.6s ease-out";
                setTimeout(() => {
                    document.getElementById('planete').style.transform= "translate(28px)";
                    document.getElementById('planete2').style.transform= "translate(28px)";
                    document.getElementById('planete').style.opacity= "0";
                    document.body.style.background= "#2E2E2E";
                    document.body.style.color= "#fff";
                }, 500);
            } else if (jour==false){
                jour=true;
                document.getElementById('planete').style.animation= "moon_to_sun 0.6s ease-out";
                document.getElementById('planete2').style.animation= "moon_to_sun2 0.6s ease-out";
                document.body.style.animation= "lightmode 0.6s ease-out";
                setTimeout(() => {
                    document.getElementById('planete').style.transform= "translate(0px)";
                    document.getElementById('planete2').style.transform= "translate(0px)";
                    document.getElementById('planete').style.opacity= "1";
                    document.body.style.background= "#D9D9D9";
                    document.body.style.color= "#1e1e1e";
                }, 500);
            }
        }

    </script>
</html>
