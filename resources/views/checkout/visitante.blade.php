@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container">
    <h1 class="text-center">Checkout</h1>
    <h4 class="text-center">Precisamos de só mais esses dados para fechar a sua compra</h4>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('checkout.make') }}">

                <div class="card mb-3">
                    <div class="card-header">{{ __('Your Account') }}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">Endereço</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <input id="estado" type="text" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" value="{{ old('estado') }}" required>

                                @if ($errors->has('estado'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right">Cidade</label>

                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" name="cidade" value="{{ old('cidade') }}" required>

                                @if ($errors->has('cidade'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cidade') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logradouro" class="col-md-4 col-form-label text-md-right">Logradouro</label>

                            <div class="col-md-6">
                                <input id="logradouro" type="text" class="form-control{{ $errors->has('logradouro') ? ' is-invalid' : '' }}" name="logradouro" required>

                                @if ($errors->has('logradouro'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('logradouro') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">Número</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}" name="numero" required>

                                @if ($errors->has('numero'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('numero') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">Pagamento</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="card-number" class="col-md-4 col-form-label text-md-right">Número do Cartão</label>

                            <div class="col-md-6">
                                <input id="card-number"
                                       type="number"
                                       class="form-control{{ $errors->has('card-number') ? ' is-invalid' : '' }}"
                                       name="card-number"
                                       value="{{ old('card-number') }}" required
                                >

                                @if ($errors->has('card-number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('card-number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vencimento" class="col-md-4 col-form-label text-md-right">Data de Vencimento</label>

                            <div class="col-md-6">
                                <input id="vencimento"
                                       type="date"
                                       class="form-control{{ $errors->has('vencimento') ? ' is-invalid' : '' }}"
                                       name="vencimento"
                                       value="{{ old('vencimento') }}" required
                                >

                                @if ($errors->has('vencimento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('vencimento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="seguranca" class="col-md-4 col-form-label text-md-right">Código de segurança</label>

                            <div class="col-md-6">
                                <input id="seguranca"
                                       type="number"
                                       class="form-control{{ $errors->has('vencimento') ? ' is-invalid' : '' }}"
                                       name="seguranca"
                                       value="{{ old('seguranca') }}" required
                                >

                                @if ($errors->has('seguranca'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('seguranca') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-success">
                        Finalizar compra
                    </button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection