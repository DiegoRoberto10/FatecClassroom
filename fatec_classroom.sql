-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Dez-2018 às 18:38
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fatec_classroom`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--
CREATE DATABASE fatec_classroom;
USE fatec_classroom;

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `descritivo_curso` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `descritivo_curso`) VALUES
(1, 'Sistemas para Internet'),
(2, 'Gestão de Tecnologia da Informação'),
(3, 'Gestão de Produção Industrial'),
(4, 'Logística'),
(5, 'Meio Ambiente e Recursos Hídricos'),
(6, 'Construção Naval'),
(7, 'Sistemas Navais'),
(8, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id_disciplinas` int(11) NOT NULL,
  `descritivo_disciplina` varchar(255) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplinas`, `descritivo_disciplina`, `id_curso`, `id_status`) VALUES
(1, 'Mecânica aplicada a industrial naval', 7, 0),
(2, 'Desenho técnico naval\n', 7, 0),
(3, 'Fund. Usos múltiplos das águas\n', 7, 0),
(4, 'Vias navegáveis\n', 7, 0),
(5, 'Informática-Planilhas eletrônicas\n', 7, 0),
(6, 'Métodos para produção do conhecimento\n', 7, 0),
(7, 'Calculo 1\n', 7, 0),
(8, 'Fund. Comunicação empresarial\n', 7, 0),
(9, 'Inglês 1 Sistemas Navais\n', 7, 0),
(10, 'Mecânica aplicada a indústria naval 2\n', 7, 0),
(11, 'CAD aplicado a indústria naval\n', 7, 0),
(12, 'Materiais de construção naval\n', 7, 0),
(13, 'Fundamentos sobre veículos aquaviarios\n', 7, 0),
(14, 'Calculo 2\n', 7, 0),
(15, 'Estatística descritiva\n', 7, 0),
(16, 'Fund. Administração Geral\n', 7, 0),
(17, 'Inglês 2 Sistemas Navais\n', 7, 0),
(18, 'Mecânica dos fluidos\n', 7, 0),
(19, 'Planejamento industrial', 7, 0),
(20, 'Estabilidade de embarcação', 7, 0),
(21, 'Estrutura de embarcação', 7, 0),
(22, 'Aspectos de projeto', 7, 0),
(23, 'Fund. Matemática financeira', 7, 0),
(24, 'Fundamentos da economia', 7, 0),
(25, 'Inglês 3 Sistemas Navais', 7, 0),
(26, 'Modais e transbordo naval', 7, 0),
(27, 'Gerenciamento de operações de processos', 7, 0),
(28, 'Gestão de suprimentos navais', 7, 0),
(29, 'Transporte de passageiros e turismo náutico', 7, 0),
(30, 'Hidrodinâmica', 7, 0),
(31, 'Sistemas elétricos de bordo', 7, 0),
(32, 'Segurança do trabalho', 7, 0),
(33, 'Custos e orçamentos', 7, 0),
(34, 'Inglês 4 Sistemas Navais', 7, 0),
(35, 'Informática aplicada ao projeto de sistemas navais', 7, 0),
(36, 'Segurança em sistema de navegação', 7, 0),
(37, 'Gestão portuária e de terminais', 7, 0),
(38, 'Gerenciamento de frotas e embarcações', 7, 0),
(39, 'Projeto econômico de transporte', 7, 0),
(40, 'Maquinas navais', 7, 0),
(41, 'Normas técnicas', 7, 0),
(42, 'Organização e acompanhamento da produção na construção naval;', 7, 0),
(43, 'Gestão da qualidade em processos navais', 7, 0),
(44, 'Gestão ambiental de terminais e portos', 7, 0),
(45, 'Gestão de pessoas em sistema de navegação', 7, 0),
(46, 'Projeto de sistemas de navegação', 7, 0),
(47, 'Manobras de embarcação', 7, 0),
(48, 'Provas de desempenho', 7, 0),
(49, 'Vistoria e analise de planos', 7, 0),
(50, 'Inglês 1 ConstruçÃo Naval', 6, 0),
(51, 'Oficina mecanica', 6, 0),
(52, 'Fisica 1', 6, 0),
(53, 'Informática aplicada a construção naval', 6, 0),
(54, 'Comunicao empresarial', 6, 0),
(55, 'Desenho técnico', 6, 0),
(56, 'Aspectos gerais da navegação', 6, 0),
(57, 'Matemática para construção naval', 6, 0),
(58, 'Conceitos sobre uso múltiplo das águas', 6, 0),
(59, 'Inglês 2 ConstruçÃo Naval', 6, 0),
(60, 'Materiais de construção naval', 6, 0),
(61, 'Física 2', 6, 0),
(62, 'Computação gráfica aplicada a construção naval', 6, 0),
(63, 'Mecânica de fluidos', 6, 0),
(64, 'Elementos de maquinas', 6, 0),
(65, 'Arquitetura Naval', 6, 0),
(66, 'Matemática para construção naval', 6, 0),
(67, 'Obras fluviais e costeiras', 6, 0),
(68, 'Inglês 3 ConstruçÃo Naval', 6, 0),
(69, 'Materiais de construção naval', 6, 0),
(70, 'Mecânica dos sólidos', 6, 0),
(71, 'Organização e métricas para construção naval', 6, 0),
(72, 'Hidrodinâmica', 6, 0),
(73, 'Projeto de embarcados e arranjos', 6, 0),
(74, 'Estática e dinâmicas da embarcação', 6, 0),
(75, 'Motores de combustão interna', 6, 0),
(76, 'Estagio supervisionado', 6, 0),
(77, 'Inglês 4 ConstruçÃo Naval', 6, 0),
(78, 'Tecnologia em corte e soldagem', 6, 0),
(79, 'Resistência estrutural de embarcações', 6, 0),
(80, 'Matemática computacional', 6, 0),
(81, 'Propulsões', 6, 0),
(82, 'Projeto de embarcações 2: cascos', 6, 0),
(83, 'Redes de serviço', 6, 0),
(84, 'Eletricidade', 6, 0),
(85, 'Qualidade na construção naval', 6, 0),
(86, 'Métodos de construção naval e organização de estaleiros', 6, 0),
(87, 'Vibrações', 6, 0),
(88, 'Informática no projeto de embarcações', 6, 0),
(89, 'Sistema de propulsão e governo', 6, 0),
(90, 'Projeto de embarcações 3: projeto técnico', 6, 0),
(91, 'Automação e sistemas de bordo', 6, 0),
(92, 'Rede elétrica de embarcações', 6, 0),
(93, 'Gestão de pessoas na construção naval', 6, 0),
(94, 'Planejamento e gestão de projeto naval', 6, 0),
(95, 'Testes e provas', 6, 0),
(96, 'Normas técnicas da construção naval', 6, 0),
(97, 'Projeto de embarcações IV: detalhamento estrutural', 6, 0),
(98, 'Algoritmos', 2, 0),
(99, 'Fund. Da tecnologia da informação', 2, 0),
(100, 'Processos gerenciais', 2, 0),
(101, 'Matemática discreta', 2, 0),
(102, 'Comunicação e expressão', 2, 0),
(103, 'Atividades acadêmicos científicos-culturais 1', 2, 0),
(104, 'Ingles 1 GTI', 2, 0),
(105, 'Atividades de projetos 1 (modelagem de processo)', 2, 0),
(106, 'Modelagem de processos', 2, 0),
(107, 'Linguagem de programação', 2, 0),
(108, 'Laboratório de hardware', 2, 0),
(109, 'Gestão de sistemas operacionais', 2, 0),
(110, 'Matemática financeira', 2, 0),
(111, 'Metodologia de pesquisa cientifica-tecnológica', 2, 0),
(112, 'Atividades acadêmico cientifica-culturais 2', 2, 0),
(113, 'Inglês 2 GTI', 2, 0),
(114, 'Atividade de projetos 2 (eng de software e aplicação)', 2, 0),
(115, 'Atividade de projetos 2(banco de dados e aplicações 2)', 2, 0),
(116, 'Engenharia de software e aplicações', 2, 0),
(117, 'Banco de dados e aplicações', 2, 0),
(118, 'Gestão de pessoas', 2, 0),
(119, 'Estatística', 2, 0),
(120, 'Contabilidade', 2, 0),
(121, 'Gestão ambiental', 2, 0),
(122, 'Inglês 3 GTI', 2, 0),
(123, 'Atividades de projetos IV (programação para internet)', 2, 0),
(124, 'Programação para internet', 2, 0),
(125, 'Redes de computadores', 2, 0),
(126, 'Gestão financeira', 2, 0),
(127, 'Gestão da produção', 2, 0),
(128, 'Fundamentos de marketing', 2, 0),
(129, 'Inglês 4 GTI', 2, 0),
(130, 'Atividades de projetos v (sistemas integrados da informação)', 2, 0),
(131, 'Gestão da tecnologia da informação', 2, 0),
(132, 'Sistemas integrados de gestão', 2, 0),
(133, 'Gestão de projetos', 2, 0),
(134, 'Planejamento e gestão de estratégica', 2, 0),
(135, 'Projetos de tecnologia da informação 1', 2, 0),
(136, 'Inglês 5 GTI', 2, 0),
(137, 'Atividades de projetos VI (Projetos de tecnologia da informação 2)', 2, 0),
(138, 'Tópicos avançados em tecnologia da informação', 2, 0),
(139, 'Inteligência e negócios', 2, 0),
(140, 'Negócios eletrônicos', 2, 0),
(141, 'Gestão econômica', 2, 0),
(142, 'Legislação aplacada a informação', 2, 0),
(143, 'Projetos de tecnologia da informação 2', 2, 0),
(144, 'Inglês 6 GTI', 2, 0),
(145, 'Projeto integrador em gestão da produção industrial', 3, 0),
(146, 'Tecnologia da produção industrial', 3, 0),
(147, 'Metodologia pes.cietifica tecnológica', 3, 0),
(148, 'Informática', 3, 0),
(149, 'Calculo', 3, 0),
(150, 'Administração geral', 3, 0),
(151, 'Fundamentos da comunicação empresarial', 3, 0),
(152, 'Inglês 1 GPI', 3, 0),
(153, 'Ergonomia', 3, 0),
(154, 'Matérias e tratamentos 1', 3, 0),
(155, 'Escolhas das unidades (fixas)', 3, 0),
(156, 'Fundamentos da matemática financeira', 3, 0),
(157, 'Estatística', 3, 0),
(158, 'Introdução a contabilidade', 3, 0),
(159, 'Liderança e empreendedorismo', 3, 0),
(160, 'Inglês 2 GPI', 3, 0),
(161, 'Projeto integrado em gestão da produção industrial 2', 3, 0),
(162, 'Gestão da produção aplicada', 3, 0),
(163, 'Projeto do produto 1', 3, 0),
(164, 'Custos industriais', 3, 0),
(165, 'Escolhas das unidades', 3, 0),
(166, 'Economia', 3, 0),
(167, 'Inglês 3 GPI', 3, 0),
(168, 'Projeto integrador em gestão da produção industrial 3', 3, 0),
(169, 'Processos de produção', 3, 0),
(170, 'Projeto do produto 2', 3, 0),
(171, 'Planejamento, programação e controle da produção', 3, 0),
(172, 'Fundamentos da automação industrial', 3, 0),
(173, 'Gestão de qualidade', 3, 0),
(174, 'Higiene e segurança do trabalho', 3, 0),
(175, 'Inglês 4 GPI', 3, 0),
(176, 'Escolhas das unidades (fixas)', 3, 0),
(177, 'Projeto de fabrica', 3, 0),
(178, 'Gestão da cadeia de suprimentos', 3, 0),
(179, 'Gestão ambiental aplicada', 3, 0),
(180, 'Fundamentos da gestão de projetos', 3, 0),
(181, 'Gestão financeira', 3, 0),
(182, 'Ética e direito empresarial', 3, 0),
(183, 'Projetos de trabalho de graduação 1', 3, 0),
(184, 'Escolhas das unidades (fixas)', 3, 0),
(185, 'Tecnologia da informação aplacada a gestão de operações e processos', 3, 0),
(186, 'Simulação aplicada a produção', 3, 0),
(187, 'Gestão de marketing e vendas', 3, 0),
(188, 'Gestão de pessoas', 3, 0),
(189, 'Comercio exterior', 3, 0),
(190, 'Projeto de trabalho de graduação 2', 3, 0),
(191, 'Projeto interdisciplinar 1', 4, 0),
(192, 'Logística', 4, 0),
(193, 'Administração geral', 4, 0),
(194, 'Calculo 1', 4, 0),
(195, 'Método para produção de conhecimento', 4, 0),
(196, 'Informática básica', 4, 0),
(197, 'Comunicação e expressão', 4, 0),
(198, 'Inglês 1 Logistica', 4, 0),
(199, 'Projeto interdisciplinar 2', 4, 0),
(200, 'Modalidade e intermodalidade', 4, 0),
(201, 'Fundamentos da gestão de qualidade', 4, 0),
(202, 'Contabilidade', 4, 0),
(203, 'Calculo diferencial e integral', 4, 0),
(204, 'Matemática financeira', 4, 0),
(205, 'Estatística aplicada a gestão', 4, 0),
(206, 'Espanhol 1', 4, 0),
(207, 'Inglês 2 Logistica', 4, 0),
(208, 'Projeto interdisciplinar 3', 4, 0),
(209, 'Gestão tributaria nas o. logística', 4, 0),
(210, 'Gestão da produção e operações', 4, 0),
(211, 'Economia e finanças empresariais', 4, 0),
(212, 'Gestão de equipes', 4, 0),
(213, 'Pesquisa operacional', 4, 0),
(214, 'Espanhol 2', 4, 0),
(215, 'Inglês 3 Logistica', 4, 0),
(216, 'Projeto interdisciplinar IV', 4, 0),
(217, 'Custos e tarifas logísticos', 4, 0),
(218, 'Eletiva 1', 4, 0),
(219, 'Sis de movimentação e transporte', 4, 0),
(220, 'Gestão de estoque', 4, 0),
(221, 'Fundamentos de marketing', 4, 0),
(222, 'Métodos quantitativos de gestão', 4, 0),
(223, 'Inglês 4 Logistica', 4, 0),
(224, 'Projeto interdisciplinar v', 4, 0),
(225, 'Gestão de cadeia de suprimentos', 4, 0),
(226, 'Movimentação e armazenagem', 4, 0),
(227, 'Projeto de logística', 4, 0),
(228, 'Embalagens e unitizacao', 4, 0),
(229, 'Inovação e empreendorismo', 4, 0),
(230, 'Simulação em logística', 4, 0),
(231, 'Inglês 5 Logistica', 4, 0),
(232, 'Projeto interdisciplinar VI', 4, 0),
(233, 'Comercio exterior e logística internacional', 4, 0),
(234, 'Eletiva 2', 4, 0),
(235, 'Gestão de transporte de carca e roteirização', 4, 0),
(236, 'Tecnologia de transportes', 4, 0),
(237, 'Transportes de cargas especiais', 4, 0),
(238, 'Tecnologia da informação aplicada a logística', 4, 0),
(239, 'Ingles 6 Logistica', 4, 0),
(240, 'Ciência ambientais das aguas', 5, 0),
(241, 'Climatologia e meteorologia', 5, 0),
(242, 'Biologia', 5, 0),
(243, 'Socióloga ambiental', 5, 0),
(244, 'Calculo', 5, 0),
(245, 'Estatística', 5, 0),
(246, 'Metodologia da pesquisa cientifico-tecnológica', 5, 0),
(247, 'Fundamentos da comunicação empresarial', 5, 0),
(248, 'Inglês 1 Meio Ambiente', 5, 0),
(249, 'Hidrologia e recursos hídricos', 5, 0),
(250, 'Química analítica ambiental', 5, 0),
(251, 'Geociência ambiental', 5, 0),
(252, 'Ecologia', 5, 0),
(253, 'Microbiologia ambiental', 5, 0),
(254, 'Cartografia, topografia e batimetria', 5, 0),
(255, 'Cartografia assistida por computador', 5, 0),
(256, 'Economia do meio ambiente', 5, 0),
(257, 'Inglês 2 Meio Ambiente', 5, 0),
(258, 'Saneamento ambiental', 5, 0),
(259, 'Limnologia', 5, 0),
(260, 'Hidráulica fluvial', 5, 0),
(261, 'Uso e conservação dos solos', 5, 0),
(262, 'Planejamento e conservação ambiental', 5, 0),
(263, 'Sensoriamento remoto e geoprocessamento', 5, 0),
(264, 'Gestão da qualidade', 5, 0),
(265, 'Inglês 3 Meio Ambiente', 5, 0),
(266, 'Saneamento ambiental 2', 5, 0),
(267, 'Avaliação de impactos ambientais e análise de risco', 5, 0),
(268, 'Matas ciliares e nascentes', 5, 0),
(269, 'Sistema de informação geográficas', 5, 0),
(270, 'Educação ambiental', 5, 0),
(271, 'Saúde e segurança ocupacional', 5, 0),
(272, 'Inglês 4 Meio Ambiente', 5, 0),
(273, 'Planejamento integrado de bacias hidrográficos', 5, 0),
(274, 'Planejamento e gestão ambiental urbana', 5, 0),
(275, 'Gerenciamento de resíduos', 5, 0),
(276, 'Controle e monitoramento da poluição atmosférica e sonora', 5, 0),
(277, 'Eco tecnologia', 5, 0),
(278, 'Projetos ambientais', 5, 0),
(279, 'Legislação ambiental', 5, 0),
(280, 'Sistema de gestão ambiental e audit. Ambientais', 5, 0),
(281, 'Aguas subterrâneas', 5, 0),
(282, 'Energias alternativas', 5, 0),
(283, 'Projetos ambientais 2', 5, 0),
(284, 'Revitalização de rios e recuperação de áreas degradadas', 5, 0),
(285, 'Turismo, meio ambiente e recursos hídricos', 5, 0),
(286, 'Design digital', 1, 0),
(287, 'Padrões de projetos de sítios de internet 1', 1, 0),
(288, 'Bases da internet', 1, 0),
(289, 'Criação de conteúdo web', 1, 0),
(290, 'Algoritmos e logica da programação', 1, 0),
(291, 'Fund. Matemática elementar', 1, 0),
(292, 'Leitura e produção de textos', 1, 0),
(293, 'Inglês 1 SI', 1, 0),
(294, 'Pratica de design', 1, 0),
(295, 'Padrões de projetos de sítios 2', 1, 0),
(296, 'Redes e internet', 1, 0),
(297, 'Estrutura de dados', 1, 0),
(298, 'Matemática discreta', 1, 0),
(299, 'Legislação aplicada a internet', 1, 0),
(300, 'Inglês 2 SI', 1, 0),
(301, 'Engenharia de software para web', 1, 0),
(302, 'Acessibilidade', 1, 0),
(303, 'Programação de sítios para internet', 1, 0),
(304, 'Servidores e seus sistemas operacionais', 1, 0),
(305, 'Banco de dados e internet 1', 1, 0),
(306, 'Estatística', 1, 0),
(307, 'Inglês 3 SI', 1, 0),
(308, 'Projeto de navegação e interação', 1, 0),
(309, 'Segurança em sistemas para internet', 1, 0),
(310, 'Desenvolvimento para servidores 1', 1, 0),
(311, 'Tópicos especais em sistemas para internet 1', 1, 0),
(312, 'Banco de dados e internet 2', 1, 0),
(313, 'Pratica de gestão de projetos', 1, 0),
(314, 'Inglês 4 SI', 1, 0),
(315, 'Projeto de prototipagem e usabilidade', 1, 0),
(316, 'Desenvolvimento para dispositivos moveis 1', 1, 0),
(317, 'Desenvolvimento para servidores 2', 1, 0),
(318, 'Tópicos especiais em sistemas para internet 2', 1, 0),
(319, 'Negocio e marketing eletrônicos', 1, 0),
(320, 'Projeto de TG em sistemas para internet 1', 1, 0),
(321, 'Inglês 5 SI', 1, 0),
(322, 'Projeto de encontrabilidade', 1, 0),
(323, 'Desenvolvimento para dispositivos moveis 2', 1, 0),
(324, 'Arquitetura orientada a serviços', 1, 0),
(325, 'Tópicos especiais em sistemas para internet 3', 1, 0),
(326, 'Criação de empresas para internet', 1, 0),
(327, 'Projeto de TG em sistemas para internet 2', 1, 0),
(328, 'Inglês 6 SI', 1, 0),
(331, 'Palestra', 8, 0),
(332, 'Mini-Curso', 8, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `descritivo_horario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`id_horario`, `descritivo_horario`) VALUES
(1, '7:40 às 8:30'),
(2, '8:30 às 9:20'),
(3, '9:30 às 10:20'),
(4, '10:20 às 11:10'),
(5, '11:20 às 12:10'),
(6, '12:10 às 13:00'),
(7, '13:00 às 13:50'),
(8, '14:00 às 14:50'),
(9, '14:50 às 15:40'),
(10, '15:40 às 16:30'),
(11, '16:40 às 17:30'),
(12, '17:30 às 18:20'),
(13, '19:00 às 19:50'),
(14, '19:50 às 20:40'),
(15, '20:50 às 21:40'),
(16, '21:40 às 22:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `id_permissao` int(11) NOT NULL,
  `descritivo_permissao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`id_permissao`, `descritivo_permissao`) VALUES
(1, 'Comum'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id_professor` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `matricula` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `id_permissao` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id_professor`, `nome`, `matricula`, `email`, `senha`, `id_permissao`, `id_status`, `temp`) VALUES
(1, 'Administrador', 321, 'adm@hotmail.com', '202cb962ac59075b964b07152d234b70', 2, 1, 0),
(2, 'Wdson Oliveira', 123, 'wdson@hotmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recursos`
--

CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL,
  `descritivo_recurso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `recursos`
--

INSERT INTO `recursos` (`id_recurso`, `descritivo_recurso`) VALUES
(1, 'TV, 10 Computadores, Quadro Branco'),
(2, 'TV, 20 Computadores, Quadro Branco'),
(3, 'TV, 20 Computadores, Quadro Branco, 2 Mesas Extras'),
(4, 'TV, 20 Computadores, Quadro Branco, 3 Mesas Extras'),
(5, 'TV, 20 Computadores, Quadro Branco, 4 Mesas Extras'),
(6, 'Computador, TV, Carteiras, Quadro Verde'),
(7, 'Datashow, Som, Quadro Branco'),
(8, 'Datashow, Som, Carteiras, Quadro Verde'),
(9, 'Datashow, Som, 54 Carteiras, Quadro Verde'),
(10, 'TV, Mesas, Quadro Verde'),
(11, 'TV, Carteiras, Quadro Verde'),
(12, 'TV, Mesas, Quadro Branco'),
(13, 'TV, Carteiras, Quadro Branco'),
(14, 'Datashow, Som, TV, Carteiras, Quadro Verde'),
(15, 'Sem Recursos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `data_reserva` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_professor`, `id_sala`, `id_disciplina`, `data_reserva`) VALUES
(18, 1, 2, 34, '2018-12-02'),
(29, 1, 4, 331, '2018-12-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas_horarios`
--

CREATE TABLE `reservas_horarios` (
  `id_reservas_horarios` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reservas_horarios`
--

INSERT INTO `reservas_horarios` (`id_reservas_horarios`, `id_reserva`, `id_horario`) VALUES
(32, 18, 1),
(42, 29, 12),
(52, 29, 13),
(54, 29, 14),
(55, 29, 15),
(56, 29, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id_sala` int(11) NOT NULL,
  `descritivo_sala` varchar(30) NOT NULL,
  `id_recurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id_sala`, `descritivo_sala`, `id_recurso`) VALUES
(1, 'Audio 1 (115)', 9),
(2, 'Audio 2 (213-215)', 7),
(3, 'Lab 1 (116)', 3),
(4, 'Lab 2 (114)', 5),
(5, 'Lab 3 (110)', 4),
(6, 'Lab 4 (216)', 2),
(7, 'Lab 5 (214)', 2),
(8, 'Lab 6 (212)', 2),
(9, 'Lab 8', 1),
(10, 'Lab NIC', 2),
(11, 'Sala 101', 11),
(12, 'Sala 102', 10),
(13, 'Sala 103', 10),
(14, 'Sala 104', 10),
(15, 'Sala 105', 8),
(16, 'Sala 106', 13),
(17, 'Sala 107', 14),
(18, 'Sala 108', 13),
(19, 'Sala 201', 11),
(20, 'Sala 202', 8),
(21, 'Sala 203', 11),
(22, 'Sala 204', 8),
(23, 'Sala 205', 11),
(24, 'Sala 206', 6),
(25, 'Sala 207', 11),
(26, 'Sala 208', 8),
(27, 'Lab Ambiental', 15),
(28, 'Cad/Cam - E6', 2),
(29, 'Estaleiro Sala 301', 12),
(30, 'Planta Modelo', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `descritivo_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `descritivo_status`) VALUES
(1, 'Ativado'),
(2, 'Desativado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disciplinas`),
  ADD KEY `disciplinas_cursos_id_curso_fk` (`id_curso`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indexes for table `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`id_permissao`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_professor`),
  ADD UNIQUE KEY `professores_matricula_uindex` (`matricula`),
  ADD UNIQUE KEY `professores_email_uindex` (`email`),
  ADD KEY `professores_permissoes_id_permissao_fk` (`id_permissao`),
  ADD KEY `professores_status_id_status_fk` (`id_status`);

--
-- Indexes for table `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `psd_professores_id_professor_fk` (`id_professor`),
  ADD KEY `psd_salas_id_sala_fk` (`id_sala`),
  ADD KEY `psd_disciplinas_id_disciplinas_fk` (`id_disciplina`);

--
-- Indexes for table `reservas_horarios`
--
ALTER TABLE `reservas_horarios`
  ADD PRIMARY KEY (`id_reservas_horarios`),
  ADD KEY `reservas_horarios_reservas_id_reservas_fk` (`id_reserva`),
  ADD KEY `reservas_horarios_horarios_id_horario_fk` (`id_horario`);

--
-- Indexes for table `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`),
  ADD KEY `salas_recursos_id_recurso_fk` (`id_recurso`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disciplinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `reservas_horarios`
--
ALTER TABLE `reservas_horarios`
  MODIFY `id_reservas_horarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `salas`
--
ALTER TABLE `salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplinas_cursos_id_curso_fk` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);

--
-- Limitadores para a tabela `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `professores_permissoes_id_permissao_fk` FOREIGN KEY (`id_permissao`) REFERENCES `permissoes` (`id_permissao`),
  ADD CONSTRAINT `professores_status_id_status_fk` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `psd_disciplinas_id_disciplinas_fk` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplinas` (`id_disciplinas`),
  ADD CONSTRAINT `psd_professores_id_professor_fk` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`id_professor`),
  ADD CONSTRAINT `psd_salas_id_sala_fk` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id_sala`);

--
-- Limitadores para a tabela `reservas_horarios`
--
ALTER TABLE `reservas_horarios`
  ADD CONSTRAINT `reservas_horarios_horarios_id_horario_fk` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`),
  ADD CONSTRAINT `reservas_horarios_reservas_id_reservas_fk` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id_reserva`);

--
-- Limitadores para a tabela `salas`
--
ALTER TABLE `salas`
  ADD CONSTRAINT `salas_recursos_id_recurso_fk` FOREIGN KEY (`id_recurso`) REFERENCES `recursos` (`id_recurso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
