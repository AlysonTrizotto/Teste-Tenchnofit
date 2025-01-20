Teste Tecnofit

Como subir a aplicação?

- Passo 1: Clone do repositorio;
- Passo 2: Instale o PHP 8.3 
- Passo 3: Instale o composer 2.7.6
- Passo 4: execute o composer install
- Passo 5: instale o docker 27.4.0, build bde2b89
- Passo 6: execute: docker build -t teste-technofit .
- Passo 7: docker run -it --rm -p 8000:8000 teste-technofit
- Pronto! Agora é só chamar a rota: http://127.0.0.1:8000/api/v1/movements?search=Back

* Dentro da pasta '/teste_docs' tem: 
- Collection postam;
- PDF do teste,
- vídeo do teste de carga realizado.
- vídeo de stress 100 Virtual Users, 5 min.

* Caso necessário, execute as migrations e seeders.
- php artisan migrate
- php artisan db:seed --class=DatabaseSeeder