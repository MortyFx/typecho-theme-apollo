<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    //图片设置
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('Favicon'), _t('输入 favicon 的链接，请带上 http 协议头地址，若不填则会使用主题的 Logo'));
    $form->addInput($favicon);
    $logo = new Typecho_Widget_Helper_Form_Element_Text('logo', NULL, NULL, _t('Logo'), _t('输入 Logo 的链接，请带上 http 协议头地址，留空则使用主题自带 Logo'));
    $form->addInput($logo);

    //Pjax加速
    $pjax = new Typecho_Widget_Helper_Form_Element_Checkbox('pjax',
    array(
      'InstantClick' => _t('启用Instantclick预加载'),
      ),
    array('InstantClick') ,
    _t('Instantclick预加载'),
    _t('启用Instantclick预加载以达到网站加速目的。为了兼容性，请到「设置-评论」中关闭「反垃圾保护」'));
    $form->addInput($pjax->multiMode()); 

}

// TODO:阅读数
function get_post_view($archive)
{
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}

//获取评论的锚点链接
function get_comment_at($coid)
{
    $db = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href = '<a href="#comment-' . $parent . '">@' . $author . '</a>';
        echo $href;
    } else {
        echo '';
    }
}

//输出评论内容
function get_filtered_comment($coid)
{
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('text')->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $content = $rs['text'];
    echo $content;
}

//判断摘要标签并输出摘要（去除html标签）
function print_excerpt($obj, $length)
{
    if (false !== strpos($obj->text, '<!--more-->')) {
        echo str_replace('<p></br></p>', '', $obj->excerpt);
    } else {
        $str = preg_replace('/<script>.*?<\/script>/is', '', $obj->excerpt);
        echo Typecho_Common::subStr(strip_tags($str), 0, $length, '...');
    }
}