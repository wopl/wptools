<?php
// **********************************************************************************
// **                                                                              **
// ** privacy.php                                   (c) Wolfram Plettscher 05/2018 **
// **                                                                              **
// **********************************************************************************
include "inc/menuhref.inc";
include "inc/password.class.php";

//-----------------------------------------------------------------------------------
// react on previously pushed buttons                                             ---
?>

<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
-->
<!DOCTYPE html>
<html>
<head>

    <title>WP Tools</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
	<?php
		include ('css/menu.inc');
		include ('css/stdbutton.inc');
	?>

</head>

<body>
	<div id="wrapper">

        <div id="header">
            <table width="980px"><tr>
                <td align="left" valign="bottom"><h3> </h3></td>
                <td align="right" valign="middle"></td>
            </tr></table>
        </div>
        
        <div id="cssmenu">
            <ul>
		<li><a href='<?php echo checksslproxy ('login.php')?>'><span>Login</span></a></li> 
		<li class='active'><a href='<?php echo checksslproxy ('privacy.php')?>'><span>Privacy Policy</span></a></li> 
		<li><a href='<?php echo checksslproxy ('loginimpressum.php')?>'><span>Impressum</span></a></li> 
            </ul>
        </div>
            

        <div id="contentbody">
<h1>Datenschutzerkl&auml;rung</h1>
Diese Datenschutzerkl&auml;rung kl&auml;rt Sie &uuml;ber die Art, den Umfang und Zweck der Verarbeitung von personenbezogenen Daten (nachfolgend kurz &bdquo;Daten&ldquo;) innerhalb unseres Onlineangebotes und der mit ihm verbundenen Webseiten, Funktionen und Inhalte sowie externen Onlinepr&auml;senzen, wie z.B. unser Social Media Profile auf. (nachfolgend gemeinsam bezeichnet als &bdquo;Onlineangebot&ldquo;). Im Hinblick auf die verwendeten Begrifflichkeiten, wie z.B. &bdquo;Verarbeitung&ldquo; oder &bdquo;Verantwortlicher&ldquo; verweisen wir auf die Definitionen im Art. 4 der Datenschutzgrundverordnung (DSGVO).
<br>
<h3>Verantwortlicher</h3>
Wolfram Plettscher<br>
Krebsaueler Str. 22d<br>
53797 Lohmar<br>
Deutschland<br>
wolfram@plettscher.de<br>
Link zum Impressum: https://wptools.plettscher.de/loginimpressum.php<br>
Link zur Datenschutzerkl&auml;rung: https://wptools.plettscher.de/privacy.php<br>
<h3>Arten der verarbeiteten Daten:</h3>
-	Bestandsdaten (z.B., Namen, Adressen).<br>
-	Kontaktdaten (z.B., E-Mail, Telefonnummern).<br>
-	Inhaltsdaten (z.B., Texteingaben, Fotografien, Videos).<br>
-	Nutzungsdaten (z.B., besuchte Webseiten, Interesse an Inhalten, Zugriffszeiten).<br>
-	Meta-/Kommunikationsdaten (z.B., Ger&auml;te-Informationen, IP-Adressen).<br>
<h3>Kategorien betroffener Personen</h3>
Besucher und Nutzer des Onlineangebotes (Nachfolgend bezeichnen wir die betroffenen Personen zusammenfassend auch als &bdquo;Nutzer&ldquo;).
<h3>Zweck der Verarbeitung</h3>
-	Zurverf&uuml;gungstellung des Onlineangebotes, seiner Funktionen und  Inhalte.<br>
-	Beantwortung von Kontaktanfragen und Kommunikation mit Nutzern.<br>
-	Sicherheitsma&szlig;nahmen.<br>
-	Reichweitenmessung/Marketing<br>
<h3>Verwendete Begrifflichkeiten</h3>
<b> &bdquo;Personenbezogene Daten&ldquo;</b> sind alle Informationen, die sich auf eine identifizierte oder identifizierbare nat&uuml;rliche Person (im Folgenden &bdquo;betroffene Person&ldquo;) beziehen; als identifizierbar wird eine nat&uuml;rliche Person angesehen, die direkt oder indirekt, insbesondere mittels Zuordnung zu einer Kennung wie einem Namen, zu einer Kennnummer, zu Standortdaten, zu einer Online-Kennung (z.B. Cookie) oder zu einem oder mehreren besonderen Merkmalen identifiziert werden kann, die Ausdruck der physischen, physiologischen, genetischen, psychischen, wirtschaftlichen, kulturellen oder sozialen Identit&auml;t dieser nat&uuml;rlichen Person sind.
<br><br>
<b>&bdquo;Verarbeitung&ldquo;</b> ist jeder mit oder ohne Hilfe automatisierter Verfahren ausgef&uuml;hrten Vorgang oder jede solche Vorgangsreihe im Zusammenhang mit personenbezogenen Daten. Der Begriff reicht weit und umfasst praktisch jeden Umgang mit Daten.
<br><br>
Als <b>&bdquo;Verantwortlicher&ldquo;</b> wird die nat&uuml;rliche oder juristische Person, Beh&ouml;rde, Einrichtung oder andere Stelle, die allein oder gemeinsam mit anderen &uuml;ber die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten entscheidet, bezeichnet.
<h3>Ma&szlig;gebliche Rechtsgrundlagen</h3>
Nach Ma&szlig;gabe des Art. 13 DSGVO teilen wir Ihnen die Rechtsgrundlagen unserer Datenverarbeitungen mit. Sofern die Rechtsgrundlage in der Datenschutzerkl&auml;rung nicht genannt wird, gilt Folgendes: Die Rechtsgrundlage f&uuml;r die Einholung von Einwilligungen ist Art. 6 Abs. 1 lit. a und Art. 7 DSGVO, die Rechtsgrundlage f&uuml;r die Verarbeitung zur Erf&uuml;llung unserer Leistungen und Durchf&uuml;hrung vertraglicher Ma&szlig;nahmen sowie Beantwortung von Anfragen ist Art. 6 Abs. 1 lit. b DSGVO, die Rechtsgrundlage f&uuml;r die Verarbeitung zur Erf&uuml;llung unserer rechtlichen Verpflichtungen ist Art. 6 Abs. 1 lit. c DSGVO, und die Rechtsgrundlage f&uuml;r die Verarbeitung zur Wahrung unserer berechtigten Interessen ist Art. 6 Abs. 1 lit. f DSGVO. F&uuml;r den Fall, dass lebenswichtige Interessen der betroffenen Person oder einer anderen nat&uuml;rlichen Person eine Verarbeitung personenbezogener Daten erforderlich machen, dient Art. 6 Abs. 1 lit. d DSGVO als Rechtsgrundlage.
<h3>Zusammenarbeit mit Auftragsverarbeitern und Dritten</h3>
Sofern wir im Rahmen unserer Verarbeitung Daten gegen&uuml;ber anderen Personen und Unternehmen (Auftragsverarbeitern oder Dritten) offenbaren, sie an diese &uuml;bermitteln oder ihnen sonst Zugriff auf die Daten gew&auml;hren, erfolgt dies nur auf Grundlage einer gesetzlichen Erlaubnis (z.B. wenn eine &Uuml;bermittlung der Daten an Dritte, wie an Zahlungsdienstleister, gem. Art. 6 Abs. 1 lit. b DSGVO zur Vertragserf&uuml;llung erforderlich ist), Sie eingewilligt haben, eine rechtliche Verpflichtung dies vorsieht oder auf Grundlage unserer berechtigten Interessen (z.B. beim Einsatz von Beauftragten, Webhostern, etc.). 
<br><br>
Sofern wir Dritte mit der Verarbeitung von Daten auf Grundlage eines sog. <b>&bdquo;Auftragsverarbeitungsvertrages&ldquo;</b> beauftragen, geschieht dies auf Grundlage des Art. 28 DSGVO.
<h3>&Uuml;bermittlungen in Drittl&auml;nder</h3>
Sofern wir Daten in einem Drittland (d.h. au&szlig;erhalb der Europ&auml;ischen Union (EU) oder des Europ&auml;ischen Wirtschaftsraums (EWR)) verarbeiten oder dies im Rahmen der Inanspruchnahme von Diensten Dritter oder Offenlegung, bzw. &Uuml;bermittlung von Daten an Dritte geschieht, erfolgt dies nur, wenn es zur Erf&uuml;llung unserer (vor)vertraglichen Pflichten, auf Grundlage Ihrer Einwilligung, aufgrund einer rechtlichen Verpflichtung oder auf Grundlage unserer berechtigten Interessen geschieht. Vorbehaltlich gesetzlicher oder vertraglicher Erlaubnisse, verarbeiten oder lassen wir die Daten in einem Drittland nur beim Vorliegen der besonderen Voraussetzungen der Art. 44 ff. DSGVO verarbeiten. D.h. die Verarbeitung erfolgt z.B. auf Grundlage besonderer Garantien, wie der offiziell anerkannten Feststellung eines der EU entsprechenden Datenschutzniveaus (z.B. f&uuml;r die USA durch das &bdquo;Privacy Shield&ldquo;) oder Beachtung offiziell anerkannter spezieller vertraglicher Verpflichtungen (so genannte &bdquo;Standardvertragsklauseln&ldquo;).
<h3>Rechte der betroffenen Personen</h3>
Sie haben das Recht, eine Best&auml;tigung dar&uuml;ber zu verlangen, ob betreffende Daten verarbeitet werden und auf Auskunft &uuml;ber diese Daten sowie auf weitere Informationen und Kopie der Daten entsprechend Art. 15 DSGVO.
<br><br>
Sie haben entsprechend. Art. 16 DSGVO das Recht, die Vervollst&auml;ndigung der Sie betreffenden Daten oder die Berichtigung der Sie betreffenden unrichtigen Daten zu verlangen.
<br><br>
Sie haben nach Ma&szlig;gabe des Art. 17 DSGVO das Recht zu verlangen, dass betreffende Daten unverz&uuml;glich gel&ouml;scht werden, bzw. alternativ nach Ma&szlig;gabe des Art. 18 DSGVO eine Einschr&auml;nkung der Verarbeitung der Daten zu verlangen.
<br><br>
Sie haben das Recht zu verlangen, dass die Sie betreffenden Daten, die Sie uns bereitgestellt haben nach Ma&szlig;gabe des Art. 20 DSGVO zu erhalten und deren &Uuml;bermittlung an andere Verantwortliche zu fordern. 
<br><br>
Sie haben ferner gem. Art. 77 DSGVO das Recht, eine Beschwerde bei der zust&auml;ndigen Aufsichtsbeh&ouml;rde einzureichen.
<h3>Widerrufsrecht</h3>
Sie haben das Recht, erteilte Einwilligungen gem. Art. 7 Abs. 3 DSGVO mit Wirkung f&uuml;r die Zukunft zu widerrufen
<h3>Widerspruchsrecht</h3>
Sie k&ouml;nnen der k&uuml;nftigen Verarbeitung der Sie betreffenden Daten nach Ma&szlig;gabe des Art. 21 DSGVO jederzeit widersprechen. Der Widerspruch kann insbesondere gegen die Verarbeitung f&uuml;r Zwecke der Direktwerbung erfolgen.
<h3>Cookies und Widerspruchsrecht bei Direktwerbung</h3>
Als &bdquo;Cookies&ldquo; werden kleine Dateien bezeichnet, die auf Rechnern der Nutzer gespeichert werden. Innerhalb der Cookies k&ouml;nnen unterschiedliche Angaben gespeichert werden. Ein Cookie dient prim&auml;r dazu, die Angaben zu einem Nutzer (bzw. dem Ger&auml;t auf dem das Cookie gespeichert ist) w&auml;hrend oder auch nach seinem Besuch innerhalb eines Onlineangebotes zu speichern. Als tempor&auml;re Cookies, bzw. &bdquo;Session-Cookies&ldquo; oder &bdquo;transiente Cookies&ldquo;, werden Cookies bezeichnet, die gel&ouml;scht werden, nachdem ein Nutzer ein Onlineangebot verl&auml;sst und seinen Browser schlie&szlig;t. In einem solchen Cookie kann z.B. der Inhalt eines Warenkorbs in einem Onlineshop oder ein Login-Staus gespeichert werden. Als &bdquo;permanent&ldquo; oder &bdquo;persistent&ldquo; werden Cookies bezeichnet, die auch nach dem Schlie&szlig;en des Browsers gespeichert bleiben. So kann z.B. der Login-Status gespeichert werden, wenn die Nutzer diese nach mehreren Tagen aufsuchen. Ebenso k&ouml;nnen in einem solchen Cookie die Interessen der Nutzer gespeichert werden, die f&uuml;r Reichweitenmessung oder Marketingzwecke verwendet werden. Als &bdquo;Third-Party-Cookie&ldquo; werden Cookies bezeichnet, die von anderen Anbietern als dem Verantwortlichen, der das Onlineangebot betreibt, angeboten werden (andernfalls, wenn es nur dessen Cookies sind spricht man von &bdquo;First-Party Cookies&ldquo;).
<br><br>
Wir k&ouml;nnen tempor&auml;re und permanente Cookies einsetzen und kl&auml;ren hier&uuml;ber im Rahmen unserer Datenschutzerkl&auml;rung auf.
<br><br>
Falls die Nutzer nicht m&ouml;chten, dass Cookies auf ihrem Rechner gespeichert werden, werden sie gebeten die entsprechende Option in den Systemeinstellungen ihres Browsers zu deaktivieren. Gespeicherte Cookies k&ouml;nnen in den Systemeinstellungen des Browsers gel&ouml;scht werden. Der Ausschluss von Cookies kann zu Funktionseinschr&auml;nkungen dieses Onlineangebotes f&uuml;hren.
<br><br>
Ein genereller Widerspruch gegen den Einsatz der zu Zwecken des Onlinemarketing eingesetzten Cookies kann bei einer Vielzahl der Dienste, vor allem im Fall des Trackings, &uuml;ber die US-amerikanische Seite http://www.aboutads.info/choices/ oder die EU-Seite http://www.youronlinechoices.com/ erkl&auml;rt werden. Des Weiteren kann die Speicherung von Cookies mittels deren Abschaltung in den Einstellungen des Browsers erreicht werden. Bitte beachten Sie, dass dann gegebenenfalls nicht alle Funktionen dieses Onlineangebotes genutzt werden k&ouml;nnen.
<h3>L&ouml;schung von Daten</h3>
Die von uns verarbeiteten Daten werden nach Ma&szlig;gabe der Art. 17 und 18 DSGVO gel&ouml;scht oder in ihrer Verarbeitung eingeschr&auml;nkt. Sofern nicht im Rahmen dieser Datenschutzerkl&auml;rung ausdr&uuml;cklich angegeben, werden die bei uns gespeicherten Daten gel&ouml;scht, sobald sie f&uuml;r ihre Zweckbestimmung nicht mehr erforderlich sind und der L&ouml;schung keine gesetzlichen Aufbewahrungspflichten entgegenstehen. Sofern die Daten nicht gel&ouml;scht werden, weil sie f&uuml;r andere und gesetzlich zul&auml;ssige Zwecke erforderlich sind, wird deren Verarbeitung eingeschr&auml;nkt. D.h. die Daten werden gesperrt und nicht f&uuml;r andere Zwecke verarbeitet. Das gilt z.B. f&uuml;r Daten, die aus handels- oder steuerrechtlichen Gr&uuml;nden aufbewahrt werden m&uuml;ssen.
<br><br>
Nach gesetzlichen Vorgaben in Deutschland erfolgt die Aufbewahrung insbesondere f&uuml;r 6 Jahre gem&auml;&szlig; &sect; 257 Abs. 1 HGB (Handelsb&uuml;cher, Inventare, Er&ouml;ffnungsbilanzen, Jahresabschl&uuml;sse, Handelsbriefe, Buchungsbelege, etc.) sowie f&uuml;r 10 Jahre gem&auml;&szlig; &sect; 147 Abs. 1 AO (B&uuml;cher, Aufzeichnungen, Lageberichte, Buchungsbelege, Handels- und Gesch&auml;ftsbriefe, F&uuml;r Besteuerung relevante Unterlagen, etc.). 
<br><br>
Nach gesetzlichen Vorgaben in &Ouml;sterreich erfolgt die Aufbewahrung insbesondere f&uuml;r 7 J gem&auml;&szlig; &sect; 132 Abs. 1 BAO (Buchhaltungsunterlagen, Belege/Rechnungen, Konten, Belege, Gesch&auml;ftspapiere, Aufstellung der Einnahmen und Ausgaben, etc.), f&uuml;r 22 Jahre im Zusammenhang mit Grundst&uuml;cken und f&uuml;r 10 Jahre bei Unterlagen im Zusammenhang mit elektronisch erbrachten Leistungen, Telekommunikations-, Rundfunk- und Fernsehleistungen, die an Nichtunternehmer in EU-Mitgliedstaaten erbracht werden und f&uuml;r die der Mini-One-Stop-Shop (MOSS) in Anspruch genommen wird.Gesch&auml;ftsbezogene VerarbeitungZus&auml;tzlich verarbeiten wir<br>
-	Vertragsdaten (z.B., Vertragsgegenstand, Laufzeit, Kundenkategorie).<br>
-	Zahlungsdaten (z.B., Bankverbindung, Zahlungshistorie)<br>
von unseren Kunden, Interessenten und Gesch&auml;ftspartner zwecks Erbringung vertraglicher Leistungen, Service und Kundenpflege, Marketing, Werbung und Marktforschung.
<h3>Hosting</h3>
Die von uns in Anspruch genommenen Hosting-Leistungen dienen der Zurverf&uuml;gungstellung der folgenden Leistungen: Infrastruktur- und Plattformdienstleistungen, Rechenkapazit&auml;t, Speicherplatz und Datenbankdienste, Sicherheitsleistungen sowie technische Wartungsleistungen, die wir zum Zwecke des Betriebs dieses Onlineangebotes einsetzen. 
<br><br>
Hierbei verarbeiten wir, bzw. unser Hostinganbieter Bestandsdaten, Kontaktdaten, Inhaltsdaten, Vertragsdaten, Nutzungsdaten, Meta- und Kommunikationsdaten von Kunden, Interessenten und Besuchern dieses Onlineangebotes auf Grundlage unserer berechtigten Interessen an einer effizienten und sicheren Zurverf&uuml;gungstellung dieses Onlineangebotes gem. Art. 6 Abs. 1 lit. f DSGVO i.V.m. Art. 28 DSGVO (Abschluss Auftragsverarbeitungsvertrag).
<h3>Erhebung von Zugriffsdaten und Logfiles</h3>
Wir, bzw. unser Hostinganbieter, erhebt auf Grundlage unserer berechtigten Interessen im Sinne des Art. 6 Abs. 1 lit. f. DSGVO Daten &uuml;ber jeden Zugriff auf den Server, auf dem sich dieser Dienst befindet (sogenannte Serverlogfiles). Zu den Zugriffsdaten geh&ouml;ren Name der abgerufenen Webseite, Datei, Datum und Uhrzeit des Abrufs, &uuml;bertragene Datenmenge, Meldung &uuml;ber erfolgreichen Abruf, Browsertyp nebst Version, das Betriebssystem des Nutzers, Referrer URL (die zuvor besuchte Seite), IP-Adresse und der anfragende Provider.
<br><br>
Logfile-Informationen werden aus Sicherheitsgr&uuml;nden (z.B. zur Aufkl&auml;rung von Missbrauchs- oder Betrugshandlungen) f&uuml;r die Dauer von maximal 7 Tagen gespeichert und danach gel&ouml;scht. Daten, deren weitere Aufbewahrung zu Beweiszwecken erforderlich ist, sind bis zur endg&uuml;ltigen Kl&auml;rung des jeweiligen Vorfalls von der L&ouml;schung ausgenommen.
<h3>Erbringung vertraglicher Leistungen</h3>
Wir verarbeiten Bestandsdaten (z.B., Namen und Adressen sowie Kontaktdaten von Nutzern), Vertragsdaten (z.B., in Anspruch genommene Leistungen, Namen von Kontaktpersonen, Zahlungsinformationen) zwecks Erf&uuml;llung unserer vertraglichen Verpflichtungen und Serviceleistungen gem. Art. 6 Abs. 1 lit b. DSGVO. Die in Onlineformularen als verpflichtend gekennzeichneten Eingaben, sind f&uuml;r den Vertragsschluss erforderlich.
<br><br>
Im Rahmen der Inanspruchnahme unserer Onlinedienste, speichern wir die IP-Adresse und den Zeitpunkt der jeweiligen Nutzerhandlung. Die Speicherung erfolgt auf Grundlage unserer berechtigten Interessen, als auch der Nutzer an Schutz vor Missbrauch und sonstiger unbefugter Nutzung. Eine Weitergabe dieser Daten an Dritte erfolgt grunds&auml;tzlich nicht, au&szlig;er sie ist zur Verfolgung unserer Anspr&uuml;che erforderlich oder es besteht hierzu eine gesetzliche Verpflichtung gem. Art. 6 Abs. 1 lit. c DSGVO.
<br><br>
Wir verarbeiten Nutzungsdaten (z.B., die besuchten Webseiten unseres Onlineangebotes, Interesse an unseren Produkten) und Inhaltsdaten (z.B., Eingaben im Kontaktformular oder Nutzerprofil) f&uuml;r Werbezwecke in einem Nutzerprofil, um den Nutzer z.B. Produkthinweise ausgehend von ihren bisher in Anspruch genommenen Leistungen einzublenden.
<br><br>
Die L&ouml;schung der Daten erfolgt nach Ablauf gesetzlicher Gew&auml;hrleistungs- und vergleichbarer Pflichten, die Erforderlichkeit der Aufbewahrung der Daten wird alle drei Jahre &uuml;berpr&uuml;ft; im Fall der gesetzlichen Archivierungspflichten erfolgt die L&ouml;schung nach deren Ablauf. Angaben im etwaigen Kundenkonto verbleiben bis zu dessen L&ouml;schung.
<h3>Registrierfunktion</h3>
Nutzer k&ouml;nnen optional ein Nutzerkonto anlegen. Im Rahmen der Registrierung werden die erforderlichen Pflichtangaben den Nutzern mitgeteilt. Die im Rahmen der Registrierung eingegebenen Daten werden f&uuml;r die Zwecke der Nutzung des Angebotes verwendet. Die Nutzer k&ouml;nnen &uuml;ber angebots- oder registrierungsrelevante Informationen, wie &Auml;nderungen des Angebotsumfangs oder technische Umst&auml;nde per E-Mail informiert werden. Wenn Nutzer ihr Nutzerkonto gek&uuml;ndigt haben, werden deren Daten im Hinblick auf das Nutzerkonto gel&ouml;scht, vorbehaltlich deren Aufbewahrung ist aus handels- oder steuerrechtlichen Gr&uuml;nden entspr. Art. 6 Abs. 1 lit. c DSGVO notwendig. Es obliegt den Nutzern, ihre Daten bei erfolgter K&uuml;ndigung vor dem Vertragsende zu sichern. Wir sind berechtigt, s&auml;mtliche w&auml;hrend der Vertragsdauer gespeicherten Daten des Nutzers unwiederbringlich zu l&ouml;schen.

