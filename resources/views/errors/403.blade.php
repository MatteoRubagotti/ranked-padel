@extends('errors::illustrated-layout')

@section('title', __('Accesso non consentito'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Accesso non consentito'))
