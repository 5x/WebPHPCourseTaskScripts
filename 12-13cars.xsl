<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output media-type="text/html"/>
    <xsl:template match="/">
        <html lang="en">
            <head>
                <meta charset="UTF-8"/>
                <title>XML</title>
            </head>
            <body>
                <table width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th align="left">Марка</th>
                            <th align="left">Модель</th>
                            <th align="left">Рік виготовлення</th>
                            <th align="left">Пробіг (тис.км.)</th>
                            <th align="left">Колір</th>
                            <th align="left">Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="catalog/item">
                            <tr>
                                <td>
                                    <xsl:value-of select="brand"/>
                                </td>
                                <td>
                                    <xsl:value-of select="mark"/>
                                </td>
                                <td>
                                    <xsl:value-of select="year"/>
                                </td>
                                <td>
                                    <xsl:value-of select="mileage"/>
                                </td>
                                <td>
                                    <xsl:value-of select="color"/>
                                </td>
                                <td>
                                    <xsl:value-of select="price"/>
                                </td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
