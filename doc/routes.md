# Endpoint (routes)






| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/api` | `GET` | `MainController` | `home` | - | - | - |
|--|--|--|--|--|--|--|
| `/api/fournisseur` | GET | `FournisseurController` | `list` | - | - | - |
| `/api/fournisseur/[i:index]` | GET | `FournisseurController` | `edit` | - | - | - |
| `/api/fournisseur/new` |POST| `FournisseurController` |`new` |--|--|--|
| `/api/fournisseur/modif/[i:index]` |PUT| `FournisseurController` |`modif` |--|--|--|
| `/api/fournisseur/supp/[i:index]` |OPTION| `FournisseurController` |`corsoption`|--|--|--|
| `/api/fournisseur/supp/[i:index]` |DELETE| `FournisseurController` |`supp`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/fournisseur/devis` | GET | `FournisseurController` | `listDevis` | - | - | - |
| `/api/fournisseur/devis/[i:index]` | GET | `FournisseurController` | `editDevis` | - | - | - |
| `/api/fournisseur/devis/new` |POST| `FournisseurController` |`newDevis` |--|--|--|
| `/api/fournisseur/devis/modif/[i:index]` |PUT| `FournisseurController` |`modifDevis` |--|--|--|
| `/api/fournisseur/devis/supp/[i:index]` |OPTION| `FournisseurController` |`corsoptionDevis`|--|--|--|
| `/api/fournisseur/devis/supp/[i:index]` |DELETE| `FournisseurController` |`suppDevis`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/fournisseur/bdc` | GET | `FournisseurController` | `listBdc` | - | - | - |
| `/api/fournisseur/bdc/[i:index]` | GET | `FournisseurController` | `editBdc` | - | - | - |
| `/api/fournisseur/bdc/new` |POST| `FournisseurController` |`newBdc` |--|--|--|
| `/api/fournisseur/bdc/modif/[i:index]` |PUT| `FournisseurController` |`modifBdc` |--|--|--|
| `/api/fournisseur/bdc/supp/[i:index]` |OPTION| `FournisseurController` |`corsoptionBdc`|--|--|--|
| `/api/fournisseur/bdc/supp/[i:index]` |DELETE| `FournisseurController` |`suppBdc`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/fournisseur/bdl` | GET | `FournisseurController` | `listBdl` | - | - | - |
| `/api/fournisseur/bdl/[i:index]` | GET | `FournisseurController` | `editBdl` | - | - | - |
| `/api/fournisseur/bdl/new` |POST| `FournisseurController` |`newBdc` |--|--|--|
| `/api/fournisseur/bdl/modif/[i:index]` |PUT| `FournisseurController` |`modifBdl` |--|--|--|
| `/api/fournisseur/bdl/supp/[i:index]` |OPTION| `FournisseurController` |`corsoptionBdl`|--|--|--|
| `/api/fournisseur/bdl/supp/[i:index]` |DELETE| `FournisseurController` |`suppBdl`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/fournisseur/facture` | GET | `FournisseurController` | `listFacture` | - | - | - |
| `/api/fournisseur/facture/[i:index]` | GET | `FournisseurController` | `editFacture` | - | - | - |
| `/api/fournisseur/facture/new` |POST| `FournisseurController` |`newFacture` |--|--|--|
| `/api/fournisseur/facture/modif/[i:index]` |PUT| `FournisseurController` |`modifFacture` |--|--|--|
| `/api/fournisseur/facture/supp/[i:index]` |OPTION| `FournisseurController` |`corsoptionFacture`|--|--|--|
| `/api/fournisseur/facture/supp/[i:index]` |DELETE| `FournisseurController` |`suppFacture`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/fournisseur/devis/ligne` | GET | `FournisseurController` | `listDevisLigne` | - | - | - |
| `/api/fournisseur/devis/ligne/[i:index]` | GET | `FournisseurController` | `editDevisLigne` | - | - | - |
|`/api/fournisseur/one/devis/lignes/[i:index]`| GET |` FournisseurController` |`editDevisAllLignesOneDevis`|--|--|--|
| `/api/fournisseur/devis/ligne/new` |POST| `FournisseurController` |`newDevis` |--|--|--|
| `/api/fournisseur/devis/ligne/modif/[i:index]` |PUT| `FournisseurController` |`modifDevisLigne` |--|--|--|
| `/api/fournisseur/devis/ligne/supp/[i:index]` |OPTION| `FournisseurController` |`corsoptionDevisLigne`|--|--|--|
| `/api/fournisseur/devis/ligne/supp/[i:index]` |DELETE| `FournisseurController` |`suppDevisLigne`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/fournisseur/bdc/ligne` | GET | `FournisseurController` | `listBdc` | - | - | - |
| `/api/fournisseur/bdc/ligne/[i:index]` | GET | `FournisseurController` | `editBdcLigne` | - | - | - |
|`/api/fournisseur/one/bdc/lignes/[i:index]`| GET |` FournisseurController` |`editBdcAllLignesOneBdc`|--|--|--|
| `/api/fournisseur/bdc/ligne/new` |POST| `FournisseurController` |`newBdc` |--|--|--|
| `/api/fournisseur/bdc/ligne/modif/[i:index]` |PUT| `FournisseurController` |`modifBdcLigne` |--|--|--|
| `/api/fournisseur/bdc/ligne/supp/[i:index]` |OPTION| `FournisseurController` |`corsoptionBdcLigne`|--|--|--|
| `/api/fournisseur/bdc/ligne/supp/[i:index]` |DELETE| `FournisseurController` |`suppBdcLigne`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/fournisseur/bdl/ligne` | GET | `FournisseurController` | `listBdl` | - | - | - |
| `/api/fournisseur/bdl/ligne/[i:index]` | GET | `FournisseurController` | `editBdlLigne` | - | - | - |
|`/api/fournisseur/one/bdl/lignes/[i:index]`| GET |` FournisseurController` |`editBdlAllLignesOneBdl`|--|--|--|
| `/api/fournisseur/bdl/ligne/new` |POST| `FournisseurController` |`newBdc` |--|--|--|
| `/api/fournisseur/bdl/ligne/modif/[i:index]` |PUT| `FournisseurController` |`modifBdlLigne` |--|--|--|
| `/api/fournisseur/bdl/ligne/supp/[i:index]` |OPTION| `FournisseurController` |`corsoptionBdlLigne`|--|--|--|
| `/api/fournisseur/bdl/ligne/supp/[i:index]` |DELETE| `FournisseurController` |`suppBdlLigne`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/fournisseur/facture/ligne` | GET | `FournisseurController` | `listFacture` | - | - | - |
| `/api/fournisseur/facture/ligne/[i:index]` | GET | `FournisseurController` | `editFactureLigne` | - | - | - |
|`/api/fournisseur/one/facture/lignes/[i:index]`| GET |` FournisseurController` |`editFactureAllLignesOneFacture`|--|--|--|
| `/api/fournisseur/facture/ligne/new` |POST| `FournisseurController` |`newFactureLigne` |--|--|--|
| `/api/fournisseur/facture/ligne/modif/[i:index]` |PUT| `FournisseurController` |`modifFactureLigne` |--|--|--|
| `/api/fournisseur/facture/ligne/supp/[i:index]` |OPTION| `FournisseurController` |`corsoptionFactureLigne`|--|--|--|
| `/api/fournisseur/facture/ligne/supp/[i:index]` |DELETE| `FournisseurController` |`suppFactureLigne`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/client` | GET | `ClientController` | `list` | - | - | - |
| `/api/client/[i:index]` | GET | `ClientController` | `edit` | - | - | - |
| `/api/client/new` |POST| `ClientController` |`new` |--|--|--|
| `/api/client/modif/[i:index]` |PUT| `ClientController` |`modif` |--|--|--|
| `/api/client/supp/[i:index]` |OPTION| `ClientController` |`corsoption`|--|--|--|
| `/api/client/supp/[i:index]` |DELETE| `ClientController` |`supp`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/client/devis` | GET | `ClientController` | `listDevis` | - | - | - |
| `/api/client/devis/[i:index]` | GET | `ClientController` | `editDevis` | - | - | - |
| `/api/client/devis/new` |POST| `ClientController` |`newDevis` |--|--|--|
| `/api/client/devis/modif/[i:index]` |PUT| `ClientController` |`modifDevis` |--|--|--|
| `/api/client/devis/supp/[i:index]` |OPTION| `ClientController` |`corsoptionDevis`|--|--|--|
| `/api/client/devis/supp/[i:index]` |DELETE| `ClientController` |`suppDevis`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/client/bdc` | GET | `ClientController` | `listBdc` | - | - | - |
| `/api/client/bdc/[i:index]` | GET | `ClientController` | `editBdc` | - | - | - |
| `/api/client/bdc/new` |POST| `ClientController` |`newBdc` |--|--|--|
| `/api/client/bdc/modif/[i:index]` |PUT| `ClientController` |`modifBdc` |--|--|--|
| `/api/client/bdc/supp/[i:index]` |OPTION| `ClientController` |`corsoptionBdc`|--|--|--|
| `/api/client/bdc/supp/[i:index]` |DELETE| `ClientController` |`suppBdc`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/client/bdl` | GET | `ClientController` | `listBdl` | - | - | - |
| `/api/client/bdl/[i:index]` | GET | `ClientController` | `editBdl` | - | - | - |
| `/api/client/bdl/new` |POST| `ClientController` |`newBdc` |--|--|--|
| `/api/client/bdl/modif/[i:index]` |PUT| `ClientController` |`modifBdl` |--|--|--|
| `/api/client/bdl/supp/[i:index]` |OPTION| `ClientController` |`corsoptionBdl`|--|--|--|
| `/api/client/bdl/supp/[i:index]` |DELETE| `ClientController` |`suppBdl`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/client/facture` | GET | `ClientController` | `listFacture` | - | - | - |
| `/api/client/facture/[i:index]` | GET | `ClientController` | `editFacture` | - | - | - |
| `/api/client/facture/new` |POST| `ClientController` |`newFacture` |--|--|--|
| `/api/client/facture/modif/[i:index]` |PUT| `ClientController` |`modifFacture` |--|--|--|
| `/api/client/facture/supp/[i:index]` |OPTION| `ClientController` |`corsoptionFacture`|--|--|--|
| `/api/client/facture/supp/[i:index]` |DELETE| `ClientController` |`suppFacture`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/client/devis/ligne` | GET | `ClientController` | `listDevisLigne` | - | - | - |
| `/api/client/devis/ligne/[i:index]` | GET | `ClientController` | `editDevisLigne` | - | - | - |
|`/api/client/one/devis/lignes/[i:index]`| GET |` ClientController` |`editDevisAllLignesOneDevis`|--|--|--|
| `/api/client/devis/ligne/new` |POST| `ClientController` |`newDevis` |--|--|--|
| `/api/client/devis/ligne/modif/[i:index]` |PUT| `ClientController` |`modifDevisLigne` |--|--|--|
| `/api/client/devis/ligne/supp/[i:index]` |OPTION| `ClientController` |`corsoptionDevisLigne`|--|--|--|
| `/api/client/devis/ligne/supp/[i:index]` |DELETE| `ClientController` |`suppDevisLigne`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/client/bdc/ligne` | GET | `ClientController` | `listBdc` | - | - | - |
| `/api/client/bdc/ligne/[i:index]` | GET | `ClientController` | `editBdcLigne` | - | - | - |
|`/api/client/one/bdc/lignes/[i:index]`| GET |` ClientController` |`editBdcAllLignesOneBdc`|--|--|--|
| `/api/client/bdc/ligne/new` |POST| `ClientController` |`newBdc` |--|--|--|
| `/api/client/bdc/ligne/modif/[i:index]` |PUT| `ClientController` |`modifBdcLigne` |--|--|--|
| `/api/client/bdc/ligne/supp/[i:index]` |OPTION| `ClientController` |`corsoptionBdcLigne`|--|--|--|
| `/api/client/bdc/ligne/supp/[i:index]` |DELETE| `ClientController` |`suppBdcLigne`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/client/bdl/ligne` | GET | `ClientController` | `listBdl` | - | - | - |
| `/api/client/bdl/ligne/[i:index]` | GET | `ClientController` | `editBdlLigne` | - | - | - |
|`/api/client/one/bdl/lignes/[i:index]`| GET |` ClientController` |`editBdlAllLignesOneBdl`|--|--|--|
| `/api/client/bdl/ligne/new` |POST| `ClientController` |`newBdc` |--|--|--|
| `/api/client/bdl/ligne/modif/[i:index]` |PUT| `ClientController` |`modifBdlLigne` |--|--|--|
| `/api/client/bdl/ligne/supp/[i:index]` |OPTION| `ClientController` |`corsoptionBdlLigne`|--|--|--|
| `/api/client/bdl/ligne/supp/[i:index]` |DELETE| `ClientController` |`suppBdlLigne`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/client/facture/ligne` | GET | `ClientController` | `listFacture` | - | - | - |
| `/api/client/facture/ligne/[i:index]` | GET | `ClientController` | `editFactureLigne` | - | - | - |
|`/api/client/one/facture/lignes/[i:index]`| GET |` ClientController` |`editFactureAllLignesOneFacture`|--|--|--|
| `/api/client/facture/ligne/new` |POST| `ClientController` |`newFactureLigne` |--|--|--|
| `/api/client/facture/ligne/modif/[i:index]` |PUT| `ClientController` |`modifFactureLigne` |--|--|--|
| `/api/client/facture/ligne/supp/[i:index]` |OPTION| `ClientController` |`corsoptionFactureLigne`|--|--|--|
| `/api/client/facture/ligne/supp/[i:index]` |DELETE| `ClientController` |`suppFactureLigne`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/prospect` | GET | `ProspectController` | `list` | - | - | - |
| `/api/prospect/[i:index]` | GET | `ProspectController` | `edit` | - | - | - |
| `/api/prospect/new` |POST| `ProspectController` |`new` |--|--|--|
| `/api/prospect/modif/[i:index]` |PUT| `ProspectController` |`modif` |--|--|--|
| `/api/prospect/supp/[i:index]` |OPTION| `ProspectController` |`corsoption`|--|--|--|
| `/api/prospect/supp/[i:index]` |DELETE| `ProspectController` |`supp`|--|--|--|
|--|--|--|--|--|--|--|
| `/api/article` | GET | `ArticleController` | `list` | - | - | - |
| `/api/article/[i:index]` | GET | `ArticleController` | `edit` | - | - | - |
| `/api/article/new` |POST| `ArticleController` |`new` |--|--|--|
| `/api/article/modif/[i:index]` |PUT| `ArticleController` |`modif` |--|--|--|
| `/api/article/supp/[i:index]` |OPTION| `ArticleController` |`corsoption`|--|--|--|
| `/api/article/supp/[i:index]` |DELETE| `ArticleController` |`supp`|--|--|--|
|--|--|--|--|--|--|--|



