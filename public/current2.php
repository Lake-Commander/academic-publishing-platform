

<div class="clearfix"  ></div>

                <div id="current_2"  >
                <br>
                <h3>CURRENT ISSUES</h3>
                <br>
                 <a href="Back_covers/<?php echo $row['journal_name']?>.pdf" class="download_button" alt="FILE NOT FOUND!">DOWNLOAD JOURNAL'S BACK COVER</a> 
                <br><br>
                <p> <b> <?php $rowv = $stmtv->fetch(PDO::FETCH_ASSOC); //print_r($rowv);
                echo $rowv['pub_volume']; ?> </b></p>
                <hr>

                <ul  style="font-size:13px;" class="list-group">

                    <?php
                    if (!($row_curr > 0)) {
                        ?>

                        <li class="list-group-item">THERE IS NO ISSUE AT THIS TIME</li>
                    <?php } else {
                        
                        while ($row01 = $stmt01->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                           
                            <li class="list-group-item">
                            <a  class="items" style="color:#337ab7;"  
                            href="abstract.php?j=<?php echo $row01['pub_journal'];?>&pn=<?php echo $row01['pub_name'];?>&id=<?php echo $row01['id']; ?>" target="_blank"><span
                                            class="glyphicon glyphicon-cloud-download"
                                            aria-hidden="true"></span><?php echo $row01['pub_name']; ?></a> <br>
                                <p style="color:#FF590F;">Author(s): <?php echo $row01['pub_author']; ?></p> </li>
                            <?php
                        }
                    } ?>

                </ul>
                
                <hr>

                </div>
