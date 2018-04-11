# it-security

## TP sécurité informatique IT-Akademy

### Membres :

- Tony Evariste
- Lucas Boillat
- Thomas Laporte

## Failles présentes et comment les exploiter :

### Faille XSS :

- La détecter :

Insérer du code HTML dans l'input qui contient le message que l'on veut poster.

Le mieux est d'utiliser soit des balises XHTML de style aujourd'hui obsolètes ou des balises de titre car le message inséré ensuite prendra le style de ces balises (texte en gras pour la balise **<b\>** par exemple).

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

- Se protéger :

On pourrait (entre autres) modifier ce code, présent dans le fichier **newMessage.php** :

```
$array = array(
    ':idUser' => intval($_SESSION['currentUser']['id']),
    ':message' => $_POST['txtMessage']);
```

En :

```
$array = array(
    ':idUser' => intval($_SESSION['currentUser']['id']),
    ':message' => htmlentities($_POST['txtMessage']));
```

Ce qui aura pour effet d'echapper les caractères HTML, et d'éviter qu'on puisse tout casser comme un sauvage.

### Injection SQL :

- La détecter et l'exploiter :

Sachant que les tables users sont souvent structurées et nommées de la même manière, on peut directement essayer de **niquer le game** comme disent les jeunes.

Sur la page de connexion, qui n'est pas protégée, on peut entrer une requête comme celle présente ci-dessous, ce qui aura pour effet de créer un user pour lequel on determine le name, password etc. On peut donc se connecter à l'interface admin avec ces identifiants par la suite.

```
toto'; INSERT INTO user VALUES('10', 'name', 'password', 'jetai@niqué.com');'
```

- Se protéger :

On peut préparer notre requête en PDO, comme celle présente dans le fichier **newMessage.php**.
