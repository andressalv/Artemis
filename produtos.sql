-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Abr-2020 às 02:05
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `produtos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_produto` varchar(250) NOT NULL,
  `quant` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `id_cliente`, `id_produto`, `quant`, `data`) VALUES
(70, 8, '3', 1, '2018-06-11'),
(69, 8, '4', 1, '2018-06-11'),
(71, 8, '2', 1, '2020-04-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(2) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `detalhes` text NOT NULL,
  `imagem` varchar(80) DEFAULT NULL,
  `galeria` text NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `estoque` int(11) DEFAULT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `detalhes`, `imagem`, `galeria`, `categoria`, `estoque`, `preco`) VALUES
(1, 'Bota de Hermes', 'Uma arma que aparece em God of War 3. Sendo usada primeiramente pelo Deus Hermes, que corre pela cidade, fazendo piadinhas e fugindo e Kratos. Quando Kratos destrói uma estátua de Atena e machuca Hermes, eles lutam até o Deus ficar sem folego e ter suas pernas impiedosamente amputadas pelo Espartano, que adquiri suas botas. Elas são usadas para correr pelas paredes e jogar os inimigos pra cima, abrindo espaço para qualquer ataque. Quando não está sendo usada, as asas nas costas das botas ficam lateralmente grudadas no item.', 'imagens/produto1.jpg', 'imagens/bota-hermes/imagem1.jpg imagens/bota-hermes/imagem2.jpg', 'Armadura', 100, 100),
(2, 'Sabre de Luz', 'O sabre de luz, muitas vezes chamado de espada laser, foi uma arma usada pelos Jedi e pelos Sith. Sabres de luz consistiam de uma lâmina de plasma alimentada por um cristal kyber e normalmente emitida por um cabo metálico. Era uma arma que requeria habilidade de treino, e era muito melhorada em combate quando usada em conjunto com a Força. Embora também fosse usado pelos Sith, o sabre de luz era sinônimo com Jedi, em que algumas partes da galáxia acreditavam que apenas os Jedi usavam essa arma.', 'imagens/sabre/sabre_de_luz.jpg', 'imagens/sabre/sabre_de_luz.jpg imagens/sabre/sabre-1.jpg imagens/sabre/sabre-2.jpg imagens/sabre/sabre-4.jpg imagens/sabre/sabre-5.jpg imagens/sabre/sabre-6.jpg', 'Armas Raras', 100, 50),
(3, 'Armadura de Dragão', 'A Armadura de Dragão é uma das 48 armaduras de bronze do Exército de Atena. Usada por Shiryu.', 'imagens/Armadura/Armadura.png', 'imagens/Armadura/Armadura.png \r\nimagens/Armadura/shiryu-1.jpg imagens/Armadura/shiryu-2.jpg imagens/Armadura/Shiryu_3.jpg', 'Armaduras', 20, 20.459),
(4, 'Leviatã - Machado de Kratos', 'De acordo com o guia, a arma foi criada pelos anões e irmãos Brok e Sindri com o objetivo de “restaurar o equilíbrio dos reinos”. Vale lembrar que, conforme confirmado pelo diretor Cory Barlog durante a E3 2017, a dupla de anões serão personagens frequentes no game e que “ficarão responsáveis pelo upgrade de Kratos e todo trabalho de manufatura”.', 'imagens/Leviata/leviata-3.jpg', 'imagens/Leviata/leviata-1.jpg imagens/Leviata/leviata-2.jpg imagens/Leviata/leviata-3.jpg imagens/Leviata/leviata-4.jpg imagens/Leviata/leviata-5.jpg imagens/Leviata/leviata-6.jpg', 'Armas Raras', 120, 2.5),
(5, 'Martelo de Thor', 'Thor é um dos personagens mais queridos e conhecidos do Universo Cinematográfico da Marvel (UCM), ao lado do Capitão América e o Homem de Ferro.  Ele ficou famoso por lutar, por muito tempo, com o auxílio de seu martelo, o Mjolnir, que acabou destruído em Thor: Ragnarok. Para obter o Martelo de Thor precisa ser digno dele, o martelo saberá.', 'imagens/Martelo/martelo-1.jpg', 'imagens/Martelo/martelo-1.jpg imagens/Martelo/martelo-2.jpg imagens/Martelo/martelo-3.jpg imagens/Martelo/martelo-4.jpg', 'Armas Raras', 5, 10000),
(16, 'Noisy Cricket', 'Noisy Cricket é a icônica pistola utilizada por J em sua primeira missão de campo em Homens de Preto. Mas ele não foi o único a passar por isso...\r\nNo livro Manual Oficial dos Homens de Preto, o universo dos filmes e quadrinhos é expandido e muitos detalhes sobre as raças alienígenas e armas utilizadas são explicados.\r\nEntregar a Noisy Cricket com sua capacidade ajustada para o máximo é uma tradição entre os agentes veteranos. Eles costumam fazer isso com novatos em sua primeira missão e apostam quantos metros ele voará com o disparo.\r\nA Noisy Cricket é uma arma extremamente versátil. Seu poder pode ser alterado de modo a causar leves concussões ou até mesmo derrubar espaçonaves!', 'imagens/Noisy-Cricket/arma-1.png', 'imagens/Noisy-Cricket/arma-1.png imagens/Noisy-Cricket/arma-2.jpg imagens/Noisy-Cricket/arma-3.jpg', 'Armas Raras', 16, 3.5),
(8, 'Disco identidade', 'Os discos de identidade no sistema Tron aparecem como anéis metálicos sólidos, oco no centro e colorido branco ou preto para combinar com o traje do usuário, com uma linha brilhante que circunda sua borda interna, combinando novamente a cor dos circuitos de seus proprietários. A borda externa, quando energizada, acende-se num nimbo brilhantemente brilhante de luz branca com uma leve tonalidade, lembrando a cor do circuito do proprietário; Esta borda ativa causa ondulações fracas mas visíveis no ar quando movidas ou jogadas, e o ar parece refletir ao redor dela quando mantido imóvel. Esses discos mantêm sua aparência sólida durante o vôo e, geralmente, se comportam como objetos metálicos sólidos. Ao contrário dos discos do sistema antigo, que não possuíam meios de ligação visíveis às costas dos seus proprietários, eles são instalados em docas circulares que descansam entre os ombros dos usuário.', 'imagens/Disco-Identidade/disco-1.jpg', 'imagens/Disco-Identidade/disco-1.jpg imagens/Disco-Identidade/disco-2.png imagens/Disco-Identidade/disco-3.jpg imagens/Disco-Identidade/disco-4.jpeg', 'Armas Raras', 10, 1.5),
(9, 'Escudo do Capitão América', 'O escudo de Steve Rogers é feito de uma liga de vibranium e adamantium criada acidentalmente pelo metalúrgico Dr. Myron MacLain. Ele havia sido contratado pelo governo dos EUA para criar um material impenetrável que seria usado como revestimento de tanques de guerra. A liga metálica indestrutível nunca conseguiu ser produzida novamente.', 'imagens/escudo-capitao-america/escudo-1.jpg', 'imagens/escudo-capitao-america/escudo-1.jpg imagens/escudo-capitao-america/escudo-2.jpg imagens/Disco-Identidade/disco-3.jpg', 'Armas Raras', 5, 3.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `sobrenome` varchar(250) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `telefone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `endereco`, `telefone`, `email`, `senha`) VALUES
(8, 'Andressa', 'Valentim', 'rua amarela', '982977763', 'adressa_valentim@hotmail.com', 'teste'),
(10, 'JoÃ£o', 'Oliveira', 'rua azul', '32566875', 'joao', 'teste3');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
