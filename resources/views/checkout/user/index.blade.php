@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="container">
        <h1 class="text-center">Checkout</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('checkout.make') }}">

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