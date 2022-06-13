<?php  include("admin_session.php");  ?>


<?php  include("head_admin.php"); ?>

<div class="head_o"><h3>ADD Location </h3></div>

<?php include("./include/connection.php");// require_once('../Connections/connection.php'); ?>


<?php

   
include("./include/connection.php");



	
	
	if($_POST['addcat']) {
		
		
		
$countries = array
(



'Canillo' => 'Hada  حدة',
'Aldosa' => 'Sheraton  شيراتون',
'Armiana' => 'Alhasabah  الحصبه',
'Envalira' => 'Altahrer  التحرير',
'Forn' => 'Bait Boss بيت بوس',



	
);



	



foreach($countries  as $x=>$x_value)
  {
	  $cm = 202 ;
 $add = "insert into location (name_loc, lid_loc) values('$x_value','$cm')";
 
 mysqli_query($con,$add);
 
  echo "<div class='ok_o' > Added successfully </div>";
  }

		
				
				

	echo'<meta http-equiv="Refresh" content="2;url=http://localhost/onlineauctionweb/admin/add_loc.php">';	
		
		
		
	}
		
?>


<div class="bodypanel"> 
<form name="form1" method="post" action="">

<table width="100%" border="0"> 

<tr>
<td> Location name: </td>

<td> 
  <p>

    <input type="text" name="txt_name" id="txt_name">
  </p></td>
</tr>

<tr>
<td>Location Type : </td>

<td> 
<select name="cc_cat">
<option value="0">main category</option>



</select>
</td>
</tr>

<tr>
<td colspan="2" class="head_o">

 <input name="addcat" type="submit" value=" Submit Category "/> 
 </td>


</tr>
<?php

echo "<h2>sdsdsdsdsdsdsdsddsd</h2>";
?>
</table>

</form>
</div>
<p>&nbsp;</p>
</body>
</html>




















