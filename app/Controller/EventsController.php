<?php
class EventsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
	
    public function index() {
        $events = $this->Event->find('all');
        $this->set('events', $events);
    }

    public function admin_index() {
        $events = $this->Event->find('all');
        $this->set('events', $events);
    }
    
    public function admin_view($id = null) {
        $this->Event->id = $id;
        $this->set('event', $this->Event->read());
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
            
            $success = $this->Event->save($this->request->data);
            if ($success) {
                $this->Session->setFlash('The event has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add the event.');
            }
            
        }
    }
    
    public function admin_edit($id = null) {
        
        // Tell CakePHP we are editing the model instead of inserting new one.
        $this->Event->id = $id;
        
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
            $this->request->data = $this->Event->read();
        } else {
            $success = $this->Event->save($this->request->data);
            if ($success) {
                $this->Session->setFlash('The event has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update your event.');
            }
        }
    }

    public function admin_delete($id) {
        
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $success = $this->Event->delete($id);
        if ($success) {
            $this->Session->setFlash('The event with id: ' . $id .
                                     ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }
    
}
