<?php
?>

<html>
<head>

<script language="JavaScript" version="1.2" type="text/javascript">

function pg_checkNull(pElement, pMsg, pChar)
{

	 //
	 // Prüft, ob in den übergebenen Textfeld eine Inhalt steht.
	 // Wenn nicht wird eine Meldung ausgegeben und der Fokus auf das
	 // geprüfte Feld gesetzt

	 // args:

	 //   - pElement: zu prüfendes Inputfeld
	 //   - pMsg    : Meldung, falls Feld nicht gefüllt (=null)
	 //               bei pMsg = null oder msg = "" wird eine Standardmeldung ausgegeben
	 //
         //   - pChar    :Wenn angegeben, wird der Elementwert auch auf dieses Zeichen geprüft,
         //               = Zeichen für null


 var returnValue = "true";
 var elementName = pElement.name;
 var elementWert = pElement.value;
 var elementLaenge=elementWert.length;
 var w1 = window.document.forms[0];
 var elementIndex = 0;
 var msg = pMsg;

 if(msg == null || msg == "")
 {
  msg = "Please enter a value";
 }


 for (var x = 0; x < w1.length; x++)           //Index des aktuellen Elementes bestimmen,
 {                                              //falls im Input-Tag das Attribut
    if (w1.elements[x].name == elementName)
     {
        elementIndex = x;
     }
 }

 if (elementWert == "" || elementWert == pChar)  //Ist der Elementwert = null oder entspricht er einem Zeichen
 {
   alert(msg);
   window.document.forms[0].elements[elementIndex].focus();
   returnValue = "false";
 }

 return returnValue;

}

function pg_checkChar(pElement, pChar, pMsg, pNullAllowed)
{

	 //
	 // Prüft, ob das übergebene Element ein Zeichen enthält (z.B. @ bei email Adresse)
	 // Wenn nicht wird eine Meldung ausgegeben und der Fokus auf das
	 // geprüfte Feld gesetzt

	 // args:

	 //   - pElement    : zu prüfendes Inputfeld
	 //   - pChar       : Zeichen, dessen Vorhandensein geprüft wird
	 //   - pMsg        : Meldung, falls Feld nicht numerisch
	 //                   bei pMsg = null oder msg = "" wird eine Standardmeldung ausgegeben
	 //   - pNullAllowed: bei "true" wird eine leeres Inputfeld akzeptiert

 var zeichen = pChar;	          //erlaubte Zeichen 0-9, Dezimaltrenner, Minus-Zeichen
 var returnValue = true;
 var elementName = pElement.name;
 var elementWert = pElement.value;
 var elementLaenge=elementWert.length;
 resultArray = new Array(pChar.length);
 var w1 = window.document.forms[0];
 var elementIndex = 0;
 var msg = pMsg;

 if(msg == null || msg == ""){
  msg = "Please enter a valid email adress";
 }

 for (var x = 0; x < w1.length; x++){           //Index des aktuellen Elementes bestimmen um später focus zu setzen
     if (w1.elements[x].name == elementName){
        elementIndex = x;
     }
 }

 if(Trim(elementWert) != null && Trim(elementWert) != ""){

   for (var i = 0; i < resultArray.length; ++i){
     resultArray[i] = false;
   }

   for (var i = 0; i < elementLaenge; i++){      	 //Durchlaufen aller Zeichen des Elementwertes
         d=elementWert.charAt(i);
      if (zeichen.indexOf(d) != -1){      //zeichen wurde gefunden
        resultArray[zeichen.indexOf(d)] = true;
      }
   }

   for (var i = 0; i < resultArray.length; ++i){
      if (! resultArray[i]){
       returnValue = false;
      }
   }
 }else{
   if (! pNullAllowed){
        returnValue = false;
   }
 }

 if (! returnValue){
   window.document.forms[0].elements[elementIndex].focus();
   alert (msg);
 }
 return returnValue;
}


function Trim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}

function checkFields()
{

var w1 = window.document.forms[0];
var msg = 'Bitte erfaßen Sie eine gültige email-Adresse';
var xCheck;

if (xCheck = pg_checkChar(w1.name ,"@.", msg, true) == false) return false;

}

</script>

</head>
<body>

<!--<form action="my_sql.php" method="post">  -->
<!--<form action="mailto:bernd.vierhuf@siemens.com" method="post">  -->

<form action="javascript:checkFields();"  method="post">
 <p>Die ID:   <input type="text" name="id" /></p>
 <p>Ihr Name: <input type="text" name="name" /></p>
<p>Radio Button:</p>
<p><input name="abschicken" type="submit" /></p>
</form>

</body>
</html>


