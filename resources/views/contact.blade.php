@extends('main_layouts.master')
@section('title', 'MyBlog | Contato')
@section('content')

    <div class="colorlib-contact">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-12 animate-box">
                    <h2>Informações de contato</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-info-wrap-flex">
                                <div class="con-info">
                                    <p><span><i class="icon-location-2"></i></span> 198 West 21th Street, <br> Suite 721 New York NY 10016</p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-globe"></i></span> <a href="#">yourwebsite.com</a></p>
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
                    <form action="{{ route('contact.store') }}" method="POST">
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
                            <input type="submit" value="Enviar mensagem" class="btn btn-primary">
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
