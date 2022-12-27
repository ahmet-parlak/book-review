@extends('master')

@section('title')
    Kitap İsteği Oluştur
@endsection

@section('main')
    <div class="container mt-5">
        <h5 class="section-title position-relative mb-3"><span class="bg-secondary pr-3">Kitap İsteği Oluştur</span>
        </h5>
        <div class="bg-light p-30 mb-5">
            <div class="info alert alert-dark">
                Sisteme eklenmesini istediğiniz kitabın bilgilerini ilgili alanlara girdikten sonra istek oluştur butonuna
                basın.
            </div>
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>ISBN<sup>*</sup> </label>
                        <input class="form-control" type="text" name="isbn" autocomplete="off"
                            placeholder="Uluslararası Standart Kitap Numarası" required minlength="13" maxlength="13" value="{{old('isbn')}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Kitap Başlığı<sup>*</sup></label>
                        <input class="form-control" type="text" name="title" autocomplete="off" value="{{old('title')}}" placeholder="Kitap Başlığı" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Yazar</label>
                        <input class="form-control" type="text" name="author" autocomplete="off" placeholder="Opsiyonel">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Yayınevi</label>
                        <input class="form-control" type="text" name="publisher" autocomplete="off" placeholder="Opsiyonel">
                    </div>
                </div>
                <div class="text-center">
                    <input class="btn btn-primary" type="submit" value="İstek Oluştur">
                </div>
            </form>
        </div>
    </div>
@endsection
