start transaction;

    update r set nome_fantasia = razao_social where nome_fantasia is NULL;
    update r set nome_fantasia = razao_social where nome_fantasia like 'NULL';

commit;