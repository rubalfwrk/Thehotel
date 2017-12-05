<?php
App::uses('AppController', 'Controller');
class ContactsController extends AppController {

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
                'Contact.info' => 'ASC'
            ),
            'limit' => 100,
        );

        $this->set('Contact', $this->Paginator->paginate('Contact'));
        $this->set('hotelid',$id);
    }

////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException('Invalid Contact');
        }
        $options = array('conditions' => array('Contact.id' => $id));
        $this->set('Contact', $this->Contact->find('first', $options));
    }

////////////////////////////////////////////////////////////

    public function admin_add($id = null) {
        $this->set('idx',$id);
    /*  $this->loadModel('GuideCrete');
        $GuideCretelist = $this->GuideCrete->find('list');
        $this->set('GuideCretelist',$GuideCretelist);*/
        if ($this->request->is('post')) {
                        $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash('The Contact has been saved.');
                return $this->redirect(array('action' => 'admin_index',$id));
                // return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The Contact could not be saved. Please, try again.');
            }
        }
        
        
    }

////////////////////////////////////////////////////////////

    public function admin_edit($id = null,$hotelid=null) {
        //print_r($id);echo "vggg";print_r($hotelid);die;
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException('Invalid Contact');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash('The Contact has been saved.');
                return $this->redirect(array('action' => 'index',$hotelid));
            } else {
                $this->Session->setFlash('The Contact could not be saved. Please, try again.');
            }
        } else {
            $options = array('conditions' => array('Contact.id' => $id));
            $this->request->data = $this->Contact->find('first', $options);
        }
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null,$hotelid=null) {

        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
            throw new NotFoundException('Invalid Contact');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Contact->delete()) {
            $this->Session->setFlash('The Contact has been deleted.');
        } else {
            $this->Session->setFlash('The Contact could not be deleted. Please, try again.');
        }
        return $this->redirect(array('action' => 'index',$hotelid));
    }
    
////////////////////////////////////////////////////////////

}
