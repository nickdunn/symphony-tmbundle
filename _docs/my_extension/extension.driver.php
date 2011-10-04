<?php

	Class Extension_my_extension extends Extension{
	
		public function about(){
			return array('name' => 'my_extension',
						 'version' => '0.1.0',
						 'release-date' => '2011-10-01',
						 'author' => array('name' => 'Nick Dunn')
				 		);
		}
			
	}