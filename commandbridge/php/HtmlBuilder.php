<?php
class HtmlBuilder
{
	private $widget;	//widgetObject
	private $htmlTag = array('open' => "<html>",'close' => "</html>");
	private $headTag = array('open' => "<head>",'close' => "</head>");
		private $headCont = array();
	private $bodyTag = array('open' => "<body>",'close' => "</body>");
		private $bodyCont = "";
	public function __construct($widget){$this->widget = $widget;}

	public function getHtml()
	{
		$html = $this->htmlTag['open'];
			//head
			$html .= $this->headTag['close'];
				$html .= $this->widget->getHeadCont();
			$html .= $this->headTag['open'];
			//body
			$html .= $this->bodyTag['open'];
				$html .= $this->widget->getBodyCont();
			$html .= $this->bodyTag['close'];
		$html .= $this->htmlTag['close'];
		return $html;
	}
}
?>