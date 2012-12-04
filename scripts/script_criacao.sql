CREATE TABLE `procon`.`r` (
  `id` INTEGER  NOT NULL AUTO_INCREMENT,
  `ano_calendario` INTEGER ,
  `data_arquivamento` DATETIME ,
  `data_abertura` DATETIME ,
  `codigo_regiao` TEXT ,
  `regiao` TEXT ,
  `uf` TEXT ,
  `razao_social` text ,
  `nome_fantasia` text ,
  `tipo` integer ,
  `numero_cnpj` text ,
  `radical_cnpj` text ,
  `razao_social_rfb` text ,
  `nome_fantasia_rfb` text ,
  `cnae_principal` text ,
  `desc_cnae_principal` text ,
  `atendida` text ,
  `codigo_assunto` integer ,
  `descricao_assunto` text ,
  `codigo_problema` integer ,
  `descricao_problema` text ,
  `sexo_consumidor` text ,
  `faixa_etaria_consumidor` text ,
  `cep_consumidor` text ,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;



CREATE INDEX razao_social_rfb_idx ON r (razao_social_rfb(30));


CREATE INDEX numero_cnpj_idx ON r (numero_cnpj(10));
