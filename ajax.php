<?php
if(isset($_POST['searchFor'])){
   $col = $_POST['searchFor'];
   $val = $_POST['searchval'];

   Search ($col, $val);

}




function Search ($col, $value){

    require 'config.php';

    $syntax = "SELECT book_author.transid, book.copies, publisher.name, book.title 
    FROM book_author 
    INNER JOIN author 
    ON author.authorid = book_author.authorid 
    INNER JOIN book 
    ON book.ISBN = book_author.ISBN 
    INNER JOIN publisher 
    ON publisher.pubid = book.pubno 
    WHERE book.$col LIKE '$value%'";

    $result = $conn -> query($syntax);

    if($result -> num_rows > 0){
        echo "
                
        <table id=\"myTables\" border=\"1\" style = \"border-collapse: collapse;\">
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Copies</th>
                <th>Publisher</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
        ";

        foreach ($result as $row){

            echo "
                <tr>
                    <td>".$row['transid']."</td>
                    <td>".$row['copies']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['title']."</td>
                </tr>
            ";

        }

        echo "
        </tbody>
        </table>
        ";

    }
}

?>



