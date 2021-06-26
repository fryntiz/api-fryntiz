@extends('layouts.app')

{{-- Descripción sobre esta página --}}
@section('title', 'Chipiona Estación Meteorológica')
@section('description', 'Estación meteorológica en tiempo real para la ciudad de Chipiona tomando Humedad, Temperatura, Presión atmosférica, Viento (Velocidad, dirección y ráfagas), Cantidad de luz en general, Indice UV, UVA, UVB, CO2-ECO2, TVOC, Calidad del aire, Relámpagos (Cantidad, distancia y potencia)')
@section('keywords', 'Raúl Caro Pastorino, fryntiz, chipiona, clima, meteorología, tiempo, el tiempo, el clima, tiempo en chipiona, el tiempo en chipiona, humedad, calor, temperatura, presión, presión atmosférica, viento, luz, uv, uva, uvb, co2, eco2, co2-eco2, tvoc, relámpagos, relámpago, rayo, trueno, tormenta, tormentas')

{{-- Etiquetas para Redes sociales --}}
@section('rs-title', 'Chipiona Estación Meteorológica')
@section('rs-sitename', 'Api Fryntiz')
@section('rs-description', 'Estación meteorológica en tiempo real para la ciudad de Chipiona tomando Humedad, Temperatura, Presión atmosférica, Viento (Velocidad, dirección y ráfagas), Cantidad de luz en general, Indice UV, UVA, UVB, CO2-ECO2, TVOC, Calidad del aire, Relámpagos (Cantidad, distancia y potencia)')
@section('rs-image', asset('images/wheater-station/social-thumbnail.jpg'))
@section('rs-url', route('weather_station.index'))
@section('rs-image-alt', 'Chipiona Estación Meteorológica')

@section('meta-twitter-title', 'Chipiona Estación Meteorológica')

@section('content')
    {{--
    @php
        $datos = [
            'Humedad' => \App\Models\WeatherStation\Humidity::whereNotNull('value')
                ->orderBy('created_at', 'DESC')
                ->paginate(20),
            'Temperatura' => \App\Models\WeatherStation\Temperature::whereNotNull('value')
                ->orderBy('created_at', 'DESC')
                ->paginate(20),
            'Presión' => \App\Models\WeatherStation\Pressure::whereNotNull('value')
                ->orderBy('created_at', 'DESC')
                ->paginate(20),
            'Viento' => \App\Models\WeatherStation\Winter::whereNotNull('speed')
                ->whereNotNull('average')
                ->whereNotNull('min')
                ->whereNotNull('max')
                ->orderBy('created_at', 'DESC')
                ->paginate(20),
            'Luz' => \App\Models\WeatherStation\Light::whereNotNull('value')
                ->orderBy('created_at', 'DESC')
                ->paginate(20),
            'Indice-UV' => \App\Models\WeatherStation\UvIndex::whereNotNull('value')
                ->orderBy('created_at', 'DESC')
                ->paginate(20),
            'UVA' => \App\Models\WeatherStation\Uva::whereNotNull('value')
                ->orderBy('created_at', 'DESC')
                ->paginate(20),
            'UVB' => \App\Models\WeatherStation\Uvb::whereNotNull('value')
                ->orderBy('created_at', 'DESC')
                ->paginate(20),
            'CO2-ECO2' => \App\Models\WeatherStation\Eco2::whereNotNull('value')
                ->orderBy('created_at', 'DESC')
                ->paginate(20),
            'TVOC' => \App\Models\WeatherStation\Tvoc::whereNotNull('value')
                ->orderBy('created_at', 'DESC')
                ->paginate(20),
            'Calidad del Aire' => \App\Models\WeatherStation\AirQuality::whereNotNull('gas_resistance')
                ->whereNotNull('air_quality')
            ->orderBy('created_at', 'DESC')
            ->paginate(20),

        ];
    @endphp
    <nav
        class="flex items-center justify-between flex-wrap bg-white py-4 px-4 shadow border-solid border-t-2 border-blue-700">

        <div class="menu w-full block flex-grow flex items-center w-auto">
            <div class="text-md font-bold text-blue-700 flex-grow text-center">

                @foreach(array_keys($datos) as $titulo)
                    <a href="#{{$titulo}}"
                       class="block mt-4 inline-block mt-0 px-2 py-2 rounded mr-2">
                        {{$titulo}}
                    </a>
                @endforeach
            </div>
        </div>
    </nav>
--}}




    <div class="leading-normal tracking-normal"
         style="font-family: 'Source Sans Pro', sans-serif;">

        <section class="bg-white border-b">
            <div class="container max-w-5xl mx-auto m-4">
                <v-table-component title="Título de la tabla"
                                   url="test" />
            </div>
        </section>
    </div>


