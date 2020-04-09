# easyng
In order to bild docker container run: 
`make docker-build`

Start docker container:
`make docker-up`

In order to run bush inside container as www-data user run:
`make run-bash-as-www-data`

Generate factories command:
composer di-generate-aot

Stop docker container:
`make docker-down`

Use this address for run in browser:
`http://easyng.loc/`

But before don't forget to add this address to /etc/hosts of your host's operating system
`127.0.0.1 easyng.loc www.easyng.loc`
