# Dictionnaire de données Base 1


## Table 1 : Fournisseur

| Champ| Type | Spécificités | Description
|--|--|--|--|
|`id` | INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numéro_fournisseur`|VARCHAR(8)|UNIQUE INDEX, NOT NULL|--|
|`type_de_fournisseur`|ENUM(+)|NOT NULL|(+) entreprise, association,établissement publique|
|`numero_cpt_client`|VARCHAR(16)|DEFAULT NULL|--|
|`type_de_societe`|VARCHAR(32)|DEFAULT NULL|--|
|`raison_sociale`|VARCHAR(64)|NOT NULL|--|
|`adresse_numero`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`adresse_bis_ter`|VARCHAR(8)|DEFAULT NULL|--|
|`adresse_type_de_voie`|VARCHAR(64)|DEFAULT NULL|--|
|`adresse_nom_de_la_voie`|VARCHAR(128)|DEFAULT NULL|--|
|`adresse_cp`|INT(8)|UNSIGNED, DEFAULT NULL|--|
|`adresse_ville`|VARCHAR(64)|DEFAULT NULL|--|
|`adresse_pays`|VARCHAR(64)|DEFAULT NULL|--|
|`telephone`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`mail`|VARCHAR(128)|DEFAULT NULL|--|
|`site_web`|VARCHAR(128)|DEFAULT NULL|--|
|`numero_siret`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`numero_siren`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`numero_tva`|VARCHAR(32)|DEFAULT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 2 : Client

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` | INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numéro_client`|VARCHAR(8)|UNIQUE INDEX, NOT NULL|--|
|`type_de_client`|ENUM(+)|NOT NULL|(+) entreprise, particulier, association,établissement publique|
|`numero_cpt_fournisseur`|VARCHAR(16)|DEFAULT NULL|--|
|`type_de_societe`|VARCHAR(32)|DEFAULT NULL|--|
|`raison_sociale`|VARCHAR(64)|NOT NULL|--|
|`adresse_numero`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`adresse_bis_ter`|VARCHAR(8)|DEFAULT NULL|--|
|`adresse_type_de_voie`|VARCHAR(64)|DEFAULT NULL|--|
|`adresse_nom_de_la_voie`|VARCHAR(128)|DEFAULT NULL|--|
|`adresse_cp`|INT(8)|UNSIGNED, DEFAULT NULL|--|
|`adresse_ville`|VARCHAR(64)|DEFAULT NULL|--|
|`adresse_pays`|VARCHAR(64)|DEFAULT NULL|--|
|`telephone`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`mail`|VARCHAR(128)|DEFAULT NULL|--|
|`site_web`|VARCHAR(128)|DEFAULT NULL|--|
|`numero_siret`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`numero_siren`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`numero_tva`|VARCHAR(32)|DEFAULT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 3 : Prospect

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` | INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numéro_prospect`|VARCHAR(8)|UNIQUE INDEX, NOT NULL|--|
|`type_de_prospect`|ENUM(+)|NOT NULL|(+) entreprise, particulier, association,établissement publique|
|`type_de_societe`|VARCHAR(32)|DEFAULT NULL|--|
|`raison_sociale`|VARCHAR(64)|NOT NULL|--|
|`adresse_numero`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`adresse_bis_ter`|VARCHAR(8)|DEFAULT NULL|--|
|`adresse_type_de_voie`|VARCHAR(64)|DEFAULT NULL|--|
|`adresse_nom_de_la_voie`|VARCHAR(128)|DEFAULT NULL|--|
|`adresse_cp`|INT(8)|UNSIGNED, DEFAULT NULL|--|
|`adresse_ville`|VARCHAR(64)|DEFAULT NULL|--|
|`adresse_pays`|VARCHAR(64)|DEFAULT NULL|--|
|`telephone`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`mail`|VARCHAR(128)|DEFAULT NULL|--|
|`site_web`|VARCHAR(128)|DEFAULT NULL|--|
|`numero_siret`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`numero_siren`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`numero_tva`|VARCHAR(32)|DEFAULT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 4 : Famille_article (V2)

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`nom_famille_article`|VARCHAR(128)|NOT NULL|--|
|`code_famille_article` |VARCHAR(32)|DEFAULT NULL|Préfixe des articles appartennant à la famille|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 5 : Article

| Champ| Type | Spécificités | Description 
|--|--|--|--|
| `id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`code_article`|VARCHAR(32)|NOT NULL|Préfixe famille d'article + suffixe article|
|`designation_article`|VARCHAR(256)|NOT NULL|Le nom de l'article|
|`fournisseur_article`|VARCHAR(128)|DEFAULT NULL|--|
|`prix_achat_unitaire_ht`|INT(32)|DEFAULT NULL|--|
|`tva_achat`|ENUM(+)|DEFAULT NULL|(+) 2.2%, 5.5%, 10%, 20%, exonérer|
|`prix_vente_unitaire_ht`|||--|
|`tva_vente`|ENUM(+)|NOT NULL|(+) 2.2%, 5.5%, 10%, 20%, exonérer|
|`stock`|int(8)|DEFAULT NULL|Stock physique sans tenir compte des commandes clients et fournisseurs|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 6 : Fournisseur_devis

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numero_devis`|VARCHAR(16)|NOT NULL, UNIQUE|--|
|`id_fournisseur`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 7 : Fournisseur_bdc (bon de commande)

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numero_bdc`|VARCHAR(16)|NOT NULL, UNIQUE|--|
|`id_fournisseur`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 8 : Fournisseur_bdl (bon de livraison)

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numero_bdl`|VARCHAR(16)|NOT NULL, UNIQUE|--|
|`id_fournisseur`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 9 : Fournisseur_facture

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numero_facture`|VARCHAR(16)|NOT NULL, UNIQUE|--|
|`id_fournisseur`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 10 : Fournisseur_devis_ligne

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`id_devis`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`id_article`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`quantity`|INT(8)|NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 11 : Fournisseur_bdc_ligne (lignes de bon de commande)

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`id_bdc`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`id_article`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`quantity`|INT(8)|NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 12 : Fournisseur_bdl_ligne (lignes de bon de livraison)

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`id_bdl`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`id_article`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`quantity`|INT(8)|NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|

