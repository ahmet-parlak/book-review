@extends('errors::minimal')

@section('title', $exception->getMessage() ?: 'Sayfa Bulunamadı')

@section('code', '404')
@section('message', $exception->getMessage() ?: 'Sayfa Bulunamadı')
