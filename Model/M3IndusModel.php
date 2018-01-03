<?php
require_once('Model/Model.php') ;

class M3IndusModel extends Model{

	/**************************************************************************************
	* Liste des Functions pour changement d'unité de base                                 *
	***************************************************************************************/

	// lit l'unitée de base, l'unité D'achat et l'unité de prix d'achat"

	public function litUMbase($CodeArt) {
		
		$query = "SELECT MMITNO,MMUNMS,MMPPUN,MMPUUN FROM ".$this->biblio.".MITMAS where MMCONO =100 AND MMITNO ='".$CodeArt."'";
	
		$stmt = $this->pdo->query($query);
		return $stmt->fetch();
	
	}

	public function existUR($CodeArt,$OldUnit,$TypeU) {
		
		$query = "SELECT MUITNO, MUCOFA FROM ".$this->biblio.".MITAUN 
		where MUCONO =100 AND MUITNO ='".$CodeArt."' AND MUALUN='".$OldUnit."' AND MUAUTP=".$TypeU."";
		//var_dump($query);
		$stmt = $this->pdo->query($query);

		return $stmt;
	
	}
	public function existMITLOC($CodeArt) {
		
		$query = "SELECT DISTINCT MLITNO FROM ".$this->biblio.".MITLOC 
		where MLCONO =100 AND MLITNO ='".$CodeArt."' AND MLWHLO='109'";
		//var_dump($query);
		$stmt = $this->pdo->query($query);
		return $stmt;
	
	}
	public function existMITALO($CodeArt) {
		
		$query = "SELECT DISTINCT MQITNO FROM ".$this->biblio.".MITALO 
		where MQCONO =100 AND MQITNO ='".$CodeArt."' AND MQWHLO='109';";
	
		$stmt = $this->pdo->query($query);
		return $stmt;
	
	}
	// met à jour l'unitée de base, l'unité D'achat et l'unité de prix d'achat dans MMS001
	public function updateUNM($CodeArt,$NewUB) {

		$result = array();
		$art=$this->litUMbase($CodeArt);
		if($art['MMPPUN']==$art['MMUNMS'] && $art['MMPUUN']==$art['MMUNMS'] ){
		$query = "UPDATE ".$this->biblio.".MITMAS SET MMUNMS='".$NewUB."',MMPPUN='".$NewUB."',MMPUUN='".$NewUB."' WHERE MMCONO=100 AND MMITNO='".$CodeArt."'";
		}
		else{			
		$query = "UPDATE ".$this->biblio.".MITMAS SET MMUNMS='".$NewUB."' WHERE MMCONO=100 AND MMITNO='".$CodeArt."'";
		}

		$stmt = $this->pdo->exec($query);
		
		if ($stmt==1) {
			$result['OK'] = "l'Unite de base est modifiée  en ".$NewUB;
			//echo"l'Unite de base est modifiée  en ".$NewUB;
		} else {
			$result['PasOk'] = "l'Unite de base n'est pas modifiée ";
			//echo "l'Unite de base n'est pas modifiée ";
		}
	 
		return ($result);
		 
	}

