
<?php

include 'database/Database.php';

// Class to show data
class ShowTreeMenu extends Database
{
    
    function showCategory($categories , $parent_id = 0)
    {   
        $temp_array = array();
        foreach ($this->categories as $item)
        {
            //Show data
            if ($item['parent_id'] == $parent_id)
            {
                echo $item['name']."<br>";
                // Recursive to show sub-categories.
                $item[] = $this->showCategory($categories, $item['menu_id']);
                
            }
        }
        return $item['name'];
    }

}

$treeMenu = new ShowTreeMenu();
$treeMenu->showCategory($categories);
// $treeMenu->orderedMenu($categories,0);
?>