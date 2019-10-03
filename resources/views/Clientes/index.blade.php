@extends('layouts.app')

@permission('read-clientes')
@section('content')

<template v-if="menu==0">
    <clientes></clientes>

</template>




@endsection

@endpermission

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>