## Table 13 : Fournisseur_facture_ligne

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`id_facture`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`id_article`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`quantity`|INT(8)|NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 14 : Client_devis

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numero_devis`|VARCHAR(16)|NOT NULL, UNIQUE|--|
|`id_client`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 15 : Client_bdc (bon de commande)

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numero_bdc`|VARCHAR(16)|NOT NULL, UNIQUE|--|
|`id_client`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 16 : Client_bdl (bon de livraison)

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numero_bdl`|VARCHAR(16)|NOT NULL, UNIQUE|--|
|`id_client`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 17 : Client_facture

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`numero_facture`|VARCHAR(16)|NOT NULL, UNIQUE|--|
|`id_client`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|

## Table 18 : Client_relance (V2)

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 19 : Client_devis_ligne

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`id_devis`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`id_article`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`quantity`|INT(8)|NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 20 : Client_bdc_ligne (lignes de bon de commande)

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`id_bdc`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`id_article`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`quantity`|INT(8)|NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|


## Table 21 : Client_bdl_ligne (lignes de bon de livraison)

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`id_bdl`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`id_article`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`quantity`|INT(8)|NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|

## Table 22 : Client_facture_ligne

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`id_facture`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`id_article`|INT(8)|SECONDARY KEY, NOT NULL|--|
|`quantity`|INT(8)|NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|

## Table 23 : Fournisseur

| Champ| Type | Spécificités | Description
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`identifiant`|--|--|--|
|`password`|--|--|--|
|`entreprise`|--|--|--|
|--|--|--|--|
|--|--|--|--|
|`created_at`|--|--|--|
|`updated_at`|--|--|--|


## Table 23 : Parametre

| Champ| Type | Spécificités | Description 
|--|--|--|--|
|`id`|--|--|--|
|`numero_fournisseur`|--|--|--|
|`numero_client`|--|--|--|
|`numero_prospect`|--|--|--|
|`numero_article`|--|--|--|
|`numero_fournisseur_devis`|--|--|--|
|`numero_fournisseur_bdc`|--|--|--|
|`numero_fournisseur_bdl`|--|--|--|
|`numero_fournisseur_facture`|--|--|--|
|`numero_client_devis`|--|--|--|
|`numero_client_bdc`|--|--|--|
|`numero_client_bdl`|--|--|--|
|`numero_client_facture`|--|--|--|

# Dictionnaire de données Base 2


## Table 21 : Utilisateur

| Champ| Type | Spécificités | Description
|--|--|--|--|
|`id` |INT(8)| PRIMARY KEY, NOT NULL, AUTO_INCREMENT|--|
|`identifiant`|UNIQUE, NOT NULL|--|adresse mail|
|`password`|--|--|--|
|`entreprise`|VARCHAR(64)|DEFAULT NULL|--|
|`type_de_societe`|VARCHAR(32)|DEFAULT NULL|--|
|`raison_sociale`|VARCHAR(64)|NOT NULL|--|
|`adresse_numero`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`adresse_bis_ter`|VARCHAR(8)|DEFAULT NULL|--|
|`adresse_type_de_voie`|VARCHAR(64)|DEFAULT NULL|--|
|`adresse_nom_de_la_voie`|VARCHAR(128)|DEFAULT NULL|--|
|`adresse_cp`|INT(8)|UNSIGNED, DEFAULT NULL|--|
|`adresse_ville`|VARCHAR(64)|DEFAULT NULL|--|
|`adresse_pays`|VARCHAR(64)|DEFAULT NULL|--|
|`telephone`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`mail`|VARCHAR(128)|DEFAULT NULL|--|
|`site_web`|VARCHAR(128)|DEFAULT NULL|--|
|`numero_siret`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`numero_siren`|INT(16)|UNSIGNED, DEFAULT NULL|--|
|`numero_tva`|VARCHAR(32)|DEFAULT NULL|--|
|`role`|ENUM(+)|NOT NULL|(+) admin, adminuser, user|
|`mail_validate`|bool|NOT NULL||
|`date_de_validite_paiement`|TIMESTAMP|NOT NULL|--|
|`created_at`|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|--|
|`updated_at`|TIMESTAMP|NOT NULL|--|