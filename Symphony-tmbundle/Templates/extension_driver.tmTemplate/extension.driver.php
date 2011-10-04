<?php

	Class Extension_${TM_EXTENSION_NAME} extends Extension{
	
		public function about(){
			return array('name' => '${TM_EXTENSION_NAME}',
						 'version' => '0.1.0',
						 'release-date' => '${TM_DATE}',
						 'author' => array('name' => '${TM_FULLNAME}')
				 		);
		}
			
	}