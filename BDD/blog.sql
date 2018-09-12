-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 12 sep. 2018 à 19:57
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `dateComment` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `dateComment`, `id_user`, `id_post`) VALUES
(9, 'Commentaire', '2018-09-09 16:51:04', 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `created_at`, `update_at`, `id_user`) VALUES
(3, 'Portraits', '<p>Lorsque le p&egrave;re de Roy revint, il affichait un large sou rire qu\'il essayait de dissimuler en &eacute;vitant le regard de son fils tandis qu\'ils d&eacute;chargeaient l\'&eacute;quipement de radio dans une bo&icirc;te &eacute;tanche, les armes dans des &eacute;tuis imperm&eacute;ables, le mat&eacute;riel de p&ecirc;che, les premi&egrave;res conserves et les outils rang&eacute;s dans des caisses.<br />Puis il fallut &agrave; nouveau &eacute;couter le pilote pendant que son p&egrave;re s&rsquo;&eacute;loignait en une l&eacute;g&egrave;re courbe, laissant dans son sillage une petite tra&icirc;n&eacute;e blanche qui s&rsquo;apaisait rapidement en vaguelettes sombres, comme si elles ne pouvaient d&eacute;ranger qu&rsquo;un minuscule coin du monde et que, de ses tr&eacute;fonds, cette r&eacute;gion se ravalerait elle-m&ecirc;me en quelques instants. L&rsquo;eau &eacute;tait limpide mais suffisamment profonde, m&ecirc;me si pr&egrave;s de la c&ocirc;te, pour que Roy n&rsquo;en voie pas le fond.<br />Plus pr&egrave;s de la rive, par contre, &agrave; la limite du miroitement, il devinait les formes floues des branches et des pierres sous la surface. Son p&egrave;re portait une chemise de chasse en flanelle rouge et un pantalon gris. Il n&rsquo;avait pas de chapeau, bien que l&rsquo;air f&ucirc;t plus frais que ne l&rsquo;avait anticip&eacute; Roy. Le soleil brillait sur son cr&acirc;ne, m&ecirc;me d&rsquo;aussi loin il le voyait scintiller sur ses cheveux fins. Son p&egrave;re plissait les yeux dans la lueur &eacute;clatante du matin, mais un c&ocirc;t&eacute; de sa bouche &eacute;tait relev&eacute; en un sourire. Roy avait envie de le rejoindre, de poser pied &agrave; terre et d&rsquo;inspecter leur nouvelle maison, mais il restait deux allers retours avant qu&rsquo;il puisse y aller.<br />ls avaient empaquet&eacute; leurs habits dans des sacs-poubelle, ainsi que leurs v&ecirc;tements de pluie, leurs bottes, leurs couvertures, deux lampes, davantage de nourriture et des livres. Roy avait une caisse pleine de manuels scolaires. Ce serait une ann&eacute;e enti&egrave;re d&rsquo;enseignement &agrave; domicile &ndash; maths, anglais, g&eacute;ographie, sciences sociales, histoire, grammaire et physique-chimie niveau 4e , qu&rsquo;il m&egrave;nerait &agrave; bien allez savoir comment puisque les cours impliquaient des exp&eacute;riences et qu&rsquo;ils n&rsquo;avaient pas l&rsquo;&eacute;quipement n&eacute;cessaire<br />Sa m&egrave;re avait pos&eacute; la question &agrave; son p&egrave;re, qui n&rsquo;avait formul&eacute; aucune r&eacute;ponse claire. Sa m&egrave;re et sa s&oelig;ur lui manqu&egrave;rent soudain, et les yeux de Roy s&rsquo;embu&egrave;rent, mais il aper&ccedil;ut son p&egrave;re qui repoussait l&rsquo;embarcation sur la plage de galets et il s&rsquo;obligea &agrave; se calmer.</p>', '2018-08-15 18:23:35', NULL, 1),
(4, 'Les opposés', '<p>Ils ne connaissaient pas cet endroit ni son mode de vie, ils se connaissaient mal l&rsquo;un l&rsquo;autre. Roy avait treize ans cet &eacute;t&eacute;-l&agrave;, l&rsquo;&eacute;t&eacute; suivant son ann&eacute;e de cinqui&egrave;me &agrave; Santa Rosa, en Californie, o&ugrave; il avait v&eacute;cu chez sa m&egrave;re, avait pris des cours de trombone et de foot, &eacute;tait all&eacute; au cin&eacute;ma et &agrave; l&rsquo;&eacute;cole en centre-ville. Son p&egrave;re avait &eacute;t&eacute; dentiste &agrave; Fairbanks.<br />Ils s&rsquo;installaient &agrave; pr&eacute;sent dans une petite cabane en c&egrave;dre au toit pentu en forme de A. Elle &eacute;tait blottie dans un fjord, une minuscule baie du Sud-Est de l&rsquo;Alaska au large du d&eacute;troit de Tlevak, au nord-ouest du parc national de South Prince of Wales et &agrave; environ quatre-vingts kilom&egrave;tres de Ketchikan.<br />Le seul acc&egrave;s se faisait par la mer, en hydravion ou en bateau. Il n&rsquo;y avait aucun voisin. Une montagne de six cents m&egrave;tres se dressait juste derri&egrave;re eux en un immense tertre reli&eacute; par des cols de basse altitude &agrave; d&rsquo;autres sommets jusqu&rsquo;&agrave; l&rsquo;embou&shy;chure de la baie et au-del&agrave;. L&rsquo;&icirc;le o&ugrave; ils s&rsquo;installaient, Sukkwan Island, s&rsquo;&eacute;tirait sur plusieurs kilom&egrave;tres derri&egrave;re eux, mais c&rsquo;&eacute;taient des kilom&egrave;tres d&rsquo;&eacute;paisse for&ecirc;t vierge, sans route ni sentier, o&ugrave; foug&egrave;res, sapins, &eacute;pic&eacute;as, c&egrave;dres, champignons, fleurs des champs, mousse et bois pourrissant abritaient quantit&eacute; d&rsquo;ours, d&rsquo;&eacute;lans, de cerfs, de mouflons de Dall, de ch&egrave;vres de mon&shy;tagne et de gloutons. Un endroit semblable &agrave; Ketchikan, o&ugrave; Roy avait v&eacute;cu jusqu&rsquo;&agrave; l&rsquo;&acirc;ge de cinq ans, mais en plus sauvage et en plus effrayant maintenant qu&rsquo;il n&rsquo;y &eacute;tait plus habitu&eacute;.<br />Tandis qu&rsquo;ils survolaient les lieux, Roy observait le reflet de l&rsquo;avion jaune qui se d&eacute;tachait sur celui, plus grand, des montagnes vert sombre et du ciel bleu. Il vit la cime des arbres se rapprocher de chaque c&ocirc;t&eacute; de l&rsquo;appareil, et quand ils amer&shy;rirent des gerbes d&rsquo;eau gicl&egrave;rent de toute part. Le p&egrave;re de Roy sortit la t&ecirc;te par la fen&ecirc;tre lat&eacute;rale, sourire aux l&egrave;vres, impa&shy;tient. L&rsquo;espace d&rsquo;un instant, Roy eut la sensa&shy;tion de d&eacute;barquer sur une terre f&eacute;erique, un endroit irr&eacute;el.<br />Ils se mirent &agrave; l&rsquo;ouvrage. Ils avaient emport&eacute; autant de mat&eacute;riel que l&rsquo;avion pouvait en contenir. Debout sur un des flotteurs, son p&egrave;re gonfla le Zodiac avec la pompe &agrave; pied pendant que Roy aidait le pilote &agrave; d&eacute;charger le moteur Johnson six chevaux au-dessus de la poupe o&ugrave; il patienta, suspendu dans le vide, jusqu&rsquo;&agrave; ce que l&rsquo;embar&shy;cation f&ucirc;t pr&ecirc;te. Ils l&rsquo;y fix&egrave;rent, charg&egrave;rent le bateau de bidons d&rsquo;essence et de jerrycans qui allaient composer le premier voyage. Son p&egrave;re le fit en solitaire tandis que Roy, anxieux, attendait dans la car&shy;lingue avec le pilote qui ne cessait pas de parler.<br />Pas tr&egrave;s loin de Haines, c&rsquo;est l&agrave; que j&rsquo;ai essay&eacute;.<br />J&rsquo;y suis jamais all&eacute;, fit Roy.<br />Eh ben, comme je te disais, tu y trouves des saumons et des ours, et tout un tas de trucs qu&rsquo;une grande majorit&eacute; d&rsquo;humains n&rsquo;aura jamais, mais c&rsquo;est tout ce que tu y trouves, et &ccedil;a inclut une vraie solitude sans personne autour.<br />Roy ne r&eacute;pondit rien.<br />C&rsquo;est bizarre, c&rsquo;est tout. Les gens emm&egrave;nent rarement leurs gosses avec eux. Et la plupart emportent de la nour&shy;riture.<br />De la nourriture, ils en avaient apport&eacute;, du moins pour les deux premi&egrave;res semaines, ainsi que les denr&eacute;es indis&shy;pen&shy;sables&thinsp;: farine et haricots, sel et sucre, sucre brun pour fumer le gibier. Des fruits en conserve. Mais ils comptaient vivre de chasse et de p&ecirc;che. C&rsquo;&eacute;tait leur plan. Ils mangeraient du saumon frais, des truites Dolly Varden, des palourdes, des crabes et tout ce qu&rsquo;ils parviendraient &agrave; abattre &ndash; cerfs, ours, mouflons, ch&egrave;vres, &eacute;lans. Ils avaient embarqu&eacute; deux carabines, un fusil et un pistolet.<br />Tout ira bien, dit le pilote.<br />Ouais, fit Roy.<br />Et je viendrai jeter un &oelig;il de temps &agrave; autre.</p>', '2018-08-15 18:24:15', NULL, 1),
(5, 'Le départ', '<p>On avait une Morris Mini, avec ta maman. C&rsquo;&eacute;tait une voiture minuscule comme un wagonnet de mon&shy;tagnes russes et un des essuie-glaces &eacute;tait bousill&eacute;, alors je passais tout le temps mon bras par la fen&ecirc;tre pour l&rsquo;actionner. Ta maman &eacute;tait folle des champs de moutarde &agrave; l&rsquo;&eacute;poque, elle voulait toujours qu&rsquo;on y passe quand il faisait beau, autour de Davis. Il y avait plus de champs alors, moins de gens.<br />C&rsquo;&eacute;tait le cas partout dans le monde. Ainsi commence ton &eacute;ducation &agrave; domicile. Le monde &eacute;tait &agrave; l&rsquo;origine un vaste champ et la Terre &eacute;tait plate. Les ani&shy;maux de toutes esp&egrave;ces arpentaient cette prairie et n&rsquo;avaient pas de noms, les grandes cr&eacute;atures mangeaient les petites et personne n&rsquo;y voyait rien &agrave; redire.<br />Puis l&rsquo;homme est arriv&eacute;, il avan&ccedil;ait courb&eacute; aux confins du monde, poilu, imb&eacute;cile et faible, et il s&rsquo;est multipli&eacute;, il est devenu si envahissant, si tordu et meurtrier &agrave; force d&rsquo;attendre que la Terre s&rsquo;est mise &agrave; se d&eacute;former. Ses extr&eacute;mit&eacute;s se sont recour&shy;b&eacute;es lentement, hommes, femmes et enfants luttaient pour rester sur la plan&egrave;te, s&rsquo;agrippant &agrave; la fourrure du voisin et escaladant le dos des autres jusqu&rsquo;&agrave; ce que l&rsquo;humain se retrouve nu, frigorifi&eacute; et assassin, suspendu aux limites du monde.<br />Son p&egrave;re fit une pause et Roy demanda&thinsp;: Et apr&egrave;s&thinsp;? Au fil du temps, les extr&eacute;mit&eacute;s ont fini par se toucher. Elles se sont recroquevill&eacute;es pour se rejoindre et former le globe, et sous le poids de ce ph&eacute;nom&egrave;ne la rotation s&rsquo;est d&eacute;clench&eacute;e, hommes et b&ecirc;tes ont cess&eacute; de tomber. Puis l&rsquo;homme a observ&eacute; l&rsquo;homme, et comme il &eacute;tait devenu si laid avec sa peau nue et ses b&eacute;b&eacute;s pareils &agrave; des cloportes, il s&rsquo;est r&eacute;pandu sur la surface de la Terre, massacrant et rev&ecirc;tant les peaux des b&ecirc;tes les plus pr&eacute;sentables. Ha, lan&ccedil;a Roy. Mais ensuite&thinsp;? La suite devient trop compliqu&eacute;e &agrave; raconter.<br />Quelque part, il y a eu un m&eacute;lange de culpabilit&eacute;, de divorce, d&rsquo;argent, d&rsquo;imp&ocirc;ts, et tout est parti en vrille. Tu crois que tout est parti en vrille quand tu t&rsquo;es mari&eacute; avec Maman&thinsp;? Son p&egrave;re le d&eacute;visagea d&rsquo;un &oelig;il qui prouva &agrave; Roy qu&rsquo;il &eacute;tait all&eacute; trop loin. Non, c&rsquo;est parti en vrille un peu avant, je crois. Mais difficile de dire quand.</p>', '2018-08-15 18:24:41', NULL, 1),
(6, 'Résumé', '<p>Une &icirc;le sauvage du sud de l\'Alaska, accessible uniquement par bateau ou par hydravion, tout en for&ecirc;ts humides et montagnes escarp&eacute;es. C\'est dans ce d&eacute;cor que Jim d&eacute;cide d\'emmener son fils de treize ans pour y vivre dans une cabane isol&eacute;e, une ann&eacute;e durant.<br />Apr&egrave;s une succession d\'&eacute;checs personnels, il voit l&agrave; l\'occasion de prendre un nouveau d&eacute;part et de renouer avec ce gar&ccedil;on qu\'il conna&icirc;t si mal.<br />Mais la rigueur de cette vie et les d&eacute;faillances du p&egrave;re ne tardent pas &agrave;; transformer ce s&eacute;jour en cauchemar, et la situation devient vite incontr&ocirc;lable.<br />Jusqu\'au drame violent et impr&eacute;visible qui scellera leur destin.</p>', '2018-08-15 18:25:01', NULL, 1),
(7, 'Test', '<p>test</p>', '2018-08-20 19:37:56', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `report`
--

CREATE TABLE `report` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `reporting_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'lecteur'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `mail` varchar(254) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `identifiant`, `password`, `mail`, `id_role`) VALUES
(1, 'Jean', 'FORTEROCHE', 'admin', '$2y$11$gFxCGcHQ3J/5ipk1blW.I.2Kd/cRk6fIGCFxCUUeEVXW0a3VuJQWm', 'julinhop72@gmail.com', 2),
(2, 'Julien', 'Pinto', 'JulienP', '$2y$11$yO6KTXhxo5ziCNpBjRzvou6yLe3iD3/mULVf90ZX7wDYfOF9jAjIG', 'julienPinto@mail.com', 1)
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
