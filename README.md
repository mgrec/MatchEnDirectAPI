# MatchEnDirectAPI

## 1) Dernier match d'une équipe

### Paramètres :


<b>name (requis)</b> : nom de l'équipe (ex : lyon)

### Route :

```
/last-score/equipe/{name}
```

### Réponse :

```json
[
  {
    "id": 1,
    "equipe_domicile": "Lyon",
    "score": "5 - 0",
    "equipe_exterieur": "Montpellier"
  },
  {
    "id": 2,
    "equipe_domicile": "Marseille",
    "score": "2 - 1",
    "equipe_exterieur": "Lyon"
  },
  {
    "id": 3,
    "equipe_domicile": "PSG",
    "score": "4 - 1",
    "equipe_exterieur": "Lyon"
  }
]
```

_Essayer : [https://matchendirect-api.herokuapp.com/last-score/equipe/lyon](https://matchendirect-api.herokuapp.com/last-score/equipe/lyon)_

## 2) Dernière journée d'un championnat

### Paramètres :

<b>name (requis)</b> : nom de du pays (ex : france) <br>
<b>name-champ (requis)</b> : nom du championnat (ex : ligue-1)

### Route :

```
/pays/{name}/championnat/{name-champ}
```

### Réponse :

```json
[
  {
    "id": 1,
    "equipe_domicile": "Monaco",
    "score": "2 - 0",
    "equipe_exterieur": "Saint-Étienne"
  },
  {
    "id": 2,
    "equipe_domicile": "Nancy",
    "score": "3 - 1",
    "equipe_exterieur": "Saint-Étienne"
  },
  {
    "id": 3,
    "equipe_domicile": "Lorient",
    "score": "1 - 1",
    "equipe_exterieur": "Bordeaux"
  }
]
```

_Essayer : [https://matchendirect-api.herokuapp.com/pays/france/championnat/ligue-1](https://matchendirect-api.herokuapp.com/pays/france/championnat/ligue-1)_

## 3) Journée d'un championnat en particulier

### Paramètres :

<b>name (requis)</b> : nom de du pays (ex : france) <br>
<b>name-champ (requis)</b> : nom du championnat (ex : ligue-1) <br>
<b>annee-jour (requis)</b> : date (ex : 2017-18)

### Route :

```
/pays/{name}/championnat/{name-champ}/date/{annee-jour}
```

### Réponse :

```json
[
  {
    "id": 1,
    "equipe_domicile": "Saint-Étienne",
    "score": "2 - 2",
    "equipe_exterieur": "Bordeaux"
  },
  {
    "id": 2,
    "equipe_domicile": "PSG",
    "score": "5 - 0",
    "equipe_exterieur": "Bastia"
  },
  {
    "id": 3,
    "equipe_domicile": "Nancy",
    "score": "0 - 3",
    "equipe_exterieur": "Monaco"
  }
]
```

_Essayer : [https://matchendirect-api.herokuapp.com/pays/france/championnat/ligue-1/date/2017-18](https://matchendirect-api.herokuapp.com/pays/france/championnat/ligue-1/date/2017-18)_

## 4) Score d'un match en particulier (en cours ou fini)

### Paramètres :

<b>name-dom (requis)</b> : nom de l'équipe à domicile (ex : lyon) <br>
<b>name-ext (requis)</b> : nom de l'équipe à l'exterieur (ex : bordeaux)

### Route :

```
/live-score/equipe/{name-dom}-{name-ext}
```

### Réponse :

```json
[
  {
    "equipe_domicile": "Monaco",
    "score_domicile": "2",
    "score_exterieur": "0",
    "equipe_exterieur": "Saint-Étienne",
    "cote_1": "1.12",
    "cote_n": "8.00",
    "cote_2": "14.00"
  }
]
```
_Essayer : [https://matchendirect-api.herokuapp.com/live-score/equipe/monaco-saint-etienne](https://matchendirect-api.herokuapp.com/live-score/equipe/monaco-saint-etienne)_


## 5) Classement d'un championnat

### Paramètres :

<b>name (requis)</b> : nom de du pays (ex : france) <br>
<b>name-champ (requis)</b> : nom du championnat (ex : ligue-1)

### Route :

```
/classement/pays/{name}/championnat/{name-champ}
```

### Réponse :

```json
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