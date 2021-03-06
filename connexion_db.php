<?php
include('param_db.php');

class CompaniesDbHandler {
	function __construct()
	{
		global $db_host;
		global $db_dbname;
		global $db_user;
		global $db_password;
		$connexion_request = 'host=' . $db_host . ' dbname=' . $db_dbname . ' user=' . $db_user . ' password=' . $db_password;
		$this->dbconn = pg_connect($connexion_request);
		if (!$this->dbconn) {
			die('Connexion impossible : ' . pg_last_error());
		}
	}

	function get_sector_id($sectorName)
	{
		$query = 'SELECT * FROM secteurs_entreprises WHERE nom_secteur = \'' . $sectorName . '\'';
		$result = pg_query($this->dbconn, $query);
		if(!$result) {
			die('Échec de la récupération des id des secteurs dans la bdd');
		}
		$secteur = pg_fetch_array($result, null, PGSQL_ASSOC);
		pg_free_result($result);
		if(!$secteur) {
			return False;
		}
		return $secteur["id"];
	}

	function get_companies_by_sector($sectorName)
	{
		$sectorId = $this->get_sector_id($sectorName);
		$query = 'SELECT * FROM secteurs_entreprises WHERE nom_secteur = \'' . $sectorName . '\'';
		$result = pg_query($query);
		if(!$result) {
			die('Échec de la récupération des id des secteurs dans la bdd');
		}
		$secteur = pg_fetch_array($result, null, PGSQL_ASSOC);
		pg_free_result($result);
		if(!$secteur) {
			return False;
		}
		return $secteur["id"];
	}

    function get_pack($companyId)
    {
		$query = 'SELECT * FROM carousel_packs WHERE id_entreprise = ' . $companyId . '';
		$result = pg_query($this->dbconn, $query);
		if(!$result) {
			die('Échec de la récupération des packs dans la bdd');
		}
		$pack = pg_fetch_array($result, null, PGSQL_ASSOC);
		pg_free_result($result);
		if(!$pack) {
			return False;
		}
		return $pack;
    }

    function get_pack_companies_nb()
    {
        $iterator = new PackCompaniesIterator($this);
        $nbreEntreprises = 0;
        while ($iterator->iterate() != NULL) {
            $nbreEntreprises++;
        }
        return $nbreEntreprises;
    }

	function __destruct()
	{
		pg_close($dbconn);
	}
}

class CompaniesIterator {
	function __construct($dbHandler, $sectorId, $startup, $pack)
	{
		$query = 'SELECT * FROM entreprises WHERE sector = ' . $sectorId . ' and pack = ' . $pack . ' and startup = ' . $startup . ' ORDER BY company;';
		$this->companies = pg_query($dbHandler->dbconn, $query);
		if(!$this->companies) {
            echo "Erreur dans la requête: " . pg_last_error();
            $this->companies = NULL;
		}
	}

	function iterate()
	{
        if ($this->companies == NULL) {
            return NULL;
        }
		$company =  pg_fetch_array($this->companies, null, PGSQL_ASSOC);
		if (!$company) {
			pg_free_result($this->companies);
			$this->companies = NULL;
		}
		return $company;
	}

	function __destruct()
	{
		if ($this->companies != NULL) {
			pg_free_result($this->companies);
			$this->companies = NULL;
		}
	}
}

class PackCompaniesIterator {
	function __construct($dbHandler)
	{
		$query = 'SELECT * FROM entreprises WHERE pack = TRUE ORDER BY company;';
		$this->companies = pg_query($dbHandler->dbconn, $query);
		if(!$this->companies) {
            echo "Erreur dans la requête: " . pg_last_error();
            $this->companies = NULL;
		}
	}

	function iterate()
	{
        if ($this->companies == NULL) {
            return NULL;
        }
		$company =  pg_fetch_array($this->companies, null, PGSQL_ASSOC);
		if (!$company) {
			pg_free_result($this->companies);
			$this->companies = NULL;
		}
		return $company;
	}

	function __destruct()
	{
		if ($this->companies != NULL) {
			pg_free_result($this->companies);
			$this->companies = NULL;
		}
	}
}
