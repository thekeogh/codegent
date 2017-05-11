@extends('layouts.www')
@section('title', 'Contact Codegent in Holborn Viaduct, Holborn, London, UK')
@section('description', 'Email hello@codegent.com, fill out our contact form or connect with us on social')
@section('image', cdn('img/og/contact.jpg'))
@section('body_class', 'Contact')

@section('main')

    <div class="Main"><div class="Spotlight Spotlight--block"><div class="Wrapper Touch">
        <form method="post" action="{{ route('contacting') }}" class="Touch__left">
            {{ csrf_field() }}
            <h1 class="Touch__title">Drop us a line</h1>
            
            @if (request()->has('sent'))
                <div class="Form__success">
                    Thanks, your enquiry has been successfully sent. We will be in contact shortly.
                </div>
            @endif
            
            @if ($errors->count())
                <div class="Form__errors">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            
            <div class="Form__row">
                <label for="name" class="Form__label">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Your full name" class="Form__element {{ $errors->has('name') ? 'Form__element--errored' : null }}">
            </div>
            <div class="Form__row">
                <label for="email" class="Form__label">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Your email address" class="Form__element {{ $errors->has('email') ? 'Form__element--errored' : null }}">
            </div>
            <div class="Form__row">
                <label for="type" class="Form__label">Type:</label>
                <select name="type" id="type" class="Form__element {{ $errors->has('type') ? 'Form__element--errored' : null }}">
                    <option value="">Enquiry type...</option>
                    <option value="Hello">Saying hello</option>
                    <option value="Products">Working on products</option>
                    <option value="Agency">Working in agency</option>
                </select>
            </div>
            <div class="Form__row Form__row--top">
                <label for="message" class="Form__label">Message:</label>
                <textarea name="message" id="message" value="{{ old('message') }}" rows="8" placeholder="How can we help?" class="Form__element {{ $errors->has('message') ? 'Form__element--errored' : null }}"></textarea>
            </div>
            <div class="Form__row Form__row--buttons">
                <button type="submit" class="Button Button--box">Send</button>
            </div>
            
            
        </form>
        <div class="Touch__right">
            <h1 class="Touch__title">Address</h1>
            <address class="Touch__address">
                Codegent Limited<br>
                International House<br>
                24 Holborn Viaduct<br>
                London EC1A 2BN
            </address>
            <div class="Touch__social">
                <a href="https://www.facebook.com/codegent/" target="_blank"><i class="socicon-facebook"></i></a>
                <a href="https://twitter.com/codegent" target="_blank"><i class="socicon-twitter"></i></a>
                <a href="https://www.instagram.com/codegent/" target="_blank"><i class="socicon-instagram"></i></a>
                <a href="https://www.behance.net/codegent" target="_blank"><i class="socicon-behance"></i></a>
            </div>
            <div class="Touch__vat">
                <p>Company Reg No: 5096319</p>
                <p>VAT No: 835 8449 90</p>
            </div>
        </div>
    </div></div></div>
    
@endsection