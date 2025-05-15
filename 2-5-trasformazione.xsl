<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">
    
    <xsl:output method="html" indent="yes" encoding="UTF-8"/>  
    
    <xsl:template match="/ElencoEventi">
        <html>
            <head> <title>Risultato Ricerca</title> </head>
            <body>
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/25/Spirito-del-mare_small.jpg" style="width: 150px;" alt="" />
                <h1>Elenco eventi</h1>
                <ol>
                    <xsl:apply-templates select="evento" />
                </ol>
            </body>
        </html>
    </xsl:template>
    
    <xsl:template match="evento">
        <li>
            <xsl:value-of select="id"/>
            <xsl:text>, </xsl:text>
            <xsl:value-of select="titolo"/>
            <xsl:text>, </xsl:text>
            <xsl:value-of select="descrizione"/>
            <xsl:text>, </xsl:text>
            <xsl:value-of select="latitudine"/>
            <xsl:text>, </xsl:text>
            <xsl:value-of select="longitudine"/>
        </li>
    </xsl:template>
    
</xsl:stylesheet>