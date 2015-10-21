<?php
class CompaniesDbHandler {
	function __construct()
	{
		$this->dbconn = pg_connect("host=forumtrivwcom.postgresql.db dbname=forumtrivwcom user=forumtrivwcom password=uRVHNy2uTkqz");
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

	function __destruct()
	{
		pg_close($dbconn);
	}
}

class CompaniesIterator {
	function __construct($sectorId, $startup, $pack)
	{
		$this->companies = 'SELECT * FROM entreprises WHERE secteur = \'' . $sectorId . '\' and pack = \'' . $pack . '\' and startup = \'' . $startup . '\'';
		if(!$this->companies) {
			//TODO error handling
		}
	}

	function iterate()
	{
		$company =  pg_fetch_array($companies, null, PGSQL_ASSOC);
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
