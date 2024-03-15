<style>
<?php include __DIR__ . '/template.css';
?>
</style>

<div class="productoInicio">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <img src="https://zetabeer.com/wp-content/uploads/2019/06/hop.png" />
            </div>
            <div class="flip-card-back">
                <img src="https://zetabeer.com/wp-content/uploads/2019/06/hop.png" />
                <div class="label">
                    <p>Des de 2018, l'ETP Xavier elabora de manera col·laborativa la seva pròpia cervesa.
                    <br><i>(Projecte CooBeer, guardonat amb el Premi Nomeacuerdo del Nombre)</p>
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
            Busca per departament, per data o per paraula clau!
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

    window.onload = function () {
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
    };
</script>