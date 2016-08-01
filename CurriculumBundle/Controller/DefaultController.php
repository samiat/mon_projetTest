<?php

namespace Curriculum\CurriculumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Curriculum\CurriculumBundle\Entity\Profils;

class DefaultController extends Controller {
	public function ajoutAction() {
			
		//get connection to the DB
		$em = $this -> getDoctrine() -> getManager();
		
		//recuprate all the jobs looked for
		$profils = $em -> getRepository('CurriculumBundle:Profils') -> findBy(array('profil' => 'developpeur java'));
		
		//counts the number of jobs
		$size = count($profils);

		//puts the skills of all the jobs found into one string and separat them by a comma
		$competencesvirg = "";

		for ($i = 0; $i < $size; $i++) 
			{
				
			$competencesvirg .= "," . $profils[$i] -> getCompetences();
			
			}
		
		//delete the first comma wish appears into the beggining of the string
		$competences = ltrim($competencesvirg, ",");

		//counts the number of the skills
		$nmbrVirgule = substr_count($competences, ',') + 1;
		
		//puts the skills into a table
		$tabCompetences = array();
		$tabCompetences = split('[,.-]', $competences);
		
		//returns a table of skills without repeating any of it
		$tableau = array_unique($tabCompetences);

		//returns the rate of each skill and put it into a table with the same order as $tableau
		$tabva = array();
		foreach ($tableau as $key) {
			$k = calculerNombreApparence($tabCompetences, $key, $nmbrVirgule);
			$tabva[] = $k;
		}

		
		//counts the number of skills with a rate is higher than 0.1
		$i=0;
		$j=0;
		while($i<count($tabva)){
			if($tabva[$i]>1/10){
				$j++;
				
			}
			
			else{}
			$i++;
		}
		//regroups the skills with their rates
		$tableauPierre=array(array());
		for($i=0;$i<4;$i++){
			$tableauPierre[$i]['competence']=$tableau[$i];
			$tableauPierre[$i]['pourcentage']=$tabva[$i];
		}
		return $this -> render('CurriculumBundle:Default:index.html.twig', array('sou' => $tableauPierre, 'count_profils' => $tabva, 'nmbr' => $j, 'current' => $tableau));
	}

}

//calculate the number of appearance of each skill 
function calculerNombreApparence($tab, $chaine, $tot) {
	$i = 0;
	foreach ($tab as $key) {
		if (strcasecmp($key, $chaine) == 0) {

			$i++;
			$div = $i / $tot;
			$com = $div;

		} else {
		}
	}
	return $com;
}
