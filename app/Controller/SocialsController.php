<?php
App::uses('AppController', 'Controller');
class SocialsController extends AppController {

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
                'Social.title' => 'ASC'
            ),
            'limit' => 100,
        );

        $this->set('Social', $this->Paginator->paginate('Social'));
        $this->set('hotelid',$id);
    }

////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        if (!$this->Social->exists($id)) {
            throw new NotFoundException('Invalid Social');
        }
        $options = array('conditions' => array('Social.id' => $id));
        $this->set('Social', $this->Social->find('first', $options));
    }

////////////////////////////////////////////////////////////

    public function admin_add($id = null) {
        $this->set('idx',$id);
    /*  $this->loadModel('GuideCrete');
        $GuideCretelist = $this->GuideCrete->find('list');
        $this->set('GuideCretelist',$GuideCretelist);*/
        if ($this->request->is('post')) {
                        $this->Social->create();
            if ($this->Social->save($this->request->data)) {
                $this->Session->setFlash('The Social has been saved.');
                return $this->redirect(array('action' => 'admin_index',$id));
                // return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The Social could not be saved. Please, try again.');
            }
        }
        
        
    }

////////////////////////////////////////////////////////////

    public function admin_edit($id = null,$hotelid=null) {
        //print_r($id);echo "vggg";print_r($hotelid);die;
        if (!$this->Social->exists($id)) {
            throw new NotFoundException('Invalid Social');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Social->save($this->request->data)) {
                $this->Session->setFlash('The Social has been saved.');
                return $this->redirect(array('action' => 'index',$hotelid));
            } else {
                $this->Session->setFlash('The Social could not be saved. Please, try again.');
            }
        } else {
            $options = array('conditions' => array('Social.id' => $id));
            $this->request->data = $this->Social->find('first', $options);
        }
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null,$hotelid=null) {

        $this->Social->id = $id;
        if (!$this->Social->exists()) {
            throw new NotFoundException('Invalid Social');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Social->delete()) {
            $this->Session->setFlash('The Social has been deleted.');
        } else {
            $this->Session->setFlash('The Social could not be deleted. Please, try again.');
        }
        return $this->redirect(array('action' => 'index',$hotelid));
    }
    
////////////////////////////////////////////////////////////

}
