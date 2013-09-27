<?php

/**
 *
    doorGets CMS V4.1 - 28 feb 2013
    doorGets it's free PHP Open Source CMS Final for tutorial and blog
    
    Copyright (C) 2012 - 2013  Mounir R'Quiba from Paris

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
     any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
    Website exemple : http://www.professeur-php.com
    Website info : http://www.doorgets.com
    
    Contact Mounir R'Quiba : professeurphp@gmail.com
    
    OPEN MIND IS GOOD, OPEN SOURCE IS BETTER ;)

**/

class Licence  extends Langue{
    
    public function form(){
        
        $lg = $_SESSION['doorgetsLangue'];
        $this->setLangue($lg);
        
        $out = '';
        
        $form = new Formulaire('licence');
        
        if(
           !empty($form->i) && empty($form->e)
        ){
            
            if( !array_key_exists('conditions',$form->i) ){
                $form->e['licence_conditions'] = "ok";
            }
            
            if( empty($form->e) ){
                
                $_SESSION['doorgetsStep'] = $form->i['step'];
            
                header("Location:".$_SERVER['REQUEST_URI']);
                exit();
            }
            
            
        }
        
        $formPrev = new Formulaire('previous');
        
        if(
            !empty($formPrev->i) && empty($formPrev->e)
        ){
            
            $_SESSION['doorgetsStep'] = $formPrev->i['step'];
            
            header("Location:".$_SERVER['REQUEST_URI']);
            exit();
            
        }
        
        $ViewFileLicence = CLA.'template/step2.licence.tpl.php';
        ob_start();
        include $ViewFileLicence;
        $out = ob_get_clean();
        
        return $out;
        
    }
    
}