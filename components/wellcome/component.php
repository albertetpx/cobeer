<style>
    <?php include __DIR__ . '/template.css';
    ?>
</style>

<div class="productoInicio">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <!-- <img src="https://zetabeer.com/wp-content/uploads/2019/06/hop.png" /> -->
                <!-- <img src="../../../assets/imagenes/portada.jpg" alt=""> -->
            </div>
            <div class="flip-card-back">
                <!-- <img src="https://zetabeer.com/wp-content/uploads/2019/06/hop.png" /> -->
                <!-- <img src="../../../assets/imagenes/portada.jpg" width="800" alt=""> -->
                <div class="label">
                    <p>El projecte CooBeer és un projecte interdisciplinar que consisteix en l’elaboració de cervesa
                        artesana per part de l’alumnat de segon del cicle de grau superior de dietètica, com a mètode
                        d’experimentació pràctica i real, per tal d’aplicar els conceptes teòrics relacionats, essent la
                        fabricació de la cervesa el fil conductor que afavoreix treballar continguts de química,
                        microbiologia, història, medicina, indústria, comerç, màrqueting ...

                        És un projecte guanyador del Pla de Mesures d’Innovació a la Formació Professional el curs 2019
                        – 2020 i que continua duent-se a terme al cicle de dietètica a l’hora hi ha un seguit
                        d’implementacions que permeten interaccionar amb altres cicles formatius i organitzacions de
                        fora de l’escola, per tal de donar una visió més holística dels ensenyaments de l’escola.

                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="titleHome">
        <h1>
            <a href="" class="typewrite" data-period="1000"
                data-type='[ "Hola", "Som ETP Xavier", "Som CooBeer", "Benvinguts"]'>
                <span class="wrap"></span>
            </a>
        </h1>
        <!-- Componente buscador -->
        <div class="buscadorCobeer">
            <?php include dirname(__DIR__, 1) . '/buscador/component.php' ?>
        </div>
        <h2>
            Busca per paraula clau!
        </h2>
    </div>
</div>

<script>
    var TxtType = function (el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function () {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

        var that = this;
        var delta = 100 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function () {
            that.tick();
        }, delta);
    };

    // window.onload = function () {    
    var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    // css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
    // };
</script>