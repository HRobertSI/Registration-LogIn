# Registration-LogIn
Narediti želim aplikacijo, kjer se uporabnik najprej registrira nato pa prijavi. Podatki se shranjujejo v MySQL bazo.


Hallo Tomasz!

Einige Infos zu diesem Projekt:

Ich habe das Projekt vom letzten Semester benutzt und mit MySQL überarbeitet:

- die Produkte sind jetzt in der Tabelle "gloves" (früher hatte ich sie als Objekte in php aufgeführt);

- Register und LogIn sind komplett neu;

- der Gruss in store.php ist neu;

- auch thankyou.php wurde neugeschrieben um Register bzw. LogIn zu erfassen und
     um die Kaufstatistik in der Tabelle BoughtProducts zu speichern;

- wie immer versuchte ich einige Sachen auf meiner Weise zu machen, damit ich php
    besser kennenlerne, z.B. die Funktion extract() in index.php (ich wollte drop-down
    vermeiden und immer submit für Register und LogIn benutzen) oder SHA-256 statt BlowFish u.ä.;

- ein Problem bleibt aber ungelöst: rubbish.php funktioniert nicht -> hier möchte ich mit drag'n'drop
    ausgewählte Produkte löschen aber nachdem ich von rubbish.php zurück in store.php springe, kommt
    das gelöschte Produkt wieder auf die Liste. Ich habe alles mögliche versucht ohne Erfolg.