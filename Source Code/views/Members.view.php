<?php
class MembersView{
    public function render($data, $data2){
        $no = 1;
        $dataMembers = null;
        
        $dataMembers .= '<table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>JOINING DATE</th>
                            <th>MEMBERSHIP</th>
                            <th>ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>';
        foreach($data as $row){
            $name2 = '';
            foreach ($data2 as $a) {
                list($id, $name) = $a;
                if ($id == $row['id_membership']) {
                    $name2 = $name;
                    break;
                }
            }
            $dataMembers .= "<tr>
                            <td>{$no}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['join_date']}</td>
                            <td>{$name2}</td>
                            <td>
                                <a class='btn btn-success' href='index.php?update={$row['id']}'>Edit</a>
                                <a class='btn btn-danger' href='index.php?id_hapus={$row['id']}'>Delete</a>
                            </td>
                        </tr>";
            $no++;
        }
        
        $dataMembers .= '</tbody>
                        </table>';
        
        $tpl = new Template("templates/skin.html");
        $tpl->replace("DATA", $dataMembers);
        $tpl->write();
    }

    public function createMember($dataMembership)
    {
        
        $listMembership = "";
        foreach ($dataMembership as $val) {
            list($id, $name) = $val;
            $listMembership .= "<option value='" . $id . "'>" . $name . "</option>";
        }
        
        $form = '
        <form action="index.php?add=1" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="id_membership">Membership:</label>
            <select id="id_membership" name="id_membership" required>
                <option value="">--Pilih--</option>
                '.$listMembership.'
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Create Member">
        </div>
        </form>
    ';
    
        $tpl = new Template("templates/skinadd1.html");
        $tpl->replace("DATA", $form);
        $tpl->write();
    }

    public function editMember($id, $data, $dataMembership)
    {
        foreach($data as $row){
            if($row['id'] == $id){
                    $listMembership = "";
                    foreach ($dataMembership as $val) {
                        list($id, $name) = $val;
                        $selected = ($id == $row['id_membership']) ? "selected" : "";
                        $listMembership .= "<option value='" . $id . "' " . $selected . ">" . $name . "</option>";
                    }

                $form = '
                    <form action="index.php?id_edit=' . $row['id'] . '" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required value="' . $row['name'] . '">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required value="' . $row['email'] . '">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" required value="' . $row['phone'] . '">
                    </div>
                    <div class="form-group">
                        <label for="id_membership">Membership:</label>
                        <select id="id_membership" name="id_membership" required>
                            <option value="">--Pilih--</option>
                            ' . $listMembership . '
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update Member">
                    </div>
                </form>
                ';
            }
        }

        $tpl = new Template("templates/skinadd1.html");
        $tpl->replace("DATA", $form);
        $tpl->write();
    }
}
?>
