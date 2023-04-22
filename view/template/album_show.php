<?php 

function albumShow($conn, $userId) {
    // if($row = mysqli_fetch_assoc(albumShow_Model($conn, $userId))) {
    //     return $row;
    // } else {
    //     return false;
    // };

    $result = albumShow_Model($conn, $userId);
    if ($result){
        while($row = mysqli_fetch_assoc($result)) {
            $resultImg = imageShowOne_Model($conn, $userId, $row["id"]);
            
            echo '                     
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card mb-4 box-shadow">
            ';

            if ($resultImg) {
                echo '
                
                <div class="imageDiv card-img-top">                      
                            <img class="images"
                            data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                            alt="Thumbnail [100%x225]"
                            src="../assets/img/'.$resultImg["name"].'"
                            data-holder-rendered="true">                         
                        </div>

                ';

            } else {

            echo '
            <div class="card-img-top"
            style="height: 225px; width: 100%; display: flex; justify-content: center; align-items: center;">
            Empty Album 
            </div>
            
            ';

            }

                                          
            echo ' 
                        <div class="card-body">
                            <h5 class="card-title">'.$row["title"].'</h5>
                            <p class="card-text">.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="../view/index.php?album='.$row["id"].'">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <!-- <small class="text-muted">9 mins</small> -->
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    } 
};

?>
