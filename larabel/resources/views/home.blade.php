@extends('layouts.app')

@section('title-block')Главная страница@endsection

@section('content')
<h1>Главная страница</h1>

<p>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
    A obcaecati excepturi iste in repudiandae unde deleniti doloremque ullam quis, 
    magni iure libero porro sint fugit qui amet. Nihil, natus repudiandae?
</p>
@endsection

@section('aside')
    @parent
    <p>Дополнительный текст</p>
@endsection
