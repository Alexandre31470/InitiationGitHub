-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 mai 2024 à 13:53
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecfblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `content`, `category`, `created_at`) VALUES
(12, 'La Crypto-Monnaie : Révolution Financière ou Simple Effet de Mode ?', 'Alexandre', 'La crypto-monnaie, un terme qui fait désormais partie de notre quotidien, intrigue autant qu\'elle fascine. Depuis l\'avènement du Bitcoin en 2009, le paysage financier mondial a été bouleversé par cette innovation numérique. Mais de quoi s\'agit-il réellement ? Est-ce une révolution durable ou simplement une mode passagère ?\r\n        \r\nQu\'est-ce que la Crypto-Monnaie ?\r\nLa crypto-monnaie est une monnaie numérique décentralisée, utilisant la technologie de la blockchain pour assurer la transparence, la sécurité et l\'immutabilité des transactions. Contrairement aux monnaies traditionnelles, les crypto-monnaies ne sont pas émises par une banque centrale mais sont générées par un processus appelé minage, où des ordinateurs résolvent des problèmes mathématiques complexes.\r\n        \r\nPourquoi un Tel Engouement ?\r\nDécentralisation\r\nL\'absence de contrôle par une autorité centrale est l\'un des principaux attraits des crypto-monnaies. Les transactions sont peer-to-peer, éliminant ainsi les intermédiaires et réduisant les frais de transaction.\r\n        \r\nTransparence et Sécurité\r\nGrâce à la blockchain, chaque transaction est enregistrée dans un registre public inviolable. Cela garantit non seulement la transparence mais aussi une sécurité accrue contre les fraudes.\r\n        \r\nAccessibilité\r\nLes crypto-monnaies offrent une opportunité financière aux populations non bancarisées dans le monde entier. Tout ce dont vous avez besoin est un smartphone et une connexion internet.\r\n        \r\nLes Défis et Controverses\r\nMalgré ses avantages, la crypto-monnaie n\'est pas sans défis. Sa volatilité extrême est l\'un des principaux inconvénients. Les fluctuations rapides des prix peuvent entraîner des gains spectaculaires mais aussi des pertes dévastatrices. De plus, la régulation reste un sujet épineux. Les gouvernements du monde entier cherchent encore à trouver le juste équilibre entre l\'innovation et la protection des consommateurs.\r\n        \r\nL\'Impact à Long Terme\r\nLes crypto-monnaies ont déjà commencé à remodeler divers secteurs, de la finance à l\'immobilier en passant par l\'art avec les NFT (tokens non fongibles). Cependant, leur avenir dépendra en grande partie de leur adoption par le grand public et de la réponse réglementaire des autorités mondiales.\r\n        \r\nConclusion\r\nLa crypto-monnaie est sans doute l\'une des innovations financières les plus excitantes de notre époque. Qu\'elle soit une révolution durable ou un simple effet de mode, elle a déjà laissé une empreinte indélébile sur le monde financier. Pour les investisseurs, les développeurs et les utilisateurs, elle représente une promesse de changement et une invitation à repenser notre rapport à la monnaie et aux transactions.\r\nEn fin de compte, seul le temps dira si la crypto-monnaie deviendra une partie intégrante de notre système financier ou si elle restera une innovation marginale. Une chose est certaine : elle a déjà changé notre perception de la monnaie et des possibilités qu\'elle offre.', 'technology', '2024-05-23 13:09:06'),
(13, 'L\'Intelligence Artificielle : Une Révolution en Marche', 'Alexandre', 'L\'intelligence artificielle (IA) est une technologie qui change rapidement notre quotidien. Des assistants virtuels comme Siri et Alexa aux véhicules autonomes, l\'IA transforme nos modes de vie et de travail. Cet article explore les bases de l\'IA, ses applications actuelles et ses perspectives futures.\r\n        \r\nQu\'est-ce que l\'Intelligence Artificielle ?\r\nL\'IA désigne des systèmes informatiques capables de réaliser des tâches nécessitant habituellement l\'intelligence humaine, telles que la reconnaissance vocale, la prise de décision et la traduction. On distingue l\'IA étroite (ou faible), spécialisée dans des tâches spécifiques, et l\'IA générale (ou forte), qui vise à surpasser l\'intelligence humaine dans tous les domaines cognitifs.\r\n        \r\nApplications Actuelles de l\'IA\r\n        Santé: L\'IA analyse les images médicales pour détecter des maladies avec une précision remarquable, aidant au développement de nouveaux traitements et à la personnalisation des soins.\r\n        Transport: Les voitures autonomes, comme celles développées par Tesla et Waymo, promettent de réduire les accidents et de fluidifier le trafic.\r\n        Service Client: Les chatbots et assistants virtuels fournissent des réponses rapides et précises aux utilisateurs, améliorant ainsi l\'expérience client.\r\n        Finance: Les systèmes d\'IA détectent les fraudes et gèrent les portefeuilles d\'investissement, offrant des conseils financiers personnalisés en temps réel.\r\n        Éducation: Les plateformes d\'apprentissage en ligne utilisent l\'IA pour personnaliser les parcours éducatifs, adapter les contenus et combler les lacunes des étudiants.\r\n        \r\n        \r\n        Défis et Avenir de l\'IA\r\n        Malgré ses avantages, l\'IA pose des défis importants. Les biais algorithmiques peuvent mener à des décisions injustes, et l\'automatisation pourrait remplacer certains emplois, nécessitant une adaptation du marché du travail. L\'avenir de l\'IA est prometteur avec des perspectives comme l\'IA générale, l\'interprétabilité des systèmes, la collaboration homme-machine et la soutenabilité environnementale.\r\n        \r\n        Conclusion\r\n        L\'intelligence artificielle a le potentiel de transformer notre monde de manière significative. Pour maximiser ses bénéfices et minimiser ses risques, il est essentiel de développer des IA éthiques et transparentes. En investissant dans une IA responsable et collaborative, nous pouvons espérer un avenir où cette technologie révolutionnaire améliorera véritablement nos vies.', 'technology', '2024-05-23 13:12:07'),
(14, 'PS5 Pro : toutes les caractéristiques dévoilées, voici ce que réserve la console', 'Alexandre', 'Si ces informations sont à prendre avec des pincettes, The Verge explique que Sony prévoit une sortie pour la fin de l’année 2024. Le média indique que le constructeur demande aux développeurs que leurs jeux soient compatibles avec la PS5 Pro, notamment au niveau du ray tracing. La console embarquerait un GPU plus puissant et un CPU plus rapide. Certains titres profiteraient d’une fréquence de rafraîchissement plus élevée.\r\n        Les studios qui \"apportent des améliorations significatives\" en utilisant des fonctions graphiques plus poussées comme le ray tracing, par exemple, bénéficieraient du label \"PS5 Enhanced\".\r\n        Le GPU de la PS5 Pro serait \"environ 45 % plus rapide que celui\" de la version actuelle. Il utiliserait une mémoire système plus rapide pour améliorer le ray tracing, avec une architecture dont la vitesse est jusqu\'à trois fois supérieure à celle de la PS5 classique.\r\n        Quant au CPU, ce serait le même que celui de la PS5 actuelle, mais avec un nouveau mode qui améliore les performances : 3,85 GHz pour la PS5 Pro au lieu de 3,5 GHz, soit 10 % de plus. Les développeurs auraient le choix entre les deux modes pour leurs jeux. Il faut toutefois noter que ce nouveau mode alloue moins de puissance au GPU, qui est downclocké d’environ 1,5 %. Selon Sony, les performances baisseraient d’environ 1 %.', 'technology', '2024-05-23 13:51:18'),
(15, 'Opera Mini : Un Navigateur Web Ultra-Rapide et Complet', 'Alexandre', ' Opera Mini est un navigateur web léger, sécurisé et ultra-rapide. \r\n\r\n            Voici quelques-unes de ses fonctionnalités clés : \r\n           \r\n            Économie des données : Opera Mini peut réduire la consommation de données jusqu’à 90 % sans compromettre l’expérience de navigation. Cela en fait un excellent choix pour les utilisateurs soucieux de leur forfait data.\r\n            Téléchargement intelligent : Le navigateur analyse rapidement les sites web à la recherche de vidéos, de musique et d’autres fichiers, puis les télécharge en arrière-plan de manière intelligente.\r\n            Navigation privée : Utilisez les onglets privés pour une navigation sécurisée et incognito sans laisser de traces.\r\n            Blocage des publicités : Opera Mini dispose d’un bloqueur de publicités intégré pour une expérience de navigation plus rapide et privée.\r\n            Résultats de football en direct : Vous pouvez consulter les scores en direct directement depuis le navigateur.\r\n           \r\n            Mode hors-ligne : Enregistrez des actualités, des histoires et des pages web sur votre téléphone pour les lire ultérieurement hors ligne, sans utiliser de données.\r\n            Lecteur vidéo : Regardez et écoutez en direct ou téléchargez des vidéos pour les visionner plus tard. Le lecteur vidéo d’Opera Mini est conçu pour une utilisation à une main sur mobile.\r\n            Personnalisation : Personnalisez votre navigateur en choisissant votre mise en page, votre fond d’écran et vos catégories d’actualités préférées.\r\n           \r\n            Mode nuit : Protégez vos yeux dans l’obscurité grâce au mode nuit d’Opera Mini.\r\n            Intégration de blockchain : Opera travaille également sur un navigateur dédié au Web3 et a déjà intégré Ethereum, Bitcoin, Polygon et la BNB Chain1.\r\n            En résumé, Opera Mini est un excellent choix pour les utilisateurs qui recherchent un navigateur rapide, sécurisé et complet, tout en économisant des données. N’hésitez pas à le télécharger et à l’essayer ! \r\n            \r\n        Pour plus d’informations, vous pouvez consulter la page Google Play d’Opera Mini2 ou visiter le site officiel d’Opera3.', 'technology', '2024-05-23 13:51:46'),
(16, 'RGPD la protection des données sensibles', 'Alexandre', 'Le Règlement Général sur la Protection des Données (RGPD), adopté par l\'Union européenne en avril 2016 et entré en vigueur le 25 mai 2018, représente une avancée majeure dans la protection des données personnelles des citoyens européens. Ce règlement a pour objectif principal de renforcer et d\'harmoniser les lois sur la protection des données au sein de l\'UE, tout en accordant aux individus un contrôle accru sur leurs informations personnelles.\r\n\r\n        Principaux Aspects du RGPD\r\n\r\n        Droits des Personnes Concernées \r\n        \r\n        Droit à l\'Information : Les individus doivent être informés de manière claire et concise sur la collecte et l\'utilisation de leurs données.\r\n        Droit d\'Accès : Toute personne a le droit de demander l\'accès à ses données personnelles détenues par une organisation.\r\n        Droit de Rectification : Les individus peuvent exiger la correction de leurs données personnelles inexactes ou incomplètes.\r\n        Droit à l\'Oubli : Aussi connu sous le nom de droit à l’effacement, il permet aux personnes de demander la suppression de leurs données sous certaines conditions.\r\n        Droit à la Portabilité des Données : Les individus peuvent obtenir et réutiliser leurs données personnelles pour leurs propres besoins à travers différents services.\r\n        Droit d’Opposition : Les individus peuvent s\'opposer au traitement de leurs données personnelles dans certaines situations.\r\n        Obligations des Organisations :\r\n        \r\n        Consentement : Les entreprises doivent obtenir un consentement clair et explicite des individus pour traiter leurs données.\r\n        Notification des Violations de Données : En cas de violation des données personnelles, les entreprises doivent notifier les autorités de protection des données compétentes et, dans certains cas, les individus affectés, dans les 72 heures.\r\n        Protection dès la Conception et par Défaut : Les entreprises doivent intégrer des mesures de protection des données dès le début de la conception des systèmes et par défaut.\r\n        Délégué à la Protection des Données (DPO) : Certaines organisations doivent désigner un DPO pour superviser la conformité au RGPD.\r\n        Sanctions :\r\n        \r\n        Le non-respect du RGPD peut entraîner des amendes sévères, pouvant atteindre 20 millions d\'euros ou 4% du chiffre d\'affaires annuel mondial de l\'entreprise, selon le montant le plus élevé.\r\n        Impacts et Enjeux\r\n        Le RGPD a un impact significatif sur la manière dont les entreprises collectent, stockent et utilisent les données personnelles. Il pousse les organisations à être plus transparentes et responsables dans leurs pratiques de traitement des données. Pour les consommateurs, cela se traduit par une meilleure protection de leurs informations personnelles et un plus grand contrôle sur leur utilisation.\r\n        \r\n        En conclusion, le RGPD représente une étape importante vers une meilleure gouvernance des données à l\'ère numérique. En instaurant des règles strictes et en responsabilisant les acteurs économiques, il vise à protéger les droits des citoyens tout en facilitant la libre circulation des données au sein de l\'UE. ', 'news', '2024-05-23 13:52:34');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'health'),
(3, 'lifestyle'),
(1, 'news'),
(5, 'sports'),
(2, 'technology');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `article_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
