<?php
require_once('Model/Model.php') ;

class Db2IndusModel extends Model{

	/**************************************************************************************
	* Liste des Functions pour changement d'unit� de base                                 *
	***************************************************************************************/

	// lit l'unit�e de base, l'unit� D'achat et l'unit� de prix d'achat"

	public function litUMbase($CodeArt) {
		
		$query = "SELECT MMITNO,MMUNMS,MMPPUN,MMPUUN FROM ".$this->biblioV11.".MITMAS where MMCONO =".$this->conoV11." AND MMITNO ='".$CodeArt."'";
	
		$stmt = $this->pdoV->query($query);
		return $stmt->fetch();
	
	}

	public function existUR($CodeArt,$OldUnit,$TypeU) {
		
		$query = "SELECT MUITNO, MUCOFA FROM ".$this->biblioV11.".MITAUN 
		where MUCONO =".$this->conoV11." AND MUITNO ='".$CodeArt."' AND MUALUN='".$OldUnit."' AND MUAUTP=".$TypeU."";
		//var_dump($query);
		$stmt = $this->pdoV->query($query);

		return $stmt;
	
	}
	public function existMITLOC($CodeArt) {
		
		$query = "SELECT DISTINCT MLITNO FROM ".$this->biblioV11.".MITLOC 
		where MLCONO =".$this->conoV11." AND MLITNO ='".$CodeArt."' ";
		//var_dump($query);
		$stmt = $this->pdoV->query($query);
		return $stmt;
	
	}
	public function existMITALO($CodeArt) {
		
		$query = "SELECT DISTINCT MQITNO FROM ".$this->biblioV11.".MITALO 
		where MQCONO =".$this->conoV11." AND MQITNO ='".$CodeArt."' ;";
	
		$stmt = $this->pdoV->query($query);
		return $stmt;
	
	}
	// met � jour l'unit�e de base, l'unit� D'achat et l'unit� de prix d'achat dans MMS001
	public function updateUNM($CodeArt,$NewUB) {

		$result = array();
		$art=$this->litUMbase($CodeArt);
		if($art['MMPPUN']==$art['MMUNMS'] && $art['MMPUUN']==$art['MMUNMS'] ){
			$query = "UPDATE ".$this->biblioV11.".MITMAS SET MMUNMS='".$NewUB."',MMPPUN='".$NewUB."',MMPUUN='".$NewUB."' WHERE MMCONO=".$this->conoV11." AND MMITNO='".$CodeArt."'";
		}
		else{			
		$query = "UPDATE ".$this->biblioV11.".MITMAS SET MMUNMS='".$NewUB."' WHERE MMCONO=".$this->conoV11." AND MMITNO='".$CodeArt."'";
		}

		$stmt = $this->pdoV->exec($query);
		
		if ($stmt==1) {
			$result['OK'] = "l'Unite de base est modifi�e  en ".$NewUB;
			//echo"l'Unite de base est modifi�e  en ".$NewUB;
		} else {
			$result['PasOk'] = "l'Unite de base n'est pas modifi�e ";
			//echo "l'Unite de base n'est pas modifi�e ";
		}
	 
		return ($result);
		 
	}

