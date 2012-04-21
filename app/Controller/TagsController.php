<?php
class TagsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function index() {
        $this->set('tags', $this->Tag->find('all'));
    }

    public function admin_index() {
        $last_tag = $this->Tag->find('first', array(
            'order' => array('Tag.id DESC')
        ));

        $this->set('tags', $this->Tag->find('all'));
        $this->set('last_tag', $last_tag);
    }

    public function admin_view($id = null) {
        $this->Tag->id = $id;
        $this->set('tag', $this->Tag->read());
    }

    public function admin_add() {

        $this->loadModel('Service');
        $services = $this->Service->find('all');
        $service_options = array();
        foreach($services as $service) {
            $service_id = $service['Service']['id'];
            $service_options[$service_id] = $service['Service']['name'];
        }
        $this->set('service_options', $service_options);

        if ($this->request->is('post')) {
            $old_last_tag = $this->Tag->find('first', array(
                'order' => array('Tag.id DESC')
            ));

            $num_tags = $this->request->data['Tag']['number_of_tags'];
            $first_tag_id = $old_last_tag['Tag']['last_tag_id'] + 1;
            $last_tag_id = $first_tag_id + $num_tags - 1;

            $this->Tag->set('first_tag_id', $first_tag_id);
            $this->Tag->set('last_tag_id', $last_tag_id);
            $success = $this->Tag->save($this->request->data);
            if ($success) {
                $this->Session->setFlash('The tag has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add the tag.');
            }
        }
    }

    public function admin_edit($id = null) {
        $this->Tag->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Tag->read();
        } else {
            $success = $this->Tag->save($this->request->data);
            if ($success) {
                $this->Session->setFlash('The tag has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update your tag.');
            }
        }
    }

    public function admin_delete($id) {
        
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $success = $this->Tag->delete($id);
        if ($success) {
            $this->Session->setFlash('The tag with id: ' . $id .
                                     ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }

}
