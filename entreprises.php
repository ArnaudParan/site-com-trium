<div class="row">
    <div class="col-sm-offset-2 col-md-offset-3 col-lg-offset-3 col-sm-10 col-md-8 col-lg-6" style="margin-top:30px;">
        <ul id="widget_ent">
            <!-------------- Construction ------------------>
            <li class="zone_btn" id="zone_btn1"><button id="btn1" type="button" class="btn btn-default ent" aria-label="left-align">
                CONSTRUCTION
            </button>
            <button id="sbtn11" type="button" class="btn btn-default sent" aria-label="left-align">
                GROUPE
            </button>
            <button id="sbtn12" type="button" class="btn btn-default sent" aria-label="left-align">
                STARTUP
            </button>
            <div class="fond_btn" id="fond_btn1"></div></li>
            <!-------------- Banque ------------------>
            <li class="zone_btn" id="zone_btn2"><button id="btn2" type="button" class="btn btn-default ent" aria-label="left-align">
                BANQUE
            </button>
            <button id="sbtn21" type="button" class="btn btn-default sent" aria-label="left-align">
                GROUPE
            </button>
            <button id="sbtn22" type="button" class="btn btn-default sent" aria-label="left-align">
                STARTUP
            </button>
            <div class="fond_btn" id="fond_btn2"></div></li>
            <!-------------- Services ------------------>
            <!--audit conseil services-->
            <li class="zone_btn" id="zone_btn3"><button id="btn3" type="button" class="btn btn-default ent" aria-label="left-align">
                AUDIT CONSEIL<br/>
                SERVICES
            </button>
            <button id="sbtn31" type="button" class="btn btn-default sent" aria-label="left-align">
                GROUPE
            </button>
            <button id="sbtn32" type="button" class="btn btn-default sent" aria-label="left-align">
                STARTUP
            </button>
            <div class="fond_btn" id="fond_btn3"></div></li>
            <!-------------- Energie ------------------>
            <!--énergie transport environnement-->
            <li class="zone_btn" id="zone_btn4"><button id="btn4" type="button" class="btn btn-default ent" aria-label="left-align">
                ENERGIE TRANSPORT<br/>
                ENVIRONNEMENT
            </button>
            <button id="sbtn41" type="button" class="btn btn-default sent" aria-label="left-align">
                GROUPE
            </button>
            <button id="sbtn42" type="button" class="btn btn-default sent" aria-label="left-align">
                STARTUP
            </button>
            <div class="fond_btn" id="fond_btn4"></div></li>
            <!-------------- Transports ------------------>
            <li class="zone_btn" id="zone_btn5"><button id="btn5" type="button" class="btn btn-default ent" aria-label="left-align">
                ECOLES, SERVICES<br/>
                AUX JEUNES DIPLOMÉS
            </button>
            <button id="sbtn51" type="button" class="btn btn-default sent" aria-label="left-align">
                GROUPE
            </button>
            <button id="sbtn52" type="button" class="btn btn-default sent" aria-label="left-align">
                STARTUP
            </button>
            <div class="fond_btn" id="fond_btn5"></div></li>
            <!-------------- Industrie ------------------>
            <li class="zone_btn" id="zone_btn6"><button id="btn6" type="button" class="btn btn-default ent" aria-label="left-align">
                INDUSTRIE
            </button>
            <button id="sbtn61" type="button" class="btn btn-default sent" aria-label="left-align">
                GROUPE
            </button>
            <button id="sbtn62" type="button" class="btn btn-default sent" aria-label="left-align">
                STARTUP
            </button>
            <div class="fond_btn" id="fond_btn6"></div></li>
        </ul>
    </div>
</div>
<div class="row"><div class="col-sm-offset-1 col-sm-10">
<?php include("connexion_db.php");
global $corresp_bddCompanyId_htmlCompanyId;
$corresp_bddCompanyId_htmlCompanyId = Array("1" => "2",
                                            "2" => "1",
                                            "3" => "3",
                                            "4" => "4",
                                            "5" => "6",
                                            "6" => "5");
$handler = new CompaniesDbHandler();
for ($sectorId = 1; $sectorId < 7; $sectorId++) {
    print_pack_companies($handler, 'FALSE', (string)$sectorId);
    print_normal_companies($handler, 'FALSE', (string)$sectorId);
    print_pack_companies($handler, 'TRUE', (string)$sectorId);
    print_normal_companies($handler, 'TRUE', (string)$sectorId);
}

