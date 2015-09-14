<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p>We kunnen schepen tot 80 Ton en maximaal 30 meter stallen. We hebben 3 soorten scheepsbokken, waardoor grote en kleinere schepen allemaal op een passende bok staan. Per type scheepsbok hebben we een aparte botenkar van 30 of 80 Ton.</p>
            </div>
            <div class="col-md-3">
                <p>Al onze stallingstarieven zijn all-in, dat wil zeggen:| Schip uit het water hijsen, afspuiten, op een bok plaatsen, transport, stalling, gebruik van onze faciliteiten en het weer te water laten.</p>
            </div>
            <div class="col-md-3">
                <address>
                    <strong>Superstalling.nl</strong><br />
                    Roodvoet 4<br />
                    4023 AL Rijswijk (Gld.)<br />
                    <a href="mailto:info@superstalling.nl" title="info@superstalling.nl">info@superstalling.nl</a>
                </address>
            </div>
            <div class="col-md-3">
                <p>Superstalling is en een professionele service organisatie die alle technische en cosmetische watersport klussen aan kan.</p>
                <p>Onze stalling capaciteit mag, zeker in midden Nederland, uniek genoemd worden.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="copyrights">&copy;2015 Superstalling. Alle rechten voorbehouden.</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ URL::asset('assets/js/sass-bootstrap.min.js') }}"></script>
<script>
    var header = document.querySelector('.navbar');
    var origOffsetY = 145;

    function onScroll(e) {
        window.scrollY >= origOffsetY ? header.classList.add('sticky') :
                header.classList.remove('sticky');
    }

    document.addEventListener('scroll', onScroll);
</script>
