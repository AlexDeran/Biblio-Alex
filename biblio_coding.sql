-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 28 jan. 2019 à 14:20
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `biblio_coding`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id`, `firstname`, `lastname`) VALUES
(1, 'Howard Phillips', 'Lovecraft'),
(2, 'Edgar', 'Poe'),
(3, 'Clive', 'Baker'),
(4, 'Issac', 'Asimov'),
(5, 'Eiji', 'Yoshikawa'),
(6, 'Ryu', 'Murakami'),
(7, 'Marcel', 'Proust'),
(8, 'Charles ', 'Perrault'),
(9, 'Jacob & Wilhelm', 'Grimm'),
(10, 'John Ronald Reuel', 'Tolkien'),
(11, 'George', 'Orwell'),
(12, 'Aldous', 'Huxley'),
(13, 'Arthur Conan', 'Doyle');

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

CREATE TABLE `emprunts` (
  `id_livre` int(10) UNSIGNED NOT NULL,
  `id_utilisateur` int(10) UNSIGNED NOT NULL,
  `date_emprunt` date DEFAULT NULL,
  `rendu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emprunts`
--

INSERT INTO `emprunts` (`id_livre`, `id_utilisateur`, `date_emprunt`, `rendu`) VALUES
(38, 2, '2019-01-23', 0),
(13, 2, '2019-01-07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `nom`) VALUES
(1, 'Roman noir'),
(2, 'Roman policier'),
(3, 'Anticipation'),
(4, 'Science-fiction'),
(5, 'Fantasy'),
(6, 'Poèmes'),
(7, 'Horreur'),
(8, 'Fantastique'),
(9, 'Conte'),
(10, 'Nouvelle-fiction'),
(11, 'Aventure'),
(12, 'Roman');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_edition` date DEFAULT NULL,
  `date_ajout` date DEFAULT NULL,
  `auteur_id` int(10) UNSIGNED DEFAULT NULL,
  `genre_id` int(10) UNSIGNED DEFAULT NULL,
  `resume` text,
  `img_src` varchar(50) DEFAULT 'not_found.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `date_edition`, `date_ajout`, `auteur_id`, `genre_id`, `resume`, `img_src`) VALUES