<br><br>
Im Rahmen der Inanspruchnahme unserer Regsitrierungs- und Anmeldefunktionen sowie der Nutzung der Nutzerkontos, speichern wird die IP-Adresse und den Zeitpunkt der jeweiligen Nutzerhandlung. Die Speicherung erfolgt auf Grundlage unserer berechtigten Interessen, als auch der Nutzer an Schutz vor Missbrauch und sonstiger unbefugter Nutzung. Eine Weitergabe dieser Daten an Dritte erfolgt grunds&auml;tzlich nicht, au&szlig;er sie ist zur Verfolgung unserer Anspr&uuml;che erforderlich oder es besteht hierzu besteht eine gesetzliche Verpflichtung gem. Art. 6 Abs. 1 lit. c DSGVO. Die IP-Adressen werden sp&auml;testens nach 7 Tagen anonymisiert oder gel&ouml;scht.
<h3>Kontaktaufnahme</h3>
Bei der Kontaktaufnahme mit uns (z.B. per Kontaktformular, E-Mail, Telefon oder via sozialer Medien) werden die Angaben des Nutzers zur Bearbeitung der Kontaktanfrage und deren Abwicklung gem. Art. 6 Abs. 1 lit. b) DSGVO verarbeitet. Die Angaben der Nutzer k&ouml;nnen in einem Customer-Relationship-Management System (&quot;CRM System&quot;) oder vergleichbarer Anfragenorganisation gespeichert werden.
<br><br>
Wir l&ouml;schen die Anfragen, sofern diese nicht mehr erforderlich sind. Wir &uuml;berpr&uuml;fen die Erforderlichkeit alle zwei Jahre; Ferner gelten die gesetzlichen Archivierungspflichten.
<h3>Kommentare und Beitr&auml;ge</h3>
Wenn Nutzer Kommentare oder sonstige Beitr&auml;ge hinterlassen, werden ihre IP-Adressen auf Grundlage unserer berechtigten Interessen im Sinne des Art. 6 Abs. 1 lit. f. DSGVO f&uuml;r 7 Tage gespeichert. Das erfolgt zu unserer Sicherheit, falls jemand in Kommentaren und Beitr&auml;gen widerrechtliche Inhalte hinterl&auml;sst (Beleidigungen, verbotene politische Propaganda, etc.). In diesem Fall k&ouml;nnen wir selbst f&uuml;r den Kommentar oder Beitrag belangt werden und sind daher an der Identit&auml;t des Verfassers interessiert.
<h3>Newsletter</h3>
Mit den nachfolgenden Hinweisen informieren wir Sie &uuml;ber die Inhalte unseres Newsletters sowie das Anmelde-, Versand- und das statistische Auswertungsverfahren sowie Ihre Widerspruchsrechte auf. Indem Sie unseren Newsletter abonnieren, erkl&auml;ren Sie sich mit dem Empfang und den beschriebenen Verfahren einverstanden.<br>
Inhalt des Newsletters: Wir versenden Newsletter, E-Mails und weitere elektronische Benachrichtigungen mit werblichen Informationen (nachfolgend &bdquo;Newsletter&ldquo;) nur mit der Einwilligung der Empf&auml;nger oder einer gesetzlichen Erlaubnis. Sofern im Rahmen einer Anmeldung zum Newsletter dessen Inhalte konkret umschrieben werden, sind sie f&uuml;r die Einwilligung der Nutzer ma&szlig;geblich. Im &Uuml;brigen enthalten unsere Newsletter Informationen zu unseren Leistungen und uns.<br>
Double-Opt-In und Protokollierung: Die Anmeldung zu unserem Newsletter erfolgt in einem sog. Double-Opt-In-Verfahren. D.h. Sie erhalten nach der Anmeldung eine E-Mail, in der Sie um die Best&auml;tigung Ihrer Anmeldung gebeten werden. Diese Best&auml;tigung ist notwendig, damit sich niemand mit fremden E-Mailadressen anmelden kann. Die Anmeldungen zum Newsletter werden protokolliert, um den Anmeldeprozess entsprechend den rechtlichen Anforderungen nachweisen zu k&ouml;nnen. Hierzu geh&ouml;rt die Speicherung des Anmelde- und des Best&auml;tigungszeitpunkts, als auch der IP-Adresse. Ebenso werden die &Auml;nderungen Ihrer bei dem Versanddienstleister gespeicherten Daten protokolliert.
<br><br>
Anmeldedaten: Um sich f&uuml;r den Newsletter anzumelden, reicht es aus, wenn Sie Ihre E-Mailadresse angeben. Optional bitten wir Sie einen Namen, zwecks pers&ouml;nlicher Ansprache im Newsletters anzugeben.
<br><br>
Deutschland: Der Versand des Newsletters und die mit ihm verbundene Erfolgsmessung erfolgt auf Grundlage einer Einwilligung der Empf&auml;nger gem. Art. 6 Abs. 1 lit. a, Art. 7 DSGVO i.V.m &sect; 7 Abs. 2 Nr. 3 UWG bzw. auf Grundlage der gesetzlichen Erlaubnis gem. &sect; 7 Abs. 3 UWG. 
<br><br>
Die Protokollierung des Anmeldeverfahrens erfolgt auf Grundlage unserer berechtigten Interessen gem. Art. 6 Abs. 1 lit. f DSGVO. Unser Interesse richtet sich auf den Einsatz eines nutzerfreundlichen sowie sicheren Newslettersystems, das sowohl unseren gesch&auml;ftlichen Interessen dient, als auch den Erwartungen der Nutzer entspricht und uns ferner den Nachweis von Einwilligungen erlaubt.
<br><br>
K&uuml;ndigung/Widerruf - Sie k&ouml;nnen den Empfang unseres Newsletters jederzeit k&uuml;ndigen, d.h. Ihre Einwilligungen widerrufen. Einen Link zur K&uuml;ndigung des Newsletters finden Sie am Ende eines jeden Newsletters. Wir k&ouml;nnen die ausgetragenen E-Mailadressen bis zu drei Jahren auf Grundlage unserer berechtigten Interessen speichern bevor wir sie f&uuml;r Zwecke des Newsletterversandes l&ouml;schen, um eine ehemals gegebene Einwilligung nachweisen zu k&ouml;nnen. Die Verarbeitung dieser Daten wird auf den Zweck einer m&ouml;glichen Abwehr von Anspr&uuml;chen beschr&auml;nkt. Ein individueller L&ouml;schungsantrag ist jederzeit m&ouml;glich, sofern zugleich das ehemalige Bestehen einer Einwilligung best&auml;tigt wird.
<h3>Onlinepr&auml;senzen in sozialen Medien</h3>
Wir unterhalten Onlinepr&auml;senzen innerhalb sozialer Netzwerke und Plattformen, um mit den dort aktiven Kunden, Interessenten und Nutzern kommunizieren und sie dort &uuml;ber unsere Leistungen informieren zu k&ouml;nnen. Beim Aufruf der jeweiligen Netzwerke und Plattformen gelten die Gesch&auml;ftsbedingungen und die Datenverarbeitungsrichtlinien deren jeweiligen Betreiber. 

