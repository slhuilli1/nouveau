<?php
	defined('_JEXEC') or die('Access deny');

	class plgContentNouveau extends JPlugin 
	{
		
		
	
	
		function onContentPrepare($content, $article, $params, $limit){				
			$document = JFactory::getDocument();
			$document->addStyleSheet('plugins/content/nouveau/style.css');		
			
			$re = '/<a.*data-nouveau.*=(.*\'|")(.*)(\'|").*<\/a>/m';
			preg_match_all($re, $article->text, $matches, PREG_SET_ORDER, 0);
			foreach($matches as $P)
			{
				echo (is_int(strtotime($P[2])));
				if ((is_int(strtotime($P[2]))==1) and (strtotime(date(). ' + '.$this->params->get('nbjours', '').' days')>strtotime($P[2]) ))
				{
					
				/*	echo "<pre>";
					echo $P[2];
					echo "</pre>";*/
					$re = '/data-nouveau.*=(.*\'|")(.*)(\'|")/m';
					$subst = "class=\"fichier-recent\"";
					$article->text = preg_replace($re, $subst, $article->text);
				}
				
			}
			
			//preg_match_all($re, $article->text, $matches, PREG_SET_ORDER, 0);

			$subst = "class=\"nouveau\" data-nouveau=$1";
			
			
			
			
			
			
			
		}	
	}