(1, 'Les montagnes hallucinées', '1936-09-14', '2019-01-21', 1, 7, 'Au cours d\'une expédition en antarctique, deux scientifiques mettent au jour, derrière une chaîne de montagnes en apparence infranchissable, les vestiges d\'une ancienne cité aux proportions gigantesques. Pendant cinq ans, un vénérable professeur d\'université devient la proie d\'étranges visions. Cherchant à comprendre ce qui l\'a \" possédé \", il découvre en Australie des ruines plus qu\'antédiluviennes cachées au regard des hommes. En visitant les dédales et recoins de ces lieux maudits, tous vont observer des fresques évoquant l\'arrivée sur terre d\'entités d\'outre-espace. Et constater que la menace de les voir reprendre le contrôle de la planète existe toujours.', 'article1.jpg'),
(2, 'Le Cauchemar d\'Innsmouth', '1936-07-13', '2019-01-21', 1, 7, 'Un thriller fantastique sous forme de descente aux enfers au coeur d\'une ville portuaire pleine de mystère et de légendes effroyables portant le nom maudit d\'Innsmouth. Résumé : Un jeune homme passionné d\'antiquités et de généalogie entame une visite de la Nouvelle-Angleterre lorsque son attention se porte sur une mystérieuse ville sinistrée et lugubre répondant au nom d\'Innsmouth. Inexorablement attiré par elle, il ignore les nombreuses mises en garde, les glaçantes rumeurs et les effroyables légendes à son sujet et décide de s’y rendre. Quelle est cette mystérieuse maladie qui semble affecter les habitants d’Innsmouth ? Que se passe-t-il sur le récif du diable au large du port les nuits de pleine lune ? Autant de questions qui trouveront leurs réponses dans une expérience qui va s’avérer bien plus profonde que le narrateur n’aurait pu l’imaginer.', 'not_found.png'),
(3, 'Dagon', '1919-11-10', '2019-01-21', 1, 7, 'Indicible et innommable, l\'horreur est partout. Une menace universelle, aux dimensions démesurées du cosmos : dans la brume entourant les falaises de Kingsport, dans une vieille maison solitaire qui entre en résonance avec l\'au-delà, dans le cadre rassurant de l\'université Miskatonic d\'Arkham, où le docteur Herbert West réanime les morts... Mais aussi en d\'autres temps, d\'autres lieux : au plus profond des abysses marines, antre du terrible dieu Dagon ; à Ulthar, où règnent en maitres les chats ; au grand temple d\'Ilarnek, dans lequel les hideux Bokrug, destructeurs de la ville de Sarnath, adorent encore aujourd\'hui leur idole impie...\r\nTrente nouvelles d\'effroi et de poésie ténébreuse, trente terribles révélations sur les secrets que dissimule la réalité', 'not_found.png'),
(4, 'La cité sans nom', '1921-11-10', '2019-01-21', 1, 7, '« Ainsi étendu, immobile et les yeux fermés, libre de méditer, de nombreux détails des fresques, que j\'avais à peine remarqués tout d\'abord, me revinrent à l\'esprit, chargés d\'un sens nouveau et effroyable... »', 'not_found.png'),
(5, 'l\'Appel de Cthulhu', '1928-02-02', '2019-01-21', 1, 7, 'Les documents retrouvés dans les biens hérités de son grand-oncle, mort dans de mystérieuses circonstances, vont mettre l\'anthropologue Francis W. Thurston sur la voie d\'une terrible vérité : tapis au fond de l\'océan, dans la cité de R\'lyeh, l\'infâme Cthulhu sommeille en attendant d\'imposer son règne sur la terre, tandis que ses disciples, réunis autour d\'un culte secret, préparent son retour. \r\n\r\nL\'oeuvre fondatrice du mythe de Cthulhu, un univers de fiction prolongé par de nombreux auteurs de littérature fantastique.', 'cthulhu.jpg'),
(6, 'l\'Étrange maison haute dans la brume', '1931-10-08', '2019-01-21', 1, 7, 'Toute la nuit, à Kingsport, on observa la falaise élevée chaque fois que la tempête et les brumes le permettaient. Lorsque, vers l\'aube, les petites fenêtres s\'assombrirent, on parla à voix basse de malheur et de désastre. Et les enfants et la femme corpulente d\'Olney adressèrent leurs implorations au dieu des Baptistes, et prièrent pour que le voyageur trouvât à emprunter un parapluie et des caoutchoucs, à moins que la pluie ne s\'arrêtât d\'ici le matin. Puis l\'aurore sortit de la mer, dégoulinante d\'eau et couronnée de brume, et les balises tintèrent solennellement dans les tourbillons de l\'éther blanc.', 'article2.jpg'),
(7, 'Dans l\'abîme du temps', '1936-07-20', '2019-01-21', 1, 7, 'Présentés dans une traduction remise à jour, les quatre récits qui composent ce recueil sont moins des nouvelles au sens courant du terme que de vertigineuses plongées dans le monde terrifiant de Howard P. Lovecraft. L\'humanité y est aux prises avec des êtres surnaturels qui ont été les maîtres de la Terre bien avant l\'apparition de l\'homme et qui tentent de recouvrer leur suprématie. Faisant appel eux images, aux mythes, aux récits de toutes les traditions perdues, Lovecraft compose des philtres puissants qui laissent dans les esprits une empreinte indélébile.', 'not_found.png'),
(8, 'Histoires extraordinnaires', '1856-04-20', '2019-01-21', 2, 8, 'Edgar Poe aime à agiter ses figures sur des fonds violâtres et verdâtres où se révèlent la phosphorescence de la pourriture et la senteur de forage. - Baudelaire.\r\n\r\nCe volume contient:\r\n- Edgar Poe, sa vie et ses œuvres - Double Assassinat dans la rue Morgue - La Lettre volée - Le Scarabée d\'or - Le Canard au ballon - Aventure sans pareille d\'un certain Hans Pfaall - Manuscrit trouvé dans une bouteille - Une descente dans le Maelstrom - La Vérité sur le cas de M. Valdemar - Révélation magnétique - Souvenirs de M. Auguste Bedloe - Morella - Ligeia - Metzengerstein', 'article4.jpg'),
(9, 'Les Histoires extraordinaires ', '1856-12-24', '2019-01-21', 2, 8, 'Le destin d\'Edgar Poe, mort à 40 ans, fut à l\'instar de certains de ses personnages, intense et court. Mais ses écrits, précurseurs du genre fantastique sont immortels. \r\nBaudelaire, séduit par ce « frère » poète maudit et mal aimé, par la souffrance belle et esthétique des Histoires extraordinaires, sera le génial traducteur des écrits de Poe. Jules Verne, lui, subjugué donnera une suite au seul roman de Poe, Les aventures d\'Arthur Gordon Pym et l\'appellera Le sphinx des glaces. \r\nAmateurs d\'intrigues policières, d\'aventures dépassant l\'entendement, il est temps pour vous de plonger dans l\'univers troublant, parfois cruel, toujours fascinant de l\'homme au chat noir', 'article5.jpg'),
(10, 'Les Aventures d\'Arthur Gordon Pym\r\n', '1858-06-20', '2019-01-21', 2, 8, 'Le destin d\'Edgar Poe, mort à 40 ans, fut à l\'instar de certains de ses personnages, intense et court. Mais ses écrits, précurseurs du genre fantastique sont immortels. \r\nBaudelaire, séduit par ce « frère » poète maudit et mal aimé, par la souffrance belle et esthétique des Histoires extraordinaires, sera le génial traducteur des écrits de Poe. Jules Verne, lui, subjugué donnera une suite au seul roman de Poe, Les aventures d\'Arthur Gordon Pym et l\'appellera Le sphinx des glaces. \r\nAmateurs d\'intrigues policières, d\'aventures dépassant l\'entendement, il est temps pour vous de plonger dans l\'univers troublant, parfois cruel, toujours fascinant de l\'homme au chat noir', 'article4.jpg'),
(11, 'Le Corbeau et autres poèmes', '1845-01-15', '2019-01-21', 2, 6, 'Une édition de référence du Corbeau d?Edgar Allan Poe, traduit par Stéphane Mallarmé, spécialement conçue pour la lecture sur les supports numériques.« Ardemment je souhaitais le jour ? vainement j?avais cherché d?emprunter à mes livres un sursis au chagrin ? au chagrin de la Lénore perdue ? de la rare et rayonnante jeune fille que les anges nomment Lénore : ? de nom pour elle ici, non, jamais plus !Et de la soie l?incertain et triste bruissement en chaque rideau purpural me traversait ? m?emplissait de fantastiques terreurs pas senties encore : si bien que, pour calmer le battement de mon c?ur, je demeurais maintenant à répéter \"C?est quelque visiteur qui sollicite l?entrée, à la porte de ma chambre ? quelque visiteur qui sollicite l?entrée, à la porte de ma chambre ; c?est cela et rien de plus.\" » (Extrait du Corbeau.)', 'not_found.png'),
(12, 'Le jeu de damnation', '1985-10-12', '2019-01-21', 3, 7, 'Quand Marty Strauss, petit criminel sans envergure, est libéré sur parole de la prison de Wandsworth pour être engagé comme garde du corps par l\'énigmatique millionnaire Joseph Whitehead, il croit que sa chance a enfin tourné et que le hasard va jouer en sa faveur.\r\n\r\nMais les jeux de hasard – Marty va le découvrir – peuvent prendre une tout autre tournure que ceux auxquels il doit sa déchéance. A mesure qu\'il se familiarise avec le domaine de Whitehead, ses habitants et Carys, la fille du millionnaire, créature tourmentée et secrète dont il tombe amoureux, il découvre qu\'une menace pèse sur eux. Cette menace s\'incarne sous les traits de Mamoulian, un étrange personnage qui s\'est baptisé le Dernier Européen et qui, au cœur des ruines de Varsovie à la fin de la Seconde Guerre mondiale, a joué avec Whitehead une partie dont il vient à présent revendiquer l\'enjeu. L\'affrontement entre les deux hommes plongera Marty et Carys dans des abîmes insoupçonnés.', 'damnation.jpg'),
(13, 'Hellraiser', '1986-12-11', '2019-01-21', 3, 7, 'Il avait enfin résolu le puzzle de la boîte de Lemarchand.\r\nIl se tenait sur le seuil d’un nouveau monde de sensations exacerbées. D’ici quelques instants, les Cénobites – qui ont passé l’éternité à la recherche de la sensualité ultime – seraient là. Ils allaient pouvoir lui révéler les secrets les plus sombres qui le transformeraient pour toujours.\r\nMais avec les plaisirs les plus exquis viendront une douleur sans pareille.\r\nAfin d’échapper à ses tortionnaires, et de retourner dans son monde, il allait avoir besoin de l’aide de sa belle-sœur, Julia, la femme qui l’aimait. Mais par-dessus tout, il allait avoir besoin de sang…', 'hellraiser.jpg'),
(14, 'Le royaume des devins', '1987-06-19', '2019-01-21', 3, 7, 'Les oiseaux se sont rassemblés par milliers au-dessus de la petite maison de Rue Street.\r\nPrésage? Perturbation magnétique? Hommage à la vieille femme toute ridée qui a vécu ici des années, terrée derrière ses volets clos et que l\'on vient d\'emmener à l\'hôpital? Mais qui est donc Mimi Laschenski? La pitoyable folle que s\'imaginent ses voisins ou la gardienne d\'un fabuleux secret? De quoi a-t-elle peur? Qui sont ces gens dotés de pouvoirs surnaturels, prêts à tout pour la retrouver? Et que se passera-t-il quand elle aura disparu? ', 'royaume_devins.jpg'),
(15, 'Le voleur d\'éternité ', '1992-08-30', '2019-01-21', 3, 7, 'C\'est une maison extraordinaire, qui semble là juste pour permettre à Harvey et à ses nouveaux amis de s\'amuser. Un lieu où tous les jours sont fête. Tout y est magnifique, jusqu\'au moment où l\'on cherche à s\'en évader et où le rêve se transforme en un terrifiant cauchemar.', 'not_found.png'),
(16, 'Les robots', '1950-10-10', '2019-01-21', 4, 4, 'Susan Calvin est robopsychologue à l\'United States Robots, Inc. Née en 1982, elle a aujourd\'hui 75 ans. Ce livre relate ses souvenirs sur l\'évolution du robot dans l\'histoire humaine, depuis Robbie qui, en 1996, fut vendu comme bonne d\'enfants jusqu\'à Byerley qui devient président de la Fédération mondiale terrestre en 2044. A travers ces récits, on voit comment le robot, d\'abord esclave soumis à l\'homme, parvient peu à peu à être son égal, avant de devenir son maître. Les souvenirs du Dr Calvin forment un livre au charme désuet qui fait revivre l\'aube du XXIème siècle, époque où l\'homme existait encore indépendamment de son compagnon de métal, le robot. ', 'robot.jpg'),
(17, 'Un défilé de robot', '1964-10-10', '2019-01-21', 4, 4, 'Histoire du futur, Cycle 02 : Les robots, Tome 02\r\n\r\nComment risque de réagir un robot programmé pour un environnement lunaire dès lors qu\'il se retrouve égaré sur Terre ? Un robot peut-il mentir à un procès pour préserver les intérêts de son utilisateur ? Le docteur Susan Calvin, robopsychologue, dialogue avec les androïdes pour faire la lumière sur ces étranges affaires. Et découvre davantage de défauts de programmation chez l\'homme que chez ses fidèles créations..', 'robot2.jpg'),
(18, 'Les cavernes d\'acier', '1954-10-10', '2019-01-21', 4, 4, 'Source : 4ème de couverture du livre (ISBN 2-277-12404-4) imprimé en mars 1986\r\n\r\nLes cavernes d\'acier sont les villes souterraines du futur. Là, bien que privés d\'air et de lumière naturels, des millions d\'hommes vivent à un rythme étourdissant.\r\nMalgré une civilisation super scientifique et l\'apparition de robots intelligents, les passions humaines n\'ont pas cessé pour autant et le meurtre n\'a pas disparu. \r\nMais le problème de Lije Baley n\'est pas seulement de retrouver un meurtrier, il est aussi d\'y parvenir avant son collègue R. Daneel. R. = Robot, car R. Daneel est un androïde au cerveau électronique ultraperfectionné, créé certes par l\'homme, mais qui n\'attend peut-être que l\'occasion de prendre sa place.', 'not_found.png'),
(19, 'Fondation', '1942-10-10', '2019-01-21', 4, 4, 'En l\'an 12.065, grâce à la psychohistoire, vous pouvez prévoir l\'avenir.\r\nMais, si vos conclusions déplaisent au Gouvernement, vous irez croupir en exil, dans la plus isolée des 25 millions de planètes que possède l\'empire.\r\n…l\'Histoire se répète.\r\nLe premier volet d’une trilogie qui compte parmi les dix plus grands livres des toute l\'histoire de la science-fiction américaine.\r\nPar un auteur qui est à la fois écrivain et homme de science.', 'not_found.png'),
(20, 'Fondation et Empire', '1952-10-10', '2019-01-21', 4, 4, 'Tandis que les crises qui secouent l\'Empire redoublent de violence et annoncent son effondrement définitif, la Fondation créée par le psychohistorien Hari Seldon pour sauvegarder la civilisation devient de plus en plus puissante, suscitant naturellement convoitises et visées annexionnistes. En tout premier lieu, celles de Bel Riose, jeune général qui voit dans les secrets détenus par la Fondation le moyen de monter sur le trône.\r\nC\'est alors qu\'apparaît un mystérieux et invincible conquérant, surnommé le Mulet, que le plan de Seldon n\'avait pas prévu...', 'found_empire.jpg'),
(21, 'Seconde Fondation', '1953-10-10', '2019-01-21', 4, 4, 'Conçue par le psychohistorien Hari Seldon pour restreindre l\'ère de chaos résultant de la décadence de l\'Empire galactique, la Fondation est désormais aux mains du Mulet, un mutant imprévisible capable de manipuler les esprits et d\'imposer sa volonté à quiconque. Avec ses pouvoirs et les immenses ressources que lui procure la Fondation, il s\'est donné pour objectif d\'étendre sa domination aux ultimes vestiges de l\'Empire défunt. Mais déjà une nouvelle légende prend forme : il existerait une seconde Fondation, consacrée aux sciences mentales, œuvrant de façon occulte pour garantir l\'accomplissement des desseins du légendaire Hari Seldon... Le cycle de Fondation a obtenu en 1966 un Prix Hugo spécial le consacrant \" meilleure série de tous les temps. \"', 'second_foundation.jpg'),
(22, 'La pierre et le sabre', '1935-10-10', '2019-01-21', 5, 11, '\"Le sabre perça l\'air avec le bruit sec d\'une corde d\'arc, et un cri foudroyant remplit l\'espace vide...\r\nUn énorme soleil rouge jaillit en flammes au-dessus du Higashiyama... Fasciné, vibrant de vie, Musashi le regardait monter...\r\nSon sang parut sur le point de jaillir de ses pores. On eût dit le diable même, surgi de l\'enfer.\"\r\n\r\nDans le Japon du XVIIe siècle, Miyamoto Musashi, jeune homme fougueux, n\'aspire qu\'à se battre. Recherché dans tout le pays, il est recueilli par un moine et n\'a bientôt plus qu\'un but : tendre à la perfection grâce aux arts martiaux.\r\nSon sabre sera désormais serviteur du bien. Il ira de combats en conquêtes à la recherche d\'amour et de sagesse, épaulé par le chant de sa tendre Otsu.\r\nUn grand classique du récit initiatique qui marie amour, aventure et quête de soi.', 'not_found.png'),
(23, 'La parfaite lumière', '1935-12-12', '2019-01-21', 5, 11, '\"Soudain, il vit la vérité : les techniques de l\'homme d\'épée n\'étaient pas son but ; il cherchait une Voie du sabre qui embrassât toute chose. (...) Pour la première fois, il se demanda s\'il était possible à un être humain insignifiant de ne faire qu\'un avec l\'univers.\" Le jeune Takezô est devenu Miyamoto Musashi, redoutable samouraï. Il sait maintenant que l\'art du sabre ne s\'acquiert qu\'à force de sacrifices et de choix, qu\'il est aussi art de la Vie. Sur les terres entourant le mont Fuji, la belle Otsu, le disciple Jotaro et l\'enfant lori suivent les traces de Musashi : ceux qui le vénèrent doivent accepter, eux aussi, la rude discipline du samouraï. Affrontements, rencontres, épreuves et leçons : telle est la voie de la sagesse, l\'unique voie menant à la parfaite lumière. Mais pour l\'atteindre, Musashi doit engager l\'ultime combat. ', 'not_found.png'),
(24, 'Les bébés de la consigne automatique', '1980-10-10', '2019-01-21', 6, 10, 'Au Japon, les nouveau-nés abandonnés dans les consignes des gares sont voués à une mort certaine. Deux d\'entre eux pourtant, Hashi et Kiku, vont vivre. La vie de ces deux enfants est une plaie béante qui ne se cicatrise pas, un cri qui ne se tait pas. Le cauchemar les hante, leur univers s\'est réduit aux parois d\'une consigne, un monde sans espoir où l\'on cherche une échappatoire tout en sachant qu\'elle n\'existe pas. Autour d\'eux, un brouillard épais et pesant s\'est formé, un ciel plombé, où seule la survie reste possible. Et cependant, des éclaircies parfois apparaissent, un chant qui surgit de la gorge de Hashi comme une accalmie au milieu d\'une tempête, un saut de Kiku comme une envolée vers un ciel plus bleu, des moments d\'émotion suspendus. Mais la douleur est plus forte, aucune libération n\'est possible et, ne pouvant supprimer la souffrance, c\'est en l\'infligeant aux autres qu\'ils tenteront de l\'oublier. Ryû Murakami dépeint un univers de destruction, de désolation avec une telle poésie que cette atrocité même devient belle, belle comme peut l\'être la mort, belle comme peut l\'être la guerre, belle comme le sont parfois les hommes. --Lenaïc Gravis et Jocelyn Blériot ', 'not_found.png'),
(25, 'Miso Soup', '1997-08-08', '2019-01-21', 6, 1, 'Kabukichô, Tokyo. Trois nuits de décembre, en cette fin de millénaire, deux hommes errent ensemble dans les quartiers louches de la capitale qui grouillent de clubs de rencontre, de peep shows et de \"lingerie pubs\" pour une humanité en déshérence. Une relation étrange se noue entre eux, entre Kenji, vingt ans, qui guide les touristes au coeur des lieux de plaisir, et Franck, l\'Américain, le gaijin, meurtrier inquiétant avec qui il joue au chat et à la souris. Surgit peu à peu une terreur sourde qui va finalement éclater dans une symphonie sanglante. Dans ce roman court et percutant, Ryû Murakami dresse un tableau précis, terrible, de la réalité japonaise, d\'hommes et de femmes qui se tuent au travail, de lycéennes qui se prostituent sans avoir besoin d\'argent, de familles déchirées et d\'universités sans pitié. Ryû Murakami est l\'auteur de plusieurs romans où il dépeint, avec ce style minutieux et froid qui le caractérise, \"l\'effondrement de la société japonaise\" et raconte cette nouvelle jeunesse errant sans idéal dans un \"monde sans âme\", qui ploie sous les richesses et sous le poids de sa propre solitude. Sans en avoir tout à fait la puissance littéraire, Miso Soup rappelle irrésistiblement l\'American Psycho de Bret Easton Ellis. --Maya Kandel ', 'miso_soup.jpg'),
(26, 'Parasites', '2000-08-09', '2019-01-21', 6, 7, 'Un jeune homme, Uehara, croit abriter en son corps un parasite avec lequel il vit en symbiose. Ce ver est le signe qu\'il a été choisi pour accomplir une mission : détruire une espèce qui a programmé son propre anéantissement. L\'espèce humaine, bien sûr. On pourrait raconter l\'histoire autrement. Uehara vit en reclus dans son appartement jusqu\'au jour où sa mère lui achète un ordinateur portable et où il se connecte à l\'Internet. Il entre en relation avec une organisation appelée INTER-BIO qui le persuade qu\'il est investi du droit de tuer et de massacrer ses semblables. Et pourtant, c\'est encore une autre histoire que raconte le roman de Murakami. Car l\'Intemet peut devenir le déclencheur d\'une traversée du miroir où rejoindre enfin le réel, toucher la réalité de ses mains nues. Le réseau pousse Uehara à sortir, à reprendre contact avec les sensations les plus physiques, à marcher à la rencontre des autres et de lui-même. C\'est ainsi que dans ce roman très dense, qui brasse biotechnologies, manipulations informatiques, attentats terroristes, meurtres rituels et traumatismes de la dernière guerre, une histoire très simple nous est relatée, et finalement porteuse d\'espoir : celle d\'un homme qui cherche, et trouve, un sens à son existence.', 'parasites.jpeg'),
(27, 'Melancholia', '2000-06-03', '2019-01-21', 6, 1, 'Yazaki se confie à Michiko, une journaliste japonaise installée à New York.\r\nPourquoi a-t-il été SDF ? Quelle est la nature de la passion jalouse et dévorante qui l\'a lié à Reiko et dont il prétend avoir réussi à guérir ? Quel rôle a joué sa rencontre avec Johnson, un autre sans-logis, qui, en phase terminale d\'un sida, finit par se suicider ? Réflexion sur les métaphores du désir, de la jouissance et de la souffrance, Melancholia décrit le lent processus de fascination exercé par le récit de Yazaki sur Michiko.\r\nMais sous l\'apparente sincérité des propos de Yazaki se cache la possibilité d\'un nouveau piège, l\'occasion d\'un jeu pervers redoublé, comme en témoigne le coup de théâtre des dernières pages qui plongent brutalement le lecteur dans l\'horreur. On ne souffre réellement, comme on ne jouit d\'ailleurs, que de son imagination, semble le leitmotiv de ce second volet de la trilogie - avec Ecstasy et Thanatos - regroupée par Murakami sous le titre \" Monologues sur le plaisir la lassitude et la mort \".', 'melancholia.jpg'),
(28, 'Du coté de chez Swann', '1913-11-14', '2019-01-21', 7, 12, 'L\'édition d\'A la recherche du temps perdu, publiée dans cette collection en trois volumes, est une édition complète. Les textes de La Prisonnière, de La Fugitive et du Temps retrouvé ont été établis d\'après les manuscrits autographes acquis par la Bibliothèque nationale. Quant aux autres volumes, ils ont été établis d\'après les manuscrits, les dactylographies et les épreuves corrigées par Proust, ces documents étant également conservés à la Bibliothèque nationale. Ces travaux sont dus à : - André Alain Morello, ancien élève de l\'Ecole normale supérieure, agrégé de lettres, pour Du côté de chez Swann ; - Michelle Berman, agrégée de lettres, pour A l\'ombre des jeunes filles en fleurs et Sodome et Gomorrhe ; - Jo Yoshida, professeur à l\'université de Kyoto, docteur ès lettres, pour Le Côté de Guermantes ; - Thierry Laget, docteur ès lettres, pour La Prionnière, La Fugitive et Le Temps retrouvé. La préface générale à l\'oeuvre et les sept préfaces particulières précédant chaque titre ont été écrites par Bernard Raffalli, maître de conférences à Paris-IV (Paris-Sorbonne). Les notes ont été rédigées par André Alain Morello. Les index ont été établis par Pierrette Crouzet-Daurat, Dominique Frémy, Françoise Gacon et Julie Paolini. Le Quid de Marcel Proust, imaginé et dirigé par Dominique Frémy, a pour auteur Philippe Michel-Thiriet. \r\n', 'not_found.png'),
(29, 'Sodome et Gomorrhe', '1921-10-10', '2019-01-21', 7, 12, 'Marcel Proust est probablement le premier des grands écrivains qui ait franchi les portes de Sodome et Gomorrhe en flammes. Il songea d\'ailleurs à donner le nom des deux cités bibliques à l\'ensemble de son oeuvre - l\'objet véritable de son étude n\'est pas l\'idéalisation d\'une passion singulière ni l\'explication philosophique de son mystère ni la psychologie amoureuse de ses desservants - psychologie qui obéit simplement aux lois générales de l\'amour. C\'est le portrait vivant, incarné par le plus hautain des seigneurs, de \"l\'homme traqué \" par la société, en révolte latente contre elle, c\'est la lutte de la nature contre la morale. ', 'not_found.png'),
(30, 'La Prisonnière', '1923-10-10', '2019-01-21', 7, 12, 'La Prisonnière est le cinquième tome de À la recherche du temps perdu de Marcel Proust publié à titre posthume.Le thème principal de ce volume est l\'amour possessif et jaloux qu\'éprouve le narrateur pour Albertine. Il la fait surveiller, la soupçonne de liaisons homosexuelles, essaie de la retenir chez lui.', 'not_found.png'),
(31, 'Les plaisirs et les jours', '1896-11-10', '2019-01-21', 7, 6, '\r\n«Nouvelles mondaines, histoires tendres, vers mélodiques, fragments où la précision du trait s\'atténue dans la grâce molle de la phrase, M. Proust a réuni tous les genres et tous les charmes. Aussi les belles dames et les jeunes gens liront avec un plaisir ému un si beau livre.» Léon Blum «Il n\'est pas simple de louer M. Marcel Proust : son premier livre, ce Traité des Plaisirs et des Jours, qu\'il vient de publier, marque une si extrême diversité de talents que l\'on peut être embarrassé d\'avoir à les noter tous à la fois chez un aussi jeune écrivain. Il le faut cependant. Il faut même avouer que ces dons si variés ne se contrarient point, mais, au contraire, forment un assemblage heureux, brillant et facile.» Charles Maurras', 'not_found.png'),
(32, 'Les contes de Perrault', '2003-10-10', '2019-01-21', 8, 9, '\" Il était une fois un roi et une reine... \", \" il était une fois une petite fille de village... \" Il suffit de cette clé magique pour que s\'ouvre à nous le monde où paraissent tour à tour la belle au bois dormant, le petit chaperon rouge, la barbe bleue ou Cendrillon. Perrault puise dans le folklore ancien pour nous conter dans des\r\nrécits courts et alertes des histoires qui nous éloignent délicieusement du monde, avant que la morale finale nous y reconduise. Des contes de fées ? Sans doute. Mais, autant que le merveilleux, ce qui nous enchante, c\'est le naturel et la savante simplicité d\'un art d\'écrire\r\nqui, à chaque page, séduit notre imagination. D\'abord parus séparément en 1694 et 1697, ce n\'est qu\'à la fin du XVIIIe siècle que les contes en vers et en prose seront réunis en un même volume, signe que l\'engouement qu\'ils avaient suscité du vivant de Perrault ne se démentait pas, en dépit du jugement sévère des gens de lettres, à l\'époque des Lumières, pour ces\r\npuériles bagatelles. Mais le public le plus large demeurait fidèle à ces contes - et ce public, c\'est aujourd\'hui nous dont l\'esprit d\'enfance ne s\'est pas perdu.', 'not_found.png'),
(33, 'Les contes de l\'enfance et du foyer', '1812-10-10', '2019-01-21', 9, 9, '\" Les Contes de Grimm \", qui n\'en a jamais entendu parler ? Cette œuvre fait partie de l\'imaginaire collectif. Elle traverse les époques sans prendre une ride et touche toutes les générations, aussi bien les enfants que les adultes. Si cet ouvrage vous donnera l\'occasion de redécouvrir les contes les plus célèbres des frères Grimm, tels Hansel et Grethel, Cendrillon, Blanche- Neige ou Les musiciens de Brême, il vous permettra également de plonger dans un univers inconnu et fascinant, qui mêle le rêve, la magie et le suspense. Voulez-vous rencontrer Le. Diable et sa grande mère Frissonner enlisant L\'histoire de celui qui s\'en alla apprendre la peur ?Vous esclaffer devant les mésaventures des Sept Souabes ? Il ne tient qu\'à vous d\'entrer. Ce monde merveilleux et palpitant...', 'not_found.png'),
(34, 'La communauté de l\'anneau', '1954-07-29', '2019-01-21', 10, 5, 'Le Tiers Age touche à sa fin, et la Terre du Milieu à son crépuscule. La Compagnie de l\'Anneau va donc tâcher de déjouer les projets infernaux de Sauron, force du mal d\'autant plus difficile à combattre qu\'elle est désincarnée. Qui, des cinq héros, mènera à bien la mission ? Gandalf, grand sage qui seul mesure la portée de la quête ? Aragorn, qui dissimule ses origines princières sous les traits d\'un rôdeur taciturne ? Frodon et Sam, qui sont chargés de la phase finale de la mission ou Gollum, créature abjecte qui fut un temps dépositaire de l\'anneau ? Mais quel est donc le pouvoir de cet anneau tant convoité ? Quelle est donc la signification de l\'énigme qui figure en première page, en manière d\'épigraphe ?', 'lsda.jpg'),
(35, 'Les deux tours', '1954-11-11', '2019-01-21', 10, 5, 'Frodon le Hobbit et ses Compagnons se sont engagés, au Grand Conseil d\'Elrond, à détruire l\'Anneau de Puissance dont Sauron de Mordor cherche à s\'emparer pour asservir tous les peuples de la terre habitée : Elfes et Nains, Hommes et Hobbits.', 'deux_tours.jpg'),
(36, 'Le retour du roi', '1955-10-20', '2019-01-21', 10, 5, 'Avec \"Le Retour du Roi\" s\'achèvent dans un fracas d\'apocalypse les derniers combats de la guerre de l\'Anneau.\r\nTandis que le continent se couvre de ténèbres, annonçant pour le peuple des Hobbits l\'aube d\'une ère nouvelle, Frodon poursuit son entreprise.\r\nAlors qu\'il n\'a pu franchir la Porte Noire, il se demande comment atteindre le Mont du Destin. Peut-être est-il trop tard : le Seigneur des Ténèbres mobilise ses troupes.\r\nLes Rohirrim n\'ont plus le temps d\'en finir avec le traître assiégé dans l\'imprenable tour d\'Orthanc ; ils doivent se rassembler pour faire face à l\'ennemi.\r\nTentant une fois de plus sa chance, Frodon passe par le Haut Col, où il sera livré à l\'abominable Arachné. Survivra-t-il à son dangereux périple à travers le Pays Noir ?', 'retour_roi.jpg'),
(37, 'Le Silmarillion', '1977-09-15', '2019-01-21', 10, 5, 'Les Premiers Jours du Monde étaient à peine passés quand Fëanor, le plus doué des elfes, créa les trois Silmarils.\r\nCes bijoux renfermaient la Lumière des Deux Arbres de Valinor. Morgoth, le premier Prince de la Nuit, était encore sur la Terre du Milieu, et il fut fâché d\'apprendre que la Lumière allait se perpétuer. Alors il enleva les Silmarils, les fit sertir dans son diadème et garder dans la forteresse d\'Angband. Les elfes prirent les armes pour reprendre les joyaux et ce fut la première de toutes les guerres.\r\nLongtemps, longtemps après, lors de la Guerre de l\'Anneau, Elrond et Galadriel en parlaient encore.', 'silmarillion.jpg'),
(38, 'Bilbo le Hobbit', '1937-09-21', '2019-01-21', 10, 5, 'Monsieur Bilbo Sacquet, paisible et respectable petit hobbit aux pieds laineux, ne serait jamais sorti de son confortable anonymat, rythmé par l\'arrosage des plates-bandes de sa coquette demeure de Cul-de-Sac, le bourrage de sa pipe, et le sifflement de sa bouilloire, s\'il n\'avait pas, un beau jour de printemps, commis la folle imprudence d\'inviter à prendre le thé le magicien Gandalf, accompagné de treize nains décidés et barbus, cherchant à enrôler un expert-cambrioleur pour les seconder dans leur quête du fabuleux trésor gardé par le vieux dragon Smaug. Fort heureusement, il y avait beaucoup plus de ressources en Bilbo qu\'il ne l\'imaginait lui-même...\r\n', 'not_found.png'),
(39, 'La ferme des animaux', '1945-10-10', '2019-01-21', 11, 3, 'Un certain 21 juin eut lieu en Angleterre la révolte des animaux. Les cochons dirigent le nouveau régime. Boule de Neige et Napoléon, cochons en chef, affichent un règlement:\r\n“Tout deuxpattes est un ennemi. Tout quatrepattes ou tout volatile, un ami. Nul animal ne portera de vêtements. Nul animal ne dormira dans un lit. Nul animal ne boira d’alcool. Nul animal ne tuera un autre animal. Tous les animaux sont égaux.”\r\nLe temps passe. La pluie efface les commandements. L’âne, un cynique, arrive encore à déchiffrer : \r\n“Tous les animaux sont égaux, mais certains le sont plus que d’autres.”', 'not_found.png'),
(40, '1984', '1949-10-10', '2019-01-21', 11, 3, 'Quatrième de couverture - « De tous les carrefours importants, le visage à la moustache noire vous fixait du regard. BIG BROTHER VOUS REGARDE, répétait la légende, tandis que le regard des yeux noirs pénétrait les yeux de Winston... Au loin, un hélicoptère glissa entre les toits, plana un moment, telle une mouche bleue, puis repartit comme une flèche, dans un vol courbe. C\'était une patrouille qui venait mettre le nez aux fenêtres des gens. Mais les patrouilles n\'avaient pas d\'importance. Seule comptait la Police de la Pensée. »', 'not_found.png'),
(41, 'Le meilleur des mondes', '1931-10-10', '2019-01-21', 12, 3, 'Bienvenue au Centre d\'Incubation et de Conditionnement de Londres-Central. À gauche, les couveuses où l\'homme moderne, artificiellement fécondé, attend de rejoindre une société parfaite. À droite : la salle de conditionnement où chaque enfant subit les stimuli qui plus tard feront son bonheur. Tel fœtus sera Alpha – l\'élite – tel autre Epsilon – caste inférieure. Miracle technologique : ici commence un monde parfait, biologiquement programmé pour la stabilité éternelle... La visite est à peine terminée que déjà certains ricanent. Se pourrait-il qu\'avant l\'avènement de l\'État Mondial, l\'être humain ait été issu d\'un père et d\'une mère ? Incroyable, dégoûtant... mais vrai. Dans une réserve du Nouveau Mexique, un homme Sauvage a échappé au programme. Bientôt, il devra choisir : intégrer cette nouvelle condition humaine ou persister dans sa démence...', 'not_found.png'),
(42, 'Ile', '1962-10-10', '2019-01-21', 12, 3, 'Bienvenue à Pala, une île où l\'Orient et l\'Occident s\'embrassent, où tout est pour le mieux dans le plus juste, le plus sage, le plus pacifique environnement qui soit. Utopie ? Soit. Mais pour Will Farnaby, journaliste et heureux naufragé, le rêve est bien réel. Communion des hommes et de la nature, paradis artificiels, méditation, sagesse, liberté, respect des ressources et des individus...\r\n\r\nOn la disait imaginaire : Pala s\'ouvre à lui, bien réelle.\r\nHélas, la perfection n\'est pas appelée à durer. Cette enclave idéale, ce système autonome ne tarde pas à attirer les plus funestes convoitises. Le sultanat voisin - et, derrière lui, de féroces appétits internationaux - menace bientôt sa douce quiétude. A croire que ce que l\'homme a fait de plus beau, l\'homme peut le défaire. L\'homme doit le défaire. Le meilleur des mondes, décidément, n\'est pas pour demain...', 'ile.jpg'),
(43, 'Une étude en rouge', '1887-10-10', '2019-01-21', 13, 2, 'Au n° 3 de Lauriston Gardens près de Londres, dans une maison vide, un homme est trouvé mort. Assassiné ? Aucune blessure apparente ne permet de le dire, en dépit des taches de sang qui maculent la pièce. Sur le mur, griffonnée à la hâte, une inscription : \" Rache ! \" Vengeance ! Vingt ans plus tôt, en 1860, dans les gorges de la Nevada, Jean Ferrier est exécuté par des mormons sanguinaires chargés de faire respecter la loi du prophète. Sa fille, Lucie, est séquestrée dans le harem du fils de l\'Ancien. Quel lien entre ces deux événements aussi insolites que tragiques ? Un fil ténu, un fil rouge que seul Sherlock Holmes est capable de dérouler. Une intrigue toute en subtilités où, pour la première fois, Watson découvre le maître...', 'not_found.png'),
(44, 'Le Signe des quatre ', '1890-10-10', '2019-01-21', 13, 2, 'Chaque année, la jeune Mary Morstan, dont le père, officier dans l\'armée des Indes, a disparu voilà longtemps, reçoit par la poste le présent d\'une perle. Le jour où une lettre lui fixe un mystérieux rendez-vous, elle demande au célèbre Sherlock Holmes de l\'y accompagner... Cependant que le bon Dr Watson est conquis par le charme de la jeune fille, nous nous enfonçons dans une des plus ténébreuses énigmes qui se soient offertes à la sagacité du détective. L\'Inde des maharajahs, le fort d\'Agra cerné par la rébellion des Cipayes, le bagne des îles Andaman sont les décors de l\'extraordinaire aventure qu\'il va reconstituer, et qui trouvera sa conclusion dans les brouillards de la Tamise... \r\n\r\nUne des plus inoubliables aventures de Sherlock Holmes, publiée pour la première fois en 1889.', 'not_found.png'),
(45, 'Le Chien des Baskerville ', '1902-10-10', '2019-01-21', 13, 2, 'Sir Charles Baskerville, revenu vivre une paisible retraite dans le manoir de ses ancêtres, au cœur des landes du Devonshire, est retrouvé mort à la lisière des marécages, le visage figé dans une absolue terreur. Autour du cadavre, on relève les empreintes d\'un chien gigantesque. Ami et médecin de la victime, James Mortimer sait que son patient était troublé par une vieille malédiction : un chien viendrait de l\'enfer pour réclamer les âmes des descendants des Baskerville. Il décide de faire appel à Sherlock Holmes pour protéger Henry, l\'héritier de la victime. En acceptant, le fameux détective ignore qu\'il met en péril sa propre vie. Paru en 1902, ce roman est la plus célèbre des aventures d\'Holmes. Il est baigné d\'éléments fantastiques qui amènent le fameux détective à douter de ses pouvoirs de déduction. Même le docteur Watson a du mal à le suivre ! La résolution du mystère mettra fin à ses interrogations. Cette fois-ci, le maître de la logique s\'en tire de justesse... Lisa B.', 'not_found.png'),
(46, 'La Vallée de la peur', '1915-10-10', '2019-01-21', 13, 2, 'Sherlock Holmes vient à peine de déchiffrer un message codé le prévenant qu\'un certain Douglas de Birlstone Manor House, est en grave danger, qu\'il apprend par l\'inspecteur MacDonald de Scotland Yard que Douglas vient d\'être affreusement assassiné.\r\nPar le signataire du message, Sherlock Holmes sait que derrière cette affaire se trouve son ennemi juré : le professeur Moriarty, criminel génial et machiavélique. Accompagné de son fidèle Watson, Holmes se précipite à Birlstone...\r\nRempli d\'intrigues et d\'action, La Vallée de la peur, où l\'on voit Sherlock Holmes se mesurer avec Moriatry adversaire en tous points à sa taille, est sans doute le meilleur roman de Conan Doyle.', 'not_found.png');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `date_abonnement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `prenom`, `nom`, `statut`, `email`, `mdp`, `adresse`, `date_abonnement`) VALUES
(1, 'Sarah', 'Croche', 'admin', 'sarah.croche@gmail.com', '0000', '2 rue de la Fibre, 66 000 Codingue', '0000-00-00'),
(2, 'Robert', 'Ford', 'abonne', 'Frobert@gmail.fr', '1234', '10 rue du Deux, 10420 Troyes', '2019-02-22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `auteur_id` (`auteur_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD CONSTRAINT `emprunts_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id`),
  ADD CONSTRAINT `emprunts_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `livres_ibfk_2` FOREIGN KEY (`auteur_id`) REFERENCES `auteurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