	// met à jour les qt dans le Stock MMS002 et MMS060 et MMS003
	public function updateQTStk($CodeArt,$Koef,$NewUB) {

		$result = array();
		$art=$this->litUMbase($CodeArt);
		$OldUnit=$art['MMUNMS'];
		$this->pdo->beginTransaction();
		$ret=$this->updateUNM($CodeArt,$NewUB);
		if (isset($ret['PasOK']))
		{
			$this->pdo->rollBack();
			echo $ret['PasOK'];
			return false;
		}else{
			$result["UNITE"]="les unites on bien ete converties!";
		}
		
		if($Koef<>1)
		{//var_dump($OldUnit);

			$query = "UPDATE ".$this->biblio.".MITBAL 
			SET MBSTQT=MBSTQT*".$Koef.",MBQUQT=MBQUQT*".$Koef.",MBRJQT=MBRJQT*".$Koef.",MBALQT=MBALQT*".$Koef.",
			MBAVAL=MBAVAL*".$Koef.",MBPLQT=MBPLQT*".$Koef.",MBORQT=MBORQT*".$Koef.",MBREQT=MBREQT*".$Koef.",MBRLQT=MBRLQT*".$Koef."
			,MBREQP=MBREQP*".$Koef.",MBAVST=MBAVST*".$Koef.",MBDILE=MBDILE*".$Koef."
			WHERE MBCONO=100 AND MBWHLO='109' AND MBITNO='".$CodeArt."'";	
		
			$stmt = $this->pdo->exec($query);

			if ($stmt==1) {
				$result['MITBAL'] = "les Qt on été adaptées à l'unité de base ".$NewUB.' dans MMS002';
			//	echo"les Qt on été adaptées à l'unité de base".$NewUB."/r";
			} else {
				$result['PasOK'] = "les Qt n'on pas été adaptées à l'unité de base dans MMS002";
			//	echo"les Qt n'on pas été adaptées à l'unité de base/r";
			}
			
			if ($this->existMITLOC($CodeArt)){
				$query = "UPDATE ".$this->biblio.".MITLOC 
				SET MLSTQT=MLSTQT*".$Koef.",MLALQT=MLALQT*".$Koef.",MLPLQT=MLPLQT*".$Koef." WHERE MLCONO=100 AND MLWHLO='109' AND MLITNO='".$CodeArt."'";
				$stmt = $this->pdo->prepare($query);
						 
				if ($stmt->execute()) {
					$result['MITLOC'] = "les Qt on été adaptées à l'unité de base ".$NewUB.' dans MMS060';
			//		echo"les Qt on été adaptées à l'unité de base".$NewUB."/r";
				} else {
					$result['PasOK'] = "les Qt n'on pas été adaptées à l'unité de base dans MMS060";
			//		echo "les Qt n'on pas été adaptées à l'unité de base/r";
				}
			}
			$query="UPDATE ".$this->biblio.".MITFAC 
			SET M9UCOS=(M9UCOS/".$Koef."), M9APPR=(M9APPR/".$Koef.")
			WHERE M9CONO=100 AND M9FACI='109' AND M9ITNO='".$CodeArt."'";
			$stmt = $this->pdo->prepare($query);
					 
			if ($stmt->execute()) {
				$result['MITFAC'] = "le PMP a été adapté à l'unité de base ".$NewUB;
			//	echo "le PMP a été adaptées à l'unité de base".$NewUB."/r";
			} else {
				$result['PasOK']  = "le pmp n'a pas été adapté à l'unité de base";
			//	echo "le pmp n'a pas été adaptées à l'unité de base/r";
			}
			//Mise a jour de MMS015
			$query="UPDATE ".$this->biblio.".MITAUN 
			SET MUCOFA=MUCOFA*".$Koef."
			WHERE MUCONO=100 AND MUITNO='".$CodeArt."'";
			$stmt = $this->pdo->prepare($query);				 
			if ($stmt->execute()) {
				$result['MITAUN']  = "les unités de remplacement ont été adaptées à l'unité de base ".$NewUB;
			//	echo "les unités de remplcament ont été adaptées à l'unité de base".$NewUB."/r";
			} else {
				$result['PasOK'] = "les unités de remplacement n'ont pas été adaptées à l'unité de base ".$NewUB;
			//	echo "les unités de remplcament n'ont pas été adaptées à l'unité de base".$NewUB."/r";
			}

			//Mise a jour MWS070
			$query="UPDATE ".$this->biblio.".MITTRA
			SET MTTRQT=MTTRQT*".$Koef.",MTNSTQ=MTNSTQ*".$Koef.",MTNSTT=MTNSTT*".$Koef.",MTSTNO=MTSTNO*".$Koef."
			Where MTCONO=100 AND  MTWHLO='109' AND MTITNO='".$CodeArt."'";
			$stmt = $this->pdo->prepare($query);			 
			if ($stmt->execute()) {
				$result['MITTRA'] = "les transactions de stock ont été adaptées à l'unité de base ".$NewUB;
			//	echo "les transactions de stock ont été adaptées à l'unité de base".$NewUB."/r";
			} else {
				$result['PasOK'] = "les transactions de stock n'ont pas été adaptées à l'unité de base ".$NewUB;
			//	echo "les transactions de stock n'ont pas été adaptées à l'unité de base".$NewUB."/r";
			}
			// mise a jour table des allocation
			if ($this->existMITALO($CodeArt)){
				$query="UPDATE ".$this->biblio.".MITALO 
				SET MQALQT=MQALQT*".$Koef.",	MQPAQT=MQPAQT*".$Koef.",	MQCAWE=MQCAWE*".$Koef.",	MQTRQT=MQTRQT*".$Koef.",	MQTRQA=MQTRQA*".$Koef.",	MQALQA=MQALQA*".$Koef.",	MQALQN=MQALQN*".$Koef.",	MQPAQA=MQPAQA*".$Koef."
				WHERE MQCONO=100 AND MQWHLO='109' AND MQITNO='".$CodeArt."'";
				$stmt = $this->pdo->prepare($query);			 
				if ($stmt->execute()) {
					$result['MITALO'] = "les allocation de stock ont été adaptées à l'unité de base ".$NewUB;
			//		echo "les allocation de stock ont été adaptées à l'unité de base".$NewUB."/r";
				} else {
					$result['PasOK']= "les allocation de stock n'ont pas été adaptées à l'unité de base ".$NewUB;
			//		echo "les allocation de stock n'ont pas été adaptées à l'unité de base".$NewUB."/r";
				}
			}
			// création de la réf complementaire si elle n'existe pas
			if(!$this->existUR($CodeArt,$OldUnit,1)){
				$datej=date('Ymd');
				$heurej=date('His');
				$query="INSERT INTO ".$this->biblio.".MITAUN
		       (MUCONO,MUITNO   ,MUAUTP,MUALUN  ,MUDCCD,MUCOFA,MUDMCF,MUPCOF     ,MUAUS1,MUAUS2,MUAUS3,MUAUS4,MUAUS5,MUAUS6,MUAUS9,MUUNMU  ,MUFMID ,MURESI ,MUTXID,MURGDT,MURGTM,MULMDT,MUCHNO,MUCHID   ,MULMTS,MUPACT  ,MUAUSC,MUAUSB) 
				VALUES (100   ,'".$CodeArt."',1     ,'".$OldUnit."',2     ,1/".$Koef.",1     ,1.000000000,0     ,0     ,0     ,0     ,0     ,0     ,0     ,0.000000,'     ','     ',0     ,".$datej." ,".$heurej.",".$datej." ,0     ,'MOVEX',0     ,'      ',0     ,0     )";
				//var_dump($query);
				$stmt = $this->pdo->prepare($query);			 
				if ($stmt->execute()) {
					$result['MITAUN1']= "Creation de l'unité de remplacement de QT ".$OldUnit;
			//		echo "Creation de l'unité de remplacement  de QT ".$OldUnit."/r";
				} else {
					$result['PasOK'] = "La Création de l'unité de remplacement de QT ".$OldUnit." à échouée!" ;
			//		echo "La Création de l'unité de remplacement de QT ".$OldUnit." à échouée!/r" ;
				}
			}
			if(!$this->existUR($CodeArt,$OldUnit,2)){
				$datej=date('Ymd');
				$heurej=date('His');
				$query="INSERT INTO ".$this->biblio.".MITAUN
		       (MUCONO,MUITNO   ,MUAUTP,MUALUN  ,MUDCCD,MUCOFA,MUDMCF,MUPCOF     ,MUAUS1,MUAUS2,MUAUS3,MUAUS4,MUAUS5,MUAUS6,MUAUS9,MUUNMU  ,MUFMID ,MURESI ,MUTXID,MURGDT,MURGTM,MULMDT,MUCHNO,MUCHID   ,MULMTS,MUPACT  ,MUAUSC,MUAUSB) 
				VALUES (100   ,'".$CodeArt."',2     ,'".$OldUnit."',2     ,1/".$Koef.",1     ,1.000000000,0     ,0     ,0     ,0     ,0     ,0     ,0     ,0.000000,'     ','     ',0     ,".$datej." ,".$heurej.",".$datej.",0     ,'MOVEX',0     ,'      ',0     ,0     )";
				//var_dump($query);
				$stmt = $this->pdo->prepare($query);			 
				if ($stmt->execute()) {
					$result['MITAUN2'] = "Creation de l'unité de remplacement de Prix ".$OldUnit;
			//		echo "Creation de l'unité de remplacement de Prix ".$OldUnit."/r";
				} else {
					$result['PasOK'] = "La Création de l'unité de remplacement de Prix ".$OldUnit." à échouée!" ;
			//		echo "La Création de l'unité de remplacement de Prix ".$OldUnit." à échouée! /r" ;
				}
			}
		}		
		if (isset($result['PasOK'])) {
			$this->pdo->rollBack();
			echo 'La conversion n\'a pas eu lieu<br>';
			echo 'derniere erreur'.$result['PasOK'];
		} else {
			$this->pdo->commit();
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