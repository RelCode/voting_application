<div class="container" id="main-container">
    <h4 class="text-center mt-3 p-3 shadow rounded">Candidates List</h4>
    <div class="row">
        <div class="col-12 mt-3">
            <div class="table-responsive">
                <table class="table table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th>Names</th>
                            <th>Group</th>
                            <th>Candidacy Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tr = '';
                        for ($i = 0; $i < count($data); $i++) {
                            $tr .= '<tr>';
                            $tr .= '<th>' . $data[$i]['names'] . '</th>';
                            $tr .= '<th>' . $data[$i]['political_group'] . '</th>';
                            $tr .= '<th>' . $data[$i]['candidacy'] . '</th>';
                            $tr .= '<th><a href="?page=candidates&subpage=read&candidate=' . $data[$i]['id'] . '" class="btn btn-primary">View</a></th>';
                            $tr .= '</tr>';
                        }
                        echo $tr;
                        ?>
                    </tbody>
                </table>
                <?php
                $page_url = '?page=candidates&subpage=view&';
                $total_rows = $count;
                include_once './views/layouts/pagination.php';
                ?>
            </div>
        </div>
    </div>
</div>