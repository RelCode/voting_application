<div class="container" id="main-container">
    <div class="row flex-column">
        <h4 class="text-center mt-3 p-3 shadow rounded"><?= $data['names'] . ' : ' . $data['political_group'] ?></h4>
        <div class="col-xs-12 col-md-6 offset-md-3  mt-3">
            <div class="table-responsive">
                <table class="table table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th>Running For</th>
                            <th>Running At</th>
                        </tr>
                    </thead>
                    <?php
                $tr = '';
                for ($i=0; $i < count($data['candidacies']); $i++) { 
                    $column = $data['candidacies'][$i]['running_for'];
                    $tr .= '<tr>';
                    $tr .= '<td>' . ucfirst($data['candidacies'][$i]['running_for']) . '</td>';
                    $tr .= '<td>' . ucwords($data['candidacies'][$i][$column]) . '</td>';
                    $tr .= '</tr>';
                }
                echo $tr;
                ?>
                </table>
            </div>
        </div>
    </div>
</div>