<?php
class WidgetSupervisor
{
	public function getWidgets($userMail)
	{
		$db = new ChrisMysqli();
		$widgetData = $db->get('SELECT widget.name,row,col,rowspan,colspan FROM widget_user left join widget USING(widgetId) WHERE widget_user.userId = (SELECT user.userId FROM user WHERE user.mail = "'.$userMail.'")')->fetch_assoc();
		var_dump($widgetData);
		$widgets = array();
		foreach ($widgetData as $k => $w) {
			$filename = $w['name'].'/'.$w['name'].'_widget.php';
			if(file_exists($filename))
			{
				require_once($filename);
				$widgetname = ucwords(strtolower($w['name']));
				if(class_exists($widgetname)){array_push($widgets,new $widgetname($w['row'],$w['col'],$w['rowspan'],$w['colspan']));}
				echo "<br />".$widgetname.": row->".$w['row']." col->".$w['col']."<br />";
			}
		}
		return $widgets;
	}
}
?>