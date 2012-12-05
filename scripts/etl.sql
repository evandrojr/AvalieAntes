start transaction;

    update r set nome_fantasia = razao_social where nome_fantasia is NULL;
    update r set nome_fantasia = razao_social where nome_fantasia like 'NULL';
    delete from r where radical_cnpj is null;
    delete from r where numero_cnpj = '';
    update r set numero_cnpj = '00000000000191', radical_cnpj = '00000000000191' where razao_social like 'BANCO DO BRASIL%';
    update r set numero_cnpj = nome_fantasia, radical_cnpj= nome_fantasia where numero_cnpj = 'NULL';

commit;