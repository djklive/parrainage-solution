<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="config/tailwindcss.js"></script>
    <link rel="stylesheet" href="style/styleIndex.css">
</head>
<body class="bg-gray-100">

<nav class="bg-white text-black p-4 border-b-2 border-slate-300 shadow">

    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center">
            <div>
                <a href="index.php"><h1 class="font-bold text-xl">Parrainage</h1></a>
            </div>
            <div class="flex items-center gap-x-10 font-bold" id="links">
                <a href="index.php" class="hover:underline hover:duration-1000">Home</a>
                <a href="formulaireEtudiant.php" class="hover:underline hover:duration-1000">
                    S'inscrire
                </a>
                <a href="formulaireConnexion.php" class="bg-orange-400 border-2 border-orange-400 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-orange-400 hover:border-orange-400">Se connecter</a>
            </div>
            <div class="burger_menu">
                <img src="uploads/menu_30px(2).png" alt="menu_burger">
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="text-right">
            <div class="flex flex-col text-center text-black gap-y-8">
                <a href="index.php">Home</a>
                <a href="formulaireEtudiant.php">S'inscrire</a>
                <a href="formulaireConnexion.php" class="bg-orange-400 border-2 border-orange-400 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-orange-400 hover:border-orange-400">Se connecter</a>
            </div>
        </div>
    </div>

</nav>

<main>

    <div class="image-section w-full h-full">
        <div class="text-content w-full h-full">
            <h1 class="text-3xl font-bold mb-4">Bienvenue sur l'espace de parrainage IAI-CAMEROUN Centre de DOUALA</h1>
        </div>
    </div>
    <div>
        <div>
            <img src="uploads/" alt="">
        </div>
    </div>
    <section class="bg-[#FF7F50d7] h-max " >
        <h1 class="text-white text-center text-4xl font-bold pt-10 ">Quel sont nos activite?</h1>
        <div class="grid grid-cols-3 grid-rows-2 gap-6 p-4">
            <div class=" p-2 rounded ">
                <img src="uploads/culturel.jpg" alt="" class="border-8 border-white rounded-md">
        
            </div>
            <div class=" p-2 row-span-3 rounded ">
                <img src="uploads/soiree.webp" alt="" class="border-8 border-white rounded-md">
               
            </div>
            <div class=" p-2 rounded ">
                <img src="uploads/chanson.jpg" alt="" class="border-8 border-white rounded-md">
               
            </div>
            <div class=" p-2 rounded ">
                <img src="uploads/buffet.jpeg" alt="" class="border-8 border-white rounded-md">
               
            </div>
            <div class=" p-2 rounded ">
                <img src="uploads/miss.png" alt="" class=" rounded-md">
                
            </div>
            

        </div>
        <p class="text-content">Soirée de parrinage prevus initialement le 1er fevrier 2025. 
Au programme tous plein d’activiter
Miss/Master, Danser et festivite,Boisson et collation</p>
        <p class="flex justify-center w-full"><a href="#" class=" bg-white text-[#FF7F50d7] flex w-1/6 text-center flex flex-row justify-center p-3 rounded-md m-3 font-bold">En savoir plus</a></p>
    </section>
    <section>
        <h1 class="text-center text-4xl font-bold pt-10">Qui sommes nous?</h1>
        <div class="flex flex-rows justify-between items-center gap-8 p-4">
            <img class="w-72 " src="uploads/rr.png" alt="">
            <div class=" flex flex-col justify-center items-center p-4">
                <p class="w-3/4">Fonder par mr <span class="font-bold text-[#FF7F50d7]">Armand Claude abanda</span>,
IAI signifie Institue Africaine D’Informatique
forme de nombreux ingenieur chaque annee <br> L’I.A.I-Cameroun, Représentation Camerounaise de l’I.A.I, existe depuis le 1er octobre 1999 : création réalisée par l’Etat Camerounais sous la haute impulsion du Président de la République, Son Excellence Paul BIYA qui a instruit aussitôt la signature d’un accord de siège entre l’Institut Africain d’Informatique et la République camerounaise, dotant l’IAI-Cameroun d’un statut de mission diplomatique.
</p>            
                <a href="#" class="border-2 border-[#FF7F50d7] text-[#FF7F50d7] font-bold p-2 rounded-3xl hover:bg-[#FF7F50d7] hover:text-white">Voir plus</a>
            </div>
        </div>
    </section>
    <section class="bg-[#FF6347] h-max text-white m-10 p-5">
        <div class="flex flex-col justify-center items-center gap-4 p-4 md:flex-row lg:flex-row">
            <img class="w-2/5" src="uploads/reseau.jpeg" alt="">
            <div >
                <h1 class="font-bold ">Systeme et Reseau</h1>
                <p>Les systèmes et les réseaux forment 
