<?php
class ButtonsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
	
    public function index() {
        $buttons = $this->Button->find('all');
        $this->set('buttons', $buttons);
    }

    public function admin_index() {
        $buttons = $this->Button->find('all');
        $this->set('buttons', $buttons);
    }
    
    public function admin_view($id = null) {
        $this->Button->id = $id;
        $this->set('button', $this->Button->read());
    }

    public function admin_add() {

        $this->loadModel('Tag');
        $tags = $this->Tag->find('all');
        $tag_options = array();
        foreach($tags as $tag) {
            $tag_id = $tag['Tag']['id'];
            $tag_options[$tag_id] = $tag['Tag']['first_tag_id'].'-'.
                                    $tag['Tag']['last_tag_id'].' ('.
                                    $tag['Service']['name'].')';
        }
        $this->set('tag_options', $tag_options);

        if ($this->request->is('post')) {
            
            $success = $this->Button->save($this->request->data);
            if ($success) {
                $this->Session->setFlash('The button has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add the button.');
            }
            
        }
    }
    
    public function admin_edit($id = null) {
        
        // Tell CakePHP we are editing the model instead of inserting new one.
        $this->Button->id = $id;
        
        $this->loadModel('Tag');
        $tags = $this->Tag->find('all');
        $tag_options = array();
        foreach($tags as $tag) {
            $tag_id = $tag['Tag']['id'];
            $tag_options[$tag_id] = $tag['Tag']['first_tag_id'].'-'.
                                    $tag['Tag']['last_tag_id'].' ('.
                                    $tag['Service']['name'].')';
        }
        $this->set('tag_options', $tag_options);
        
        if ($this->request->is('get')) {
            $this->request->data = $this->Button->read();
        } else {
            $success = $this->Button->save($this->request->data);
            if ($success) {
                $this->Session->setFlash('The button has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update your button.');
            }
        }
    }

    public function admin_delete($id) {
        
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $success = $this->Button->delete($id);
        if ($success) {
            $this->Session->setFlash('The button with id: ' . $id .
                                     ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }
    
}
