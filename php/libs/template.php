<?php
/**
 * ZFree(自由)模板 by ZMAX团队 (zmax99.com)
 *
 * @package    ZFree
 * @author     ZMAX团队 
 * @email      zhang19min88@163.com
 * @created    2017-06-04 
 * @copyright  Copyright (c) 南宁市程序人软件科技有限责任公司
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 * @link       http://www.zmax99.com/template/zfree ZFree主页
 */

defined('_JEXEC') or die;


// 加载joomla文件系统
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

// 加载我们自己的库文件
$tmplPath = dirname(__FILE__);
require_once $tmplPath . '/css.php';
require_once $tmplPath . '/css.less.leafo.php';
require_once $tmplPath . '/css.less.gpeasy.php';
require_once $tmplPath . '/css.scss.leafo.php';
require_once $tmplPath . '/minify.php';
require_once $tmplPath . '/class.mobiledetect.php';

/**
 * Class ZFreeTemplate
 */
class ZFreeTemplate
{
    /**
     * @var JDocumentHTML
     */
    public $doc = null;

    /**
     * @var Joomla\Registry\Registry
     */
    public $config = null;

    /**
     * @var JUri
     */
    public $url;

    /**
     * @var JApplicationSite
     */
    public $app;

    /**
     * @var JMenuSite
     */
    public $menu;

    /**
     * @var Joomla\Registry\Registry
     */
    public $params;

    /**
     * @var Joomla\Registry\Registry
     */
    public $request;

    /**
     * @var JUser
     */
    public $user;

    /**
     * @var ZFreeMobileDetect
     */
    public $mobile;

    /**
     * @var string
     */
    public $dir;
    public $baseurl;
    public $path;
    public $pathFull;
    public $fonts;
    public $fontsFull;
    public $img;
    public $imgFull;
    public $less;
    public $lessFull;
    public $scss;
    public $scssFull;
    public $css;
    public $cssFull;
    public $js;
    public $jsFull;
    public $lang;
    public $langDef;

    /**
     * @var bool
     */
    protected $_debugMode = false;

