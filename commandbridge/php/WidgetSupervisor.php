<?php
class WidgetSupervisor
{
	public function getWidgets($userMail)
	{
		$db = new ChrisMysqli();
		$widgetData = $db->get('SELECT widget.name FROM widget LEFT JOIN (widget_user LEFT JOIN user ON user.mail = "'.$userMail.'") USING ( widgetId )')->fetch_assoc();
		$widgets = array();
		foreach ($widgetData as $k => $w) {
			$filename = $w['name'].'/'.$w['name'].'_widget.php';
			if(file_exists($filename))
			{
				require_once($filename);
				$widgetname = ucwords(strtolower($w['name']));
				if(class_exists($widgetname)){array_push($widgets,new $widgetname);}
			}
		}
		return $widgets;
	}
}
?>