Soweit nicht anders im Rahmen unserer Datenschutzerkl&auml;rung angegeben, verarbeiten wir die Daten der Nutzer sofern diese mit uns innerhalb der sozialen Netzwerke und Plattformen kommunizieren, z.B. Beitr&auml;ge auf unseren Onlinepr&auml;senzen verfassen oder uns Nachrichten zusenden.
<h3>Einbindung von Diensten und Inhalten Dritter</h3>
Wir setzen innerhalb unseres Onlineangebotes auf Grundlage unserer berechtigten Interessen (d.h. Interesse an der Analyse, Optimierung und wirtschaftlichem Betrieb unseres Onlineangebotes im Sinne des Art. 6 Abs. 1 lit. f. DSGVO) Inhalts- oder Serviceangebote von Drittanbietern ein, um deren Inhalte und Services, wie z.B. Videos oder Schriftarten einzubinden (nachfolgend einheitlich bezeichnet als &ldquo;Inhalte&rdquo;). 
<br><br>
Dies setzt immer voraus, dass die Drittanbieter dieser Inhalte, die IP-Adresse der Nutzer wahrnehmen, da sie ohne die IP-Adresse die Inhalte nicht an deren Browser senden k&ouml;nnten. Die IP-Adresse ist damit f&uuml;r die Darstellung dieser Inhalte erforderlich. Wir bem&uuml;hen uns nur solche Inhalte zu verwenden, deren jeweilige Anbieter die IP-Adresse lediglich zur Auslieferung der Inhalte verwenden. Drittanbieter k&ouml;nnen ferner so genannte Pixel-Tags (unsichtbare Grafiken, auch als &quot;Web Beacons&quot; bezeichnet) f&uuml;r statistische oder Marketingzwecke verwenden. Durch die &quot;Pixel-Tags&quot; k&ouml;nnen Informationen, wie der Besucherverkehr auf den Seiten dieser Website ausgewertet werden. Die pseudonymen Informationen k&ouml;nnen ferner in Cookies auf dem Ger&auml;t der Nutzer gespeichert werden und unter anderem technische Informationen zum Browser und Betriebssystem, verweisende Webseiten, Besuchszeit sowie weitere Angaben zur Nutzung unseres Onlineangebotes enthalten, als auch mit solchen Informationen aus anderen Quellen verbunden werden.
<h3>Google Maps</h3>Wir binden die Landkarten des Dienstes &ldquo;Google Maps&rdquo; des Anbieters Google LLC, 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA, ein. Datenschutzerkl&auml;rung: https://www.google.com/policies/privacy/, Opt-Out: https://adssettings.google.com/authenticated.
<h3>Google Fonts</h3>Wir binden die Schriftarten (&quot;Google Fonts&quot;) des Anbieters Google LLC, 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA, ein. Datenschutzerkl&auml;rung: https://www.google.com/policies/privacy/, Opt-Out: https://adssettings.google.com/authenticated.
<h3>Xing</h3>
Innerhalb unseres Onlineangebotes k&ouml;nnen Funktionen und Inhalte des Dienstes Xing eingebunden, angeboten durch die XING AG, Dammtorstra&szlig;e 29-32, 20354 Hamburg, Deutschland. Hierzu k&ouml;nnen z.B. Inhalte wie Bilder, Videos oder Texte und Schaltfl&auml;chen geh&ouml;ren, mit denen Nutzer Ihr Gefallen betreffend die Inhalte kundtun, den Verfassern der Inhalte oder unsere Beitr&auml;ge abonnieren k&ouml;nnen. Sofern die Nutzer Mitglieder der Plattform Xing sind, kann Xing den Aufruf der o.g. Inhalte und Funktionen den dortigen Profilen der Nutzer zuordnen. Datenschutzerkl&auml;rung von Xing: https://www.xing.com/app/share?op=data_protection..
<h3> LinkedIn</h3>
Innerhalb unseres Onlineangebotes k&ouml;nnen Funktionen und Inhalte des Dienstes LinkedIn eingebunden, angeboten durch die LinkedIn AG, Dammtorstra&szlig;e 29-32, 20354 Hamburg, Deutschland. Hierzu k&ouml;nnen z.B. Inhalte wie Bilder, Videos oder Texte und Schaltfl&auml;chen geh&ouml;ren, mit denen Nutzer Ihr Gefallen betreffend die Inhalte kundtun, den Verfassern der Inhalte oder unsere Beitr&auml;ge abonnieren k&ouml;nnen. Sofern die Nutzer Mitglieder der Plattform LinkedIn sind, kann LinkedIn den Aufruf der o.g. Inhalte und Funktionen den dortigen Profilen der Nutzer zuordnen. Datenschutzerkl&auml;rung von LinkedIn: https://www.linkedin.com/legal/privacy-policy.. LinkedIn ist unter dem Privacy-Shield-Abkommen zertifiziert und bietet hierdurch eine Garantie, das europ&auml;ische Datenschutzrecht einzuhalten (https://www.privacyshield.gov/participant?id=a2zt0000000L0UZAA0&amp;amp;status=Active). Datenschutzerkl&auml;rung: https://twitter.com/de/privacy, Opt-Out: https://www.linkedin.com/psettings/guest-controls/retargeting-opt-out.
<br><br><br>
Erstellt mit Datenschutz-Generator.de von RA Dr. Thomas Schwenke
        </div>
	<div id="footer">
		&copy; Wolfram Plettscher 2018
    </div>

</body>
</html>


