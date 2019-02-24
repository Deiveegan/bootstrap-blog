<!-- Categories Widget start-->

                    <div class="card my-4">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">

                                    <?php

                                    $sql3 = "SELECT `post_title` from posts";
                                    $p_titles = $conn->query($sql3);

                                    while ($titles = $p_titles->fetch_assoc()) {
                                        echo "<li><a href=" . "http://startbootstrap.com/#>" . $titles["post_title"] . "</a></li>";


                                    }
                                    ?>
                          
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>      
<!-- Categories Widget ending-->