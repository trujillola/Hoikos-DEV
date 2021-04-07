
 /*Fonctions de validation du formulaire de contact */
function validation(obj){
  var nom;
  for (i = 0; i < 5; i++) {
    switch (i) {
      case 0 : {
        nom="Nom";
        break;
      }
      case 1 : {
        nom="Prenom";
        break;
      }
      case 2 : {
        nom="Adresse-email";
        break;
      }
      case 3 : {
        nom="Sujet";
        break;
      }
      case 4 : {
        nom="Message";
        break;
      }
    }
    if (obj[i]==0){
      document.forms["monformulaire"][nom].style.borderColor="#ffc7c7";
    }else{
      document.forms["monformulaire"][nom].style.borderColor=" #ccc";
    }
  }
}

 /*Fonctions de validation du formulaire de contact */
 function validationPattern(nom){
 var valeur = document.forms["monformulaire"][nom].value;
   if (valeur=="") {
      document.forms["monformulaire"][nom].style.borderColor="#ffc7c7";
      switch (nom) {
        case 'Adresse-email':
          document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer un email.");
          break;
        case 'Codepostal':
          document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer un code postal.");
          break;
        case 'Nom':
         document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer un nom.");
          break;
        case 'Prenom':
          document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer un prénom.");
          break;
        default:
          console.log(`Sorry, we are out of ${expr}.`);
      }
    } else {
      if(document.forms["monformulaire"][nom].validity.patternMismatch){
        document.forms["monformulaire"][nom].style.borderColor="#ffc7c7";
        switch (nom) {
          case 'Adresse-email':
            document.forms["monformulaire"][nom].setCustomValidity("Cet email est invalide. Exemple valide : nom.prenom@mail.com");
            break;
          case 'Codepostal':
            document.forms["monformulaire"][nom].setCustomValidity("Ce code postal est invalide.");
            break;
          case 'Nom':
            document.forms["monformulaire"][nom].setCustomValidity("Ce nom est invalide. Il ne doit contenir que des lettres ou des espaces.");
            break;
          case 'Prenom':
            document.forms["monformulaire"][nom].setCustomValidity("Ce prénom est invalide. il ne doit contenir que des lettres ou des espaces.");
            break;
          default:
            console.log(`Sorry, we are out of ${expr}.`);
        }
      }else{
        document.forms["monformulaire"][nom].style.borderColor=" #ccc";
        document.forms["monformulaire"][nom].setCustomValidity("");
      }
    } 
}

function validationSimple(nom){
  var valeur = document.forms["monformulaire"][nom].value;
  if (valeur=="") {
    document.forms["monformulaire"][nom].style.borderColor="#ffc7c7";
    switch (nom) {
      case 'Nom':
        document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer votre nom.");
        break;
      case 'Prenom':
        document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer votre prénom.");
        break;
      case 'Sujet':
        document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer le motif de ce mail.");
        break;
        case 'Message':
        document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer votre message.");
        break;
      case 'Civilité':
        document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer votre civilité.");
        break;
      case 'Date':
        document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer votre date de naissance.");
        break;
      case 'Mdp':
         document.forms["monformulaire"][nom].setCustomValidity("Veuillez entrer un mot de passe.");
         break;
      case 'MdpVerif':
        document.forms["monformulaire"][nom].setCustomValidity("Veuillez valider le mot de passe.");
        break;
      case 'Profil':
        document.forms["monformulaire"][nom].setCustomValidity("Veuillez choisir un profil.");
        break;
      default:
        console.log(`Sorry, we are out of ${expr}.`);
    }
  } else {
    document.forms["monformulaire"][nom].style.borderColor=" #ccc";
    document.forms["monformulaire"][nom].setCustomValidity("");
  }
}

