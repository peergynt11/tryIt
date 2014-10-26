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



function pg_checkNumeric(pElement, pMsg)
{	

	 //
	 // Prüft, ob der Wert des übergebenen Elements numerisch ist (incl '-')
	 // Wenn nicht wird eine Meldung ausgegeben und der Fokus auf das
	 // geprüfte Feld gesetzt

	 // args:

	 //   - pElement: zu prüfendes Inputfeld
	 //   - pMsg    : Meldung, falls Feld nicht numerisch
	 //               bei pMsg = null oder msg = "" wird eine Standardmeldung ausgegeben
	 //

 var erlaubteZeichen = ",-0123456789";	          //erlaubte Zeichen 0-9, Dezimaltrenner, Minus-Zeichen
 var returnValue = "true";
 var elementName = pElement.name;
 var elementWert = pElement.value;
 var elementLaenge=elementWert.length;
 var w1 = window.document.forms[0];
 var elementIndex = 0;
 var msg = pMsg; 

 if(msg == null || msg == "")
 {
  msg = "Please enter a numeric value";
 }

 for (var x = 0; x < w1.length; x++)           //Index des aktuellen Elementes bestimmen
 {
    if (w1.elements[x].name == elementName)        
     {
        elementIndex = x;
     }
 }    

 for (var i = 0; i < elementLaenge; i++)       //Durchlaufen aller Zeichen des Elementwertes
 {	    
    d=elementWert.charAt(i);
    if (erlaubteZeichen.indexOf(d) == -1)      //Ist ein Zeichen unter den nicht erlaubten
    {
      alert(msg);
      window.document.forms[0].elements[elementIndex].value="";
      window.document.forms[0].elements[elementIndex].focus();
      returnValue = "false";
      break;
    }	
 }
 return returnValue;
}

function pg_checkDate(pDateElement,pStartJahr,pEndeJahr,pMsg)
{	

	 // Prüft, ob ein Datumsfeld ein gültiges Datum enthält und
	 // dem Siemens-Standard YYYY-MM-DD entspricht.
         // Wenn nicht wird eine Meldung ausgegeben und der Fokus auf das
	 // geprüfte Feld gesetzt

	 // args:

	 //   - pElement  : zu prüfendes Inputfeld
	 //   - pStartJahr: früheste gültige Jahresangabe, z.B. 1900
	 //   - pEndeJahr : späteste gültige Jahresangabe, z.B. 2100

	 //   - pMsg      : Meldung, falls oben beschriebene Bedungung nicht erfüllt ist
	 //                 bei pMsg = null oder msg = "" wird eine Standardmeldung ausgegeben
	 //
         //   - pChar     :Wenn angegeben, wird der Elementwert auch auf dieses Zeichen geprüft,
         //                = Zeichen für null

var w1 = window.document.forms[0];
var Tag, Monat, Jahr, Laenge, tageMonat;
var elementName   = pDateElement.name;
var elementWert   = pDateElement.value;
var elementLaenge = elementWert.length;
var elementIndex  = 0;
var msg = pMsg; 

if(msg == null || msg == "")
{
 msg = "Please enter the date in the format YYYY-MM-DD";
}

for (var x = 0; x < w1.length; x++) //Index des aktuellen Elementes bestimmen
 {
    if (w1.elements[x].name == elementName)        
     {
        elementIndex = x;
     }
 }    


if(elementLaenge==0) //'keine Eintrag' ist nicht relevant
{
  return "true";
}

if (elementLaenge==10 && elementWert.substring(4,5)=="-" && elementWert.substring(7,8)=="-")
{
  Tag=parseInt(elementWert.substring(8,10),10);
  Monat=parseInt(elementWert.substring(5,7),10);
  Jahr=parseInt(elementWert.substring(0,4),10);
}
else
{
 w1.elements[elementIndex].focus();
 alert(msg);return "false";
}

if (Monat==4 || Monat==6 || Monat==9 || Monat==11)
{
  tageMonat=30;
}
else if (Monat==1 || Monat==3 || Monat==5 || Monat==7 || Monat==8 || Monat==10 || Monat==12)
{
  tageMonat=31;
}
else if(Monat==2 && Jahr%4==0 && Jahr%100!=0 || Jahr%400==0)
{
  tageMonat=29;
}
else if(Monat==2 && Jahr%4!=0 || Jahr%100==0 && Jahr%400!=0)
{
  tageMonat=28;
}

if (Tag>=1 && Tag<=tageMonat && Monat>=1 && Monat<=12 && Jahr>=pStartJahr && Jahr<=pEndeJahr)
{
return "true";
}
else
{
 w1.elements[elementIndex].focus();
 alert(msg);return "false";
}

}

