<?php
    header('Content-type: application/json');

    echo '[
	    {
	        "nom": "Bacalan",
	        "listeDesEvenements": [
	            {
	                "libelle": "Concert",
	                "date": "20/03/2014",
	                "listeDesTickets": [
	                    {
	                        "client": {
	                            "nom": "Jean-claude",
	                            "prenom": "Jean-Claude"
	                        },
	                        "code": 22,
	                        "valide": false
	                    },
	                    {
	                        "client": {
	                            "nom": "Gourmelon",
	                            "prenom": "Jean-Michel"
	                        },
	                        "code": 15,
	                        "valide": true
	                    }
	                ]
	            },
	            {
	                "libelle": "Magie",
	                "date": "21/03/2014",
	                "listeDesTickets": [
	                    {
	                        "client": {
	                            "nom": "Ferie",
	                            "prenom": "Tristan"
	                        },
	                        "code": 1,
	                        "valide": false
	                    },
	                    {
	                        "client": {
	                            "nom": "Dief",
	                            "prenom": "Adam"
	                        },
	                        "code": 20,
	                        "valide": true
	                    }
	                ]
	            }
	        ]
	    },
	    {
	        "nom": "Meriadec",
	        "listeDesEvenements": [
	            {
	                "libelle": "Danse",
	                "date": "27/03/2014",
	                "listeDesTickets": [
	                    {
	                        "client": {
	                            "nom": "Terieur",
	                            "prenom": "Alain"
	                        },
	                        "code": 10,
	                        "valide": false
	                    },
	                    {
	                        "client": {
	                            "nom": "Pesse",
	                            "prenom": "Robert"
	                        },
	                        "code": 10,
	                        "valide": true
	                    }
	                ]
	            },
	            {
	                "libelle": "Theatre",
	                "date": "01/04/2014",
	                "listeDesTickets": [
	                    {
	                        "client": {
	                            "nom": "Maigrot",
	                            "prenom": "Alexis"
	                        },
	                        "code": 10,
	                        "valide": false
	                    },
	                    {
	                        "client": {
	                            "nom": "Paquet",
	                            "prenom": "Xavier"
	                        },
	                        "code": 10,
	                        "valide": true
	                    }
	                ]
	            }
	        ]
	    }

	]';
?>