<?php

namespace Database\Seeders;

use App\Http\Controllers\MediaController;
use App\Http\Services\MediaService;
use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			$movies = [
				[
					"name" => "Um Sonho de Liberdade",
					"type" => 1,
					"original_title" => "The Shawshank Redemption",
					"year" => 1994,
					"duration" => 142,
					"synopsis" => "A história de Andy Dufresne, um banqueiro condenado à prisão perpétua pelo assassinato de sua esposa e amante, e sua amizade com o companheiro de prisão Ellis 'Red' Redding.",
					"trailer_link" => "https://www.youtube.com/watch?v=6hB3S9bIaco",
					"image_url" => "https://image.tmdb.org/t/p/original/6GZBRtAhzkSQcKfkZqmrG3cdfRQ.jpg"
				],
				[
					"name" => "Breaking Bad: A Química do Mal",
					"type" => 2,
					"original_title" => "Breaking Bad",
					"year" => 2008,
					"duration" => 47, // Aproximadamente 47 minutos por episódio
					"synopsis" => "Walter White, um professor de química diagnosticado com câncer terminal, decide fabricar e vender metanfetamina para assegurar o futuro financeiro de sua família.",
					"trailer_link" => "https://www.youtube.com/watch?v=HhesaQXLuRY",
					"image_url" => "https://image.tmdb.org/t/p/original/30erzlzIOtOK3k3T3BAl1GiVMP1.jpg"
			],
				[
					"name" => "O Poderoso Chefão",
					"type" => 1,
					"original_title" => "The Godfather",
					"year" => 1972,
					"duration" => 175,
					"synopsis" => "A saga da família Corleone, uma poderosa dinastia do crime organizado nos Estados Unidos, liderada por Vito Corleone.",
					"trailer_link" => "https://www.youtube.com/watch?v=sY1S34973zA",
					"image_url" => "https://image.tmdb.org/t/p/original/u8LAG1JI57U9p0s8TyEEeoykR5d.jpg"
				],
				[
					"name" => "Game of Thrones",
					"type" => 2,
					"original_title" => "Game of Thrones",
					"year" => 2011,
					"duration" => 57, // Aproximadamente 57 minutos por episódio
					"synopsis" => "Nove famílias nobres lutam pelo controle do continente de Westeros enquanto uma antiga ameaça ressurge.",
					"trailer_link" => "https://www.youtube.com/watch?v=gcTkNV5Vg1E",
					"image_url" => "https://image.tmdb.org/t/p/original/1XS1oqL89opfnbLl8WnZY1O1uJx.jpg"
				],
				[
					"name" => "Pulp Fiction: Tempo de Violência",
					"type" => 1,
					"original_title" => "Pulp Fiction",
					"year" => 1994,
					"duration" => 154,
					"synopsis" => "Histórias entrelaçadas de Los Angeles envolvendo dois assassinos de aluguel, a esposa de um gangster, um boxeador e outros personagens excêntricos.",
					"trailer_link" => "https://www.youtube.com/watch?v=s7EdQ4FqbhY",
					"image_url" => "https://alternativemovieposters.com/wp-content/uploads/2023/07/Dave-Merrell_PulpFiction.jpg"
				],
				[
					"name" => "Batman: O Cavaleiro das Trevas",
					"type" => 1,
					"original_title" => "The Dark Knight",
					"year" => 2008,
					"duration" => 152,
					"synopsis" => "Batman enfrenta o Coringa, um criminoso anárquico que semeia o caos em Gotham City.",
					"trailer_link" => "https://www.youtube.com/watch?v=EXeTwQWrcwY",
					"image_url" => "https://image.tmdb.org/t/p/original/qJ2tW6WMUDux911r6m7haRef0WH.jpg"
				],
			[
					"name" => "Friends",
					"type" => 2,
					"original_title" => "Friends",
					"year" => 1994,
					"duration" => 22, // Aproximadamente 22 minutos por episódio
					"synopsis" => "Acompanhe as aventuras de seis amigos que vivem em Nova York enquanto enfrentam os altos e baixos da vida e do amor.",
					"trailer_link" => "https://www.youtube.com/watch?v=hDNNmeeJs1Q",
					"image_url" => "https://image.tmdb.org/t/p/original/2koX1xLkpTQM4IZebYvKysFW1Nh.jpg"
				],
				[
					"name" => "Forrest Gump: O Contador de Histórias",
					"type" => 1,
					"original_title" => "Forrest Gump",
					"year" => 1994,
					"duration" => 142,
					"synopsis" => "A vida extraordinária de Forrest Gump, um homem simples que testemunha eventos históricos enquanto busca seu grande amor.",
					"trailer_link" => "https://www.youtube.com/watch?v=bLvqoHBptjg",
					"image_url" => "https://image.tmdb.org/t/p/original/d74WpIsH8379TIL4wUxDneRCYv2.jpg"
				],
				[
					"name" => "Stranger Things",
					"type" => 2,
					"original_title" => "Stranger Things",
					"year" => 2016,
					"duration" => 50, // Aproximadamente 50 minutos por episódio
					"synopsis" => "Um grupo de amigos em uma pequena cidade enfrenta eventos sobrenaturais quando um deles desaparece misteriosamente.",
					"trailer_link" => "https://www.youtube.com/watch?v=mnd7sFt5c3A",
					"image_url" => "https://image.tmdb.org/t/p/original/uOOtwVbSr4QDjAGIifLDwpb2Pdl.jpg"
				],
				[
					"name" => "O Senhor dos Anéis: A Sociedade do Anel",
					"type" => 1,
					"original_title" => "The Lord of the Rings: The Fellowship of the Ring",
					"year" => 2001,
					"duration" => 178,
					"synopsis" => "Frodo Bolseiro recebe a missão de destruir o Um Anel e impedir que Sauron conquiste a Terra-média.",
					"trailer_link" => "https://www.youtube.com/watch?v=V75dMMIW2B4",
					"image_url" => "https://image.tmdb.org/t/p/original/hi77F0o55uEhZid1eWRp830CRDx.jpg"
				],
				[
					"name" => "Chernobyl",
					"type" => 2,
					"original_title" => "Chernobyl",
					"year" => 2019,
					"duration" => 60, // Aproximadamente 60 minutos por episódio
					"synopsis" => "Uma dramatização do desastre nuclear de Chernobyl e suas consequências.",
					"trailer_link" => "https://www.youtube.com/watch?v=s9APLXM9Ei8",
					"image_url" => "https://image.tmdb.org/t/p/original/7vcwOySsqeyEdmfHQNT5jHCL2gb.jpg"
				],
				[
					"name" => "Vingadores: Ultimato",
					"type" => 1,
					"original_title" => "Avengers: Endgame",
					"year" => 2019,
					"duration" => 181,
					"synopsis" => "Os Vingadores remanescentes tentam reverter os danos causados por Thanos no universo.",
					"trailer_link" => "https://www.youtube.com/watch?v=TcMBFSGVi1c",
					"image_url" => "https://image.tmdb.org/t/p/original/q6725aR8Zs4IwGMXzZT8aC8lh41.jpg"
				],
				[
					"name" => "A Casa de Papel",
					"type" => 2,
					"original_title" => "La Casa de Papel",
					"year" => 2017,
					"duration" => 45, // Aproximadamente 45 minutos por episódio
					"synopsis" => "Um grupo de ladrões realiza um assalto à Casa da Moeda da Espanha, liderado pelo Professor.",
					"trailer_link" => "https://www.youtube.com/watch?v=U5yFhH8hLTs",
					"image_url" => "https://image.tmdb.org/t/p/original/yVUAfbrP5HDJugXraB7KQS0yz6Z.jpg"
				],
				[
					"name" => "Interestelar",
					"type" => 1,
					"original_title" => "Interstellar",
					"year" => 2014,
					"duration" => 169,
					"synopsis" => "Um grupo de astronautas viaja através de um buraco de minhoca em busca de um novo lar para a humanidade.",
					"trailer_link" => "https://www.youtube.com/watch?v=zSWdZVtXT7E",
					"image_url" => "https://image.tmdb.org/t/p/original/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg"
				],
				[
					"name" => "Black Mirror",
					"type" => 2,
					"original_title" => "Black Mirror",
					"year" => 2011,
					"duration" => 60, // Aproximadamente 60 minutos por episódio
					"synopsis" => "Uma antologia que explora um futuro distópico onde a tecnologia colide com a natureza humana.",
					"trailer_link" => "https://www.youtube.com/watch?v=jROLrhQkK78",
					"image_url" => "https://image.tmdb.org/t/p/original/hi3bz1FraEjNA4PWASMA8nmSwT4.jpg"
				],
				[
					"name" => "A Origem",
					"type" => 1,
					"original_title" => "Inception",
					"year" => 2010,
					"duration" => 148,
					"synopsis" => "Um ladrão que invade sonhos recebe a missão de plantar uma ideia na mente de uma pessoa poderosa.",
					"trailer_link" => "https://www.youtube.com/watch?v=YoHD9XEInc0",
					"image_url" => "https://image.tmdb.org/t/p/original/oYuLEt3zVCKq57qu2F8dT7NIa6f.jpg"
				],
				[
					"name" => "The Crown",
					"type" => 2,
					"original_title" => "The Crown",
					"year" => 2016,
					"duration" => 60, // Aproximadamente 60 minutos por episódio
					"synopsis" => "A série retrata a vida da Rainha Elizabeth II ao longo de décadas de eventos históricos.",
					"trailer_link" => "https://www.youtube.com/watch?v=JWtnJjn6ng0",
					"image_url" => "https://image.tmdb.org/t/p/original/bFEFDqhxxon7CTe6k8lUgPE2qUO.jpg"
				],
				[
					"name" => "Gladiador",
					"type" => 1,
					"original_title" => "Gladiator",
					"year" => 2000,
					"duration" => 155,
					"synopsis" => "Um general romano busca vingança após ser traído e ver sua família assassinada.",
					"trailer_link" => "https://www.youtube.com/watch?v=owK1qxDselE",
					"image_url" => "https://image.tmdb.org/t/p/original/ofDw0himYNpehWA69OkPWOzXOYK.jpg"
				],
				[
					"name" => "Peaky Blinders",
					"type" => 2,
					"original_title" => "Peaky Blinders",
					"year" => 2013,
					"duration" => 58, // Aproximadamente 58 minutos por episódio
					"synopsis" => "Uma gangue de Birmingham, liderada por Thomas Shelby, ascende ao poder após a Primeira Guerra Mundial.",
					"trailer_link" => "https://www.youtube.com/watch?v=oVzVdvGIC7U",
					"image_url" => "https://image.tmdb.org/t/p/original/vUUqzWa2LnHIVqkaKVlVGkVcZIW.jpg"
				],
				[
					"name" => "Mad Men",
					"type" => 2,
					"original_title" => "Mad Men",
					"year" => 2007,
					"duration" => 47, // Aproximadamente 47 minutos por episódio
					"synopsis" => "A vida de Don Draper, um diretor criativo em uma agência de publicidade na Nova York dos anos 1960.",
					"trailer_link" => "https://www.youtube.com/watch?v=suRDUFpsHus",
					"image_url" => "https://image.tmdb.org/t/p/original/urRV5Vpga5elDH5ll4M9NHle6vv.jpg"
				],
				[
					"name" => "Parasita",
					"type" => 1,
					"original_title" => "Parasite",
					"year" => 2019,
					"duration" => 132,
					"synopsis" => "Uma família pobre infiltra-se na vida de uma família rica com consequências inesperadas.",
					"trailer_link" => "https://www.youtube.com/watch?v=5xH0HfJHsaY",
					"image_url" => "https://image.tmdb.org/t/p/original/tNJB14t2lqZ9L4oyEKoN6DT2ou8.jpg"
				],
				[
					"name" => "Westworld",
					"type" => 2,
					"original_title" => "Westworld",
					"year" => 2016,
					"duration" => 60, // Aproximadamente 60 minutos por episódio
					"synopsis" => "Um parque temático futurista permite que visitantes vivam fantasias sem consequências, até que as coisas saem do controle.",
					"trailer_link" => "https://www.youtube.com/watch?v=IuS5huqOND4",
					"image_url" => "https://image.tmdb.org/t/p/original/8MfgyFHf7XEboZJPZXCIDqqiz6e.jpg"
				]
			];

			$imageUrls = array_map(function($movie) {
				return $movie['image_url'];
			}, $movies);

			$movies = array_map(function($movie) {
				unset($movie['image_url']);
				return $movie;
			}, $movies);

			Media::insert($movies);
			for ($i = 0; $i < count($imageUrls); $i++) {
				(new MediaService(new Media()))->downloadMediaImage($imageUrls[$i], $i + 1);
			}
    }
}
