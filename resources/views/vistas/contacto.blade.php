@extends('components.app-layout')

@section('content')
<div class="contact-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="contact-info">
                    <h2>Contáctanos</h2>
                    <p>Si tienes alguna consulta o necesitas más información, no dudes en ponerte en contacto con nosotros a través de los siguientes medios.</p>

                    <h4><i class="fa fa-map-marker-alt"></i> Dirección</h4>
                    <p>Calle 42 x 49E y 49D Col. Centro</p>

                    <h4><i class="fa fa-phone"></i> Teléfono</h4>
                    <p>+52 (986) 456-7890</p>

                    <h4><i class="fa fa-envelope"></i> Email</h4>
                    <p><a href="mailto:contacto@ejemplo.com">SportXtreme@gmail.com</a></p>

                    <h4><i class="fa fa-share-alt"></i> Redes Sociales</h4>
                    <div class="social-icons">
                        <br>
                        <a href="https://facebook.com/ejemplo" target="_blank" class="ti-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/ejemplo" target="_blank" class="ti-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="https://instagram.com/ejemplo" target="_blank" class="ti-instagram"><i class="fa fa-instagram"></i></a>
                    </div>
                    <a href="mailto:SportXtreme@gmail.com" class="contact-btn btn btn-lg btn-primary">Envíanos un mensaje</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
