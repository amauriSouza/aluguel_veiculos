drop database `aluguelveiculos`;
CREATE DATABASE  IF NOT EXISTS `aluguelveiculos`;
USE `aluguelveiculos`;

CREATE TABLE `veiculo` (
  `codigo` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(50) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `combustivel` varchar(30) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `ano` int DEFAULT NULL,
  `alugado` int(1)
);

CREATE TABLE `usuario` (
  `codigo` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `usuario` varchar(30) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  acesso int
);

CREATE TABLE `pessoa` (
  `codigo` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `celular`  int(11) DEFAULT NULL,
  codUsuario int,
  foreign key(codUsuario) references usuario(codigo)
);


CREATE TABLE `avaliacao` (
  `codigo` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `numAvaliacao` decimal(2,1) DEFAULT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `codVeiculo` int,
  `codPessoa` int,
  FOREIGN KEY (`codVeiculo`) REFERENCES `veiculo` (`codigo`),
  FOREIGN KEY (`codPessoa`) REFERENCES `pessoa` (`codigo`)
);

CREATE TABLE `locacao` (
  codigo int auto_increment PRIMARY KEY,
  `codVeiculo` int,
  `codPessoa` int,
  `dtInicio` date,
  `dtTermino` date,
  `codAvaliacao` int,
  total decimal(64,2),
  FOREIGN KEY (`codVeiculo`) REFERENCES `veiculo` (`codigo`),
  FOREIGN KEY (`codAvaliacao`) REFERENCES `avaliacao` (`codigo`),
  FOREIGN KEY (`codPessoa`) REFERENCES `pessoa` (`codigo`)
);



INSERT INTO `aluguelveiculos`.`usuario`
(`codigo`,
`usuario`,
`senha`,
`acesso`)
VALUES
(default,
"admin",md5('123'),
1);

INSERT INTO `aluguelveiculos`.`usuario`
(`codigo`,
`usuario`,
`senha`,
`acesso`)
VALUES
(default,
"user",md5('123'),
0);



INSERT INTO `aluguelveiculos`.`pessoa`
(`codigo`,
`nome`,
`email`,
`telefone`,
`celular`,
`codUsuario`)
VALUES
(default,
"Administrador",
"adm@com",
123,
123,
1);

INSERT INTO `aluguelveiculos`.`pessoa`
(`codigo`,
`nome`,
`email`,
`telefone`,
`celular`,
`codUsuario`)
VALUES
(default,
"Usuario Teste",
"user",
123,
123,
2);


INSERT INTO `aluguelveiculos`.`veiculo`
(`codigo`,
`nome`,
`tipo`,
`combustivel`,
`modelo`,
`marca`,
`ano`,
`alugado`)
VALUES
(default,
"Corsa",
"Carro",
"Gasolina",
"Hacht",
"Chevrolet",
2000,
0);

INSERT INTO `aluguelveiculos`.`veiculo`
(`codigo`,
`nome`,
`tipo`,
`combustivel`,
`modelo`,
`marca`,
`ano`,
`alugado`)
VALUES
(default,
"CG 110",
"Moto",
"Gasolina",
"Custom",
"Honda",
2000,
0);

CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `exibeveiculos` AS
    SELECT 
        `veiculo`.`codigo` AS `codigo`,
        `veiculo`.`nome` AS `nome`,
        `veiculo`.`tipo` AS `tipo`,
        `veiculo`.`combustivel` AS `combustivel`,
        `veiculo`.`modelo` AS `modelo`,
        `veiculo`.`marca` AS `marca`,
        `veiculo`.`ano` AS `ano`,
        `veiculo`.`alugado` AS `alugado`
    FROM
        `veiculo`
    WHERE
        (`veiculo`.`alugado` = 0);
		
		
DROP procedure IF EXISTS `disponibilidadeCarro`;
DELIMITER $$
USE `aluguelveiculos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `disponibilidadeCarro`()
BEGIN
DECLARE c INT DEFAULT 0;
SELECT count(codigo), codigo, codVeiculo into @qnt, @a, @b FROM locacao WHERE dtTermino <= now();

	while (c <= @qnt) DO
		 DELETE FROM locacao WHERE codigo = @a;
         UPDATE veiculo SET alugado = 0 WHERE codigo = @b;
		 SET c = c + 1;
	end while;

end$$
DELIMITER ;

USE `aluguelveiculos`;
DROP procedure IF EXISTS `cadastro`;

DELIMITER $$
USE `aluguelveiculos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastro`(IN nome varchar(50), IN email varchar(50), IN telefone INT(11), IN celular INT(11), 
IN usuario varchar(30), IN senha varchar(100))
BEGIN
	
    INSERT INTO usuario VALUES (DEFAULT, usuario, md5(senha), 0);
    
    SELECT distinct last_insert_id() into @codUsuario from usuario;
    
   INSERT INTO pessoa VALUES (DEFAULT, nome, email, telefone, celular, @codUsuario);
    
END$$

DELIMITER ;

USE `aluguelveiculos`;
DROP procedure IF EXISTS `atualiza`;

DELIMITER $$
USE `aluguelveiculos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `atualiza`(IN pNome varchar(50), IN pEmail varchar(50), IN pTelefone INT(11), IN pCelular INT(11), 
IN pUsuario varchar(30), IN pSenha varchar(100), IN pCodigo int)
BEGIN

	UPDATE usuario SET usuario = pUsuario, senha = md5(pSenha) WHERE codigo = pCodigo;
    UPDATE pessoa SET nome = pNome, email = pEmail, telefone = pTelefone, celular = pCelular  WHERE codigo = pCodigo;

    
END$$

DELIMITER ;