	// met � jour les qt dans le Stock MMS002 et MMS060 et MMS003
	public function updateQTStk($CodeArt,$Koef,$NewUB) {

		$result = array();
		$art=$this->litUMbase($CodeArt);
		$OldUnit=$art['MMUNMS'];
		$this->pdoV->beginTransaction();
		$ret=$this->updateUNM($CodeArt,$NewUB);
		if (isset($ret['PasOK']))
		{
			$this->pdoV->rollBack();
			echo $ret['PasOK'];
			return false;
		}else{
			$result["UNITE"]="les unites on bien ete converties!";
		}
		
		//var_dump($OldUnit);
		if($Koef<>1)
		{
			$query = "UPDATE ".$this->biblioV11.".MITBAL 
			SET MBSTQT=MBSTQT*".$Koef.",MBQUQT=MBQUQT*".$Koef.",MBRJQT=MBRJQT*".$Koef.",MBALQT=MBALQT*".$Koef.",
			MBAVAL=MBAVAL*".$Koef.",MBPLQT=MBPLQT*".$Koef.",MBORQT=MBORQT*".$Koef.",MBREQT=MBREQT*".$Koef.",MBRLQT=MBRLQT*".$Koef."
			,MBREQP=MBREQP*".$Koef.",MBAVST=MBAVST*".$Koef.",MBDILE=MBDILE*".$Koef."
			WHERE MBCONO=".$this->conoV11." AND MBITNO='".$CodeArt."'";	
		
			$stmt = $this->pdoV->exec($query);

			if ($stmt==1) {
				$result['MITBAL'] = "les Qt on �t� adapt�es � l'unit� de base ".$NewUB.' dans MMS002';
			//	echo"les Qt on �t� adapt�es � l'unit� de base".$NewUB."/r";
			} else {
				$result['PasOK'] = "les Qt n'on pas �t� adapt�es � l'unit� de base dans MMS002";
			//	echo"les Qt n'on pas �t� adapt�es � l'unit� de base/r";
			}
			
			if ($this->existMITLOC($CodeArt)){
				$query = "UPDATE ".$this->biblioV11.".MITLOC 
				SET MLSTQT=MLSTQT*".$Koef.",MLALQT=MLALQT*".$Koef.",MLPLQT=MLPLQT*".$Koef." WHERE MLCONO=".$this->conoV11." AND  MLITNO='".$CodeArt."'";
				$stmt = $this->pdoV->prepare($query);
						 
				if ($stmt->execute()) {
					$result['MITLOC'] = "les Qt on �t� adapt�es � l'unit� de base ".$NewUB.' dans MMS060';
			//		echo"les Qt on �t� adapt�es � l'unit� de base".$NewUB."/r";
				} else {
					$result['PasOK'] = "les Qt n'on pas �t� adapt�es � l'unit� de base dans MMS060";
			//		echo "les Qt n'on pas �t� adapt�es � l'unit� de base/r";
				}
			}
			$query="UPDATE ".$this->biblioV11.".MITFAC 
				SET M9UCOS=(M9UCOS/".$Koef."), M9APPR=(M9APPR/".$Koef.")
				WHERE M9CONO=".$this->conoV11."  AND M9ITNO='".$CodeArt."'";
				$stmt = $this->pdoV->prepare($query);
					 
			if ($stmt->execute()) {
				$result['MITFAC'] = "le PMP a �t� adapt� � l'unit� de base ".$NewUB;
			//	echo "le PMP a �t� adapt�es � l'unit� de base".$NewUB."/r";
			} else {
				$result['PasOK']  = "le pmp n'a pas �t� adapt� � l'unit� de base";
			//	echo "le pmp n'a pas �t� adapt�es � l'unit� de base/r";
			}
			//Mise a jour de MMS015
			$query="UPDATE ".$this->biblioV11.".MITAUN 
				SET MUCOFA=MUCOFA*".$Koef."
				WHERE MUCONO=".$this->conoV11." AND MUITNO='".$CodeArt."'";
				$stmt = $this->pdoV->prepare($query);				 
				if ($stmt->execute()) {
					$result['MITAUN']  = "les unit�s de remplacement ont �t� adapt�es � l'unit� de base ".$NewUB;
				//	echo "les unit�s de remplcament ont �t� adapt�es � l'unit� de base".$NewUB."/r";
				} else {
					$result['PasOK'] = "les unit�s de remplacement n'ont pas �t� adapt�es � l'unit� de base ".$NewUB;
				//	echo "les unit�s de remplcament n'ont pas �t� adapt�es � l'unit� de base".$NewUB."/r";
				}

			//Mise a jour MWS070
			$query="UPDATE ".$this->biblioV11.".MITTRA
			SET MTTRQT=MTTRQT*".$Koef.",MTNSTQ=MTNSTQ*".$Koef.",MTNSTT=MTNSTT*".$Koef.",MTSTNO=MTSTNO*".$Koef."
			Where MTCONO=".$this->conoV11." AND  MTWHLO='109' AND MTITNO='".$CodeArt."'";
			$stmt = $this->pdoV->prepare($query);			 
			if ($stmt->execute()) {
				$result['MITTRA'] = "les transactions de stock ont �t� adapt�es � l'unit� de base ".$NewUB;
			//	echo "les transactions de stock ont �t� adapt�es � l'unit� de base".$NewUB."/r";
			} else {
				$result['PasOK'] = "les transactions de stock n'ont pas �t� adapt�es � l'unit� de base ".$NewUB;
			//	echo "les transactions de stock n'ont pas �t� adapt�es � l'unit� de base".$NewUB."/r";
			}
			// mise a jour table des allocation
			if ($this->existMITALO($CodeArt)){
				$query="UPDATE ".$this->biblioV11.".MITALO 
				SET MQALQT=MQALQT*".$Koef.",	MQPAQT=MQPAQT*".$Koef.",	MQCAWE=MQCAWE*".$Koef.",	MQTRQT=MQTRQT*".$Koef.",	MQTRQA=MQTRQA*".$Koef.",	MQALQA=MQALQA*".$Koef.",	MQALQN=MQALQN*".$Koef.",	MQPAQA=MQPAQA*".$Koef."
				WHERE MQCONO=".$this->conoV11." AND MQITNO='".$CodeArt."'";
				$stmt = $this->pdoV->prepare($query);			 
				if ($stmt->execute()) {
					$result['MITALO'] = "les allocation de stock ont �t� adapt�es � l'unit� de base ".$NewUB;
			//		echo "les allocation de stock ont �t� adapt�es � l'unit� de base".$NewUB."/r";
				} else {
					$result['PasOK']= "les allocation de stock n'ont pas �t� adapt�es � l'unit� de base ".$NewUB;
			//		echo "les allocation de stock n'ont pas �t� adapt�es � l'unit� de base".$NewUB."/r";
				}
			}
			// cr�ation de la r�f complementaire si elle n'existe pas
			if(!$this->existUR($CodeArt,$OldUnit,1)){
				$datej=date('Ymd');
				$heurej=date('His');
				$query="INSERT INTO ".$this->biblioV11.".MITAUN
		       (MUCONO,MUITNO   ,MUAUTP,MUALUN  ,MUDCCD,MUCOFA,MUDMCF,MUPCOF     ,MUAUS1,MUAUS2,MUAUS3,MUAUS4,MUAUS5,MUAUS6,MUAUS9,MUUNMU  ,MUFMID ,MURESI ,MUTXID,MURGDT,MURGTM,MULMDT,MUCHNO,MUCHID   ,MULMTS,MUPACT  ,MUAUSC,MUAUSB) 
				VALUES (100   ,'".$CodeArt."',1     ,'".$OldUnit."',2     ,1/".$Koef.",1     ,1.000000000,0     ,0     ,0     ,0     ,0     ,0     ,0     ,0.000000,'     ','     ',0     ,".$datej." ,".$heurej.",".$datej." ,0     ,'MOVEX',0     ,'      ',0     ,0     )";
				//var_dump($query);
				$stmt = $this->pdoV->prepare($query);			 
				if ($stmt->execute()) {
					$result['MITAUN1']= "Creation de l'unit� de remplacement de QT ".$OldUnit;
			//		echo "Creation de l'unit� de remplacement  de QT ".$OldUnit."/r";
				} else {
					$result['PasOK'] = "La Cr�ation de l'unit� de remplacement de QT ".$OldUnit." � �chou�e!" ;
			//		echo "La Cr�ation de l'unit� de remplacement de QT ".$OldUnit." � �chou�e!/r" ;
				}
			}
			if(!$this->existUR($CodeArt,$OldUnit,2)){
				$datej=date('Ymd');
				$heurej=date('His');
				$query="INSERT INTO ".$this->biblioV11.".MITAUN
		       (MUCONO,MUITNO   ,MUAUTP,MUALUN  ,MUDCCD,MUCOFA,MUDMCF,MUPCOF     ,MUAUS1,MUAUS2,MUAUS3,MUAUS4,MUAUS5,MUAUS6,MUAUS9,MUUNMU  ,MUFMID ,MURESI ,MUTXID,MURGDT,MURGTM,MULMDT,MUCHNO,MUCHID   ,MULMTS,MUPACT  ,MUAUSC,MUAUSB) 
				VALUES (100   ,'".$CodeArt."',2     ,'".$OldUnit."',2     ,1/".$Koef.",1     ,1.000000000,0     ,0     ,0     ,0     ,0     ,0     ,0     ,0.000000,'     ','     ',0     ,".$datej." ,".$heurej.",".$datej.",0     ,'MOVEX',0     ,'      ',0     ,0     )";
				//var_dump($query);
				$stmt = $this->pdoV->prepare($query);			 
				if ($stmt->execute()) {
					$result['MITAUN2'] = "Creation de l'unit� de remplacement de Prix ".$OldUnit;
			//		echo "Creation de l'unit� de remplacement de Prix ".$OldUnit."/r";
				} else {
					$result['PasOK'] = "La Cr�ation de l'unit� de remplacement de Prix ".$OldUnit." � �chou�e!" ;
			//		echo "La Cr�ation de l'unit� de remplacement de Prix ".$OldUnit." � �chou�e! /r" ;
				}
			}
		}
		if (isset($result['PasOK'])) {
			$this->pdoV->rollBack();
			echo 'La conversion n\'a pas eu lieu<br>';
			echo 'derniere erreur'.$result['PasOK'];
		} else {
			$this->pdoV->commit();
			$text='';
			foreach ($result as $key => $value) {
				# code...
				$text=$text.$value.'<br>';
			}
			echo $text;
		}
	}
 
	
}
?>