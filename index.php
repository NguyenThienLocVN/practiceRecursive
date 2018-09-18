
<?php

include 'database/Database.php';

// Class to show data
class MenuTree extends Database
{
    public function showItem($categories, $parent_id = 0, $bool = true)
    {
        // Build HTML
        $menu_html = '<ul>';
        foreach ($this->categories as $value) {
            if ($value['parent_id'] == $parent_id) {
                $menu_html .= '<li>' . $value['name'];
                $menu_html .= $this->showItem($categories, $value['menu_id'], true) . '</li>';
            }
        }
        $menu_html .= '</ul>';
        
        // If true, store data
        if($bool == true)
        {
            return $menu_html;
        }
        // If false, print data
        else
        {
            echo($menu_html);
        }
    }
}

$treeMenu = new MenuTree();

$treeMenu->showItem($categories, 0, false);
?>