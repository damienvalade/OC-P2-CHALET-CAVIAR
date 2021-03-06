<?php
class gmap_widgetViewGmp extends viewGmp {
    public function displayWidget($instance) {
		if(isset($instance['id']) && $instance['id']) {
			foreach($instance as $key => $val) {
				if(empty($instance[$key])) {
					unset($instance[$key]);
				} else {
					if($key == 'width') {
						$measures = array('px', '%');
						foreach($measures as $m) {
							if(strpos($instance[$key], $m) !== -1) {
								str_replace($m, '', $instance[$key]);
								$instance['width_units'] = $m;
								break;
							}
						}
					}
				}
			}
			echo frameGmp::_()->getModule('gmap')->drawMapFromShortcode($instance);
		}
    }
    public function displayForm($data, $widget) {
		frameGmp::_()->addStyle('gmap_widget', $this->getModule()->getModPath(). 'css/gmap_widget.css');

		$maps = frameGmp::_()->getModule('gmap')->getModel()->getAllMaps();
		$mapsOpts = array();
		if(empty($maps)) {
			$mapsOpts[0] = __('You have no maps', GMP_LANG_CODE);
		} else {
			foreach($maps as $map) {
				$mapsOpts[ $map['id'] ] = $map['title'];
			}
		}
		$this->assign('mapsOpts', $mapsOpts);
        $this->displayWidgetForm($data, $widget);
    }
}