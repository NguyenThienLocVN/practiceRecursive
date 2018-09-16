
<?php

include 'database/Database.php';

$db = new Database();
$result = mysqli_query($db->conn, "select * from menu" );

$categories = array();

while ($row = mysqli_fetch_assoc($result)){
    $categories[] = $row;
}
         
class showData extends Database
{
    
    function showCategories($categories, $parent_id = 0, $char = '')
    {
        
        
        foreach ($categories as $item)
        {
            //Show data
            if ($item['parent_id'] == $parent_id)
            {
                echo '<ul>';
                    echo '<li>';
                        echo $char . $item['name']."<br>";
                    echo '</li>';
                echo '</ul>';
                
                // Recursive to show sub-categories.
                showCategories($categories, $item['menu_id'], $char.'---');
            }
        }
    }
}

$show = new showData();
$show->showCategories($categories);
?>