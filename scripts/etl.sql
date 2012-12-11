

    update r set nome_fantasia = razao_social where nome_fantasia is NULL;
    update r set nome_fantasia = razao_social where nome_fantasia like 'NULL';
    delete from r where radical_cnpj is null;
    delete from r where numero_cnpj = '';
    update r set numero_cnpj = '00000000000191', radical_cnpj = '00000000000191' where razao_social like 'BANCO DO BRASIL%';
    update r set numero_cnpj = nome_fantasia, radical_cnpj= nome_fantasia where numero_cnpj = 'NULL';
    update r set atendida = '1' where atendida = 'S';
    update r set atendida = '0' where atendida = 'N';

    --Agrupar OIs para o CNPJ 04164616000582 radical 04164616
    update r set nome_fantasia = 'OI/TELEMAR', razao_social = 'OI/TELEMAR', numero_cnpj = '04164616000582', radical_cnpj = '04164616' where radical_cnpj in ('04164616','33000118','TELEMAR NORTE LESTE','03986348', '04164616','33000118', '05423963','04164616','33000118','05423963','04164616','33000118','76535764','33000118','04164616','33000118','04164616','08408254','05423963','33000118','04164616','05423963','04164616','07953678','03986348','04164616','76535764','03986348','33000118','04603960','04164616','08719252','07953678','03986348','09143402','05536380','07951869','05016406','05930538','07887264','07060579','05423963','07953678','OI VELOX','09675470','OI PAGO ','07953678','04603960');
    
    drop table claro_radical_cnpj;
    create table claro_radical_cnpj 
        select distinct radical_cnpj from r where nome_fantasia like 'claro%' or nome_fantasia like '%claro ';
    update r set nome_fantasia = 'CLARO', razao_social = 'CLARO', numero_cnpj = '40432544015250', radical_cnpj = '40432544' where radical_cnpj in (select * from claro_radical_cnpj);

    --Agrupar TIMs para o CNPJ '04206050000180' radical 04206050
    drop table tim_radical_cnpj;
    create table tim_radical_cnpj 
        select distinct radical_cnpj from r where nome_fantasia like 'tim%' or nome_fantasia like '%tim ';
    update r set nome_fantasia = 'TIM', razao_social = 'TIM', numero_cnpj = '04206050000180', radical_cnpj = '04206050' where radical_cnpj in (select * from tim_radical_cnpj);

    --Agrupar Vivos para o CNPJ '02449992018101' radical 02449992
    drop table vivo_radical_cnpj; 
    create table vivo_radical_cnpj 
            select distinct radical_cnpj from r where nome_fantasia like 'vivo%' or nome_fantasia like '%vivo ' or nome_fantasia like 'TELEFONICA%' or nome_fantasia like '%TELEFONICA ';
    update r set nome_fantasia = 'VIVO/TELEFONICA', razao_social = 'VIVO/TELEFONICA', numero_cnpj = '02449992018101', radical_cnpj = '02449992' where radical_cnpj in (select * from vivo_radical_cnpj);

    --Agrupar LG
    drop table lg_radical_cnpj;
    create table lg_radical_cnpj 
            select distinct radical_cnpj from r where nome_fantasia like 'lg%' or nome_fantasia like '%lg ';
    update r set nome_fantasia = 'LG', razao_social = 'LG', numero_cnpj = '00801450000183', radical_cnpj = '00801450' where radical_cnpj in (select * from lg_radical_cnpj);

    --Agrupar compra_facil
    drop table compra_facil_radical_cnpj;
    create table compra_facil_radical_cnpj 
            select distinct radical_cnpj from r where nome_fantasia like 'compra facil%' or nome_fantasia like '%compra facil ';
    update r set nome_fantasia = 'COMPRA FACIL', razao_social = 'COMPRA FACIL', numero_cnpj = '33068883000120', radical_cnpj = '33068883' where radical_cnpj in (select * from compra_facil_radical_cnpj);

    drop table mais_reclamacoes;
    create table mais_reclamacoes
    select	
        (select nome_fantasia from r where radical_cnpj=todos.radical_cnpj limit 1) as Empresa ,
        (select numero_cnpj from r where numero_cnpj=todos.numero_cnpj limit 1) as CNPJ, 
        radical_cnpj As radical_cnpj, 
        count(radical_cnpj) As Reclamacoes, 
	sum(atendida) as Atendidas,
	(1 - sum(atendida) /count(radical_cnpj)) * 100 as '% Nao Atendidas'
    FROM r as todos 
    group by radical_cnpj 
    order by count(radical_cnpj) 
    desc limit 100;