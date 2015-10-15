select nome_tipo 
from Editam natural join Contem_Registos
where mail='comba@mal.com';

select mail
from Loga natural join Login
where sucesso='nao';

select * from Pessoas natural join (Editam natural join Contem_Registos) where nome_registo='facebook' or nome_pagina='facebook';

select data_nasc
from Pessoas natural join (
select * from Editam natural join(
select mail, nome_registo from Contem_Registos natural join Editam as P2 where nome_registo='facebook') where nome_pagina='facebook');

select data_nasc from Pessoas where mail in ( select mail from Contem_Registos natural join Editam where nome_pagina = 'facebook' and mail in (
	select mail from Contem_Registos natural join Editam where nome_registo = 'facebook'));
