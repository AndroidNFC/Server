<?php
class ServicesController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session', 'RequestHandler');
	
    public function index() {
        $services = array();
        
        if (isset($this->request->query['service_id'])) {
            $sid = $this->request->query['service_id'];
            $services[0] = $this->Service->find('first', array(
                'conditions' => array('Service.id' => $sid),
            ));
        } else if (isset($this->request->query['tag_id'])) {
            $tid = $this->request->query['tag_id'];
            $tag = $this->Service->Tag->find('first', array(
                'conditions' => array(
                    'Tag.first_tag_id <=' => $tid,
                    'Tag.last_tag_id >='  => $tid),
            ));
            if (!empty($tag)) {
                $sid = $tag['Service']['id'];
                $services[0] = $this->Service->find('first', array(
                    'conditions' => array('Service.id' => $sid),
                ));
            }
        } else {
            $services = $this->Service->find('all');
        }
        
        $xmlArray = $this->get_services_xml_array($services);

        $this->set('services', $services);
        $this->set('services_xml', $xmlArray);
    }

    public function admin_index() {
        $this->set('services', $this->Service->find('all'));
    }

    public function admin_view($id = null) {
        $this->Service->id = $id;
        $this->set('service', $this->Service->read());
        $this->set('tag', $this->Service->Tag->read());
    }

    public function admin_add() {
        
        if ($this->request->is('post')) {
            $success = $this->Service->save($this->request->data);
            if ($success) {
                $this->Session->setFlash('The service has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add the service.');
            }
        }
        
    }

    public function admin_edit($id = null) {
        $this->Service->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->Service->read();
        } else {
            $success = $this->Service->save($this->request->data);
            if ($success) {
                $this->Session->setFlash('The service has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update your service.');
            }
        }
    }

    public function admin_delete($id) {
        
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $success = $this->Service->delete($id);
        if ($success) {
            $this->Session->setFlash('The service with id: ' . $id .
                                     ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }

    private function get_services_xml_array($cake_array) {
        
        $xmlArray= array('services' => array());
        foreach ($cake_array as $service) {
            
            if (isset($this->request->query['tag_id'])) {
                $tid = $this->request->query['tag_id'];
                $button_elements = $this->get_button_elements($tid);
                $event_elements =  $this->get_event_elements($tid);
            } else {
                $button_elements = $this->get_button_elements();
                $event_elements =  $this->get_event_elements();
            }
            
            $service_element = array(
                'name' => $service['Service']['name'],
                'id' => $service['Service']['id'],
                'description' => $service['Service']['description'],
                'provider' => $service['Service']['provider'],
            );
            
            if (!empty($button_elements['button'])) {
                $service_element['buttons'] = $button_elements;
            }
            
            if (!empty($event_elements['event'])) {
                $service_element['events'] = $event_elements;
            }
            
            $xmlArray['services']['service'][] = $service_element;
            
		}
        return $xmlArray;
    }
    
	private function get_button_elements($tag_id=null) {
        
        $this->loadModel('Button');
        $buttons = $this->Button->find('all', array(
            'conditions' => array(
                'Tag.first_tag_id <=' => $tag_id,
                'Tag.last_tag_id >='  => $tag_id,
            ),
        ));
        
        $button_elements = array('button' => array());
    	foreach ($buttons as $button) {
            $button_elements['button'][] = array(
                '@type' => $button['Button']['type'],
                '@'     => $button['Button']['value'],
            );
        }
        
        return $button_elements;
    }
    
	private function get_event_elements($tag_id=null) {
        
        $this->loadModel('Event');
        $events = $this->Event->find('all', array(
            'conditions' => array(
                'Tag.first_tag_id <=' => $tag_id,
                'Tag.last_tag_id >='  => $tag_id,
            ),
        ));
        
        $event_elements = array('event' => array());
    	foreach ($events as $event) {
            $event_elements['event'][] = array(
                '@type' => $event['Event']['type'],
                '@'     => $event['Event']['value'],
            );
        }
        
        return $event_elements;
    }
    
    // Not used at the moment.
    private function get_tag_elements($service_id) {
        
        $tags = array();
        $tags = $this->Service->Tag->find('all');
        
        $tag_elements = array('tag' => array());
    	foreach ($tags as $tag) {
            if ($tag['Tag']['service_id'] == $service_id)
            $tag_elements['tag'][] = $tag['Tag']['id'];

        }
        
        return $tag_elements;
        
    }

}
