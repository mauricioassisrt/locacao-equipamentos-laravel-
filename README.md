# locacao-equipamentos-laravel-

1 passo instalar source tree e clonar o projeto 

2 passo baixar e instalar o composer https://getcomposer.org/download/ ao instalar 
certifique-se que seu Xampp está instalado já caso contrario instale primeiramente o Xampp e depois o composer
para testar se deu certo a instalação do composer
digite no CMD composer deverá aparecer uma bio com varias informações 

3 Passo com o apache e o mysql iniciado crie uma base de dados exemplo aclteste
após isso vamos importar o banco de dados que está dentro da pasta gestao-de-equipamentos aclteste para isso
vamos no php admin escolha-se o banco de dados desejado e clicar no menu importar após isso a base de dados
já está configurada 

4 Passo vamos os seguintes comandos
agora vamos acessar o caminho onde está nosso projeto via cmd no meu caso está em documentos gestao-de-equipamentos/gestaosis
após acessar esse diretorio rodar o comando 
php -r "copy('.env.example', '.env');
o arquivo env é responsavel por gerar o script de configuração do banco de dados dentro da pasta gestaosis, tem um arquivo
chamado arquivosOLD dentro dele temos o arquivo env pronto copiar de lá e colar no env
após isso salve e digite no cmd o comando abaixo para gerar uma nova key para seu projeto 

php artisan key:generate

dará a menssagem de gerado com sucesso 

após isso rodar o comando php artisan serve 
o projeto foi subido na porta 8000 se o anti virus der alguma mensagem iguinore 
agora vá em seu browser e acesse localhost:8000

irá ser redirecionado para a pagina de login entre com o email admin@laravel.com senha 123456 
após isso o sistema estará rodando perfeitamente para parar o servidor só ir no CMD ctrl + C 
