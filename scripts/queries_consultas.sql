--Empresas com mais reclamações
SELECT (select nome_fantasia from r where radical_cnpj=todos.radical_cnpj), count(radical_cnpj) FROM r as todos group by numero_cnpj order by count(radical_cnpj) desc


--Empresas com mais reclamações ver 2
SELECT (select nome_fantasia from r where radical_cnpj=todos.radical_cnpj limit 1),
(select numero_cnpj from r where numero_cnpj=todos.numero_cnpj limit 1), 
count(radical_cnpj) FROM r as todos group by radical_cnpj order by count(radical_cnpj) desc

--Falta agrupar as empresas semelhantes

--Tipos de produtos com mais reclamações
SELECT descricao_assunto, count(descricao_assunto) FROM r  group by descricao_assunto order by count(descricao_assunto) desc

--Empresa com menos reclamações atendidas
SELECT razao_social_rfb, count(razao_social_rfb) FROM r  group by razao_social_rfb where atendida = 'N' order by count(razao_social_rfb) desc 

--Empresa com mais reclamações atendidas
SELECT razao_social_rfb, count(razao_social_rfb) FROM r where atendida = 'S' group by razao_social_rfb  order by count(razao_social_rfb) desc 




SELECT numero_cnpj,
	 count(numero_cnpj) as 'Reclamações',
	(select count(numero_cnpj) FROM r where atendida='S' and total.numero_cnpj=numero_cnpj) as 'Atendidos' 

FROM r 
	as total 
group by numero_cnpj  order by count(numero_cnpj) desc 
