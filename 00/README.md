https://docs.docker.com/desktop/install/mac-install/

https://docs.docker.com/desktop/install/windows-install/

https://docs.docker.com/guides/get-started/

Een docker container is een manier om een commando/applicatie te draaien zonder afhankelijk te zijn van de host.

Enige externe afhankelijkheid is docker zelf. Op de host moet docker geïnstalleerd zijn.

Je applicatie met al zijn dependencies wordt in een zgn. "docker image" gezet.
Van dat docker image wordt een "docker container" gestart met een `docker run`-commando.

Voorbeeld:

`docker run -p 8088:80 docker/welcome-to-docker`

Het image "docker/welcome-to-docker" wordt eerst gedownload van hub.docker.com, indien nog niet aanwezig.

Dit image is geconfigureerd om een nginx webserver te starten. Op mijn computer heb ik geen nginx, maar zodra de container gestart is kan ik op localhost poort 8088 de nginx in de container benaderen.

```shell
docker exec -it <id> /bin/bash #docker exec: execute a command in a running container
docker exec -it <id> /bin/sh
```

-i = interactive
-t = pseudo-terminal

zonder -i blijft je commando (/bin/sh) niet wachten op input maar quit meteen weer
zonder -t kan /bin/sh geen connectie met een terminal maken

Voorbeeld:

`docker exec -i <id> /bin/sh` geen shell zichtbaar want er is geen terminal om een connectie mee te maken
`docker exec -t  <id> /bin/sh` shellprompt zichtbaar maar geen interactie mogelijk want je shell quit meteen weer

Alleen `-it` werkt voor een shell in de container. Aangenomen dat er een shell geïnstalleerd is op het image.

Andere commando's:

```shell
docker ps
docker inspect <id>
docker ps -a
docker images
docker system <parameter>
```

nuttig voor dagelijks gebruik:

```shell
docker system df #displays information regarding the amount of disk space used by the Docker daemon
docker system prune #remove all unused containers, networks, images...
docker system prune -a #remove all unused images not just dangling ones
```

en nog veel meer, zie docs

# kleine technische uitweiding

Er kunnen diverse processen draaien in de container, maar het proces met process id 1 is speciaal.
Dit is het proces waar het om gaat in de container. Als dat proces stopt, stopt de container.

Verder: het proces met process id 1 **draait zowel in de container als op de host**. In de container onder id 1, op de host onder een door de host toegekende hogere id. Demonstratie: Meertens-dockerhost.

Extra complicatie: dit voorbeeld van de container-processen tonen die op de host draaien gaat niet werken op docker voor Mac of Windows, alleen op Linux-hosts. Waarom? Omdat docker gebaseerd is op Linux-technologieën. Docker op Mac of Windows draait op een verborgen Linux-virtuele machine.

Docker heeft overeenkomsten met virtuele machines, maar er zijn belangrijke verschillen. Het volgende diagram illustreert die. Krediet: Data Camp cursus “Introduction to Docker"

![alt text]https://github.com/knaw-huc/dockerworkshop/blob/main/assets/docker-vs-virtual_machines_diagram.png?raw=true)
