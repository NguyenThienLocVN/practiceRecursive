
<?php

include 'database/Database.php';

// Query data
$db = new Database();
$result = mysqli_query($db->conn, "select * from menu" );

$categories = array();

while ($row = mysqli_fetch_assoc($result)){
    $categories[] = $row;
}
    
// Class to show data
class showData extends Database
{
    
    function showCategories($categories, $parent_id = 0, $text = '')
    {
        foreach ($categories as $item)
        {
            //Show data
            if ($item['parent_id'] == $parent_id)
            {
                echo '<ul>';
                    echo '<li>';
                        echo $text . $item['name']."<br>";
                    echo '</li>';
                echo '</ul>';
                
                // Recursive to show sub-categories.
                $this->showCategories($categories, $item['menu_id'], $text.'---');
            }
        }
    }
}

$show = new showData();
$show->showCategories($categories);
?>