# MatchEnDirectAPI

## 1) Dernier match d'une équipe

### Paramètres :


<b>name (requis)</b> : nom de l'équipe (ex : lyon)

### Route :

```
/last-score/{name}
```

### Réponse :

<br>
## 2) Dernière journée d'un championnat

### Paramètres :

<b>name (requis)</b> : nom de du pays (ex : france) <br>
<b>name-champ (requis)</b> : nom du championnat (ex : ligue-1)

### Route :

```
/pays/{name}/championnat/{name-champ}
```

### Réponse :

<br>
## 3) Journée d'un championnat en particulier

### Paramètres :

<b>name (requis)</b> : nom de du pays (ex : france) <br>
<b>name-champ (requis)</b> : nom du championnat (ex : ligue-1)
<b>annee-jour (requis)</b> : date (ex : 2017-18)

### Route :

```
/pays/{name}/championnat/{name-champ}/{annee-jour}
```

### Réponse :


