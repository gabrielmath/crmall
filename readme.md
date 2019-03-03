# Setup de Instalação


Primeiramente clone este projeto na pasta desejada.

Em seguida, com o terminal aberto e dentro do diretório raiz do projeto, instale 
as depedências do composer com o comando:

```
composer install
```


Após, rode o comando para gerar a chave no arquivo `.env`:
```
php artisan key:generate
```
**Nota:** caso o arquivo não seja gerado, faça uma cópia do `.env.example` e renomeie para  `.env`. Com o arquivo criado, rode o comando novamente.

Crie um novo banco de dados e configure-o neste mesmo arquivo `.env`, como por exemplo:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=banco_de_dados
DB_USERNAME=usuario
DB_PASSWORD=senha
```
Com o banco criado na base de dados, criaremos as tabelas através das migrations.
Então, no terminal, execute:

```
php artisan migrate
```

Caso encontre algum problema com CSS e JS (layout "quebrado"), executar o comando:

```
npm install && npm run production
```

Finalmente, vamos acessar o sistema no link `http://localhost:8000`. Para rodar o servidor embutido, execute o comando:

```
php artisan serve
```

Agora basta somente navegar e avaliar o sistema. :smile:

Gratidão! :pray:  
