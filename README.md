# SW Starship
Calculadora de paradas para reabastecimento de todas as naves espaciais de Star Wars disponíveis na [SWAPI](https://swapi.co/).

Link para a aplicação: [SW Starship](http://ec2-18-232-176-153.compute-1.amazonaws.com)

## Desenvolvimento
O projeto foi desenvolvido de forma a abstrair as configurações do ambiente para uma máquina virtual utilizando o Vagrant. Neste sentido, para rodar o código local é necessário ter instalado os seguintes programas:
- Vagrant
- VirtualBox

#### Configuração

- Clone o projeto:  
```bash
git clone https://github.com/deniojunior/sw-starship
```

- Crie o um novo branch:  
```bash
git checkout -b dev-vX.X.X
```

- Acesse o diretório do projeto e execute o comando para instalar e configurar a máquina virtual com o Vagrant:
```bash
cd sw-starship
vagrant up
```
*Esta etapa pode demorar um pouco, visto que o vagrant irá fazer o download da imagem do sistema operacional Fedora26.*

- Após a instalação, acesse a máquina virtual:
```bash
vagrant ssh
```

- Dentro da máquina virtual, acesse o diretporio da aplicação e execute os comandos para a instalação de dependências e compilação dos arquivos relacionados à internacionalização:
```bash
cd swstarship
composer install
sh bin/compile_messages.sh
```  

- Reinicie o apache:
```bash
sudo service httpd restart
```

- Por fim, adicione a linha abaixo no seu etc/hosts da sua máquina local:

```bash
192.168.50.25        swstarship.local
``` 

- Finalmente, basta acessar a URL de desenvolvimento no seu navegador para acessar a aplicação:
```bash
swstarship.local/
``` 

#### Arquivos Estáticos

Caso haja algum problema no carregamento dos arquivos estáticos, considere alterar o arquivo /etc/httpd/conf/httpd.conf da seguinte forma: onde está o EnableSendfile on altere para:

```bash
EnableSendfile off
``` 
