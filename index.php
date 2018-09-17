
<?php

include 'database/Database.php';

// Class to show data
class ShowTreeMenu extends Database
{

    public function trueStatus($categories, $parent_id = 0)
    {
        $menu_html = '<ul>';
        foreach ($this->categories as $value) {
            if ($value['parent_id'] == $parent_id) {
                // echo $value['name'];
                $menu_html .= '<li>' . $value['name'];
                $menu_html .= $this->trueStatus($categories, $value['menu_id']) . '</li>';
            }
        }
        $menu_html .= '</ul>';
        return $menu_html;
    }

    public function checkStatus($bool = true)
    {
        if ($bool != true) 
        {
            echo($this->menu_html);
        } 
        else
        {
            return $this->trueStatus();
            var_dump($this->menu_html);
        }
    }
}

$treeMenu = new ShowTreeMenu();
// $treeMenu->trueStatus($categories, 0);
$treeMenu->checkStatus(true);

echo($treeMenu->trueStatus($categories,0));

// $treeMenu->showTreeItem($categories, 0, true);
// $treeMenu->orderedMenu($categories,0);
?>