{{--


    <div class="leading-normal tracking-normal"
         style="font-family: 'Source Sans Pro', sans-serif;">

        <section class="bg-white border-b">
            <div class="container max-w-5xl mx-auto m-4">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    Estación Meteorológica
                    <br/>
                    Modo depuración
                </h1>

                <div class="flex flex-wrap content-center">
                    <div class="w-full p-6">
                        <div class="bg-red-100 border border-red-400 m-2 mb-5 text-red-700 px-2 py-2 rounded relative"
                             role="alert">
                            <span class="inline text-sm">
                                Sitio
                                <strong>temporal</strong>
                                con la finalidad de detectar posibles
                                caídas/cuelgues o mediciones imprecisas en los
                                programas que desarrollo para sensores,
                                arduinos, raspberrys, servidores...
                                <br/>
                                Una vez acabada la aplicación, este sitio
                                desaparecerá quedando en el subdominio:
                                <a href="https://eltiempo.desdechipiona.es"
                                   class="underline text-lightBlue-500 background-transparent font-bold text-xs outline-none focus:outline-none ease-linear transition-all duration-150"
                                   type="button"
                                   target="_blank"
                                   title="El tiempo Desde Chipiona">
                                    https://eltiempo.desdechipiona.es
                                </a>
                            </span>
                        </div>

                        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                            Sobre esta api
                        </h3>

                        <p class="text-gray-600 mb-2">
                            Los datos pueden no ser precisos debido a que aún se
                            encuentra en depuración y calibración de sensores.
                        </p>

                        <p class="text-gray-600 mb-2">
                            Esta API se encuentra en construcción y mide el
                            tiempo
                            actual en

                            <a href="https://es.wikipedia.org/wiki/Chipiona"
                               class="underline text-lightBlue-500 background-transparent font-bold text-xs outline-none focus:outline-none ease-linear transition-all duration-150"
                               type="button"
                               target="_blank">
                                Chipiona
                            </a>

                            con una frecuencia de 1-2 minutos por el momento.
                        </p>

                        <p class="text-gray-600 mb-1">
                            Puedes ver el desarrollo de la estación
                            meteorológica
                            para la raspberry en python3 desde aquí:

                            <a href="https://gitlab.com/fryntiz/raspberry-weather-station"
                               class="underline text-lightBlue-500 background-transparent font-bold text-xs outline-none focus:outline-none ease-linear transition-all duration-150"
                               type="button"
                               target="_blank"
                               title="Raspberry pi 4 estación meteorológica">
                                https://gitlab.com/fryntiz/raspberry-weather-station
                            </a>
                        </p>

                        <div class="bg-yellow-100 border border-red-400 m-2 my-4 text-red-700 px-2 py-2 rounded relative text-center"
                             role="alert">
                            <span class="inline font-bold">
                                Franja horaria UTC +0:00
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white border-b">

            @foreach($datos as $title => $collection)
                <div class="container max-w-5xl mx-auto m-4 overflow-x-scroll">
                    @if(!$collection->count())
                        @continue
                    @endif

                    @php
                        $att_fillables = $collection->get(0)->getFillable();
                    @endphp
                    <h2 id="{{$title}}">
                        {{$title}} -
                        <small>
                            Viendo últimos
                            <strong>{{$collection->count()}}</strong>
                            registros
                        </small>
                    </h2>

                    <table class="min-w-max w-full table-auto">
                        <thead class="justify-between">
                        <tr class="bg-gray-800">
                            @if($collection->count() >= 1)
                                @foreach($att_fillables as $value)
                                    <td class="px-1 py-2 text-gray-300 capitalize text-center">
                                        {{$value}}
                                    </td>
                                @endforeach
                            @endif
                        </tr>
                        </thead>

                        <tbody class="bg-gray-200">
                        @foreach($collection as $ele)
                            @if (!$ele)
                                @continue
                            @endif

                            <tr class="bg-white border-4 border-gray-200">
                                @php
                                    $x = $ele->getFillable();
                                @endphp

                                @foreach($att_fillables as $name)
                                    <td class="px-1 py-2 items-center text-center">
                                        {{$ele->$name}}
                                    </td>
                                @endforeach

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{$collection->links()}}
                </div>
            @endforeach
        </section>
    </div>
--}}
@endsection