    /**
     * @功能：获得ZFreeTemplate对象  
	 * @参数：无
	 * @返回：
     *   ZFreeTemplate对象
	 * @说明：单件模式，没有则创建
     */
    public static function getInstance()
    {
        static $instance;

        if (!isset($instance)) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * @功能：构造函数，初始化变量
	 * @参数：无
	 * @返回：
	 * @说明：
     */
    private function __construct()
    {
        // 初始化变量
        $this->doc     = JFactory::getDocument(); //当前的文档对象
        $this->config  = JFactory::getConfig();//当前的全局配置对象
        $this->url     = JUri::getInstance();//当前的URL对象
        $this->app     = JFactory::getApplication();
        $this->menu    = $this->app->getMenu(); //当前的菜单对象
        $this->params  = $this->app->getTemplate(true)->params; //当前的模板参数
        $this->user    = JFactory::getUser();//当前的用户
        $this->baseurl = $this->_getBaseUrl(); 

        // 相对路径
        $this->path  = $this->_getTemplatePath();
        $this->img   = $this->path . '/images';
        $this->fonts = $this->path . '/fonts';
        $this->less  = $this->path . '/less';
        $this->scss  = $this->path . '/scss';
        $this->css   = $this->path . '/css';
        $this->js    = $this->path . '/js';

        // 绝对路径
        $this->pathFull  = $this->_getTemplatePathFull();
        $this->imgFull   = JPath::clean($this->pathFull . '/images');
        $this->fontsFull = JPath::clean($this->pathFull . '/fonts');
        $this->cssFull   = JPath::clean($this->pathFull . '/css');
        $this->lessFull  = JPath::clean($this->pathFull . '/less');
        $this->scssFull  = JPath::clean($this->pathFull . '/scss');
        $this->jsFull    = JPath::clean($this->pathFull . '/js');
        $this->block   = JPath::clean($this->pathFull . '/block');

        // 初始化模板变量
        $this->lang    = $this->_getLangCurrent();
        $this->langDef = $this->_getLangDefault();
        $this->request = $this->_getRequest();
        $this->dir     = $this->doc->getDirection();

        // 初始化移动侦测对象
        $this->mobile = $this->_getMobile();

        $this->_debugMode = defined('JDEBUG') && JDEBUG;
    }
    
   
	/**
	 * @功能：创建joomla模块
	 * @参数：$name 
					string  位置的名称 
			  $style	
					string   模块风格  默认为 no
	 * @返回：
				string  例如： <jdoc:include type="modules" name="zmax" style="zmaxstyle" />
					
	 * @说明：
	 */
    public function defModule($name, $style = 'Z4html5')
    {
		$module = '';
		for($i=1;$i<7;$i++)
		{
			$moduleNames = $this->getModuleRowNames($name,$i,$style);
			if($this->countModules($moduleNames))
			{
				$module.=$this->getRowModules($name,$i);	
			}
		}
        echo $module;
    }
	
	protected function getRowModules($module,$row,$style="Z4html5")
	{
		$moduleHtml="";
		for($i=1;$i<=$row;$i++)
		{
			
			$moduleHtml.='<div class="uk-width-1-'.$row.'">
							<jdoc:include type="modules" name="'.$module.'-'.$row.'-row-'.$i.'" style="'.$style.'" />
						</div>';
		}
		$rowModules='<div class="z4-'.$module.'-'.$row.'-row uk-grid">'.$moduleHtml.'</div>';
		return $rowModules;
	}
	
	protected function getModuleRowNames($module,$row)
	{
		if($row==1)
		{
			return $module."-".$row."-row";	
		}
		$names= array();
		for($i=1;$i<=$row;$i++)
		{
			$names[]=$module."-".$row."-row-".$i;	
		}
		return $names;
	}
	
	
	public function countModules($name)
	{
		if (is_array($name)) 
		{
			
			foreach($name as $item)
			{
					if($this->doc->countModules($item))
					{
						return true;
					}
			}
			return false;
        }
		else
		{
			return $this->doc->countModules($name);	
		}
	}


	
    /**
	 * @功能：是否启用调试模式
	 * @参数：无
	 * @返回： bool 
	 * @说明：
	 */
    public function isDebug()
    {
        return $this->_debugMode;
    }

	/**
	 * @功能：从Request中获得变量的值
	 * @参数：$key 
					string  变量的名称
			  $default	
					mixed   如果找不到变量，默认返回的值  默认为 null
			  $filter	
					string   过滤器  默认为CMD
	 * @返回：
				mixed  变量的值
					
	 * @说明：
	 */
    public function request($key, $default = null, $filter = 'cmd')
    {
        $jInput = JFactory::getApplication()->input;
        return $jInput->get($key, $default, $filter);
    }

    /**
     * @param $filename
     * @param string $prefix
     * @param string $type
     * @return $this
     */
    public function css($filename, $type = 'all', $prefix = '')
    {
        if (is_array($filename)) {
            foreach ($filename as $file) {
                $this->css($file, $type, $prefix);
            }

        } else if ($filename) {

            $ext    = $this->_getExtension($filename);
            $prefix = (!empty($prefix) ? $prefix . '_' : '');

            if ($ext == 'css') {

                // include external
                if ($this->_isExternal($filename)) {
                    $this->doc->addStylesheet($filename, 'text/css', $type);
                    return $this;
                }

                // include in css folder
                $path = JPath::clean($this->cssFull . '/' . $prefix . $filename);
                if ($mtime = $this->_checkFile($path)) {
                    $cssPath = $this->css . '/' . $prefix . $filename . '?' . $mtime;
                    $this->doc->addStylesheet($cssPath, 'text/css', $type);
                    return $this;
                }

                // include related root site path
                $path = JPath::clean(JPATH_ROOT . '/' . $filename);
                if ($mtime = $this->_checkFile($path)) {
                    $cssPath = rtrim($this->baseurl, '/') . '/' . ltrim($filename, '/') . '?' . $mtime;
                    $this->doc->addStylesheet($cssPath, 'text/css', $type);
                    return $this;
                }

            } else if ($ext == 'less') {

                $lessMode = $this->params->get('less_processor', 'leafo');

                $path = JPath::clean($this->lessFull . '/' . $prefix . $filename);
                if ($this->_checkFile($path)) {
                    if ($cssPath = JBlankCss::getProcessor('less.' . $lessMode, $this)->compile($path)) {
                        $this->doc->addStylesheet($cssPath, 'text/css', $type);
                    }
                }

            } else if ($ext == 'scss') {

                $path = JPath::clean($this->scssFull . '/' . $prefix . $filename);
                if ($this->_checkFile($path)) {
                    if ($cssPath = JBlankCss::getProcessor('scss.leafo', $this)->compile($path)) {
                        $this->doc->addStylesheet($cssPath, 'text/css', $type);
                    }
                }
            }

        }

        return $this;
    }

    /**
     * @param $filename
     * @param string $prefix
     * @param bool $defer
     * @param bool $async
     * @return $this
     */
    public function js($filename, $prefix = '', $defer = false, $async = false)
    {
        if (is_array($filename)) {
            foreach ($filename as $file) {
                $this->js($file, $prefix, $defer, $async);
            }

        } else if ($filename) {

            $prefix = (!empty($prefix) ? $prefix . '_' : '');
            $path   = JPath::clean($this->jsFull . '/' . $prefix . $filename);

            if ($this->_isExternal($filename)) {
                $this->doc->addScript($filename, "text/javascript", $defer, $async);

            } else if ($mtime = $this->_checkFile($path)) {
                $filePath = $this->js . '/' . $prefix . $filename . '?' . $mtime;
                $this->doc->addScript($filePath, "text/javascript", $defer, $async);
            }
        }

        return $this;
    }


	/**
	 * @功能：获得body的css类名称
	 * @参数：无
	 * @返回：string 
	 * @说明：
	 */ 
    public function getBodyClasses()
    {
        return implode(' ', array(
            'tmpl-' . $this->request->get('tmpl', 'index'),
            'itemid-' . $this->request->get('Itemid', 0),
            'lang-' . $this->lang,
            'com-' . str_replace('com_', '', $this->request->get('option')),
            'view-' . $this->request->get('view', 'none'),
            'layout-' . $this->request->get('layout', 'none'),
            'task-' . $this->request->get('task', 'none'),
            'zmax-itemid-' . $this->request->get('item_id', 0),
            'zmax-categoryid-' . $this->request->get('category_id', 0),
            'device-ios-' . ($this->isiOS() ? 'yes' : 'no'),
            'device-android-' . ($this->isAndroidOS() ? 'yes' : 'no'),
            'device-mobile-' . ($this->isMobile() ? 'yes' : 'no'),
            'device-table-' . ($this->isTablet() ? 'yes' : 'no'),
        ));
    }
	
	public function getPageClassSuffix()
	{
		$pageClassSuffix = JFactory::getApplication()->getMenu()->getActive()? JFactory::getApplication()->getMenu()->getActive()->params->get('pageclass_sfx', '-default') : '-default';
		return $pageClassSuffix;
	}
    /**
	 * @功能：渲染HTML信息
	 * @参数：无
	 * @返回：string 
	 * @说明：
	 */ 
    public function renderHTML()
    {
        $html = array(
            '<!doctype html>',

            '<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7 ie6 oldie" '
            . 'lang="' . $this->lang . '" dir="' . $this->dir . '"> <![endif]-->',

            '<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7 oldie" '
            . 'lang="' . $this->lang . '" dir="' . $this->dir . '"> <![endif]-->',

            '<!--[if IE 8]><html class="no-js lt-ie9 ie8 oldie" '
            . 'lang="' . $this->lang . '" dir="' . $this->dir . '"> <![endif]-->',

            '<!--[if gt IE 8]><!--><html class="no-js" xmlns="http://www.w3.org/1999/xhtml" '
            . 'lang="' . $this->lang . '" dir="' . $this->dir . '" '
            . 'prefix="og: http://ogp.me/ns#" '
            // . 'prefix="ya: http://webmaster.yandex.ru/vocabularies/" '
            . '> <!--<![endif]-->',
        );

        return implode(" \n", $html) . "\n";
    }

   
    /**
	 * @功能：渲染网页头部信息
			  Manual head render	
	 * @参数：无
	 * @返回：string 
	 * @说明：
	 */ 
    public function renderHead()
    {
        $document = $this->doc;
        if (method_exists($document, 'getHeadData')) {
            $docData = $document->getHeadData();
        } else {
            return null;
        }

        $html = array();

        $isHtml5 = method_exists($this->doc, 'isHtml5') && $this->doc->isHtml5();

        // Generate charset when using HTML5 (should happen first)
        if ($isHtml5) {
            $html[] = '<meta charset="' . $document->getCharset() . '" />';
        }

        // Generate base tag (need to happen early)
        $base = $document->getBase();
        if (!empty($base)) {
            $html[] = '<base href="' . $document->getBase() . '" />';
        }

        // Generate META tags (needs to happen as early as possible in the head)
        foreach ($docData['metaTags'] as $type => $tag) {
            foreach ($tag as $name => $content) {
                if ($type == 'http-equiv' && !($isHtml5 && $name == 'content-type')) {
                    $html[] = '<meta http-equiv="' . $name . '" content="' . htmlspecialchars($content) . '" />';
                } elseif ($type == 'standard' && !empty($content)) {
                    $html[] = '<meta name="' . $name . '" content="' . htmlspecialchars($content) . '" />';
                }
            }
        }

        if ($docData['description']) {
            $html[] = '<meta name="description" content="' . htmlspecialchars($docData['description']) . '" />';
        }

        if ($generator = $document->getGenerator()) {
            $html[] = '<meta name="generator" content="' . htmlspecialchars($generator) . '" />';
        }

        $html[] = '<title>' . htmlspecialchars($docData['title'], ENT_COMPAT, 'UTF-8') . '</title>';

        // Generate stylesheet links
        foreach ($docData['styleSheets'] as $strSrc => $strAttr) {
            $tag = '<link rel="stylesheet" href="' . $strSrc . '"';

            if (!is_null($strAttr['mime']) && (!$isHtml5 || $strAttr['mime'] != 'text/css')) {
                $tag .= ' type="' . $strAttr['mime'] . '"';
            }

            if (!is_null($strAttr['media'])) {
                $tag .= ' media="' . $strAttr['media'] . '"';
            }

            if ($temp = JArrayHelper::toString($strAttr['attribs'])) {
                $tag .= ' ' . $temp;
            }

            $tag .= ' />';

            $html[] = $tag;
        }

        // Generate script file links
        foreach ($docData['scripts'] as $strSrc => $strAttr) {
            $tag = '<script src="' . $strSrc . '"';

            $defaultMimes = array('text/javascript', 'application/javascript', 'text/x-javascript', 'application/x-javascript');

            if (!is_null($strAttr['mime']) && (!$isHtml5 || !in_array($strAttr['mime'], $defaultMimes))) {
                $tag .= ' type="' . $strAttr['mime'] . '"';
            }

            if ($strAttr['defer']) {
                $tag .= ' defer="defer"';
            }

            if ($strAttr['async']) {
                $tag .= ' async="async"';
            }

            $tag .= '></script>';
            $html[] = $tag;
        }

        // add custom
        foreach ($docData['custom'] as $custom) {
            $html[] = $custom;
        }

        return implode("\n  ", $html) . "\n\n";
    }

    /**
     * @param string|array $metaRows
     * @return $this
     */
	/**
	 * @功能：设置meta信息
	 * @参数：$metaRows
					string|array  需要设置的meta信息					
	 * @返回：$this
	 * @说明：
	 */  
    public function meta($metaRows)
    {
        if (is_array($metaRows)) {
            foreach ($metaRows as $metaRow) {
                $this->meta($metaRow);
            }
        } else {
            if (method_exists($this->doc, 'getHeadData')) {
                $data = $this->doc->getHeadData();
                if (!in_array($metaRows, $data['custom'])) {
                    $this->doc->addCustomTag($metaRows);
                }
            }
        }

        return $this;
    }

	/**
	 * @功能：获得模板的相对路径（相对于浏览器）
	 * @参数：无
	 * @返回：string 
	 * @说明：
	 */  
    protected function _getTemplatePath()
    {
        $path = pathinfo($this->_getTemplatePathFull(), PATHINFO_BASENAME);
        return rtrim($this->baseurl, '/') . '/templates/' . $path;
    }

    /**
     * Check is path external
     * @param string $path
     * @return int
     */
	/**
	 * @功能：检查路径是否是外部链接
	 * @参数：$path
					string 需要检查的路径	
	* @返回：  int  
	 *@说明：
			外部路径 即：http:// https:// //开头的字符串
	 */   
    protected function _isExternal($path)
    {
        $regs = array('http:\/\/', 'https:\/\/', '\/\/');
        $reg  = '#^(' . implode('|', $regs) . ')#iu';

        return preg_match($reg, $path);
    }

  
	/**
	 * @功能：获得文件的扩展名
	 * @参数：$filename
					string  文件名
	 * @返回：mixed|string 
	 * @说明：
	 */ 
    protected function _getExtension($filename)
    {
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (strpos($ext, '?')) {
            $ext = preg_replace('#(\?.*)$#', '', $ext);
        }

        return $ext;
    }

	/**
	 * @功能：获得模板的绝对路径（相对于文件系统）
	 * @参数：无
	 * @返回：string 
	 * @说明：
	 */ 
    protected function _getTemplatePathFull()
    {
        $path = rtrim(realpath(__DIR__ . '/../../'), '/'); // TODO Remove template path hack
        //$path = JPath::clean(JPATH_THEMES . '/zfree'); // hardcode fix
        //$path = JPath::clean(JPATH_THEMES . '/' . $this->doc->template); // bug in Joomla on Error page
        return $path;
    }

    
	/**
	 * @功能：获得网站默认的语言
	 * @参数：无
	 * @返回：string
	 * @说明：
	 */   
    protected function _getLangDefault()
    {
        $lang = explode('-', JFactory::getLanguage()->getDefault());
        return $lang[0];
    }

   
	/**
	 * @功能：获得当前页面的语言
	 * @参数：无
	 * @返回：string 
	 * @说明：
	 */   
    protected function _getLangCurrent()
    {
        $lang = explode('-', JFactory::getLanguage()->getTag());
        return $lang[0];
    }

    
     
     
    
	/**
	 * @功能：从请求url中获得变量值
	 * @参数：无
	 * @返回：stdClass
	 * @说明：
	 */   
    protected function _getRequest()
    {
        $data = array(
            'option' => $this->request('option'),
            'view'   => $this->request('view'),
            'layout' => $this->request('layout'),
            'tmpl'   => $this->request('tmpl', 'index'),
            'lang'   => $this->request('lang', $this->langDef),
            'Itemid' => $this->request('Itemid', 0, 'int'),
        );

        if (class_exists('Joomla\Registry\Registry')) {
            $request = new Joomla\Registry\Registry();
            $request->loadArray($data);

        } else if (class_exists('JRegistry')) { // is depricated since J!3
            $request = new JRegistry();
            $request->loadArray($data);

        } else {
            $request = (object)$data;
        }

        return $request;
    }

    
	/**
	 * @功能：检查文件是否存在，如果存在返回最近修改的时间
	 * @参数：$path
					string 需要检查的文件的绝对路径（文件系统）
	 * @返回：int|null
	 * @说明：
	 */  
    protected function _checkFile($path)
    {
        $path = JPath::clean($path);
        if (JFile::exists($path) && filesize($path) > 5) {
            $mdate = substr(filemtime($path), -3);
            return $mdate;
        }

        return null;
    }

	/**
	 * @功能：得到网站的根路径
	 * @参数：无
	 * @返回：string
	 * @说明：
	 */
    protected function _getBaseUrl()
    {
        if (0) { // 测试使用
            $root = JUri::root();
            $juri = new JUri($root);
            return '//' . $juri->toString(array('host', 'port', 'path'));
        }

        return JUri::root();
    }


	/**
	 * @功能：获得移动侦测对象
	 * @参数：无
	 * @返回：ZFreeMobileDetect
	 * @说明：
	 */ 
    protected function _getMobile()
    {
        return new ZFreeMobileDetect();
    }

	/**
	 * @功能：设置meta中的generator 信息
	 * @参数：$newGenerator  
					string|null 默认为null  
	 * @返回：$this
	 * @说明：
	 */  
    public function generator($newGenerator = null)
    {
        $this->doc->setGenerator($newGenerator);
        return $this;
    }

  
	/**
	 * @功能：设置为HTML5模式
	 * @参数：$state
					bool  状态
	 * @返回：$this
	 * @说明：
	 */   
    public function html5($state)
    {
        if (method_exists($this->doc, 'setHtml5')) {
            $this->doc->setHtml5((bool)$state);
        }

        return $this;
    }

    
	/**
	 * @功能：排除指定的CSS
	 * @参数：$patterns 
					array  需要排除的CSS匹配模式
	 * @返回：$this
	 * @说明：
			$pattern 为正则表达式
	 */   
    public function excludeCSS(array $patterns)
    {
        $this->_excludeAssets(array('styleSheets' => $patterns));
        return $this;
    }

  	/**
	 * @功能：排除指定的JS
	 * @参数：$patterns 
					array  需要排除的JS匹配模式
	 * @返回：$this
	 * @说明：
		$pattern 为正则表达式
	 */   
    public function excludeJS(array $patterns)
    {
        $this->_excludeAssets(array('scripts' => $patterns));
        return $this;
    }

    /**
     * 
     * @param array $allPatterns
     * @return $this
     */
	/**
	 * @功能：排除资源 Cleanup system links from Joomla, Zmaxshop
	 * @参数：$allPatterns 
					array  需要排除的资源匹配模式
	 * @返回：$this
	 * @说明：
		$pattern 为正则表达式
	 */    
    protected function _excludeAssets(array $allPatterns)
    {
        if (method_exists($this->doc, 'getHeadData')) {
            $data = $this->doc->getHeadData();
        } else {
            return $this;
        }

        foreach ($allPatterns as $type => $patterns) {
            foreach ($data[$type] as $path => $meta) {

                foreach ($patterns as $pattern) {
                    if (preg_match('#' . $pattern . '#iu', $path)) {
                        unset($data[$type][$path]);
                        break;
                    }
                }

                $this->setHeadData($type, $data);
            }
        }

        return $this;
    }

	/**
	 * @功能：检查当前页面是否有错误信息
	 * @参数：无
	 * @返回：bool
	 * @说明：
	 */   
    public function isError()
    {
        $buffer = $this->doc->getBuffer('message');

        if (is_array($buffer)) {
            $bufferWords = JString::trim(strip_tags(current($buffer['message'])));
        } else {
            $bufferWords = JString::trim(strip_tags($buffer));
        }

        return !empty($bufferWords);
    }

    /**
	 * @功能：检查当前设备是否为手机
	 * @参数：无
	 * @返回：bool
	 * @说明：
	 */  
    public function isMobile()
    {
        return $this->mobile->isMobile() && !$this->mobile->isTablet();
    }

    /**
	 * @功能：检查当前设备是否为平板
	 * @参数：无
	 * @返回：bool
	 * @说明：
	 */  
    public function isTablet()
    {
        return $this->mobile->isTablet();
    }

    /**
	 * @功能：检查当前是否为IOS系统
	 * @参数：无
	 * @返回：bool
	 * @说明：
	 */  
    public function isiOS()
    {
        return $this->mobile->isiOS();
    }

    
    /**
	 * @功能：检查当前是否为AndroidOS
	 * @参数：无
	 * @返回：bool
	 * @说明：
	 */
    public function isAndroidOS()
    {
        return $this->mobile->isAndroidOS();
    }
	
    /**
     * Attention! Function chanage template contect.
     * It means that $this will be instance of ZFreeTemplate
     *
	 * 这个函数将会改变模板的内容，这意味着$this就代表了ZFreeTemplate实例
     * @param $name
     * @param array $args
     * @return string
	 *
	 * Including subtemplates via special function partial
	 * 其实就是加载指定的php文件而已，没有什么其他的特别之处
     */
	 
    public function loadBlock($name, array $args = array())
    {
        //$file = preg_replace('/[^A-Z0-9_\.-]/i', '', $name);//过滤文件名
		$file = $name;

        $ext = pathinfo($file, PATHINFO_EXTENSION);//得到扩展名，如果不存在，那么就加上.php
        if (empty($ext)) {
            $file .= '.php';
        }

        $args['tpl']   = $this;
        $args['_this'] = $this->doc;

        // load the block
        $__file = JPath::clean($this->block . '/' . $file);

		
        // render the block
        if (JFile::exists($__file)) {

            // import vars and get content
            extract($args);
            ob_start();
            include($__file);
            $output = ob_get_contents();
            ob_end_clean();
            echo  $output;
        }

        return null;
    }

    /**
	 * @功能：检查当前是否为首页
	 * @参数：无
	 * @返回：bool
	 * @说明：
	 */
    public function isFront()
    {
        $defId = $this->menu->getDefault()->id;
        $curId = 0;

        $active = $this->menu->getActive();
        if ($active && $active->id) {
            $curId = $active->id;
        }

        return $defId == $curId;
    }

    
	/**
	 * @功能：启用或者禁用调试模式
	 * @参数：$state
					bool  需要设置的状态 默认为 true
	 * @返回：$this 
	 * @说明：
	 */  
    public function debug($state = true)
    {
        $this->_debugMode = (bool)$state;
        return $this;
    }

	/**
	 * @功能：合并所有的CSS或者JS文件（这个功能joomla已经提供了对应的API）
	 * @参数：$type
					string 需要合并的文件类型  可选 css js  默认为css
			  $isCompress
					bool  是否同时压缩 默认为否
	 * @返回：$this 
	 * @说明：
	 */  
    public function merge($type = 'css', $isCompress = false)
    {
        $mergeFiles = array();

        $dataKey = $type == 'css' ? 'styleSheets' : 'scripts';
        
        if (method_exists($this->doc, 'getHeadData')) {
            $docData = $this->doc->getHeadData();
        }
        
        if (isset($docData) && !empty($docData[$dataKey])) {
            foreach ($docData[$dataKey] as $pathOrig => $attrs) {

                // don't get external files
                $path = str_replace($this->baseurl, '', $pathOrig);
                $path = preg_replace('#(\?.*)$#', '', $path);
                if ($this->_isExternal($path)) {
                    continue;
                }

                if (
                    // only media="all" and media=NULL
                    ($attrs['mime'] == 'text/css' && (!isset($attrs['media']) || strtolower($attrs['media']) == 'all'))
                    // any JavaScript
                    || ($attrs['mime'] == 'text/javascript')
                ) {
                    $fullPath       = JPath::clean(JPATH_ROOT . '/' . $path);
                    $fullPathFolder = JPath::clean($_SERVER['DOCUMENT_ROOT'] . '/' . $path);
                    $resPath        = false;

                    if (JFile::exists($fullPath)) {
                        $resPath = $fullPath;
                    } else if (JFile::exists($fullPathFolder)) {
                        $resPath = $fullPathFolder;
                    }

                    if ($resPath) {
                        $mergeFiles[] = $resPath;
                        unset($docData[$dataKey][$pathOrig]);
                    }

                }
            }
        }

        if (count($mergeFiles)) {
            $processor = ZFreeMinify::getProcessor($type, $this);
            if ($path = $processor->minify($mergeFiles, $isCompress)) {
                $this->setHeadData($dataKey, $docData);
                if ('css' == $type) {
                    $this->doc->addStylesheet($path, 'text/css');
                } else if ('js' == $type) {
                    $this->doc->addScript($path, "text/javascript", false, false);
                }
            }
        }

        return $this;
    }

    /**
	 * @功能：设置head数据
	 * @参数：$type
					string 需要设置的数据类型  可选 scripts  stylesheets
			  $data
					array  需要设置的值
	 * @返回：无
	 * @说明：
		Hack for empty scripts or styles arrays
	 */  
    protected function setHeadData($type, $data)
    {
        if (!empty($data[$type])) {
            $this->doc->setHeadData($data);

        } else if ($type == 'scripts') {
            $this->doc->_scripts = array();

        } else if ($type == 'styleSheets') {
            $this->doc->_styleSheets = array();
        }
    }

}
