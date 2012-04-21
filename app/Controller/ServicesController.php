<?php
class ServicesController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session', 'RequestHandler');
	
    public function index() {
        $services = $this->Service->find('all');
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

	private function get_services_xml_array_for_discount_service($service) {                    
    	foreach ($service['Tag'] as $tag) {
           	if( $this->check_tag($tag))
			{
				$service_buttons = array(
	           		'button1' => $tag['phone_number'],
                    'button2' => $tag['url'],
                    'button3' => $tag['phone_number'],
                    'button4' => $tag['url']
				);
				// tag is in the range
	           $service_tag = array(
	           		'type' => 'Discount App',
                    'id' => $tag['id'],	 
                    'event'	=> $tag['url'],
                    'description' => $tag['content'],	               
                    'buttons' => $service_buttons
                );
			}
			else {
				// tag is not in the range.
				continue;
			}            

            $xmlArray['service'][] = $service_tag;
        }
        return $xmlArray;
    }

	private function get_services_xml_array_for_movie_service($service) {                    
        foreach ($service['Tag'] as $tag) {
           	if($this->check_tag($tag))
			{
				$events = array(
	           		'event1' => $tag['phone_number'],
                    'event2' => $tag['url'],                    
				);
				// tag is in the range
	           $service_tag = array(
	           		'type' => 'Finkino Movie app',
                    'id' => $tag['id'],	 
                    'description' => $tag['content'],
                    'events'	=> $events
                );
			}
			else {
				// tag is not in the range.
				continue;
			}            

            $xmlArray['service'][] = $service_tag;
        }
        return $xmlArray;
    }

	private function check_tag($tag) {
    	if( $this->params['url']['tag_id'] >= $tag['first_tag_id'] &&
			$this->params['url']['tag_id'] <= $tag['last_tag_id'] )
		{
		 	return 1 ; // true
        }
        return 0; // false
    }


    private function get_services_xml_array($cake_array) {                    
        foreach ($cake_array as $service) {        	
			if( $this->params['url']['service_id'] == $service['Service']['id'] &&
			    $this->params['url']['service_id'] == 1 )
				// hardcore 1 for discount app.
				{
					$xmlArray = $this->get_services_xml_array_for_discount_service($service);
				}
			else if( $this->params['url']['service_id'] == $service['Service']['id'] &&
			    $this->params['url']['service_id'] == 2 )
				{
					$xmlArray = $this->get_services_xml_array_for_movie_service($service);
				}
			else {
				{
					// no releavent service found
				}
			}
		}
        return $xmlArray;
    }

	

}
