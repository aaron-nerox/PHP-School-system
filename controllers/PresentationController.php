<?php
include('../utils/Loader.php');

class PresentationController extends Loader{
    private $ModelArray;

    public function __construct()
    {
        $this->getInstance('models','Presentation');
        $this->ModelArray['Presentation'] = $this->Presentation;
    }

    /**
     * a function that returns all the paragraphes of the presentation
     */
    public function getAllParagraphs(){
        return $this->ModelArray['Presentation']->getAllParagraphs();
    }

    /**
     * a function that returns if the image is added to the paragraph or not
     */
    public function addImage($id,$link){
        return $this->ModelArray['Presentation']->addParagraphImage($link,$id);
    }

    /**
     * a function that returns if the paragraph was deleted or not
     */
    public function deleteParagraph($id){
        return $this->ModelArray['Presentation']->removeParagraph($id);
    }

    /**
     * a function that updates the paragraph
     */
    public function updateParagraph($id,$newText){
        return $this->ModelArray['Presentation']->updateParagraph($newText,$id);
    }
}