function print_normal_companies($dbhandler, $startup, $sectorId)
{
    global $corresp_bddCompanyId_htmlCompanyId;
    $htmlSectorId = $corresp_bddCompanyId_htmlCompanyId[$sectorId];
    $iterator = new CompaniesIterator($dbhandler, $sectorId, $startup, 'FALSE');
    print_companies($htmlSectorId, $iterator, $startup);
}

function print_companies($htmlSectorId, $iterator, $startup)
{
    $company =  $iterator->iterate();
    if ($startup == 'TRUE') {
        echo '  <div hidden class="row startup_secteur' . $htmlSectorId . '" style="margin-top:30px">
';
    }
    else {
        echo '  <div hidden class="row groupe_secteur' . $htmlSectorId . '" style="margin-top:30px">
';
    }
    while ($company != NULL) {
        $name = $company["company"];
        $website = $company["website"];
        echo '    <div class="col-sm-2 entreprise sector' . $htmlSectorId . '"><span class="nom_entreprise"><a href="'. $website . '">' . $name . '</a></span></div>
';
        $company =  $iterator->iterate();
    }
    echo '  </div>
';
}

function print_companies_p($htmlSectorId, $iterator, $companiesNb, $startup, $handler)
{
    if ($startup == 'TRUE') {
        echo '  <div hidden class="row startup_secteur' . $htmlSectorId . '" style="margin-top:30px">
';
    }
    else {
        echo '  <div hidden class="row groupe_secteur' . $htmlSectorId . '" style="margin-top:30px">
';
    }
    $remainingCompaniesNb = $companiesNb % 3;
    $fullLineCompaniesNb = $companiesNb - $remainingCompaniesNb;
    if ($remainingCompaniesNb == 1) {
        echo '<div class="col-sm-12"><div class="row">
';
        $company =  $iterator->iterate();
        print_one_pack_company($company, $handler, $htmlSectorId, 4, 4);
        echo '</div></div>
';
    }
    if ($remainingCompaniesNb == 2) {
        echo '<div class="col-sm-12"><div class="row">';
        $company =  $iterator->iterate();
        print_one_pack_company($company, $handler, $htmlSectorId, 4, 2);
        print_one_pack_company($company, $handler, $htmlSectorId, 4, 0);
        $company =  $iterator->iterate();
        echo '</div></div>
';
    }
    for ($companyId = 0; $companyId < $fullLineCompaniesNb; $companyId++) {
        $company =  $iterator->iterate();
        print_one_pack_company($company, $handler, $htmlSectorId, 4, 0);
    }
    echo '  </div>
';
}

function print_one_pack_company($company, $handler, $htmlSectorId, $blockSize, $blockOffset)
{
        $name = $company["company"];
        $website = $company["website"];
        $id = $company["id"];
        $pack = $handler->get_pack($id);
        $imageSrc = $pack["chemin_image"];
        $message = $pack["message_carousel"];
        $block = 'col-sm-' . $blockSize;
        $offset = ' col-sm-offset-' . $blockOffset;
        echo '    <div class="' . $block . $offset . ' entreprise_pack sector' . $htmlSectorId . '">
        <div class="row"><div class="col-sm-12"><a href="'. $website . '"><img class="logo_entreprise" alt="' . $name . '" src="' . $imageSrc . '"/></a></div></div>
    </div>
';
}

function print_pack_companies($dbhandler, $startup, $sectorId)
{
    global $corresp_bddCompanyId_htmlCompanyId;
    $htmlSectorId = $corresp_bddCompanyId_htmlCompanyId[$sectorId];
    $companiesNb = count_pack_companies($dbhandler, $startup, $sectorId);
    $iterator = new CompaniesIterator($dbhandler, $sectorId, $startup, 'TRUE');
    print_companies_p($htmlSectorId, $iterator, $companiesNb, $startup, $dbhandler);
}

function count_pack_companies($dbhandler, $startup, $sectorId)
{
    $iterator = new CompaniesIterator($dbhandler, $sectorId, $startup, 'TRUE');
    $company =  $iterator->iterate();
    $companiesNb = 0;
    while ($company != NULL) {
        $companiesNb++;
        $company =  $iterator->iterate();
    }
    return $companiesNb;
}
?>
</div></div>
