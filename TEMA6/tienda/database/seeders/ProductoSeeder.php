<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Imagen;
use Illuminate\Support\Str;


class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $productos = array(
        array(
            "precio" => 5.4,
            "nombre" => "Pulp Fiction",
            "descripcion" => "Jules y Vincent, dos asesinos a sueldo con no demasiadas luces, trabajan para el gángster Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su atractiva mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse \"manos a la obra\". Su misión: recuperar un misterioso maletín.",
            "familia_id" => 2,
            "imagen_id" => 1
        ),
        array(
            "precio" => 3.7,
            "nombre" => "El Padrino",
            "descripcion" => "América, años 40. Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Fredo (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \"Il consigliere\" Tom Hagen (Robert Duvall), se niega a participar en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.",
            "familia_id" => 1,
            "imagen_id" => 2
        ),
        array(
            "precio" => 5.75,
            "nombre" => "La vida es bella",
            "descripcion" => "En 1939, a punto de estallar la Segunda Guerra Mundial (1939-1945), el extravagante Guido llega a Arezzo, en la Toscana, con la intención de abrir una librería. Allí conoce a la encantadora Dora y, a pesar de que es la prometida del fascista Rodolfo, se casa con ella y tiene un hijo. Al estallar la guerra, los tres son internados en un campo de exterminio, donde Guido hará lo imposible para hacer creer a su hijo que la terrible situación que están padeciendo es tan sólo un juego.",
            "familia_id" => 4,
            "imagen_id" => 3
        ),
        array(
            "precio" => 7.66,
            "nombre" => "El club de la lucha",
            "descripcion" => "Un joven hastiado de su gris y monótona vida lucha contra el insomnio. En un viaje en avión conoce a un carismático vendedor de jabón que sostiene una teoría muy particular: el perfeccionismo es cosa de gentes débiles; sólo la autodestrucción hace que la vida merezca la pena. Ambos deciden entonces fundar un club secreto de lucha, donde poder descargar sus frustaciones y su ira, que tendrá un éxito arrollador.",
            "familia_id" => 1,
            "imagen_id" => 4
        ),
        array(
            "precio" => 8.7,
            "nombre" => "Cadena perpetua",
            "descripcion" => "Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins), tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos.",
            "familia_id" => 1,
            "imagen_id" => 5
        ),
        array(
            "precio" => 7.55,
            "nombre" => "La lista de Schindler",
            "descripcion" => "Oskar Schindler (Liam Neeson), un empresario alemán de gran talento para las relaciones públicas, busca ganarse la simpatía de los nazis de cara a su beneficio personal. Después de la invasión de Polonia por los alemanes en 1939, Schindler consigue, gracias a sus relaciones con los altos jerarcas nazis, la propiedad de una fábrica de Cracovia. Allí emplea a cientos de operarios judíos, cuya explotación le hace prosperar rápidamente, gracias sobre todo a su gerente Itzhak Stern (Ben Kingsley), también judío. Pero conforme la guerra avanza, Schindler y Stern comienzan ser conscientes de que a los judíos que contratan, los salvan de una muerte casi segura en el temible campo de concentración de Plaszow, que lidera el Comandante nazi Amon Goeth (Ralph Fiennes), un hombre cruel que disfruta ejecutando judíos.",
            "familia_id" => 3,
            "imagen_id" => 6
        ),
        array(
            "precio" => 10.55,
            "nombre" => "Saw",
            "descripcion" => "Adam se despierta encadenado dentro de una decrépita cámara subterránea. A su lado, hay otra persona encadenada, el Dr. Lawrence Gordon. Entre ellos hay un hombre muerto. Ninguno de los dos sabe por qué está allí, pero tienen un casette con instrucciones para que el Dr. Gordon mate a Adam en un plazo de ocho horas. Recordando una investigación de asesinato llevada a cabo por un detective llamado Tapp, Gordon descubre que él y Adam son victimas de un psicópata conocido como Jigsaw. Sólo disponen de unas horas para desenredar el complicado rompecabezas en el que están inmersos.",
            "familia_id" => 2,
            "imagen_id" => 7
        ),
        array(
            "precio" => 3.55,
            "nombre" => "Reservoir Dogs",
            "descripcion" => "Una banda organizada es contratada para atracar una empresa y llevarse unos diamantes. Sin embargo, antes de que suene la alarma, la policía ya está allí. Algunos miembros de la banda mueren en el enfrentamiento con las fuerzas del orden, y los demás se reúnen en el lugar convenido.",
            "familia_id" => 4,
            "imagen_id" => 8
        ),
        array(
            "precio" => 4.66,
            "nombre" => "El señor de los anillos: El retorno del rey",
            "descripcion" => "Las fuerzas de Saruman han sido destruidas, y su fortaleza sitiada. Ha llegado el momento de decidir el destino de la Tierra Media, y, por primera vez, parece que hay una pequeña esperanza. El interés del señor oscuro Sauron se centra ahora en Gondor, el último reducto de los hombres, cuyo trono será reclamado por Aragorn. Sauron se dispone a lanzar un ataque decisivo contra Gondor. Mientras tanto, Frodo y Sam continuan su camino hacia Mordor, con la esperanza de llegar al Monte del Destino.",
            "familia_id" => 5,
            "imagen_id" => 9
        ),
        array(
            "precio" => 11.2,
            "nombre" => "El padrino. Parte II",
            "descripcion" => "Continuación de la historia de los Corleone por medio de dos historias paralelas: la elección de Michael como jefe de los negocios familiares y los orígenes del patriarca, Don Vito Corleone, primero en su Sicilia natal y posteriormente en Estados Unidos, donde, empezando desde abajo, llegó a ser un poderosísimo jefe de la mafia de Nueva York.",
            "familia_id" => 1,
            "imagen_id" => 10
        )
    );

    public function run(): void
    {
        foreach ($this->productos as $producto) {

            $p = new Producto();
            $p->nombre = $producto['nombre'];
            $p->slug = Str::slug($producto['nombre']);
            $p->descripcion = $producto['descripcion'];
            $p->precio = $producto['precio'];
            $p->familia_id = $producto['familia_id'];
            $p->imagen_id = $producto['imagen_id'];
            $p->save();

        }
        $this->command->info('Tabla productos inicializada con datos');
    }

}
