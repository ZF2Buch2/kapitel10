ZF2 Buch - Kapitel 10
=====================

Die Projektdateien für das Kapitel 10 vom Buch **Zend Framework 2 - Von den 
Grundlagen bis zur fertigen Anwendung** (*ISBN 978-3-8273-2994-3*) von Ralf Eggert 
aus dem Addison-Wesley Verlag installieren Sie wie folgt:

* Sie können die Projektdateien als ZIP von der Website http://www.awl.de/2994 
  unter Downloads oder von GitHub https://github.com/ZF2Buch/kapitel10 herunter
  laden und in einem geeigneten Verzeichnis entpacken, z.B.
```
  /home/devhost/zf2buch/kapitel10
```
  
* Alternativ wechseln Sie ins Verzeichnis `/home/devhost/zf2buch/` und clonen das
  GitHub Repository entsprechend, z.B.
```
    $ cd /home/devhost/zf2buch/
    $ git clone https://github.com/ZF2Buch/kapitel10.git
    $ cd kapitel10/
```
  
* Nun aktualisieren Sie den Composer und installieren das Projekt inklusive
  aller Abhängigkeiten
```
    $ php composer.phar selfupdate
    $ php composer.phar install
```

* Als Letztes müssen Sie einen Virtual Host für den Apache2 einrichten oder einen
  bestehenden entsprechend anpassen.
```
    $ sudo touch /etc/apache2/sites-available/luigis-pizza.local
    $ sudo gedit /etc/apache2/sites-available/luigis-pizza.local
```
  Der Virtual Host könnte so aussehen:
```
    <VirtualHost *>
      ServerName luigis-pizza.local
      DocumentRoot /home/devhost/zf2buch/kapitel10/public/
      AccessFileName .htaccess
      <Directory /home/devhost/zf2buch/kapitel10/public/>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
      </Directory>
    </VirtualHost>
```
  Weitere Details zum Einrichten des Virtual Hosts entnehmen Sie bitte den 
  Kapiteln *3.1.4 Virtual Host einrichten unter Linux* und *3.1.5 Virtual Host 
  einrichten unter Windows*
  
* Nun sollten Sie das Projekt unter http://luigis-pizza.local in Ihrem Browser 
  aufrufen können.

Hinweise zum Zend Framework Release 2.1.4
-----------------------------------------

Durch Änderungen in der Zend\Db Komponente kann es in einige der Listings zu 
folgenden Notices kommen:

   Notice: Attempting to quote a value in `Zend\Db\Adapter\Platform\Sqlite` 
   without extension/driver support can introduce security vulnerabilities 
   in a production environment. in `/home/devhost/zf2buch/kapitel10/vendor/zendframework/zendframework/library/Zend/Db/Adapter/Platform/Sqlite.php` 
   on line 118
   
   https://github.com/zendframework/zf2/pull/4078
   
Dieser Bug sollte im Release 2.1.5 bereinigt sein.
