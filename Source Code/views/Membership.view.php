<?php
class MembershipView{
    public function render($data){
        $no = 1;
        $dataMembership = null;
        
        
        $dataMembership .= '<table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>

                        </tr>
                        </thead>
                        <tbody>';
        foreach($data as $row){
            $dataMembership .= "<tr>
                            <th>{$no}</th>
                            <td>{$row['name']}</td>
                            <td>
                                <a class='btn btn-success' href='membership.php?update={$row['id']}'>Edit</a>
                                <a class='btn btn-danger' href='membership.php?id_hapus={$row['id']}'>Delete</a>
                            </td>
                        </tr>";
            $no++;
        }
        
        $dataMembership .= '</tbody>
                        </table>';
        
        $tpl = new Template("templates/skin2.html");
        $tpl->replace("DATA", $dataMembership);
        $tpl->write();
    }

    public function createMembership()
    {
        $form = '
        <form action="membership.php?add=1" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Create Member">
        </div>
        </form>
    ';
    
        $tpl = new Template("templates/skinadd2.html");
        $tpl->replace("DATA", $form);
        $tpl->write();
    }

    public function editMember($id, $data)
    {
        foreach($data as $row){
            if($row['id'] == $id){
                $form = '
                    <form action="membership.php?id_edit=' . $row['id'] . '" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required value="' . $row['name'] . '">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update Member">
                    </div>
                </form>
                ';
            }
        }
        $tpl = new Template("templates/skinadd2.html");
        $tpl->replace("DATA", $form);
        $tpl->write();
    }
}
?>
