## Краткая инструкция

### 1) 
* Установить Ubuntu 18.04 через Windows 10 Store, либо VirtualBox, либо как вторая ос.
* Ctrl+Alt+T - откроет терминал, дальнейшие команды вводить в терминале.

### 2)
* sudo apt install git (sudo спросит root пароль, который ввели при установке Ubuntu)

### 3)
* sudo apt-get update
* sudo apt-get install \ apt-transport-https \ ca-certificates \curl \ gnupg-agent \  software-properties-common
* curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
(нажать enter)
* sudo add-apt-repository \ "deb [arch=amd64] https://download.docker.com/linux/ubuntu \ $(lsb_release -cs) \stable"
* sudo apt-get update
* sudo apt-get install docker-ce docker-ce-cli containerd.io
* Проверить установку docker:
sudo docker run hello-world, если есть сообщения о запуске, значит docker работает, иначе повторить пункт.

### 4)
* sudo curl -L "https://github.com/docker/compose/releases/download/1.27.4/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
* sudo chmod +x /usr/local/bin/docker-compose
Проверить установку: docker-compose --version если установлена, покажет версию.
* Если нет версии, можно попробовать sudo ln -s /usr/local/bin/docker-compose /usr/bin/docker-compose, либо заново повторить шаг.

### 5)
* mkdir my-local-project; cd my-local-project;
* git clone https://gitlab.com/zmhan/aue.git (спроист ваш логин и пароль от GitLab)

### 6)
* docker-compose -d up
Скачает необходимые контейнеры и запустит их. После завершения команды, можно проверить готовность, для этого: отредактировать файл hosts (sudo nano /etc/hosts Написать "127.0.0.1		hello.test" затем Ctrl+O Enter Ctrl+X). После чего можно проверить в браузере адрес hello.test. 

 

### Если есть вопросы, можно задать тут
* https://t.me/joinchat/MbtrFhuoVc2hKHVGvuFO3Q


## Подробнее
Я не шарю в docker сильно, любые правки документа, которые позволят новичкам быстрее и проще разворачивать проект приветствуются.
Установку проверял на 32 битном Ubuntu MATE 16.04

### Ресурсы: инфа по докеру https://habr.com/ru/post/310460/
установка докер 
https://docs.docker.com/engine/install/ubuntu/ 
создание докер образа https://habr.com/ru/post/519500/ 
docker-compose https://habr.com/ru/company/ruvds/blog/450312/ docker-compose https://docs.docker.com/compose/install/
docker простыми словами свой контейнер https://totaku.ru/ustanovka-lemp-s-pomoshchiu-dockera/ https://webdevkin.ru/posts/raznoe/docker

### Консоль, терминал - командная строка в Ubuntu (Открывается Ctrl+Alt+T)
Docker - программа для установки контейнеров приложений (сервисов). Нам нужна, чтобы устанавилвать проект со всеми зависимостями к себе на пк. 
Docker-compose - часть Docker. Используется для управления нескольками контейнерами приложений. Например, сервисом веб-приложения и сервисом базы данных этого приложения.
Git - программа для совместной работы над файлами. Позволяет скачать себе локальную копию проекта, модифицировать ее и распространять другим пользователям через сервер (например репозиторий в Github или GitLab)


### В GitLab (https://gitlab.com/) вы уже зарегистрировались, git установили (в терминале: sudo apt install git. Затем git -v покажет версию, если установилась)

### Установите docker к себе на пк.
https://docs.docker.com/engine/install/ubuntu/ 
Проверьте правильность установки. Для этого:
	* В терминале: docker run hello-world
	* Загрузит образ, выведет что-то вроде: 
	* Hello from Docker!
	* This message shows that your installation appears to be working correctly.
	* Если другое, надо заново устанавливать docker 

### Установите docker-composer
https://docs.docker.com/compose/install/
Проверьте правильность установки. В терминале: docker-compose -v

### Создайте группу docker для работы с docker Без sudo. Для этого:
	* В терминале: sudo usermod -aG docker username
	* Попросит ввести пароль, который вы указали как root, при установке системы.

### Установите наш проект. Для этого:
	* Скачайте файлы проекта.
	* В терминале: git clone https://gitlab.com/zmhan/aue.git (ввести данные от GitLab)
	* cd aue
	* В терминале: docker-compose up -d
	* После завершения команды, можно проверить готовность, для этого: отредактировать файл hosts (в Ubuntu sudo nano /etc/hosts Написать "127.0.0.1		hello.test" затем Ctrl+O Enter Ctrl+X). После чего можно проверить в браузере адрес hello.test. 