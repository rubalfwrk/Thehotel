<?php
App::uses('AppController', 'Controller');
class ServicesController extends AppController {

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
                'Service.title' => 'ASC'
            ),
            'limit' => 100,
        );

        $this->set('Service', $this->Paginator->paginate('Service'));
        $this->set('hotelid',$id);
    }

////////////////////////////////////////////////////////////

    public function admin_view($id = null) {
        if (!$this->Service->exists($id)) {
            throw new NotFoundException('Invalid Service');
        }
        $options = array('conditions' => array('Service.id' => $id));
        $this->set('Service', $this->Service->find('first', $options));
    }

////////////////////////////////////////////////////////////

    public function admin_add($id = null) {
		$this->set('idx',$id);
	/*	$this->loadModel('GuideCrete');
		$GuideCretelist = $this->GuideCrete->find('list');
		$this->set('GuideCretelist',$GuideCretelist);*/
        if ($this->request->is('post')) {
			            $this->Service->create();
            if ($this->Service->save($this->request->data)) {
                $this->Session->setFlash('The Service has been saved.');
                return $this->redirect(array('action' => 'admin_index',$id));
                // return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The Service could not be saved. Please, try again.');
            }
        }
		
		
    }

////////////////////////////////////////////////////////////

    public function admin_edit($id = null,$hotelid=null) {
        //print_r($id);echo "vggg";print_r($hotelid);die;
        if (!$this->Service->exists($id)) {
            throw new NotFoundException('Invalid Service');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Service->save($this->request->data)) {
                $this->Session->setFlash('The Service has been saved.');
                return $this->redirect(array('action' => 'index',$hotelid));
            } else {
                $this->Session->setFlash('The Service could not be saved. Please, try again.');
            }
        } else {
            $options = array('conditions' => array('Service.id' => $id));
            $this->request->data = $this->Service->find('first', $options);
        }
    }

////////////////////////////////////////////////////////////

    public function admin_delete($id = null,$hotelid=null) {

        $this->Service->id = $id;
        if (!$this->Service->exists()) {
            throw new NotFoundException('Invalid Service');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Service->delete()) {
            $this->Session->setFlash('The Service has been deleted.');
        } else {
            $this->Session->setFlash('The Service could not be deleted. Please, try again.');
        }
        return $this->redirect(array('action' => 'index',$hotelid));
    }
	
////////////////////////////////////////////////////////////

}
