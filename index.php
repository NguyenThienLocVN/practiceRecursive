
<?php

include 'database/Database.php';

// Class to show data
class ShowTreeMenu extends Database
{

    public function trueStatus($categories, $parent_id = 0, $bool = true)
    {
        $menu_html = '<ul>';
        foreach ($this->categories as $value) {
            if ($value['parent_id'] == $parent_id) {
                $menu_html .= '<li>' . $value['name'];
                $menu_html .= $this->trueStatus($categories, $value['menu_id'], true) . '</li>';
            }
        }
        $menu_html .= '</ul>';
        
        if($bool)
        {
            return $menu_html;
        }
        else
        {
            echo($menu_html);
        }
    }
}

$treeMenu = new ShowTreeMenu();

$treeMenu->trueStatus($categories, 0, false);
?>