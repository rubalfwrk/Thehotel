<?php
App::uses('AppController', 'Controller');

class QuestionnairesController extends AppController {

////////////////////////////////////////////////////////////

    public $components = array('Paginator');

////////////////////////////////////////////////////////////

    public function admin_index($id=null) {
        Configure::write('debug', 0);

//echo 'dddddddddddddddddddd';exit;
        $this->Paginator->settings = array(
            'recursive' => -1,
            'conditions'=>array('hotelid'=>$id),
            'order' => array(
                'Questionnaire.category' => 'ASC'
            ),
            'limit' => 100,
        );

        $this->set('Questionnaire', $this->Paginator->paginate('Questionnaire'));
        $this->set('hotelid',$id);
    }

////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        if (!$this->Questionnaire->exists($id)) {
            throw new NotFoundException('Invalid Questionnaire');
        }
        $options = array('conditions' => array('Questionnaire.id' => $id));
        $this->set('Questionnaire', $this->Questionnaire->find('first', $options));
    }

////////////////////////////////////////////////////////////

    public function admin_add($id = null) {
        $this->loadModel('Questionnaire');
		$this->set('idx',$id);
	
        if ($this->request->is('post')) {
			$this->Questionnaire->create();
            if ($this->Questionnaire->save($this->request->data)) {
                $this->Session->setFlash('The Questionnaire has been saved.');
                return $this->redirect(array('action' => 'admin_index',$id));
                // return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The Questionnaire could not be saved. Please, try again.');
            }
        }
		
		
    }

////////////////////////////////////////////////////////////

    public function admin_edit($id = null,$hotelid=null) {
        //print_r($id);echo "vggg";print_r($hotelid);die;
        if (!$this->Questionnaire->exists($id)) {
            throw new NotFoundException('Invalid Questionnaire');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Questionnaire->save($this->request->data)) {
                $this->Session->setFlash('The Questionnaire has been saved.');
                return $this->redirect(array('action' => 'index',$hotelid));
            } else {
                $this->Session->setFlash('The Questionnaire could not be saved. Please, try again.');
            }
        } else {
            $options = array('conditions' => array('Questionnaire.id' => $id));
            $this->request->data = $this->Questionnaire->find('first', $options);
        }
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null,$hotelid=null) {

        $this->Questionnaire->id = $id;
        if (!$this->Questionnaire->exists()) {
            throw new NotFoundException('Invalid Questionnaire');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Questionnaire->delete()) {
            $this->Session->setFlash('The Questionnaire has been deleted.');
        } else {
            $this->Session->setFlash('The Questionnaire could not be deleted. Please, try again.');
        }
        return $this->redirect(array('action' => 'index',$hotelid));
    }
	
////////////////////////////////////////////////////////////

}
