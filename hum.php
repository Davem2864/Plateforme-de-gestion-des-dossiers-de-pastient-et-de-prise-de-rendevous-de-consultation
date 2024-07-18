<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable avec Téléchargement et Impression</title>
    <!-- Inclure les fichiers CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css" >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js" ></script>
    <!-- DataTables JS -->
        <!-- DataTables JS (suite) -->
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: '<"dt-buttons"Bf>t<"dt-pagination"p>',
                buttons: [
                    'copyHtml5', // Copie au format HTML5
                    'excelHtml5', // Exportation Excel
                    'csvHtml5', // Exportation CSV
                    'pdfHtml5', // Exportation PDF
                    'print' // Impression
                ],
                language: {
                    search: "Rechercher:", // Custom search label
                    lengthMenu: "Afficher _MENU_ enregistrements par page",
                    zeroRecords: "Aucun enregistrement trouvé",
                    info: "Affichage de la page _PAGE_ sur _PAGES_",
                    infoEmpty: "Aucun enregistrement disponible",
                    infoFiltered: "(filtré à partir de _MAX_ enregistrements au total)",
                },
                paging: true,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 75, 100]
            });
        });
    </script>

</head>
<body>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th _msttexthash="31395" _msthash="51">Nom</th>
                <th _msttexthash="117676" _msthash="52">Position</th>
                <th _msttexthash="76765" _msthash="53">Bureau</th>
                <th _msttexthash="40183" _msthash="54">Âge</th>
                <th _msttexthash="201422" _msthash="55">Date de début</th>
                <th _msttexthash="92755" _msthash="56">Salaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td _msttexthash="156325" _msthash="57">Tiger Nixon</td>
                <td _msttexthash="285493" _msthash="58">System Architect</td>
                <td _msttexthash="135070" _msthash="59">Edimbourg</td>
                <td _msttexthash="10010" _msthash="60">61</td>
                <td _msttexthash="73320" _msthash="61">2011-04-25</td>
                <td _msttexthash="52546" _msthash="62">$320,800</td>
            </tr>
            <tr>
                <td _msttexthash="263367" _msthash="63">Garrett Winters</td>
                <td _msttexthash="132587" _msthash="64">Comptable</td>
                <td _msttexthash="63310" _msthash="65">Tokyo</td>
                <td _msttexthash="10218" _msthash="66">63</td>
                <td _msttexthash="73827" _msthash="67">2011-07-25</td>
                <td _msttexthash="53612" _msthash="68">$170,750</td>
            </tr>
            <tr>
                <td _msttexthash="133081" _msthash="69">Ashton Cox</td>
                <td _msttexthash="504283" _msthash="70">Auteur technique junior</td>
                <td _msttexthash="199901" _msthash="71">San Francisco</td>
                <td _msttexthash="10530" _msthash="72">66</td>
                <td _msttexthash="72917" _msthash="73">2009-01-12</td>
                <td _msttexthash="35048" _msthash="74">86 000 $</td>
            </tr>
            <tr>
                <td _msttexthash="188630" _msthash="75">Cédric Kelly</td>
                <td _msttexthash="756431" _msthash="76">Développeur Javascript Senior</td>
                <td _msttexthash="135070" _msthash="77">Edimbourg</td>
                <td _msttexthash="9750" _msthash="78">22</td>
                <td _msttexthash="74113" _msthash="79">2012-03-29</td>
                <td _msttexthash="43537" _msthash="80">433 060 $</td>
            </tr>
            <tr>
                <td _msttexthash="133445" _msthash="81">Airi Satou</td>
                <td _msttexthash="132587" _msthash="82">Comptable</td>
                <td _msttexthash="63310" _msthash="83">Tokyo</td>
                <td _msttexthash="9945" _msthash="84">33</td>
                <td _msttexthash="74386" _msthash="85">2008-11-28</td>
                <td _msttexthash="43511" _msthash="86">162 700 $</td>
            </tr>
            <tr>
                <td _msttexthash="348179" _msthash="87">Brielle Williamson</td>
                <td _msttexthash="2975531" _msthash="88">Spécialiste de l’intégration</td>
                <td _msttexthash="94835" _msthash="89">New York</td>
                <td _msttexthash="10010" _msthash="90">61</td>
                <td _msttexthash="72254" _msthash="91">2012-12-02</td>
                <td _msttexthash="42887" _msthash="92">372 000 $</td>
            </tr>
            <tr>
                <td _msttexthash="250692" _msthash="93">Herrod Chandler</td>
                <td _msttexthash="96161" _msthash="94">Vendeur</td>
                <td _msttexthash="199901" _msthash="95">San Francisco</td>
                <td _msttexthash="10751" _msthash="96">59</td>
                <td _msttexthash="73944" _msthash="97">2012-08-06</td>
                <td _msttexthash="52897" _msthash="98">$137,500</td>
            </tr>
            <tr>
                <td _msttexthash="227747" _msthash="99">Rhona Davidson</td>
                <td _msttexthash="2975531" _msthash="100">Spécialiste de l’intégration</td>
                <td _msttexthash="63310" _msthash="101">Tokyo</td>
                <td _msttexthash="10335" _msthash="102">55</td>
                <td _msttexthash="72267" _msthash="103">2010-10-14</td>
                <td _msttexthash="53612" _msthash="104">$327,900</td>
            </tr>
            <tr>
                <td _msttexthash="205296" _msthash="105">Colleen Hurst</td>
                <td _msttexthash="416819" _msthash="106">Javascript Developer</td>
                <td _msttexthash="199901" _msthash="107">San Francisco</td>
                <td _msttexthash="10569" _msthash="108">39</td>
                <td _msttexthash="74893" _msthash="109">2009-09-15</td>
                <td _msttexthash="52390" _msthash="110">$205,500</td>
            </tr>
            <tr>
                <td _msttexthash="158509" _msthash="111">Sonya Frost</td>
                <td _msttexthash="365742" _msthash="112">Ingénieur logiciel</td>
                <td _msttexthash="135070" _msthash="113">Edimbourg</td>
                <td _msttexthash="9854" _msthash="114">23</td>
                <td _msttexthash="73320" _msthash="115">2008-12-13</td>
                <td _msttexthash="52182" _msthash="116">$103,600</td>
            </tr>
            <tr>
                <td _msttexthash="149383" _msthash="117">Jena Gaines</td>
                <td _msttexthash="220142" _msthash="118">Office Manager</td>
                <td _msttexthash="95823" _msthash="119">Londres</td>
                <td _msttexthash="9633" _msthash="120">30</td>
                <td _msttexthash="74568" _msthash="121">2008-12-19</td>
                <td _msttexthash="44655" _msthash="122">$90,560</td>
            </tr>
            <tr>
                <td _msttexthash="157378" _msthash="123">Quinn Flynn</td>
                <td _msttexthash="176449" _msthash="124">Support Lead</td>
                <td _msttexthash="135070" _msthash="125">Edimbourg</td>
                <td _msttexthash="9750" _msthash="126">22</td>
                <td _msttexthash="72605" _msthash="127">2013-03-03</td>
                <td _msttexthash="51792" _msthash="128">$342,000</td>
            </tr>
            <tr>
                <td _msttexthash="250393" _msthash="129">Charde Marshall</td>
                <td _msttexthash="314197" _msthash="130">Regional Director</td>
                <td _msttexthash="199901" _msthash="131">San Francisco</td>
                <td _msttexthash="10257" _msthash="132">36</td>
                <td _msttexthash="73606" _msthash="133">2008-10-16</td>
                <td _msttexthash="52923" _msthash="134">$470,600</td>
            </tr>
            <tr>
                <td _msttexthash="201370" _msthash="135">Haley Kennedy</td>
                <td _msttexthash="558324" _msthash="136">Senior Marketing Designer</td>
                <td _msttexthash="95823" _msthash="137">Londres</td>
                <td _msttexthash="10036" _msthash="138">43</td>
                <td _msttexthash="73697" _msthash="139">2012-12-18</td>
                <td _msttexthash="52351" _msthash="140">$313,500</td>
            </tr>
            <tr>
                <td _msttexthash="383227" _msthash="141">Tatyana Fitzpatrick</td>
                <td _msttexthash="314197" _msthash="142">Regional Director</td>
                <td _msttexthash="95823" _msthash="143">Londres</td>
                <td _msttexthash="10387" _msthash="144">19</td>
                <td _msttexthash="73242" _msthash="145">2010-03-17</td>
                <td _msttexthash="54587" _msthash="146">$385,750</td>
            </tr>
            <tr>
                <td _msttexthash="197730" _msthash="147">Michael Silva</td>
                <td _msttexthash="343824" _msthash="148">Marketing Designer</td>
                <td _msttexthash="95823" _msthash="149">Londres</td>
                <td _msttexthash="10530" _msthash="150">66</td>
                <td _msttexthash="73515" _msthash="151">2012-11-27</td>
                <td _msttexthash="53729" _msthash="152">$198,500</td>
            </tr>
            <tr>
                <td _msttexthash="110877" _msthash="153">Paul Byrd</td>
                <td _msttexthash="582218" _msthash="154">Chief Financial Officer (CFO)</td>
                <td _msttexthash="94835" _msthash="155">New York</td>
                <td _msttexthash="10322" _msthash="156">64</td>
                <td _msttexthash="73970" _msthash="157">2010-06-09</td>
                <td _msttexthash="52364" _msthash="158">$725,000</td>
            </tr>
            <tr>
                <td _msttexthash="201851" _msthash="159">Gloria Little</td>
                <td _msttexthash="462410" _msthash="160">Systems Administrator</td>
                <td _msttexthash="94835" _msthash="161">New York</td>
                <td _msttexthash="10751" _msthash="162">59</td>
                <td _msttexthash="73008" _msthash="163">2009-04-10</td>
                <td _msttexthash="53001" _msthash="164">$237,500</td>
            </tr>
            <tr>
                <td _msttexthash="199017" _msthash="165">Bradley Greer</td>
                <td _msttexthash="365742" _msthash="166">Ingénieur logiciel</td>
                <td _msttexthash="95823" _msthash="167">Londres</td>
                <td _msttexthash="9828" _msthash="168">41</td>
                <td _msttexthash="72319" _msthash="169">2012-10-13</td>
                <td _msttexthash="42289" _msthash="170">132 000 $</td>
            </tr>
            <tr>
                <td _msttexthash="90987" _msthash="171">Dai Rios</td>
                <td _msttexthash="222664" _msthash="172">Personnel Lead</td>
                <td _msttexthash="135070" _msthash="173">Edimbourg</td>
                <td _msttexthash="10153" _msthash="174">35</td>
                <td _msttexthash="74503" _msthash="175">2012-09-26</td>
                <td _msttexthash="52767" _msthash="176">$217,500</td>
            </tr>
            <tr>
                <td _msttexthash="281021" _msthash="177">Jenette Caldwell</td>
                <td _msttexthash="278616" _msthash="178">Development Lead</td>
                <td _msttexthash="94835" _msthash="179">New York</td>
                <td _msttexthash="9633" _msthash="180">30</td>
                <td _msttexthash="73359" _msthash="181">2011-09-03</td>
                <td _msttexthash="52182" _msthash="182">$345,000</td>
            </tr>
            <tr>
                <td _msttexthash="136058" _msthash="183">Yuri Berry</td>
                <td _msttexthash="591162" _msthash="184">Chief Marketing Officer (CMO)</td>
                <td _msttexthash="94835" _msthash="185">New York</td>
                <td _msttexthash="9724" _msthash="186">40</td>
                <td _msttexthash="74581" _msthash="187">2009-06-25</td>
                <td _msttexthash="52845" _msthash="188">$675,000</td>
            </tr>
            <tr>
                <td _msttexthash="162838" _msthash="189">César Vance</td>
                <td _msttexthash="479596" _msthash="190">Assistance avant-vente</td>
                <td _msttexthash="94835" _msthash="191">New York</td>
                <td _msttexthash="9646" _msthash="192">21</td>
                <td _msttexthash="72319" _msthash="193">2011-12-12</td>
                <td _msttexthash="43680" _msthash="194">106 450 $</td>
            </tr>
            <tr>
                <td _msttexthash="177840" _msthash="195">Doris Wilder</td>
                <td _msttexthash="96161" _msthash="196">Vendeur</td>
                <td _msttexthash="79456" _msthash="197">Sydney</td>
                <td _msttexthash="9854" _msthash="198">23</td>
                <td _msttexthash="72995" _msthash="199">2010-09-20</td>
                <td _msttexthash="44343" _msthash="200">$85,600</td>
            </tr>
            <tr>
                <td _msttexthash="223379" _msthash="201">Angelica Ramos</td>
                <td _msttexthash="477048" _msthash="202">Directeur général (PDG)</td>
                <td _msttexthash="95823" _msthash="203">Londres</td>
                <td _msttexthash="10452" _msthash="204">47</td>
                <td _msttexthash="74165" _msthash="205">2009-10-09</td>
                <td _msttexthash="50531" _msthash="206">1 200 000 $</td>
            </tr>
            <tr>
                <td _msttexthash="152373" _msthash="207">Gavin Joyce</td>
                <td _msttexthash="135928" _msthash="208">Developer</td>
                <td _msttexthash="135070" _msthash="209">Edimbourg</td>
                <td _msttexthash="9932" _msthash="210">42</td>
                <td _msttexthash="72384" _msthash="211">2010-12-22</td>
                <td _msttexthash="45890" _msthash="212">$92,575</td>
            </tr>
            <tr>
                <td _msttexthash="220467" _msthash="213">Jennifer Chang</td>
                <td _msttexthash="314197" _msthash="214">Regional Director</td>
                <td _msttexthash="135278" _msthash="215">Singapore</td>
                <td _msttexthash="10374" _msthash="216">28</td>
                <td _msttexthash="72436" _msthash="217">2010-11-14</td>
                <td _msttexthash="54340" _msthash="218">$357,650</td>
            </tr>
            <tr>
                <td _msttexthash="224900" _msthash="219">Brenden Wagner</td>
                <td _msttexthash="365742" _msthash="220">Ingénieur logiciel</td>
                <td _msttexthash="199901" _msthash="221">San Francisco</td>
                <td _msttexthash="10374" _msthash="222">28</td>
                <td _msttexthash="73684" _msthash="223">2011-06-07</td>
                <td _msttexthash="44291" _msthash="224">206 850 $</td>
            </tr>
            <tr>
                <td _msttexthash="149747" _msthash="225">Fiona Green</td>
                <td _msttexthash="592956" _msthash="226">Chief Operating Officer (COO)</td>
                <td _msttexthash="199901" _msthash="227">San Francisco</td>
                <td _msttexthash="10556" _msthash="228">48</td>
                <td _msttexthash="71994" _msthash="229">2010-03-11</td>
                <td _msttexthash="52169" _msthash="230">$850,000</td>
            </tr>
            <tr>
                <td _msttexthash="115154" _msthash="231">Shou Itou</td>
                <td _msttexthash="344201" _msthash="232">Regional Marketing</td>
                <td _msttexthash="63310" _msthash="233">Tokyo</td>
                <td _msttexthash="9542" _msthash="234">20</td>
                <td _msttexthash="73593" _msthash="235">2011-08-14</td>
                <td _msttexthash="51948" _msthash="236">$163,000</td>
            </tr>
            <tr>
                <td _msttexthash="225797" _msthash="237">Michelle House</td>
                <td _msttexthash="2975531" _msthash="238">Spécialiste de l’intégration</td>
                <td _msttexthash="79456" _msthash="239">Sydney</td>
                <td _msttexthash="10361" _msthash="240">37</td>
                <td _msttexthash="72644" _msthash="241">2011-06-02</td>
                <td _msttexthash="44161" _msthash="242">$95,400</td>
            </tr>
            <tr>
                <td _msttexthash="134745" _msthash="243">Suki Burks</td>
                <td _msttexthash="135928" _msthash="244">Developer</td>
                <td _msttexthash="95823" _msthash="245">Londres</td>
                <td _msttexthash="10127" _msthash="246">53</td>
                <td _msttexthash="73099" _msthash="247">2009-10-22</td>
                <td _msttexthash="52273" _msthash="248">$114,500</td>
            </tr>
            <tr>
                <td _msttexthash="321256" _msthash="249">Prescott Bartlett</td>
                <td _msttexthash="282997" _msthash="250">Technical Author</td>
                <td _msttexthash="95823" _msthash="251">Londres</td>
                <td _msttexthash="10270" _msthash="252">27</td>
                <td _msttexthash="73515" _msthash="253">2011-05-07</td>
                <td _msttexthash="51974" _msthash="254">$145,000</td>
            </tr>
            <tr>
                <td _msttexthash="180284" _msthash="255">Gavin Cortez</td>
                <td _msttexthash="148291" _msthash="256">Team Leader</td>
                <td _msttexthash="199901" _msthash="257">San Francisco</td>
                <td _msttexthash="9750" _msthash="258">22</td>
                <td _msttexthash="73801" _msthash="259">2008-10-26</td>
                <td _msttexthash="52741" _msthash="260">$235,500</td>
            </tr>
            <tr>
                <td _msttexthash="225199" _msthash="261">Martena Mccray</td>
                <td _msttexthash="353574" _msthash="262">Post-Sales support</td>
                <td _msttexthash="133822" _msthash="263">Edinburgh</td>
                <td _msttexthash="10348" _msthash="264">46</td>
                <td _msttexthash="73593" _msthash="265">2011-03-09</td>
                <td _msttexthash="52663" _msthash="266">$324,050</td>
            </tr>
            <tr>
                <td _msttexthash="182286" _msthash="267">Unity Butler</td>
                <td _msttexthash="343824" _msthash="268">Marketing Designer</td>
                <td _msttexthash="199901" _msthash="269">San Francisco</td>
                <td _msttexthash="10452" _msthash="270">47</td>
                <td _msttexthash="74503" _msthash="271">2009-12-09</td>
                <td _msttexthash="46280" _msthash="272">$85,675</td>
            </tr>
            <tr>
                <td _msttexthash="249704" _msthash="273">Howard Hatfield</td>
                <td _msttexthash="220142" _msthash="274">Office Manager</td>
                <td _msttexthash="199901" _msthash="275">San Francisco</td>
                <td _msttexthash="9919" _msthash="276">51</td>
                <td _msttexthash="73944" _msthash="277">2008-12-16</td>
                <td _msttexthash="52858" _msthash="278">$164,500</td>
            </tr>
            <tr>
                <td _msttexthash="178724" _msthash="279">Hope Fuentes</td>
                <td _msttexthash="137735" _msthash="280">Secretary</td>
                <td _msttexthash="199901" _msthash="281">San Francisco</td>
                <td _msttexthash="9828" _msthash="282">41</td>
                <td _msttexthash="72033" _msthash="283">2010-02-12</td>
                <td _msttexthash="54119" _msthash="284">$109,850</td>
            </tr>
            <tr>
                <td _msttexthash="227266" _msthash="285">Vivian Harrell</td>
                <td _msttexthash="414947" _msthash="286">Financial Controller</td>
                <td _msttexthash="199901" _msthash="287">San Francisco</td>
                <td _msttexthash="10114" _msthash="288">62</td>
                <td _msttexthash="73502" _msthash="289">2009-02-14</td>
                <td _msttexthash="52793" _msthash="290">$452,500</td>
            </tr>
            <tr>
                <td _msttexthash="235586" _msthash="291">Timothy Mooney</td>
                <td _msttexthash="220142" _msthash="292">Office Manager</td>
                <td _msttexthash="77363" _msthash="293">London</td>
                <td _msttexthash="10361" _msthash="294">37</td>
                <td _msttexthash="72904" _msthash="295">2008-12-11</td>
                <td _msttexthash="52299" _msthash="296">$136,200</td>
            </tr>
            <tr>
                <td _msttexthash="281489" _msthash="297">Jackson Bradshaw</td>
                <td _msttexthash="115336" _msthash="298">Director</td>
                <td _msttexthash="94835" _msthash="299">New York</td>
                <td _msttexthash="10426" _msthash="300">65</td>
                <td _msttexthash="75166" _msthash="301">2008-09-26</td>
                <td _msttexthash="54431" _msthash="302">$645,750</td>
            </tr>
            <tr>
                <td _msttexthash="172705" _msthash="303">Olivia Liang</td>
                <td _msttexthash="287352" _msthash="304">Support Engineer</td>
                <td _msttexthash="135278" _msthash="305">Singapore</td>
                <td _msttexthash="10322" _msthash="306">64</td>
                <td _msttexthash="72176" _msthash="307">2011-02-03</td>
                <td _msttexthash="52611" _msthash="308">$234,500</td>
            </tr>
            <tr>
                <td _msttexthash="131495" _msthash="309">Bruno Nash</td>
                <td _msttexthash="313183" _msthash="310">Software Engineer</td>
                <td _msttexthash="77363" _msthash="311">London</td>
                <td _msttexthash="10465" _msthash="312">38</td>
                <td _msttexthash="72683" _msthash="313">2011-05-03</td>
                <td _msttexthash="52728" _msthash="314">$163,500</td>
            </tr>
            <tr>
                <td _msttexthash="258505" _msthash="315">Sakura Yamamoto</td>
                <td _msttexthash="287352" _msthash="316">Support Engineer</td>
                <td _msttexthash="63310" _msthash="317">Tokyo</td>
                <td _msttexthash="10361" _msthash="318">37</td>
                <td _msttexthash="75556" _msthash="319">2009-08-19</td>
                <td _msttexthash="55250" _msthash="320">$139,575</td>
            </tr>
            <tr>
                <td _msttexthash="157729" _msthash="321">Thor Walton</td>
                <td _msttexthash="135928" _msthash="322">Developer</td>
                <td _msttexthash="94835" _msthash="323">New York</td>
                <td _msttexthash="10010" _msthash="324">61</td>
                <td _msttexthash="73229" _msthash="325">2013-08-11</td>
                <td _msttexthash="45279" _msthash="326">$98,540</td>
            </tr>
            <tr>
                <td _msttexthash="170716" _msthash="327">Finn Camacho</td>
                <td _msttexthash="287352" _msthash="328">Support Engineer</td>
                <td _msttexthash="199901" _msthash="329">San Francisco</td>
                <td _msttexthash="10452" _msthash="330">47</td>
                <td _msttexthash="74776" _msthash="331">2009-07-07</td>
                <td _msttexthash="44434" _msthash="332">$87,500</td>
            </tr>
            <tr>
                <td _msttexthash="198770" _msthash="333">Serge Baldwin</td>
                <td _msttexthash="285844" _msthash="334">Data Coordinator</td>
                <td _msttexthash="135278" _msthash="335">Singapore</td>
                <td _msttexthash="10322" _msthash="336">64</td>
                <td _msttexthash="73892" _msthash="337">2012-04-09</td>
                <td _msttexthash="55120" _msthash="338">$138,575</td>
            </tr>
            <tr>
                <td _msttexthash="195676" _msthash="339">Zenaida Frank</td>
                <td _msttexthash="313183" _msthash="340">Software Engineer</td>
                <td _msttexthash="94835" _msthash="341">New York</td>
                <td _msttexthash="10218" _msthash="342">63</td>
                <td _msttexthash="72085" _msthash="343">2010-01-04</td>
                <td _msttexthash="52897" _msthash="344">$125,250</td>
            </tr>
            <tr>
                <td _msttexthash="231387" _msthash="345">Zorita Serrano</td>
                <td _msttexthash="313183" _msthash="346">Software Engineer</td>
                <td _msttexthash="199901" _msthash="347">San Francisco</td>
                <td _msttexthash="10439" _msthash="348">56</td>
                <td _msttexthash="72566" _msthash="349">2012-06-01</td>
                <td _msttexthash="51623" _msthash="350">$115,000</td>
            </tr>
            <tr>
                <td _msttexthash="251732" _msthash="351">Jennifer Acosta</td>
                <td _msttexthash="650416" _msthash="352">Junior Javascript Developer</td>
                <td _msttexthash="133822" _msthash="353">Edinburgh</td>
                <td _msttexthash="10036" _msthash="354">43</td>
                <td _msttexthash="72020" _msthash="355">2013-02-01</td>
                <td _msttexthash="45019" _msthash="356">$75,650</td>
            </tr>
            <tr>
                <td _msttexthash="178633" _msthash="357">Cara Stevens</td>
                <td _msttexthash="260416" _msthash="358">Sales Assistant</td>
                <td _msttexthash="94835" _msthash="359">New York</td>
                <td _msttexthash="10348" _msthash="360">46</td>
                <td _msttexthash="72956" _msthash="361">2011-12-06</td>
                <td _msttexthash="52910" _msthash="362">$145,600</td>
            </tr>
            <tr>
                <td _msttexthash="256568" _msthash="363">Hermione Butler</td>
                <td _msttexthash="314197" _msthash="364">Regional Director</td>
                <td _msttexthash="77363" _msthash="365">London</td>
                <td _msttexthash="10452" _msthash="366">47</td>
                <td _msttexthash="72319" _msthash="367">2011-03-21</td>
                <td _msttexthash="53586" _msthash="368">$356,250</td>
            </tr>
            <tr>
                <td _msttexthash="128479" _msthash="369">Lael Greer</td>
                <td _msttexthash="462410" _msthash="370">Systems Administrator</td>
                <td _msttexthash="77363" _msthash="371">London</td>
                <td _msttexthash="9646" _msthash="372">21</td>
                <td _msttexthash="74321" _msthash="373">2009-02-27</td>
                <td _msttexthash="52026" _msthash="374">$103,500</td>
            </tr>
            <tr>
                <td _msttexthash="252850" _msthash="375">Jonas Alexander</td>
                <td _msttexthash="135928" _msthash="376">Developer</td>
                <td _msttexthash="199901" _msthash="377">San Francisco</td>
                <td _msttexthash="9633" _msthash="378">30</td>
                <td _msttexthash="73294" _msthash="379">2010-07-14</td>
                <td _msttexthash="44317" _msthash="380">$86,500</td>
            </tr>
            <tr>
                <td _msttexthash="147810" _msthash="381">Shad Decker</td>
                <td _msttexthash="314197" _msthash="382">Regional Director</td>
                <td _msttexthash="133822" _msthash="383">Edinburgh</td>
                <td _msttexthash="9919" _msthash="384">51</td>
                <td _msttexthash="73151" _msthash="385">2008-11-13</td>
                <td _msttexthash="52182" _msthash="386">$183,000</td>
            </tr>
            <tr>
                <td _msttexthash="195000" _msthash="387">Michael Bruce</td>
                <td _msttexthash="416819" _msthash="388">Javascript Developer</td>
                <td _msttexthash="135278" _msthash="389">Singapore</td>
                <td _msttexthash="10478" _msthash="390">29</td>
                <td _msttexthash="74074" _msthash="391">2011-06-27</td>
                <td _msttexthash="52182" _msthash="392">$183,000</td>
            </tr>
            <tr>
                <td _msttexthash="175123" _msthash="393">Donna Snider</td>
                <td _msttexthash="297700" _msthash="394">Customer Support</td>
                <td _msttexthash="94835" _msthash="395">New York</td>
                <td _msttexthash="10270" _msthash="396">27</td>
                <td _msttexthash="72813" _msthash="397">2011-01-25</td>
                <td _msttexthash="51233" _msthash="398">$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th _msttexthash="43069" _msthash="399">Name</th>
                <th _msttexthash="117676" _msthash="400">Position</th>
                <th _msttexthash="73294" _msthash="401">Office</th>
                <th _msttexthash="28444" _msthash="402">Age</th>
                <th _msttexthash="135174" _msthash="403">Start date</th>
                <th _msttexthash="78065" _msthash="404">Salary</th>
            </tr>
        </tfoot>
    </table>
    <script>
        new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        }
            }
        });
    </script>
</body>
</html>        