function pg_checkDateTime(pDateElement,pStartJahr,pEndeJahr,pMsg)
{	

	 // Prüft, ob ein Datumsfeld ein gültiges Datum enthält und
	 // dem Muster YYYY-MM-DD HH:MI entspricht.
         // Wenn nicht wird eine Meldung ausgegeben und der Fokus auf das
	 // geprüfte Feld gesetzt

	 // args:

	 //   - pElement  : zu prüfendes Inputfeld
	 //   - pStartJahr: früheste gültige Jahresangabe, z.B. 1900
	 //   - pEndeJahr : späteste gültige Jahresangabe, z.B. 2100

	 //   - pMsg      : Meldung, falls oben beschriebene Bedungung nicht erfüllt ist
	 //                 bei pMsg = null oder msg = "" wird eine Standardmeldung ausgegeben
	 //
         //   - pChar     :Wenn angegeben, wird der Elementwert auch auf dieses Zeichen geprüft,
         //                = Zeichen für null

var w1 = window.document.forms[0];
var Tag, Monat, Jahr, Laenge, tageMonat;
var elementName   = pDateElement.name;
var elementWert   = pDateElement.value;
var elementLaenge = elementWert.length;
var elementIndex  = 0;
var msg = pMsg; 

if(msg == null || msg == "")
{
 msg = "Please enter the date in the format YYYY-MM-DD";
}

for (var x = 0; x < w1.length; x++) //Index des aktuellen Elementes bestimmen
 {
    if (w1.elements[x].name == elementName)        
     {
        elementIndex = x;
     }
 }    


if(elementLaenge==0) //'keine Eintrag' ist nicht relevant
{
  return "true";
}

if (elementLaenge==16 && elementWert.substring(4,5)=="-" && elementWert.substring(7,8)=="-" && elementWert.substring(13,14)==":")
{
  Tag=parseInt(elementWert.substring(8,10),10);
  Monat=parseInt(elementWert.substring(5,7),10);
  Jahr=parseInt(elementWert.substring(0,4),10);
}
else
{
 w1.elements[elementIndex].focus();
 alert(msg);return "false";
}

if (Monat==4 || Monat==6 || Monat==9 || Monat==11)
{
  tageMonat=30;
}
else if (Monat==1 || Monat==3 || Monat==5 || Monat==7 || Monat==8 || Monat==10 || Monat==12)
{
  tageMonat=31;
}
else if(Monat==2 && Jahr%4==0 && Jahr%100!=0 || Jahr%400==0)
{
  tageMonat=29;
}
else if(Monat==2 && Jahr%4!=0 || Jahr%100==0 && Jahr%400!=0)
{
  tageMonat=28;
}

if (Tag>=1 && Tag<=tageMonat && Monat>=1 && Monat<=12 && Jahr>=pStartJahr && Jahr<=pEndeJahr)
{
return "true";
}
else
{
 w1.elements[elementIndex].focus();
 alert(msg);return "false";
}

}



function pg_getURL(pDAD,pAppID,pPage,pSession)
{	

	 // Erstellt den fixen Teil der URL zum Aufruf einer 
	 // HTMLDB-Seite. 

	 // args:

	 //   - pDAD    : URL-Teilstring, der den Database-Access Deskriptor angibt, i.d.R. /pls/htmldb/f?p=
         //               Sollte in der Applikation als Substitutionsvariable angelegt werden.
	 //   - pAppID  : ApplikationsID, i.d.R. &APP_ID.
	 //   - pPage   : aufzurufende Seite
	 //   - pSession: SessionID, i.d.R. &APP_SESSION.               

         //   Beispiel  : https://mlhw015a.ww007.siemens.net/pls/htmldb/f?p=311:10:3072640578892232772:


 
var protocol    = window.location.protocol;
var host        = window.location.host; 
var returnValue = "";

returnValue = protocol + "//" + host + pDAD + pAppID + ":" + pPage + ":" + pSession + ":";
return returnValue;
}


function pg_quote(pParam)
{	

	 // Setzt den Backslash um den übergebenen Parameter (quoten) und returniert
	 // gleichzeiteig mit escape


return escape('\\' + pParam + '\\');
}