ensemble le cœur de l'infrastructure 
informatique moderne. 
Les systèmes informatiques traitent
 les données, exécutent des applications
, et fournissent des services, 
tandis que les réseaux permettent de 
connecter ces systèmes entre eux 
pour échanger des informations</p>
            </div>
            
        </div><br>

        <div class="flex flex-col justify-center items-center gap-4 p-4 md:flex-row lg:flex-row">
           
            <div >
                <h1 class="font-bold hidden md:block lg:block">Genie Logiciel</h1>
                <p class="hidden md:block lg:block">Le génie logiciel est la discipline de 
l'informatique qui se concentre sur 
la conception, le développement, le 
test, la maintenance et la gestion des 
logiciels.</p>
            </div>
            <img class="w-2/5" src="uploads/genie-logiciel.jpg" alt="">
            <h1 class=" b-black text-left font-bold block md:hidden lg:hidden">Genie Logiciel</h1>
                <p class=" block md:hidden lg:hidden">Le génie logiciel est la discipline de 
l'informatique qui se concentre sur 
la conception, le développement, le 
test, la maintenance et la gestion des 
logiciels.</p>
            </div>
        </div>

    </section>
    <section class="my-8 h-64 flex flex-col justify-center items-center">
        <p class="text-center text-gray-900 mb-4">Commencer cette aventure avec nous</p>
        <div class="flex justify-center items-center gap-8">
            <a href="formulaireEtudiant.php" class="bg-gray-100 border-2 border-orange-400 text-orange-400 font-bold py-2 px-4 rounded shadow-md transition duration-300 ease-in-out transform hover:bg-orange-400 hover:text-white hover:border-orange-400 hover:scale-105">
                S'inscrire
            </a>
            <a href="formulaireConnexion.php" class="bg-orange-400 border-2 border-orange-400 text-white font-bold py-2 px-4 rounded shadow-md transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-orange-400 hover:border-orange-400 hover:scale-105">
                Se connecter
            </a>
        </div>
    </section>
</main>

<footer class="bg-black text-white p-10">
    <div>
        <div class="flex flex-col sm:flex-row items-center gap-y-14 sm:gap-y-0 sm:items-stretch sm:justify-around">
            <img src="uploads/logo_iai.png" alt="logo_iai" class="w- p-2">
            <div>
                <h1 class="font-bold text-xl">Reseaux sociaux</h1>
                <div class='flex gap-2'>
                    <a href="https://web.facebook.com/IAICamerounOfficiel/?locale=fr_FR&_rdc=1&_rdr#"><img src="uploads/facebook_48px.png" alt=""></a>
                    <a href="https://iaicameroun.com/home"><img src="uploads/google_48px.png" alt=""></a>
                    <a href="https://www.tiktok.com/@iaidouala?_t=ZN-8seP7YA6SHO&_r=1"><img src="uploads/tiktok_48px.png" alt=""></a>
                </div>
            </div>
            <div>
                <h1 class="font-bold text-xl">Acces rapide</h1>
                <a href="index.php">Home</a>
            </div>
            <div>
                <h1 class="font-bold text-xl">Nos coordonnees</h1>
                <a href="#" class="italic">Adresse : B.P. : 2263, IAI,<br> Libreville - Gabon</a>
                <br><a href="#" class="italic">Tel. : +237 6 71 52 47 27</a>
                <br><a href="#" class="italic">Tel. : +237 6 56 96 65 82</a>
                <br><a href="#" class="italic">Tel. : +237 6 74 58 99 58</a>
                <br><a href="#" class="italic">Email:contact@iai-siege</a>
            </div>
        </div>
    </div>
    <hr class="my-6">
    <div class='flex justify-center my-8 items-center h-6'>
        <p>Copyright &COPY; IAI 2025 | Parrainage IAI 2025 | DFK Tech</p>
    </div>
</footer>
    
<script src="script/index.js"></script>
</body>
</html>