<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

Para lanzar el proyecto primero hace falta descargarlo con el comando:
## git clone https://github.com/fjrb44/panelAdministracionEmpresasLaravel

Una vez descargado, lanzar los siguientes comandos
## npm install
## composer install

Puede dar problemas a la hora de eliminar las imagenes debido a que git transforma los accesos directos en carpetas. Si se da el caso, hace falta eliminar la carpeta storage encontrada dentro de la carpeta public (esta era un acceso directo)
Y lanzar el siguiente comando:
## php artisan storage:link
