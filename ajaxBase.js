var xmlHttp = null;

function GetAsincPageInIDelement(address,idElement)
{ 
    if (window.ActiveXObject)
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    else
        if (window.XMLHttpRequest)
            xmlHttp = new XMLHttpRequest();

/*
** Controllo Cache senza utilizzare l'header http **
   if (address.indexOf("?") == -1) address = address + "?timeStamp=" + new Date().getTime();
   else address = address + "&timeStamp=" + new Date().getTime();
*/
   
   xmlHttp.open("GET", address, true);
   xmlHttp.setRequestHeader('Accept','text/html');
   xmlHttp.setRequestHeader('Cache-Control','max-age=0');
   xmlHttp.send(null);
   xmlHttp.onload = function () {
                      if (xmlHttp.readyState === xmlHttp.DONE)
                        if (xmlHttp.status === 200)
                          document.getElementById(idElement).innerHTML = xmlHttp.responseText;
                    };
}