<!--
Green	Highlight	=	Participates	in	the	Visa	Waiver	Program	or	no	visa	required
Afghanistan US	Embassy	Kabul http://kabul.usembassy.gov/visas.html
Albania US	Embassy	Tirana http://tirana.usembassy.gov/visa-services.html
Algeria US	Embassy	Algiers http://algiers.usembassy.gov/contact2.html
American	Samoa N/A N/A
Andorra US	Embassy	Madrid http://madrid.usembassy.gov/visas.html
Angola US	Embassy	Luanda http://angola.usembassy.gov/visas.html
Antigua	and	Barbuda US	Embassy	Bridgetown	(Barbados) http://barbados.usembassy.gov/visas.html
Argentina US	Embassy	Buenos	Aires http://argentina.usembassy.gov/visas.html
Armenia US	Embassy	Yerevan http://armenia.usembassy.gov/visas.html
Aruba US	Consulate	Curaçao http://curacao.usconsulate.gov/visas.html
US	Embassy	Canberra http://canberra.usembassy.gov/visas.html
US	Consulate	Melbourne http://canberra.usembassy.gov/visas.html
US	Consulate	Perth http://canberra.usembassy.gov/visas.html
US	Consulate	Sydney http://canberra.usembassy.gov/visas.html
Austria US	Embassy	Vienna http://austria.usembassy.gov/visas.html
Azerbaijan US	Embassy	Baku http://azerbaijan.usembassy.gov/visas.html
Bahamas US	Embassy	Nassau http://nassau.usembassy.gov/visas.html
Bahrain US	Embassy	Manama http://bahrain.usembassy.gov/visas.html
Bangladesh US	Embassy	Dhaka http://dhaka.usembassy.gov/visas.html
Barbados US	Embassy	Bridgetown http://barbados.usembassy.gov/visas.html
Belarus US	Embassy	Minsk http://minsk.usembassy.gov/visas.html
Belgium US	Embassy	Brussels http://belgium.usembassy.gov/visas.html
Belize US	Embassy	Belmopan http://belize.usembassy.gov/visas.html
Benin US	Embassy	Cotonou http://cotonou.usembassy.gov/visas.html
Bermuda US	Embassy	Hamilton http://hamilton.usconsulate.gov/visas.html
Bhutan US	Embassy	New	Delhi http://newdelhi.usembassy.gov/visas.html
Bolivia US	Embassy	La	Paz http://bolivia.usembassy.gov/visas.html
Bonaire US	Consulate	Curaçao http://curacao.usconsulate.gov/visas.html
Bosnia	&	Herzegovina US	Embassy	Sarajevo http://sarajevo.usembassy.gov/visas.html
Australia
Botswana US	Embassy	Gaborone http://botswana.usembassy.gov/visas.html
US	Embassy	Brasilia http://brazil.usembassy.gov/visas.html
US	Consulate	Rio	de	Janeiro http://brazil.usembassy.gov/visas.html
US	Consulate	São	Paulo http://brazil.usembassy.gov/visas.html
US	Consulate	Recife http://brazil.usembassy.gov/visas.html
British	Virgin	Islands US	Embassy	Bridgetown	(Barbados) http://barbados.usembassy.gov/visas.html
Brunei US	Embassy	Darussalam http://brunei.usembassy.gov/visas.html
Bulgaria US	Embassy	Sofia http://bulgaria.usembassy.gov/visas.html
Burkina	Faso US	Embassy	Ouagadougou http://ouagadougou.usembassy.gov/visas.html
Burma US	Embassy	Rangoon http://burma.usembassy.gov/visas.html
Burundi US	Embassy	Bujumbura http://burundi.usembassy.gov/visas.html
Cabo	Verde US	Embassy	Praia http://praia.usembassy.gov/visas.html
Cambodia US	Embassy	Phnom	Penh http://cambodia.usembassy.gov/visas.html
Cameroon US	Embassy	Yaounde http://yaounde.usembassy.gov/visas.html
Canada US	Embassy	Ottawa http://canada.usembassy.gov/visas.html
US	Consulate	Calgary http://canada.usembassy.gov/visas.html
US	Consulate	Halifax http://canada.usembassy.gov/visas.html
US	Consulate	Montreal http://canada.usembassy.gov/visas.html
US	Consulate	Quebec http://canada.usembassy.gov/visas.html
US	Consulate	Toronto http://canada.usembassy.gov/visas.html
US	Consulate	Vancouver http://canada.usembassy.gov/visas.html
US	Consulate	Winnipeg http://canada.usembassy.gov/visas.html
Cayman	Islands US	Embassy	Kingston	(Jamaica) http://kingston.usembassy.gov/visas.html
Central	African	Republic US	Embassy	Bangui http://bangui.usembassy.gov/visas.html
Chad US	Embassy	N'Djamena http://ndjamena.usembassy.gov/visas.html
Channel	Islands US	Embassy	London http://london.usembassy.gov/visas.html
Chile US	Embassy	Santiago http://chile.usembassy.gov/visas.html
US	Embassy	Beijing http://beijing.usembassy-china.org.cn/niv_info.html
US	Consulate	Chengdu http://chengdu.usembassy-china.org.cn/visas.html
US	Consulate	Guangzhou http://guangzhou.usembassy-china.org.cn/consular.html
US	Consulate	Shanghai http://shanghai.usembassy-china.org.cn/visas.html
Brazil
China
US	Consulate	Shenyang http://shenyang.usembassy-china.org.cn/consular.html
US	Consulate	Wuhan http://beijing.usembassy-china.org.cn/niv_info.html
Colombia US	Embassy	Bogota http://bogota.usembassy.gov/visas.html
Comoros US	Embassy	Antananarivo	(Madagascar)http://antananarivo.usembassy.gov/visas.html
Congo,	Democratic	Republic	of	theUS	Embassy	Kinshasa http://kinshasa.usembassy.gov/visas.html
Congo,	Republic	of	the US	Embassy	Brazzaville http://brazzaville.usembassy.gov/visas.html
Costa	Rica US	Embassy	San	Jose http://costarica.usembassy.gov/visas.html
Cote	d'Ivoire US	Embassy	Abidjan http://abidjan.usembassy.gov/visas.html
Croatia US	Embassy	Zagreb http://zagreb.usembassy.gov/visas.html
Cuba US	Interests	Section	Havana http://havana.usint.gov/visas2.html
Curacao US	Consulate	Curaçao http://curacao.usconsulate.gov/visas.html
Cyprus US	Embassy	Nicosia http://cyprus.usembassy.gov/visas.html
Czech	Republic US	Embassy	Prague http://prague.usembassy.gov/visas.html
Denmark US	Embassy	Copenhagen http://denmark.usembassy.gov/visas.html
Djibouti US	Embassy	Djibouti http://djibouti.usembassy.gov/visas.html
Dominica US	Embassy	Bridgetown	(Barbados) http://barbados.usembassy.gov/visas.html
Dominican	Republic US	Embassy	Santo	Domingo http://santodomingo.usembassy.gov/visas.html
US	Embassy	Quito http://ecuador.usembassy.gov/visas.html
US	Consulate	Guayaquil http://ecuador.usembassy.gov/visas.html
US	Embassy	Cairo http://egypt.usembassy.gov/visas.html
US	Consulate	Alexandria http://egypt.usembassy.gov/visas.html
El	Salvador US	Embassy	San	Salvador http://sansalvador.usembassy.gov
Equatorial	Guinea US	Embassy	Malabo http://malabo.usembassy.gov/visas.html
Eritrea US	Embassy	Asmara http://eritrea.usembassy.gov/visas.html
Estonia US	Embassy	Tallinn http://estonia.usembassy.gov/visas.html
Ethiopia US	Embassy	Addis	Ababa http://ethiopia.usembassy.gov/visas.html
Faroe	Islands US	Embassy	Copenhagen http://denmark.usembassy.gov/living-in-denmark.html
Fiji US	Embassy	Suva http://suva.usembassy.gov/visas.html
Finland US	Embassy	Helsinki http://finland.usembassy.gov/visas.html
US	Embassy	Paris http://france.usembassy.gov/visas.html
US	Consulate	Bordeaux http://france.usembassy.gov/visas.html
China
Ecuador
Egypt
France
US	Consulate	Lille http://france.usembassy.gov/visas.html
US	Consulate	Lyon http://france.usembassy.gov/visas.html
US	Consulate	Rennes http://france.usembassy.gov/visas.html
US	Consulate	Toulouse http://france.usembassy.gov/visas.html
US	Consulate	Marseille http://france.usembassy.gov/visas.html
US	Consulate	Strasbourg http://france.usembassy.gov/visas.html
Gabon US	Embassy	Libreville http://libreville.usembassy.gov/visas.html
Georgia US	Embassy	Tbilisi http://georgia.usembassy.gov/visas.html
US	Embassy	Berlin http://germany.usembassy.gov/visa/
US	Consulate	Düsseldorf http://germany.usembassy.gov/visa/
US	Consulate	Frankfurt http://germany.usembassy.gov/visa/
US	Consulate	Hamburg http://germany.usembassy.gov/visa/
US	Consulate	Leipzig http://germany.usembassy.gov/visa/
US	Consulate	Munich http://germany.usembassy.gov/visa/
Ghana US	Embassy	Accra http://ghana.usembassy.gov/visas.html
Gibraltar US	Embassy	London http://london.usembassy.gov/visas.html
Greece US	Embassy	Athens http://athens.usembassy.gov/visas.html
Greenland US	Embassy	Copenhagen http://denmark.usembassy.gov/visas.html
Grenada US	Embassy	Bridgetown	(Barbados) http://barbados.usembassy.gov/visas.html
Guadeloupe US	Embassy	Bridgetown	(Barbados) http://barbados.usembassy.gov/visas.html
Guam N/A N/A
Guatemala US	Embassy	Guatamala	City http://guatemala.usembassy.gov/visas.html
Guinea US	Embassy	Conakry http://conakry.usembassy.gov/visas.html
Guyana US	Embassy	Georgetown http://georgetown.usembassy.gov/visas.html
Haiti US	Embassy	Port-au-Prince http://haiti.usembassy.gov/visas.html
Honduras US	Embassy	Tegucigalpa http://honduras.usembassy.gov/visas.html
Hong	Kong US	Consulate	Hong	Kong	&	Macau http://hongkong.usconsulate.gov/visa_services.html
Hungary US	Embassy	Budapest http://hungary.usembassy.gov/visas.html
Iceland US	Embassy	Reykjavik http://iceland.usembassy.gov/visas.html
US	Embassy	New	Delhi http://newdelhi.usembassy.gov/visas.html
US	Consulate	Chennai http://chennai.usconsulate.gov/visas.html
France
Germany
India	(Bharat)
US	Consulate	Hyderabad http://hyderabad.usconsulate.gov/visas.html
US	Consulate	Kolkata http://kolkata.usconsulate.gov/visas.html
US	Consulate	Mumbai http://mumbai.usconsulate.gov/visas.html
US	Embassy	Jakarta http://jakarta.usembassy.gov/visas.html
US	Consulate	Surabaya http://jakarta.usembassy.gov/visas.html
Iran US	Virtual	Embassy	Tehran http://iran.usembassy.gov/visas.html
US	Embassy	Baghdad http://iraq.usembassy.gov/visas.html
US	Consulate	Basrah http://iraq.usembassy.gov/visas.html
US	Consulate	Erbil http://iraq.usembassy.gov/visas.html
US	Consulate	Kirkuk http://iraq.usembassy.gov/visas.html
Ireland US	Embassy	Dublin http://dublin.usembassy.gov/visas.html
Isle	of	Man US	Embassy	London http://london.usembassy.gov/visas.html
US	Embassy	Tel	Aviv http://israel.usembassy.gov/visas.html
US	Consulate	Jerusalem http://israel.usembassy.gov/visas.html
US	Embassy	Rome http://italy.usembassy.gov/visa.html
US	Consulate	Florence http://italy.usembassy.gov/visa.html
US	Consulate	Milan http://italy.usembassy.gov/visa.html
US	Consulate	Naples http://italy.usembassy.gov/visa.html
Jamaica US	Embassy	Kingston http://kingston.usembassy.gov/visas.html
US	Embassy	Tokyo http://japan.usembassy.gov/visas.html
US	Consulate	Fukuoka http://japan.usembassy.gov/visas.html
US	Consulate	Nagoya http://japan.usembassy.gov/visas.html
US	Consulate	Osaka/Kobe http://osaka.usconsulate.gov/visas.html
US	Consulate	Sapporo http://japan.usembassy.gov/visas.html
US	Consulate	Naha,	Okinawa http://japan.usembassy.gov/visas.html
Jordan US	Embassy	Amman http://jordan.usembassy.gov/visas.html
US	Embassy	Astana http://kazakhstan.usembassy.gov/visas.html
US	Consulate	Almaty http://kazakhstan.usembassy.gov/visas.html
Kenya US	Embassy	Nairobi http://nairobi.usembassy.gov
US	Embassy	Seoul http://seoul.usembassy.gov/visas.html
US	Consulate	Busan http://seoul.usembassy.gov/visas.html
Italy
India	(Bharat)
Indonesia
Iraq
Israel
Japan	(Nippon)
Kazakhstan
Korea
Kosovo US	Embassy	Pristina http://pristina.usembassy.gov/visas.html
Kuwait US	Embassy	Kuwait	City http://kuwait.usembassy.gov/visas.html
Kyrgyz	Republic US	Embassy	Bishkek http://bishkek.usembassy.gov/visas.html
Laos US	Embassy	Vientiane http://laos.usembassy.gov/visas.html
Latvia US	Embassy	Riga http://riga.usembassy.gov/visas.html
Lebanon US	Embassy	Beirut http://lebanon.usembassy.gov/visas.html
Lesotho US	Embassy	Maseru http://maseru.usembassy.gov/visas.html
Liberia US	Embassy	Monrovia http://monrovia.usembassy.gov/visas.html
Libya US	Embassy	Tripoli http://libya.usembassy.gov
Liechtenstein US	Embassy	Bern http://bern.usembassy.gov/visas.html
Lithuania US	Embassy	Vilnus http://vilnius.usembassy.gov/visas.html
Luxembourg US	Embassy	Luxembourg http://luxembourg.usembassy.gov/visas.html
Macau US	Consulate	Hong	Kong	&	Macau http://hongkong.usconsulate.gov/visa_services.html
Macedonia US	Embassy	Skopje http://macedonia.usembassy.gov/visas.html
Madagascar US	Embassy	Antananarivo http://www.antananarivo.usembassy.gov/visas.html
Malawi US	Embassy	Lilongwe http://lilongwe.usembassy.gov/visas.html
Malaysia US	Embassy	Kuala	Lumpur http://malaysia.usembassy.gov/visas.html
Maldives US	Embassy	Sri	Lanka	&	Maldives http://srilanka.usembassy.gov/visas.html
Mali US	Embassy	Bamako http://mali.usembassy.gov/visas.html
Malta US	Embassy	Malta http://malta.usembassy.gov/visas.html
Marshall	Islands,	Republic	of	theUS	Embassy	Majuro http://majuro.usembassy.gov/visas.html
Mauritania US	Embassy	Nouakchott http://mauritania.usembassy.gov/visas.html
Mauritius US	Embassy	Port	Louis http://mauritius.usembassy.gov/visas.html
US	Embassy	Mexico	City http://mexico.usembassy.gov/visas.html
US	Consulate	Cuidad	Juarez http://mexico.usembassy.gov/visas.html
US	Consulate	Guadalajara http://mexico.usembassy.gov/visas.html
US	Consulate	Hermosillo http://mexico.usembassy.gov/visas.html
US	Consulate	Matamoros http://mexico.usembassy.gov/visas.html
US	Consulate	Merida http://mexico.usembassy.gov/visas.html
US	Consulate	Monterrey http://mexico.usembassy.gov/visas.html
US	Consulate	Nogales http://mexico.usembassy.gov/visas.html
Mexico
US	Consulate	Nuevo	Laredo http://mexico.usembassy.gov/visas.html
US	Consulate	Puerto	Vallarta http://mexico.usembassy.gov/visas.html
US	Consulate	Tijuana http://mexico.usembassy.gov/visas.html
Micronesia,	Federated	States	of US	Embassy	Kolonia http://kolonia.usembassy.gov/visas.html
Moldova US	Embassy	Chisinau http://moldova.usembassy.gov/visas.html
Monaco US	Embassy	Paris http://france.usembassy.gov/visas.html
Mongolia US	Embassy	Ulaanbaatar http://mongolia.usembassy.gov/visas.html
Montenegro US	Embassy	Podgorica http://podgorica.usembassy.gov/visas.html
Montserrat US	Embassy	Bridgetown	(Barbados) http://barbados.usembassy.gov/visas.html
US	Embassy	Rabat http://morocco.usembassy.gov/visas.html
US	Consulate	Casablanca http://morocco.usembassy.gov/visas.html
Mozambique US	Embassy	Maputo http://maputo.usembassy.gov/visa_services.html
Namibia US	Embassy	Windhoek http://windhoek.usembassy.gov/visas.html
Nepal US	Embassy	Kathmandu http://nepal.usembassy.gov/visas.html
New	Zealand US	Embassy	Wellington http://newzealand.usembassy.gov/visas.html
Nicaragua US	Embassy	Managua http://nicaragua.usembassy.gov/visas.html
Niger US	Embassy	Niamey http://niamey.usembassy.gov/visas.html
Nigeria US	Embassy	Abuja http://nigeria.usembassy.gov/visas.html
US	Embassy	The	Hague http://thehague.usembassy.gov/visas.html
US	Consulate	Amsterdam http://amsterdam.usconsulate.gov/visas.html
Norway US	Embassy	Oslo http://norway.usembassy.gov/visas.html
Oman US	Embassy	Muscat http://oman.usembassy.gov/visas.html
US	Embassy	Islamabad http://islamabad.usembassy.gov/visas.html
US	Consulate	Karachi http://karachi.usconsulate.gov/visas.html
US	Consulate	Lahore http://islamabad.usembassy.gov/visas.html
US	Consulate	Peshawar http://islamabad.usembassy.gov/visas.html
Palau,	Republic	of US	Embassy	Koror http://palau.usembassy.gov/visas.html
Palestine US	Consulate	Jerusalem http://jerusalem.usconsulate.gov/visas.html
Panama US	Embassy	Panama	City http://panama.usembassy.gov/visas.html
Papua	New	Guinea US	Embassy	Port	Moresby http://portmoresby.usembassy.gov/visas.html
Paraguay US	Embassy	Asuncion http://paraguay.usembassy.gov/visas.html
Mexico
Morocco
Netherlands
Pakistan
Peru US	Embassy	Lima http://lima.usembassy.gov/visas.html
Philippines US	Embassy	Manila http://manila.usembassy.gov/visas.html
US	Embassy	Warsaw http://poland.usembassy.gov/visas.html
US	Consulate	Krakow	 http://poland.usembassy.gov/visas.html
US	Embassy	Lisbon http://portugal.usembassy.gov/visas.html
US	Embassy	Ponta	Delgada,	Azores http://azores.usconsulate.gov/visas.html
Puerto	Rico N/A N/A
Qatar US	Embassy	Doha http://qatar.usembassy.gov/visas.html
Romania US	Embassy	Bucharest http://romania.usembassy.gov/visas.html
US	Embassy	Moscow http://moscow.usembassy.gov/visas.html
US	Consulate	St.	Petersburg http://stpetersburg.usconsulate.gov/visas.html
US	Consulate	Vladivostok http://vladivostok.usconsulate.gov/visas.html
US	Consulate	Yekaterinburg http://yekaterinburg.usconsulate.gov/visas.html
Rwanda US	Embassy	Kigali http://rwanda.usembassy.gov/visas.html
Saba US	Consulate	Curaçao http://curacao.usconsulate.gov/visas.html
Samoa US	Embassy	Apia http://samoa.usembassy.gov/visas.html
San	Marino US	Embassy	Rome http://italy.usembassy.gov/visa.html
US	Embassy	Riyadh http://riyadh.usembassy.gov/visas.html
US	Consulate	Dhahran http://riyadh.usembassy.gov/visas.html
US	Consulate	Jeddah http://riyadh.usembassy.gov/visas.html
Senegal US	Embassy	Dakar http://dakar.usembassy.gov/visas.html
Serbia US	Embassy	Belgrade http://serbia.usembassy.gov/visas.html
Seychelles US	Embassy	Port	Louis	(Mauritius) http://freetown.usembassy.gov/visas.html
Sierra	Leone US	Embassy	Freetown http://freetown.usembassy.gov/visas.html
Singapore US	Embassy	Singapore http://singapore.usembassy.gov/visas.html
Slovakia US	Embassy	Bratislava http://slovakia.usembassy.gov/visas.html
Slovenia US	Embassy	Ljubljana http://slovenia.usembassy.gov/visas.html
US	Virtual	Embassy http://somalia.usvpp.gov/visas.html
US	Embassy	Nairobi http://somalia.usvpp.gov/visas.html
South	Africa US	Embassy	Pretoria http://southafrica.usembassy.gov/visas.html
South	Sudan US	Embassy	Juba http://southsudan.usembassy.gov/visas.html
Somalia
Poland
Portugal
Russia
Saudi	Arabia
US	Embassy	Madrid http://madrid.usembassy.gov/visas.html
US	Consulate	Barcelona http://madrid.usembassy.gov/visas.html
Sri	Lanka	(Serendib) US	Embassy	Colombo http://srilanka.usembassy.gov/visas.html
St.	Kitts	and	Nevis US	Embassy	Bridgetown	(Barbados) http://barbados.usembassy.gov/visas.html
St.	Lucia US	Embassy	Bridgetown	(Barbados) http://barbados.usembassy.gov/visas.html
St.	Maarten US	Consulate	Curaçao http://curacao.usconsulate.gov/visas.html
St.	Vincent	and	the	Grenadines US	Embassy	Bridgetown	(Barbados) http://barbados.usembassy.gov/visas.html
Sudan US	Embassy	Khartoum http://sudan.usembassy.gov/visas.html
Suriname US	Embassy	Paramaribo http://suriname.usembassy.gov/visas.html
Swaziland US	Embassy	Mbabane http://swaziland.usembassy.gov/visas.html
Sweden US	Embassy	Stockholm http://sweden.usembassy.gov/visas.html
Switzerland US	Embassy	Bern http://bern.usembassy.gov/visas.html
US	Embassy	Damascus	(closed) http://damascus.usembassy.gov/visas.html
US	Embassy	Amman http://jordan.usembassy.gov/visas.html
Taiwan	(Chinese	Taipei) American	Institute	in	Taiwan http://ait.org.tw/en/visas.html
Tajikistan US	Embassy	Dushanbe http://dushanbe.usembassy.gov/visas.html
Tanzania US	Embassy	Dar	es	Salaam http://tanzania.usembassy.gov/visas.html
US	Embassy	Bangkok http://bangkok.usembassy.gov/visas.html
US	Consulate	Chiang	Mai http://bangkok.usembassy.gov/visas.html
The	Gambia US	Embassy	Banjul http://banjul.usembassy.gov/visas.html
Timor	Leste US	Embassy	Dili http://timor-leste.usembassy.gov/visas2.html
Togo US	Embassy	Lome http://togo.usembassy.gov/visas.html
Tonga US	Embassy	Suva http://tonga.usvpp.gov/visas.html
Trinidad	&	Tobago US	Embassy	Trinidad	&	Tobago http://trinidad.usembassy.gov/visa_services2.html
Tunisia US	Embassy	Tunis http://tunisia.usembassy.gov/visas.html
US	Embassy	Ankara http://turkey.usembassy.gov/visas.html
US	Consulate	Adana http://turkey.usembassy.gov/visas.html
US	Consulate	Istanbul http://turkey.usembassy.gov/visas.html
Turkmenistan US	Embassy	Ashgabat http://turkmenistan.usembassy.gov/visas.html
Uganda US	Embassy	Kampala http://kampala.usembassy.gov/visas.html
Ukraine US	Embassy	Kyiv http://ukraine.usembassy.gov/visas.html
Spain
Syria
Thailand
Turkey
US	Embassy	Abu	Dhabi http://abudhabi.usembassy.gov/visas.html
US	Consulate	Dubai http://abudhabi.usembassy.gov/visas.html
US	Embassy	London http://london.usembassy.gov/visas.html
US	Consulate	Belfast http://belfast.usconsulate.gov/visas.html
US	Consulate	Edinburgh http://edinburgh.usconsulate.gov
Uruguay US	Embassy	Montevideo http://uruguay.usembassy.gov/visas.html
US	Virgin	Islands N/A N/A
Uzbekistan US	Embassy	Tashkent http://uzbekistan.usembassy.gov/visas.html
Venezuela US	Embassy	Caracas http://caracas.usembassy.gov/visas.html
US	Embassy	Hanoi http://vietnam.usembassy.gov/visas.html
US	Consulate	Ho	Chi	Minh	City http://hochiminh.usconsulate.gov/visas.html
Yemen US	Embassy	Sana'a http://yemen.usembassy.gov/visas.html
Zambia US	Embassy	Lusaka http://zambia.usembassy.gov/visas.html
Zimbabwe US	Embassy	Harare http://harare.usembassy.gov/visas.html
Department	of	State	name	for	Bosnia	=	Bosnia	&	Herzegovina
Department	of	State	name	of	Bharat	(India)	=	India
Department	of	State	name	of	Chinese	Taipei	=	Taiwan
Department	of	State	name	of	FYR	Macedonia	=	Macedonia
Department	of	State	name	of	Great	Britain	=	United	Kingdom
Department	of	State	name	of	Kosovo	under	UNSCR	1244/99	=	Kosovo
Department	of	State	name	of	Myanmar	=	Burma
Department	of	State	name	of	Nippon	(Japan)	=	Japan
Department	of	State	name	of	Serendib	=	Sri	Lanka
Department	of	State	name	of	St.	Vincenct	+	Grenadines	=	St.	Vincent	and	the	Grenadines
Vietnam
United	Arab	Emirates
United	Kingdom
-->
