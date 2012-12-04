
LOAD DATA LOCAL INFILE '/home/93274300500/Desktop/procon/reclamacoes_2011.csv'
INTO TABLE r
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\r\n'
(  `ano_calendario`,
  `data_arquivamento`,
  `data_abertura`,
  `codigo_regiao`,
  `regiao`,
  `uf`,
  `razao_social`,
  `nome_fantasia`,
  `tipo` ,
  `numero_cnpj`,
  `radical_cnpj` ,
  `razao_social_rfb`,
  `nome_fantasia_rfb` ,
  `cnae_principal` ,
  `desc_cnae_principal` ,
  `atendida` ,
  `codigo_assunto` ,
  `descricao_assunto` ,
  `codigo_problema`  ,
  `descricao_problema` ,
  `sexo_consumidor` ,
  `faixa_etaria_consumidor` ,
  `cep_consumidor`  ,
)

