<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('videogames')->insert([

            'name' => 'Resident Evil Village',
            'cover' => 'Resident_Evil_Village.png',
            'price' => '59.99',
            'description' => 'Vive el survival horror como nunca antes en la 8.ª entrega principal de la aclamada serie Resident Evil: Resident Evil Village Ambientada unos años después de los escalofriantes sucesos del aclamado Resident Evil 7: Biohazard, esta flamante nueva historia arranca con Ethan Winters y su esposa Mia viviendo plácidamente en un nuevo lugar, lejos de pesadillas pasadas. Sin embargo, justo cuando están empezando su nueva vida juntos, la tragedia vuelve a cebarse con ellos. CARACTERÍSTICAS\r\nAcción en 1.ª persona: juega como Ethan Winters y vive cada batalla en distancias cortas y terroríficas persecuciones en 1.ª persona.\r\nCaras familiares y nuevos enemigos: Chris Redfield generalmente ha desempeñado el papel de héroe en la serie Resident Evil, pero en Resident Evil Village parece albergar siniestros motivos. En este enigmático pueblo encontrarás una nueva serie de adversarios que perseguirán a Ethan sin cuartel y dificultarán cada uno de sus movimientos mientras este intenta comprender en qué nueva pesadilla se ha metido.',
            'published_at' => '2021-05-07',
            'created_at' => now(),
            'updated_at' => now()

        ]);


        DB::table('videogames')->insert([

            'name' => 'Cyberpunk 2077',
            'cover' => 'Cyberpunk_2077.png',
            'price' => '59.99',
            'description' => 'Cyberpunk 2077 es una historia de acción y aventura en mundo abierto ambientada en Night City, una megalópolis obsesionada con el poder, el glamur y la modificación corporal. Tu personaje es V, un mercenario que persigue un implante único que permite alcanzar la inmortalidad. Podrás personalizar las mejoras cibernéticas, las habilidades y el estilo de juego del personaje para dar forma a un mundo y a una historia que depende de tus decisiones. JUEGA COMO UN MERCENARIO AL MARGEN DE LA LEY\r\nConviértete en un cyberpunk, un mercenario urbano equipado con mejoras cibernéticas y crea tu leyenda en las calles de Night City. DESCUBRE LA CIUDAD DEL FUTURO\r\nSumérgete en el inmenso mundo abierto de Night City, una ciudad que establece una nueva referencia en calidad visual, complejidad y profundidad. ROBA EL IMPLANTE QUE CONCEDE LA VIDA ETERNA\r\nAcepta el trabajo más peligroso de tu vida y ve en busca del prototipo que permite acceder a la inmortalidad.',
            'published_at' => '2020-12-10',
            'created_at' => now(),
            'updated_at' => now()

        ]);



        DB::table('videogames')->insert([

            'name' => 'Yakuza: Like a Dragon',
            'cover' => 'Yakuza_Like_a_Dragon.png',
            'price' => '59.99',
            'description' => 'ÁLZATE COMO UN DRAGÓN Ichiban Kasuga, un yakuza de una familia de bajo rango de Tokio, se enfrenta a una pena de cárcel de 18 años por asumir la culpa de un delito que no cometió. Sin perder la esperanza, cumple su condena. Cuando sale de la cárcel, descubre que nadie lo está esperando y que el hombre al que más respetaba ha destruido su clan.\r\nIchiban se propone descubrir la verdad tras la traición de su familia y recuperar su vida, rodeándose para ello de un grupo diverso de parias sociales: Adachi, un policía rebelde, Nanba, un exenfermero vagabundo, y Saeko, una hostess con una misión. Juntos, se verán envueltos en un conflicto que se cuece bajo la superficie de Yokohama, y deberán convertirse en los héroes que nunca esperaron ser.\r\nEVOLUCIONA DE PERDEDOR A DRAGÓN EN UN DINÁMICO COMBATE RPG Disfruta de un dinámico combate RPG como ningún otro. Prueba 19 trabajos únicos, desde guardaespaldas hasta músico, y usa el campo de batalla como arma. ¡Agarra bates, paraguas, bicicletas, señales y todo lo que esté a tu disposición para limpiar las calles!\r\nENTRA EN LA ESCENA DEL MUNDO CRIMINAL Cuando no estés ocupado partiendo cabezas, relájate jugando clásicos de SEGA en los recreativos, compite en una carrera de karts por Yokohama donde todo vale, completa 50 historias secundarias únicas o tan solo disfruta del paisaje de una ciudad japonesa actual. Siempre te espera algo nuevo que hacer.',
            'published_at' => '2020-11-10',
            'created_at' => now(),
            'updated_at' => now()

        ]);




        DB::table('videogames')->insert([

            'name' => 'DRAGON BALL Z: KAKAROT',
            'cover' => 'DRAGON_BALL_Z_KAKAROT.png',
            'price' => '59.99',
            'description' => '• Vive la historia de DRAGON BALL Z, desde eventos épicos a desenfadadas misiones secundarias. ¡También se incluyen momentos nunca vistos hasta ahora que responden por primera vez a algunas de las preguntas más acuciantes acerca de la historia de DRAGON BALL! • Libra combates emblemáticos de DRAGON BALL Z a una escala increíble. Lucha en extensos campos de batalla con entornos destruibles y disputa combates épicos contra los jefes finales más icónicos de la serie (Raditz, Freezer, Célula, etc...). ¡Aumenta tu nivel de poder mediante mecánicas de RPG para hacer frente al desafío! \r\n• No solo pelearás en la piel de los Guerreros Z. ¡Vivirás como ellos! Pesca, vuela, come, entrena y combate a lo largo de las sagas de DRAGON BALL Z mientras haces amigos y estableces relaciones con un extenso elenco de personajes de DRAGON BALL. ¡Revive la historia de Son Goku y otros Guerreros Z en DRAGON BALL Z: KAKAROT! Conoce el mundo de DRAGON BALL Z no solo por sus épicos combates, sino también mientras luchas, pescas, comes y entrenas con Son Goku, Son Gohan, Vegeta y muchos más. Explora lugares nuevos y vive aventuras increíbles mientras avanzas en la historia y forjas tu amistad con los héroes del universo de DRAGON BALL Z.',
            'published_at' => '2020-01-17',
            'created_at' => now(),
            'updated_at' => now()

        ]);




        DB::table('videogames')->insert([

            'name' => 'Persona 4 Golden',
            'cover' => 'Persona_4_Golden.png',
            'price' => '19.99',
            'description' => 'Inaba, un apacible pueblo del Japón rural, es el escenario del fin de la adolescencia en Persona 4 Golden. Una historia de juventud en la que el protagonista y sus amigos se embarcan en una aventura a raíz de una serie de asesinatos. Explora y conoce a almas afines que buscan su lugar en el mundo y enfréntate al lado más oscuro de uno mismo. Persona 4 Golden promete lazos inquebrantables y experiencias compartidas con grandes amigos. Con una puntuación media de 93 en Metacritic y numerosos premios en su haber, Persona 4 Golden es uno de los mejores RPG jamás creados. En él se combinan una historia apasionante y la jugabilidad típica de la saga Persona. La experiencia de Persona 4 Golden en Steam mejora con un mando. Las características incluyen: Disfruta del juego con una velocidad de fotogramas variable (*las cinemáticas se ven a 60 FPS).\r\nAdéntrate en el mundo de Persona en tu ordenador en calidad HD.\r\nLogros de Steam y cromos.\r\nCon voces disponibles en japonés e inglés.',
            'published_at' => '2020-06-13',
            'created_at' => now(),
            'updated_at' => now()

        ]);




        DB::table('videogames')->insert([

            'name' => 'KINGDOM HEARTS HD 1.5 + 2.5 ReMIX',
            'cover' => 'KINGDOM_HEARTS_HD_1.5_2.5_ReMIX.png',
            'price' => '49.99',
            'description' => 'KINGDOM HEARTS HD 1.5 + 2.5 ReMIX es una recopilación remasterizada en alta definición de seis experiencias mágicas de KINGDOM HEARTS. KINGDOM HEARTS HD 1.5 + 2.5 ReMIX es la oportunidad perfecta para empezar a empuñar tu Llave espada y salvar los mundos de Disney de la oscuridad.',
            'published_at' => '2021-03-30',
            'created_at' => now(),
            'updated_at' => now()

        ]);


        DB::table('videogames')->insert([

            'name' => 'Mario Golf: Super Rush',
            'cover' => 'Mario_Golf_Super_Rush.png',
            'price' => '59.99',
            'description' => '¡GOLPEA LA BOLA CON TU FAMILIA Y AMIGOS EN LA ENTREGA MÁS ACELERADA DE MARIO GOLF!\r\nÚnete a tus personajes favoritos del Reino Champiñón y juega partidas de golf a toda velocidad en Mario Golf: Super Rush, solo para Nintendo Switch. Saca ventaja a los rivales en el modo \"Golf rápido\", en el que todos los jugadores lanzan al mismo tiempo y luego salen corriendo hasta el hoyo…',
            'published_at' => '2021-06-25',
            'created_at' => now(),
            'updated_at' => now()

        ]);

        DB::table('videogames')->insert([

            'name' => 'Dying Light 2 Stay Human',
            'cover' => 'Dying_Light_2_Stay_Human.png',
            'price' => '59.99',
            'description' => 'Hace más de veinte años, nos enfrentamos al virus en Harran... Y perdimos. Y ahora se avecina una nueva derrota. La Ciudad, uno de los últimos grandes asentamientos de la humanidad, está siendo destruida por las luchas internas. La civilización ha vuelto a la Edad Oscura. Pero queda esperanza.
            Eres un vagabundo con el poder de cambiar el futuro de la Ciudad. Pero tus excepcionales habilidades tienen un alto coste. Te atormentan recuerdos que no puedes descifrar, por lo que partes en busca de la verdad... y acabas en medio de una zona de combate. Practica tus habilidades porque para derrotar a tus enemigos y hacer amigos necesitarás tanto maña como fuerza. Descubre los oscuros secretos de quienes tienen poder, elige tu bando y decide tu destino. Y, hagas lo que hagas, no pierdas tu humanidad.',
            'published_at' => '2021-12-7',
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
}
