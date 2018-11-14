function validate(form)
{
    fail=validate_surname(form.nom.value)
    fail+=validate_ename(form.prenom.value)
    fail+=validate_adresse(form.adresse.value)
    fail+=validate_sexe(form.sexe.value)
    fail+=validate_salaire(form.salaire.value)
    fail+=validate_service(form.service.value)

    if(fail=="")
    {
        return true;
    }
    else
    {
        alert(fail);
        return false;
    }
}

function validate_surname(field)
{
    if(field=="")
    {
        return "Entrer votre Nom de famille \n";
    }
    return "";
}

function validate_ename(field)
{
    if(field=="")
    {
        return "veuillez saisir votre Prenom\n";
    }
    return "";
}

function validate_adresse(field)
{
    if(field=="")
    {
        return "Entrer votre adresse\n";
    }
    return "";
}
function validate_sexe(field)
{
    if(field=="")
    {
        return "veuillez saisir votre sexe\n";
    }
    return "";
}
function validate_salaire(field)
{
    if(field=="" || isNaN(field))
    {
        return "Entrez le prix d'achat\n";
    }
    return "";
}
function validate_service(field)
{
    if(field=="")
    {
        return "Entrer le Domaine de Service affecter\n";
    }
    return "";
}
