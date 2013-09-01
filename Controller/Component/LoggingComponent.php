<?php

App::uses('Component', 'Controller');

class LoggingComponent extends Component {

    // public $components = array('Session');
    public $controller = null;
	public $loggingactions = array();

	public function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
		if (isset($settings['actions'])) {
			$this->loggingactions = $settings['actions'];
		}
	}

    public function initialize(Controller $controller) {
        $this -> controller = $controller;
    }

    public function beforeRedirect(Controller $controller, $url, $status = NULL, $exit = true) {
        $this -> logging("BEFORE:");
    }

    public function beforeRender(Controller $controller)
    {
        $this->logging("");
    }
    
    public function logging($prefix = '') {

		if (!empty($this->loggingactions)) {
			if (!in_array($this->controller->view, $this->loggingactions))
				return;
		}    	
		
        // accesslog
        $accesslog = ClassRegistry::init('Accesslog');
        // $accesslog = $this -> controller->Accesslog;
        $accesslog -> create();
        $prm = '';
        $msg = '';
        // リクエストデータの編集
        if (!empty($this -> controller->request -> data)) {
            $tmpdata = $this -> controller->request -> data;
            // セキュリティ上、ログには記録しない
            if (isset($tmpdata['User'])) {
                unset($tmpdata['User']['password']);
                unset($tmpdata['User']['comfirm']);
            }
            $prm = "DATA:" . json_encode($tmpdata, JSON_UNESCAPED_UNICODE);
        }
        // フラッシュメッセージの取得
        $msg = $this -> controller-> Session -> read('Message.flash.message');
        if (!empty($msg)) {
            $msg = "MSG:" . $msg;
        }
        $accesslog -> save(array(
            'logged' => date("Y-m-d H:i:s"),
            'controllername' => $this -> controller->name,
            'actionname' => $this -> controller->action,
            'url' => $this -> controller->request -> url,
            'user_id' => AuthComponent::user('id'), 'param' => "$prefix $msg $prm")
        );
    }

}
