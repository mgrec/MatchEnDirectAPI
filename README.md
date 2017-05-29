# MatchEnDirectAPI

## 1) Dernier match d'une équipe

### Paramètres :


<b>name (requis)</b> : nom de l'équipe (ex : lyon)

### Route :

```
/last-score/{name}
```

### Réponse :

```
[
  [
    "Lyon",
    "5 - 0",
    "Montpellier"
  ],
  [
    "Marseille",
    "2 - 1",
    "Lyon"
  ],
  [
    "PSG",
    "4 - 1",
    "Lyon"
  ],
  ...
 ]
```


## 2) Dernière journée d'un championnat

### Paramètres :

<b>name (requis)</b> : nom de du pays (ex : france) <br>
<b>name-champ (requis)</b> : nom du championnat (ex : ligue-1)

### Route :

```
/pays/{name}/championnat/{name-champ}
```

### Réponse :

```
[
  [
    "Monaco",
    "2 - 0",
    "Saint-Étienne"
  ],
  [
    "Nancy",
    "3 - 1",
    "Saint-Étienne"
  ],
  [
    "Lorient",
    "1 - 1",
    "Bordeaux"
  ],
  ...
 ]
```

## 3) Journée d'un championnat en particulier

### Paramètres :

<b>name (requis)</b> : nom de du pays (ex : france) <br>
<b>name-champ (requis)</b> : nom du championnat (ex : ligue-1)
<b>annee-jour (requis)</b> : date (ex : 2017-18)

### Route :

```
/pays/{name}/championnat/{name-champ}/date/{annee-jour}
```

### Réponse :
```
[
  [
    "Saint-Étienne",
    "2 - 2",
    "Bordeaux"
  ],
  [
    "PSG",
    "5 - 0",
    "Bastia"
  ],
  [
    "Nancy",
    "0 - 3",
    "Monaco"
  ],
  ...
 ]
```


## 4) Score d'un match en particulier (en cours ou fini)

### Paramètres :

<b>name-dom (requis)</b> : nom de l'équipe à domicile (ex : lyon) <br>
<b>name-ext (requis)</b> : nom de l'équipe à l'exterieur (ex : bordeaux)

### Route :

```
/live-score/{name-dom}-{name-ext}
```

### Réponse :

```
[
  [
    "Bordeaux"
  ],
  [
    " 1"
  ],
  [
    "1 "
  ],
  [
    "Lyon"
  ]
]
```

## 5) Classement d'un championnat

### Paramètres :

<b>name (requis)</b> : nom de du pays (ex : france) <br>
<b>name-champ (requis)</b> : nom du championnat (ex : ligue-1)

### Route :

```
/classement/pays/{name}/championnat/{name-champ}
```

### Réponse :

```
[
  {
    "place": 1,
    "equipe": "Monaco",
    "points": 95
  },
  {
    "place": 2,
    "equipe": "PSG",
    "points": 87
  },
  {
    "place": 3,
    "equipe": "Nice",
    "points": 78
  },
  {
    "place": 4,
    "equipe": "Lyon",
    "points": 67
  },

  ...

  {
    "place": 19,
    "equipe": "Nancy",
    "points": 35
  },
  {
    "place": 20,
    "equipe": "Bastia",
    "points": 34
  }
]
```


