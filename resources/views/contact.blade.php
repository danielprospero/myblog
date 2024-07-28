@extends('main_layouts.master')
@section('title', 'Núcleo Advance | Contato')
@section('content')

	<div class='global-message info d-none'></div>

    <div class="colorlib-contact">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-12 animate-box">
                    <h2>Informações de contato</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-info-wrap-flex">
                                <div class="con-info">
                                    <p><span><i class="icon-location4"></i></span> Avenida Lauro de Freitas, <br> Tanhaçu-BA</p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-phone3"></i></span> <a href="tel://5511999999999">+55 11 99999-9999</a></p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@nucleoadvance.com">info@nucleoadvance.com</a></p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-globe"></i></span> <a href="#">nucleoadvance.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Envie-nos uma mensagem</h2>
                </div>

                <div class="col-md-6">
                    <form onsubmit="return false;" autocomplete="on" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <!-- <label for="fname">First Name</label> -->

                                <x-blog.form.input name="first_name" value="{{ old('first_name') }}" placeholder='Seu nome' />

                            </div>

                            <div class="col-md-6">
                                <!-- <label for="lname">Last Name</label> -->
                                
                                <x-blog.form.input name="last_name" value="{{ old('last_name')}}" placeholder='Seu sobrenome' />

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Email</label> -->
                                
                                <x-blog.form.input name="email" type="email" value="{{ old('email') }}" placeholder='Seu email'  />

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="subject">Subject</label> -->

                                <x-blog.form.input required="false" name="subject" value="{{ old('subject') }}" placeholder='Assunto' />

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="message">Message</label> -->

                                <x-blog.form.textarea name="message" value="{{ old('message') }}" placeholder='Sua mensagem' cols="30" rows="10" />

                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Enviar Mensagem" class="btn btn-primary send-message-btn">
                        </div>
                    </form>	

                    <x-blog.message :status="'success'" />

                </div>
                <div class="col-md-6">
                    <div id="map" class="colorlib-map"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom_js')

<script>
    $('.send-message-btn').on('click', function(event) {
        event.preventDefault();

        let form = $(this).parents('form');
        let csrf_token = form.find('input[name="_token"]').val();
        let first_name = form.find('input[name="first_name"]').val();
        let last_name = form.find('input[name="last_name"]').val();
        let email = form.find('input[name="email"]').val();
        let subject = form.find('input[name="subject"]').val();
        let message = form.find('textarea[name="message"]').val();

        let formData = new FormData();
        formData.append('_token', csrf_token);
        formData.append('first_name', first_name);
        formData.append('last_name', last_name);
        formData.append('email', email);
        formData.append('subject', subject);
        formData.append('message', message);

        $.ajax({
            url: "{{ route('contact.store') }}",
            data: formData,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                if (data.success) {
                    $('.global-message').addClass('alert alert-info');
                    $('.global-message').fadeIn();
                    $('.global-message').text(data.message);

                    // Limpar os campos do formulário
                    form[0].reset();

                    setTimeout(function() {
                        $('.global-message').fadeOut();
                    }, 5000);
                } else {
                    for (const error in data.errors) {
                        $("small." + error).text(data.errors[error]);
                    }
                }
            }
        });
    });
</script>


@endsection


