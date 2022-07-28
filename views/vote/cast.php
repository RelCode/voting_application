<div class="container" id="main-container">
    <div class="row">
        <h4 class="text-center mt-3 p-3 rounded shadow" style="width:100%"><?= ucfirst($_GET['for']) ?> Candidates </h4>
        <?php
            $div = '';
            for ($i=0; $i < (count($data) - 1); $i++) { 
                $voted = !empty($data[count($data)]) ? ($data[count($data)][0]['candidate'] == $data[$i]['id'] ? ' : <i class="text text-success">Voted</i>' : '') : '';
                $div .= '<div class="col-xs-12 col-md-4 mt-3">';
                $div .= '<div class="card">';
                $div .= '<img class="card-img-top" src="./assets/avatar.png" alt="Candidate Image" height="140px" width="100px"/>';
                $div .= '<div class="card-body">';
                $div .= '<h4 class="card-title">'.$data[$i]['names'].' '.$voted.'</h4>';
                $div .= '<p class="card-text">'.$data[$i]['political_group'].'</p>';
                if(empty($data[count($data)])){
                    $div .= '<button class="btn btn-primary" onclick="castVote(' . $data[$i]['id'] . ')">Vote</button>';
                }
                $div .= '</div>';
                $div .= '</div>';
                $div .= '</div>';
            }
            echo $div;
        ?>
    </div>
</div>