# it-security

## TP sécurité informatique IT-Akademy

### Membres :

- Tony Evariste
- Lucas Boillat
- Thomas Laporte

### Failles présentes et comment les exploiter :

##### Faille XSS :

- La détecter :

Insérer du code HTML dans l'input qui contient le message que l'on veut poster.
Le mieux est d'utiliser soit des balises XHTML de style aujourd'hui obsolètes ou des balises de titre car le message inséré ensuite prendra le style de ces balises (texte en gras pour la balise ** <b\> ** par exemple).
Le plus efficace étant d'injecter du CSS en même temps que le HTML, avec un bon gros bazooka des familles, comme ceci :

```
<p style="font-weight:bold; color:red!important;">test<p>
```

- L'exploiter :

Si on veut juste insérer un joli texte de couleur, on peut prendre le code ci-dessus.
Si on veut être un vrai troll, on peut insérer un code du genre :

```
<script>alert("Je t'ai niqué :) ");</script>
```
