@extends('layouts.app')

@section('content')
    <section>
    <div class = "main-div justify-content-center">
        <a href="/pools" class="icons-div d-block shadow-sm">
                    <img src="/public/images/admin-panel/pool.png" alt="Бассейны">
                                    <h2>Бассейны</h2>
        </a>

        <a href="/clients" class="icons-div d-block shadow-sm">
            <img src="/public/images/admin-panel/client.png" alt="Клиенты">
            <h2>Бассейны</h2>
        </a>

        <a href="/photos" class="icons-div d-block shadow-sm">
            <img src="/public/images/admin-panel/photo.png" alt="Фото">
            <h2>Фото</h2>
        </a>

        <a href="/portfolioPhoto" class="icons-div d-block shadow-sm">
            <img src="/public/images/admin-panel/portfolio.png" alt="Портфолио">
            <h2>Портфолио</h2>
        </a>
    </div>
    </section>



@endsection

<style scoped>

    section{
        display: flex;
        justify-content: center;
    }


    .main-div{
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        justify-content: center;


    }

    .main-div a{
        display: block;
        margin: 20px 80px;
        width: 30%;
        box-shadow: 0 1rem 2rem rgba(0,0,0,.15)!important;
        padding: 30px;
        border-radius: 20px;
        text-decoration: none;
        transition: all 0.2s;
        color: black;


    }


    .main-div a:hover{
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        color: black;
        text-decoration: none;


    }
    .main-div img{
        width: 150px;
    }

</style>
